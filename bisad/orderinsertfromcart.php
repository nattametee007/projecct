<?php 
    // Create connection
    $connect = new mysqli('localhost', 'root', '', 'store');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $customer = $_GET['customer'];
    

    //SQL query cart
    $sql = "SELECT * FROM users
            JOIN cart
            ON users.user_id = cart.user_id
            JOIN inventory
            ON cart.product_id = inventory.product_id";
    $result = $connect->query($sql);


    //SQL query sale_order
    $sql1 = "SELECT DISTINCT order_id FROM sale_order";
    $result1 = $connect->query($sql1);


    //กำหนด order_id จากการดูจำนวน row ของ sales_order
    $numorder = 1;
    while($row = $result1->fetch_assoc()) {

        $numorder = $numorder + 1;

    }
    echo $numorder;
    

    //SQL for loop to insert ordering
    while($row = $result->fetch_assoc()) {  

        if ($row['user_id'] == $customer) {

            $sql2 = "INSERT INTO sale_order (order_id, total, quantities, user_id, product_id)
                     VALUES (" . $numorder . "," . $row['quantities']*$row['cost'] . "," . $row['quantities'] . ","  . $customer. "," . $row['product_id'] . ")";
            mysqli_query($connect,$sql2);

        }
        

    }


    header("location:ordercartdelete.php?customer=". $customer);
  

?>