<?php

require_once 'db_connect.php';

// If method is GET
if (isset($_GET['delete'])) {

    // Grab the id and put it in $id
    $id = $_GET["delete"];

    // The query to delete a post based on id
    $delete_article_query = "DELETE FROM articles WHERE article_id = '$id'";

    // Execute
    mysqli_query($db, $delete_article_query);

    // Redirect 
    header("Location: ../all_articles.php");

}
?>
