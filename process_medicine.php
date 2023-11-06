<?php
// Include database configuration and start session
include('db_config.php');
session_start();

// Check if user is not logged in as admin, redirect to login page
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Define variables and set to empty values
$med_id = $med_name = $generic_name = $batchno = $manuf_date = $exp_date = $specification = $stock = $price = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize input
    $med_name = mysqli_real_escape_string($conn, $_POST["med_name"]);
    $generic_name = mysqli_real_escape_string($conn, $_POST["generic_name"]);
    $batchno = mysqli_real_escape_string($conn, $_POST["batchno"]);
    $manuf_date = mysqli_real_escape_string($conn, $_POST["manuf_date"]);
    $exp_date = mysqli_real_escape_string($conn, $_POST["exp_date"]);
    $specification = mysqli_real_escape_string($conn, $_POST["specification"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);

    // Default status set to 1
    $status = 1;

    // File upload handling
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["images"]["name"]);
    move_uploaded_file($_FILES["images"]["tmp_name"], $targetFile);

    // Prepare SQL statement with default status set to 1
    $stmt = $conn->prepare("INSERT INTO medicines ( Med_name, generic_name, Batchno, Manuf_date, Exp_date, Specification, Stock, Price, Status, Images) 
        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement and execute it
    $stmt->bind_param("ssssssssssi", $med_name, $generic_name, $batchno, $manuf_date, $exp_date, $specification, $stock, $price, $status, $targetFile);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Medicine added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
