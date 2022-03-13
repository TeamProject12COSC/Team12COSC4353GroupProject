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
        <a href="Logout.php">Logout</a>  
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
    </table>      

</body>

</html>
