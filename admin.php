<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

    <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style1.css" rel="stylesheet" />
  <!-- responsive style -->
    <link href="css/style1.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .header_section {
            background-color: white; /* Set background color to white */
            color: #1a237e; /* Set text color to your preferred color */
            padding: 10px 0;
        }

        .custom_nav-container {
            padding: 0 20px;
        }

        .navbar-brand span {
            font-weight: bold;
        }

        .navbar-nav .nav-item {
            margin-right: 20px;
        }

        .navbar-nav .nav-item:last-child {
            margin-right: 0;
        }

        .navbar-nav .nav-link {
            color: #1a237e; /* Set text color to your preferred color */
        }

        .navbar-nav .nav-link:hover {
            color: #3949ab;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }

        .navbar .logout {
            margin-right: 20px;
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
            margin-left: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-left: 20px;
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
            /*margin-left: 320px; /* Adjust the margin to your preference */
            padding: 20px;
            transition: margin-left 0.3s;
            text-align: center;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 0; /* Set margin to 0 for smaller screens */
            }
        }
        ul li a.active {
            background-color: #3949ab;
            font-weight: bold;
        }

        .dashboard-section {
            background-color: #E6E6FA;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: calc(50% - 20px); /* Set the width to 50% of the container minus padding */
            margin-right: 20px; /* Add some spacing between boxes */
            float: left; /* Float the boxes to arrange them horizontally */
            height: 250px; /* Set a fixed height for square shape */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }
        .dashboard-section:nth-child(2n) {
            margin-right: 0; /* Remove margin for every 2nd box in a row */
        }
        @media (max-width: 768px) {
            .dashboard-section {
                width: calc(100% - 40px); /* Set full width for smaller screens */
                margin-right: 0;
                margin-bottom: 15px; /* Add spacing between boxes on smaller screens */
            }
        }

        .dashboard-section h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .dashboard-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dashboard-section li {
            margin-bottom: 10px;
        }

        .dashboard-section a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
            text-align: center;
        }

        .dashboard-section a:hover {
            color: #fff ;
        }

        @media (max-width: 768px) {
            .dashboard-section {
                padding: 15px;
            }

            .dashboard-section h2 {
                font-size: 20px;
                margin-bottom: 15px;
            }

            .dashboard-section li {
                margin-bottom: 8px;
            }

            .dashboard-section a {
                font-size: 14px;
            }
        }

    </style>
</head>

<body>
    <!-- header section strats -->
    <header class="header_section" >
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              PHARMIO
            </span>
          </a>

          

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">SHOP</a>
              <li class="nav-item">
                <a class="nav-link" href=""><i class="fa fa-user" aria-hidden="true"></i> PROFILE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">  LogOut</a>
              </li>
              
            </ul>
          </div>
        </nav>
      </div>
    </header>
    

    

        <div class="content">
            <h2>ADMIN DASHBOARD</h2>
            <!-- Content for each section (Customers, Staff, Medicine) goes here -->
        </div>
    </div>

    <!-- Add your JavaScript links or scripts here -->
    <div class="container">
        <div class="dashboard-section">
            <h2>Customers</h2>
            <ul>
        <li><a href="">View Customers</a></li>
        <li><a href="customer_view.php">Manage Customers</a></li>
    </ul>
        </div>

        <div class="dashboard-section">
            <h2>Staff</h2>
            <!-- Content for Staff section goes here -->
        </div>

        <div class="dashboard-section">
            <h2>Medicines</h2>
            <!-- Content for Medicine section goes here -->
        </div>
    </div>

</body>

</html>
