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
#Andres Ardila (student_id)   2021-04-09    fix comments box from clearing after validation error
#Andres Ardila (student_id)   2021-04-28    add login condition, show login option.
#Andres Ardila (student_id)   2021-04-29    fix the form adding Product code field
#Andres Ardila (student_id)   2021-04-29    fix the form adding quatity field
#Andres Ardila (student_id)   2021-04-29    fix the form adding comments field 
#Andres Ardila (student_id)   2021-04-29    fill the combobox with a list of products from the database 
#Andres Ardila (student_id)   2021-04-30    saving purchase into the database  
#Andres Ardila (student_id)   2021-04-30    clearing the fields and setting the validations  

require_once "PHP/loader.php";
loadTopElements("SHOP");
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->

<div class="app-layout">
  <div class="about">
    <h1 class="primary-text">PLACE YOUR ORDER</h1>
  </div>
  <div class="advert primary" id="ads">
    <h2 class="lightOrange-text">Instructions</h2>

    <ul class="green-text instructions">
      <li>The product <b class='blue-text'>CODE</b> must begin with <b class='green-text'>P</b></li>
      <li>The quantity <b class='blue-text'>MUST</b> to be an <b class='green-text'>INTEGER</b></li>
      <li>All field are required except for the <b class='blue-text'>COMMENTS</b></li>
      <li>The form accepts <b class='blue-text'>ACCENTS</b></li>
      <li>You must <b class='blue-text'>AGREE</b> to continue</li>
      <li>A new window will open once the <b class='blue-text'>ORDER</b> is <b class='green-text'>PLACED</b></li>
    </ul>
  </div>

  <div class="content">
  <?php 
      $errorQuantity = "";
      $errorComments = "";
      $price="";
      $comments="";
      $success = true;
      $purchase = new Purchase();
      if(!isset($_SESSION['uuid'])){

        echo "<div> <h2> To Access this page first you need to login </h2></div>";
      }
      else 
      {
        if(isset($_POST['buy']))
        { 
          $product = new Product();
          echo $_POST['product_id']; 
          $product->load($_POST['product_id']);
          
          $purchase->setCustomerFK($_SESSION['uuid']);
          $purchase->setProductFK($_POST['product_id']);
          $purchase->setProductPrice($product->getPrice());
          
          $price = $purchase->getProductPrice();
          $comments = $purchase->getComments();

          if($errorQuantity = $purchase->setQuantity($_POST['quantity']))
          {
            $success = false;
          }
          if($errorComments = $purchase->setComments($_POST['comments']))
          {
            $success = false;
          }
          if($success)
          {
            $purchase->setSubtotal();
            $purchase->setTaxAmount();
            $purchase->setGrandTotal(); 
            $purchase->save();
            $price = "";
            $comments = "";
          }
        }
  ?>

    <form action="buy.php" method="post" class="form">
      <!-- ROW -->
      <div class="form-section"> 
        <div class="form-element">
          <label for="product_id">Product Code: <span class="form-error"></span></label>
          <select name="product_id" id="product_id">
                <?php 
                    $products = new Products();
                    foreach($products->listAll() as $id=>$product){
                        echo "<option value='$id'>" . 
                        $product->getProductCode() . " - " . 
                        $product->getDescription() . " (". 
                        $product->getPrice() .")</option>";
                    }
                ?>
          </select>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- QUANTITY -->
        <div class="form-element"> 
          <label for="quantity">Quantity: <span class="form-error"><?php echo $errorQuantity; ?></span></label>
          <input type="number" id="quantity" name="quantity" value='<?php echo $price;?>'>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- COMMENTS -->
        <div class="form-element">
          <label for="comments">Comments: <span class="form-error"><?php echo $errorComments; ?></span></label>
          <textarea  id="comments" name="comments"><?php echo $comments; ?></textarea>
        </div>
      </div>

      <!-- ROW -->
      <div class="form-section">
        <!-- COMMENTS -->
        <div class="form-element">
          <button class="button" type="submit" name="buy">Buy</button>
        </div>
      </div>
    </form>
  </div>
  <?php 
      }
?>
</div>

</div>

<?php loadComponent("footer");?>