<?php

// ------ DotEnv Import ----------------------------
require '../vendor/autoload.php';

// Note the different path when not in root folder
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); 
$dotenv->load();
//--------------------------------------------------

// Import db connection
require_once 'db_connect.php';

// Import sanitizing file
require_once 'sanitize.php';

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];
$url_prefix = $_ENV['URL_PREFIX'];

// Empty error
$error = "";

// Empty subscriber email
$email = "";

// If post is submitted
if (isset($_POST["subscribe"])) {

  $token=$_POST['g-recaptcha-response-subscribe'];

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
    if (empty($_POST["subscribe"])) {

        // Empty email error
        echo "Email required!";

  }  else {

    
    // Grab and sanitize email
    $email = test_input($_POST["subscribe"]);

    $query = "SELECT * FROM subscribers WHERE email = '$email'";

    // The results from db
    $result = mysqli_query($db, $query);

    $count = mysqli_num_rows($result);

    if ($count != 0) {

      echo "Email already subscribed!";

    } else  {

      // Check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

      // Invalid email error
      echo "Invalid email format!";

    } else {

      // Prepare statement for later use (More efficient and secure!)
      $stmt = $db->prepare("INSERT INTO subscribers (email) VALUES (?)");

      // Bind statement
      $stmt->bind_param("s", $email);

      // Execute statement 
      $stmt->execute();

      // CLose statement
      $stmt->close();

      // The message that the user will receive in his email
      $msg_body = "You have been successfully subscribed to the Cosmos News Agency mailing list!<br><br>
                  If you did not subscribe to our mailing list or want to unsubscribe follow
                  this link <a href=".$url_prefix."unsub.php>".$url_prefix."unsub.php</a>!
      ";

      // Subject of email
      $subject = "Subscribed to CNA mailing list!";

      

      // Sends an email to the user
      require_once 'send_test_mail.php';

      // Success
      echo "Successfully subscribed !";

      // Close db connection
      $db -> close();

    }

  }

    }

    

} else {

  echo "reCaptcha failed! Too many requests! Refresh the page and try again...";

}

} 





?>