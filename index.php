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
#Andres Ardila (student_id)   2021-02-21    added a red 5px solid border to the expensive advertisement
#Andres Ardila (student_id)   2021-02-22    added the form and fixing the styling using flex
#Andres Ardila (student_id)   2021-02-22    added a validation php file to uses as fields validator
#Andres Ardila (student_id)   2021-02-23    created a function to detect if the string has a number
#Andres Ardila (student_id)   2021-02-23    created the validation for the fields first name, lastname
#                                           city, price and quantity for the shop page.
#Andres Ardila (student_id)   2021-02-24    improved the validation of the form
#Andres Ardila (student_id)   2021-02-24    added a success message when the form is fill correectly
#Andres Ardila (student_id)   2021-02-24    added the functionality of clearing all the fields when 
#                                           the form is filled correctly
#Andres Ardila (student_id)   2021-02-24    added all the constants for the form validation criteria
require_once "includes/loader.php";
loadTopElements("HOME");
?>
<!-- app-layout wraps the entire page, the page is build using css GRID.-->

<div class="app-layout">

    <div class="banner"> 
      <?php loadImage("banner.jpg",'image-full-width'); ?>
    </div>
    
    <div class="advert" id="ads"><?php adsRandom(IMAGES_ADS,'adsRandom'); ?></div>
    <div class="content">
      <p class="primary-text">
        <?php echo CONTENT_TEXT;?>
      </p>
    </div>
</div>

<?php loadComponent("footer");?>