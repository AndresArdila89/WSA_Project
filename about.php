<?php require_once "includes/loader.php";?>
<?php loadTopElements("ABOUT");?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->
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