<?php
ob_start();

include 'header.php';
if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
}else{ 
// if (isset($_SESSION['user'])){
    echo 'good';
    unset($_SESSION['user']);
    unset($_SESSION['userid']);
    header('location: ../index.php'); 
   exit();
}

// session_unset();
// session_destroy();

header('location: index.php'); 
exit();

ob_end_flush();

?>