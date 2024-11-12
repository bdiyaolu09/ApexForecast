<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // Redirect to the login page
  header("Location: vallogin.php");
  exit();

}
$firstname = $_SESSION['firstname'] ?? '';
$lastname = $_SESSION['lastname'] ?? '';
?>
<style>
 h3 a {
  color: white;
  text-decoration: none;
}
.navbar{
  height: 80px;
  width: 100%;
 
}

.logo{
  color: gold;
  font-size: 25px;
  font-family: Arial;
  padding-left: 30px;
  float: left;
  padding-top: 5px; 
}

.navbar ul{
  float: center;
  margin-right: 60px;
}

.navbar ul li{
  list-style: none;
  margin:0 8px;
  display: inline-block;
  line-height: 80px;
}

.navbar ul li a{
  text-decoration: none;
  color: white;
  font-size: 18px;
  font-family:'Roboto', sans-serif;
}


.navbar ul li a:hover{
  background: gold;
  border-radius: 5px;
  cursor: pointer;
}

.navbar .dropdown-toggle {
  position: relative;
}
.navbar .dropdown-toggle .dropdown-menu {
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
}


.navbar .dropdown-toggle:hover .dropdown-menu {
  display: block;
}
  </style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style7.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Services</title>
</head>

<body>
  <div class="background">
  <nav class="navbar">
  <h2 class="logo">ApexForecast</h2>
  <ul>
    <li><a href="HomePage.php">Home</a></li>
    <li><a href="About.html">About</a></li>
    <li><a href="year1_data.php">Data</a></li>
    <li><a href="profile.php">Profile</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="Contact.html">Contact</a></li>
          <li><a href="adminlog.html">Admin</a></li>
          <li><a href="index.html">Signout</a></li>
        </ul>
    </li>
  </ul>
</nav>
<section class="service">
      <div class="content-box">
        <div class="container">
          <h1>Our Service</h1>  
          <div class="row service">
          <div class="col-md-3 text-center">
            <a href="current2.php">
             <div class="icon">
              <i class="fa fa-area-chart"></i>
             </div>
             <h3>Current <span>Analysis</span</h3>
             <p>The current analysis displays the user's graph for the past three years. Predictive factors include historical data, market trends, economic indicators, and user behavior patterns. Accurate predictions can help make informed decisions and maintain a competitive edge.</p>
            </a>
          </div>
          <div class="col-md-3 text-center">
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <h3><a href="prturnover.php">Trend <span>Analysis</span></a></h3>
            <p>The user's three-year historical data provides insights into patterns and areas of growth. Regular analysis of the data helps to track performance and make informed decisions for improvement. Staying updated with changes and trends is essential to maintain a competitive edge.</p>

          </div>
          <div class="col-md-3 text-center">
            <div class="icon">
              <i class="fa fa-line-chart"></i>
            </div>
            <h3><a href="inturnover.php">Industry <span>Analysis</span></a></h3>
            <p>Industry analysis combines three years of historical data with industry trends to identify areas of strength and opportunities for improvement. Regular analysis helps to stay updated with industry changes and maintain a competitive edge.</p>

          </div>
          <div class="col-md-3 text-center">
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
            <h3><a href="act.php">Act <span>Analysis</span></a></h3>
            <p>This page provides insights based on analysis of the user's historical data and industry trends. The feedback helps to identify areas of improvement and provides actionable recommendations to achieve better results. Regular feedback and analysis are essential to maintain a competitive edge and ensure long-term success.</p>

          </div>
        </div>
        </div>
      </div>
    </section>
  
    </div>

    
</body>
</html>