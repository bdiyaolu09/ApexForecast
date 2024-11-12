<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // Redirect to the login page
  header("Location: vallogin.php");
  exit();
}

// Database configuration
$db_host = "localhost";
$db_username = "root1";
$db_password = "123";
$db_name = "bdiyaolu";

// Connect to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Get the operating profit margin data for the logged-in user from the database
$email = $_SESSION['email'];
$sql = "SELECT industry FROM user_info WHERE email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$user_industry = $row['industry'];

$sql = "SELECT operating_profit_margin, year FROM industry1 WHERE industry = '$user_industry' ORDER BY year ASC";
$result = $conn->query($sql);

// Calculate the growth rate between each year's operating profit margin and the previous year's operating profit margin
$opm = [];
$prev_opm = null;
while ($row = $result->fetch_assoc()) {
    if ($prev_opm !== null) {
        $prev_opm_divisor = ($prev_opm == 0 ? 1 : $prev_opm); // check if previous opm is zero
        $opm[] = ($row['operating_profit_margin'] - $prev_opm) / $prev_opm_divisor;
    }
    $prev_opm = $row['operating_profit_margin'];
}

// Predict the next five years' operating profit margin based on the year-to-year growth rate
$predictions = [];
$prev_growth_rate = end($opm);
for ($i = 1; $i <= 5; $i++) {
    // Calculate the predicted operating profit margin based on the previous year's operating profit margin and the previous year's growth rate
    $predicted_opm = $prev_opm * (1 + $prev_growth_rate);
    // If the predicted operating profit margin is the same as the previous year's operating profit margin, adjust the growth rate slightly to avoid repetition
    while ($predicted_opm == $prev_opm) {
        $prev_growth_rate += 0.01;
        $predicted_opm = $prev_opm * (1 + $prev_growth_rate);
    }
    $predictions[] = $predicted_opm;
    $prev_opm = $predicted_opm;
    $prev_growth_rate = end($opm);
}
// Output the predicted operating profit margin values for the next five years
//echo "<h3>Predicted Turnover Rate for the Next Five Years:</h3>";
//echo "<ul>";
foreach ($predictions as $year => $predicted_opm) {
    $year_label = date('Y', strtotime("+{$year} years"));
    // echo "<li>{$year_label}: {$predicted_opm}</li>";
}
echo "</ul>";
$json_predicted_data = json_encode($predictions);


// Close the database connection
$conn->close();

?>
<style>
body{
   height: 100vh;
   display: grid;
   grid-template-columns:300px 1fr;
   grid-template-rows: 60px 1fr;
   grid-template-areas:
   "side header"
   "side main";
   font-family: 'ubuntu', sans-serif;
   background: black;
}
 .header{
  background: linear-gradient(45deg, black, gold);
  grid-area: header;
}

.header h1{
    text-align: center;
    color: gold;
    padding: 5px;
}
.sidebar{
    background-color: black;
  
    grid-area: side;
 
}

.sidebar ul li{
    position: relative;
    width: 100%;
    list-style: none;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
}
.sidebar ul li a{
    width: 100%;
    text-decoration: none;
    color: white;
    height: 60px;
    display: flex;
    align-items: center;
}
.sidebar ul li:hover{
   background: gold; 
}

.sidebar ul li:nth-child(1){
    line-height: 60px;
    margin-bottom: 20px;
    font-weight: 600;
    border-bottom: 1px solid gold;
}
.sidebar ul li:nth-child(1):hover{
    background: none;
}

.sidebar ul li a .icon{
  min-width: 60px;
  font-size: 24px;
  text-align: center;  
}

.sidebar .title{
    padding: 0 10px;
    font-size: 20px;
    text-align: center;
}

 


.main{
    background-color: black;
    padding: 25px;
   grid-area: main;

   display: grid;
   grid-template-columns: 1fr 1fr  1fr ;
   grid-template-columns: 1fr 1fr  1fr ;
   grid-template-areas:
   "c1  c2  c3"
   "c4  c4 c5"
   "c4   c4  c6";
 
   gap: 20px;
}
.card {
    background: linear-gradient(45deg, gold, purple);
    border-radius: 10px;
    padding: 20px; /* add some padding to the card */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* add a box shadow to the card */
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; 
}
.card:hover {
  transform: translateY(-10px); /* move the card up by 10 pixels on hover */
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); /* increase the box shadow on hover */
}
.card:nth-child(1){
   grid-area: c1; 
}
.card:nth-child(2){
   grid-area: c2; 
}
.card:nth-child(3){
   grid-area: c3; 
}
.card:nth-child(4){
   grid-area: c4; 
}
.card:nth-child(5){
   grid-area: c5; 
}
.card:nth-child(6){
   grid-area: c6; 
}

.number{
    font-size: 35px;
    font-weight: 500;
    color: white;
}
.card-name{
    color: antiquewhite;
    font-weight: 600;   
}
.icon-box ion-icon{
   font-size: 45px;
   color: black;
}
#mychart{
    background-color: antiquewhite;
}
</style>
<!DOCTYPE html>
<html>
<head>
    <title> Turnover_Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class = "header">
        <h1>Industry Trends: Predicted Operating Profit Margin Dashboard</h1>
    </header>

    <section class = "sidebar">
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="logo-apple-ar"></ion-icon></span>
                    <span class = "title"> Apex Forecast</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="reader-sharp"></ion-icon></span>
                    <span class = "title"> Data</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="mail-sharp"></ion-icon></span>
                    <span class = "title">Message</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="walk-sharp"></ion-icon></span>
                    <span class = "title">Help</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "ingross.php">
                    <span class = "icon"><ion-icon name="return-up-back-sharp"></ion-icon></span>
                    <span class = "title">Prev Dashboard</span>
                </a>
            </li>
        </ul>
       
        <ul>
            <li>
                <a href = "services.php">
                    <span class = "icon"><ion-icon name="repeat-sharp"></ion-icon></span>
                    <span class = "title">Logout</span>
                </a>
            </li>
        </ul>
    </section>
        
    <main class = "main">
       <div class= "card">
         <div class="card-content">
            <div class= "number">15 %</div>
            <div class="card-name">Good Margin</div>
         </div>
           <div class="icon-box">
              <ion-icon name="trending-up-sharp"></ion-icon>
            </div>
       </div> 
       <div class= "card">
         <div class="card-content">
            <div class= "number">10 %</div>
            <div class="card-name">Average Margin</div>
         </div>
           <div class="icon-box">
           <ion-icon name="swap-horizontal-sharp"></ion-icon>
            </div>
       </div> 
       <div class= "card">
       <div class="card-content">
            <div class= "number"> > 10 %</div>
            <div class="card-name">Bad Margin</div>
         </div>
           <div class="icon-box">
           <ion-icon name="trending-down-sharp"></ion-icon>
            </div>
       </div> 
       </div> 
       <div class= "card">
      
         <canvas id="myChart"></canvas>

           <script>
            // Retrieve the JSON data from PHP
             var predictedData = <?php echo $json_predicted_data; ?>;

              // Create the chart data object
             var chartData = {
                 labels: ['1', '2', '3', '4', '5'],
                 datasets: [{
                  label: 'Predicted Operating Profit Margin %',
                  data: predictedData,
                  borderColor: 'Purple',
                  backgroundColor: 'rgba(255, 215, 0, 0.2)',
                  fill: true,
                  tension: 0.4
                   }]
               };

                // Create the chart options object
                            var chartOptions = {
                scales: {
                  y: {
                    title: {
                      display: true,
                      text: 'Operating Profit Margin %'
                    }
                  },
                  x: {
                    title: {
                      display: true,
                      text: 'Year'
                    }
                  }
                }
              };

              // Create the chart object
              var ctx = document.getElementById('myChart').getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: chartOptions
              });
           </script>
       </div> 
       <div class= "card">
         <div class="card-content">
            <div class= "number">3</div>
            <div class="card-name">Historical Years Used</div>
          </div>
           <div class="icon-box">
           <ion-icon name="bookmarks-sharp"></ion-icon>
            </div>
       </div> 
       <div class= "card">
         <div class="card-content">
            <div class= "number">5</div>
            <div class="card-name">Predicted Total Years</div>
          </div>
           <div class="icon-box">
           <ion-icon name="bar-chart-sharp"></ion-icon>
            </div>
       </div> 

    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>