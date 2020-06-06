<?php 

require_once 'header.php';

require_once 'php/sanitize.php';

// Grab the id of the profile
$id = test_input($_GET["profile"]);

$query = "SELECT * FROM users WHERE id = '$id'";

// Result from DB
$result = mysqli_query($db, $query)
or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);

if (isset($_SESSION["email"]) && $_SESSION["email"] == $row["email"]) {

  // Import file to change password
  require_once 'php/change_password.php';

  require_once 'php/profile_image.php';

echo '<!--    DASHBOARD MAIN PAGE     -->
<!--PAGE TITLE-->
<div class="container-fluid">
  <div class="row">
      <div class="col page-place">
        <h6 class="page-title">Profile</h6>      
      </div>
     
  </div>
</div> '.$error.$error2.'
<!--DASHBOARD PLACE-->
<div class="container dash-background">
  <div class="row">
      <div class="col-md-4 offset-md-4">
        <!--USERS IMAGE-->
        <div class="user-image-div"> 
          <img src="'.$row["image"].'" class="img-fluid user-image-img rounded-circle" alt="users image"/>
          <strong>Welcome '.$row["first_name"].'</strong>
        </div>



        <!--ACCORDION USERS PANEL-->

          
        <div class="accordion" id="accordionExample"> 
          <!-- 1 ACCOUNT OVERVIEW BUTTON-->
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-primary btn-block" role="button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Dashboard
                </button>
              </h2>
            </div>
            <!-- 1 ACCOUNT OVERVIEW CONTENT-->

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">';

            // If has priviledge
            if ($row["level"] != NULL) {
            echo'
            <div class="row"> <!--FIRST ROW BUTTONS-->
              <div class="col">
                <a href="new_article.php" class="btn btn-outline-primary btn-sm btn-article float-left"><strong>New Article</strong></a>
                <a href="all_articles.php" class="btn btn-outline-primary btn-sm btn-article float-right"><strong>Edit Article</strong></a>
              </div>
            </div>
            <div class="row"> <!--THIRD ROW BUTTONS-->
            <div class="col" id="middle-button">
              <a href="all_comments.php" class="btn btn-outline-primary btn-sm btn-article float-left"><strong>All Comments</strong></a>
            </div>
         </div>
            </div>
          </div>';

            } else  {

              echo '
            <div class="row"> <!--THIRD ROW BUTTONS-->
            <div class="col" id="middle-button">
              <a href="my_comments.php"  class="btn btn-outline-primary btn-sm btn-article float-left"><strong>My Comments</strong></a>
            </div>
         </div>
            </div>
          </div>';

            }

          echo '
          <!-- 2 ARTICLES AND COMMENTS BUTTON-->
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-primary btn-block" role="button" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Change Profile Image
                </button>
              </h2>
            </div>
            <!-- 2 ARTICLES AND COMMENTS CONTENT-->
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="'.htmlspecialchars($_SERVER['REQUEST_URI']).'">
                      <div class="form-group">
                        <label for="profile-image"><strong> Image: <span class="required">*</span></strong></label>
                        <input type="file" class="form-control float" id="profile-image" name="profile-image" required>
                        <!-- reCaptcha v3 -->
                        <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-profile-image" name="g-recaptcha-response-profile-image">
                      </div>
                        <button type="submit" name="profile-image-button" id="profile-image-button" class="btn btn-primary btn-sm float-right">Update</button>
                      </div>
                </form>
              </div>
              </div>
            </div>
          </div>
          <!-- 3 SECURITY SETTINGS BUTTON-->
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-primary btn-block" role="button" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Change Password
                </button>
              </h2>
            </div>
            <!-- 3 SECURITY SETTINGS CONTENT-->
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <form method="post" action="'.htmlspecialchars($_SERVER["REQUEST_URI"]).'">
                 <div class="form-group">
                  <label for="new-password"><strong> New Password: <span class="required">*</span></strong></label>
                  <input type="password" class="form-control float" id="new-password" name="new-password" required placeholder="Please enter your new password here " >
                  <!-- reCaptcha v3 -->
            <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-change-password" name="g-recaptcha-response-change-password">
                 </div>
                 <div class="form-group">
                  <label for="new-password-conf"><strong>Confirm New Password: <span class="required">*</span></strong></label>
                  <input type="password" class="form-control float" id="new-password-conf" name="new-password-conf" required placeholder="Please enter your new password here " >
                 </div>
                    <button type="submit" name="change-password-button" id="change-password-button" class="btn btn-primary btn-sm float-right">Update</button>
                  </div>
            </form>
              </div>
            </div>
          </div>
        </div>

     
      </div> <!--END OF COL-->
  </div> <!--END OF ROW-->
</div> <!--END OF CONTAINER-->';
} else  {

  //Unauthorized access 
  echo "Unauthorized access!";

}
require_once 'footer.php'; ?>