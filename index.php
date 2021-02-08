<?php 
  // The loader.php file is included in order to call all 
  // the functions required to load reusable html code.
  include "loader.php";
  // the loadComponet function receives as a parameter a string 
  // with the name of the componet that should be included.
  loadComponent("header");
?>

<div class="top-bar primary">
  <span>FREE SHIPPING</span>
  <span>FREE SHIPPING</span>
  <span>FREE SHIPPING</span>
</div>



<!-- 
app-layout wraps the entire page, the page is build using css GRID.
     
-->
<div class="app-layout">
    <div class="header"><?php loadComponent('navbar') ?></div>
    <div class="sidebar">SIDEBAR</div>
    <div class="advert">ADVERT</div>
    <div class="content">CONTENT</div>
    <div class="footer">FOOTER</div>
</div>

<?php include "components/footer.php"?>

