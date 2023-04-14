<?php
require_once("config/database.php");

function getAccounts()
{
    global $conn;

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $accounts = array();
    while ($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }

    $conn->close();

    return $accounts;
}
