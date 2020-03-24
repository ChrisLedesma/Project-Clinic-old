<?php
$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
$db = mysqli_select_db($conn, "sql12329213");
$sql = "SELECT * FROM tbl_meds";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));


if(isset($search)){
    $search = $_POST['search'];
}

if(isset($search))
	$sql = "SELECT * FROM tbl_meds WHERE med_name LIKE '%$search%' ";
else 
	$sql = "SELECT * FROM tbl_meds";
	
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

?>
<form method = "POST" action="medList.php">
	Search: <input type="text" name="search">
	<input type="submit" name="submit" value="Search">
	
</form>
<table>
	
	<tr>
		<td>Med_ID</td>
		<td>Medicine Name</td>
	</tr>
	
<?php
	while($r = mysqli_fetch_assoc($q))
	{
	?> 
	
	<tr>
		<td><?php echo $r['med_id'];?></td>
		<td><?php echo $r['med_name'];?></td>
	</tr>
<?php 
	}
	?>
	
	</table>