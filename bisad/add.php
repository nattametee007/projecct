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
        <h1>Add Grocery List</h1>
        <form action="add.php" method="POST">
            <div class="form-group">
                <label>Item name</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Item name" 
                    name="iname" />
            </div>
  
            <div class="form-group">
                <label>Item quantity</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Item quantity" 
                    name="iqty" />
            </div>
  
            <div class="form-group">
                <label>Item status</label>
                <select class="form-control" 
                    name="istatus">
                    <option value="0">
                        PENDING
                    </option>
                    <option value="1">
                        BOUGHT
                    </option>
                    <option value="2">
                        NOT AVAILABLE
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" 
                    class="form-control" 
                    placeholder="Date" 
                    name="idate">
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
            $item_name=$_POST['iname'];
            $item_qty=$_POST['iqty'];
            $item_status=$_POST['istatus'];
            $date=$_POST['idate'];

            // SQL script for adding an item
      
  
            mysqli_query($conn,$sql);
            header("location:products.php");
        }
          
    ?>
</body>
  
</html>