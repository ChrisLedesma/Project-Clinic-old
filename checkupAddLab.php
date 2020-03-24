<?php
    $id = $_GET['id'];
    $pat = $_GET['pat'];
    $doc = $_GET['doc'];
    $lab = $_POST['lab'];
    $labres = $_POST['labres'];
    $date = Date("Y-m-d");

    $conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
    $db = mysqli_select_db($conn, "sql12329213");

    $sql="INSERT INTO tbl_labres(res_desc, lab_id, app_id, res_date)
    VALUES('$labres', '$lab','$id', '$date')";
    $q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    header("location:index.php?page=checkUp&id=".$id."&pat=".$pat."&doc=".$doc);
?>