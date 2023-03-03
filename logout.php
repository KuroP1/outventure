<?php
session_start();
unset($_SESSION["currentUser"]);

header("Location: authentication/login.php");
?>