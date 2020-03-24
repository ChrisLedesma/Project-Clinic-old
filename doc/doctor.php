<?php 
$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_lab";
$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

if(isset($_POST['search'])){
$search = $_POST['search'];
}
if(isset($search))
		$sql = "SELECT * FROM tbl_doctor WHERE doc_FName LIKE '%$search%' OR doc_LName LIKE '%$search%'";
	else
		$sql= "SELECT * FROM tbl_doctor;";

$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #B8CDDB;">
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
			<form method="POST" action="index.php?page=doc">
      <div class="d-flex flex-row ">
				    <input type="text" class="form-control" name="search">
				    <div>&nbsp;&nbsp;</div>
                <div><input type="submit" class="btn btn-info" name="submit" value="Search"></div>
                </div>
			</form>
            </ul>
        </div>
    </div>
</nav>
<div class="header"><h1>DOCTOR LIST</h1></div>
<div class="empty-small"></div>
<div class="button-here">
    <form method ="POST" action="index.php?page=addDoc">
      <input class="btn btn-info" type="Submit" name="submit" value="Add Doctor">
    </form>
</div>
<br><br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
    </tr>
  </thead>	
<?php
while($r = mysqli_fetch_assoc($q))
{
?>
	<tr>
		<td><a class="btn btn-outline-dark" href ="index.php?page=viewDoc&id=<?php echo $r['doc_id']; ?>"><?php echo $r['doc_FName']." ".$r['doc_LName']; ?> </a></td>
		<td> <?php echo $r['doc_age'];?> </td>
	</tr>
<?php
}
?>
</table>
