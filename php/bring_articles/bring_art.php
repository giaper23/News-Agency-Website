<?php

require_once './php/db_connect.php';

// Query to bring row 
$query = "SELECT * FROM articles WHERE article_category='art'";
        
// Result from DB
$result = mysqli_query($db, $query)
or die(mysqli_error($db));

// Row count
$count = mysqli_num_rows($result);

// If rows found
if($count>=1){

    // Spit all rows in array
    while ($row = mysqli_fetch_assoc($result)) {

        // Array that holds all rows
        $art_articles[] = array_reverse($row);

    }

}

?>