<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

$user = $_GET['user'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-eqr5uiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
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
                    <input type="text" placeholder="???????????????.." name="search2">
                    <button type="submit" name="btn1" style='background-color: #D99B84;padding-bottom:15px; padding-top:13.5px;'><i class="fa fa-search"></i></button>
                </form>


                <a class="nav-link" href="cart.php?usercart=<?= $user ?>"><svg xmlns="http://www.w3.org/2000/svg" style='color: white;' width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg></a>

                <div class="dropdown" style="float:right;">
                    <button class="dropbtn" style='background-color: #D99B84;'><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg></button>
                    <div class="dropdown-content">
                        <a href="index.php">?????????????????????????????????</a>
                        <a href="signin.php">?????????????????????????????????</a>
                        <a href="orderlist.php">????????????????????????????????????????????????</a>
                        <a href="logout.php">??????????????????????????????</a>
                    </div>
                </div>
            </ul>

        </div>
    </nav>
    <?php
    $product = $_GET['product'];
    $user = $_GET['user'];
    $category = $_GET['cate'];
    ?>
    <center>
        <div class="container-fluid mt-2">
            <div class="container row">
           
                <div class="col-sm-5  ">
                    <?php

                    $product_array = $db_handle->runQuery("SELECT * FROM inventory WHERE product_id=$product");
                    if (!empty($product_array)) {
                        foreach ($product_array as $key => $value) {
                    ?>
                            <img class="product-image img-fluid" src="picture/<?php echo $product_array[$key]["picture"]; ?>">

                    <?php
                        }
                    }
                    ?>
                </div>


                <div class="col-sm-7 ">

                    <div class="container">
                        <h1><?php echo $product_array[$key]["product_name"]; ?></h1><br>
                        <h3> <?php echo "THB" . $product_array[$key]["cost"]; ?></h3><br>
                        <h5><?php echo $product_array[$key]["detail"]; ?></h5>

                    </div>
                    <hr>
                    <?php if ($category == "???????????????????????????????????????") { ?>
                        <form method="POST">
                            <div class="container" style="text-align: left;">
                                <div class="form-group">
                                    <label>?????? :</label><br>
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1"><?php echo $product_array[$key]["colour"]; ?></label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">??????????????????</label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">????????????</label>
                                </div>

                                <div class="form-group">
                                    <label>??????????????? : </label>
                                    <input type="text" class="form-control" placeholder="???????????????" name="iqty" />
                                </div>


                            </div><br>

                            <div class="container row">

                                <div class="container col">
                                    <a class="container btn btn-outline-info" href="paymentfromdetail.php?product='<?php echo $product_array[$key]["product_id"]; ?>'&user='<?php echo $user; ?>'&quantitiesorder=1">
                                        ??????????????????????????????????????????
                                    </a>

                                </div>
                                <div class="container col">
                                    <input type="submit" value="???????????????????????????????????????" class="container btn btn-outline-info" name="btn">

                                </div>

                            </div>
                        </form>
                    <?php } elseif ($category == "?????????????????????") { ?>
                        <form method="POST">
                            <div class="container" style="text-align: left;">
                                <div class="form-group">
                                    <label>?????? :</label><br>
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1"><?php echo $product_array[$key]["colour"]; ?></label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">??????????????????</label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">????????????</label>
                                </div>

                                <div class="form-group">
                                    <label>??????????????? : </label>
                                    <input type="text" class="form-control" placeholder="???????????????" name="iqty" />
                                </div>


                            </div><br>

                            <div class="container row">

                                <div class="container col">
                                    <a class="container btn btn-outline-info" href="paymentfromdetail.php?product='<?php echo $product_array[$key]["product_id"]; ?>'&user='<?php echo $user; ?>'&quantitiesorder=1">
                                        ??????????????????????????????????????????
                                    </a>

                                </div>
                                <div class="container col">
                                    <input type="submit" value="???????????????????????????????????????" class="container btn btn-outline-info" name="btn">

                                </div>

                            </div>
                        </form>
                    <?php } elseif ($category == "????????????") { ?>
                        <form method="POST">
                            <div class="container" style="text-align: left;">
                                <div class="form-group">
                                    <label>?????? :</label><br>
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1"><?php echo $product_array[$key]["colour"]; ?></label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">??????????????????</label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">????????????</label>
                                </div>

                                <div class="form-group">
                                    <label>??????????????? : </label>
                                    <input type="text" class="form-control" placeholder="???????????????" name="iqty" />
                                </div>


                            </div><br>

                            <div class="container row">

                                <div class="container col">
                                    <a class="container btn btn-outline-info" href="paymentfromdetail.php?product='<?php echo $product_array[$key]["product_id"]; ?>'&user='<?php echo $user; ?>'&quantitiesorder=1">
                                        ??????????????????????????????????????????
                                    </a>

                                </div>
                                <div class="container col">
                                    <input type="submit" value="???????????????????????????????????????" class="container btn btn-outline-info" name="btn">

                                </div>

                            </div>
                        </form>
                    <?php } elseif ($category == "?????????????????????") { ?> 
                        <form method="POST">
                            <div class="container" style="text-align: left;">
                                <div class="form-group">
                                    <label>?????? :</label><br>
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1"><?php echo $product_array[$key]["colour"]; ?></label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">??????????????????</label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">????????????</label>
                                </div>
                                <div class="form-group">
                                    <label>???????????? : </label><br>
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1"><?php echo $product_array[$key]["size"]; ?></label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">41</label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">42</label>
                                </div>
                                <div class="form-group">
                                    <label>??????????????? : </label>
                                    <input type="text" class="form-control" placeholder="???????????????" name="iqty" value=1>
                                </div>

                            </div><br>

                            <div class="container row">

                                <div class="container col">
                                    <a class="container btn btn-outline-info" href="paymentfromdetail.php?product=<?php echo $product; ?>&user=<?php echo $user; ?>&quantitiesorder=1">
                                        ??????????????????????????????????????????
                                    </a>

                                </div>
                                <div class="container col">
                                    <input type="submit" value="???????????????????????????????????????" class="container btn btn-outline-info" name="btn">

                                </div>

                            </div>
                        </form>
                    <?php } else { ?> 
                        <form method="POST">
                            <div class="container" style="text-align: left;">
                                <div class="form-group">
                                    <label>?????? :</label><br>
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1"><?php echo $product_array[$key]["colour"]; ?></label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">??????????????????</label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">????????????</label>
                                </div>
                                <div class="form-group">
                                    <label>???????????? : </label><br>
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                                    <label class="form-check-label" for="check1"><?php echo $product_array[$key]["size"]; ?></label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">M</label>
                                    <input type="checkbox" class="form-check-input" disabled>
                                    <label class="form-check-label">L</label>
                                </div>
                                <div class="form-group">
                                    <label>??????????????? : </label>
                                    <input type="text" class="form-control" placeholder="???????????????" name="iqty" value=1>
                                </div>

                            </div><br>

                            <div class="container row">

                                <div class="container col">
                                    <a class="container btn btn-outline-info" href="paymentfromdetail.php?product=<?php echo $product; ?>&user=<?php echo $user; ?>&quantitiesorder=1">
                                        ??????????????????????????????????????????
                                    </a>

                                </div>
                                <div class="container col">
                                    <input type="submit" value="???????????????????????????????????????" class="container btn btn-outline-info" name="btn">

                                </div>

                            </div>
                        </form>
                    <?php }?>
                </div>


            </div>
        </div>
    </center>
    <?php
    if (isset($_POST["btn"])) {

        include("connect.php");
        $item_qty = $_POST['iqty'];
        $sql = "INSERT INTO cart(user_id, product_id, quantities) VALUES ($user, $product, $item_qty)";
        mysqli_query($conn, $sql);
    };

    ?>
</body>

</html>
