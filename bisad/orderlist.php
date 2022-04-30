<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}

?>

<?php

if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE user_id = $user_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
$customer = $row['user_id'];
?>

<?php

require_once("dbcontroller.php");
$db_handle = new DBController();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>USERS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
        font-family: Arial;
        background-color: #F2E5D5;
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
            <a class="navbar-brand" href="user.php"><svg xmlns="http://www.w3.org/2000/svg" style='color: white;' width="25" height="25" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                </svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav">

                <form class="example" method="POST" action="search.php" style="margin:auto;max-width:300px">
                    <input type="text" placeholder="ค้นหา.." name="search2">
                    <button type="submit" name="btn1" style='background-color: #D99B84;'><i class="fa fa-search"></i></button>
                </form>


                <a class="nav-link" href="cart.php?usercart=<?= $customer ?>"><svg xmlns="http://www.w3.org/2000/svg" style='color: white;' width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg></a>

                <div class="dropdown" style="float:right;">
                    <button class="dropbtn" style='background-color: #D99B84;'><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg></button>
                    <div class="dropdown-content">
                        <a href="index.php">สมัครสมาชิก</a>
                        <a href="signin.php">เข้าสู่ระบบ</a>
                        <a href="orderlist.php">ดูรายการสั่งซื้อ</a>
                        <a href="logout.php">ออกจากระบบ</a>
                    </div>
                </div>
            </ul>

        </div>
    </nav>

    <?php
    $all = array();
    $product_array = $db_handle->runQuery("SELECT DISTINCT order_id FROM sale_order WHERE user_id=$customer");
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
            array_push($all, $product_array[$key]["order_id"]);
        }
    }
    ?>
    <div class="container-fluid mt-4">
        <div class="container row">
            <div class="container col-2  " style='margin-right:-70px'>

                <ul class="nav nav-pills" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" style='background-color: #D99B84; color: #000000; padding-left:29px; padding-right:29px;' href="#allorderid">
                            <h7>หมายเลขคำสั่งซื้อทั้งหมด</h7>
                        </a>
                        <br>
                    </li>

                    <li class="nav-item">
                        <?php
                    foreach ($all as $value) { ?>
                        

                            <a class="nav-link" style='background-color: #D99B84; color: #000000;' data-bs-toggle="pill" href="#orderid<?php echo $value; ?>">
                                <?php echo $value; ?>
                            </a>
                            <br>

                        
                        <?php } ?>
                    </li>
                </ul>
                
            </div>

            <div class="container col-9  tab-content  ">
                <div id="allorderid" class="container tab-pane active ">
                <?php

foreach ($all as $value3) { ?>

        <div class="product-image col-sm-12 card" style='background-color: white;'>
        
            <?php $queryuserr = $db_handle->runQuery("SELECT DISTINCT u.name, u.address FROM users as u INNER JOIN sale_order as so WHERE u.user_id = '$customer'");
            $querytdd = $db_handle->runQuery("SELECT DISTINCT time_date FROM sale_order WHERE order_id = '$value3'");
            $product_arrayy = $db_handle->runQuery("SELECT * FROM sale_order as so INNER JOIN inventory as i ON so.product_id = i.product_id WHERE so.order_id = '$value3'");

            echo '<div style=margin-left:13%;margin-top:2%>';
            echo '<h5>หมายเลขคำสั่งซื้อ : ' . $value3 . '</h5>';
            foreach ($querytdd as $key4 => $value4) {
                echo '<h5>วัน เวลาที่สั่งซื้อ : ' . $querytdd[$key4]['time_date'] . '</h5>';
            }
            foreach ($queryuserr as $key5 => $value5) {
            echo '<h5>ชื่อ : คุณ ' . $queryuserr[$key5]['name'] . '</h5>';
            echo '<h5>ที่อยู่ : ' . $queryuserr[$key5]['address'] . '</h5>';
            }
            echo '</div>';
            echo '<br>';
            $amount1=0;
            if (!empty($product_arrayy)) {
                foreach ($product_arrayy as $key6 => $value6) {
            ?>

                <?php $amount1 += $product_arrayy[$key6]['total']; ?>
                
                    <div class='row'>
                        <div class='col-md-3 offset-md-2'><img
                            src="picture/<?php echo $product_arrayy[$key6]["picture"]; ?>" width="50%">
                        </div>
                        <div class='col-md-5 offset-md-0.2'>
                            <div class='row'>
                                <div class='col-md-6 offset-md-0.2'>ชื่อสินค้า : <?php echo $product_arrayy[$key6]["product_name"]; ?></div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6 offset-md-0.2'>สี : <?php echo $product_arrayy[$key6]["colour"]; ?></div>
                            </div>
                            <div class='row'>
                                <div class='col-md-5 offset-md-0.2'>ขนาด : <?php echo $product_arrayy[$key6]["size"]; ?></div>
                            </div>
                            <div class='row'>
                                <div class='col-md-5 offset-md-0.2'>จำนวน : <?php echo $product_arrayy[$key6]["quantities"]; ?> ชิ้น</div>
                            </div>
                            <div class='row'>
                                <div class='col-md-10 offset-md-0.2'>ราคาต่อหน่วย : <?php echo number_format($product_arrayy[$key6]['cost'],2); ?> บาท</div>
                            </div>
                        </div>
                    </div>
                    <br>
                
                <?php  }

                echo "<br>";
                echo "<div class='container'>";
                    echo "<div class='row' style=margin-bottom:2%>";
                        echo "<div class='col-md-4 offset-md-7'>" . "<b>" . "ยอดรวมทั้งหมด&nbsp;" . number_format($amount1,2) . "&nbsp;บาท" . "</b>" . "</div>";
                    echo "</div>";
                echo "</div>";
                
            }  ?>
    </div>
    <br>
    <?php    } ?>
    </div>

            <?php

            foreach ($all as $value) { ?>


                <div class="container tab-pane fade" id='orderid<?php echo $value; ?>'>
                    <div class="product-image col-sm-12 card" style='background-color: white;'>
                    
                        <?php $queryuser = $db_handle->runQuery("SELECT DISTINCT u.name, u.address FROM users as u INNER JOIN sale_order as so WHERE u.user_id = '$customer'");
                        $querytd = $db_handle->runQuery("SELECT DISTINCT time_date FROM sale_order WHERE order_id = '$value'");
                        $product_array = $db_handle->runQuery("SELECT * FROM sale_order as so INNER JOIN inventory as i ON so.product_id = i.product_id WHERE so.order_id = '$value'");

                        echo '<div style=margin-left:15%;margin-top:2%>';
                        echo '<h5>หมายเลขคำสั่งซื้อ : ' . $value . '</h5>';
                        foreach ($querytd as $key1 => $value1) {
                            echo '<h5>วัน เวลาที่สั่งซื้อ : ' . $querytd[$key1]['time_date'] . '</h5>';
                        }
                        foreach ($queryuser as $key2 => $value2) {
                        echo '<h5>ชื่อ : คุณ' . $queryuser[$key2]['name'] . '</h5>';
                        echo '<h5>ที่อยู่ : ' . $queryuser[$key2]['address'] . '</h5>';
                        }
                        echo '</div>';
                        echo '<br>';
                        $amount=0;
                        if (!empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                        ?>

                            <?php $amount += $product_array[$key]['total']; ?>
                            
                                <div class='row'>
                                    <div class='col-md-3 offset-md-2'><img
                                        src="picture/<?php echo $product_array[$key]["picture"]; ?>" width="50%">
                                    </div>
                                    <div class='col-md-5 offset-md-0.2'>
                                        <div class='row'>
                                            <div class='col-md-6 offset-md-0.2'>ชื่อสินค้า : <?php echo $product_array[$key]["product_name"]; ?></div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6 offset-md-0.2'>สี : <?php echo $product_array[$key]["colour"]; ?></div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-5 offset-md-0.2'>ขนาด : <?php echo $product_array[$key]["size"]; ?></div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-5 offset-md-0.2'>จำนวน : <?php echo $product_array[$key]["quantities"]; ?> ชิ้น</div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-10 offset-md-0.2'>ราคาต่อหน่วย : <?php echo number_format($product_array[$key]['cost'],2); ?> บาท</div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            
                            <?php  }

                            echo "<br>";
                            echo "<div class='container'>";
                                echo "<div class='row' style=margin-bottom:2%>";
                                    echo "<div class='col-md-4 offset-md-7'>" . "<b>" . "ยอดรวมทั้งหมด&nbsp;" . number_format($amount,2) . "&nbsp;บาท" . "</b>" . "</div>";
                                echo "</div>";
                            echo "</div>";
                            
                        }  ?>
                    </div>
                    <br>
                </div>


                <?php    } ?>

            </div>
        </div>
    </div>

</body>

</html>