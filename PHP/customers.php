<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-13      customers.php file created
#Andres Ardila      2021-04-13      extend Customer to Collection 
require_once 'customer.php';
require_once 'collection.php';

class Customers extends Collection
{

    // Constructor loads all the customers for the database into and array
    function __construct()
    {
        $SQLQuery = "CALL customers_select_all";
        // prepare the statement 
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        // executes the statement
        $PDOStatement->execute();
        // fetch the data from the PDO
        while($row = $PDOStatement->fetch())
        {
            //adding object to the collection 
            $obj = new Customer($row);
            $this->add($obj->getId(), $obj); 
        }
        $PDOStatement->closeCursor();
    }
}

?>