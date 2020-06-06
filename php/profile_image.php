<?php

// Connection to db
require_once 'db_connect.php';

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

// Empty the variable that holds the success or fail message
$error2 = ""; 

// If method is POST
if (isset($_POST["profile-image-button"])) {

  $token=$_POST['g-recaptcha-response-profile-image'];
  
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

        $image_path = $_FILES['profile-image']['tmp_name'];

        $type = pathinfo($image_path, PATHINFO_EXTENSION);
        $data = file_get_contents($image_path);
        $encoded_image = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $email = $_SESSION["email"];

        // Prepare and bind
        $stmt = $db->prepare("UPDATE users SET image = ? WHERE email = ?");
        $stmt->bind_param("ss", $encoded_image, $email);
        
        // Execute statement 
        $stmt->execute();

        // CLose statement
        $stmt->close();

        $error2 = "<div class='alert alert-success alert-dismissible'><strong>Profile Image Updated!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
    
  
} else {

  // User not found error
  $error2 = "<div class='alert alert-danger alert-dismissible'><strong>reCaptcha failed! Please try again in a little while....<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

}

}
?>