<?php
#Revision history:
#
#DEVELOPER                    DATE:         COMMNETS
#Andres Ardila (student_id)   2021-03-13    
#Andres Ardila (student_id)   2021-03-10    added loaderOrders function
#Andres Ardila (student_id)   2021-04-28    added signUp form funtion    
#Andres Ardila (student_id)   2021-04-29    added registrationValidationForm function    

require_once "constants.php";
require_once "PHP/customer.php";
require_once "PHP/product.php";
require_once "PHP/purchase.php";
require_once "PHP/customers.php";
require_once "PHP/products.php";
require_once "PHP/purchases.php";
// This function loads the head file and recibes as a parameter
// the title of the page, this value changes the name of the page tab.
function loadHead($title){
    
    include_once FOLDER_COMPONENTS . "head.php";
}

// This function loads components from the componets folder
// receiving as parameter the name of the component and then 
// includes the component in the file where the function is called. 
function loadComponent($component){
    
    include FOLDER_COMPONENTS . "$component.php";
}

// This funtion loads images it recives two parameters, 
// image name [file_name.file_type] and class name [class_name]
// FOLDER_IMAGE is a constant define in the constants.php. 
// FOLDER_IMAGE  contain the folder path to the images of the website.
// When the link parameter is true the image will have a link to a page outside of the site.
function loadImage($imageName,$class='',$link=false){

    $image = FOLDER_IMAGES . $imageName;
    if($link){
        echo "<a href='". URL_ADS . "'><img src='$image' class='$class'/></a>";
    }
    else
    {
        echo "<img src='$image' class='$class'/>";
    }
    
}

// This function receives 2 arguments, an array with names of 
// images and a css class to aply to the image element.
// the shuffle function helps reorganize randomly the elememnts inside the array
// the index always stay in the same position.
// if no value is pass into the class parameter it will be assume to be empty

function adsRandom($imageArray,$class=''){
    // reorganize the elements inside of the array
    shuffle($imageArray);
    // This conditional selects the image for the must expensive advertisement.

    if($imageArray[0]== 'ads_1.png'){
        $class = 'bigAds';
    }
    
    loadImage($imageArray[0],$class,true);

}

// head funciton

function loadTopElements($pageName){
    loadHead($pageName);
    // the loadComponet function receives as a parameter a string 
    // with the name of the componet that should be included.
    loadComponent("topBar");
    loadComponent("navbar");
    
}

// ORDER FILE HANDLING 
function appendOrder($order,$path)
{
  $orderFileContent = file_get_contents($path);
  $array_orders = json_decode($orderFileContent);
  $array_orders [] = $order;
  $json_orders = json_encode($array_orders);
  file_put_contents($path,$json_orders);
}


//ORDERS TABLE

function loadOrders()
{
    $myfile = file_get_contents(FILE_ORDERS);
    $array_order_json = json_decode($myfile,true);

    ?>
    <table class="table">
    <tr>
    <th>#</th>
    <th>Delete</th>
    <th>Product Code</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City</th>
    <th>Comment</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Sub Total</th>
    <th>Tax Amount</th>
    <th>Grand Total</th>
    </tr>
    <?php
    // The counter keeps tract of the number of orders
    $counter = 0;
        foreach($array_order_json as $value)
        {$counter ++;
    ?>

    <tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo "<button value='123123'>delete</button>";?></td>
    <td><?php echo $value["productCode"]; ?></td>
    <td><?php echo $value["firstName"]; ?></td>
    <td><?php echo $value["lastName"]; ?></td>
    <td><?php echo $value["city"]; ?></td>
    <td><?php echo $value["comments"]; ?></td>
    <td><?php echo number_format($value["price"],2). '$'; ?></td>
    <td><?php echo $value["quantity"]; ?></td>
    <td class="<?php changeSubTotalColor($value["subTotal"]); ?>"><?php echo number_format($value["subTotal"],2). '$'; ?></td>
    <td><?php echo number_format($value["taxAmount"],2). '$'; ?></td>
    <td><?php echo number_format($value["grandTotal"],2) . '$'; ?></td>
    </tr>
    <?php 
        }
    ?>
    </table>
    <?php
}



function changeSubTotalColor($value)
{
    if(isset($_GET['command']))
    {
        if($_GET['command'] == 'color')
        {
            if($value < 100){
                echo "red-text";
            }
            elseif($value < 1000)
            {
                echo "lightOrange-text";
            }
            else
            {
                echo "green-text";
            }
        } 
    }   
}

function bgChange()
{
    if(isset($_GET['command'])){
        if($_GET['command'] == 'print')
        {
            echo 'white';
        }
        else
        {
            echo 'light';
        }
    }
}

function opacityChange()
{
    if(isset($_GET['command']))
    {
        if($_GET['command'] == 'print')
        {
            echo 'opacity';
        }
    }
}


// validate if the string contains a numeric value
function hasNumbers($str)
{
    for($i = 0; $i < mb_strlen($str); $i++)
    {
        $char = $str[$i];
        if(is_numeric($char))
        {
            return true;
        }
    }
    return false;
}




// project 3 code

//----------------> REGISTRATION FORM VALIDATION 


function loadLogin($errorLogin=""){


    ?>
          <button onclick="menu()">Login</button>

            <div id="login-menu"  class="hide-element">
                <form action="" method="POST" class="form">
                    <!-- ROW -->
                    <div class="form-section"> 
                        <div class="form-element">
                            <h1 class="center-text">SIGNUP</h1>
                            <img class="logo-signup center" src="./images/logo.png"/>
                        </div>
                    </div>

                    <!-- ROW -->
                    <div class="form-section"> 
                        <div class="form-element">
                            <label>Username: <span class="form-error"><?php echo $errorLogin;?></span></label>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                    </div>

                    <!-- ROW -->
                    <div class="form-section"> 
                        <div class="form-element">
                            <label > Password: <span class="form-error"></span></label>
                            <input type="password"  name="password" placeholder="Password">
                        </div>
                    </div>
                    <!-- ROW -->
                    <div class="form-section">
                    <!-- COMMENTS -->
                        <div class="form-element">
                            <button class="button" type="submit" name="signin">SignIn</button>
                        </div>
                    </div>
                    <!-- ROW -->
                    <div class="form-section">
                    <!-- COMMENTS -->
                        <div class="form-element">
                            <span class="center-text">Need a user account? <a href="register.php">REGISTER</a></span>
                        </div>
                    </div>
                </form>
            </div>
    <?php
}







?>