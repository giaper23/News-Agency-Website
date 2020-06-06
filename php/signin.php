<?php

// Import db connection
require_once 'db_connect.php';

// Import sanitizing file
require_once 'sanitize.php';

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

// Empty error
$error = "";

// If post is submitted
if (isset($_POST["login"])) {

    $token=$_POST['g-recaptcha-response-login'];
  
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
        if (empty($_POST["email"]) || empty($_POST["password"])) {

            $error = "<div class='alert alert-danger alert-dismissible'><strong>Empty fields!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }   else    {

            // Grab and sanitize email
            $email = test_input($_POST["email"]);

            // Grab and sanitize pass
            $password = test_input($_POST["password"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $error = "<div class='alert alert-danger alert-dismissible'><strong>Invalid email!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

            }   else    {

                // Query to bring row with user based on username or email
                $query = "SELECT * FROM users WHERE email = '$email'";
        
                // Result from DB
                $result = mysqli_query($db, $query)
                or die(mysqli_error($db));

                // Row count
                $count = mysqli_num_rows($result);
        
                // If row found
                if($count==1){
                
                // Grab the data of row
                $row = mysqli_fetch_array($result);
                
                // Grab user password
                $hashed_password = $row["password"];

                if(password_verify($password, $hashed_password)) {

                    // Pass the user email to session
                    $_SESSION['email'] = $email;
                
                    // Workaround I had to find in order to redirect back to home
                    echo "<script>location.href = './index.php';</script>";

                }   else    {

                    $error = "<div class='alert alert-danger alert-dismissible'><strong>Wrong email/password!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

                }
                
            }   else    {

                $error = "<div class='alert alert-danger alert-dismissible'><strong>Wrong email/password!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

            }   
        }
        }

    }  else {

        $error = "<div class='alert alert-danger alert-dismissible'><strong>reCaptcha failed! Try again in a little while...<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }
}

?>