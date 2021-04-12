<!DOCTYPE html>
<html lang="en">
<head>

    <?php require_once "../PHP/errorExceptionHandle.php";?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test db Connection</title>
</head>
<body>
<?php
     
    require_once "../PHP/dbh.php";
    require_once "../PHP/customer.php";
    $conn = new Dbh;

    
    $sqlQuery = "CALL customers_select(:user_name)";
    
    $PDOStatement = $conn->connect()->prepare($sqlQuery);

    
    $user = "cospina";
    $PDOStatement->bindParam(':user_name',$user);


    $PDOStatement->execute();
    if($row = $PDOStatement->fetch()){
        $customer = new Customer($row);
    }
    else{
        echo "fail";
    }

    $PDOStatement->closeCursor();


    echo $customer->getFirstName();
    echo $customer->getLastName();
    echo $customer->getAddress();
    echo $customer->getId();

    




    
?>

    
</body>
</html>