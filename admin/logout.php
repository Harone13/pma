<?php
// ob_start();

session_start();

if (isset($_SESSION['usename'])){
    unset($_SESSION['usename']);
}

session_unset();
session_destroy();

header('location: index.php'); 
exit();

// ob_end_clean();

?>