<?php
	$id = $_GET['id'];
	$medname = $_GET['medname']
?>
ARE YOU SURE TO DELETE <?php echo "$medname"?>
<form action = "deletemeds_confirm.php?id=<?php echo $id;?>" method="POST">
	<input type = "submit" name="submit" value = "YES">
</form>
<form action = "lab.php">
	SUBMIT
</form>