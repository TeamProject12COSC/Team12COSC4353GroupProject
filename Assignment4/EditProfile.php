<?php //profile class
class EditProfile {
    //profile variables
    private $UNAME;

    private $firstName;
    private $lastName;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zipCode;
    //constructor will receive parameters from the caller which receives parameters from database and form input
    function __construct($uname) {
        $this->$UNAME = $uname;


        //create database temp
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDB";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        //if exsist do
        if(1 = $conn->query("SELECT COUNT(1) FROM UserProfile WHERE UserName = $UNAME")){
            $this->firstName = $conn->query("SELECT FName FROM UserProfile WHERE $UNAME LIKE UserName");
            $this->lastName = $conn->query("SELECT LName FROM UserProfile WHERE $UNAME LIKE UserName");
            $this->address1 = $conn->query("SELECT Add1 FROM UserProfile WHERE $UNAME LIKE UserName");
            $this->address2 = $conn->query("SELECT Add2 FROM UserProfile WHERE $UNAME LIKE UserName");
            $this->city = $conn->query("SELECT City FROM UserProfile WHERE $UNAME LIKE UserName");
            $this->state = $conn->query("SELECT StateCode FROM UserProfile WHERE $UNAME LIKE UserName");
            $this->zipCode = $conn->query("SELECT Zip FROM UserProfile WHERE $UNAME LIKE UserName");
        }
        else {
            $sql = "INSERT INTO UserProfile (UserName, FName, LName, Add1, Add2, City, StateCode, Zip)
            VALUES ('$username', '$FName', '$LName' , '$Add1', '$Add2', '$City', '$StateCode', '$Zip')";
            if($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                // echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $this->firstName = $conn->query("SELECT FName FROM UserProfile WHERE $UNAME LIKE UserName");
        $this->lastName = $conn->query("SELECT LName FROM UserProfile WHERE $UNAME LIKE UserName");
        $this->address1 = $conn->query("SELECT Add1 FROM UserProfile WHERE $UNAME LIKE UserName");
        $this->address2 = $conn->query("SELECT Add2 FROM UserProfile WHERE $UNAME LIKE UserName");
        $this->city = $conn->query("SELECT City FROM UserProfile WHERE $UNAME LIKE UserName");
        $this->state = $conn->query("SELECT StateCode FROM UserProfile WHERE $UNAME LIKE UserName");
        $this->zipCode = $conn->query("SELECT Zip FROM UserProfile WHERE $UNAME LIKE UserName");

        //else create



        $conn->close();
    }
    function assignValues($firstName, $lastName, $address1, $address2, $city, $state, $zipCode) {
        //create database temp
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDB";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;

        $sql = "INSERT INTO UserProfile (UserName, FName, LName, Add1, Add2, City, StateCode, Zip)
        VALUES ('$username', '$firstName', '$lastName' , '$address1', '$address2', '$city', '$state', '$zipCode') WHERE $UNAME LIKE UserName";
        if($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function isValid() {
        $valid = true;
        if(empty($firstName)) {
            //echo $firstName . ' is empty\n';
            $valid = false;
        }
        if(strlen($firstName) > 50) {
            //echo $firstName . ' is too long\n';
            $valid = false;
        }
        if(empty($lastName)) {
            //echo $lastName . ' is empty\n';
            $valid = false;
        }
        if(strlen($lastName) > 50) {
            //echo $lastName . ' is too long\n';
            $valid = false;
        }
        if(empty($address1)) {
            //echo $address1 . ' is empty\n';
            $valid = false;
        }
        if(strlen($address1) > 100) {
            //echo $address1 . ' is too long\n';
            $valid = false;
        }
        if(empty($address2)) {
            //echo $address2 . ' is empty\n';
            $valid = false;
        }
        if(strlen($address2) > 100) {
            //echo $address2 . ' is too long\n';
            $valid = false;
        }
        if(empty($city)) {
            //echo $city . ' is empty\n';
            $valid = false;
        }
        if(strlen($city) > 100) {
            //echo $city . ' is too long\n';
            $valid = false;
        }
        if(empty($state)) {
            //echo $state . ' is empty\n';
            $valid = false;
        }
        if(empty($zipCode)) {
            //echo $zipCode . ' is empty\n';
            $valid = false;
        }
        if(strlen($zipCode) < 5) {
            //echo $zipCode . ' is not long enough\n';
            $valid = false;
        }
        if(strlen($zipCode) > 9) {
            //echo $zipCode . ' is too long\n';
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
