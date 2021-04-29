<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-10      customer.php file created
#Andres Ardila      2021-04-10      created customer properties 
#Andres Ardila      2021-04-10      created setters
#Andres Ardila      2021-04-11      created getters
#Andres Ardila      2021-04-11      created constructor with all the parameters
#Andres Ardila      2021-04-12      created constants for max length
#Andres Ardila      2021-04-12      added validation for javascript and html injection
#Andres Ardila      2021-04-12      added validation for max string length
#Andres Ardila      2021-04-16      modify constructor added validation
#Andres Ardila      2021-04-16      added save function
#Andres Ardila      2021-04-16      added modification date 

require_once 'dbh.php';
#The class Customer is inheriting from the class Dbh
#The class Dbh is the database handle

class Customer extends Dbh
{
    #Customer Properties
    private $customer_id;
    private $firstname;
    private $lastname;
    private $address;
    private $city;
    private $province;
    private $postal_code;
    private $username;
    private $pwd;
    private $creation_date;
    private $modification_date;

    private const FIRST_NAME_MAX_LEN = 20;
    private const LAST_NAME_MAX_LEN = 20;
    private const ADDRESS_MAX_LEN = 25;
    private const CITY_MAX_LEN = 8;
    private const PROVINCE_MAX_LEN = 25;
    private const POSTAL_CODE_MAX_LEN = 7;
    private const USERNAME_MAX_LEN = 12;
    
    #Constructor
    #The constructor receives an ASSOCIATIVE ARRAY as an argumet 
    #The $row contains all the information from the row
    
    function __construct($row=[]){
        if(isset($row['customer_id']))
        {
            $this->setId($row["customer_id"]);
            $this->setFirstName($row["firstname"]);
            $this->setLastName($row["lastname"]);
            $this->setAddress($row["customer_address"]);
            $this->setCity($row["city"]);
            $this->setProvince($row["province"]);
            $this->setPostaCode($row["postal_code"]);
            $this->setUsername($row["user_name"]);
            $this->setPassword($row["pwd"]);
        }
        else 
        {
        }
    }

    #Settes
    public function setId($id)
    {
        $this->customer_id = $id;
    }

    #firstName max lenght 
    public function setFirstName($firstname){
        $firstname = htmlspecialchars(trim($firstname));
        if(strlen($firstname) > self::FIRST_NAME_MAX_LEN)
        {
            return "max leng is " . self::FIRST_NAME_MAX_LEN;
        }
        if($firstname == "")
        {
            return "field empty";
        }
        $this->firstname = $firstname;
        return false;
    }

    public function setLastName($lastname){
        $lastname = htmlspecialchars(trim($lastname));

        if(strlen($lastname) > self::LAST_NAME_MAX_LEN)
        {
            return "max leng is " . self::LAST_NAME_MAX_LEN;
        }
        if($lastname == ""){
            return "field empty";
        }

        $this->lastname = $lastname;
        return false;
    }

    public function setAddress($address){
        $address = htmlspecialchars(trim($address));
        if(strlen($address) > self::ADDRESS_MAX_LEN){
            return "max leng is " . self::ADDRESS_MAX_LEN;
         }
        if($address == ""){
            return "field empty";
        }

        $this->address = $address;
        return false;
    }

    public function setCity($city){
        $city = htmlspecialchars(trim($city));
        if(strlen($city) > self::CITY_MAX_LEN)
        {
            return "max leng is " . self::CITY_MAX_LEN;
        }
        if($city == "")
        {
            return "fiel empty";
        }

        $this->city = $city;
        return false;
    }

    public function setProvince($province){
        $province = htmlspecialchars(trim($province));
        
        if(strlen($province) > self::PROVINCE_MAX_LEN) 
        {
            return "max leng is " . self::PROVINCE_MAX_LEN;
        }
        if($province == "")
        {
            return "field empty";
        }
        $this->province = $province;
        return false;
    }

    public function setPostaCode($postal_code){
        $postal_code = htmlspecialchars(trim($postal_code));
        if(strlen($postal_code) > self::POSTAL_CODE_MAX_LEN) 
        {
            return "max leng is " . self::POSTAL_CODE_MAX_LEN;
        }
        if($postal_code ==  "")
        {
            return "field empty";
        }
        $this->postal_code = $postal_code;
        return false;
    }

    public function setUsername($username){
        $username = htmlspecialchars(trim($username));
        if(strlen($username) > self::USERNAME_MAX_LEN) 
        {
            return "max leng is " . self::USERNAME_MAX_LEN;
        }
        if($username == "")
        {
            return "field empty";
        }
        $this->username = $username;
        return false;
    }

    public function setPassword($pwd){
        $pwd = htmlspecialchars(trim($pwd));
        $pwd = password_hash($pwd,PASSWORD_DEFAULT);
        if($pwd == "")
        {
            return "field empty";
        }
        
        $this->pwd = $pwd;
        return false;
    }
    
    #Getters
    public function getId(){
        return $this->customer_id;
    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCity(){
        return $this->city;
    }

    public function getProvince(){
        return $this->province;
    }

    public function getPostaCode(){
        return $this->postal_code;
    }

    public function getUsername(){
        return $this->username; 
    }

    public function getPwd(){
        return $this->pwd;
    }

    #Methods
    /**
     * Customer is save on the DATABASE 
     * addToDb(array ASSOC_ARRAY)
     */
    public function save()
    {
        if($this->searchUsername($this->username))
        {return false;}

        $SQLQuery = "CALL customers_insert(:firstname,:lastname,".
                    ":address,:city,:province,:postal_code,:username,:pwd)";
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(":firstname",$this->firstname);
        $PDOStatement->bindParam(":lastname",$this->lastname);
        $PDOStatement->bindParam(":address",$this->address);
        $PDOStatement->bindParam(":city",$this->city);
        $PDOStatement->bindParam(":province",$this->province);
        $PDOStatement->bindParam(":postal_code",$this->postal_code);
        $PDOStatement->bindParam(":username",$this->username);
        $PDOStatement->bindParam(":pwd",$this->pwd);
        $PDOStatement->execute();
        $PDOStatement->closeCursor();
        return true;
    }

    public function update()
    {
        $SQLQuery = "CALL customers_update(:id,:firstname,:lastname,".
                    ":address,:city,:province,:postal_code,:username,:pwd)";
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(":id",$this->customer_id);
        $PDOStatement->bindParam(":firstname",$this->firstname);
        $PDOStatement->bindParam(":lastname",$this->lastname);
        $PDOStatement->bindParam(":address",$this->address);
        $PDOStatement->bindParam(":city",$this->city);
        $PDOStatement->bindParam(":province",$this->province);
        $PDOStatement->bindParam(":postal_code",$this->postal_code);
        $PDOStatement->bindParam(":username",$this->username);
        $PDOStatement->bindParam(":pwd",$this->pwd);

        $PDOStatement->execute();
        $PDOStatement->closeCursor();
    }

    public function load($username)
    {
        if($row = $this->searchUsername($username))
        {
            $this->setId($row["customer_id"]);
            $this->setFirstName($row["firstname"]);
            $this->setLastName($row["lastname"]);
            $this->setAddress($row["customer_address"]);
            $this->setCity($row["city"]);
            $this->setProvince($row["province"]);
            $this->setPostaCode($row["postal_code"]);
            $this->setUsername($row["user_name"]);
            $this->setPassword($row["pwd"]);
        }
    }

    public function delete(){
        
    }

    private function searchUsername($username)
    {
        $SQLQuery = "CALL customers_select(:username)";
        $PDOStatement = $this->connect()->prepare($SQLQuery);
        $PDOStatement->bindParam(":username",$username);
        $PDOStatement->execute();

        if($row = $PDOStatement->fetch())
        {
            $PDOStatement->closeCursor();
            return $row;
        }

        $PDOStatement->closeCursor();
        return false;
    }

    public function login($username,$password){

            $SQLQuery = "CALL customers_login(:username)";
            $PDOStatement = $this->connect()->prepare($SQLQuery);
            $PDOStatement->bindParam(":username",$username);
            $PDOStatement->execute();

            if($row = $PDOStatement->fetch())
            {

                $PDOStatement->closeCursor();
                $hashedPwdDB = $row['pwd'];
                if(password_verify($password,$row['pwd']))
                {
                    // use the global variable SESSION to store the customer_id under the key uuid
                    $_SESSION['uuid'] = $row['customer_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    return true;
                }
                
            }
            echo "does not exist";
            return false;
    }
    
}
?>