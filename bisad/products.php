<?php
include("connect.php");

if (isset($_POST['btn'])) {
    $date = $_POST['idate'];
    // SQL script for selecting by date
    $sql = "SELECT * FROM inventory WHERE created_at = '$date'";

    $query = mysqli_query($conn, $sql);
} else {
    // SQL script for selecting all
    $sql = "SELECT * FROM inventory";

    $query = mysqli_query($conn, $sql);
}
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Item View List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
        <a class="navbar-brand" href="inventory.php"><svg xmlns="http://www.w3.org/2000/svg" style='color: white;' width="25" height="25" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                </svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div style='margin-right:60%;'>
                <a href='inventory.php'><button type="button" class="btn btn-lg" style='background-color: #D99B84; color: #000000;'>คำสั่งซื้อ</button></a>
                <a href='products.php'><button type="button" class="btn btn-lg" style='background-color: #D99B84; color: #000000;'>จัดการคลังสินค้า</button></a>
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
    <div class="container mt-5">
        <h1>เพิ่มสินค้า</h1>
        <form action="add.php" method="POST">
            <div class="form-group">
                <label>ชื่อสินค้า</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="ชื่อสินค้า" 
                    name="iname" />
            </div>
  
            <div class="form-group">
                <label>รูปภาพสินค้า</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="รูปภาพสินค้า" 
                    name="ipic" />
            </div>

            <div class="form-group">
                <label>ขนาด</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="ขนาด" 
                    name="isize" />
            </div>

            <div class="form-group">
                <label>สี</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="สี" 
                    name="icolour" />
            </div>

            <div class="form-group">
                <label>ราคา</label>
                <input type="float" 
                    class="form-control" 
                    placeholder="ราคา" 
                    name="icost" />
            </div>
            
            <div class="form-group">
                <label>รายละเอียด</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="รายละเอียด" 
                    name="idetail" />
            </div>
  
            <div class="form-group">
                <label>หมวดหมู่</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="หมวดหมู่" 
                    name="icate" />
            </div>

            <div class="form-group">
                <input type="submit" 
                    value="เพิ่มสินค้า" 
                    class="btn"
                          style="background-color: #D99B84; color: #000000;"
                    name="btn">
            </div>
        </form>
    </div>
  
   
    <div class="container mt-5">

        <!-- top -->
        <div class="row">
            <div class="col-lg-8">
                <h1>คลังสินค้า</h1>
            </div>
            
        </div>

        <!-- Grocery Cards -->
        <div class="row mt-4">
            <?php while ($qq = mysqli_fetch_array($query)) { ?>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 align= 'center' class="card-title">
                                <?php echo $qq['product_name']; ?>
                            </h5>
                            <h6 align= 'center' class="card-subtitle mb-2 text-muted">
                                <img src ="picture/<?php echo $qq['picture']; ?> "height="250px">
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                ขนาด : 
                                <?php echo $qq['size']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                สี : 
                                <?php echo $qq['colour']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                ราคา : 
                                <?php echo $qq['cost']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                รายละเอียด : 
                                <?php echo $qq['detail']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                หมวดหมู่ : 
                                <?php echo $qq['category']; ?>
                            </h6>
                            

                            <a href="delete.php?id=<?php echo $qq['product_id']; ?>" class="card-link">ลบสินค้า</a>
                        </div>
                    </div><br>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
