<?php
// Global variable
$firstname = '';


function createCookie()
{
    if(isset($_POST['firstname']))
    {
        setcookie("firstname", htmlspecialchars($_POST["firstname"]),time() + 10, '',false, true);
        header('Location: login.php');
        die();
    }

}

function deleteCookie()
{
    setcookie('firstname','',time() - 60 *60, '',false, true);
    header('Location: login.php');
        die();
}

function readCookie()
{   global $firstname;
    if(isset($_COOKIE['firstname'])){
        $firstname = htmlspecialchars($_COOKIE['firstname']);
        setcookie("firstname", htmlspecialchars($_COOKIE["firstname"]),time() + 10, '',false, true);
    }
    else
    {
        $firstname = "";        
    }
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
        

if(isset($_COOKIE['firstname'])){
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