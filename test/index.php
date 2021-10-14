<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php		
if(isset($_POST['add']))
{
$x=$_POST['fnum'];		
$y=$_POST['snum'];				
$sum=$x+$y;		 
echo "Result:<input type='text' value='$sum'/>";			
}
?>
	
<body>
<form method="post">
Enter first number <input type="text" name="fnum"/><hr/>
Enter second number <input type="text" name="snum"/><hr/>	   		   
<input type="submit"  name="add" value="ADD"/>
</form>
</body>
</html>