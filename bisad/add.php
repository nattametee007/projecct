<html>  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">  
    <title>Add Items</title>
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">
        <h1>Add Inventory List</h1>
        <form action="add.php" method="POST">
            <div class="form-group">
                <label>product_name</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="product_name" 
                    name="iname" />
            </div>
  
            <div class="form-group">
                <label>picture</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="picture" 
                    name="ipic" />
            </div>

            <div class="form-group">
                <label>size</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="size" 
                    name="isize" />
            </div>

            <div class="form-group">
                <label>colour</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="colour" 
                    name="icolour" />
            </div>

            <div class="form-group">
                <label>cost</label>
                <input type="float" 
                    class="form-control" 
                    placeholder="cost" 
                    name="icost" />
            </div>
            
            <div class="form-group">
                <label>detail</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="detail" 
                    name="idetail" />
            </div>
  
            <div class="form-group">
                <label>category</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="category" 
                    name="icate" />
            </div>

            <div class="form-group">
                <input type="submit" 
                    value="Add" 
                    class="btn btn-danger" 
                    name="btn">
            </div>
        </form>
    </div>
  
    <?php
        if(isset($_POST["btn"])) {
            include("connect.php");
            $iname=$_POST['iname'];
            $ipic=$_POST['ipic'];
            $isize=$_POST['isize'];
            $icolour=$_POST['icolour'];
            $icost=$_POST['icost'];
            $idetail=$_POST['idetail'];
            $icate=$_POST['icate'];

            // SQL script for adding an item
            $sql = "INSERT INTO inventory (product_name,picture,size,colour,cost,detail,category) VALUES ('$iname','$ipic','$isize','$icolour','$icost','$idetail','$icate')";
      
  
            mysqli_query($conn,$sql);
            header("location:products.php");
        }
          
    ?>
</body>
  
</html>