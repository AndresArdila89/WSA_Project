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
    require_once "../PHP/product.php";
    require_once "../PHP/products.php";


    $productsList = new Products();

    foreach ($productsList->listAll() as $val) {
        echo "<br>";
        echo $val->getProductCode();
    }

    $customer = [
                'customer_id'=> '0',
                'firstname'=> 'sisas',
                'lastname'=> 'ole',
                'customer_address'=> 'sante catherine',
                'city'=> 'montreal',
                'province'=> 'quebec',
                'postal_code'=> '111222',
                'user_name'=>'erasdder',
                'pwd'=>'secret'
    ];

    
    $product = [
                'product_id'=> '0',
                'product_code'=> 'P4545',
                'description'=> 'glass',
                'price'=> 100,
                'cost'=> 10,
    ];

    $pd = new Product();
    $pd->load("p3434");
    echo "<br>" . $pd->getModificationDate();

?>

    
</body>
</html>