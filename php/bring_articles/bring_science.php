<?php

// Query to bring row with user based on username or email
$query = "SELECT * FROM articles WHERE article_category='science' ORDER BY article_id DESC";
        
// Result from DB
$result = mysqli_query($db, $query)
or die(mysqli_error($db));

// Row count
$count = mysqli_num_rows($result);

// If rows found
if($count>=1){

    // Store datat in $row
    $row = mysqli_fetch_assoc($result);

    // Spit all rows in array
    while ($row = mysqli_fetch_assoc($result)) {

        // Array that holds all rows
        $science_articles[] = $row;

    }

}
?>