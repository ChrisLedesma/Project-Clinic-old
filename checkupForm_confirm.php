<?php
$id = $_GET['id'];
$pat = $_GET['pat'];
$doc = $_GET['doc'];
$find = $_POST['find'];
$obs = $_POST['obs'];
$date = Date("Y-m-d");

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");

$sql="SELECT COUNT(medic_id) as total FROM tbl_medication WHERE app_id = $id;";
$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);
$total = $r['total'];

$sql3="SELECT COUNT(res_id) as labtotal FROM tbl_labres WHERE app_id = $id;";
$q3=mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r3 = mysqli_fetch_assoc($q);
$labtotal = $r3['total'];

$sql9 = "SELECT * FROM tbl_medication WHERE app_id = '$id';";
$q9 = mysqli_query($conn, $sql9) or die (mysqli_error($conn));

$sql10 = "SELECT * FROM tbl_labres WHERE app_id = '$id';";
$q10 = mysqli_query($conn, $sql10) or die (mysqli_error($conn));

$x=0;
while($r9 = mysqli_fetch_assoc($q9)){
    $x++;
    $medic_id= $r9['medic_id'];
    $medic = $_POST['medesc'.$x];
    $sql4="UPDATE tbl_medication
    SET medic_desc = '$medic'
    WHERE app_id ='$id' AND medic_id = '$medic_id';";
    $q4=mysqli_query($conn,$sql4) or die (mysqli_error($conn));
}


$y=0;
while($r10 = mysqli_fetch_assoc($q10)){
    $y++;
    $labres_id= $r10['res_id'];
    $labres = $_POST['labdesc'.$y];
    $sql5="UPDATE tbl_labres
        SET res_desc = '$labres'
        WHERE app_id ='$id' AND res_id = '$labres_id';";
    $q5=mysqli_query($conn,$sql5) or die (mysqli_error($conn));
}


$sql1="INSERT INTO tbl_finding(find_desc, app_id, find_date)
VALUES('$find','$id', '$date')";
$q1=mysqli_query($conn,$sql1) or die (mysqli_error($conn));

$sql2="INSERT INTO tbl_observation(ob_desc, app_id, ob_date)
VALUES('$obs','$id', '$date')";
$q2=mysqli_query($conn,$sql2) or die (mysqli_error($conn));

$sql6="SELECT * FROM tbl_observation WHERE app_id = '$id';";
$q6=mysqli_query($conn,$sql6) or die (mysqli_error($conn));
$r6 = mysqli_fetch_assoc($q6);

$ob_id = $r6['ob_id'];

$sql7="SELECT * FROM tbl_finding WHERE app_id = '$id';";
$q7=mysqli_query($conn,$sql7) or die (mysqli_error($conn));
$r7= mysqli_fetch_assoc($q7);

$find_id = $r7['find_id'];

$sql8="INSERT INTO tbl_checkup(app_id, doc_id, pat_id, find_id, ob_id, cup_date)
VALUES('$id','$doc', '$pat', '$find_id', '$ob_id', '$date')";
$q8=mysqli_query($conn,$sql8) or die (mysqli_error($conn));

$sql11="DELETE from tbl_appointment WHERE app_id = $id";
$q11 = mysqli_query($conn, $sql11) or die (mysqli_error($conn));

header("location:index.php?page=app")
?>