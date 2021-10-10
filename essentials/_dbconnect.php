<?php

$servername="localhost";
$username="root";
$password="";
$database="loginSystem";
$connect=mysqli_connect($servername,$username,$password,$database);
if(!$connect){
    die("Error loading database due to ").mysqli_connect_error();
}
else{
    // print("success<br>");
}

?>