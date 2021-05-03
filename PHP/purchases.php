<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-18      purchases.php file created
#Andres Ardila      2021-04-18      exteding purchases to colletion
#Andres Ardila      2021-04-18      constructor created

require_once 'purchase.php';
require_once 'collection.php';
class Purchases extends Collection
{
    // Constructor loads all the Products from the database into and array
    function __construct()
    {
        $SQLQuery = "CALL purchases_select_all";
        // prepare the statement 
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        // executes the statement
        $PDOStatement->execute();
        // fetch the data from the PDO
        while($row = $PDOStatement->fetch())
        {   
            //adding object to the collection 
            $obj = new Purchase($row);
            $this->add($obj->getId(), $obj);
        }
        $PDOStatement->closeCursor();
    }
}

?>