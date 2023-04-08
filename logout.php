<?php
session_start();
unset($_SESSION["currentUser"]);
unset($_SESSION["Admin"]);
header("Location: authentication/login.php");
?>