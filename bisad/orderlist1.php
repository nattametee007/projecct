<?php
session_start();
include("condb.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
          fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
          <path
            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

            <ul class="navbar-nav">

                <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                    <input type="text" placeholder="Search.." name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>


                <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg></a>

                <div class="dropdown" style="float:right;">
                    <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-person" viewBox="0 0 16 16">
                  <path
                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                </svg></button>
                    <div class="dropdown-content">
                        <a href="index.php">สมัครสมาชิก</a>
                        <a href="signin.php">เข้าสู่ระบบ</a>
                        <a href="#">ดูรายการสั่งซื้อ</a>
                        <a href="logout.php">ออกจากระบบ</a>
                    </div>
                </div>
            </ul>

        </div>
    </nav>

    <?php
    $user_id = $_SESSION['user_login'];
    $queryorder = "SELECT DISTINCT order_id FROM sale_order WHERE user_id=$user_id";
    $rsorder = mysqli_query($conn, $queryorder);
    ?>

	<div class="container" style='margin-top:3%;margin-left:2%'>
        <div class='row'>
        <div class='col-3'>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="row">
                    <th class="col-sm-7">หมายเลขคำสั่งซื้อ</th>
                </tr>
            </thead>
            <tbody>
                <?php $allorderid = array(); ?>
                <?php foreach($rsorder as $row){
                    array_push($allorderid, $row['order_id']); ?>
                    <tr>
                        <td><a href="#<?php echo $row['order_id']; ?>"><?php echo $row['order_id']; ?></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        <?php foreach($allorderid as $id){
        ?>
        <div class='col-8'>
            <div class="tab-content">
                <div id="<?php echo $id; ?>" class="container tab-pane active"><br>
                <?php
                $queryorderlistdetail = "SELECT so.*, i.picture, i.product_name, i.cost FROM sale_order as so INNER JOIN inventory as i ON so.product_id = i.product_id WHERE so.order_id = $id";
                $rsorderdetail = mysqli_query($conn, $queryorderlistdetail);
                $rowdetail = mysqli_fetch_array($rsorderdetail);

                $queryorderlisttd = "SELECT DISTINCT time_date FROM sale_order WHERE order_id = $id";
                $rsordertd = mysqli_query($conn, $queryorderlisttd);
                $rowdetailtd = mysqli_fetch_array($rsordertd);
                ?>
                <h3>รายการสั่งซื้อ</h3>
    <h4>หมายเลขคำสั่งซื้อ : <?php echo $id; ?><br>
        วัน เวลาที่สั่งซื้อ : <?php echo $rowdetailtd['time_date']; ?>
    </h4>
    <div class="container">
        <?php
            $amount=0;
            foreach($rsorderdetail as $row){
                $amount += $row['total'];
                echo "<div class='row'>";
                    echo "<div class='col-md-3 offset-md-1'>" . "<img src='picture/" . $row['picture'] . "' width='100%'>" . "</div>";
                    echo "<div class='col-md-5 offset-md-0.5'>";
                        echo "<div class='row'>";
                            echo "<div class='col-md-6 offset-md-0.5'>ชื่อสินค้า : " . $row['product_name'] . "</div>";
                        echo "</div>";
                        echo "<div class='row'>";
                            echo "<div class='col-md-10 offset-md-0.5'>ราคาต่อหน่วย : " . number_format($row['cost'],2) . "&nbsp;บาท" . "</div>";
                        echo "</div>";
                        echo "<div class='row'>";
                            echo "<div class='col-md-5 offset-md-0.5'>จำนวน : " . number_format($row['quantities']) . "&nbsp;ชิ้น" . "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<br>";
            } //close foreach
                    echo "<br>";
                    echo "<div class='row'>";
                        echo "<div class='col-md-4 offset-md-6'>" . "<b>" . "ยอดรวมทั้งหมด&nbsp;" . number_format($amount,2) . "&nbsp;บาท" . "</b>" . "</div>";
                    echo "</div>";
        ?>
    </div>
    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</body>