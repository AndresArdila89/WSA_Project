<?php
  /**
   * 2/12/2021: working on the css grid trying to 
   * make the landing page responsive.
   * fix the file name of the head from header.php to head.php
   * 2/16/2021: added a banner with a picture that fits the width
   * of the page and the container hides the overflow havin a max-height of 600px
   * fix local issues where the permition of the images folder had no access
   * 
   * 
   */

  // The loader.php file is included in order to call all 
  // the functions required to load reusable html code.
  include "loader.php";
  // the loadComponet function receives as a parameter a string 
  // with the name of the componet that should be included.
  loadComponent("head");
  loadComponent("topBar");
?>





<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<?php loadComponent('navbar') ?>

<div class="app-layout">
    <div class="banner"> <img class="image-full-width" src="images/banner.jpg"> </div>
    <div class="about">
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
    </div>
    <div class="sidebar">SIDEBAR</div>
    <div class="advert">ADVERT</div>
    <div class="content">CONTENT</div>
    <div class="wide-content">WIDE CONTENT</div>
</div>

<?php loadComponent("footer");?>