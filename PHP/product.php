<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-17      Product.php file created
#Andres Ardila      2021-04-17      created properties
#Andres Ardila      2021-04-17      created getters and setters
#Andres Ardila      2021-04-17      created validation 
#Andres Ardila      2021-04-17      created constructor
#Andres Ardila      2021-04-17      added validation to all setters
#Andres Ardila      2021-04-17      added load function

require_once 'dbh.php';

class Product extends Dbh
{
    //Product Properties
    private $product_id;
    private $product_code;
    private $description;
    private $price;
    private $cost;
    private $creation_date;
    private $modification_date;

    private const PRODUCT_CODE_MAX_LEN = 12;
    private const DESCRIPTION_MAX_LEN = 100;
    private const PRICE_MAX_VALUE = 10000;
    private const COST_MAX_VALUE = 10000;
    private const PRODUCT_CODE_INIT_CHAR = 'P';
     
    function __construct($row = [])
    {
        if(isset($row['product_id']))
        {
            $this->setId($row['product_id']);
            $this->setCode($row['product_code']);
            $this->setDescription($row['description']);
            $this->setPrice($row['price']);
            $this->setCost($row['cost']);
            $this->setCreationDate($row['creation_date']);
            $this->setModificationDate($row['modification_date']);
        }
    }

    // SETTERS

    public function setId($id)
    {
        $this->product_id = $id;
    }

    public function setCode($code)
    {
        $code = htmlspecialchars(trim($code));
        $code = strtoupper($code);
        if($code == '')
        {
            return "Field Required";
        }
        if(strlen($code) > self::PRODUCT_CODE_MAX_LEN)
        {
            return "Cannot be longer than " . self::PRODUCT_CODE_MAX_LEN;
        }
        if($code[0] != self::PRODUCT_CODE_INIT_CHAR)
        {
            return "Must beging with " . self::PRODUCT_CODE_INIT_CHAR;
        }
        $this->product_code = $code;
        return 'success';
    }

    public function setDescription($description)
    {
        if($description == '')
        {
            return "Fild Require";
        }
        if(strlen($description) > self::DESCRIPTION_MAX_LEN)
        {
            return "Cannot be longer than " . self::DESCRIPTION_MAX_LEN;
        }
        $this->description = $description;
        return 'success';
        
    }

    public function setPrice($price)
    {
        if($price == '')
        {
            return 'Fild Require';
        }
        if(!is_numeric($price))
        {
            return 'Only numbers';
        }
        if($price <= 0)
        {
            return 'Only positive numbers';
        }
        $this->price = $price;
        return 'success';
    }

    public function setCost($cost)
    {

        if($cost == '')
        {
            return 'Fild Require';
        }
        if(!is_numeric($cost))
        {
            return 'Only numbers';
        }
        if($cost <= 0)
        {
            return 'Only positive numbers';
        }
        $this->cost = $cost;
        return 'success';
    }

    public function setCreationDate($date)
    {
        $this->creation_date = $date;
    }

    public function setModificationDate($date)
    {
        $this->modification_date = $date;
    }

    // GETTERS
    public function getId()
    {
        return $this->product_id;
    }

    public function getProductCode()
    {
        return $this->product_code;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function getModificationDate()
    {
        return $this->modification_date;
    }
    
    // METHODS
    
    private function searchByProductCode($code)
    {
        $SQLQuery = "CALL products_select(:code)";
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(":code",$code);
        $PDOStatement->execute();
        if($row = $PDOStatement->fetch())
        {
            $PDOStatement->closeCursor();
            return $row;
        }
        
        $PDOStatement->closeCursor();
        return false;
    }

    //DB METHODS

    public function save()
    {
        if($this->searchByProductCode($this->product_code)) //returns false or a row
        {return false;}
        
        $SQLQuery = 'CALL products_insert(:code,:description,:price,:cost)';
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':code',$this->product_code);
        $PDOStatement->bindParam(':description',$this->description);
        $PDOStatement->bindParam(':price',$this->price);
        $PDOStatement->bindParam(':cost',$this->cost);
        $PDOStatement->execute();
        $PDOStatement->closeCursor();
        return true;
    }

    public function update()
    {
        $SQLQuery = 'CALL products_update(:id,:code,:description,:price,:cost)';
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':id',$this->product_id);
        $PDOStatement->bindParam(':code',$this->product_code);
        $PDOStatement->bindParam(':description',$this->description);
        $PDOStatement->bindParam(':price',$this->price);
        $PDOStatement->bindParam(':cost',$this->cost);
        $PDOStatement->execute();
        $PDOStatement->closeCursor();
    }

    public function load($product_code)
    {
        if($row = $this->searchByProductCode($product_code))
        {
            $this->setId($row['product_id']);
            $this->setCode($row['product_code']);
            $this->setDescription($row['description']);
            $this->setPrice($row['price']);
            $this->setCost($row['cost']);
            $this->setCreationDate($row['creation_date']);
            $this->setModificationDate($row['modification_date']);
        }
    }
    
}