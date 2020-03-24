<?php
$id = $_GET['id'];
$find = $_POST['find'];
$obs = $_POST['obs'];

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");

$sql = "SELECT * FROM tbl_checkup where cup_id = '$id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);

$appid = $r['app_id'];
$findid = $r['find_id'];
$obid = $r['ob_id'];
$patid = $r['pat_id'];

$sql1="SELECT COUNT(medic_id) as total FROM tbl_medication WHERE app_id = $appid;";
$q1=mysqli_query($conn,$sql1) or die (mysqli_error($conn));
$r1 = mysqli_fetch_assoc($q1);
$total = $r1['total'];


$sql3="SELECT COUNT(res_id) as labtotal FROM tbl_labres WHERE app_id = $appid;";
$q3=mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r3 = mysqli_fetch_assoc($q);
$labtotal = $r3['total'];

$sql9 = "SELECT * FROM tbl_medication WHERE app_id = '$appid';";
$q9 = mysqli_query($conn, $sql9) or die (mysqli_error($conn));

$x=0;
while($r9 = mysqli_fetch_assoc($q9)){
    $x++;
    $medic_id= $r9['medic_id'];
    $medic = $_POST['medic'.$x];
    $sql4="UPDATE tbl_medication
    SET medic_desc = '$medic'
    WHERE app_id ='$appid' AND medic_id = '$medic_id';";
    $q4=mysqli_query($conn,$sql4) or die (mysqli_error($conn));
}

$sql10 = "SELECT * FROM tbl_labres WHERE app_id = '$appid';";
$q10 = mysqli_query($conn, $sql10) or die (mysqli_error($conn));


$y=0;
while($r10 = mysqli_fetch_assoc($q10)){
    $y++;
    $labres_id= $r10['res_id'];
    $labres = $_POST['labres'.$y];
    $sql5="UPDATE tbl_labres
        SET res_desc = '$labres'
        WHERE app_id ='$appid' AND res_id = '$labres_id';";
    $q5=mysqli_query($conn,$sql5) or die (mysqli_error($conn));
}

$sqla= "UPDATE tbl_finding
        SET find_desc = '$find'
        WHERE app_id = '$appid' AND find_id = '$findid';";
 $qa=mysqli_query($conn,$sqla) or die (mysqli_error($conn));

 $sqlb= "UPDATE tbl_observation
 SET ob_desc = '$obs'
 WHERE app_id = '$appid' AND ob_id = '$obid';";
$qb=mysqli_query($conn,$sqlb) or die (mysqli_error($conn));

header("location:index.php?page=viewPatient&id=".$patid)
?>