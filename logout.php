<?php

session_start();
if(!isset($_SESSION['loggedin'])){
    header('location:login.php');
}
else{
    session_unset();
    session_destroy();
    header('location:login.php');
}

?>