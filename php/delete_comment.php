<?php

session_start();

require_once 'db_connect.php';

$email = $_SESSION["email"];

$query = "SELECT * FROM users WHERE email = '$email'";

// Result from DB
$result = mysqli_query($db, $query)
or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);

if ($email != $row["email"]) {

    echo "Unauthorized access!";

}   else    {

    // If method is GET
if (isset($_GET['delete'])) {

    // Grab the id and put it in $id
    $id = $_GET["delete"];

    // The query to delete a post based on id
    $delete_comment_query = "DELETE FROM comments WHERE comment_id = '$id'";

    // Execute
    mysqli_query($db, $delete_comment_query)
    or die(mysqli_error($db));

    if  ($row["level"] != NULL) {

        // Redirect 
        header("Location: ../all_comments.php");

    }   elseif ($row["level"] == NULL)  {

        // Redirect 
        header("Location: ../my_comments.php");

    }   else    {

        echo "Error!";

    }

    

}

}

?>