<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-13      customers.php file created
#Andres Ardila      2021-04-13      extend Customer to Collection 
require_once 'customer.php';
require_once 'collection.php';

class Customers extends Collection
{
    //Note: I think it is better to implement an associative array
    // where the key would be the uuid or username of the object and the value the object
    // this makes posible the remove action without reindexing the array

    // Constructor loads all the customers for the database into and array
    function __construct()
    {
        $SQLQuery = "CALL customers_select_all";
        parent::__construct($SQLQuery);
    }
}

?>