<!-- <?php

$id = $_GET['id'];

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_doctor where doc_id = '$id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);
?>

<h1>Profile</h1>

<h4>Name: <br><?php echo $r['doc_FName']." ".$r['doc_LName'];?></h4><br>
<h4>Date of Birth: <br><?php echo $r['doc_birthday'];?></h4><br>
<h4>Age: <br><?php echo $r['doc_age'];?></h4><br>
<h4>Contact Number: <br><?php echo $r['doc_number'];?></h4><br>
<a href="index.php?page=editDoc&id=<?php echo $id;?>">Edit Profile</a>
<a href="doc/deletedoc_confirm.php?id=<?php echo $r['doc_id'];?>&name=<?php echo $r['doc_FName'];?>"

 -->
<?php

$id = $_GET['id'];

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_doctor where doc_id = '$id'";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));
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

<div class=" d-flex flex-row justify-content-around align-content-center" style="width: 100%; border: 0px solid red;">
  <div class="card w-50 border-info mb-6" style="margin-right: 10px; ">
    <div class="card-header d-flex justify-content-between align-items-center">
    <div>PROFILE</div>
  
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Name:</h5>
      <p class="card-text"><?php echo $r['doc_FName']." ".$r['doc_LName'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Date of Birth:</h5>
      <p class="card-text"><?php echo $r['doc_birthday'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Age:</h5>
      <p class="card-text"><?php echo $r['doc_age'];?></p>
    </div>
    <div class="row justify-content-between card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
      <h5 class="card-title">Contact Number:</h5>
      <p class="card-text"><?php echo $r['doc_number'];?></p>
    </div>
    <div class="empty-small"></div>
    <div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
      <div><button class="btn btn-info"><a href="index.php?page=editDoc&id=<?php echo $id;?>">EDIT PROFILE</a></button></div>
      <div><button class="btn btn-danger"><a href="doc/deletedoc_confirm.php?id=<?php echo $r['doc_id'];?>&name=<?php echo $r['doc_FName'];?>">DELETE</a></button></div>
    </div>
  </div>