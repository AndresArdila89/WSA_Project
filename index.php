<?php require_once "includes/loader.php";?>
<?php loadTopElements("HOME");
$ads_array = array('ads_1.png','ads_2.png','ads_3.png');
?>
<!-- app-layout wraps the entire page, the page is build using css GRID.-->

<div class="app-layout">

    <div class="banner"> 
      <?php loadImage("banner.jpg",'image-full-width'); ?>
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
    
    <div class="advert" id="ads"><?php adsRandom($ads_array,'adsRandom'); ?></div>
    <div class="content">CONTENT</div>
    <div class="wide-content">WIDE CONTENT</div>
</div>

<?php loadComponent("footer");?>