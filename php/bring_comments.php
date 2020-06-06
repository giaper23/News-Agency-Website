<?php

// Grab article id from url
$article_id = $_GET["article"];

// Query to bring comments for this article
$query = "SELECT * FROM comments WHERE article_id='$article_id'";
        
// Result from DB
$result = mysqli_query($db, $query)
or die(mysqli_error($db));

// Result from DB
$result2 = mysqli_query($db, $query)
or die(mysqli_error($db));



// Row count
$count = mysqli_num_rows($result);

// If rows found
if($count>=1){

    // Spit all rows in array
    while ($row = mysqli_fetch_assoc($result)) {

        // Second copy of result
  $row2 = mysqli_fetch_assoc($result2);

  $user_email = $row2["comment_email"];

  // Query to bring users from comments
  $query2 = "SELECT * FROM users WHERE email='$user_email'";

  // Result from DB
  $result3 = mysqli_query($db, $query2)
  or die(mysqli_error($db));

  $row3 = mysqli_fetch_assoc($result3);

        $user_comments[] = '<div class="row">
        <div class="card mb-3 margin-top"> <!--USER COMMENT -->
          <div class="row no-gutters">
            <div class="col-md-3">
              <img src="'.$row3["image"].'" class=" img-fluid fit" alt="user">
            </div>
            <div class="col-md-8">
              <div class="card-body">
              <small class="text-muted">'.$row["comment_post_time"].'</small>
                <h5 class="card-title"><strong>'.$row["comment_email"].': </strong></h5>
                <p class="card-text">'.$row["comment_text"].'</p>
              </div>
            </div>
          </div>
        </div>
    </div>';

    }

}   else    {

    // Echo no comments available
    $user_comments[] = "";

}

?>