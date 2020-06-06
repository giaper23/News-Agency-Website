<?php

// Connection to db
require_once 'db_connect.php';

// Sanitize input
require_once 'sanitize.php';

// Import DotEnv variables
$secret_key = $_ENV['SECRET_KEY'];
$url_prefix = $_ENV['URL_PREFIX'];

// Empty email
$email = "";

// Empty the variable that holds the success or fail message
$error = ""; 

// If method is POST
if (isset($_POST["forgot-button"])) {

  $token=$_POST['g-recaptcha-response-forgot'];
  
  $url="https://www.google.com/recaptcha/api/siteverify";
  $data=[ 'secret'=>$secret_key,
  'response'=>$token];
  
  $options=array('http'=> array('header'=> "Content-type: application/x-www-form-urlencoded\r\n",
        'method'=> 'POST',
        'content'=> http_build_query($data)));
  
  $context=stream_context_create($options);
  $response=file_get_contents($url, false, $context);
  
  $res=json_decode($response, true);
  
  if ($res['success']==true) {

  // If email field is empty
  if (empty($_POST["email"])) {

    // Error message
    $error = "<div class='alert alert-danger alert-dismissible'><strong>Email is required!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

  } else {

    // Sanitized email
    $email = test_input($_POST["email"]); 

    // Check if there is a user in the db with the same credentials
    $check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    
    // The results from db
    $result = mysqli_query($db, $check_query); 

    // If rows return
    if(mysqli_num_rows($result) > 0) {

    // Prepare and bind
    $stmt = $db->prepare("INSERT INTO password_reset (email, selector, token, expires) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $email, $selector, $hashed_token, $expires);

    // Random string of 8 converted to hex
    $selector = bin2hex(random_bytes(8));

    // Generate a random string
    $token = random_bytes(32);

    // Encrypt token
    $hashed_token = md5($token);

    // I turn the $token from bin to hex in the url and make the url we send the user for email confirmation
    $url = $url_prefix."create_new_password.php?selector=".$selector."&validator=".bin2hex($token);

    // Expiration for token is 15 mins (in seconds) from the moment we create it
    $expires = date("U") + 450;

    // Query to delete other tokens created for the same user
    $delete_token_query = "DELETE FROM password_reset WHERE email = '$email'";

    // Deletes multiple tokens for the same user
    mysqli_query($db, $delete_token_query); 

    // Execute statement 
    $stmt->execute();

    // CLose statement
    $stmt->close();

    // The message that the user will receive in his email
    $msg_body = "Click this link to reset your password: $url";

    // Subject of email
    $subject = "Reset your password";
    
    // Pass the email address to the SESSION
    $_SESSION["new-password-email"] = $email;

    // Success message
    $error = "<div class='alert alert-success alert-dismissible'><strong>Check your inbox! We sent you a link to reset your password!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
    
    // Sends the email to the user
    require_once 'send_test_mail.php';
  
    } else {
  
      // User not found error
      $error = "<div class='alert alert-danger alert-dismissible'><strong>User not found!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
  
    }
      
  }

} else {

  // User not found error
  $error = "<div class='alert alert-danger alert-dismissible'><strong>reCaptcha failed! Please try again in a little while....<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

}

}
?>