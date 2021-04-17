<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../PHP/errorExceptionHandle.php";?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test db Connection</title>
</head>
<body style="background-color: #222; color: #eee;">
<?php
     
    require_once "../PHP/dbh.php";
    require_once "../PHP/customer.php";
    require_once "../PHP/customers.php";

    // $conn = new Dbh;
    // $sqlQuery = "CALL customers_select(:user_name)";
    // $PDOStatement = $conn->connect()->prepare($sqlQuery);
    // $user = "cospina";
    // $PDOStatement->bindParam(':user_name',$user);

    // $PDOStatement->execute();
    // if($row = $PDOStatement->fetch()){
    //     $customer = new Customer($row);
    // }
    // else{
    //     echo "fail";
    // }

    // $PDOStatement->closeCursor();

    $customerList = new Customers();

    foreach ($customerList->listAll() as $val) {
        echo "<br>";
        echo $val->getLastName();
    }

    $customer = [
                'customer_id'=> '0',
                'firstname'=> 'jhon',
                'lastname'=> 'match',
                'customer_address'=> 'sante catherine',
                'city'=> 'montreal',
                'province'=> 'quebec',
                'postal_code'=> '111222',
                'user_name'=>'jmatch',
                'pwd'=>'secret'
    ];

    $cli = new Customer('jmatch');
    
    echo '<br>' . $cli->getUsername();
    $cli->setFirstName('aurora');
    echo '<br>' . $cli->getFirstName();
    $cli->save();
    
?>

    
</body>
</html>