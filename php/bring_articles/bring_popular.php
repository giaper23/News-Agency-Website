<?php

// Query to bring rows with comments descending order
$comments_query = "SELECT * FROM articles ORDER BY article_comment_count DESC";

// Result from DB
$result = mysqli_query($db, $comments_query)
or die(mysqli_error($db));

// Row count
$count = mysqli_num_rows($result);

// If rows found
if($count>=1){

    // Spit all rows in array
    while ($row = mysqli_fetch_assoc($result)) {

        // Array that holds all rows
        $popular_articles[] = $row;

    }

}   

?>