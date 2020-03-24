<?php
$id= $_GET['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bday = $_POST['birthday'];
$Age = $_POST['Age'];
$contact = $_POST['contact'];

	include("dbconnect.php");
	$sql = "UPDATE tbl_doctor SET 
			doc_FName = '$fname',
			doc_LName = '$lname',
			doc_birthday = '$bday',
			doc_age = '$Age',
			doc_number = '$contact'
			WHERE doc_id = $id";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
header ("location:../index.php?page=viewDoc&id=".$id);
?>