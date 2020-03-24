<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bday = $_POST['birthday'];
$Age = $_POST['age'];
$contact = $_POST['contact'];

include ('dbconnect.php');

$sql ="INSERT INTO tbl_doctor(doc_FName,doc_LName,doc_birthday,doc_age,doc_number)
	VALUES('$fname','$lname','$bday','$Age','$contact')";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
header ("location:../index.php?page=doc");
?>