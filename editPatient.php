<?php
    $id = $_GET['id'];

	$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
	$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_patient where pat_id = '$id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);
$sex = $r['pat_gender'];
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
<form method="post" action="editPatient_confirm.php?id=<?php echo $id;?>">

	<div class=" d-flex flex-row justify-content-around align-content-center" style="width: 100%; border: 0px solid red;">
	<div class="card w-75 border-info mb-6" style="margin-right: 10px; ">
		<div class="card-header d-flex justify-content-between align-items-center">
		<div>EDIT PROFILE</div>
	
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">First Name:</h5>
            <p class="card-text w-50"><input type="text" name="fname" class="form-control" value="<?php echo $r['pat_FName'];?>" required/></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Last Name:</h5>
            <p class="card-text w-50"><input type="text" name="lname" class="form-control" value="<?php echo $r['pat_LName'];?>" required/></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Gender:</h5>
            <select class="btn btn-outline-secondary dropdown-toggle w-50" name="sex" placeholder="select..." required>
			<?php
				if($sex == "M"){ ?>
				<option value="1">Male</option>
				<option value="2">Female</option>
				<?php }
				else if($sex == "F"){ ?>
				<option value="2">Female</option>
				<option value="1">Male</option>
			<?php }
			?>
			</select>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Date of Birth:</h5>
            <p class="card-text w-50"><input type="date" class="form-control" name="bday" value="<?php echo $r['pat_birthday'];?>" required/></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Age:</h5>
            <p class="card-text w-50"><input type="number" class="form-control" name="age" value="<?php echo $r['pat_age'];?>" required/></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Bloodtype:</h5>
            <p class="card-text w-50"><input type="text" class="form-control" name="blood" value="<?php echo $r['pat_bloodtype'];?>" required/></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Description/History:</h5>
            <p class="card-text w-50"><textarea  class="form-control" rows="5" cols="30" name="desc" required/><?php echo $r['pat_desc'];?></textarea></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Contact Number:</h5>
            <p class="card-text w-50"><input class="form-control" type="number" name="num" value="<?php echo $r['pat_number'];?>" required/></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
            <h5 class="card-title">Email:</h5>
            <p class="card-text w-50"><input class="form-control" type="email" name="email" value="<?php echo $r['pat_email'];?>" required/></p>
		</div>
		<div class="empty-small"></div>
		<div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
		<input class="btn btn-info btn-lg btn-block" type="Submit" name="Submit" value="Save changes">
		</div>
	</div>
</form>