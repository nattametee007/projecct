<?php
	$conn = mysqli_connect("localhost","root","","store") or die("
        Error: " . mysqli_error($conn));
	mysqli_query($conn, "SET NAMES 'utf8' ");
	error_reporting( error_reporting() & ~E_NOTICE );
?>