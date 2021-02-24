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

?>
<?php require_once "includes/loader.php";?>
<?php require_once "includes/validation.php";?>
<?php loadTopElements("HOME");?>
<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<?php 
    $errorProductCode = "";
    $errorFirstName ="";
    $errorLastName = "";
    $errorCity ="";
    $errorPrice = "";
    $errorQuantity = "";
    $errorComments = "";






    if(isset($_POST["Buy"]))
    {
      $firstName = htmlspecialchars(trim($_POST['first_name']));
      $lastName = htmlspecialchars(trim($_POST['last_name']));
      $city = htmlspecialchars(trim($_POST['city']));
      $price = htmlspecialchars(trim($_POST['price']));
      $quantity = htmlspecialchars(trim($_POST['quantity']));
      $comments = htmlspecialchars(trim($_POST['comments']));

      
      //Product Code
      if($firstName == '')
      {
        $errorFirstName = "Fild must not be empty";
      }
      else
      {
        if(hasNumbers($firstName))
        {
          $errorFirstName = "Name must not contain Numbers";
        }
      }     

      //First name validation
      if($firstName == '')
      {
        $errorFirstName = "Fild must not be empty";
      }
      else
      {
        if(hasNumbers($firstName))
        {
          $errorFirstName = "Name must not contain Numbers";
        }
      }

      // Last name validation
      if($lastName == '')
      {
        $errorLastName = "Fild must not be empty";
      }
      else
      {
        if(hasNumbers($lastName))
        {
          $errorLastName = "Name must not contain Numbers";
        }
      }

      // City validation
      if($city == '')
      {
        $errorCity = "Fild must not be empty";
      }
      else
      {
        if(hasNumbers($city))
        {
          $errorCity = "Name must not contain Numbers";
        }
      }

      // Price validation
      if($price == '')
      {
        $errorPrice = "Fild must not be empty";
      }
      else
      {
        if(!is_numeric($price))
        {
          $errorPrice = "Input numbers only";
        }
      }

      // Quantity validation
      if($quantity == '')
      {
        $errorQuantity = "Fild must not be empty";
      }
      else
      {
        if(!is_numeric($quantity))
        {
          $errorQuantity = "Input numbers only";
        }
        else 
        {
          $dot = strpos($quantity,".");
          // strpos returns and integer or false in case of not finding the dot character inthe string
          // When the $dot variable is equal to any integer if takes it as a true statement.
          if($dot) 
          {
            $errorQuantity = "Input integer numbers only";
          }
        }
      }


    
    }

?>
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
                  <input type="text" id="product_code" name="product_code">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- FIRST NAME-->
                <div class="form-element">
                  <label for="first_name">First Name: <span class="form-error"><?php echo $errorFirstName; ?></span></label>
                  <input type="text" id="first_name" name="first_name" value=<?php echo $_POST['first_name'];?> >
                </div>
                <!-- LAST NAME -->
                <div class="form-element">
                  <label for="last_name">Last Name: <span class="form-error"><?php echo $errorLastName; ?></span></label>
                  <input type="text" id="last_name" name="last_name">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- CITY -->
                <div class="form-element"> 
                  <label for="city">City: <span class="form-error"><?php echo $errorCity; ?></span></label>
                  <input type="text" id="city" name="city">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- PRICE -->
                <div class="form-element"> 
                  <label for="price">Price: <span class="form-error"><?php echo $errorPrice; ?></span></label>
                  <input type="text" id="price" name="price">
                </div>
                <!-- QUANTITY -->
                <div class="form-element"> 
                  <label for="quantity">Quantity: <span class="form-error"><?php echo $errorQuantity; ?></span></label>
                  <input type="text" id="quantity" name="quantity">
                </div>
              </div>

              <!-- ROW -->
              <div class="form-section">
                <!-- COMMENTS -->
                <div class="form-element">
                  <label for="comments">Comments: <span class="form-error"><?php echo $errorComments; ?></span></label>
                  <textarea  id="comments" name="comments"></textarea>
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