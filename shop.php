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
?>

<?php require_once "includes/loader.php";?>
<?php 
require_once "includes/validation.php";
require_once 'includes/form.val.php';
?>





<?php loadTopElements("HOME");?>
<!-- app-layout wraps the entire page, the page is build using css GRID.-->

<div class="app-layout">
  <div class="banner"> 
    <?php loadImage("banner.jpg",'image-full-width'); ?>
  </div>

  <h1 class="page_title">Homepage</h1>
  
  <div class="advert" id="ads">adds</div>

  <div class="content">



    <form action="shop.php" method="post" class="form">
      <!-- ROW -->
      <div class="form-section"> 
        <div class="form-element">
          <label for="product_code">Product Code: <span class="form-error"><?php echo $errorProductCode; ?></span></label>
          <input type="text" id="product_code" name="product_code" value=<?php echo $productCode;?>>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- FIRST NAME-->
        <div class="form-element">
          <label for="first_name">First Name: <span class="form-error"><?php echo $errorFirstName; ?></span></label>
          <input type="text" id="first_name" name="first_name" value=<?php echo $firstName;?> >
        </div>
        <!-- LAST NAME -->
        <div class="form-element">
          <label for="last_name">Last Name: <span class="form-error"><?php echo $errorLastName; ?></span></label>
          <input type="text" id="last_name" name="last_name" value=<?php echo $lastName;?>>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- CITY -->
        <div class="form-element"> 
          <label for="city">City: <span class="form-error"><?php echo $errorCity; ?></span></label>
          <input type="text" id="city" name="city" value=<?php echo $city;?>>
        </div>
        <!-- PRICE -->
        <div class="form-element"> 
          <label for="price">Price: <span class="form-error"><?php echo $errorPrice; ?></span></label>
          <input type="text" id="price" name="price" value=<?php echo $price;?>>
        </div>
        <!-- QUANTITY -->
        <div class="form-element"> 
          <label for="quantity">Quantity: <span class="form-error"><?php echo $errorQuantity; ?></span></label>
          <input type="text" id="quantity" name="quantity" value=<?php echo $quantity;?>>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- COMMENTS -->
        <div class="form-element">
          <label for="comments">Comments: <span class="form-error"><?php echo $errorComments; ?></span></label>
          <textarea  id="comments" name="comments" value=<?php echo $comments;?>></textarea>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- COMMENTS -->
        <div class="form-element">
          <input type="radio" id="agree" name="terms" value="agree">
          <label for="agree">Agree</label>
        </div>
        <div class="form-element">
          <input type="radio" id="disagree" name="terms" value="disagree">
          <label for="disagree">Disagree</label>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- COMMENTS -->
        <div class="form-element">
          <button class="button" type="submit" name="Buy">Buy</button>
        </div>
      </div>
    </form>
  </div>
  <div class="wide-content">WIDE CONTENT</div>
</div>

<?php loadComponent("footer");?>