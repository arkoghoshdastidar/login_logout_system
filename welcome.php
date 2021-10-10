<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("location:/loginsystem/login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Welcome</title>
  </head>
  <body>
    <?php include "essentials/_nav.php";?>
    
    <div class="alert alert-success" role="alert">
  <div class="container">
  <h4 class="alert-heading">Well done!</h4>
  <p><h1> Welcome <?php echo $_SESSION['username'];?> </h1></p>
  <hr>
  <p class="mb-0">Welcome to welcome.php</p>
</div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>