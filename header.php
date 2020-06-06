<?php 

// Start session
session_start();

// ------ DotEnv Import ----------------------------
require './vendor/autoload.php';

// Needs other path when not in root folder but as we are in root this works
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
//--------------------------------------------------

// Import recaptcha keys
$site_key= $_ENV['SITE_KEY'];

// Db connection
require_once 'php/db_connect.php';

echo '<!doctype html>
  <html lang="en">
    <head>
  
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="icon"  type="image/ico" href="img/fav.ico">
      <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
      
      <!-- Bootstrap / CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="icofont/icofont.min.css">
      <link rel="stylesheet" href="css/style2.css" type="text/css"/>
  
      <!-- jQuery -->
      <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
  
      <!-- JS -->
      <script defer src="js/script.js"></script>
  
      <!-- reCaptcha v3 -->
      <script src="https://www.google.com/recaptcha/api.js?render='.$site_key.'"></script>
      <script>
        grecaptcha.ready(function() {
        grecaptcha.execute("'.$site_key.'", {action: "homepage"}).then(function(token) {
  
          document.querySelectorAll(".g-recaptcha-response").forEach(elem => (elem.value = token));
          
          });
      });
      </script>
    <title>CNA :: Cosmos News Agency</title>
    </head>
   
    <body>
        <!--HEADER-->
          <!--FIRST ROW-->
    <div class="container-fluid black-header sticky-top">
        <div class="container">
          <div class="row ">
              <!--LOGO-->
              <div class="col-md-5 col-sm-12 height">
                  <a class="navbar-brand" href="index.php">
                  <img src="img/header-logo.png" width="100%" height="auto" class="d-inline-block" alt="logo">
                  </a>
              </div>
              <!--SEARCH-->
              <div class="col-md-3 col-sm-12 search first-row ">
                  <div class="input-group search-div">
                  <div class="dropdown">
                  <input class="form-control" type="search" placeholder="Search..." name="search-input" id="search-input">
                  <div class=""dropdown-content>
                    <ul id="search-results">
                    </ul>
                  </div>
                  </div>
                  <!-- reCaptcha v3 -->
                  <input type="hidden" class="g-recaptcha-response" id="g-recaptcha-response-search" name="g-recaptcha-response-search">
              </div>
              </div>';

if  (isset($_SESSION['email']))  {

  // Pass value in variable email
  $email = $_SESSION['email'];

  // Query to get user row
  $query = "SELECT * FROM users WHERE email = '$email'";

  // Result from DB
  $result = mysqli_query($db, $query)
  or die(mysqli_error($db));

  // Fetch array with 
  $row = mysqli_fetch_assoc($result);
  
  echo '<!--LOGIN - REGISTER-->
              <div class="col-md-3 col-sm-12 offset-md-1 first-row username"><p id="timestamp">'; 
              
              // Import date widget
              require_once 'php/timestamp.php'; 
              
              echo '</p>
                <p class="loggedin" style="color: white"><a href="profile.php?profile='.$row["id"].'"><strong>'.$_SESSION["email"].'</strong></a><span class="pl-3"><a href="php/logout.php">Logout</a></span>
              </div>
        </div>
      </div>';

} else  {

  echo '<!--LOGIN - REGISTER-->
        <div class="col-md-3 col-sm-12 offset-md-1 first-row"><p id="timestamp">'; 
        
        // Import date widget
        require_once 'php/timestamp.php'; 
        
        echo'</p>
            <div class="btn-group" role="group">
              <a href="registration.php" class="btn btn-outline-secondary regbtn"><strong>Register</strong></a>
              <a href="login.php" class="btn btn-outline-secondary logbtn"><strong>Login</strong></a>
            </div>
            </div>
        </div>
      </div>';

}

echo '<!--SECOND ROW-->
<!--NAVBAR-->
<div class="container nav-mobile">
<div class="row">
  <div class="col">
      <nav class="navbar  navbar-expand-lg navbar-dark">
      <a href="#" class="navbar-brand"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav menu">
            <li class="nav-item menu-animation">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=art">Art</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=environment">Enviroment</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=music">Music</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=politics">Politics</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=science">Science</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=sports">Sports</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=technology">Technology</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="category.php?category=world">World</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item menu-animation">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
        </div>
      </nav>
    </div>
</div>
</div>
</div> ';

?>