<?php
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_lab
			WHERE lab_id = $id";
	include("dbconnect.php");
	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$r = mysqli_fetch_assoc($q);
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
<form action = "lab/editlab_confirm.php?id=<?php echo $id;?>"method="POST">
	<div class=" d-flex flex-row justify-content-around align-content-center" style="width: 100%; border: 0px solid red;">
	<div class="card w-75 border-info mb-6" style="margin-right: 10px; ">
		<div class="card-header d-flex justify-content-between align-items-center">
		<div>EDIT LABORATORY</div>
	
		</div>
		<div class="empty-small"></div>
		<div class="d-flex flex-row justify-content-between align-content-center card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
			<h5 class="card-title">Laboratory Name:</h5>
            <p class="card-text w-50"><input class="form-control" type="text" name="labname" value = "<?php echo $r['lab_name'];?>" required/></p>
		
		</div>
	
		<div class="empty-small"></div>
		<div class="empty-small"></div>
		<div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
		<input class="btn btn-info btn-md btn-block" type="Submit" name="submit" value="Edit">
		</div>
	</div>
</form>
