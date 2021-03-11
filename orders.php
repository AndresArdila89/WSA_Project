<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-03-03    background change deepending on the GET['command]
#Andres Ardila (student_id)   2021-03-04    added the loadOrders function 
#Andres Ardila (student_id)   2021-03-04    added all orders title
require_once "includes/loader.php";
loadTopElements("ABOUT");
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<div class="app-layout">
    <div class="banner"> <h1 class="center-text">All Orders</h1> </div>
    <div class="about <?php bgChange();?>"> <?php loadOrders();?> </div>
    <div class="sidebar">SIDEBAR</div>
    <div class="advert">ADVERT</div>
    <div class="content">CONTENT</div>
    <div class="wide-content">WIDE CONTENT</div>
</div>

<?php loadComponent("footer");?>