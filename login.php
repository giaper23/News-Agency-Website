<?php require_once 'header.php'; ?>

<!--PAGE TITLE-->
<div class="col-12 page-place">
<h6 class="page-title">Login</h6>
</div>
    <?php require_once 'php/signin.php'; echo $error; ?>


<!--  LOGIN MAIN PAGE    -->
      <div class="container-fluid login">
      <div class="row pt-5 pb-5">
      <div class="col">
      <div class="col-md-6 offset-md-3">
      <form id="login-form" method="post" class="relative" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
        <!--PASSWORD INPUT-->
        <div class="col relative">
          <i class="icofont-key-hole icofont-1x icon"></i>
        </div>
        <div class="col">
            <div class="form-group login-icon">
            
            <label for="password"><strong> Password: </strong></label>
            <input type="password" class="form-control" id="password" required name="password" placeholder="Please enter your password " >
          </div>
        </div>
        <!--SUCCEED / FAILED RESULT MESSAGE-->
        <div class="result">
          
        </div>
        <!--REMEMBER ME / FORGOT PASSWORD / REGISTER LINK-->
        <div class="col">
          <div class="form-check remember-me">
    <!--        <input type="checkbox" class="form-check-input" id="remember-me">
            <label class="form-check-label" for="remember-me"><small class="float-left"><strong>Remember Me</strong></small></label> -->
            

            <!-- reCaptcha v3 -->
            <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-login" name="g-recaptcha-response-login">

          </div>
          <button type="submit" name="login" id="login-button" class="btn btn-primary btn-block menu-animation">Login</button>
       </div>
      </form>
      <div class="col not-member">
        <strong class="float-left">Not a member?</strong>
        <strong class="float-left">&nbspGo to <a href="registration.php"> Register</a></strong>
        <a class="float-right" href="forgot_password.php"><small class="float-right"><strong>Forgot Password?</strong></small></a>
      </div>
    </div>
  </div>
  </div>
</div>

<!--    END OF MAIN PAGE     -->

<?php require_once 'footer.php';?>