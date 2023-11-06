<?php
include('db_config.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
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


  <title> Pharmio </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style1.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    .logout-button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .logout-button:hover {
        background-color: #0056b3;
    }

    .product-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        padding: 20px;
    }

    .product-grid {
        margin-left: 250px; /* Set margin equal to the width of the sidebar */
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        padding: 20px;
    }

    .product-card {
        /* width: 340px; */
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 10px;
        text-align: center;
        overflow-wrap: break-word;
        white-space: normal;
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .product-card h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .product-card p {
        font-size: 14px;
        margin-bottom: 8px;
    }

    .product-card button {
        background-color: #000;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size:14px
    }

    .product-card button:hover {
        background-color: #333;
    }

    .submenu1 {
        display: none;
        position: absolute;
        background-color: #ffffff;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        list-style: none;
        padding: 0;
        text-align: left;
    }

    .nav-item:hover .submenu1 {
        display: block;
    }

    .submenu1 .nav-item {
        width: 200px;
        padding: 10px;
    }

    .submenu1 .nav-link {
        color: #000; /* Set text color to black */
        text-decoration: none;
        display: block;
        padding: 8px 16px; /* Add padding for better spacing */
        font-size: 14px; /* Reduce font size */
    }

    .submenu1 .nav-link:hover {
        background-color: #f2f2f2;
    }

    .sidebar {
        background-color: #f9f9f9;
        color: #fff;
        width: 250px;
        height: 100vh;
        padding: 20px;
        position: fixed;
        left: 0;
        top: 76px;
        z-index: 1;
    }

    .sidebar-heading {
        font-size: 24px;
        margin-bottom: 20px;
        color:black;
    }

    .category-list {
        list-style: none;
        padding: 0;
    }

    .category-list li {
        margin-bottom: 10px;
    }

    .category-list li a {
        color: #000;
        text-decoration: none;
        font-size: 18px;
    }

    .category-list li a:hover {
        text-decoration: underline;
    }


</style>
</head>
<body>

  <div class="hero_area">

  <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="" width="100%" height="100%">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="customer.php">
            <span>
              PHARMIO
            </span>
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                  <li class="nav-item active">
                      <a class="nav-link" href="customer.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#"><i class="fas fa-user"></i> Account <i class="fas fa-angle-down"></i></a>
                      <ul class="submenu1">
                          <li class="nav-item">
                              <a class="nav-link" href="edit_profile.php"><i class="fas fa-user"></i> My Profile</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> My Cart</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#"><i class="fas fa-heart"></i> My Wishlist</a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                  </li>
              </ul>
          </div>
        </nav>
      </div>
    </header>

    <!-- sidebar starts -->
    <div class="sidebar">
        <h2 class="sidebar-heading">Categories</h2>
        <ul class="category-list">
            <li><a href="#">Category 1</a></li>
            <li><a href="#">Category 2</a></li>
            <li><a href="#">Category 3</a></li>
            <!-- Add more categories as needed -->
        </ul>
    </div>
    <!-- sidebar ends -->

    <div class="product-grid">
      <?php
          // Include your database connection file here
          include('db_config.php');

          // Retrieve medicines from the database
          $sql = "SELECT * FROM medicines";
          $result = $conn->query($sql);

          // Check if there are any medicines
          if ($result->num_rows > 0) {
              ?>
              <div class="product-list">
                  <?php
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) {
                  ?>
                      <div class="product-card">
                          <img src="<?php echo $row["Images"]; ?>" alt="<?php echo $row["Med_name"]; ?>">
                          <h3><?php echo $row["Med_name"]; ?></h3>
                          <p>Generic Name: <?php echo $row["generic_name"]; ?></p>
                          <p>Brand ID: <?php echo $row["Brand_id"]; ?></p>
                          <p>Batch Number: <?php echo $row["Batchno"]; ?></p>
                          <p>Manufacturing Date: <?php echo $row["Manuf_date"]; ?></p>
                          <p>Expiry Date: <?php echo $row["Exp_date"]; ?></p>
                          <p>Specification: <?php echo $row["Specification"]; ?></p>
                          <p>Category ID: <?php echo $row["Category_id"]; ?></p>
                          <p>Stock: <?php echo $row["Stock"]; ?></p>
                          <p>Price: $<?php echo $row["Price"]; ?></p>
                          <button class="cart-button"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                          <button class="favorites-button"><i class="fas fa-heart"></i> Favorites</button>
                      </div>
                  <?php
                  }
                  ?>
              </div>
              <?php
          } else {
              echo "No medicines available.";
          }

          // Close the database connection
          $conn->close();
      ?>

    </div> 
</body>
</html>