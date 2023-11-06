<?php
include('db_config.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 auto 20px auto;
            background-size: cover;
            background-position: center;
            cursor: pointer;
        }

        .edit-icon {
            font-size: 24px;
            color: #007bff;
            cursor: pointer;
        }

        .profile-info {
            text-align: left;
            max-width: 300px;
            margin: 0 auto;
        }

        .profile-info div {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .profile-container {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-picture" id="profilePicture" style="background-image: url('placeholder.jpg');">
            <div class="edit-icon" onclick="changeProfilePicture()">✏️</div>
        </div>
        <div class="profile-info">
            <div><strong>Username:</strong> johndoe123</div>
            <div><strong>First Name:</strong> John</div>
            <div><strong>Last Name:</strong> Doe</div>
            <div><strong>Email:</strong> johndoe@example.com</div>
        </div>
    </div>

    <script>
       

    </script>
</body>

</html>
