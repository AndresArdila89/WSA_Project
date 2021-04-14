<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-13      customers.php file created
#Andres Ardila      2021-04-13      extend Customer to CustomerList 
require_once 'customer.php';
class CustomersList extends Customer
{
    //Note: i think it is better to implement an associative array
    // where the key would be the uuid or username of the object and the value the object
    // this makes posible the remove action without reindexing the array 
    private $customerList = [];

    public function add()
    {
        
    } 
    
    public function remove()
    {
        
    } 
    
    public function get($ID)
    {
        return $this->customerList[$ID];
    } 
    
    public function count()
    {
        return count($this->customerList);
    } 
}

?>