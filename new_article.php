<?php 

require_once 'header.php';

$email = $_SESSION["email"];

// Authentication
$query_auth = "SELECT * FROM users WHERE email = '$email'";

// Result from DB
$result = mysqli_query($db, $query_auth)
or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);

if ($row["level"] != NULL) {

    require_once 'php/upload_article.php';

echo'
<!--NEW ARTICLE PLACE-->
<!--PAGE TITLE-->
<div class="container-fluid">
    <div class="row">
        <div class="col page-place">
          <h6 class="page-title">New Article</h6>
                    
        </div>
        
    </div>
</div>
'.$error.'
<div class="container">
  <div class="row">
        <div class="col">
          
          
            <form enctype="multipart/form-data" class="col-md-6 admin-form" method="post" action="'.htmlspecialchars($_SERVER['REQUEST_URI']).'">
                <div class="form-group"><!--CATEGORY-->
                    <label for="category"><strong>Category</strong></label>
                    <select name="category" id="category" class="form-control" required>
                    <option selected value="">Choose...</option>
                    <option value="art">Art</option>
                    <option value="environment">Environment</option>
                    <option value="music">Music</option>
                    <option value="politics">Politics</option>
                    <option value="science">Science</option>
                    <option value="sports">Sports</option>
                    <option value="technology">Technology</option>
                    <option value="world">World</option>
                    </select>
                </div>

                <div class="form-group"><!--TITLE-->
                    <label for="title"><strong>Title</strong></label>
                    <input type="text" class="form-control" name="title" aria-label="Title" required pattern=".{1,70}" maxlength="70" placeholder="Title can be 70 characters long..." aria-describedby="inputGroup-sizing-default">
                </div>


                <div class="form-group"> <!--TEXT AREA-->
                        <label for="textarea"><strong>Article</strong></label>
                        <textarea class="form-control" rows="5" name="textarea" required aria-label="Text area"></textarea>
                </div>
                <div class="form-group"> <!--UPLOAD IMAGE-->
                    <label for="image-upload"> <strong> Upload an Image</strong></label>
                    <input type="file" name="image-upload" class="form-control-file" required id="image-upload">
                    <!-- reCaptcha v3 -->
                    <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-upload-article" name="g-recaptcha-response-upload-article">
                </div>
                <button type="submit" name="new-article-button" id="new-article-button" class="btn btn-primary btn-block" style="margin-top:30px;">Upload</button>
            </form>
        </div>
  </div>
</div>';
}   else    {

    echo "Unauthorized access!";

}

require_once 'footer.php';

?>