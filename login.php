<?php
include 'essentials/_dbconnect.php';
session_start();
$user=true;
if($_SERVER['REQUEST_METHOD']="POST"){
    if(isset($_POST['login'])){
        $username=$_POST['loginUser'];
    $password=$_POST['loginPassword'];
    $mysql="SELECT * FROM `users` WHERE `USERNAME`='$username'";
    $result=mysqli_query($connect,$mysql);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row['PASSWORD'])){
           $user=true;
           $_SESSION['username']=$username;
           $_SESSION['loggedin']=true;
           header("location:/loginsystem/welcome.php");
        }
        else{
            $user=false;
        }
    }
    else{
        $user=false;
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
    <title>Login</title>
</head>

<body>
    <?php include'essentials/_nav.php';?>
    <?php 
    if(!$user){
        echo('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Invalid credentials!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>   </div><br>');
    }
    ?>
    
    <div class="container" style="margin-top:120px;">
        <form action="login.php" method="POST">
        <h3>LOGIN</h3>
            <div class="mb-3">
                <label for="loginUser" class="form-label">USERNAME</label>
                <input type="text" autofocus required class="form-control" name="loginUser" id="loginUser" aria-describedby="emailHelp">
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">PASSWORD</label>
                    <input type="password" required class="form-control" id="loginPassword" name="loginPassword">
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #00a709;border-color: #00a709;"
                    name="login">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>