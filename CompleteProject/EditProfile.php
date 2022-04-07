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
        $this->UNAME = $uname;
    }
    function update() {

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
        
        $sql = "SELECT UserName, FName, LName, Add1, Add2, City, StateCode, Zip FROM UserProfile";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($this->UNAME == $row["UserName"]) {
                    $this->firstName = $row["FName"];
                    $this->lastName = $row["LName"];
                    $this->address1 = $row["Add1"];
                    $this->address2 = $row["Add2"];
                    $this->city = $row["City"];
                    $this->state = $row["StateCode"];
                    $this->zipCode = $row["Zip"];
                }
      
            }
        }
        $conn->close();
    }
    function create_entry($qwe, $fname, $lname, $add1, $add2, $city, $state, $zip) {
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


        $exist = False;
        $sql = "SELECT UserName FROM UserProfile";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($this->UNAME == $row["UserName"])
                {
                    $exist = True;
                }
            }
        }

        if($exist) {
            $sql = "UPDATE UserProfile SET FName = '$fname', LName = '$lname', Add1 = '$add1', Add2 = '$add2', City = '$city', StateCode = '$state', Zip = '$zip' WHERE UserName = '$this->UNAME'";
            if($conn->query($sql) === TRUE) {
                //echo "Entry updated successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else {
            $sql = "INSERT INTO UserProfile (UserName, FName, LName, Add1, Add2, City, StateCode, Zip)
            VALUES ('$this->UNAME', '$fname', '$lname' , '$add1', '$add2', '$city', '$state', '$zip')";
            if($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        
        $this->firstName = $fname;
        $this->lastName = $lname;
        $this->address1 = $add1;
        $this->address2 = $add2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zip;

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
