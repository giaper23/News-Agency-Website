<!-- Import Header -->
<?php require_once 'header.php'; ?>

<footer id="footer"> <!--FOOTER CONTAINER-->
    <div class="footer-top"> <!--FOOTER TOP ROW-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 footer-info">
                    <h5>Unsubscribe from Cosmos News Agency</h5>
                    <h6>We are sorry to see you leave</h6>
                    <!--SUBSCRIBE-->
                    <form class="form-inline" id="search-3" action="php/unsubscribe.php">
                      <input class="form-control mr-sm-3 search" size="40" id="unsubscribe-email" type="email" name="unsubscribe" value="<?php echo isset($_POST['subscribe']) ? $_POST['subscribe'] : '' ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required placeholder="Your email address">

                      <!-- reCaptcha v3 -->
                      <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-unsubscribe" name="g-recaptcha-response-unsubscribe">
                      
                      <button class="btn btn-primary my-2 my-sm-0 searchbtn" id="unsubscribe-button" type="submit">Unsubscribe</button>

                      <!-- AJAX reponse div -->
                      <div style = "visibility: hidden" id="unsubscribe-error">Success message...</div>

                    </form><br>
                    <p>You can always subscribe again if you change your mind!</p>
                </div>
            </div>
        </div>    
    </div>
</footer>        
<!-- Import footer -->
<?php require_once 'footer.php'; ?>