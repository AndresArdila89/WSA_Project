<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test db Connection</title>
</head>
<body>
<?php
    
    require_once "../PHP/db_connection.php";

    $conn = new DBConnection;

    $conn->connect();
    
?>

    
</body>
</html>