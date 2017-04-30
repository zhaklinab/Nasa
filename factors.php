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
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js" charset="utf-8"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://d3js.org/topojson.v1.min.js"></script>
    <script src="https://d3js.org/queue.v1.min.js"></script>
    <meta charset="UTF-8">
    <title>NASA Space Apps</title>
    <style>

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
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--4-col">
            <ul  class="demo-list-item mdl-list" id="outUp">
              <li class="mdl-list__item" style="color:white !important;"><span class="mdl-list__item-primary-content"><strong>Latitude: </strong> Exposure is more intense at higher latitudes. Radiation levels at the poles are about twice those at the equator. </span></li>
              <li class="mdl-list__item" style="color:white !important;"><span class="mdl-list__item-primary-content"><strong>Altitude: </strong> Exposure is more intense at higher altitudes, as the layer of protective atmosphere above you is thinner.</span></li>
              <li class="mdl-list__item" style="color:white !important;"><span class="mdl-list__item-primary-content"><strong>Solarity: </strong> Solar radiation storms can sometimes follow solar flares, and may also occur in the years leading up to and down from them. During a storm, radiation intensity can increase 1,000 fold. </span></li>
            </ul>
          </div>
      </div>
      </div>
    </main>
  </div>
<script src="globe.js"></script>
</body>
</html>
