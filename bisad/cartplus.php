<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'store');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $plus_cart_product = $_GET['plus_cart_product'];
    $plus_cart_user = $_GET['plus_cart_user'];

    // SQL script for deleting an item
    $sql = "UPDATE cart SET quantities = quantities+1 WHERE product_id =" . $plus_cart_product . " AND user_id = " . $plus_cart_user;
      
    mysqli_query($connect,$sql);    
    header("location:cart.php?usercart=". $plus_cart_user);

?>