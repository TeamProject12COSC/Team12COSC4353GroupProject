<?php 
 session_start();//start session 
 require_once 'vendor/autoload.php'; 
 
 //connect to database and retrieve data to fill in form
 
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
 

 $faker = Faker\Factory::create();
 $address = $faker->address;
 
//connect to database to send information to database. prepare data to persist in DB
    if (isset($_POST["gallons"])) {
        $gal = $_POST["gallons"];
        $gallonPrice =  2;
        $total = $gal * $gallonPrice;
    }

    if (isset($_POST["datepicker"]))
    {
      $date = $_POST["datepicker"];
    }
    if (isset($_POST["deliveryaddress"]))
    {
      $deliveryAddress = $_POST["deliveryaddress"];
    }
    if (isset($_POST["suggestedprice"]))
    {
      $suggestedPrice = $_POST["suggestedprice"];
    }
    if (isset($_POST["submit"]))
    {
      //$address = str_replace(',', '', $deliveryAddress);
      $totalPrice = $_POST["total"];
      $username = $_SESSION["username"];
      $sql = "INSERT INTO FuelQuote (username, gallonsRequested, deliveryAddress, deliveryDate, dollarsPerGallon, totalDue)
      VALUES ('$username', '$gal', '$deliveryAddress' , '$date', '$gallonPrice', '$total')";
      if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
      } else {
       // echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="QuoteForm.css">
  <link rel="stylesheet" href="Nav.css">
  <script type="text/javascript" src="QuoteForm.js"></script>
  <script type="text/javascript" src="Nav.js"></script>
  <title>Website Name</title>
  <meta charset="UTF-8">
</head>

<header>
    <div class="topnav" id="myTopnav" onclick="changeActive(event)">
        <a href="Logout.php">Logout</a>  
        <a href="Profile.php">Profile</a>
        <a href="FuelQuoteHistory.php">Fuel Quote History</a>
        <a href="QuoteForm.php" class="active">Request Fuel Quote</a>
    </div>
</header>


<div class="container">
<form method="post" action="QuoteForm.php">
  
  <div class="entry edit">
  <label for="gallons">Gallons Requested:</label>
  <input type="number" id="gallons" name="gallons" min="1" max="500000000000" required onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" value="<?php if (isset($gal)){ echo $gal;}?>"
  > <br><!--referenced code to not allow user to type in "e, +, -" characters https://stackoverflow.com/questions/31706611/why-does-the-html-input-with-type-number-allow-the-letter-e-to-be-entered-in/31706796-->
  </div>

  <div class="entry">
  <label for="deliveryaddress" >Delivery Address:</label>
  <input type="text" id="deliveryaddress" name="deliveryaddress" readonly class="read" value="<?php         //create database temp
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
        //will change sql statement later when client information table is created
        $sql = "SELECT UserName, Add1 FROM userprofile";

        $result = $conn->query($sql);

        //echo "from client infomration table";

        if ($result->num_rows > 0) 
        {
            $username = $_SESSION["username"];
            // output data of each row
            while($row = $result->fetch_assoc()) {
               if ($username == $row["UserName"])
                {
                  echo $row["Add1"];
                }
            }
        }
          $conn->close();?>"><br>
  </div>

  <div class="entry edit">
  <label for="datepicker">Delivery Date:</label>
  <input type="date" id="datepicker" name="datepicker" onclick="setDateMin()" required value=
      "<?php 
      if (isset($date))
      { 
        echo $date;
      }
      ?>"><br>
  </div>

  <div class="entry">
  <label for="suggestedprice">Suggested $/Gallon:</label>
  <input type="number" id="suggestedprice" name="suggestedprice" readonly class="read" value="<?php if (isset($gal)) {echo $gallonPrice;} ?>"> <br>
  </div>

  <div class="entry">
  <label for="total">Total Amount Due: $</label>
  <input type="number" id="total" name="total" readonly class="read" value="<?php if (isset($gal)) {echo $total;}; ?>"> <br>
  </div>
<!--
  <input type="button" id="getQuote" name="getQuote" value="Get Quote">
      -->
  <div class="submitbutton">
  <input type="submit" value="Submit" name="submit">
  </div>
</form>
</div>

</body>

</html>
