<?php

// DB connection
require_once 'php/db_connect.php';

// Import files that bring articles
require_once 'php/bring_articles/bring_art.php';
require_once 'php/bring_articles/bring_environment.php';
require_once 'php/bring_articles/bring_music.php';
require_once 'php/bring_articles/bring_politics.php';
require_once 'php/bring_articles/bring_science.php';
require_once 'php/bring_articles/bring_sports.php';
require_once 'php/bring_articles/bring_technology.php';
require_once 'php/bring_articles/bring_world.php';


  echo '                                <!--     HOME MAIN PAGE     -->
  <!--PAGE TITLE--><div class="col-12 page-place">
  <h6 class="page-title">Welcome</h6>
</div>
  <!--ENVIRONMENT / SCIENCE-->
  <div class="container">
  <div class="row">
    <div class="col-md-6 environment"> 
    
    <!--ENVIRONMENT-->
      <h3><strong><b>Environment</b></strong></h3>
      <!--BIG ARTICLE-->
      <a href="article.php?article='.$environment_articles[0]["article_id"].'">
      <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="big-photo">
          <img src="'.$environment_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px #00963f; padding:5px; margin-top:10px;">
          <h6><strong><b>Environment</b></strong></h6>
          <p class="home-big-title">'.$environment_articles[0]["article_title"].'</p>
          <p class="date">'.$environment_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$environment_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
      <a href="article.php?article='.$environment_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-3 small-photo">
          <img src="'.$environment_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-8 small-title">
          <h6 style="text-align:left;"><strong><b>Environment</b></strong></h6>
          <p class="home-small-title">'.$environment_articles[1]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>

      <a href="article.php?article='.$environment_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-3 small-photo">
          <img src="'.$environment_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-8 small-title">
          <h6 style="text-align:left;"><strong><b>Environment</b></strong></h6>
          <p class="home-small-title">'.$environment_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>
    </div>


    <div class="col-md-6 science"> 
    
    <!--SCIENCE-->
      <h3><strong><b>Science</b></strong></h3>
       <!--BIG ARTICLE-->
       <a href="article.php?article='.$science_articles[0]["article_id"].'">
       <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="big-photo">
          <img src="'.$science_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px #7d6eb1; padding:5px; margin-top:10px;">
          <h6><strong><b>Science</b></strong></h6>
          <p class="home-big-title">'.$science_articles[0]["article_title"].'</p>
          <p class="date">'.$science_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$science_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
     <a href="article.php?article='.$science_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-3 small-photo">
          <img src="'.$science_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-8 small-title">
          <h6 style="text-align:left;"><strong><b>Science</b></strong></h6>
          <p class="home-small-title">'.$science_articles[1]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>
      <a href="article.php?article='.$science_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-3 small-photo">
          <img src="'.$science_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-8 small-title">
          <h6 style="text-align:left;"><strong><b>Science</b></strong></h6>
          <p class="home-small-title">'.$science_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
    </div>
  </div>
  </a>

<!--WORLD / SPORTS / TECHNOLOGY-->
  <div class="row">
    <div class="col-md-4 world"> <!--WORLD-->
      <h3><strong><b>World</b></strong></h3>
      <!--BIG ARTICLE-->
      <a href="article.php?article='.$world_articles[0]["article_id"].'">
      <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="photo" style="max-height: 375px; overflow: hidden;">
          <img src="'.$world_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px #da7203; padding:5px; margin-top:10px;">
          <h6><strong><b>World</b></strong></h6>
          <p class="home-big-title">'.$world_articles[0]["article_title"].'</p>
          <p class="date">'.$world_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$world_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
     <a href="article.php?article='.$world_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$world_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>World</b></strong></h6>
          <p class="home-small-title">'.$world_articles[1]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>

      <a href="article.php?article='.$world_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$world_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>World</b></strong></h6>
          <p class="home-small-title">'.$world_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>
    </div>
    
    <!--SPORTS-->
    <a href="article.php?article='.$sports_articles[0]["article_id"].'">
    <div class="col-md-4 sports"> 
      <h3><strong><b>Sports</b></strong></h3>
      <!--BIG ARTICLE-->
      <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="photo">
          <img src="'.$sports_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px #008cd3; padding:5px; margin-top:10px;">
          <h6><strong><b>Sports</b></strong></h6>
          <p class="home-big-title">'.$sports_articles[0]["article_title"].'</p>
          <p class="date">'.$sports_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$sports_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
     <a href="article.php?article='.$sports_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$sports_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Sports</b></strong></h6>
          <p class="home-small-title">'.$sports_articles[1]["article_title"].'e</p>
        </div>
      </div>
      </div>
      </a>

      <a href="article.php?article='.$sports_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$sports_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Sports</b></strong></h6>
          <p class="home-small-title">'.$sports_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>
    </div>

    <!--TECHNOLOGY-->
    <div class="col-md-4 technology"> 
      <h3><strong><b>Technology</b></strong></h3>
      <!--BIG ARTICLE-->
      <a href="article.php?article='.$technology_articles[0]["article_id"].'">
      <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="photo">
          <img src="'.$technology_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px #e40311; padding:5px; margin-top:10px;">
          <h6><strong><b>Technology</b></strong></h6>
          <p class="home-big-title">'.$technology_articles[0]["article_title"].'</p>
          <p class="date">'.$technology_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$technology_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
     <a href="article.php?article='.$technology_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$technology_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Technology</b></strong></h6>
          <p class="home-small-title">'.$technology_articles[1]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>

      <a href="article.php?article='.$technology_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$technology_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Technology</b></strong></h6>
          <p class="home-small-title">'.$technology_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
    </div>
    </a>

    <!--ART-->
    <div class="col-md-4 art"> 
      <h3><strong><b>Art</b></strong></h3>
      <!--BIG ARTICLE-->
      <a href="article.php?article='.$art_articles[0]["article_id"].'">
      <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="photo">
          <img src="'.$art_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px #e5007e; padding:5px; margin-top:10px;">
          <h6><strong><b>Art</b></strong></h6>
          <p class="home-big-title">'.$art_articles[0]["article_title"].'</p>
          <p class="date">'.$art_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$art_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
     <a href="article.php?article='.$art_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$art_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Art</b></strong></h6>
          <p class="home-small-title">'.$art_articles[1]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>

      <a href="article.php?article='.$art_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$art_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Art</b></strong></h6>
          <p class="home-small-title">'.$art_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>
    </div>

    <!--MUSIC-->
    <div class="col-md-4 music"> 
      <h3><strong><b>Music</b></strong></h3>
      <!--BIG ARTICLE-->        
      <a href="article.php?article='.$music_articles[0]["article_id"].'">
      <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="photo">
          <img src="'.$music_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="article image">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px darkgoldenrod; padding:5px; margin-top:10px;">
          <h6><strong><b>Music</b></strong></h6>
          <p class="home-big-title">'.$music_articles[0]["article_title"].'</p>
          <p class="date">'.$music_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$music_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
      <a href="article.php?article='.$music_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$music_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Music</b></strong></h6>
          <p class="home-small-title">'.$music_articles[1]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>

      <a href="article.php?article='.$music_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$music_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Music</b></strong></h6>
          <p class="home-small-title">'.$music_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
    </div>
    </a>

    <!--POLITICS-->
    <div class="col-md-4 politics"> 
      <h3><strong><b>Politics</b></strong></h3>
      <!--BIG ARTICLE-->
      <a href="article.php?article='.$politics_articles[0]["article_id"].'">
      <div class="col white" style="border: solid 2px black; padding:5px;">
        <!--BIG PHOTO-->
        <div class="photo">
          <img src="'.$politics_articles[0]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <!--BIG TEXT-->
        <div class="article-text" style="border: solid 2px #ea00ff; padding:5px; margin-top:10px;">
          <h6><strong><b>Politics</b></strong></h6>
          <p class="home-big-title">'.$politics_articles[0]["article_title"].'</p>
          <p class="date">'.$politics_articles[0]["article_post_timestamp"].'</p>
          <p class="home-article">'.$politics_articles[0]["article_text"].'</p>
        </div>
      </div>
      </a>

      <!--SMALL ARTICLES-->
     <a href="article.php?article='.$politics_articles[1]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$politics_articles[1]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Politics</b></strong></h6>
          <p class="home-small-title">'.$politics_articles[1]["article_title"].'</p>
        </div>
      </div>
      </div>
      </a>

      <a href="article.php?article='.$politics_articles[2]["article_id"].'">
      <div class="col small-articles">
        <div class="row">
        <div class="col-md-5 small-photo">
          <img src="'.$politics_articles[2]["article_image"].'" class="img-fluid img-thumbnail" alt="#">
        </div>
        <div class="col-md-6 small-title">
          <h6 style="text-align:left;"><strong><b>Politics</b></strong></h6>
          <p class="home-small-title">'.$politics_articles[2]["article_title"].'</p>
        </div>
      </div>
      </div>
    </div>
    </a>
    </div>
</div>';

?>