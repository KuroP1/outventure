<?php
session_start();
unset($_SESSION["currentUser"]);
unset($_SESSION["isAdmin"]);
//redirect to index.php
header("Location: ../index.php");
?>