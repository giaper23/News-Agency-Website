<?php

// Import sanitizing file
require_once 'sanitize.php';

// Import DotEnv recaptcha secret key
$secret_key = $_ENV['SECRET_KEY'];

    // If user submits form
    if (isset($_POST["comment-button"]))    {

        // Grab reCaptcha v3 Token 
        $token=$_POST['g-recaptcha-response-comment'];

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

        // Check if field is empty
        if (empty($_POST["text-area"]))    {

            // Error if empty
            $comment_error = "<div class='alert alert-danger alert-dismissible'><strong>Empty field!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }   else    {

            if (isset($_SESSION["email"]))  {

                // Grab the user comment
                $user_comment = test_input($_POST["text-area"]);

                // Grab the article id
                $article_id = $_GET["article"];

                // Session user email
                $poster_email = $_SESSION["email"];

                // set timezone
                date_default_timezone_set('Europe/Athens');

                // Timestamp
                $comment_post_time = date('d/m/Y H:i');

                // Prepare and bind
                $stmt = $db->prepare("INSERT INTO comments (comment_text, comment_post_time, comment_email, article_id) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $user_comment, $comment_post_time, $poster_email, $article_id);

                // Execute statement 
                $stmt->execute();

                // CLose statement
                $stmt->close();

                // COMMENTS + 1 ON ARTICLE //

                // Prepare and bind
                $stmt = $db->prepare("UPDATE articles SET article_comment_count = article_comment_count + 1 WHERE article_id = ? ");
                $stmt->bind_param("i", $article_id);
                    
                // Execute statement 
                $stmt->execute();

                // CLose statement
                $stmt->close();

                //------------------------//

                // Error not logged in
                $comment_error = "<div class='alert alert-success alert-dismissible'><strong>You posted a comment!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

            }   else    {

                // Error not logged in
                $comment_error = "<div class='alert alert-danger alert-dismissible'><strong>You have to be logged in to post comments!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

            }

        }

        }   else    {

            // Error not logged in
            $comment_error = "<div class='alert alert-danger alert-dismissible'><strong>reCaptcha failed! Try again in a little while...<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

        }

    } 


?>