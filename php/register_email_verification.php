<?php

// This file is used for grabbing user input, validating it and if it's cool
// sends an email with a url containing a selector and a token to verify the user

// Connection to db
require_once 'db_connect.php'; 

// File that sanitizes input
require_once 'sanitize.php'; 

// Import DotEnv URL PREFIX
$url_prefix = $_ENV['URL_PREFIX'];

// Empty error
$error = "";

// If form is submitted
if (isset($_POST["register-button"])) {

    // Grab and sanitize input
    $first_name = test_input($_POST["first-name"]);
    $last_name = test_input($_POST["last-name"]);
    $email = test_input($_POST["email"]);
    $confirm_email = test_input($_POST["confirm-email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm-password"]);
    


    // VALIDATION
    if ((empty($first_name) || empty($last_name) || empty($email) || empty($confirm_email) || empty($password) || empty($confirm_password)) && isset($_POST['agree']))  {

        // Empty fields error
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Empty fields!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   elseif  (!preg_match("/^[a-zA-Z]*$/",$first_name))   {

        // Invalid name error
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid name!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   elseif  (!preg_match("/^[a-zA-Z]*$/",$last_name))   {

        // Invalid last name error
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid last name!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   elseif  (!filter_var($email, FILTER_VALIDATE_EMAIL))    {

        // Invalid email error
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid email!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   elseif  (!filter_var($confirm_email, FILTER_VALIDATE_EMAIL))    {

        // Invalid conf email error
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid confirmation email!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   elseif  ($email!=$confirm_email)    {

        // Emails don't match error
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Emails don't match!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   elseif  ($password!=$confirm_password)  {

        // Passwords don't match error
        $error = "<div class='alert alert-danger alert-dismissible'><strong>Passwords don't match!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   else    {

        // Check if email already exists
        $query = "SELECT * FROM users WHERE email = '$email'";
        
        // Result from DB
        $result = mysqli_query($db, $query)
            or die(mysqli_error($db));

        // Row count
        $count = mysqli_num_rows($result);

        // If rows found
        if($count>=1){

            // User exists error
            $error = "<div class='alert alert-danger alert-dismissible'><strong>User exists! Please try registering again with a different email address!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }   else    {

        // Prepare and bind statement
        $stmt = $db->prepare("INSERT INTO email_verification (email, selector, token, expires) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $email, $selector, $hashed_token, $expires);

        // Random string of 8 converted to hex
        $selector = bin2hex(random_bytes(8)); 

        // Generate a random string
        $token = random_bytes(32); 

        // I turn the $token from bin to hex in the url 
        $url = $url_prefix."php/create_new_user.php?selector=".$selector."&validator=".bin2hex($token); 

        // Expiration for token is 15 mins (in seconds) from the moment we create it
        $expires = date("U") + 450; 

        // Query to delete other tokens created for the same user
        $delete_token_query = "DELETE FROM email_verification WHERE email = '$email'";

        // Deletes multiple tokens for the same user
        mysqli_query($db, $delete_token_query); 

        // Hash token
        $hashed_token = md5($token);

        // Execute statement 
        $stmt->execute();

        // CLose statement
        $stmt->close();

        // Pass to session
        $_SESSION["first-name"] = $first_name;
        $_SESSION["last-name"] = $last_name;
        $_SESSION["register-email"] = $email;
        $_SESSION["password"] =$password;


        // The message that the user will receive in his email
        $msg_body = "Click this link to verify your email: $url"; 

        //Subject of email
        $subject = "Verify your email";

        $error = "<div class='alert alert-success alert-dismissible'><strong>We sent you a link in your inbox to verify your email!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        // Sends the email to the user
        require_once 'send_test_mail.php'; 
        }

    }

}

?>