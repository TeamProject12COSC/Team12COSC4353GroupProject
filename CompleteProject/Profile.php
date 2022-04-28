<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: Login.php");
    die;
}  
//connect to database and retrieve data to fill in form

//create database temp
$servername = "localhost";
$usernamedb = "root";
$passworddb = "";
$dbname = "myDB";


// Create connection
$conn = new mysqli($servername, $usernamedb, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$newnew = 0;
$nametest = $_SESSION['username'];
$sql = "UPDATE users SET new = '$newnew' WHERE username = '$nametest'";
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

$username = $_SESSION["username"];

include_once 'EditProfile.php';

$firstName = "default";
$lastName = "default";
$address1 = "default";
$address2 = "default";
$city = "default";
$state = "default";
$zipCode = "default";

    $profile = new EditProfile($username);


    if (isset($_POST["FirstName"])) {
        $firstName = $_POST["FirstName"];
    }
    if (isset($_POST["LastName"])) {
       $lastName = $_POST["LastName"];
    }
    if (isset($_POST["Address1"])) {
       $address1 = $_POST["Address1"];
    }
    if (isset($_POST["Address2"])) {
       $address2 = $_POST["Address2"];
    }
    if (isset($_POST["City"])) {
       $city = $_POST["City"];
    }
    if (isset($_POST["State"])) {
       $state = $_POST["State"];
    }
    if (isset($_POST["Zipcode"])) {
       $zipCode = $_POST["Zipcode"];
    }
    if (isset($_POST["Zipcode"])) {
        $profile->create_entry($username, $firstName, $lastName, $address1, $address2, $city, $state, $zipCode);
    }
    
    $profile->update();

    $firstName = $profile->getFirstName();
    $lastName = $profile->getLastName();
    $address1 = $profile->getAddress1();
    $address2 = $profile->getAddress2();
    $city = $profile->getCity();
    $state = $profile->getState();
    $zipCode = $profile->getZipCode();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="Profile.css" />
        <link rel="stylesheet" href="Nav.css">
    </head>

    <?php
    $profile = true;
    require_once 'Nav.php';
    ?>

    <body>
        <section class="header">
            <div class="profile">
                <table>
                    <tr>
                        <td>First Name</td>
                        <td><?php echo $firstName?></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><?php echo $lastName?></td>
                    </tr>
                    <tr>
                        <td>Address 1</td>
                        <td><?php echo $address1?></td>
                    </tr>
                    <tr>
                        <td>Address 2</td>
                        <td><?php echo $address2?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?php echo $city?></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><?php echo $state?></td>
                    </tr>
                    <tr>
                        <td>Zipcode</td>
                        <td><?php echo $zipCode?></td>
                    </tr>
                </table>
                <form action="Signup.php">
                    <input type="submit" value="Edit">
                </form>
            </div>
        </section>
    </body>
</html>
