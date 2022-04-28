<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['account_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>

<?php

include("condb.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        font-family: Arial;
    }

    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }

    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm" style="background-color: #A65353;">
        <div class="container-fluid">
        <a class="navbar-brand" href="account.php"><svg xmlns="http://www.w3.org/2000/svg" style='color: white;' width="25" height="25" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                </svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div style='margin-right:60%;'>
                <a href='account.php'><button type="button" class="btn btn-lg" style='background-color: #D99B84; color: #000000;'>คำสั่งซื้อ</button></a>
                <a href='#'><button type="button" class="btn btn-lg" style='background-color: #D99B84; color: #000000;'>แสดงยอดขาย</button></a>
            </div>

            <ul class="navbar-nav">
                <div class="dropdown" style="float:right;">
                <button class="dropbtn" style='background-color: #D99B84;'><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg></button>
                    <div class="dropdown-content">
                        <a href="signin.php">เข้าสู่ระบบ</a>
                        <a href="logout.php">ออกจากระบบ</a>
                    </div>
                </div>
            </ul>

        </div>
    </nav>

    <?php
    $queryso = "SELECT * FROM sale_order as so INNER JOIN users as u ON so.user_id = u.user_id INNER JOIN inventory as i ON so.product_id = i.product_id ORDER BY so.time_date ASC";
    $rsso = mysqli_query($conn, $queryso);
    ?>

    <h3 style='margin-top:2%;margin-left:2%'>คำสั่งซื้อ</h3>
	<div class="container" style='margin-top:2%;margin-left:5%'>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col-sm-2">หมายเลขคำสั่งซื้อ</th>
                    <th class="col-sm-2">ชื่อลูกค้า</th>
                    <th class="col-sm-2">รูปสินค้า</th>
                    <th class="col-sm-3">รายละเอียด</th>
                    <th class="col-sm-1">จำนวน</th>
                    <th class="col-sm-1">ราคา(บาท)</th>
                </tr>
            </thead>
            <tbody style='background-color: #F2E5D5;'>
                <?php $amount=0; ?>
                <?php foreach($rsso as $row){
                    $amount += $row['total'];
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo "<img src='picture/" . $row['picture'] . "' width='45%';>"; ?></td>
                        <td>
                                <?php echo $row['detail']; ?><br>
                                รหัสสินค้า : <?php echo $row['product_id']; ?><br>
                                สี : <?php echo $row['colour']; ?><br>
                                ขนาด : <?php echo $row['size']; ?><br>
                        </td>
                        <td><?php echo $row['quantities']; ?></td>
                        <td><?php echo $row['cost']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    echo "<br>";
    echo "<div class='container'>";
        echo "<div class='row'>";
            echo "<div class='col-md-3 offset-md-9'>" . "<b>" . "ยอดรวมทั้งหมด&nbsp;" . number_format($amount,2) . "&nbsp;บาท" . "</b>" . "</div>";
        echo "</div>";
    echo "</div>";
    ?>

</body>
</html>