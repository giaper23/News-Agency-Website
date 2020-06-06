<?php require_once 'header.php';?>

<div class="col-12 page-place">
<h6 class="page-title">New Password</h6>
</div>
    <?php require_once 'php/update_password.php'; echo $error;?>


<!--  LOGIN MAIN PAGE    -->
<div class="container-fluid login">
      <div class="row pt-5 pb-5">
      <div class="col">
      <div class="col-md-6 offset-md-3">
      <form id="reset-pass-form" method="post" name="reset-pass-form" class="relative" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
        <!--PASSWORD INPUT-->
        <div class="col relative">
            <i class="icofont-key-hole icofont-1x icon"></i>
        </div>
        <div class="col">
            <div class="form-group login-icon">
                <label for="password"><strong>New Password: </strong></label>
                <input type="password" class="form-control float" id="password" required name="password" placeholder="Please enter a new password " >
            </div>
        </div>
        <!--PASSWORD INPUT-->
        <div class="col relative">
          <i class="icofont-key-hole icofont-1x icon"></i>
        </div>
        <div class="col">
            <div class="form-group login-icon">
            
            <label for="confirm-password"><strong>Confirm Password: </strong></label>
            <input type="password" class="form-control" id="confirm-password" required name="confirm-password" placeholder="Please confirm your new password " >
          </div>
        </div>

        <!--REMEMBER ME / FORGOT PASSWORD / REGISTER LINK-->
        <div class="col">
          <div>

            <!-- reCaptcha v3 -->
            <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-new-pass" name="g-recaptcha-response-new-pass">

          </div>
          <button type="submit" name="reset-pass-button" id="reset-pass-button" class="btn btn-primary btn-block">Submit</button>
       </div>
      </form>
    </div>
  </div>
  </div>
</div>

<!--    END OF MAIN PAGE     -->

<?php require_once 'footer.php';?>