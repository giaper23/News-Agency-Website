<!-- Import Header -->
<?php 

// Import header
require_once 'header.php';

require_once 'php/db_connect.php';

require_once 'php/sanitize.php';

require_once 'php/bring_articles/bring_popular.php';


$comment_error = "";

// Grab article id from url
$article_id = test_input($_GET["article"]);

// Query to bring row 
$article_query = "SELECT * FROM articles WHERE article_id='$article_id'";

// Result from DB
$result = mysqli_query($db, $article_query)
or die(mysqli_error($db));

// Row count
$count = mysqli_num_rows($result);

// Fetch array with 
$article_row = mysqli_fetch_assoc($result);



// If rows found
if($count>=1){

  // Query to bring row 
  $related_query = "SELECT * FROM articles WHERE article_category='".$article_row['article_category']."'";

  // Result from DB
  $related_result = mysqli_query($db, $related_query)
  or die(mysqli_error($db));

  // Row count
  $related_count = mysqli_num_rows($related_result);

  // Random number
  $random1 = rand(0,$related_count-1);
  $random2 = rand(0,$related_count-1);
  $random3 = rand(0,$related_count-1);

  if ($related_count>=1)  {

    // Query to bring row 
    $comments_query = "SELECT * FROM comments WHERE article_id='$article_id'";

    // Result from DB
    $comments_result = mysqli_query($db, $comments_query)
    or die(mysqli_error($db));

    // Comments count
    $comments_count = mysqli_num_rows($comments_result);

    // Spit all rows array
    while ($related_row = mysqli_fetch_assoc($related_result)) {

      // Array that holds all rows
      $related_articles[] = array_reverse($related_row);

    }

  } else {

    // Error
    echo "Fetching related articles failed!";

  }

  // Import comment file
  require_once 'php/comment.php';

  echo '  <div class="container-fluid">
  <div class="row justify-content-center">
    '.$comment_error.'
  </div>
</div>';
  
  // Import file that brings comments
  require_once 'php/bring_comments.php';

  echo '<!--ARTICLES PLACE-->
  <div class="container article-container">
          <div class="row">
              <!--ARTICLES-->
              <div class="col-md-7 col-sm-12 articles">
                  <h5 class="country"><i style = "text-transform:capitalize;">'.$article_row["article_category"].'</i></h5> <!--Category-->
                  <h1 class="article-title"><strong>'.$article_row["article_title"].'</strong></h1> <!--TITLE-->
                  <span><strong>'.$article_row["article_post_timestamp"].'</strong></span> <!--AUTHOR-TIMESTAMP -->
  
                  <div class="col article-image"> <!--ARTICLE IMAGE-->
                      <img src="'.$article_row["article_image"].'" class="img-fluid img-thumbnail" alt="news">
                  </div>
                  <hr>
                  <div class="col article-content"> <!--ARTICLE CONTENT-->
                    <p>'.$article_row["article_text"].'</p> 
                  </div> 
                <hr>

        <div class="container"><!-- RELATED POSTS-->
          <div class="row">
                <div class="col rel-posts">
                      <strong>Related Posts:</strong>
                </div>
          </div>
          <div class="row">
                <div class="col-md-12 related"> 
                      <div class="col-sm-12   relpost1">
                          <a href="article.php?article='.$related_articles[$random1]["article_id"].'"><img class="img-fluid" src="'.$related_articles[$random1]["article_image"].'"  alt="news" ></a>
                      </div>
                      <div class="col-sm-12 relpost2">
                          <a  href="article.php?article='.$related_articles[$random2]["article_id"].'"><img class="img-fluid" src="'.$related_articles[$random2]["article_image"].'" alt="news"></a>
                      </div>
                      <div class="col-sm-12 relpost3">
                          <a href="article.php?article='.$related_articles[$random3]["article_id"].'"><img class="img-fluid" src="'.$related_articles[$random3]["article_image"].'"  alt="news"></a> 
                      </div>
               
                </div>
            </div>
        </div>
  
  
  
  
        <div class="container"> <!--USER COMMENTS-->
        <div class="row">
        <div class="col">
          <hr>
          <strong>There are '.$comments_count.' comment(s) for this article:</strong>
        </div>
    </div>  
          '.implode(array_reverse($user_comments)).'
       </div>   
                  <!--LEAVE YOUR COMMENTS-->
       <div class="container margin-bottom">
        
       <!--   
      
          <div class="row">
            <div class="col">
             <hr>
             <strong>Leave a comment for this article:</strong><br>
            </div>
          </div> 

        -->

         <div class="row">
           <div class="col">

            <!--COMMENT FORM-->

           <!--
              
        
              <div class="form-group">
                <label for="full-name"><strong>Full Name:</strong></label>
                <input type="text" class="form-control" id="full-name"placeholder="Please enter your name here">
              </div>

            -->
          ';

          if (isset($_SESSION["email"]))  {

            echo '<form class="margin-top" id="comment-form" name="comment-form" method="post" action="'.htmlspecialchars($_SERVER['REQUEST_URI']).'">
            <div class="form-group"> <!--TEXT AREA-->
              <label for="text-area"><strong>Your Comment:</strong></label>
              <textarea class="form-control z-depth-1" id="text-area" name="text-area" rows="5" value="'.isset($_POST['text-area']).'"required placeholder="Add  your comment here"></textarea>

              <!-- reCaptcha v3 -->
              <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-comment" name="g-recaptcha-response-comment">

            </div>

            <strong>When you press submit you agree to our terms:</strong>
            <button type="submit" id="comment-button" name="comment-button" class="btn btn-primary float-right">Submit Comment</button>
          </form>';

          } else  {

            echo '<span><strong>Login to post comments!</strong></span>';

          }
              
  
          echo '</div>
          </div>
        </div>
              
     </div><!--END OF ARTICLES-->
   
             
   
   
             
   
           <!--POPULAR  -->
           <div class="col-md-4  col-sm-12">
             <div class="container-popular">
               <div class="row">
                   <div class="col articles">
                   <h1 class="article-title"><strong>Popular</strong></h1> <!--POPULAR-->
                   <hr>
                   </div>
               </div>
               <div class="container">
               
                 <div class="row">
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[0]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                        <img src="'.$popular_articles[0]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[0]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[0]["article_title"].'
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[1]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[1]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[1]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[1]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[2]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[2]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[2]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[2]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[3]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[3]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[3]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[3]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[4]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                         <img src="'.$popular_articles[4]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[4]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[4]["article_title"].' 
                            </p>
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[5]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[5]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[5]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[5]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[6]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[6]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[6]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[6]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[7]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[7]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[7]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[7]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[8]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[8]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[8]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[8]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 <div class="col-md-12">
                   <div class=" popular"> <!--POPULAR NEWS -->
                   <a href="article.php?article='.$popular_articles[9]["article_id"].'">
                     <div class="row">
                       <div class="col-md-6 pull-left">
                          <img src="'.$popular_articles[9]["article_image"].'" class=" img-fluid" alt="#">
                       </div>
                       <div class="col-md-6">
                         <div>
                           <strong class="text-muted">'.$popular_articles[9]["article_post_timestamp"].'</strong>
                           <p class="text-size">'.$popular_articles[9]["article_title"].' 
                            </p>
                           
                         </div>
                       </div>
                     </div>
                     </a>
                   </div>
                   <hr class="hr2">
                 </div>
                 </div>
                </div>

  
             </div>
           </div>
         </div><!--END OF ROW-->
   </div>       <!--    END OF  ARTICLES PLACE     -->';     
           


} else  {

  // Article not found error
  echo "Article not found!";

}

// Import footer
require_once 'footer.php';

?>