<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-16      collection.php file created
#Andres Ardila      2021-04-16      created add remove get and count functions

require_once 'dbh.php';

class Collection extends Dbh
{
    private $collection = [];

    //This constructor allows all the collections to autoload
    //the rows from the database tables  

    function __construct($SQLQuery)
    {
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