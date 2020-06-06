<footer id="footer"> <!--FOOTER CONTAINER-->
    <div class="footer-top"> <!--FOOTER TOP ROW-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 footer-info">
                    <h5>Subscribe to Cosmos News Agency!</h5>
                    <h6>Get all the news to your mailbox</h6>
                    <!--SUBSCRIBE-->
                    <form class="form-inline" id="search-2" action="php/subscribe.php">
                      <input class="form-control mr-sm-3 search" size="40" id="subscribe-email" type="search" name="subscribe" value="<?php echo isset($_POST['subscribe']) ? $_POST['subscribe'] : '' ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required placeholder="Your email address">

                      <!-- reCaptcha v3 -->
                      <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-subscribe" name="g-recaptcha-response-subscribe">
                      
                      <button class="btn btn-primary my-2 my-sm-0 searchbtn" id="subscribe-button" type="submit">Subscribe</button>

                      <!-- AJAX reponse div -->
                      <div style = "visibility: hidden" id="subscribe-error">Success message...</div>

                    </form><br>
                    <p>Learn all the news fast and reliable to your mailbox via the subscribe service.<br>
                    Your email is safe with us, we do not spam. <strong>You can unsubscribe <a href="unsub.php" class="unsub-link">here</a></strong></p>
                </div>
             <!--SOCIAL-->
                <div class="col-md-3 offset-md-3 col-sm-12 footer-contact">
                    <h5>Follow us</h5>
                    <a href="https://www.twitter.com/cna.eu"> <i class="icofont-twitter icofont-2x" style="color:#ffffff"></i></a> 
                    <a href="https://www.facebook.com/cna.eu"> <i class="icofont-facebook icofont-2x" style="color:#ffffff"></i></a> 
                    <a href="https://www.youtube.com/cna.eu"> <i class="icofont-youtube icofont-2x" style="color:#ffffff"></i></a> 
                    <a href="https://www.linkedin.com/cna.eu"> <i class="icofont-linkedin icofont-2x" style="color:#ffffff"></i></a> 
                    <a href="https://www.rss.com/cna.eu"><i class="icofont-rss icofont-2x" style="color:#ffffff"></i></a> 
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle"> <!--CONTACT US-->
        <div class="container">
          <div class="row">
              <div class="col-md-6 col-sm-12 footer-info">
                <a href="index.php">
                  <img src="img/footer-logo.png" alt="logo" width="100%" height="auto" class="img-fluid">
                </a>
              </div>
                  
                  <div class="col-md-2 offset-md-1 col-sm-12 footer-info">
                    <span><strong> Contact Us</strong></span> 
                    <p>2 Korai str. 18345<br>
                    Moschato Athens Greece</p>
                    <p><span>P:</span> +30 210 3217661<br>
                    <span>F:</span> +30 210 3217662</p>
                    <p><a href="contact.php"><span>Send us a Message</span></a></p>
                  </div>
                  <div class="col-md-3 col-sm-12 footer-info">
                      <span><strong>Code of Ethics</strong></span> 
                      <p>Seek Truth and Report It</p>
                    
                    <p>Ethical journalism should be accurate<br> 
                      and fair. Journalists should be honest and<br>
                      courageous in gathering, reporting<br>
                      and interpreting information.
                    </p>
                    <p><a href="https://www.spj.org/ethicscode.asp" target="_blank"><span>Learn More...</span></a></p>
                  </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom"> <!--COPYRIGHT-->
      <div class="container">
        <div class="row">
          <div class="col-12 copy">Copyright &copy; <span><?php echo date("Y"); ?></span>&nbsp. <span>C</span>osmos <span>N</span>ews <span>A</span>gency // designed and developed by the <span>Devilsaurs Team</span> </div>
        </div>
      </div>
    </div>
  </footer>
  </body>
</html>