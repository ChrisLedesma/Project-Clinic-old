<?php
$labname = $_POST['labname'];
include ('dbconnect.php');

$sql ="INSERT INTO tbl_lab(lab_name)
	VALUES('$labname')";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
header ("location:../index.php?page=lab");
?>