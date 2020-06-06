 <!-- Import header -->
 <?php require_once 'header.php'; ?>

 <!--     CONTACT US MAIN PAGE     -->
  <!--PAGE TITLE-->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 page-place">
        <h6 class="page-title">Contact us</h6>
      </div>
      <?php require_once 'php/send_contact.php'; echo $error; ?>
    </div>
  </div>
  
  
    <!--MAP CONTAINER-->                  
  <div class="container">
      <div class="row">
          <div class="col-md-12 map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3146.007596400483!2d23.676718614938544!3d37.953608609623885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bc700e6dadbd%3A0xd3e5f0e32d262cc1!2zzprOv8-BzrHOriAyLCDOnM6-z4PPh86sz4TOvyAxODMgNDU!5e0!3m2!1sel!2sgr!4v1583874363666!5m2!1sel!2sgr" 
              width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
      </div>
  </div>
  <!--CONTACT CONTAINER-->
  <div class="container">
      <div class="row">
          
              <div class="col-md-3 offset-md-1"><!--OUR DETAILS-->
                  
                    <h5 class="margin-top1 team"> Our Details</h5>
                    <p class="margin-top2"><strong><u>Address:</u></strong></p> 
                      <p><strong>Korai 2 str.</strong></p>
                      <p><strong>18345 Moschato</strong></p>
                      <p><strong>Athens Greece</strong></p>
  
                      <p class="margin-top2"><strong><u>Contact Details:</u></strong></p> 
                      <p><strong>Tel: +30 1234567890</strong></p>
                      <p><strong>E-mail: <a href = "mailto: info@cosmosnewsagency.eu">info@cosmosnewsagency.eu</a></strong></p>
                      <p><strong>Website: <a href = "https://www.cosmosnewsagency.eu">www.cosmosnewsagency.eu</a></strong></p>
                  
              </div>
             
           
              
                
                <div class="col-md-7 offset-md-1"><!--GET IN TOUCH WITH US-->
                  
                     <h5 class="margin-top1 team" > Get in touch with us</h5>
            
              
               
                  <form method="post" id="contact-form" name="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!--CONTACT FORM-->
                    <div class="form-group margin-top2">
                      <label for="first-name"><strong> First Name: <span class="required">*</span></strong></label>
                      <input type="text" class="form-control" id="first-name" name="first-name" pattern="^[a-zA-Z]*$" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>" required placeholder="Please enter your first name here" >
                    </div>
                    <div class="form-group">
                      <label for="last-name"><strong> Last Name: <span class="required">*</span></strong></label>
                      <input type="text" class="form-control" id="last-name" name="last-name" pattern="^[a-zA-Z]*$" value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>" required placeholder="Please enter your last name here" >
                    </div>
                    <div class="form-group">
                      <label for="email"><strong> Email: <span class="required">*</span></strong></label>
                      <input type="text" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required placeholder="Please enter your email here" >
                    </div>
                    <div class="form-group">
                      <label for="phone"><strong> Mobile Phone Number: <span class="required">*</span></strong></label>
                      <input type="text" class="form-control" id="phone" name="phone" pattern="^\d{10}$" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" required placeholder="Please enter your phone number here" >
                    </div>
                    <div class="form-group">
                      <label for="subject"><strong> Subject: <span class="required">*</span></strong></label>
                      <input type="text" class="form-control" id="subject" name="subject" value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : '' ?>" required placeholder="Please enter your subject here" >
                    </div>
                    <div class="form-group">
                      <label for="message"><strong> Your Message: <span class="required">*</span></strong></label>
                      <textarea class="form-control" rows="5" id="message" name="message" required placeholder="Please enter your message here" ><?php echo isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
                      
                      <!-- reCaptcha v3 -->
                      <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-contact" name="g-recaptcha-response-contact">

                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary float-right margin-right margin-bottom menu-animation" name="contact">Send Message</button>
                      <!-- AJAX reponse div -->
                      <div style = "visibility: hidden" id="contact-error">Success message...</div>
                    </div>
                  </form>
                </div>
             </div>
          
      
  </div>

  <!-- Import footer -->
  <?php require_once 'footer.php'; ?>