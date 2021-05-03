<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-17      purchase.php file created
#Andres Ardila      2021-04-17      created properties
#Andres Ardila      2021-04-17      created getters and setters
#Andres Ardila      2021-04-17      created validation 
#Andres Ardila      2021-04-17      created constructor
#Andres Ardila      2021-04-17      added validation to all setters
#Andres Ardila      2021-04-17      added load function
#Andres Ardila      2021-04-17      added searchById function
#Andres Ardila      2021-04-30      added subtotal 
#Andres Ardila      2021-04-30      added taxes amount 
#Andres Ardila      2021-04-30      added grand total 

require_once 'dbh.php';

class Purchase extends Dbh
{
    //Purchase Properties
    private $purchase_id;
    private $customer_fk;
    private $product_fk;
    private $quantity;
    private $product_price;
    private $comments;
    private $subtotal;
    private $taxes_amount;
    private $grand_total;
    private $creation_date;
    private $modification_date;
    
    //Constants
    private const QUANTITY_MAX = 99;
    private const QUANTITY_MIN = 1;
    private const COMMENTS_MAX_LEN = 200;
    private const TAX_RATE = 0.152;

    //Constructor
    function __construct($row = [])
    {
        if(isset($row['purchase_id']))
        {
            $this->setId($row['purchase_id']);
            $this->setCustomerFK($row['customer_fk']);
            $this->setProductFK($row['product_fk']);           
            $this->quantity = $row['quantity'];
            $this->setProductPrice($row['product_price']);
            $this->setComments($row['comments']);
            $this->setCreationDate($row['creation_date']);
            $this->setModificationDate($row['modification_date']);
        }
    }

    //SETTERS

    public function setId($id)
    {
        $this->purchase_id = $id;
    }

    public function setCustomerFK($fk)
    {
        $this->customer_fk = $fk;
    }

    public function setProductFK($fk)
    {
        $this->product_fk = $fk;
    }

    public function setQuantity($quantity)
    {
        $quantity = htmlspecialchars(trim($quantity));
        if($quantity == "")
        {
            return "Field empty";
        }
        if(!is_numeric($quantity))
        {
            return "Only numeric values ALLOWED";
        }

        if(strpos($quantity,"."))
        {
            return "Integer Numbers ONLY";
        }
        
        if($quantity > QUANTITY_MAX_VAL)
        {
            return "Max amount ALLOWED : " . QUANTITY_MAX_VAL;
        }
        
        if($quantity <  QUANTITY_MIN_VAL)
        {
            return "Min amount ALLOWED : " . QUANTITY_MIN_VAL;
        }
        $this->quantity = $quantity;
        return false;
    }

    public function setProductPrice($price)
    {
        $this->product_price = $price;
    }

    public function setSubtotal()
    {
        $this->subtotal = $this->product_price * $this->quantity;
    }

    public function setTaxAmount()
    {
        $this->taxes_amount = $this->subtotal * self::TAX_RATE;
    }

    public function setGrandTotal()
    {
        $this->grand_total = $this->subtotal + $this->taxes_amount;
    }

    public function setComments($comments)
    {
        $comments = htmlspecialchars(trim($comments));
        if(strlen($comments) > 200)
        {
            return "Max characters ALLOWED : " . COMMENTS_MAX_LEN;
        }
        $this->comments = $comments;
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
       return $this->purchase_id;
    }

    public function getCustomerFK()
    {
      return  $this->customer_fk;    
    }

    public function getProductFK()
    {
        return $this->product_fk;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getProductPrice()
    {
        return $this->product_price;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function getModificationDate()
    {
        return $this->modification_date;
    }

    //METHODS

    public function save()
    {
        $SQLQuery = 'CALL purchases_insert(:customer_fk,:product_fk,'.
                    ':quantity,:product_price,:comments,:subtotal,:taxes_amount,:grand_total)';
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':customer_fk',$this->customer_fk);
        $PDOStatement->bindParam(':product_fk',$this->product_fk);
        $PDOStatement->bindParam(':quantity',$this->quantity);
        $PDOStatement->bindParam(':product_price',$this->product_price);
        $PDOStatement->bindParam(':comments',$this->comments);
        $PDOStatement->bindParam(':subtotal',$this->subtotal);
        $PDOStatement->bindParam(':taxes_amount',$this->taxes_amount);
        $PDOStatement->bindParam(':grand_total',$this->grand_total);
        $PDOStatement->execute();
        $PDOStatement->closeCursor();
    }

    public function update()
    {
        $SQLQuery = 'CALL purchases_update(:id,:customer_fk,:product_fk,'.
                    ':quantity,:product_price,:comments,:subtotal,:taxes_amount,:grand_total)';
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':id',$this->purchase_id);
        $PDOStatement->bindParam(':customer_fk',$this->customer_fk);
        $PDOStatement->bindParam(':product_fk',$this->product_fk);
        $PDOStatement->bindParam(':quantity',$this->quantity);
        $PDOStatement->bindParam(':product_price',$this->product_price);
        $PDOStatement->bindParam(':comments',$this->comments);
        $PDOStatement->bindParam(':subtotal',$this->subtotal);
        $PDOStatement->bindParam(':taxes_amount',$this->taxes_amount);
        $PDOStatement->bindParam(':grand_total',$this->grand_total);
        $PDOStatement->execute();
        $PDOStatement->closeCursor();
    }

    public function load($id)
    {
        if($row = $this->searchById($id))
        {
            $this->setId($row['purchase_id']);
            $this->setCustomerFK($row['customer_fk']);
            $this->setProductFK($row['product_fk']);
            $this->setQuantity($row['quantity']);
            $this->setProductPrice($row['product_price']);
            $this->setComments($row['comments']);
            $this->setCreationDate($row['creation_date']);
            $this->setModificationDate($row['modification_date']);
        }
    }

    public function searchById($id)
    {
        $SQLQuery = "CALL purchases_select(:id)";
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(":id",$id);
        $PDOStatement->execute();

        if($row = $PDOStatement->fetch())
        {
            $PDOStatement->closeCursor();
            return $row;
        }

        $PDOStatement->closeCursor();
        return false;
    }
    
    public function getProductPriceDB($productFK)
    {
        $SQLQuery = "CALL products_get_price(:id)";
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(":id",$productFK);
        $PDOStatement->execute();

        if($row = $PDOStatement->fetch())
        {
            $PDOStatement->closeCursor();
            return $row['price'];
        }

        $PDOStatement->closeCursor();
        return false;
    }
}

