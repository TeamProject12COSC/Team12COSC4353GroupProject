<?php
// include 'config.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <div class="container">
        <form class="form" action="" method="POST">
            <h1 class="form__title">Register</h1>
            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $cpassword = md5($_POST['cpassword']);
                $new = true;

                if ($password == $cpassword) {
                    // $sql = "SELECT * FROM users WHERE username = '$username'";
                    // $result = mysqli_query($conn, $sql);
                    // if (mysqli_num_rows($result) > 0) {
                    //     echo '<div class="form__message form__message--error">Username is already taken</div>';
                    // } else {
                    //     $sql = "INSERT INTO users (username, password, new) VALUES ('$username', '$password', $new)";
                    //     $result = mysqli_query($conn, $sql);
                    //     if ($result) {
                    //         echo "<script>alert('Registration success')</script>";
                    //         $username = "";
                    //         $password = "";
                    //     } else {
                    //         echo "<script>alert('Something went wrong')</script>";
                    //     }
                    // }
                } else {
                    echo '<div class="form__message form__message--error">Passwords do not match</div>';
                }
            }
            ?>

            <!-- Username -->
            <div class="form__input-group">
                <input type="text" class="form__input" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                <div class="form__input-error-message"></div>
            </div>

            <!-- Password -->
            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="Password" name="password" required>
                <div class="form__input-error-message"></div>
            </div>

            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="Confirm Password" name="cpassword" required>
                <div class="form__input-error-message"></div>
            </div>
 
            <!-- Sign Up Button -->
            <button class="form__button" name="submit">Create Account</button>

            <!-- Register -->
            <p class="form__text">
                Already an existing client?
                </br>
                <a class="form__link" href="Login.php" id="linkLogin"> Sign In</a>
            </p>
        </form>
    </div>
    <script src="./Login.js"></script>
</body>

</html>
