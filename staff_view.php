<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHARMIO ADMIN - Staff Management</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .navbar {
                background-color: #3949ab;
            color: white;
            padding: 10px 20px;
            text-align: center;
            }

            .logout {
                float: right;
                color: white;
                text-decoration: none;
                margin-left: 10px;
            }

            .sidebar {
                height: 100vh;
                width: 200px;
                position: fixed;
                top: 100px;
                left: 0;
                background-color: #1a237e;
                padding-top: 20px;
            }

            .sidebar h2 {
                color: white;
                text-align: left;
                margin-bottom: 30px;
                margin-left: 20px;
            }

            .sidebar ul {
                list-style-type: none;
                padding: 0;
            }

            .sidebar li {
                margin-bottom: 10px;
            }

            .sidebar li a {
                color: white;
                text-decoration: none;
                padding: 10px 20px;
                display: block;
                background-color: #3949ab;
                border-radius: 5px;
                transition: 0.3s;
            }

            .sidebar li a:hover {
                background-color: #303f9f;
            }

            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                margin-left: 220px;
            }

            h2 {
                text-align: center;
            }

            .add-button {
                margin-bottom: 20px;
                background-color: #4caf50;
                color: white;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }

            .add-button:hover {
                background-color: #45a049;
            }

            .edit-button,
            .delete-button {
                color: #2196F3;
                cursor: pointer;
                margin-right: 10px;
            }

            .edit-button:hover,
            .delete-button:hover {
                text-decoration: underline;
            }
            .dashboard-link {
                text-decoration: none; /* Remove underline from the link */
                color: inherit; /* Inherit the text color from the parent (black by default) */
            }
            .add-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-align: center;
                text-decoration: none;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .add-button:hover {
                background-color: #45a049;
            }

        </style>
    </head>
    <body>
    <div class="navbar">
        <h1>PHARMIO ADMIN</h1>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="sidebar">
        <h2><a href="admin.php" class="dashboard-link">Dashboard</a></h2>
        <ul>
            <li><a href="customer_view.php">Customers</a></li>
            <li><a href="staff_view.php">Staff</a></li>
            <li><a href="medicine_view.php">Medicine</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Staff Management</h2>
        <a href="staff_form.php" class="add-button">Add Staff</a>
        <table>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
            <?php
            // Include database connection code
            include('db_config.php');

            if (isset($_GET['success'])) {
                echo "<div style='color:green;'>" . $_GET['success'] . "</div>";
            } elseif (isset($_GET['error'])) {
                echo "<div style='color:red;'>" . $_GET['error'] . "</div>";
            }

            // SQL query to fetch all staff
            $sql = "SELECT username,first_name,last_name FROM staff_details";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>
                            <span class='edit-button'>Edit</span>
                            <span class='delete-button'>Delete</span>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No staff found.</td></tr>";
            }
            

            $conn->close();
            ?>
        </table>    
    </div>  
    </body>
</html>
