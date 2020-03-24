<?php

$id = $_GET['id'];
$doc = $_POST['doctor'];
$date = Date("Y-m-d");

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "INSERT INTO tbl_appointment(doc_id, pat_id, app_date)
        VALUES('$doc', '$id', '$date');";
        $q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
        header("location:index.php?page=app");

?>