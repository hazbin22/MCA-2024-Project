<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px 20px;
            color: white;
        }

        .navbar h1 {
            margin: 0; /* Remove default margin of h1 */
            text-align: center; /* Horizontally center the text */
            line-height: 40px; 
        }

        .logout {
            /* Styles for logout button */
            background-color: #3f5bdf; /* Light blue color */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }



        .logout:hover {
            background-color: #cc0000;
        }

        .sidebar {
            height: 100vh;
            width: 300px;
            position: fixed;
            top: 59px;
            left: 0;
            background-color: #1a237e;
            padding-top: 20px;
        }

        .sidebar h2 {
            color: white;
            text-decoration: none;
            margin-bottom: 30px;
            margin-left: 0;
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
            padding: 12px 20px;
            display: block;
            transition: 0.3s;
        }

        ul li a:hover {
            background-color: #3949ab;
        }

        .content {
            margin-left: 350px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }
        }

        ul li a.active {
            background-color: #3949ab;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>PHARMIO ADMIN</h1>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="customer_view.php">Customers</a></li>
                <li><a href="staff_view.php">Staff</a></li>
                <li><a href="#medicine">Medicine</a></li>
            </ul>
        </div>

        <div class="content">
            <h2>Welcome, Admin!</h2>
            <!-- Content for each section (Customers, Staff, Medicine) goes here -->
        </div>
    </div>

    <!-- Add your JavaScript links or scripts here -->

</body>

</html>
