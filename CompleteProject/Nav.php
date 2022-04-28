<link rel="stylesheet" href="Nav.css">  

<header>
    <div class="topnav" id="myTopnav" onclick="changeActive(event)">
        <a href="Logout.php">Logout</a>  
        <a href="Profile.php" <?php if (isset($profile)) {echo "class='active'";} ?>>Profile</a>
        <a href="FuelQuoteHistory.php" <?php if (isset($fuelquotehistory)) {echo "class='active'";} ?>>Fuel Quote History</a>
        <a href="QuoteForm.php" <?php if (isset($quoteform)) {echo "class='active'";} ?> >Request Fuel Quote</a>
    </div>
</header>
 
