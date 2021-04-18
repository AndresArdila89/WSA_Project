<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-16      collection.php file created
#Andres Ardila      2021-04-16      created add remove get and count functions

require_once 'dbh.php';

class Collection extends Dbh
{
    //Note: It is better to implement an associative array
    // where the key would be the uuid or username of the object and the value the object
    // this makes posible the remove action without reindexing the array

    private $collection = [];

    // Methods 

    public function add($PK, $object)
    {
        $this->collection[$PK] = $object;   
    } 
    
    public function remove($PK)
    {
        if(isset($this->collection[$PK])){
            unset($this->collection[$PK]);
            return true;
        }
        return false;
    } 
    
    public function get($PK)
    {
        return $this->collection[$PK];
    } 
    
    public function count()
    {
        return count($this->collection);
    }
    
    public function listAll()
    {
        return $this->collection;
    }
}