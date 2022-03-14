<?php 
  // session_start();//start session 
 require_once 'vendor/autoload.php';
 
 //connect to database and retrieve data to fill in form
 $faker = Faker\Factory::create();
 $address = $faker->address;

//connect to database to send information to database. prepare data to persist in DB
    if (isset($_POST["gallons"])) {
        $gal = $_POST["gallons"];
        $gallonPrice =  $faker->randomFloat(2, 1);
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
    if (isset($_POST["total"]))
    {
      $totalPrice = $_POST["total"];
    }


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
        <a href="Signup.php">Profile</a>
        <a href="FuelQuoteHistory.php">Fuel Quote History</a>
        <a href="QuoteForm.php" class="active">Request Fuel Quote</a>
    </div>
</header>

<?php
    if (!isset($_POST["datepicker"]))
    {
      echo '<body onload="myFunction()">';
    }
    else
    {
      echo '<body onload="setDateMin()">';
    }
?>


<div class="container">
<form method="post" action="QuoteForm.php">
  
  <div class="entry edit">
  <label for="gallons">Gallons Requested:</label>
  <input type="number" id="gallons" name="gallons" min="1" required onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" value="<?php if (isset($gal)){ echo $gal;}?>"
  > <br><!--referenced code to not allow user to type in "e, +, -" characters https://stackoverflow.com/questions/31706611/why-does-the-html-input-with-type-number-allow-the-letter-e-to-be-entered-in/31706796-->
  </div>

  <div class="entry">
  <label for="deliveryaddress" >Delivery Address:</label>
  <input type="text" id="deliveryaddress" name="deliveryaddress" readonly class="read" value="<?php echo $address?>"><br>
  </div>

  <div class="entry edit">
  <label for="datepicker">Delivery Date:</label>
  <input type="date" id="datepicker" name="datepicker" value="<?php if (isset($date)){ echo $date;}?>"><br>
  </div>

  <div class="entry">
  <label for="suggestedprice">Suggested $/Gallon:</label>
  <input type="number" id="suggestedprice" name="suggestedprice" readonly class="read" value="<?php if (isset($gal)) {echo $gallonPrice;} ?>"> <br>
  </div>

  <div class="entry">
  <label for="total">Total Amount Due: $</label>
  <input type="number" id="total" name="total" readonly class="read" value="<?php if (isset($gal)) {echo $total;}; ?>"> <br>
  </div>

  <div class="submitbutton">
  <input type="submit" value="Submit">
  </div>
</form>
</div>

</body>

</html>
