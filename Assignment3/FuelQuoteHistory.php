<?php
    session_start();
    $array = array("okay street 51233", "Houston bar street 230", "austin road 2933");
    $gallonPrice =  (mt_rand(-88888, 999999) / 10);
    $gallonRequested =  (mt_rand(0, 999999) / 10);
    $total = (mt_rand(-9999999, 95699999) / 10);
    if ($gallonPrice < 0)
    {
      $gallonPrice =  (mt_rand(0, 999999) / 10);
    }
    if ($total < 0)
    {
      $total =   (mt_rand(0, 95699999) / 10);
    }
    $randomDate = date("Y M d");

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
      <a href="Profile.html">Profile</a>
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
            foreach($array as $value)
            {
                echo "<tr><td>" . $gallonRequested . "</td><td>" . $value . "</td><td>" . $randomDate . "</td><td>" . $gallonPrice . "</td><td>" . $total ."</td></tr>";
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
