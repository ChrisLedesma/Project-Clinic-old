<?php
$id= $_GET['id'];
$medname = $_POST['medname'];

	include("dbconnect.php");
	$sql = "UPDATE tbl_meds SET 
			med_name = '$medname'
			WHERE med_id = $id";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
header ("location:../index.php?page=med");
?>