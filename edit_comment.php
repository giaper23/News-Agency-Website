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

echo '<div class="col-12 page-place">
<h6 class="page-title">Edit Comment</h6>
</div>';

if ($row1["level"] != NULL) {

    $comment_id = $_GET["comment"];

    $comments_query = "SELECT * FROM comments WHERE comment_id = '$comment_id'";

    // Result from DB
    $result2 = mysqli_query($db, $comments_query)
    or die(mysqli_error($db));

    $row2 = mysqli_fetch_assoc($result2);

    require_once 'php/update_comment.php';

echo'
<!--NEW comment PLACE-->
'.$error1.$error2.'
<div class="container">
  <div class="row">
        <div class="col">
          
          
            <form class="col-md-6 admin-form" method="post" action="'.htmlspecialchars($_SERVER['REQUEST_URI']).'">

                <div class="form-group"><!--TITLE-->
                    <label for="comment"><strong>Comment</strong></label>
                    <input type="text" class="form-control" name="text" aria-label="Title" value="'.$row2["comment_text"].'" required aria-describedby="inputGroup-sizing-default">
                </div>
                <button type="submit" name="edit-comment-button" id="edit-comment-button" class="btn btn-primary btn-block" style="margin-top:30px;">Update</button>
            </form>
        </div>
  </div>
</div>';
}   elseif (isset($_SESSION["email"]))    {

    $comment_id = $_GET["comment"];

    $comments_query = "SELECT * FROM comments WHERE comment_id = '$comment_id'";

    // Result from DB
    $result2 = mysqli_query($db, $comments_query)
    or die(mysqli_error($db));

    $row2 = mysqli_fetch_assoc($result2);

    if ($_SESSION["email"] = $row2["comment_email"])    {


        require_once 'php/update_comment.php';

        echo'
        <!--NEW comment PLACE-->
        '.$error1.$error2.'
        <div class="container">
          <div class="row">
                <div class="col">
                  
                  
                    <form class="col-md-6 admin-form" method="post" action="'.htmlspecialchars($_SERVER['REQUEST_URI']).'">
        
                        <div class="form-group"><!--TITLE-->
                            <label for="comment"><strong>Comment</strong></label>
                            <input type="text" class="form-control" name="text" aria-label="Title" value="'.$row2["comment_text"].'" required aria-describedby="inputGroup-sizing-default">
                        </div>
                        <button type="submit" name="edit-comment-button" id="edit-comment-button" class="btn btn-primary btn-block" style="margin-top:30px;">Update</button>
                    </form>
                </div>
          </div>
        </div>';


    }   else    {

        echo "Unauthorized access!";

    }

} else {

    echo "Unauthorized access!";

}

require_once 'footer.php';

?>