<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'store');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $del_cart_product = $_GET['del_cart_product'];
    $del_cart_user = $_GET['del_cart_user'];

    // SQL script for deleting an item
    $sql = "DELETE FROM cart WHERE product_id =" . $del_cart_product . " AND user_id = " . $del_cart_user;
      
    mysqli_query($connect,$sql);    
    header("location:cart.php?usercart=". $del_cart_user);

?>