<?php
session_start();
include "connect.php";
if(isset($_SESSION['id'])){
  header("Location:index.php");
}
if(isset($_POST['submit'])){
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $sql = "SELECT * FROM user WHERE email = '$email'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  if(password_verify($password, $row['password'])){
      $_SESSION["id"] = $row["id"];
      header("location: index.php");
  }else{
    ?>
    <script>
      alert('Please, enter a valid Email and Password');
    </script>
    <?php
  }
}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>NASA Space Apps</title>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
     <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
     <link rel="stylesheet" href="style.css">
     <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
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
             <a class="mdl-navigation__link" href="login.php">Login</a>
             <a class="mdl-navigation__link" href="signup.php">Sign Up</a>
           </nav>
         </div>
       </header>

       <main class="mdl-layout__content">
         <div class="page-content">
           <center class="cool">
           <form  action="login.php" method="post" >
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
               <input class="mdl-textfield__input" type="email" id="sample3" name="email">
               <label class="mdl-textfield__label" for="sample3">Email</label>
             </div><br/>
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
               <input class="mdl-textfield__input" type="password" id="sample4" name="password">
               <label class="mdl-textfield__label" for="sample4">Password</label>
             </div><br/>
             <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="submit" value="Submit">
           </form>
         </center>
         </div>
       </main>
     </div>

   </body>
 </html>
