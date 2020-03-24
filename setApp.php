<?php
$id = $_GET['id'];

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_patient where pat_id = '$id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);

$sql1 = "SELECT * FROM tbl_doctor";
$q1 = mysqli_query($conn,$sql1) or die (mysqli_error($conn));
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
<form method="post" action="setApp_confirm.php?id=<?php echo $id;?>">
	<div class=" d-flex flex-row justify-content-around align-content-center" style="width: 100%; border: 0px solid red;">
	<div class="card w-50 border-info mb-6" style="margin-right: 10px; ">
		<div class="card-header d-flex justify-content-between align-items-center">
		<div>SET APPOINTMENT</div>
	
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Name:</h5>
            <p class="card-text"><?php echo $r['pat_FName']." ".$r['pat_LName'] ;?></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Gender:</h5>
            <p class="card-text"><?php echo $r['pat_gender'];?></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Age:</h5>
            <p class="card-text"><?php echo $r['pat_age'];?></p>
        </div>
        <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Doctor:</h5>
            <select name="doctor"  class="btn btn-outline-secondary dropdown-toggle" required>
                <?php
                    while($r1 = mysqli_fetch_assoc($q1)){?>
                    <option value="<?php echo $r1['doc_id'];?>"><?php echo $r1['doc_FName']." ".$r1['doc_LName'];?></option>
            <?php
                }
            ?>
            </select>
		</div>
		<div class="empty-small"></div>
		<div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
		<input class="btn btn-info btn-lg btn-block" type="Submit" name="Submit" value="Add Appointment">>
		</div>
	</div>
</form>