<?php
include("connect.php");
if (isset($_POST['btn'])) {  // Click update
    $iname=$_POST['iname'];
    $ipic=$_POST['ipic'];
    $isize=$_POST['isize'];
    $icolour=$_POST['icolour'];
    $icost=$_POST['icost'];
    $idetail=$_POST['idetail'];
    $icate=$_POST['icate'];
    $id = $_GET['id'];

    // SQL script for updating by Id
    $sql = "UPDATE inventory SET product_name='$iname',picture='$ipic',size='$isize',colour='$icolour',cost='$icost',detail='$idetail',category='$icate' WHERE product_id = $id";


    $query = mysqli_query($conn, $sql);
    header('location:products.php');
} else if (isset($_GET['id'])) {
    // SQL script for seleting by Id to display item details  
    $sql = "SELECT * FROM inventory WHERE product_id = '" . $_GET['id'] . "'";
    $query = mysqli_query($conn, $sql);
    $res = mysqli_fetch_array($query);
}
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Update List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Update Inventory List</h1>
        <form method="post">
            <div class="form-group">
                <label>product_name</label>
                <input type="text" class="form-control" name="iname" placeholder="product_name" value="<?php echo $res['product_name']; ?>" />
            </div>

            <div class="form-group">
                <label>picture</label>
                <input type="text" class="form-control" name="ipic" placeholder="picture" value="<?php echo $res['picture']; ?>" />
            </div>

            <div class="form-group">
                <label>size</label>
                <input type="text" class="form-control" name="isize" placeholder="size" value="<?php echo $res['size']; ?>" />
            </div>

            <div class="form-group">
                <label>colour</label>
                <input type="text" class="form-control" name="icolour" placeholder="colour" value="<?php echo $res['colour']; ?>" />
            </div>

            <div class="form-group">
                <label>cost</label>
                <input type="text" class="form-control" name="icost" placeholder="cost" value="<?php echo $res['cost']; ?>" />
            </div>

            <div class="form-group">
                <label>detail</label>
                <input type="text" class="form-control" name="idetail" placeholder="detail" value="<?php echo $res['detail']; ?>" />
            </div>

            <div class="form-group">
                <label>category</label>
                <input type="text" class="form-control" name="icate" placeholder="category" value="<?php echo $res['category']; ?>" />
            </div>

            <div class="form-group">
                <input type="submit" value="Update" name="btn" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>

</html>