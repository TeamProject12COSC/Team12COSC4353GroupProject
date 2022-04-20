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
  <script type="text/javascript" src="Nav.js"></script>
  <title>Website Name</title>
  <meta charset="UTF-8">
</head>

<header>
    <div class="topnav" id="myTopnav" onclick="changeActive(event)">
        <a href="Logout.php">Logout</a>  
        <a href="Profile.php">Profile</a>
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
            $username = $_SESSION["username"];
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($username == $row["username"])
                {
                  echo "<tr><td>" . $row["gallonsRequested"] . "</td><td>" . $row["deliveryAddress"] . "</td><td>" . $row["deliveryDate"] . "</td><td>" . $row["dollarsPerGallon"] . "</td><td>" . $row["totalDue"] ."</td></tr>";
                }
      
            }
          }
          $conn->close();

        ?>
    </table>      

</body>

</html>
