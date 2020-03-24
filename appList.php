<?php

$date = Date("Y-m-d");

$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_appointment WHERE app_date = '$date';";
$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
$r = mysqli_fetch_assoc($q);

if(isset($_POST['search'])){
$search = $_POST['search'];
}
if(isset($search))
		$sql = "SELECT * FROM tbl_appointment WHERE app_id LIKE '%$search%' AND app_date='$date'";
	else
		$sql= "SELECT * FROM tbl_appointment WHERE app_date = '$date';";

$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #C2DAE8;">
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
            <form method="POST" action="index.php?page=app">
            <div class="d-flex flex-row ">
				    <input type="text" class="form-control" name="search">
				    <div>&nbsp;&nbsp;</div>
                <div><input type="submit" class="btn btn-info" name="submit" value="Search"></div>
           </form>
            </ul>
        </div>
    </div>
</nav>
<div class="header"><h1>APPOINTMENTS</h1></div>
<br><br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th class="th-sm" scope="col">Appointment</th>
      <th class="th-sm" scope="col">Patient</th>
      <th class="th-sm" scope="col">Doctor</th>
      <th class="th-sm" scope="col"></th>
      <th class="th-sm" scope="col"></th>
    </tr>
  </thead>	
<?php
	while($r = mysqli_fetch_assoc($q))
	{
        $id = $r['pat_id'];
        $doc = $r['doc_id'];
        $sql1 = "SELECT * FROM tbl_patient where pat_id = '$id'";
        $q1 = mysqli_query($conn,$sql1) or die (mysqli_error($conn));
        $r1 = mysqli_fetch_assoc($q1);

        $sql2 = "SELECT * FROM tbl_doctor where doc_id = '$doc'";
        $q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
        $r2 = mysqli_fetch_assoc($q2);

	?> 
	
	<tr>
		<td><?php echo $r['app_id'];?></td>
        <td><?php echo $r1['pat_FName']." ".$r1['pat_LName'];?></td>
		<td><?php echo $r2['doc_FName']." ".$r2['doc_LName'];?></td>
        <td><a href="index.php?page=checkUp&id=<?php echo $r['app_id'];?>&pat=<?php echo $r['pat_id'];?>&doc=<?php echo $r['doc_id'];?>"><button class="btn btn-outline-success">CONFIRM</button></a></td>
        <td><a href="cancelApp_confirm.php?id=<?php echo $r['app_id'];?>" onclick="return  confirm('Do you want to cancel <?php echo $r1['pat_LName']?> appointment?')"><button class="btn btn-outline-secondary">CANCEL</button></a></td>
	</tr>
<?php 
	}
	?>
	
	</table>
	