<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-04-28    creation of the file register.php
#Andres Ardila (student_id)   2021-04-28    design of the registration form 
#Andres Ardila (student_id)   2021-04-29    all validations created 
#Andres Ardila (student_id)   2021-04-29    all error messages added  

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

    $FirstName="";
    $LastName = "";
    $Address = "";
    $City = "";
    $Province = "";
    $PostaCode = "";
    $UserName = "";
    $Password = "";

    $title = "";
    $updateOff = true;
    $customer = new Customer();

    if(isset($_SESSION['uuid']))
    {
        echo "You are login";
        $customer->load($_SESSION['uuid']);
        $FirstName= $customer->getFirstName();
        $LastName = $customer->getLastName();
        $Address = $customer->getAddress();
        $City = $customer->getCity();
        $Province = $customer->getProvince();
        $PostaCode = $customer->getPostaCode();
        $UserName = $customer->getUsername();
        echo "hello";
        $btn_submit = "Update";
        $updateOff =false;
        $title = "Update PROFILE";
    }
    else 
    {
        $btn_submit = "Register";
        $title = "SignUp FORM";
    }
        if(isset($_POST['Register']) || isset($_POST['Update']))
        {
            
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

            if($errorUserName = $customer->setUsername($_POST['username'] ,$updateOff))
            {
                $success = false;
            }

            if($errorPassword = $customer->setPassword($_POST['pwd']))
            {
                $success = false;
            }

            if($success)
            {
                if(isset($_POST['Register']))
                {
                    $customer->save();
                    $customer->login($customer->getUsername(),$customer->getPwd());
                    header('Location:register.php');
                    die();
                }
                else
                {
                    $customer->update();
                    header('Location:register.php');
                    die();
                    
                }
            }
        }

        ?>
        
        <h1><?php echo $title ;?></h1> 
        <form action="register.php" method="post" class="form">
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label>First Name: * <span class="form-error"><?php echo $errorFirstName;?></span></label>
            <input type="text" name="firstname" value='<?php  echo $FirstName?>'required>
            </div>
        </div>

        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Last Name: * <span class="form-error"><?php echo $errorLastName; ?></span></label>
            <input type="text"  name="lastname" value='<?php  echo $LastName;?>' required>
            </div>
        </div>


        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Address: *<span class="form-error"><?php echo $errorAddress; ?></span></label>
            <input type="text"  name="customer_address" value='<?php  echo $Address;?>' required>
            </div>
        </div>

        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >City: *<span class="form-error"><?php echo $errorCity; ?></span></label>
            <input type="text"  name="city" value='<?php echo $City;?>' required>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Province: *<span class="form-error"><?php echo $errorProvince; ?></span></label>
            <input type="text"  name="province" value='<?php echo $Province;?>' required>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Postal Code: *<span class="form-error"><?php echo $errorPostaCode; ?></span></label>
            <input type="text"  name="postal_code" value='<?php echo $PostaCode;?>' required>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Username: *<span class="form-error"><?php echo $errorUserName; ?></span></label>
            <input type="text"  name="username" value='<?php echo $UserName;?>' required>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section"> 
            <div class="form-element">
            <label >Password: *<span class="form-error"><?php echo $errorPassword; ?></span></label>
            <input type="password"  name="pwd" value='' required>
            </div>
        </div>
        <!-- ROW -->
        <div class="form-section">
            <!-- COMMENTS -->
            <div class="form-element">
            <button class="button" type="submit" name="<?php echo $btn_submit; ?>"><?php echo $btn_submit ?></button>
            </div>
        </div>
        </form>

    </div>
</div>

<?php loadComponent("footer");?>