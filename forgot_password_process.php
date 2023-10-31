<?php
    include('db_config.php'); // Include your database configuration file

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        // Check if the email exists in the database
        $sql = "SELECT * FROM customer_details WHERE username='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Generate a unique token
            $resetToken = bin2hex(random_bytes(32)); // Generate a random token (you can adjust the length as needed)
            
            // Set the token and expiry time in the database
            $expiryTime = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expires in 1 hour
            $updateTokenQuery = "UPDATE customer_details SET reset_token='$resetToken', reset_token_expiry='$expiryTime' WHERE username='$email'";
            
            if ($conn->query($updateTokenQuery) === TRUE) {
                // Send the reset email with a link containing the token
                $resetLink = "http://yourwebsite.com/reset_password.php?token=$resetToken";
                $to = $email;
                $subject = "Password Reset";
                $message = "Click the following link to reset your password: $resetLink";
                $headers = "From: fathimahazbin1234@.com"; // Set your email address here
                
                if (mail($to, $subject, $message, $headers)) {
                    echo "Password reset email sent. Please check your email.";
                } else {
                    echo "Failed to send reset email. Please try again later.";
                }
            } else {
                echo "Error updating token: " . $conn->error;
            }
        } else {
            echo "Email not found in the database.";
        }
        
        $conn->close();
    }
    ?>