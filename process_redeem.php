<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gcash_number = $_POST['gcash_number'] ?? '';
    $code = $_POST['code'] ?? '';

    if (preg_match('/^[0-9]{10}$/', $gcash_number) && preg_match('/^[A-Z0-9]{10}$/', $code)) {
        // Valid, process redeem
        echo "<h2>✅ Redemption successful!</h2>";
        echo "<p>Thank you for redeeming your Kopiko Blanca!</p>";
    } else {
        echo "<h2>❌ Invalid Input</h2>";
        echo "<p>Please try again with correct code and GCash number.</p>";
    }
} else {
    header('Location: redeem.php');
    exit();
}
?>
