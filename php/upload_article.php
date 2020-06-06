<?php

require_once 'sanitize.php';

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

$error = "";

if (isset($_POST["new-article-button"])) {

    $token=$_POST['g-recaptcha-response-upload-article'];
  
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

        
        $category = test_input($_POST["category"]);
        $title = test_input($_POST["title"]);
        $text = test_input($_POST["textarea"]);
        $image_path = $_FILES['image-upload']['tmp_name'];

        $type = pathinfo($image_path, PATHINFO_EXTENSION);
        $data = file_get_contents($image_path);
        $encoded_image = 'data:image/' . $type . ';base64,' . base64_encode($data);

        

        // Prepare and bind
        $stmt = $db->prepare("INSERT INTO articles (article_title, article_text, article_image, article_category, article_post_timestamp) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $text, $encoded_image, $category, $article_timestamp);

        // set timezone
        date_default_timezone_set('Europe/Athens');

        // Timestamp
        $article_timestamp = date('d-m-Y H:i');
        
        // Execute statement 
        $stmt->execute();

        // CLose statement
        $stmt->close();

        $error = "<div class='alert alert-success alert-dismissible'><strong>Article uploaded!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   else    {

        $error = "<div class='alert alert-danger alert-dismissible'><strong>reCaptcha failed! Please try again in a little while...<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }

}

?>