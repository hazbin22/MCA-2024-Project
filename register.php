<?php
include('db_config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['date_of_birth'];
    $password = $_POST['password'];

    // Perform basic server-side validation
    if (empty($username) || empty($first_name) || empty($last_name) || empty($gender) || empty($dob) || empty($password)) {
        echo "Please fill out all the fields.";
    }else {
        // Hash the password using MD5 (not recommended for production)
        $hashed_password = md5($password);

        // SQL query to insert user into the database
        $sql = "INSERT INTO customer_details (username, first_name, last_name, gender, dob, password )
                VALUES ('$username', '$first_name', '$last_name', '$gender', '$dob', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully!";
            header('Location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* CSS code goes here */
                body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            background-image: url('');
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #888888;
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
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
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 10px;
        }

        label {
            width: 100%;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="tel"],
        input[type="password"],
        input[type="date"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .gender {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
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
            background-color: #4a90e2;
        }

        .error-message {
            color: #ff0000;
            margin-top: -15px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        /* Style for the gender field container */
        .gender-field {
            margin-right: 449px;
            margin-bottom: 10px;
        }

        /* Style for the gender label */
        .gender-field label {
            display: block;
            font-weight: bold;
        }

        /* Style for the gender select dropdown */
        .gender-field select {
            width: 592%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .role-field {
            margin-right: 449px;
            margin-bottom: 10px;
        }

        /* Style for the gender label */
        .role-field label {
            display: block;
            font-weight: bold;
        }

        /* Style for the gender select dropdown */
        .role-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="" method="POST">
            <!-- Form fields -->
            <!-- Your form HTML -->
            <input type="email" id="email" name="email" placeholder="Username/Email">
            <span id="email-error" class="error-message"></span>

            <input type="text" id="fname" name="fname" placeholder="First Name">
            <span id="fname-error" class="error-message"></span>

            <input type="text" id="lname" name="lname" placeholder="Last Name">
            <span id="lname-error" class="error-message"></span>

            <div class="gender-field">
                <select id="gender" name="gender">
                    <option value="" disabled selected>Select gender</option> 
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
            </div>
            <br>

            <input type="text" id="date_of_birth" name="date_of_birth" value="Date of Birth" required><br>

            <script>
                var dobInput = document.getElementById("date_of_birth");

                dobInput.addEventListener("focus", function() {
                    dobInput.type = "date";
                });

                dobInput.addEventListener("blur", function() {
                    if (!dobInput.value) {
                        dobInput.type = "text";
                        dobInput.value = "Date of Birth";
                    }
                });
            </script>


            <input type="password" id="password" name="password" placeholder="Password">
            <span id="password-error" class="error-message"></span>

            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
            <span id="confirm-password-error" class="error-message"></span>

            <input type="submit" value="SignUp" name="submit">
        </form>        
            <script>
                // Event listeners for on-the-fly validation
                document.getElementById("email").addEventListener("input", validateEmail);
                document.getElementById("fname").addEventListener("input", validateName.bind(null, "fname"));
                document.getElementById("lname").addEventListener("input", validateName.bind(null, "lname"));
                document.getElementById("password").addEventListener("input", validatePassword);
                document.getElementById("confirm_password").addEventListener("input", validateConfirmPassword);
                document.getElementById("address1").addEventListener("input", validateText.bind(null, "address1"));
                document.getElementById("street").addEventListener("input", validateText.bind(null, "street"));
                document.getElementById("place").addEventListener("input", validateText.bind(null, "place"));
                document.getElementById("district").addEventListener("input", validateText.bind(null, "district"));
                document.getElementById("pincode").addEventListener("input", validatePincode);
                document.getElementById("phone").addEventListener("input", validatePhone);
                document.getElementById("date_of_birth").addEventListener("input", validateDateOfBirth);

                function validateEmail() {
                    var emailInput = document.getElementById("email");
                    var emailError = document.getElementById("email-error");
                    var isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);

                    if (!isValid) {
                        emailError.textContent = "Invalid email address";
                    } else {
                        emailError.textContent = "";
                    }
                }

                function validateName(inputId) {
                    var nameInput = document.getElementById(inputId);
                    var nameError = document.getElementById(inputId + "-error");
                    var isValid = /^[A-Za-z]+$/.test(nameInput.value) && nameInput.value.length >= 2 && nameInput.value.length <= 50;

                    if (!isValid) {
                        nameError.textContent = "Invalid " + inputId.charAt(0).toUpperCase() + inputId.slice(1) + " (2 to 50 characters, letters only)";
                    } else {
                        nameError.textContent = "";
                    }
                }

                function validateDateOfBirth() {
                    var dobInput = document.getElementById("date_of_birth");
                    var dobError = document.getElementById("date_of_birth-error");
                    var isValid = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/.test(dobInput.value); // Date format: YYYY-MM-DD
                
                    if (!isValid) {
                        dobError.textContent = "Invalid date of birth (YYYY-MM-DD format)";
                    } else {
                        dobError.textContent = "";
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

                function validateConfirmPassword() {
                    var passwordInput = document.getElementById("password");
                    var confirmInput = document.getElementById("confirm_password");
                    var confirmError = document.getElementById("confirm-password-error");
                    var isValid = passwordInput.value === confirmInput.value && !/\s/.test(confirmInput.value);

                    if (!isValid) {
                        confirmError.textContent = "Passwords do not match or contain spaces";
                    } else {
                        confirmError.textContent = "";
                    }
                }

                function validateText(inputId) {
                    var input = document.getElementById(inputId);
                    var error = document.getElementById(inputId + "-error");
                    var isValid = input.value.length >= 2 && input.value.length <= 50;

                    if (!isValid) {
                        error.textContent = "Invalid " + inputId.charAt(0).toUpperCase() + inputId.slice(1) + " (2 to 50 characters)";
                    } else {
                        error.textContent = "";
                    }
                }

                function validatePincode() {
                    var pincodeInput = document.getElementById("pincode");
                    var pincodeError = document.getElementById("pincode-error");
                    var isValid = /^\d{6}$/.test(pincodeInput.value);

                    if (!isValid) {
                        pincodeError.textContent = "Invalid pincode (6 digits)";
                    } else {
                        pincodeError.textContent = "";
                    }
                }

                function validatePhone() {
                    var phoneInput = document.getElementById("phone");
                    var phoneError = document.getElementById("phone-error");
                    var isValid = /^\d{10}$/.test(phoneInput.value);

                    if (!isValid) {
                        phoneError.textContent = "Invalid phone number (10 digits)";
                    } else {
                        phoneError.textContent = "";
                    }
                }

            </script>

            <style>
                .error-message {
                    color: red;
                    font-size: 12px;
                    margin-top: 5px;
                    display: block;
                }
            </style>

    </div>
</body>
</html>
