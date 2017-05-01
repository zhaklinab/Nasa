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
              <li class="mdl-list__item" style="color:white !important;"><span class="mdl-list__item-primary-content">Try to reduce your time working on very long flights, flights at high latitudes, or flights which fly over the poles. These are flight conditions or locations that tend to increase the amount of cosmic radiation the crewmembers are exposed to.</span></li>
              <li class="mdl-list__item" style="color:white !important;"><span class="mdl-list__item-primary-content">If you are pregnant and aware of an ongoing solar particle event when you are scheduled to fly you may want to consider trip-trading or other rescheduling actions if possible.</span></li>
              <li class="mdl-list__item" style="color:white !important;"><span class="mdl-list__item-primary-content">For flight attendants, a NIOSH study found that exposure to 0.36 mSv or more of cosmic radiation in the first trimester may be linked to increased risk of miscarriage.
                  Also, although flying through a solar particle event doesn’t happen often, a NIOSH and NASA study found that a pregnant flight attendant who flies through a solar particle event can receive more radiation than is recommended during pregnancy by national and international agencies.</span></li>
              <li class="mdl-list__item" style="color:white !important;"><span class="mdl-list__item-primary-content">Avoiding exposure to solar particle events.</span></li>
            </ul>
          </div>
          <div class="mdl-cell mdl-cell--4-col" id="leftUp">
            <img src="http://www.npr.org/assets/img/2014/09/08/rays.gif" width="100%"alt=""/>
          </div>
      </div>
      </div>
    </main>
  </div>
<script src="globe.js"></script>
</body>
</html>
