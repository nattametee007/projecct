<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'store');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $del_cart_product = $_GET['del_cart_product'];
      
    // SQL script for deleting an item
    $sql = "DELETE FROM cart WHERE product_id =\"" . $del_cart_product . "\" AND user_id = ";
      
    mysqli_query($conn,$sql);    
    //header("location:products.php");

?>