<?php
$id= $_GET['id'];
$labname = $_POST['labname'];

	include("dbconnect.php");
	$sql = "UPDATE tbl_lab SET 
			lab_name = '$labname'
			WHERE lab_id = $id";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
header ("location:../index.php?page=lab");
?>