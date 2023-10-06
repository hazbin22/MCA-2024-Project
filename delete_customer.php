<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    $username = $_GET['user_id'];

    // Perform the deletion
    $deleteQuery = "DELETE FROM customer_details WHERE user_id = '$username'";

    if ($conn->query($deleteQuery) === TRUE) {
        // Redirect to customer_view.php with success message
        header("Location: customer_view.php?success=Customer deleted successfully");
        exit();
    } else {
        // Redirect to customer_view.php with error message
        header("Location: customer_view.php?error=Error deleting customer: " . $conn->error);
        exit();
    }
}

$conn->close();
?>