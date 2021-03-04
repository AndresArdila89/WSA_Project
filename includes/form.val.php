<?php

$errorProductCode = "";
$errorFirstName ="";
$errorLastName = "";
$errorCity ="";
$errorPrice = "";
$errorQuantity = "";
$errorComments = "";
$errorTerms = "";
$success = false;

if(isset($_POST["Buy"]))
{
  $productCode = htmlspecialchars(trim($_POST['product_code']));
  $firstName = htmlspecialchars(trim($_POST['first_name']));
  $lastName = htmlspecialchars(trim($_POST['last_name']));
  $city = htmlspecialchars(trim($_POST['city']));
  $price = htmlspecialchars(trim($_POST['price']));
  $quantity = htmlspecialchars(trim($_POST['quantity']));
  $comments = htmlspecialchars(trim($_POST['comments']));
  if(isset($_POST['terms'])){
    $terms = htmlspecialchars(trim($_POST['terms']));
  }
  else{
    $terms = '';
  }
  

     //Product Code
      $success = true;
      if($productCode == '')
      {
        $errorProductCode = "Fild must not be empty";
        $success = false;
        
      }
      else
      { 
        if(strlen($productCode) > PRODUCT_CODE_MAX_LEN)
        {
          $errorProductCode = "cannot be longer than " . PRODUCT_CODE_MAX_LEN . " characters";
          $success = false;
        }
        else 
        {
            $char = strtolower($productCode[0]);
            if($char != PRODUCT_CODE_INIT_CHAR) 
            {
                $errorProductCode = "The code must begin with " . PRODUCT_CODE_INIT_CHAR;
                $success = false;
            }
        }
      }


      //First name validation
      if($firstName == '')
      {
        $errorFirstName = "Fild must not be empty";
        $success = false;
      }
      else
      {
        if(hasNumbers($firstName))
        {
          $errorFirstName = "Name must not contain Numbers";
          $success = false;
        }
        else
        {
            if(mb_strlen($firstName) > FIRST_NAME_MAX_LEN)
            {
                $errorFirstName = "cannot be longer than " . FIRST_NAME_MAX_LEN . " characters";
                $success = false;
            }
        }
      }

      // Last name validation
      if($lastName == '')
      {
        $errorLastName = "Fild must not be empty";
        $success = false;
      }
      else
      {
        if(hasNumbers($lastName))
        {
          $errorLastName = "Name must not contain Numbers";
          $success = false;
        }
        else
        {
            if(mb_strlen($lastName) > LAST_NAME_MAX_LEN)
            {
                $errorLastName = "cannot be longer than " . LAST_NAME_MAX_LEN . " characters";
                $success = false;
            }
        }
      }

      // City validation
      if($city == '')
      {
        $errorCity = "Fild must not be empty";
        $success = false;
      }
      else
      {
        if(hasNumbers($city))
        {
          $errorCity = "Name must not contain Numbers";
          $success = false;
        }
      }

      // Price validation
      if($price == '')
      {
        $errorPrice = "Fild must not be empty";
        $success = false;
      }
      else
      {
        if(!is_numeric($price))
        {
          $errorPrice = "Input numbers only";
          $success = false;
        }
      }

      // Quantity validation
      if($quantity == '')
      {
        $errorQuantity = "Fild must not be empty";
        $success = false;
      }
      else
      {
        if(!is_numeric($quantity))
        {
          $errorQuantity = "Use numbers only";
          $success = false;
        }
        else 
        {
          $dot = strpos($quantity,".");
          // strpos returns and integer or false in case of not finding the dot character inthe string
          // When the $dot variable is equal to any integer if takes it as a true statement.
          if($dot) 
          {
            $errorQuantity = "Whole numbers only";
            $success = false;
          }
        }
      }

      if($terms == '')
      {
        $errorTerms = "select an option";
        $success = false;
      }
      if($success){
        header("location: playground.php");
        die();
      }

}