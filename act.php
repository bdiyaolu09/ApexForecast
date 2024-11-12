
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
    background: linear-gradient(45deg, gold, teal);
    border-radius: 10px;
    padding: 20px; /* add some padding to the card */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* add a box shadow to the card */
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; 
      line-height: 1.5;
}
.card:hover {
  transform: translateY(-10px); /* move the card up by 10 pixels on hover */
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); /* increase the box shadow on hover */
}
.card h3{
  margin: 0;
}
h3{
  color: white;
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
</style>
<!DOCTYPE html>
<html>
<head>
    <title> Turnover_Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class = "header">
        <h1>Feedback Analysis: Turnover Rate Recommendation Dashboard</h1>
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
                <a href = "act2.php">
                    <span class = "icon"><ion-icon name="return-up-forward-sharp"></ion-icon></span>
                    <span class = "title">Next Dashboard</span>
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
            <div class= "number">10</div>
            <div class="card-name">Good Ratio</div>
         </div>
           <div class="icon-box">
              <ion-icon name="trending-up-sharp"></ion-icon>
            </div>
       </div> 
       <div class= "card">
         <div class="card-content">
            <div class= "number">5</div>
            <div class="card-name">Average Ratio</div>
         </div>
           <div class="icon-box">
           <ion-icon name="swap-horizontal-sharp"></ion-icon>
            </div>
       </div> 
       <div class= "card">
       <div class="card-content">
            <div class= "number"> > 5</div>
            <div class="card-name">Bad Ratio</div>
         </div>
           <div class="icon-box">
           <ion-icon name="trending-down-sharp"></ion-icon>
            </div>
       </div> 
       </div> 
       <div class= "card">
        <h3>Based on our analysis of your inventory turnover rate:<br> 

        High: 10 or higher<br>

       Maintain accurate inventory records<br>
       Optimize inventory levels and ensure timely replenishment<br>

       Average: 5<br>

       Review inventory management processes<br>
       Identify areas for improvement to increase turnover and reduce carrying costs<br>

       Poor: below 5<br>

       Conduct a thorough inventory review to identify slow-moving or excess items<br>
       Take steps to reduce excess inventory and improve demand forecasting to increase turnover </h3>
       </div> 
       <div class= "card">
         <div class="card-content">
            <div class= "number">3</div>
            <div class="card-name">Total Years</div>
          </div>
           <div class="icon-box">
           <ion-icon name="bookmarks-sharp"></ion-icon>
            </div>
       </div> 
       <div class= "card">
         <div class="card-content">
            <div class= "number">5</div>
            <div class="card-name">Proposed Predictions</div>
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
