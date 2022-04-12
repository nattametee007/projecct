<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'store');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $customer = $_GET['customer'];
    //กำหนด order_id จากการดูจำนวน row ของ sales_order

    //SQL query cart


    //SQL for loop to insert ordering

      
    mysqli_query($connect,$sql);    
    //header("location:cart.php?usercart=". $del_cart_user);

?>