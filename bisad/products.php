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
</head>

<body>
    <div class="container mt-5">

        <!-- top -->
        <div class="row">
            <div class="col-lg-8">
                <h1>Store Item List</h1>
                <a href="add.php">Add Item</a>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-8">

                        <!-- Date Filtering-->
                        <form method="post" action="">
                            <input type="date" class="form-control" name="idate">

                            <div class="col-lg-4" method="post">
                                <input type="submit" class="btn btn-danger float-right" name="btn" value="filter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grocery Cards -->
        <div class="row mt-4">
            <?php while ($qq = mysqli_fetch_array($query)) { ?>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $qq['product_name']; ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <img src ="picture/<?php echo $qq['picture']; ?> "width="305px">
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $qq['size']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $qq['colour']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $qq['cost']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $qq['detail']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $qq['category']; ?>
                            </h6>
                            

                            <a href="delete.php?id=<?php echo $qq['product_id']; ?>" class="card-link">Delete</a>
                            <a href="update.php?id=<?php echo $qq['product_id']; ?>" class="card-link">Update</a>
                        </div>
                    </div><br>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>