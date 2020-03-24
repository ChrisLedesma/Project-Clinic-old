<?php

$c_id=$_GET['id'];
$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");

$sql="DELETE from tbl_patient WHERE pat_id = $c_id";
$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

header("location: index.php?page=pat");


?>