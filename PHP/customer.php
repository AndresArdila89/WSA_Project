<?php
#REVISION HISTORY:
#DEVELOPER          DATE            COMMENT
#Andres Ardila      2021-04-10      customer.php file created
#Andres Ardila      2021-04-10      created customer properties 
#Andres Ardila      2021-04-10      created setters

require_once 'dbh.php';

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
        $this->firstname = $firstName;
    }
    
    #Getters
    public function getFirstName($firstname){
        $this->firstname = $firstname;
    }

    public function getLastName($lastname){
        $this->lastname = $lastname;
    }

    public function getAddress($address){
        $this->address = $addres;
    }

    public function getCity($city){
        $this->city = $city;
    }

    public function getProvince($province){
        $this->province = $province;
    }

    public function getPostaCode($postal_code){
        $this->postal_code = $postal_code;
    }

    public function getUsername($username){
        $this->username = $username;
    }

    public function getPwd($pwd){
        $this->firstname = $firstName;
    }
    
}
?>