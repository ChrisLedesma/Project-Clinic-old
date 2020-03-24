
<?php
    $id = $_GET['id'];
    $pat = $_GET['pat'];
    $doc = $_GET['doc'];
    
$date = Date("Y-m-d");
$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_appointment WHERE app_id = '$id';";
$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);

$sql1 = "SELECT * FROM tbl_meds;";
$q1 = mysqli_query($conn, $sql1) or die (mysqli_error($conn));

$sql2 = "SELECT * FROM tbl_lab;";
$q2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));

   //get medication data
$sql3 = "SELECT * FROM tbl_medication WHERE app_id = '$id';";
$q3 = mysqli_query($conn, $sql3) or die (mysqli_error($conn));



//get labres data
$sql5 = "SELECT * FROM tbl_labres WHERE app_id = '$id';";
$q5 = mysqli_query($conn, $sql5) or die (mysqli_error($conn));


//get patient record
$patid = $r['pat_id'];

$sql7 = "SELECT * FROM tbl_patient WHERE pat_id = '$patid';";
$q7 = mysqli_query($conn, $sql7) or die (mysqli_error($conn));
$r7 = mysqli_fetch_assoc($q7);


$sql2a = "SELECT * FROM tbl_checkup where pat_id = '$patid'";
$q2a = mysqli_query($conn,$sql2a) or die (mysqli_error($conn));




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

<div class="d-flex flex-column align-content-center" style="width: 100%;border: 0px solid red;">
    <div class="d-flex justify-content-around align-content-center" style="width: 100%;border: 0px solid red;">
        <div class="card w-75 border-info mb-6" style="margin-right:10px; ">
            <div class="card-header">CHECK-UP FORM</div>
            <div class="card-body text-info row d-flex justify-content-center">
            
            <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
                <form id="Form1" method="POST" action="checkupAddMed.php?id=<?php echo $id;?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>">
                <h5 class="card-title">Medicine:</h5> <select class="btn btn-secondary dropdown-toggle" form="Form1" name="meds">
                    <?php
                        while($r1 = mysqli_fetch_assoc($q1)){?>
                        <option form="Form1" value="<?php echo $r1['med_id'];?>"><?php echo $r1['med_name'];?></option>
                <?php
                    }
                ?>
                </select>
                <input class="btn btn-info" form="Form1" type="Submit" name="Submit" value="Add Medication">
                </form>

                    <form id="Form2" method="POST" action="checkupAddLab.php?id=<?php echo $id;?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>">
                    <h5 class="card-title">Lab:</h5> <select class="btn btn-secondary dropdown-toggle" form="Form2" name="lab">
                        <?php
                            while($r2 = mysqli_fetch_assoc($q2)){?>
                            <option form="Form2" value="<?php echo $r2['lab_id'];?>"><?php echo $r2['lab_name'];?></option>
                    <?php
                        }
                    ?>
                    </select>
                    <input  class="btn btn-info" form="Form2" type="Submit" name="Submit" value="Add Lab"/>
                    </form>
            </div>


        <div>
        <form id="Form3" method="POST" action="checkupForm_confirm.php?id=<?php echo $id;?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>">

        <div class="empty-small">&nbsp;</div>
        <div>
        <?php
                $x = 0; 
            while($r3 = mysqli_fetch_assoc($q3)){
            $x++;
        //get med id for med name
        $medid = $r3['med_id'];  
            //get medicine name
            $sql4 = "SELECT * FROM tbl_meds WHERE med_id = '$medid';";
            $q4 = mysqli_query($conn, $sql4) or die (mysqli_error($conn));
            $r4 = mysqli_fetch_assoc($q4);
            ?> 	
            <h5 class="card-title"> Medicine: <?php echo $r4['med_name'];?> &nbsp;</h5>
            <div class="d-flex flex-row">
                <p class="card-text">Medication: &nbsp;
                <input form="Form3" type="text" name="<?php echo 'medesc'.$x; ?>">
                <a class="btn btn-secondary" href="cancelMed_confirm.php?id=<?php echo $id;?>&medid=<?php echo $r3['medic_id'];?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>" onclick="return  confirm('Do you want to remove <?php echo $r4['med_name']?>?')">Cancel</a><br>
            </div>
            <div class="empty-small">&nbsp;</div>
        <?php 
            }
            ?>
        </div>
        <div class="empty-small">&nbsp;</div>


        <div>
        <?php
                $y = 0; 
            while($r5 = mysqli_fetch_assoc($q5)){
            $y++;
        //get lab id for med name
        $labid = $r5['lab_id'];  
            //get lab name
            $sql = "SELECT * FROM tbl_lab WHERE lab_id = '$labid';";
            $q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
            $r = mysqli_fetch_assoc($q);
            ?> 	
            <h5 class="card-title">Lab: <?php echo $r['lab_name'];?> &nbsp;</h5>
            <div class="d-flex flex-row">
                <p class="card-text">Lab Result: &nbsp;
                <input form="Form3" type="text" name="<?php echo 'labdesc'.$y; ?>">
                <a class="btn btn-secondary" href="cancelLab_confirm.php?id=<?php echo $id;?>&labid=<?php echo $r5['res_id'];?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>" onclick="return  confirm('Do you want to remove <?php echo $r['lab_name']?>?')">Cancel</a><br></p>
            </div>
            <div class="empty-small">&nbsp;</div>
        <?php 
            }
            ?>    <div class="empty-small">&nbsp;</div>

        </div>

        <h5 class="card-title">Findings: <br><textarea  form="Form3" rows="5" cols="50" name="find" value="<?php echo isset($_POST['find']) ? $_POST['find'] : '' ?>" /></textarea><br></h5>
        <h5 class="card-title">Observations: <br><textarea  form="Form3" rows="5" cols="50" name="obs" value="<?php echo isset($_POST['obs']) ? $_POST['obs'] : '' ?>" /></textarea><br></h5>
        <div class="empty-small">&nbsp;</div>
        <div class="d-flex justify-content-end"><input class="btn btn-info btn-lg btn-block" form="Form3" type="Submit" name="Submit" value="Confirm">
        </div>
        </form>

        </div>
        <div class="empty-small">&nbsp;</div>
            </div>
        </div>
        <div class="card w-25 border-info mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
            <div>PROFILE</div>
            
            </div>
            <div class="col justify-content-between card-body text-info" style="padding: 2vw 2vw 0vw 2vw;">
            <h5 class="card-title">Name:</h5>
            <p class="card-text"><?php echo $r7['pat_FName']." ".$r7['pat_LName'];?></p>
            </div>
            <div class="col justify-content-between card-body text-info" style="padding: 2vw 2vw 0vw 2vw;">
            <h5 class="card-title">Gender:</h5>
            <p class="card-text"><?php echo $r7['pat_gender'];?></p>
            </div>
            <div class="col justify-content-between card-body text-info" style="padding: 2vw 2vw 0vw 2vw;">
            <h5 class="card-title">Date of Birth:</h5>
            <p class="card-text"><?php echo $r7['pat_birthday'];?></p>
            </div>
            <div class="col justify-content-between card-body text-info" style="padding: 2vw 2vw 0vw 2vw;">
            <h5 class="card-title">Age:</h5>
            <p class="card-text"><?php echo $r7['pat_age'];?></p>
            </div>
            <div class="col justify-content-between card-body text-info" style="padding: 2vw 2vw 0vw 2vw;" >
            <h5 class="card-title">Bloodtype:</h5>
            <p class="card-text"><?php echo $r7['pat_bloodtype'];?></p>
            </div>
            <div class="col justify-content-between card-body text-info" style="padding: 2vw 2vw 0vw 2vw;">
            <h5 class="card-title">Contact Number:</h5>
            <p class="card-text"><?php echo $r7['pat_number'];?></p>
            </div>
            <div class="col justify-content-between card-body text-info" style="padding: 2vw 2vw 4vw 2vw;">
            <h5 class="card-title">Email:</h5>
            <p class="card-text"><?php echo $r7['pat_email'];?></p>
            </div>
        </div>
    </div>
    <div class="card w-100 border-info mb-6" style="margin-top: 10px;">
    <div class="card-header">HISTORY</div>
    <div class="card-body text-info">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Date</th>
            <th scope="col">Doctor</th>
            </tr>
        </thead>	
        <?php
            while($r2a = mysqli_fetch_assoc($q2a))
            {
                $docid = $r2a['doc_id'];
                $sqlc = "SELECT * FROM tbl_doctor where doc_id = '$docid'";
                $qc = mysqli_query($conn,$sqlc) or die (mysqli_error($conn));
                $rc = mysqli_fetch_assoc($qc);
            ?> 
            
            <tr>
        <td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal<?php echo $r2a['cup_id'];?>"><?php echo $r2a['cup_date']?></button></td>
                <td><?php echo $rc['doc_FName']." ".$rc['doc_LName'];?></td>
            </tr>
        <div id="myModal<?php echo $r2a['cup_id'];?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Patient History</h4>
            </div>
            <div class="modal-body">

        <?php
        $id = $r2a['cup_id'];

        $conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
        $db = mysqli_select_db($conn, "sql12329213");

        $sqlb = "SELECT * FROM tbl_checkup where cup_id = '$id'";
        $qb = mysqli_query($conn,$sqlb) or die (mysqli_error($conn));
        $rb = mysqli_fetch_assoc($qb);

        //get variables
        $appid = $rb['app_id'];
        $docid = $rb['doc_id']; //r1
        $patid = $rb['pat_id']; //r2
        $findid = $rb['find_id']; //r3
        $obid = $rb['ob_id']; //r4
        $date = $rb['cup_date']; 

        //get doctor name
        $sql1b = "SELECT * FROM tbl_doctor where doc_id = '$docid'";
        $q1b = mysqli_query($conn,$sql1b) or die (mysqli_error($conn));
        $r1b = mysqli_fetch_assoc($q1b);

        //get patient name
        $sql12 = "SELECT * FROM tbl_patient where pat_id = '$patid'";
        $q12 = mysqli_query($conn,$sql12) or die (mysqli_error($conn));
        $r12 = mysqli_fetch_assoc($q12);

        //get findings
        $sql3b = "SELECT * FROM tbl_finding where find_id = '$findid'";
        $q3b = mysqli_query($conn,$sql3b) or die (mysqli_error($conn));
        $r3b = mysqli_fetch_assoc($q3b);

        //get observations
        $sql4b = "SELECT * FROM tbl_observation where ob_id = '$obid'";
        $q4b = mysqli_query($conn,$sql4b) or die (mysqli_error($conn));
        $r4b = mysqli_fetch_assoc($q4b);

        //get medication
        $sql5b = "SELECT * FROM tbl_medication where app_id = '$appid'";
        $q5b = mysqli_query($conn,$sql5b) or die (mysqli_error($conn));


        //get lab result
        $sql6b = "SELECT * FROM tbl_labres where app_id = '$appid'";
        $q6b = mysqli_query($conn,$sql6b) or die (mysqli_error($conn));

        ?>
        <h3>Date: <?php echo $date; ?></h3><br>
        <p style="color: rgb(54, 54, 54) !important;"><b class="text-info">Patient: </b>&nbsp;<?php echo $r12['pat_FName']." ".$r12['pat_LName']; ?></p><br>
        <p style="color: rgb(54, 54, 54) !important;"><b class="text-info">Doctor:</b>&nbsp;<?php echo $r1b['doc_FName']." ".$r1b['doc_LName']; ?></p><br>
        <p style="color: rgb(54, 54, 54) !important;"><b class="text-info">Findings:</b>&nbsp;<?php echo $r3b['find_desc']; ?></p><br>
        <p style="color: rgb(54, 54, 54) !important;"><b class="text-info">Observations:</b>&nbsp;<?php echo $r4b['ob_desc']; ?></p><br>
        <p><b class="text-info">Medication:</b>&nbsp;</p>
        <p class="text-dark">
        <?php
            while($r5b = mysqli_fetch_assoc($q5b)){
                $medid = $r5b['med_id']; //get medicine name
                $sql7b = "SELECT * FROM tbl_meds where med_id = '$medid'";
                $q7b = mysqli_query($conn,$sql7b) or die (mysqli_error($conn));
                $r7b = mysqli_fetch_assoc($q7b);

                echo $r7b['med_name'].": ".$r5b['medic_desc'];?><br><?php
            }
        ?>
        </p>
        <br>
        <p><b class="text-info">Lab Results: &nbsp;</b></p>
        <p class="text-dark">
        <?php
            while($r6b = mysqli_fetch_assoc($q6b)){
                $labid = $r6b['lab_id']; //get lab name
                $sql8b = "SELECT * FROM tbl_lab where lab_id = '$labid'";
                $q8b = mysqli_query($conn,$sql8b) or die (mysqli_error($conn));
                $r8b = mysqli_fetch_assoc($q8b);

                echo $r8b['lab_name'].": ".$r6b['res_desc'];?><br><?php
            }
        ?>    
        </p>
            </div>
            <div class="modal-footer">
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
</div>


<!--
<div>
<h2>Patient Profile:</h2>
Name: <br><?php echo $r7['pat_FName']." ".$r7['pat_LName'];?><br>
Gender: <br><?php echo $r7['pat_gender'];?><br>
Date of Birth: <br><?php echo $r7['pat_birthday'];?><br>
Age: <br><?php echo $r7['pat_age'];?><br>
Bloodtype: <br><?php echo $r7['pat_bloodtype'];?><br>
Description/History: <br><?php echo $r7['pat_desc'];?><br>
Contact Number: <br><?php echo $r7['pat_number'];?><br>
Email: <br><?php echo $r7['pat_email'];?><br>
</div>
<br><br>
<div>
<h2>Check-up Form:</h2>
    <form id="Form1" method="POST" action="checkupAddMed.php?id=<?php echo $id;?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>">
        Medicine: <select form="Form1" name="meds">
        <?php
            while($r1 = mysqli_fetch_assoc($q1)){?>
            <option form="Form1" value="<?php echo $r1['med_id'];?>"><?php echo $r1['med_name'];?></option>
    <?php
        }
    ?>
    </select>
    <input form="Form1" type="Submit" name="Submit" value="Add Medication">
    </form>

    <form id="Form2" method="POST" action="checkupAddLab.php?id=<?php echo $id;?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>">
    Lab: <select form="Form2" name="lab">
        <?php
            while($r2 = mysqli_fetch_assoc($q2)){?>
            <option form="Form2" value="<?php echo $r2['lab_id'];?>"><?php echo $r2['lab_name'];?></option>
    <?php
        }
    ?>
    </select>
    <input form="Form2" type="Submit" name="Submit" value="Add Lab">
    </form>
</div>

<br>

<br>
<div>
<form id="Form3" method="POST" action="checkupForm_confirm.php?id=<?php echo $id;?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>">
<div>
<?php
         $x = 0; 
    while($r3 = mysqli_fetch_assoc($q3)){
      $x++;
   //get med id for med name
   $medid = $r3['med_id'];  
    //get medicine name
    $sql4 = "SELECT * FROM tbl_meds WHERE med_id = '$medid';";
    $q4 = mysqli_query($conn, $sql4) or die (mysqli_error($conn));
    $r4 = mysqli_fetch_assoc($q4);
	?> 	
    Medicine:    <?php echo $r4['med_name'];?> &nbsp;
	Medication: &nbsp;
    <input form="Form3" type="text" name="<?php echo 'medesc'.$x; ?>">
    <?php echo $x ?>

    <a href="cancelMed_confirm.php?id=<?php echo $id;?>&medid=<?php echo $r3['medic_id'];?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>" onclick="return  confirm('Do you want to remove <?php echo $r4['med_name']?>?')">Cancel</a><br>
<?php 
	}
	?>

</div>
<div>
<?php
         $y = 0; 
    while($r5 = mysqli_fetch_assoc($q5)){
      $y++;
   //get lab id for med name
   $labid = $r5['lab_id'];  
    //get lab name
    $sql = "SELECT * FROM tbl_lab WHERE lab_id = '$labid';";
    $q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    $r = mysqli_fetch_assoc($q);
	?> 	
    Lab:    <?php echo $r['lab_name'];?> &nbsp;
	Lab Result:	 &nbsp;
    <input form="Form3" type="text" name="<?php echo 'labdesc'.$y; ?>">
    <?php echo $y ?>

    <a href="cancelLab_confirm.php?id=<?php echo $id;?>&labid=<?php echo $r5['res_id'];?>&pat=<?php echo $pat;?>&doc=<?php echo $doc;?>" onclick="return  confirm('Do you want to remove <?php echo $r['lab_name']?>?')">Cancel</a><br>
<?php 
	}
	?>

</div>
Findings: <br><textarea  form="Form3" rows="5" cols="50" name="find" value="<?php echo isset($_POST['find']) ? $_POST['find'] : '' ?>" required/></textarea><br>
Observations: <br><textarea  form="Form3" rows="5" cols="50" name="obs" value="<?php echo isset($_POST['obs']) ? $_POST['obs'] : '' ?>" required/></textarea><br>
<input  form="Form3" type="Submit" name="Submit" value="Confirm">
</form>

</div>-->