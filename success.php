<?php 

require_once "PHP/loader.php";

loadTopElements("ABOUT");
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<div class="app-layout">
    <div class="banner"> 
    <h1>Transaction SUCCESSFUL </h1>

    <a class="button" href=<?php echo PAGE_SHOP; ?>>Crate a NEW ORDER</a>
    <a class="button"  href=<?php echo PAGE_HOME; ?>>Return to the HOME PAGE</a>
    </div>
</div>

<?php loadComponent("footer");?>