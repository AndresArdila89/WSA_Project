<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-17      products.php file created
#Andres Ardila      2021-04-17      exteding products to colletion
#Andres Ardila      2021-04-17      constructor created

require_once 'product.php';
require_once 'collection.php';

class Products extends Collection
{
    // Constructor loads all the Products from the database into and array
    function __construct()
    {
        $SQLQuery = "CALL products_select_all";
        // prepare the statement 
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        // executes the statement
        $PDOStatement->execute();
        // fetch the data from the PDO
        while($row = $PDOStatement->fetch())
        {
            //adding object to the collection 
            $obj = new Product($row);
            $this->add($obj->getId(), $obj); 
        }
        $PDOStatement->closeCursor();
    }
}

?>