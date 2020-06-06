<?php

require_once 'sanitize.php';

$error1 = "";

// Pass article id from url
$comment_id = test_input($_GET["comment"]);

if (isset($_POST["edit-comment-button"])) {

        $text = test_input($_POST["text"]);

        // Prepare and bind
        $stmt = $db->prepare("UPDATE comments SET comment_text = ?, comment_edit_time = ? WHERE comment_id = ? ");
        $stmt->bind_param("sss", $text, $edit_comment_timestamp,$comment_id);

        // set timezone
        date_default_timezone_set('Europe/Athens');

        // Timestamp
        $edit_comment_timestamp = date('d-m-Y H:i');

        // Execute statement 
        $stmt->execute();

        // CLose statement
        $stmt->close();

        $error1 = "<div class='alert alert-success alert-dismissible'><strong>Comment updated!<strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";

    }

?>