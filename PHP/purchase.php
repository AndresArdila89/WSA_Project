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
    private $creation_date;
    private $modification_date;
    
    //Constants
    private const QUANTITY_MAX = 999;
    private const COMMENTS_MAX_LEN = 200;

    //Constructor
    function __construct($row = [])
    {
        if(isset($row['purchase_id']))
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
        $this->quantity = $quantity;
    }

    public function setProductPrice($price)
    {
        $this->product_price = $price;
    }

    public function setComments($comments)
    {
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
                    ':quantity,:product_price,:comments)';
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':customer_fk',$this->customer_fk);
        $PDOStatement->bindParam(':product_fk',$this->product_fk);
        $PDOStatement->bindParam(':quantity',$this->quantity);
        $PDOStatement->bindParam(':product_price',$this->product_price);
        $PDOStatement->bindParam(':comments',$this->comments);
        $PDOStatement->execute();
        $PDOStatement->closeCursor();
    }

    public function update()
    {
        $SQLQuery = 'CALL purchases_update(:id,:customer_fk,:product_fk,'.
                    ':quantity,:product_price,:comments)';
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(':id',$this->purchase_id);
        $PDOStatement->bindParam(':customer_fk',$this->customer_fk);
        $PDOStatement->bindParam(':product_fk',$this->product_fk);
        $PDOStatement->bindParam(':quantity',$this->quantity);
        $PDOStatement->bindParam(':product_price',$this->product_price);
        $PDOStatement->bindParam(':comments',$this->comments);
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
}

