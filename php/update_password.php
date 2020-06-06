<?php

// Connection to db
require_once 'db_connect.php'; 

// The selector from url
$selector = $_GET['selector'];

// Validator from url in hex
$validator = $_GET['validator'];

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

// Empty the success or failed response
$error = ""; 

// If either is empty
if (empty($selector) || empty($validator)) {

    // Error message
    $error = "<div class='alert alert-danger alert-dismissible'><strong>Something went wrong, please try registering again!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
        
}   else {

    if (ctype_xdigit($selector) !== FALSE && ctype_xdigit($validator) !== FALSE) {

            // Check the date and if db has this selector and validator for this email

            // The current date and time in ms
            $date = date("U");

            // From hex to bin
            $validator = hex2bin($validator);

            // Encrypt validator
            $hashed_validator = md5($validator);

            // Check token in md5 with db
            $check_token_query = "SELECT * FROM password_reset WHERE (selector = '$selector' AND token = '$hashed_validator' AND expires >= '$date')"; 

            // The results from db
            $results = mysqli_query($db, $check_token_query); 

            // If rows return
            if (mysqli_num_rows($results) > 0) {

                if (isset($_POST["reset-pass-button"]))   {

                $token=$_POST['g-recaptcha-response-new-pass'];
  
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
                
                // Grab pass and conf pass
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm-password"];

                // If passwords empty
                if (empty($password) || empty($confirm_password))   {

                    // Error message
                    $error = "<div class='alert alert-danger alert-dismissible '><strong>Empty fields!</strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

                }   else    {

                    // Pass the results in array named $row
                    $row = mysqli_fetch_array($results);

                    // The email accosiated with the token
                    $token_email = $row["email"]; 
                
                    // Deletes the entry when used
                    $delete_used_token_query = "DELETE FROM password_reset WHERE email = '$token_email'"; 
                
                    // The query to delete when not needed anymore
                    mysqli_query($db, $delete_used_token_query); 
                
                    // Prepare and bind
                    $stmt = $db->prepare("UPDATE users SET password = ? WHERE email = ?");
                    $stmt->bind_param("ss", $hashed_password, $token_email);

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Execute statement 
                    $stmt->execute();

                    // CLose statement
                    $stmt->close();

                    // Success message
                    $error = "<div class='alert alert-success alert-dismissible '><strong>Password successfully changed!</strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

                }

            }   else    {

                // Error message
                $error = "<div class='alert alert-danger alert-dismissible '><strong>reCaptcha failed! Try again in a little while...</strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

            }
  
        } 

    }   else    {

                // Error message
                $error = "<div class='alert alert-danger'><strong>Something went wrong! Please try again with a new link!</strong></div>"; // Not right selector/validator or 15mins passed and token expired!

            }

        } else {
            // Error message
            $error = "<div class='alert alert-danger'><strong>Something went wrong! Please try again with a new link!</strong></div>"; // Not right selector/validator or 15mins passed and token expired!

        }
      
    }
?>