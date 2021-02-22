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

?>
<?php require_once "includes/loader.php";?>
<?php loadTopElements("HOME");?>
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
    
    <div class="advert" id="ads">adds</div>
    <div class="content">
    
            <form action="shop.php" method="post" class="form">
              <!-- ROW -->
              <div class="form-section"> 
                <div class="form-element">
                  <label for="product_code">Product Code:</label>
                  <input type="text" id="product_code" name="product_code">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- FIRST NAME-->
                <div class="form-element">
                  <label for="first_name">First Name</label>
                  <input type="text" id="first_name" name="first_name">
                </div>
                <!-- LAST NAME -->
                <div class="form-element">
                  <label for="last_name">Last Name</label>
                  <input type="text" id="last_name" name="last_name">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- CITY -->
                <div class="form-element"> 
                  <label for="city">City</label>
                  <input type="text" id="city" name="city">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- PRICE -->
                <div class="form-element"> 
                  <label for="price">Price</label>
                  <input type="text" id="price" name="price">
                </div>
                <!-- QUANTITY -->
                <div class="form-element"> 
                  <label for="quantity">Quantity</label>
                  <input type="text" id="quantity" name="quantity">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- COMMENTS -->
                <div class="form-element">
                  <label for="comments">Comments</label>
                  <textarea  id="comments" name="comments"></textarea>
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- COMMENTS -->
                <div class="form-element">
                  <button type="submit">Buy</button>
                </div>
              </div>
            </form>
    
    
    </div>
    <div class="wide-content">WIDE CONTENT</div>
</div>

<?php loadComponent("footer");?>