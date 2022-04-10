<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'store');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $minus_cart_product = $_GET['minus_cart_product'];
    $minus_cart_user = $_GET['minus_cart_user'];
    $minus_cart_quan = $GET['minus_cart_quan'];

    // SQL script for deleting an item
    $sql = "UPDATE cart SET quantities = quantities-1 WHERE product_id =" . $minus_cart_product . " AND user_id = " . $minus_cart_user;
      

    mysqli_query($connect,$sql);    
    header("location:cart.php?usercart=". $minus_cart_user);

?>