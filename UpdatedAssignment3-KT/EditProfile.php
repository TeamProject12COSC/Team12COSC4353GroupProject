<?php //profile class
class EditProfile {
    //profile variables
    private $firstName;
    private $lastName;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zipCode;
    //constructor will receive parameters from the caller which receives parameters from database and form input
    function pullValues() {
        $this->firstName = 'fromtdatabase';
        $this->lastName = 'fromtdatabase';
        $this->address1 = 'fromtdatabase';
        $this->address2 = 'fromtdatabase';
        $this->city = 'fromtdatabase';
        $this->state = 'fromtdatabase';
        $this->zipCode = 'fromtdatabase';
    }
    function assignValues($firstName, $lastName, $address1, $address2, $city, $state, $zipCode) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
    }
    function isValid() {
        $valid = true;
        if(empty($firstName)) {
            echo $firstName . ' is empty\n';
            $valid = false;
        }
        if(strlen($firstName) > 50) {
            echo $firstName . ' is too long\n';
            $valid = false;
        }
        if(empty($lastName)) {
            echo $lastName . ' is empty\n';
            $valid = false;
        }
        if(strlen($lastName) > 50) {
            echo $lastName . ' is too long\n';
            $valid = false;
        }
        if(empty($address1)) {
            echo $address1 . ' is empty\n';
            $valid = false;
        }
        if(strlen($address1) > 100) {
            echo $address1 . ' is too long\n';
            $valid = false;
        }
        if(empty($address2)) {
            echo $address2 . ' is empty\n';
            $valid = false;
        }
        if(strlen($address2) > 100) {
            echo $address2 . ' is too long\n';
            $valid = false;
        }
        if(empty($city)) {
            echo $city . ' is empty\n';
            $valid = false;
        }
        if(strlen($city) > 100) {
            echo $city . ' is too long\n';
            $valid = false;
        }
        if(empty($state)) {
            echo $state . ' is empty\n';
            $valid = false;
        }
        if(empty($zipCode)) {
            echo $zipCode . ' is empty\n';
            $valid = false;
        }
        if(strlen($zipCode) < 5) {
            echo $zipCode . ' is not long enough\n';
            $valid = false;
        }
        if(strlen($zipCode) > 9) {
            echo $zipCode . ' is too long\n';
            $valid = false;
        }
        return true;
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
    function getAddress2() {
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
