<?php require_once 'header.php'; ?>

<!--PAGE TITLE--><div class="col-12 page-place">
<h6 class="page-title">Register</h6>
</div>

      <?php require_once 'php/register_email_verification.php'; echo $error;?>

  
  <!--  REGISTER MAIN PAGE    -->
<div class="container-fluid register">
  <div class="row pt-5 pb-5">
    <div class="col">
      <div class="col-md-6 offset-md-3">
      <form id="registration-form" name="registration-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <!--FIRST ROW / FIRST NAME - LAST NAME-->
        <div class="row reg-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first-name"><strong> First Name: <span class="required">*</span></strong></label>
                    <input type="text" class="form-control float" id="first-name" name="first-name" pattern="^[a-zA-Z]*$" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>" required placeholder="Please enter your first name here " >
                </div>
                <div id="first-name-error">
            
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last-name"><strong> Last Name: <span class="required">*</span></strong></label>
                    <input type="text" class="form-control float" id="last-name" name="last-name" pattern="^[a-zA-Z]*$" value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>" required placeholder="Please enter your last name here " >
                </div>
            </div>
            <div id="last-name-error">
            
            </div>
        </div>
        <!--SECOND ROW / EMAIL - CONFIRM EMAIL-->
        <div class="row reg-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email"><strong> E-mail: <span class="required">*</span></strong></label>
                    <input type="text" class="form-control float" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required placeholder="Please enter your email here " >
                </div>
                <div id="email-error">
            
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="confirm-email"><strong> Confirm E-mail: <span class="required">*</span></strong></label>
                    <input type="text" class="form-control float" id="confirm-email" name="confirm-email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo isset($_POST['confirm-email']) ? $_POST['confirm-email'] : '' ?>" required placeholder="Please re-enter your email here " >
                </div>
            </div>
            <div id="confirm-email-error">
            
            </div>
        </div>
         <!--THIRD ROW / PASSWORD - CONFIRM PASSWORD-->
         <div class="row reg-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password"><strong> Password: <span class="required">*</span></strong></label>
                    <input type="password" class="form-control float" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required placeholder="Please enter your password here " >
                </div>
                <div id="password-error">
            
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="confirm-password"><strong> Confirm Password: <span class="required">*</span></strong></label>
                    <input type="password" class="form-control float" id="confirm-password" name="confirm-password" value="<?php echo isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '' ?>" required placeholder="Please re-enter your password here " >
                </div>
            </div>
            
        </div>

        <!--USER AGREENMENT / PRIVACY POLICY / COOKIE POLICY-->
        <div class="col">
          <div class="form-check remember-me">
            <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
            <label class="form-check-label" for="agree"><small class="float-left"><strong>By joining you agree to the User Agreenment,Privacy Policy and Cookie Policy</strong></small></label>

            <!-- reCaptcha v3 -->
            <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-register" name="g-recaptcha-response-register">

        </div>
          <button type="submit" id="register-button" name="register-button" class="btn btn-primary btn-block menu-animation">Register</button>
          <div class="error" style="visibility:hidden;" id="registration-error">
              Oti nanai
            </div>

       </div>
      </form>
      <div class="col not-member">
        <strong class="float-left">Already a member?</strong>
        <strong class="float-right">Go to <a href="login.php"> Login</a></strong>
      </div>
    </div>
  </div>
  </div>
</div>

<!--    END OF MAIN PAGE     -->

<?php require_once 'footer.php';?>