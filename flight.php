<?php
session_start();
include "connect.php";

if($_SESSION['id'] == ""){

  header("Location:login.php");
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js" charset="utf-8"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://d3js.org/topojson.v1.min.js"></script>
    <script src="https://d3js.org/queue.v1.min.js"></script>
    <meta charset="UTF-8">
    <title></title>
    <style>
    .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type  {
      padding-right: 0;
    }
    </style>
</head>
<body>

  <div class="demo-layout-transparent mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--transparent">
      <!-- Bottom row, not visible on scroll -->
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">MayDay MayDay!!!</span>
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation -->
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="index.php"><?php echo $row['name']." " .$row['lastname']; ?></a>
          <a class="mdl-navigation__link" href="advice.php">Advices</a>
          <a class="mdl-navigation__link" href="flight.php">Flights</a>
          <a class="mdl-navigation__link" href="logout.php">Log out</a>
        </nav>
      </div>
    </header>
    <main class="mdl-layout__content">
      <div class="page-content">
        <div class="mdl-grid zooming">
              <div class="mdl-cell mdl-cell--6-col " id="globeParent">
                  <div style="display:none;">
                      <img id="plane" src="images/plane-2_03-black.png">
                  </div>
              </div>
              <?php
              $sql3 = "SELECT * FROM user WHERE id='$id'";
              $result3 = mysqli_query($con, $sql3);
              $row3 = mysqli_fetch_assoc($result3);
              ?>
              <div class="mdl-cell mdl-cell--6-col write">
                    <h4 style="color:white;" id="radiationDose" >Radiation Dose: </h4>
                    <h4 style="color:white;" id="flightTime" >Flight Time:  </h4>
                    <h4 style="color:white;" id="cumulativeDose" >Cumulative Dose: <?php echo $row3['total_radiation']?>  mSv</h4>
                    <h4 style="color:white;" id="standardDose" >Standard Dose: 2 mSv / year</h4>
              </div>
          </div>
      </div>
    </main>
  </div>
<script src="globe.js"></script>
<script>
$(document).ready(function(){
  var radiationDose = $('#radiationDose');
  var flightTime = $('#flightTime');
  if(startCountry == "Albania" && endCountry == "United States"){
    radiationDose.append('0,132 mSv');
    flightTime.append('10 Hours');
  }
  else if(startCountry == "Finland" && endCountry == "Canada"){
    radiationDose.append('0,150 mSv');
    flightTime.append('15 Hours');
  }
  else if(startCountry == "United Kingdom" && endCountry == "United States"){
    radiationDose.append('0.070 mSv');
    flightTime.append('5.5 Hours');
  }
  else if(startCountry == "United States" && endCountry == "Sweden"){
    radiationDose.append('0.0115 mSv');
    flightTime.append('8.5 Hours');
  }
  else if(startCountry == "United States" && endCountry == "Germany"){
    radiationDose.append('0.109 mSv');
    flightTime.append('8.5 Hours');
  }
  else if(startCountry == "United States" && endCountry == "China"){
    radiationDose.append('0.172 mSv');
    flightTime.append('13.5 Hours');
  }else{
    alert("Sorry, We don't have DATA about this flight!");
  }

});

</script>
</body>
</html>
