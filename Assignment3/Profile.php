<?php //profile class
class Profile {
    //profile variables
    private $firstName;
    private $lastName;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zipCode
    //constructor will receive parameters from the caller which receives parameters from database and form input
    function __construct($firstName, $lastName, $address1, $address2, $city, $state, $zipCode) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
    }

    function getFirstName() {
        return $this->firstName;
    }
    function getLastName() {
        return $this->lastName;
    }
    function getAddress1() {
        return $this->address1;
    }
    function getFirstName() {
        return $this->address2;
    }
    function getCity() {
        return $this->city;
    }
    function getState() {
        return $this->state;
    }
    function getZipCode() {
        return $this->zipCode;
    }
}
