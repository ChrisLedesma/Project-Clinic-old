<?php

$med_name = $_POST['med_name'];

include ("dbconnect.php");

$sql = "INSERT INTO tbl_meds(med_name)VALUES('$med_name')" ; 

$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
header ("location:../index.php?page=med");
?>		
