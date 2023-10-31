<?php
include('db_config.php'); // Include your database configuration file

// Check if the user is logged in, and if not, redirect to the login page
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}   

// Fetch customer data based on the logged-in username
$username = $_SESSION['username'];
$sql = "SELECT * FROM customer_details WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $customer = $result->fetch_assoc();
} else {
    // Handle the case when customer data is not found (redirect to an error page or display an error message)
    echo "Error: Customer data not found.";
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>Customer Profile</h2>
        <a href="edit_profile.php">Edit Profile</a>
        <p>Username: <?php echo $customer['username']; ?></p>
        <p>First Name: <?php echo $customer['first_name']; ?></p>
        <p>Last Name: <?php echo $customer['last_name']; ?></p>
    </div>
</body>

</html>
