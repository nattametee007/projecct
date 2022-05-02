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
