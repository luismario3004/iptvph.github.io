<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Banning process
$username = $_SESSION['username'];
file_put_contents("banned/{$username}.txt", 'Banned due to device mismatch.');

session_destroy();
header('Location: banned.php');
exit();
?>
