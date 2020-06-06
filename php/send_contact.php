<?php

// Import db connection
require_once "db_connect.php";

// Import sanitize file
require_once "sanitize.php";

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

// Empty error
$error = "";

// If post is submitted
if (isset($_POST["contact"])) {

  // Grab reCaptcha v3 Token 
  $token=$_POST['g-recaptcha-response-contact'];

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

    // If any fields are empty
    if (empty($_POST["first-name"]) || empty($_POST["last-name"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["subject"]) || empty($_POST["message"])) {

        // Empty field errors
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Empty fields!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   else    {

        // Grab input from form and sanitize it
        $first_name = test_input($_POST["first-name"]);
        $last_name = test_input($_POST["last-name"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $subject = test_input($_POST["subject"]);
        $message = test_input($_POST["message"]);

        // Validate fields
        if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {

            $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid name!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }   elseif (!preg_match("/^[a-zA-Z]*$/", $last_name)) {

            $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid last name!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // Invalid email error
            $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid email!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }   elseif (!preg_match("/^\d{10}$/", $phone)) {

            $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid phone!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }   else {

            // Prepare statement for later use (More efficient and secure!)
            $stmt = $db->prepare("INSERT INTO contact (first_name, last_name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?, ?)");

            // Bind statement
            $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $subject, $message);

            // Execute statement 
            $stmt->execute();

            // CLose statement
            $stmt->close();

            // The message that the user will receive in his email
            $msg_body = "

            Cosmos News Agency<br><br>


            Thank you for contacting us!<br> We have received your message and will be with you shortly!<br><br>
            

            Your message:<br><br>


            //---------------------------------//<br>
           
            Name: ".$first_name."<br>
            Last name: ".$last_name."<br>
            Email: ".$email."<br>
            Phone: +30 ".$phone."<br><br><br>
            Subject: ".$subject."<br><br>
            Message: ".$message."<br>

            //---------------------------------//
            ";

            // Subject of email
            $subject = "Thank you for contacting Cosmos News Agency!";

            // Sends an email to the user
            require_once 'send_test_mail.php';

            // Close db connection
            $db -> close();

            // Success message
            $error = "<div class='alert alert-success alert-dismissible'><strong>Message sent succesfully!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }

    }

} else {

    // reCaptcha error
    $error = "<div class='alert alert-danger alert-dismissible'><strong>reCaptcha failed! Try again in a little while...<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

}

}

?>