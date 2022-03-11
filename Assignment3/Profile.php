Skip to content
Search or jump to…
Pull requests
Issues
Marketplace
Explore
 
@3ll0 
TeamProject12COSC
/
Team12COSC4353GroupProject
Public
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
Team12COSC4353GroupProject/Assignment3/FuelQuoteHistory.php /
@JoshuaCyber
JoshuaCyber Joshua fixed error that gave gallons 0 value
Latest commit 87ad5e5 8 days ago
 History
 2 contributors
@JoshuaCyber@TeamProject12COSC
84 lines (75 sloc)  2.41 KB
   
<?php
   // session_start(); //start session
   require_once 'vendor/autoload.php';
   $faker = Faker\Factory::create();
   //connect to database and retrieve history data for user
    $arrayGal = array();
    $arrayTotal = array();
    $arrayDate = array();
    $gallonPrice =  $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10);

    $loopNum = $faker->numberBetween(0, 100);
    for ($i = 0; $i < $loopNum; $i++)
    {
        $value =  $faker->randomFloat($nbMaxDecimals = 0, $min = 1, $max = 10000000);
        $arrayGal[] = $value;
        $arrayTotal[] = $gallonPrice * $value;
        $arrayDate[] = $faker->date($format = 'm-d-Y');
    }

    $address = $faker->address;

?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <link rel="stylesheet" href="Nav.css">
  <link rel="stylesheet" href="FuelQuoteHistory.css">
  <script type="text/javascript" src="Nav.js"></script>
  <title>Website Name</title>
  <meta charset="UTF-8">
</head>

<header>
    <div class="topnav" id="myTopnav" onclick="changeActive(event)">
        <a href="Login.html">Logout</a>  
        <a href="signup.html">Profile</a>
        <a href="FuelQuoteHistory.php" class="active">Fuel Quote History</a>
        <a href="QuoteForm.php">Request Fuel Quote</a>
    </div>
</header>


<body>
    <table id="request">
         <tr>
          <th>Gallons Requested</th>
          <th>Delivery Address</th>
          <th>Delivery Date</th>
          <th>Suggested $/Gallon</th>
          <th>Total Amount Due $</th>
        </tr>
        <?php 
            for ($i = 0; $i < $loopNum; $i++)
            {
                echo "<tr><td>" . $arrayGal[$i] . "</td><td>" . $address . "</td><td>" . $arrayDate[$i] . "</td><td>" . $gallonPrice . "</td><td>" . $arrayTotal[$i] ."</td></tr>";
            }
        ?>
        <!--<tr>
            <td>1400</td>
            <td>DeliverThis to 38 Houston, Texas, 77330</td>
            <td>02/15/2201</td>
            <td>$53/gallon</td>
            <td>$32223432</td>
        </tr>        
        <tr>
            <td>1400</td>
            <td>DeliverThis to 38 Houston, Texas, 77330</td>
            <td>02/15/2201</td>
            <td>$53/gallon</td>
            <td>$32223432</td>
        </tr>
        <tr>
            <td>1400</td>
            <td>DeliverThis to 38 Houston, Texas, 77330</td>
            <td>02/15/2201</td>
            <td>$53/gallon</td>
            <td>$32223432</td>
        </tr>-->
    </table>      

</body>

</html>
© 2022 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
Loading complete