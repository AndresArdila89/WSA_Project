<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-04-28    creation of the file register.php
#Andres Ardila (student_id)   2021-04-28    design of the registration form 

require_once "PHP/loader.php";

loadTopElements("SIGNUP");
?>

<!-- app-layout wraps the entire page, the page is build using css GRID.-->
<div class="app-layout">
    <div class="registration"> 
       <?php

                    $errorFirstName="";
                    $errorLastName = "";
                    $errorAddress = "";
                    $errorCity = "";
                    $errorProvince = "";
                    $errorPostaCode = "";
                    $errorUserName = "";
                    $errorPassword = "";
                    $customer = new Customer();

            if(isset($_SESSION['uuid']))
            {
              echo "You must login";
            }
            else 
            {
                if(isset($_POST['signup']))
                {
                    echo 'creating user';
                    $success = true;
                    
                    if($errorFirstName = $customer->setFirstName($_POST['firstname']))
                    {
                        $success = false;
                    }
                    
                    if($errorLastName = $customer->setLastName($_POST['lastname']))
                    {
                        $success = false;
                    }
                    
                    if($errorAddress = $customer->setAddress($_POST['customer_address']))
                    {
                        $success = false;
                    }
                    
                    if($errorCity = $customer->setCity($_POST['city']))
                    {
                        $success = false;
                    }

                    if($errorProvince = $customer->setProvince($_POST['province']))
                    {
                        $success = false;
                    }

                    if($errorPostaCode = $customer->setPostaCode($_POST['postal_code']))
                    {
                        $success = false;
                    }

                    if($errorUserName = $customer->setUsername($_POST['username']))
                    {
                        $success = false;
                    }

                    if($errorPassword = $customer->setPassword($_POST['pwd']))
                    {
                        $success = false;
                    }

                    if($success)
                    {echo "user created successfully";}

                }
    
        
        ?>

        <h1>SignUp FORM</h1> 
        <form action="register.php" method="post" class="form">
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label>First Name: <span class="form-error"><?php echo $errorFirstName;?></span></label>
            <input type="text" name="firstname" value='<?php  echo $customer->getFirstName();?>'>
            </div>
        </div>

        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Last Name: <span class="form-error"><?php echo $errorLastName; ?></span></label>
            <input type="text"  name="lastname" value='<?php  echo $customer->getLastName();?>'>
            </div>
        </div>


        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Address: <span class="form-error"><?php echo $errorAddress; ?></span></label>
            <input type="text"  name="customer_address" value='<?php  echo $customer->getAddress();?>'>
            </div>
        </div>

        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >City: <span class="form-error"><?php echo $errorCity; ?></span></label>
            <input type="text"  name="city" value='<?php echo $customer->getCity();?>'>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Province: <span class="form-error"><?php echo $errorProvince; ?></span></label>
            <input type="text"  name="province" value='<?php echo $customer->getProvince();?>'>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Postal Code: <span class="form-error"><?php echo $errorPostaCode; ?></span></label>
            <input type="text"  name="postal_code" value='<?php echo $customer->getPostaCode();?>'>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Username: <span class="form-error"><?php echo $errorUserName; ?></span></label>
            <input type="text"  name="username" value='<?php echo $customer->getUsername();?>'>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Password: <span class="form-error"><?php echo $errorPassword; ?></span></label>
            <input type="password"  name="pwd" value='<?php  ?>'>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section">
            <!-- COMMENTS -->
            <div class="form-element">
            <button class="button" type="submit" name="signup">SignUp</button>
            </div>
        </div>
        </form>

        <?php
            }
        ?>
    </div>
</div>

<?php loadComponent("footer");?>