<?php

// Query to bring row 
$query = "SELECT * FROM articles WHERE article_category='music' ORDER BY article_id DESC";
        
// Result from DB
$result = mysqli_query($db, $query)
or die(mysqli_error($db));

// Row count
$count = mysqli_num_rows($result);

// If rows found
if($count>=1){

    // Spit all rows array
    while ($row = mysqli_fetch_assoc($result)) {

        // Array that holds all rows
        $music_articles[] = $row;

    }

}

?>