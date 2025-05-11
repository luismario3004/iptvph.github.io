<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Redeem Now</title>
<link rel="stylesheet" href="assets/gcash_kopiko.css">
<link rel="icon" href="assets/favicon.ico" type="image/x-icon">
<script src="assets/security.js" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header class="header">
    <img src="assets/kopiko_logo.png" alt="Kopiko Logo">
    <span>Kopiko Blanca Redeem</span>
    <a href="logout.php" style="color:white;">Logout</a>
</header>

<div class="redeem-container">
    <h2>Redeem Your Kopiko Blanca</h2>
    <form method="POST" action="process_redeem.php">
        <input type="text" name="code" placeholder="Enter 10 Capital Letters/Numeric Code" pattern="[A-Z0-9]{10}" required>
        <input type="text" name="gcash" placeholder="+63XXXXXXXXXX" pattern="^\+63\d{10}$" required>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
