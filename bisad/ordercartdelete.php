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
    

    //SQL for loop to delete cart
    while($row = $result->fetch_assoc()) {  

        $sql3 = "DELETE FROM cart WHERE user_id =" . $customer . " AND product_id =" . $row['product_id'];
        mysqli_query($connect,$sql3);

    }

    header("location:user.php");

?>

<script>
    alert("สั่งซื้อสินค้าสำเร็จ");
</script>