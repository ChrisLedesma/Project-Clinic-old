<?php
$id = $_GET['id'];

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");


$sql = "SELECT * FROM tbl_checkup where cup_id = '$id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);

//get variables
$appid = $r['app_id'];
$docid = $r['doc_id']; //r1
$patid = $r['pat_id']; //r2
$findid = $r['find_id']; //r3
$obid = $r['ob_id']; //r4
$date = $r['cup_date']; 

//get doctor name
$sql1 = "SELECT * FROM tbl_doctor where doc_id = '$docid'";
$q1 = mysqli_query($conn,$sql1) or die (mysqli_error($conn));
$r1 = mysqli_fetch_assoc($q1);

//get patient name
$sql12 = "SELECT * FROM tbl_patient where pat_id = '$patid'";
$q12 = mysqli_query($conn,$sql12) or die (mysqli_error($conn));
$r12 = mysqli_fetch_assoc($q12);

//get findings
$sql3 = "SELECT * FROM tbl_finding where find_id = '$findid'";
$q3 = mysqli_query($conn,$sql3) or die (mysqli_error($conn));
$r3 = mysqli_fetch_assoc($q3);

//get observations
$sql4 = "SELECT * FROM tbl_observation where ob_id = '$obid'";
$q4 = mysqli_query($conn,$sql4) or die (mysqli_error($conn));
$r4 = mysqli_fetch_assoc($q4);

//get medication
$sql5 = "SELECT * FROM tbl_medication where app_id = '$appid'";
$q5 = mysqli_query($conn,$sql5) or die (mysqli_error($conn));


//get lab result
$sql6 = "SELECT * FROM tbl_labres where app_id = '$appid'";
$q6 = mysqli_query($conn,$sql6) or die (mysqli_error($conn));

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
		
            </ul>
        </div>
    </div>
</nav>
<form method="post" action="editHistory_confirm.php?id=<?php echo $id;?>">

	<div class=" d-flex flex-row justify-content-around align-content-center" style="width: 100%; border: 0px solid red;">
	<div class="card w-75 border-info mb-6" style="margin-right: 10px; ">
		<div class="card-header d-flex justify-content-between align-items-center">
		<div>EDIT CHECK-UP</div>
	
		</div>
        <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
        <h5 class="card-title">Date:</h5>
            <p class="card-text w-50"><?php echo $date;?></p>
        </div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Patient:</h5>
            <p class="card-text w-50"><?php echo $r12['pat_FName']." ".$r12['pat_LName']; ?></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Doctor:</h5>
            <p class="card-text w-50"><?php echo $r1['doc_FName']." ".$r1['doc_LName']; ?></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Findings: </h5>
            <p class="card-text w-50"><textarea  class="form-control" rows="5" cols="30" name="find" required/><?php echo $r3['find_desc']; ?></textarea></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Observations: </h5>
            <p class="card-text w-50"><textarea  class="form-control" rows="5" cols="30" name="obs" required/><?php echo $r4['ob_desc']; ?></textarea></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h2 class="card-title">Medication:</h2>
        </div>
            <?php
                $x = 0;
                while($r5 = mysqli_fetch_assoc($q5)){
                    $x++;
                    $medid = $r5['med_id']; //get medicine name
                    $sql7 = "SELECT * FROM tbl_meds where med_id = '$medid'";
                    $q7 = mysqli_query($conn,$sql7) or die (mysqli_error($conn));
                    $r7 = mysqli_fetch_assoc($q7);
                    ?>
                    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
                    <h7 class="card-title"><?php echo $r7['med_name'];?>:</h7>
                    <p class="card-text w-50"><input class="form-control" type="input" name="medic<?php echo $x;?>" value="<?php echo $r5['medic_desc'];?>" required/></p>
                   </div>
            <?php
                }
            ?>
        <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h2 class="card-title">Lab Results:</h2>
        </div>
        <?php
                $y = 0;
                while($r6 = mysqli_fetch_assoc($q6)){
                    $y++;
                    $labid = $r6['lab_id']; //get lab name
                    $sql8 = "SELECT * FROM tbl_lab where lab_id = '$labid'";
                    $q8 = mysqli_query($conn,$sql8) or die (mysqli_error($conn));
                    $r8 = mysqli_fetch_assoc($q8);
                    ?>
                    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
                    <h7 class="card-title"><?php echo $r8['lab_name'];?>:</h7>
                    <p class="card-text w-50"><input class="form-control" type="input" name="labres<?php echo $y;?>" value="<?php echo $r6['res_desc'];?>" required/></p>
                   </div>
            <?php
                }
            ?>
		<div class="empty-small"></div>
        <div class="empty-small"></div>
		<div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
		<input class="btn btn-info btn-lg btn-block" type="Submit" name="Submit" value="Save changes">
		</div>
	</div>
</form>