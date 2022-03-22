<?php
 
include_once 'EditProfile.php';

$profile = new EditProfile();
$profile->pullValues();

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
        <script type="text/javascript" src="Nav.js"></script>
    </head>
    <header>
     <div class="topnav" id="myTopnav" onclick="changeActive(event)">
        <a href="Logout.php">Logout</a>  
        <a href="Profile.php" class="active">Profile</a>
        <a href="FuelQuoteHistory.php">Fuel Quote History</a>
        <a href="QuoteForm.php">Request Fuel Quote</a>
     </div>
    </header>
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
