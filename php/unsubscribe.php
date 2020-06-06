<?php

// Import db connection
require_once 'db_connect.php';

// Import sanitizing file
require_once 'sanitize.php';

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

// Empty error
$error = "";

// Empty subscriber email
$email = "";

// If post is submitted
if (isset($_POST["unsubscribe"])) {

  $token=$_POST['g-recaptcha-response-unsubscribe'];

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
    if (empty($_POST["unsubscribe"])) {

        // Empty email error
        echo "Empty email!";

  }  else {

    // Grab and sanitize email
      $email = test_input($_POST["unsubscribe"]);


    // Check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

      // Invalid email error
      echo "Invalid email format";

    } else {
      
      $query = "SELECT * FROM subscribers WHERE email='$email'";

      // The results from db
      $result = mysqli_query($db, $query);

      $count = mysqli_num_rows($result);

      if ($count != 0) {

      // Query to delete the same email from DB
      $delete_email_query = "DELETE FROM subscribers WHERE email = '$email'";

      // Delete
      mysqli_query($db, $delete_email_query); 

      // The message that the user will receive in his email
      $msg_body = "You have successfully unsubscribed from Cosmos News Agency mailing list!";

      // Subject of email
      $subject = "Unsubscribed from CNA mailing list!";

      // Sends an email to the user
      require_once 'send_test_mail.php';

      // Success message
      echo "Succesfully unsubscribed!";

      // Close db connection
      $db -> close();

      } else {

        // Error
        echo "Email not subscribed!";

      }

    }

  }

} else {

  echo "reCaptcha failed! Too many requests! Refresh the page and try again...";

}

} 

?>