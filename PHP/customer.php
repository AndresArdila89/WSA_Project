<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-10      customer.php file created
#Andres Ardila      2021-04-10      created customer properties 
#Andres Ardila      2021-04-10      created setters
#Andres Ardila      2021-04-11      created getters
#Andres Ardila      2021-04-11      create constructor with all the parameters


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

    #Constructor
    #The constructor receives an ASSOCIATIVE ARRAY as an argumet 
    #The $row contains all the information from the row

    function __construct($row){
        
        $this->id = $row["customer_id"];
        $this->firstname = $row["firstname"];
        $this->lastname = $row["lastname"];
        $this->address = $row["customer_address"];
        $this->city = $row["city"];
        $this->province = $row["province"];
        $this->postal_code = $row["postal_code"];
        $this->username = $row["user_name"];
        $this->pwd = $row["pwd"];
        $this->creation_date = $row["creation_date"];
        $this->modification_date = $row["modification_date"];

    }
    
    #Settes
    public function setFirstName($firstname){
        $this->firstname = $firstname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function setAddress($address){
        $this->address = $addres;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function setProvince($province){
        $this->province = $province;
    }

    public function setPostaCode($postal_code){
        $this->postal_code = $postal_code;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPwd($pwd){
        $this->firstname = $pwd;
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
    
}
?>