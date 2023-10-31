<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <?php
    include('db_config.php'); // Include your database configuration file

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
        $token = $_GET['token'];

        // Check if the token exists and is valid
        $currentTime = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM customer_details WHERE reset_token='$token' AND reset_token_expiry > '$currentTime'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Token is valid, allow password reset
            echo "<h2>Reset Your Password</h2>";
            echo "<form action='reset_password_process.php' method='post'>";
            echo "<input type='hidden' name='token' value='$token'>";
            echo "<label for='password'>New Password:</label>";
            echo "<input type='password' id='password' name='password' required>";
            echo "<button type='submit'>Reset Password</button>";
            echo "</form>";
        } else {
            echo "Invalid or expired token.";
        }
    } else {
        echo "Invalid request.";
    }
    ?>
</body>
</html>
