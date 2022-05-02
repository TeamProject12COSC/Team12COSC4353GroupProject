<?php

include 'config.php';
session_start(); //commented out for unit testing purposes
error_reporting(0);

//connect to database and retrieve data to fill in form

//create database temp
$servername = "localhost";
$usernamedb = "root";
$passworddb = "";
$dbname = "myDB";


// Create connection
$conn = new mysqli($servername, $usernamedb, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <div class="container">
        <form class="form" id="login" action="" method="POST">
            <h1 class="form__title">Login</h1>
            <?php
            // for mysql
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if (mysqli_num_rows($result) > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION['username'] = $row['username'];

                    $sql = "SELECT new, username FROM users WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $new = $result->fetch_assoc();
                    if ($new["new"]) {
                        header("Location: Signup.php");
                    } else {
                        header("Location: Profile.php");
                    }
                } else {
                    echo '<div class="form__message form__message--error">Username or Password is incorrect</div>';
                }
            }
            $conn->close();
   
            ?>
            <!-- <div class="form__message form__message--error">Username or Password is incorrect</div> -->

            <!-- Username -->
            <div class="form__input-group">
                <input type="text" class="form__input" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                <div class="form__input-error-message"></div>
            </div>

            <!-- Password -->
            <div class="form__input-group">
                <input type="password" class="form__input" name="password" placeholder="Password" required>
                <div class="form__input-error-message"></div>
            </div>

            <!-- Login Button -->
            <button class="form__button" name="submit">Login</button>

            <!-- Register -->
            <p class="form__text">
                Don't have an account?
                </br>
                <a class="form__link" href="Register.php" id="linkCreateAccount"> Create Account</a>
            </p>

        </form>


        <!-- <form class="form form--hidden" id="createAccount">
                <h1 class="form__title">Register</h1>
                <div class="form__message form__message--error"></div>

                Username
                <div class="form__input-group">
                    <input type="text" class="form__input" placeholder="Username" name = "username" required>
                    <div class="form__input-error-message"></div>
                </div>

                Password
                <div class="form__input-group">
                    <input type="password" class="form__input" placeholder="Password" name = "password" required>
                    <div class="form__input-error-message"></div>
                </div>

                <div class="form__input-group">
                    <input type="password" class="form__input" placeholder="Confirm Password" name = "cpassword" required>
                    <div class="form__input-error-message"></div>
                </div>

                Sign Up Button
                <button class="form__button" type="submit">Create Account</button>

                Register
                <p class="form__text">
                    Already an existing client?
                    </br>
                    <a class="form__link" href="./" id="linkLogin"> Sign In</a>
                </p>
                
            </form> -->
    </div>
    <script src="./Login.js"></script>
</body>

</html>

