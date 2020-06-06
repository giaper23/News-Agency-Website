<?php

require_once 'header.php';

require_once 'php/db_connect.php';

require_once 'php/sanitize.php';

$article_category = test_input($_GET["category"]);

// Query to bring row 
$query = "SELECT * FROM articles WHERE article_category='$article_category' ORDER BY article_id DESC";
        
// Result from DB
$result = mysqli_query($db, $query)
or die(mysqli_error($db));

$result2 = mysqli_query($db, $query)
or die(mysqli_error($db));

// Row count
$count = mysqli_num_rows($result);

$row_cat = mysqli_fetch_assoc($result2); 

echo '<!--PAGE TITLE--><div class="col-12 page-place">
        <h6 class="page-title">'.$row_cat["article_category"].'</h6>
      </div><div class="container">
<div class="row margin-bottom article-row">';

// If rows found
if($count>=1){

    // Spit all rows in array
    while ($row = mysqli_fetch_assoc($result)) {

        echo '
        
          <div class="col-md-4 float-left med-article">
          <a href="article.php?article='.$row["article_id"].'">
            <div class="image-big">
              <img src="'.$row["article_image"].'" class="img-fluid img-thumbnail" alt="image"/>
            </div>
            <div class="text-big"><!--TEXT AND READ MORE-->
              <span><strong>'.$row["article_post_timestamp"].'</strong></span>
              <p class="home-big-title">'.$row["article_title"].'</p>
              <p class="article">'.$row["article_text"].'</p>
              <a href="article.php?article='.$row["article_id"].'" class="btn btn-primary float-right menu-animation" style="width:100%">Read More...</a>
            </div></a>
          </div>
          ';  

    }

}

echo '</div>
</div>';

require_once 'footer.php';

?>