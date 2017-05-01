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
    <link rel="stylesheet" href="style/table.css">
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>


<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
      <!-- Bottom row, not visible on scroll -->
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">MayDay MayDay!!!</span>
        <div class="mdl-layout-spacer"></div>

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
          <div class="mdl-cell mdl-cell--5-col forma">
            <?php
            if(isset ($_POST['submit'])){
              $start = mysqli_real_escape_string($con, $_POST['start']);
              $end = mysqli_real_escape_string($con, $_POST['end']);
              $queryy = "INSERT INTO flight (start_point , destination_point , date, id_user) VALUES ('$start','$end','$date', '$id' )";
              if(mysqli_query($con, $queryy)){
                ?>
                <script>
                  alert("The flight is just registered!");
                </script>
                <?php
                header("Location:index.php");
              }else{
                ?>
                <script>
                  alert("Could not register this flight!");
                </script>
                <?php
              }
            }
             ?>
            <form  action="index.php" method="post"><br/>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="sample1" style="color:white;" name="start">
                <label class="mdl-textfield__label" for="sample1" style="color:white;font-size:18px;">Departure</label>
              </div><br/>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="sample2" style="color:white;" name="end">
                <label class="mdl-textfield__label" for="sample2" style="color:white;font-size:18px;">Destination</label>
              </div><br/><br/>
                <input type="date"  name="date">
              <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="submit" value="Add Flight">
            </form>
          </div>
          <div class="mdl-cell mdl-cell--6-col">
            <table id="background-image">
              <thead>
                <tr>
                    <th scope="col">Departure</th>
                      <th scope="col">Destination</th>
                      <th scope="col">EffectiveDose</th>
                      <th scope="col">DateTime</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                    $query = "SELECT * FROM flight WHERE id_user='$id'";
                    $results = mysqli_query($con,$query);
                    $total_radiation = 0;
                    while ($row1 = mysqli_fetch_assoc($results)){
                      ?>
                        <td><?php echo $row1['start_point'];?> </td>
                        <td><?php echo $row1['destination_point'];?></td>
                        <td><?php echo $row1['radiation'];?> mSv</td>
                        <td><?php echo $row1['date'];?></td>

                      </tr>
                      <?php
                        $total_radiation += $row1['radiation'];
                    }
                    $query5 = "UPDATE user SET `total_radiation`='$total_radiation' WHERE id='$id'";
                    $result = mysqli_query($con,$query5);
                   ?>
                   <h4 style="color:white;">Cumulative Dose: <?php echo $total_radiation;?> mSv</h4>
              </tbody>
          </table>
          </div>

        </div>
      </div>
    </main>
  </div>
<script src="globe.js"></script>

</body>
</html>
