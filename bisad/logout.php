<?php 

    session_start();
    unset($_SESSION['user_login']);
    unset($_SESSION['inventory_login']);
    unset($_SESSION['account_login']);
    header('location: index.php');

?>