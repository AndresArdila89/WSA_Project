<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-03-03    background change deepending on the GET['command]
#Andres Ardila (student_id)   2021-03-06    added the loadOrders function 
#Andres Ardila (student_id)   2021-03-06    added all orders title
#Andres Ardila (student_id)   2021-04-28    created conditional to determine if the user is login or not

require_once "PHP/loader.php";
loadTopElements("ABOUT");
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<div class="app-layout">
    <div class="banner"> 
            <h1 class="center-text primary-text">All Orders</h1>
            <a href="orders.php?command=print" class="link_button_primary">Print Mode</a>
            <a href="orders.php?command=color" class="link_button_primary">Color Mode</a>
            <div>
                <input id="search" type="date" value="2021-03-01">
                <button onclick="search()">Search by date</button>
            </div>
    </div>
    <div class="about">
    
     <?php 
        if(isset($_SESSION['uuid']))
        {
            ?>
                
            <table class="table" id="purchases_table">
                <script>search();</script>
            </table>

            <?php
        }
        else
        {
            echo "<div> <h2> To Access this page first you need to login </h2></div>";
        }
     ?> 
     
     </div>
    
</div>

<?php loadComponent("footer");?>