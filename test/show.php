<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="1">
		
		<?php 
		for( $r = 1; $r < 13; $r++)
		{
		echo "<tr>";
			for( $c=1; $c<13; $c++)
			{
			($c==$r) ? $bg = "gray" : $bg = "white";
			echo "<td class='$bg'><a href='#' title='$r x $c = ". "x". $r * $c . " ' >" . $r*$c . "</a></td>" ;
			}		
		echo  "</tr>";
		}        
		?>
</table>

</body>
</html>