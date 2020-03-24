<?php

$id = $_GET['id'];

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_patient where pat_id = '$id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);

$patid = $r['pat_id'];

$sql2 = "SELECT * FROM tbl_checkup where pat_id = '$id'";
$q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
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

<div class=" d-flex flex-row justify-content-around align-content-center" style="width: 100%; border: 0px solid red;">
  <div class="card w-50 border-info mb-6" style="margin-right: 10px; ">
    <div class="card-header d-flex justify-content-between align-items-center">
    <div>PROFILE</div>
    <div><a href="index.php?page=setApp&id=<?php echo $id;?>"><button class="btn btn-info">Set Appointment</button></a></div>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Name:</h5>
      <p class="card-text"><?php echo $r['pat_FName']." ".$r['pat_LName'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Gender:</h5>
      <p class="card-text"><?php echo $r['pat_gender'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Date of Birth:</h5>
      <p class="card-text"><?php echo $r['pat_birthday'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Age:</h5>
      <p class="card-text"><?php echo $r['pat_age'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;" >
      <h5 class="card-title">Bloodtype:</h5>
      <p class="card-text"><?php echo $r['pat_bloodtype'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Description/History:</h5>
      <p class="card-text"><?php echo $r['pat_desc'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Contact Number:</h5>
      <p class="card-text"><?php echo $r['pat_number'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 4vw 5vw;">
      <h5 class="card-title">Email:</h5>
      <p class="card-text"><?php echo $r['pat_email'];?></p>
    </div>
    <div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
      <div><a href="index.php?page=editPat&id=<?php echo $id;?>"><button class="btn btn-info">EDIT PROFILE</button></a></div>
      <div><a href="deletePatient_confirm.php?id=<?php echo $r['pat_id'];?>&name=<?php echo $r['pat_FName'];?>" onclick="return  confirm('Do you want to delete <?php echo $r['pat_FName'];?>?')"><button class="btn btn-danger">DELETE</button></a></div>
    </div>
  </div>
  <div class="empty-v-small"></div>
  <div class="card w-50 h-25 border-info mb-6">
    <div class="card-header">HISTORY</div>
    <div class="card-body text-info">
      <table class="table w-100">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Doctor</th>
          </tr>
        </thead>	
          <?php
            while($r2 = mysqli_fetch_assoc($q2))
            {
                  $docid = $r2['doc_id'];
                  $sql = "SELECT * FROM tbl_doctor where doc_id = '$docid'";
                  $q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
                  $r = mysqli_fetch_assoc($q);
            ?> 
          	
	<tr>
  <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $r2['cup_id'];?>"><?php echo $r2['cup_date']?></button></td>
        <td><?php echo $r['doc_FName']." ".$r['doc_LName'];?></td>
	</tr>
  <div id="myModal<?php echo $r2['cup_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-text"><b class="text-secondary">Patient History</b></h4>
      </div>
      <div class="modal-body">

<?php
$id = $r2['cup_id'];

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
<h3>Date: <?php echo $date; ?></h3><br>
<p><b class="text-info">Patient: </b>&nbsp;<?php echo $r12['pat_FName']." ".$r12['pat_LName']; ?></p><br>
<p><b class="text-info">Doctor:</b>&nbsp;<?php echo $r1['doc_FName']." ".$r1['doc_LName']; ?></p><br>
<p><b class="text-info">Findings:</b>&nbsp;<?php echo $r3['find_desc']; ?></p><br>
<p><b class="text-info">Observations:</b>&nbsp;<?php echo $r4['ob_desc']; ?></p><br>
<p><b class="text-info">Medication:</b>&nbsp;</p>
<p class="text-secondary"><?php
    while($r5 = mysqli_fetch_assoc($q5)){
        $medid = $r5['med_id']; //get medicine name
        $sql7 = "SELECT * FROM tbl_meds where med_id = '$medid'";
        $q7 = mysqli_query($conn,$sql7) or die (mysqli_error($conn));
        $r7 = mysqli_fetch_assoc($q7);

        echo $r7['med_name'].": ".$r5['medic_desc'];?><br><?php
    }
?></p>
<br>
<p><b class="text-info">Lab Results: &nbsp;</b></p>
<p class="text-secondary">
<?php
    while($r6 = mysqli_fetch_assoc($q6)){
        $labid = $r6['lab_id']; //get lab name
        $sql8 = "SELECT * FROM tbl_lab where lab_id = '$labid'";
        $q8 = mysqli_query($conn,$sql8) or die (mysqli_error($conn));
        $r8 = mysqli_fetch_assoc($q8);

        echo $r8['lab_name'].": ".$r6['res_desc'];?><br><?php
      }
  ?>
</p>
      </div>
      <div class="modal-footer">
      <a href="index.php?page=editHistory&id=<?php echo $id;?>" ><button type="button" class="btn btn-default">Edit</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
<?php 
	}
	?>
	
	</table>


        
    </div>
  </div>
</div>
