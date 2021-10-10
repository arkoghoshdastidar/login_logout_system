<?php
include "essentials/_dbconnect.php";
$success=false;
$diffPassword=false;
$sameUser=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $rpassword=$_POST['rpassword'];
        $mysql="SELECT * FROM `users`";
        $result=mysqli_query($connect,$mysql);
        while($row=mysqli_fetch_assoc($result)){
            if($row['USERNAME']==$username){
                $sameUser=true;
                break;
            }
        }
        if(!$sameUser){
            if($password==$rpassword){
               $password=password_hash($password,PASSWORD_DEFAULT);
              $mysql="INSERT INTO `users`( `USERNAME`, `PASSWORD`) VALUES ('$username','$password')";   
              $result=mysqli_query($connect,$mysql);
              $diffPassword=false;
              $success=true;
            }
            else{
                $diffPassword=true;
            }

        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>signUp</title>
</head>

<body>
    <?php include "essentials/_nav.php";
      if($sameUser){
          echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Username already exists.Please try some other username!</strong>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>   </div><br>');
      }
       if($diffPassword){
        echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Re-enter password correctly!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>   </div><br>');
       }   
       if($success){
        echo('<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>You are signed up successfully!<br>Now login to access the main page.</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>   </div><br>');
       }

    ?>
    
    <div class="container" style="margin-top: 120px;">
        <form action="/loginSystem/signup.php" method="POST">
            <div class="mb-3">
            <H3>SIGNUP</H3>
                <label for="username"  class="form-label">USERNAME</label>
                <input type="text" autofocus required  maxlength="50" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password"  class="form-label">PASSWORD</label>
                <input type="password" required maxlength="50" class="form-control" id="password" name="password">
                <small>We won't share your username and password.</small>
            </div>
            <div class="mb-3">
                <label for="rpassword" class="form-label">RE-ENTER PASSWORD</label>
                <input type="password" maxlength="50" class="form-control" id="rpassword" name="rpassword">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>