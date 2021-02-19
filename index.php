<?php
  // The loader.php file is included in order to call all 
  // the functions required to load reusable html code.
  include "includes/loader.php";
  // the loadComponet function receives as a parameter a string 
  // with the name of the componet that should be included.
  loadHead("Home");
  loadComponent("topBar");
  loadComponent("navbar");
  // $ads_array contain all the images names for the adds 
  $ads_array = array('ads_1.png','ads_2.png','ads_3.png');
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->

<div class="app-layout">


    <div class="banner"> 
      <?php adsRandom(FILE_BANNER_IMAGES,'image-full-width'); ?>
    </div>
    <h1 class="page_title">Homepage</h1>

    <div class="about">
       <p>Php Mug</p>
       <p>Python Mug</p>
       <p>C++ Mug</p>
       <p>C Mug</p>
       <p>JavaScript Mug</p>
       <p>Dart Mug</p>
    </div>
    <div class="sidebar">SIDEBAR</div>
    <div class="advert"><?php adsRandom($ads_array,'adsRandom'); ?></div>
    <div class="content">CONTENT</div>
    <div class="wide-content">WIDE CONTENT</div>
</div>

<?php loadComponent("footer");?>