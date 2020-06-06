<?php

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

$error = '';

if (isset($_POST["change-password-button"]))   {

    $email = $_SESSION["email"];

$token=$_POST['g-recaptcha-response-change-password'];

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
$password = $_POST["new-password"];
$confirm_password = $_POST["new-password-conf"];

// If passwords empty
if (empty($password) || empty($confirm_password))   {

    // Error message
    $error = "<div class='alert alert-danger alert-dismissible '><strong>Empty fields!</strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

}   elseif ($password != $confirm_password) {

    // Error message
    $error = "<div class='alert alert-danger alert-dismissible '><strong>Passwords don't match!</strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

}   else    {

    // Prepare and bind
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashed_password, $email);

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

?>