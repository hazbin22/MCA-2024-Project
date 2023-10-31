
<?php
include('db_config.php');

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = md5($password);

    // Check if the user is a client
    echo "SQL query: " . $sql_cust; // Before executing the query

    $sql_cust = "SELECT * FROM customer_details WHERE username='$username' AND password='$hashed_password'";
    $result_cust = $conn->query($sql_cust);

    if (!$result_cust) {
        die("SQL query failed: " . $conn->error);
    }

    if ($result_cust->num_rows > 0) {
        // Client login successful
        $_SESSION['username'] = $username; // Set session variable  
        header('Location: customer.php');
        exit();
    }

    // Check if the user is an admin
    $sql_admin = "SELECT * FROM admin WHERE username='$username' AND password='$hashed_password'";
    $result_admin = $conn->query($sql_admin);

    if (!$result_admin) {
        die("SQL query failed: " . $conn->error);
    }

    if ($result_admin->num_rows > 0) {
        // Admin login successful
        $_SESSION['admin'] = $username;
        header('Location: admin.php');
        exit();
    }

    // If neither client nor admin, display an error message
    echo "<script>alert('Invalid username or password. Please try again.'); window.location.href='login.php';</script>";

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        #bg {
            background-repeat: no-repeat;
            background-image: url("images/img5.jpg");
            background-size: cover;
            background-position: top;
            background-attachment: fixed;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.46);
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #888888;
            width: 80%;
            max-width: 400px;
            padding: 20px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #6EB5FF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #287bd4;
        }
        .error-message {
            color: #ff0000;
            margin-top: -15px;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password-link {
            text-align: center;
            margin-top: 0px;
        }
        .google-signup {
            text-align: center;
            margin-top: 20px; /* Adjust the margin-top value as needed */
        }

        .google-signup img {
            width: 30px; /* Set the width of the Google logo */
            margin-right: 5px;
        }
        .google-signup a{
            all: unset;
            cursor: pointer;
            padding: 8px;
            display: flex;
            width: 340px;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            background-color: #f9f9f9;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 3px;
            margin-left:0px;
            }
        a:hover{
            background-color: #f9f9f9;
        }
        img{
            width: 50px;
            margin-right: 5px;   
        }
        
        
    </style>
</head>
<body id="bg">`
    <div class="container">
        <h2>Login</h2>
        
        <form action="" method="post"> 
            <input type="text" id="username" name="email" placeholder="Username/Email">
            <span id="email-error" class="error-message"></span>
    
            <input type="password" id="password" name="password" placeholder="Enter Your Password">
            <span id="password-error" class="error-message"></span>

            <p class="forgot-password-link"><a href="forgot_password.php" id="forgot-password-link">Forgot your password? </a></p>
    
            <input class="login" type="submit" value="Log In">
        </form>
        <br>
        <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
        <div class="google-signup">
            <a href="<?= $login_url ?>"><img src="https://tinyurl.com/46bvrw4s" alt="Google Logo"> Sign up with Google</a>
        </div>
    </div>
    
    <script>
        // Event listeners for on-the-fly validation
        document.getElementById("username").addEventListener("input", validateEmailOrUsername);
        document.getElementById("password").addEventListener("input", validatePassword);
    
        // Get the email input field
        var emailInput = document.getElementById("email");

        // Add an event listener for the input event (when user types)
        emailInput.addEventListener("input", function() {
            var email = emailInput.value;
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // Validate the email address
            if (emailRegex.test(email)) {
                // Valid email address, you can add further actions here
                console.log("Valid email address: " + email);
            } else {
                // Invalid email address, you can add error messages or styles here
                console.log("Invalid email address: " + email);
            }
        });

    
        function validatePassword() {
            var passwordInput = document.getElementById("password");
            var passwordError = document.getElementById("password-error");
            var isValid = passwordInput.value.length >= 8 && !/\s/.test(passwordInput.value);
    
            if (!isValid) {
                passwordError.textContent = "Invalid password (minimum 8 characters, no spaces)";
            } else {
                passwordError.textContent = "";
            }
        }
    
        // Additional functionality for the "Forgot Password" link can be added here
        var forgotPasswordLink = document.getElementById("forgot-password-link");
        forgotPasswordLink.addEventListener("click", function(event) {
            event.preventDefault();
            // Implement logic to handle "Forgot Password" functionality, e.g., show a modal or redirect to a reset password page
        });
    </script>
    
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }
    </style>
    
</body>
</html>
