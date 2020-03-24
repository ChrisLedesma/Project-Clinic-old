
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
<form method ="POST" action="doc/adddoc_confirm.php">
	<div class=" d-flex flex-row justify-content-around align-content-center" style="width: 100%; border: 0px solid red;">
	<div class="card w-50 border-info mb-6" style="margin-right: 10px; ">
		<div class="card-header d-flex justify-content-between align-items-center">
		<div>ADD DOCTOR</div>
	
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
		<h5 class="card-title">First Name:</h5>
		<p class="card-text"><input type="text" class="form-control" name="fname"></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
		<h5 class="card-title">Last Name:</h5>
		<p class="card-text"><input  type="text" name="lname" class="form-control"></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
		<h5 class="card-title">Date of Birth:</h5>
		<p class="card-text"><input type="date" name="birthday" class="form-control"></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
		<h5 class="card-title">Age:</h5>
		<p class="card-text"><input type="text" name="age" class="form-control"></p>
		</div>
		<div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
		<h5 class="card-title">Contact Number:</h5>
		<p class="card-text"><input type="text" name="contact"class="form-control" ></p>
		</div>
		<div class="empty-small"></div>
		<div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
		<input class="btn btn-info btn-lg btn-block" type="Submit" name="submit" value="Add Doctor">
		</div>
	</div>
</form>