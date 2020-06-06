<?php require_once 'header.php'; ?>

<div class="col-12 page-place">
<h6 class="page-title">Forgot Password</h6>
</div>
    <?php require_once 'php/new_password.php'; echo $error; ?>


<!--  FORGOT PASSWORD MAIN PAGE    -->
      <div class="container-fluid login">
      <div class="row pt-5 pb-5">
      <div class="col">
      <div class="col-md-6 offset-md-3">
      <form id="forgot-form" method="post" class="relative" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!--EMAIL INPUT-->
        <div class="col relative">
            <i class="icofont-user-alt-7 icofont-1x icon"></i>
        </div>
        <div class="col">
            <div class="form-group login-icon">
                <label for="email"><strong> E-mail: </strong></label>
                <input type="text" class="form-control float" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" placeholder="Please enter your email " >
            </div>
        </div>

        <!--REMEMBER ME / FORGOT PASSWORD / REGISTER LINK-->
        <div class="col">
          <div>

            <!-- reCaptcha v3 -->
            <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-forgot" name="g-recaptcha-response-forgot">

          </div>
          <button type="submit" name="forgot-button" id="forgot-button" class="btn btn-primary btn-block">Submit</button>
       </div>
      </form>
    </div>
  </div>
  </div>
</div>

<!--    END OF MAIN PAGE     -->
<?php require_once 'footer.php';?>