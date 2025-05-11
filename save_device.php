<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $device_id = $_POST['device_id'] ?? '';
    $username = $_SESSION['username'];

    file_put_contents("devices/{$username}.txt", $device_id); // Save device ID

    echo "Device ID saved!";
} else {
    echo "Invalid request.";
}
?>
