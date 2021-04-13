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

require_once 'dbh.php';
#The class Customer is inheriting from the class Dbh
#The class Dbh is the database handle

class Customer extends Dbh
{


    #Customer Properties
    private $id;
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
    const LAST_NAME_MAX_LEN = 20;
    const ADDRESS_MAX_LEN = 25;
    const CITY_MAX_LEN = 8;
    const PROVINCE_MAX_LEN = 25;
    const POSTAL_CODE_MAX_LEN = 7;
    const USERNAME_MAX_LEN = 12;
    

    #Constructor
    #The constructor receives an ASSOCIATIVE ARRAY as an argumet 
    #The $row contains all the information from the row

    function __construct($row){
        
        $this->id = $row["customer_id"];
        $this->setFirstName($row["firstname"]);
        $this->setLastName($row["lastname"]);
        $this->setAddress($row["customer_address"]);
        $this->setCity($row["city"]);
        $this->setProvince($row["province"]);
        $this->setPostaCode($row["postal_code"]);
        $this->setUsername($row["user_name"]);
        $this->setPassword($row["pwd"]);
        // $this->firstname = $row["firstname"];
        // $this->lastname = $row["lastname"];
        // $this->address = $row["customer_address"];
        // $this->city = $row["city"];
        // $this->province = $row["province"];
        // $this->postal_code = $row["postal_code"];
        // $this->username = $row["user_name"];
        // $this->pwd = $row["pwd"];
        // $this->creation_date = $row["creation_date"];
        // $this->modification_date = $row["modification_date"];
    }
    
    #Settes

    #firstName max lenght 
    public function setFirstName($firstname){
        $firstname = htmlspecialchars(trim($firstname));
        if(strlen($firstname) > self::FIRST_NAME_MAX_LEN)
        {
            return false;
        }
        $this->firstname = $firstname;
        return true;
    }

    public function setLastName($lastname){
        $lastname = htmlspecialchars(trim($lastname));

        if(strlen($lastname) > self::LAST_NAME_MAX_LEN)
        {
            return false;
        }

        $this->lastname = $lastname;
        return true;
    }

    public function setAddress($address){
        $address = htmlspecialchars(trim($address));
        if(strlen($address) > self::ADDRESS_MAX_LEN){
            return false;
        }

        $this->address = $address;
        return true;
    }

    public function setCity($city){
        $city = htmlspecialchars(trim($city));
        if(strlen($city) > self::CITY_MAX_LEN)
        {
             return false;
        }
        $this->city = $city;
        return true;
    }

    public function setProvince($province){
        $province = htmlspecialchars(trim($province));
        
        if(strlen($province) > self::PROVINCE_MAX_LEN) 
        {
             return false;
        }
        $this->province = $province;
        return true;
    }

    public function setPostaCode($postal_code){
        $postal_code = htmlspecialchars(trim($postal_code));
        if(strlen($postal_code) > self::POSTAL_CODE_MAX_LEN) 
        {
             return false;
        }
        $this->postal_code = $postal_code;
        return true;
    }

    public function setUsername($username){
        $username = htmlspecialchars(trim($username));
        if(strlen($username) > self::USERNAME_MAX_LEN) 
        {
             return false;
        }
        $this->username = $username;
        return true;
    }

    public function setPassword($pwd){
        $pwd = htmlspecialchars(trim($pwd));
        $this->pwd = $pwd;
    }
    
    #Getters
    public function getId(){
        return $this->id;
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

    public function addToDb(){

    }
    public function loadFromDb(){

    }
    public function saveToDb(){

    }
    public function deleteFromDb(){
        
    }
    
}
?>