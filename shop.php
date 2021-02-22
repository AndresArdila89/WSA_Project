<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-02-08    project created
#Andres Ardila (student_id)   2021-02-08    implement css grid
#Andres Ardila (student_id)   2021-02-08    created a grid to place all containers
#Andres Ardila (student_id)   2021-02-08    created the loader.php file
#Andres Ardila (student_id)   2021-02-12    code the resposive design of the HOME page
#Andres Ardila (student_id)   2021-02-16    added the banner
#Andres Ardila (student_id)   2021-02-19    created the buying and order pages links
#Andres Ardila (student_id)   2021-02-19    added dinamic title to the tabs
#Andres Ardila (student_id)   2021-02-19    fixed comments format
#Andres Ardila (student_id)   2021-02-21    refactor the head
#Andres Ardila (student_id)   2021-02-21    make the nav bar tabs dinamic
#Andres Ardila (student_id)   2021-02-21    add the the links to the adds images
#Andres Ardila (student_id)   2021-02-21    added a boolean parameter to the loadImage function

?>
<?php require_once "includes/loader.php";?>
<?php loadTopElements("SHOP");?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->

<div class="app-layout">
    <div class="banner"> <?php loadImage('banner.jpg','image-full-width');?></div>
    <div class="about">
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
       <p>item one</p>
    </div>
    <div class="sidebar">SIDEBAR</div>
    <div class="advert">ADS</div>
    <div class="content">CONTENT</div>
    <div class="wide-content">WIDE CONTENT</div>
</div>

<?php loadComponent("footer");?>