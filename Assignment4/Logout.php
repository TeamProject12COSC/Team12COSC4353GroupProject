<?php
// logout.php -kt
session_start();
session_destroy();

header("Location: Login.php")

?>
