

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        ul li a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="customer_view.php">Customers</a></li>
            <li><a href="#staff">Staff</a></li>
            <li><a href="#medicine">Medicine</a></li>
        </ul>
        </div>

        <div class="content">
            <h2>Welcome, Admin!</h2>
            <!-- Content for each section (Customers, Staff, Medicine) goes here -->
        </div>
        <a href="logout.php" class="logout">Logout</a>   
        </table>
    </div>
</body>

</html>
