<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-03-03    background change deepending on the GET['command]
#Andres Ardila (student_id)   2021-03-06    added the loadOrders function 
#Andres Ardila (student_id)   2021-03-06    added all orders title
require_once "PHP/loader.php";
loadTopElements("ABOUT");
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<div class="app-layout">
    <div class="banner"> 
        <h1 class="center-text primary-text">All Orders</h1>
        
            <a href="orders.php?command=print" class="link_button_primary">Print Mode</a>
            <a href="orders.php?command=color" class="link_button_primary">Color Mode</a>
   
    </div>
    <div class="about"> <?php loadOrders();?> </div>
    
</div>

<?php loadComponent("footer");?>