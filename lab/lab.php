<?php 
$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_lab";
$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

if(isset($_POST['search'])){
$search = $_POST['search'];
}
if(isset($search))
		$sql = "SELECT * FROM tbl_lab WHERE lab_name LIKE '%$search%'";
	else
		$sql= "SELECT * FROM tbl_lab;";

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
			<form method="POST" action="index.php?page=lab">
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
<div class="header"><h1>LABORATORY LIST</h1></div>
<div class="empty-small"></div>
<div class="button-here">
    <form method ="POST" action="index.php?page=addLab">
        <input class="btn btn-info" type="Submit" name="submit" value="Add Laboratory">
    </form>
</div>
<br><br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Laboratory</th>
	  <th scope="col"></th>
	  <th scope="col"></th>
    </tr>
  </thead>
<?php
while($r = mysqli_fetch_assoc($q))
{
?>
	<tr>
		<td><?php echo $r['lab_name'];?></td>
		<td><a href="index.php?page=editLab&id=<?php echo $r['lab_id'];?>"><button class="btn btn-outline-success">EDIT</button></a></td>
		<td><a href="lab/deletelab_confirm.php?id=<?php echo $r['lab_id'];?>&name=<?php echo $r['lab_name'];?>" onclick="return  confirm('Do you want to delete <?php echo $r['lab_name'];?>?')"><button class="btn btn-outline-danger">DELETE</button></a></td>
	</tr>
<?php
}
?>
</table>
