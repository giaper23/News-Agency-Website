<?php 

require_once 'header.php';

$email = $_SESSION["email"];

$error1 = "";

$error2 = "";

// Authentication
$query_auth = "SELECT * FROM users WHERE email = '$email'";

// Result from DB
$result1 = mysqli_query($db, $query_auth)
or die(mysqli_error($db));

$row1 = mysqli_fetch_assoc($result1);

if ($row1["level"] != NULL) {

    $article_id = $_GET["article"];

    $articles_query = "SELECT * FROM articles WHERE article_id = '$article_id'";

    // Result from DB
    $result2 = mysqli_query($db, $articles_query)
    or die(mysqli_error($db));

    $row2 = mysqli_fetch_assoc($result2);

    // Result from DB
    $result3 = mysqli_query($db, $articles_query)
    or die(mysqli_error($db));

    $row3 = mysqli_fetch_assoc($result3);

    $category = $row3["article_category"];

    require_once 'php/update_article.php';

echo'
<div class="col-12 page-place">
<h6 class="page-title">Edit Article</h6>
</div>
<!--NEW ARTICLE PLACE-->
'.$error1.$error2.'
<div class="container">
  <div class="row">
        <div class="col">
          
          
            <form enctype="multipart/form-data" class="col-md-6 admin-form" method="post" action="'.htmlspecialchars($_SERVER['REQUEST_URI']).'">
                <div class="form-group"><!--CATEGORY-->
                    <label for="category"><strong>Category</strong></label>
                    <select name="category" id="category" class="form-control" required>
                    <option selected value="">Choose...</option>
                    <option '.($category == "art" ? 'selected' : '').' value="art">Art</option>
                    <option '.($category == "environment" ? 'selected' : '').' value="environment">Enviroment</option>
                    <option '.($category == "music" ? 'selected' : '').' value="music">Music</option>
                    <option '.($category == "politics" ? 'selected' : '').' value="politics">Politics</option>
                    <option '.($category == "science" ? 'selected' : '').' value="science">Science</option>
                    <option '.($category == "sports" ? 'selected' : '').' value="sports">Sports</option>
                    <option '.($category == "technology" ? 'selected' : '').' value="technology">Technology</option>
                    <option '.($category == "world" ? 'selected' : '').' value="world">World</option>
                    </select>
                </div>

                <div class="form-group"><!--TITLE-->
                    <label for="title"><strong>Title</strong></label>
                    <input type="text" class="form-control" name="title" aria-label="Title" value="'.$row2["article_title"].'" required pattern=".{1,70}" maxlength="70" placeholder="Title can be 70 characters long..." aria-describedby="inputGroup-sizing-default">
                </div>


                <div class="form-group"> <!--TEXT AREA-->
                        <label for="textarea"><strong>Text area</strong></label>
                        <textarea class="form-control" rows="5" name="textarea" required aria-label="Text area">'.$row2["article_text"].'</textarea>
                </div>
                <div class="form-group"> <!--UPLOAD IMAGE-->
                    <label for="image-upload"> <strong> Upload an Image</strong></label>
                    <input type="file" name="image-upload" class="form-control-file" id="image-upload">
                    <!-- reCaptcha v3 -->
                    <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-edit-article" name="g-recaptcha-response-edit-article">
                </div>
                <button type="submit" name="edit-article-button" id="edit-article-button" class="btn btn-primary btn-block" style="margin-top:30px;">Update</button>
            </form>
        </div>
  </div>
</div>';
}   else    {

    echo "Unauthorized access!";

}

require_once 'footer.php';

?>