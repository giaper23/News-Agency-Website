<?php

require_once 'sanitize.php';

$error1 = "";

// Pass article id from url
$article_id = test_input($_GET["article"]);

if (isset($_POST["edit-article-button"])) {

    $image_path = $_FILES['image-upload']['tmp_name'];

    if (empty($image_path)) {

        $category = test_input($_POST["category"]);
        $title = test_input($_POST["title"]);
        $text = test_input($_POST["textarea"]);

        // Prepare and bind
        $stmt = $db->prepare("UPDATE articles SET article_title = ?, article_text = ?, article_category = ?, article_edit_timestamp = ? WHERE article_id = ? ");
        $stmt->bind_param("sssss", $title, $text, $category, $edit_article_timestamp, $article_id);

        // set timezone
        date_default_timezone_set('Europe/Athens');

        // Timestamp
        $edit_article_timestamp = date('d-m-Y H:i');

        // Execute statement 
        $stmt->execute();

        // CLose statement
        $stmt->close();

        $error1 = "<div class='alert alert-success alert-dismissible'><strong>Article updated!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   elseif (isset($image_path) && $image_path != "")    {

        $category = test_input($_POST["category"]);
        $title = test_input($_POST["title"]);
        $text = test_input($_POST["textarea"]);

        $image_path = $_FILES['image-upload']['tmp_name'];

        $type = pathinfo($image_path, PATHINFO_EXTENSION);
        $data = file_get_contents($image_path);
        $encoded_image = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // Prepare and bind
        $stmt = $db->prepare("UPDATE articles SET article_title = ?, article_text = ?, article_image = ?, article_category = ?, article_edit_timestamp = ? WHERE article_id = ? ");
        $stmt->bind_param("ssssss", $title, $text, $encoded_image, $category, $edit_article_timestamp, $article_id);

        // set timezone
        date_default_timezone_set('Europe/Athens');

        // Timestamp
        $article_timestamp = date('d-m-Y H:i');
        
        // Execute statement 
        $stmt->execute();

        // CLose statement
        $stmt->close();

        $error1 = "<div class='alert alert-success alert-dismissible'><strong>Article updated!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }   else    {

        echo "Image error!";

    }

        

        

    }

?>