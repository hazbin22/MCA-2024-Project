<?php
session_start();
include("db_config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $building_or_house = $_POST["address1"];
    $street = $_POST["street"];
    $city = $_POST["place"];
    $district = $_POST["district"];
    $pincode = $_POST["pincode"];
    $phone = $_POST["phone"];
    
    // Retrieve other customer details from the form
    $username = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $dateOfBirth = $_POST["date_of_birth"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Set default status to 1 (active) for both address and customer
    $status = 1;
    $role = 'C'; // Default role set to Customer

    // Insert address details into address_details table
    $addressQuery = "INSERT INTO address_details (building_or_house, street, city, district, pincode, phone, status) 
                     VALUES ('$building_or_house', '$street', '$city', '$district', '$pincode', '$phone', '$status')";
    $conn->query($addressQuery);
    $addressId = $conn->insert_id; // Get the ID of the inserted address record

    // Insert customer details into customer_details table with the address_id and status
    $customerQuery = "INSERT INTO customer_details (first_name, last_name, gender, date_of_birth, address_id, role, status) 
                      VALUES ('$fname', '$lname', '$gender', '$dateOfBirth', '$addressId', '$role', '$status')";
    $conn->query($customerQuery);

    // Insert login details into login_details table
    $loginQuery = "INSERT INTO login_details (username, password, type, status) 
                   VALUES ('$username', '$password', 'Customer', '$status')";
    $conn->query($loginQuery);

    // Redirect to a success page or login page after registration
    header("Location: login.php");
    exit();
}
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

            <input type="text" id="address1" name="address1" placeholder="Building/House Name"><br>

            <input type="text" id="street" name="street" placeholder="Street"><br>
            
            <input type="text" id="place" name="place" placeholder="City"><br>
            
            <input type="text" id="district" name="district" placeholder="District"><br>
            
            <input type="text" id="pincode" name="pincode" placeholder="Pincode"><br>
            
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Phone Number"><br>
            

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
