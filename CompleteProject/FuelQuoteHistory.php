<?php 
   session_start(); //start session
   require_once 'vendor/autoload.php';


   if (!isset($_SESSION["username"])) {
    header("Location: Login.php");
    die;
  }  

?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <link rel="stylesheet" href="Nav.css">
  <link rel="stylesheet" href="FuelQuoteHistory.css">
  <title>Website Name</title>
  <meta charset="UTF-8">
</head>

<?php
    $fuelquotehistory = true;
    require_once 'Nav.php';
    ?>


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

        //create database temp
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDB";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT username, gallonsRequested, deliveryAddress, deliveryDate, dollarsPerGallon, totalDue FROM FuelQuote";

        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            $username = htmlspecialchars($_SESSION["username"], ENT_QUOTES);
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($username == htmlspecialchars($row["username"], ENT_QUOTES))
                {
                  echo "<tr><td>" . htmlentities($row["gallonsRequested"]) . "</td><td>" . htmlentities($row["deliveryAddress"]) . "</td><td>" . htmlentities($row["deliveryDate"]) . "</td><td>" . htmlentities($row["dollarsPerGallon"]) . "</td><td>" . htmlentities($row["totalDue"]) ."</td></tr>";
                }
      
            }
          }
          $conn->close();

        ?>
    </table>      

</body>

</html>
