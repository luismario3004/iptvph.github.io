<?php
session_start();
include 'users.php'; // Load user credentials

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $device_id = $_POST['device_id'] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        // Check device ID
        $current_device_id = file_get_contents("devices/{$username}.txt");

        if ($current_device_id && $current_device_id !== $device_id) {
            // Device mismatch, log out and ban
            header('Location: banned.php');
            exit();
        }

        $_SESSION['username'] = $username;
        header('Location: redeem.php');
        exit();
    } else {
        echo "<p style='color: red;'>Invalid login credentials.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/gcash_kopiko.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="hidden" name="device_id" value="<?php echo generateDeviceID(); ?>">
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
