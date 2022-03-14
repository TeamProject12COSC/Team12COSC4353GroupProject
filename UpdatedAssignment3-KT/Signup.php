<script src="Signup.js"></script>
<?php

 include_once 'EditProfile.php';
//connect to database to send information to database. prepare data to persist in DB


$valid = false;
$profile = new EditProfile();
    if (isset($_POST['submit'])) {
        if (isset($_POST["First Name"])) {
            $firstName = $_POST["First Name"];
        }
        if (isset($_POST["Last Name"])) {
            $lastName = $_POST["Last Name"];
        }
        if (isset($_POST["Address 1"])) {
            $address1 = $_POST["Address 1"];
        }
        if (isset($_POST["Address 2"])) {
            $address2 = $_POST["Address 2"];
        }
        if (isset($_POST["City"])) {
            $city = $_POST["City"];
        }
        if (isset($_POST["State"])) {
            $state = $_POST["State"];
        }
        if (isset($_POST["Zipcode"])) {
            $zipCode = $_POST["Zipcode"];
        }
        $profile->assignValues($firstName, $lastName, $address1, $address2, $city, $state, $zipCode);
        $valid = $profile->isValid();
    }
if($valid) {
    header("Location: Profile.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="Signup.css" />
        <link rel="stylesheet" href="Nav.css">
        <script type="text/javascript" src="Nav.js"></script>
    </head>
    <header>
     <div class="topnav" id="myTopnav" onclick="changeActive(event)">
        <a href="Login.php">Logout</a>  
        <a href="Signup.php" class="active">Profile</a>
        <a href="FuelQuoteHistory.php">Fuel Quote History</a>
        <a href="QuoteForm.php">Request Fuel Quote</a>
     </div>
    </header>
    <body>
        <section class="header">
            <div class="signup">
                <form action="Profile.php" name="profile" onsubmit="return checkZipSize()">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="First Name" placeholder="First Name" maxlength="50" required>

                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="Last Name" placeholder="Last Name" maxlength="50" required>

                    <label for="addy1">Address 1</label>
                    <input type="text" id="addy1" name="Address 1" placeholder="Address 1" maxlength="100" required>

                    <label for="addy2">Address 2</label>
                    <input type="text" id="addy2" name="Address 2" placeholder="Address 2" maxlength="100" optional>

                    <label for="city">City</label>
                    <input type="text" id="city" name="City" placeholder="City" maxlength="100" required>

                    <label for="state">State</label>
                    <select id="state" name="State" required>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>

                    <label for="zip">Zipcode</label>
                    <input type="number" id="zip" name="Zipcode" placeholder="Zipcode" minlength="5" maxlength="9" required>

                    <input type="submit" value="Complete">
                </form>
            </div>
        </section>
    </body>
</html>
