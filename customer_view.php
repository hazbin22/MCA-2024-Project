<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .logout {
            float: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        </style>
    </head>
    <body>
    <div class="container">
    <h2>Customer Management</h2>
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

            // SQL query to fetch all users
            $sql = "SELECT username,first_name,last_name FROM customer_details";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>
                         <a href='delete_customer.php?id=" . $row["username"] . "'>Delete</a>
                         </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            

            $conn->close();
            ?>
    </table>    
    </div>  
    </body>
</html>

