<?php
// Global variable
session_start();
$_SESSION["software"] = "Ubuntu";
$firstname = '';


function createCookie()
{
    if(isset($_POST['firstname']))
    {

        // setcookie("firstname", htmlspecialchars($_POST["firstname"]),time() + 10, '',false, true);
        $_SESSION["firstname"] = htmlspecialchars($_POST["firstname"]);
        header('Location: login.php');
        die();
    }

}

function deleteCookie()
{
    // setcookie('firstname','',time() - 60 *60, '',false, true);
    session_destroy();
    header('Location: login.php');
    die();
}

function readCookie()
{   global $firstname;
    if(isset($_SESSION['firstname'])){
        $firstname = htmlspecialchars($_SESSION['firstname']);
        var_dump($_SESSION['firstname']);
    }
    else
    {
        $firstname = "";        
    }
    // if(isset($_COOKIE['firstname'])){
    //     $firstname = htmlspecialchars($_COOKIE['firstname']);
    //     setcookie("firstname", htmlspecialchars($_COOKIE["firstname"]),time() + 10, '',false, true);
    // }
    // else
    // {
    //     $firstname = "";        
    // }
}


if(isset($_POST["login"]))
    {
        createCookie();
    }
    else
    {
        if(isset($_POST['logout']))
        {
            deleteCookie();
        }
        else
        {   
            readCookie();
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    
        if($firstname == ''){
            echo "You need to login in order to view this page";
        }
        else
        {
            echo "Hello " . $firstname;
        }
        

if(isset($_SESSION['firstname']) && $_SESSION['firstname'] != ""){
?>
    <form action="login.php" method="POST">
        <input type="submit" name="logout" value="Logout">
    </form>
<?php 
} 
else 
{
    ?>
    <form action="login.php" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname">
        <input type="submit" name="login" value="Login">
    </form>
<?php
}
?>


</body>
</html>