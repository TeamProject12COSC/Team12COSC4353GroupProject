<?php 
 session_start();//start session 
 
 if (!isset($_SESSION["username"])) {
  header("Location: Login.php");
  die;
  }

 require_once 'vendor/autoload.php'; 
 require_once 'Price.php';
 


//connect to database to send information to database. prepare data to persist in DB
    if (isset($_POST["gallons"])) {
      $gal = htmlspecialchars($_POST["gallons"], ENT_QUOTES);

    //connect to database and retrieve data to fill in form
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
    $username = htmlspecialchars($_SESSION["username"], ENT_QUOTES);
    $sql = "SELECT StateCode FROM userprofile WHERE UserName=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
   // $result = $conn->query($sql);
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
      $row = $result->fetch_assoc();
      if (htmlspecialchars($row["StateCode"], ENT_QUOTES) == "TX")
      {
        $state = 0.02;
      }
      else
      {
        $state = 0.04;
      }
    }
    $stmt->close();

    $sql = "SELECT gallonsRequested FROM FuelQuote WHERE UserName=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    //$result = $conn->query($sql);
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
      $history = 0.01;
    }
    else
    {
      $history = 0;
    }
    if ($gal >= 1000)
    {
      $gallonsRequestedFactor = 0.02;
    }
    else
    {
      $gallonsRequestedFactor = 0.03;
    }

    $price = new Price($state, $history, $gal, $gallonsRequestedFactor);
    $gallonPrice =  $price->calculateSuggestedPrice();
    $total = $price->calculateTotal();

    $stmt->close();
    $conn->close();

    }

    if (isset($_POST["datepicker"]))
    {
      $date = htmlspecialchars($_POST["datepicker"], ENT_QUOTES);
    }
    if (isset($_POST["deliveryaddress"]))
    {
      $deliveryAddress = htmlspecialchars($_POST["deliveryaddress"], ENT_QUOTES);
    }
    if (isset($_POST["suggestedprice"]))
    {
      $suggestedPrice = htmlspecialchars($_POST["suggestedprice"], ENT_QUOTES);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="QuoteForm.css">
  <link rel="stylesheet" href="Nav.css">
  <script type="text/javascript" src="QuoteForm.js"></script>
  <title>Website Name</title>
  <meta charset="UTF-8">
</head>

    <?php
    $quoteform = true;
    require_once 'Nav.php';
    ?>

<body>
  <?php
      //connect to database and retrieve data to fill in form
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

  if (isset($_POST["submit"]))
  {
    //$address = str_replace(',', '', $deliveryAddress);
    $totalPrice = htmlspecialchars($_POST["total"], ENT_QUOTES);
    $username = htmlspecialchars($_SESSION["username"], ENT_QUOTES);
    $sql = "INSERT INTO FuelQuote (username, gallonsRequested, deliveryAddress, deliveryDate, dollarsPerGallon, totalDue)
    VALUES (?, ?, ? , ?, ?, ?)";
    //VALUES ('$username', '$gal', '$deliveryAddress' , '$date', '$gallonPrice', '$total')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissdd", $username, $gal, $deliveryAddress, $date, $gallonPrice, $total);
    //if ($conn->query($sql) === TRUE) {
    if ($stmt->execute() === TRUE) {
      echo "
            <div class='submissionSuccess'>
                <span class='checkmark'>
                <div class='checkmark_stem'></div>
                <div class='checkmark_kick'></div>
                </span>
              Quote Submitted!
            </div>";
      //echo "New record created successfully";
    } else {
     // echo "Error: " . $sql . "<br>" . $conn->error;
    }
      $stmt->close();
  }

  $conn->close();

  ?>


<div class="container">
<form method="post" action="QuoteForm.php">
  
  <div class="entry edit">
  <label for="gallons">Gallons Requested:</label>
  <input type="number" id="gallons" name="gallons" min="1" max="500000000000" required onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" value="<?php if (isset($gal)){ echo htmlentities($gal);}?>"
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
            $username = htmlspecialchars($_SESSION["username"], ENT_QUOTES);
            // output data of each row
            while($row = $result->fetch_assoc()) {
               if ($username == htmlspecialchars($row["UserName"], ENT_QUOTES))
                {
                  echo htmlentities($row["Add1"]);
                }
            }
        }
          $conn->close();?>"><br>
  </div>

  <div class="entry edit">
  <label for="datepicker">Delivery Date:</label>
  <input type="date" id="datepicker" name="datepicker" max='9999-12-30' onclick="setDateMin()" required value=
      "<?php 
      if (isset($date))
      { 
        echo htmlentities($date);
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

  <input type="submit" id="getQuote" name="getQuote" value="Get Quote" <?php if(!isset($_POST['total'])) {echo 'disabled';} ?>>

  <div class="submitbutton">
  <input type="submit" id="submit" name="submit" value="Submit Quote" <?php if(!isset($_POST['total'])) {echo 'disabled';} ?>>
  </div>
</form>
</div>

</body>

</html>
