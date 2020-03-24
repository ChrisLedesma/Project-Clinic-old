<?php
    $id = $_GET['id'];
    $pat = $_GET['pat'];
    $doc = $_GET['doc'];
    $medid = $_GET['medid'];
    
    $conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
    $db = mysqli_select_db($conn, "sql12329213");

$sql="DELETE FROM tbl_medication WHERE medic_id = $medid";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
header ("location:index.php?page=checkUp&id=".$id."&pat=".$pat."&doc=".$doc);

?>