<script src="Signup.js"></script>
<?php
   if (!isset($_SESSION["username"])) {
    header("Location: Login.php");
    die;
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

    <body>
        <section class="header">
            <div class="signup">
                <form action="Profile.php" name="profile" method="post" onsubmit="return checkZipNum()">
                    <label for="FirstName">First Name</label>
                    <input type="text" id="FirstName" name="FirstName" placeholder="FirstName" maxlength="50" required>

                    <label for="LastName">Last Name</label>
                    <input type="text" id="LastName" name="LastName" placeholder="LastName" maxlength="50" required>

                    <label for="Address1">Address 1</label>
                    <input type="text" id="Address1" name="Address1" placeholder="Address1" maxlength="100" required>

                    <label for="Address2">Address 2</label>
                    <input type="text" id="Address2" name="Address2" placeholder="Address2" maxlength="100" optional>

                    <label for="city">City</label>
                    <input type="text" id="City" name="City" placeholder="City" maxlength="100" required>

                    <label for="state">State</label>
                    <select id="State" name="State" required>
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
                    <input type="text" id="zip" name="Zipcode" placeholder="Zipcode" minlength="5" maxlength="9" required>

                    <input type="submit" value="Complete">
                </form>
            </div>
        </section>
    </body>
</html>
