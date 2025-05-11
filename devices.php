<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$device_id = file_get_contents("devices/{$username}.txt");

echo "<h2>Device ID for {$username}:</h2><p>{$device_id}</p>";
?>
