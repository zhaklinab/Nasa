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
          <div class="mdl-cell mdl-cell--4-col paddingu">
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title1 mdl-card--expand">
              <h2 class="mdl-card__title-text">Factors</h2>
            </div>
            <div class="mdl-card__supporting-text">
            The more time spent in-flight, The higher the potential dose
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="factors.php">
                View Factors
              </a>
            </div>
          </div>
          </div>
          <div class="mdl-cell mdl-cell--4-col paddingu">
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title2 mdl-card--expand">
              <h2 class="mdl-card__title-text">Health Risks</h2>
            </div>
            <div class="mdl-card__supporting-text">
              Work-related radiation exposure not exceed 20 mSv per year.
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="health.php">
                Health Risks
              </a>
            </div>
          </div>
          </div>
        <div class="mdl-cell mdl-cell--4-col paddingu">
          <div class="demo-card-square mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title3 mdl-card--expand">
            <h2 class="mdl-card__title-text">Protection</h2>
          </div>
          <div class="mdl-card__supporting-text">
            Bidding for a flight schedule to reduce cosmic radiation exposures is complicated.
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="protection.php">
              Protection
            </a>
          </div>
        </div>
        </div>
      </div>
      </div>
    </main>
  </div>
<script src="globe.js"></script>
</body>
</html>
