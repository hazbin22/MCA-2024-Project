
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
            text-align: left;
            margin-top: 10px;
        }
        .forgot-password-link {
            text-align: left;
            margin-top: 0px;
        }
        
    </style>
</head>
<body id="bg">
    <div class="container">
        <h2>Login</h2>
        <form action="" method="post"> 
            <input type="text" id="username" name="email" placeholder="Username/Email">
            <span id="email-error" class="error-message"></span>
    
            <input type="password" id="password" name="password" placeholder="Enter Your Password">
            <span id="password-error" class="error-message"></span>

            <p class="forgot-password-link">Forgot your password? <a href="#" id="forgot-password-link">Reset it here</a></p>
    
            <input class="login" type="submit" value="Log In">
        </form>
        <br>
        <p class="register-link">Don't have an account? <a href="register.html">Register here</a></p>
    </div>
    
    <script>
        // Event listeners for on-the-fly validation
        document.getElementById("username").addEventListener("input", validateEmailOrUsername);
        document.getElementById("password").addEventListener("input", validatePassword);
    
        function validateEmailOrUsername() {
            var emailInput = document.getElementById("username");
            var emailError = document.getElementById("email-error");
            var isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);
    
            if (!isValid) {
                emailError.textContent = "Invalid email address";
            } else {
                emailError.textContent = "";
            }
        }
    
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
