<?php
	$id = $_GET['id'];
	$fname = $_GET['fname']
?>
ARE YOU SURE TO DELETE <?php echo "$fname"?>
<form action = "deletedoc_confirm.php?id=<?php echo $id;?>" method="POST">
	<input type = "submit" name="submit" value = "YES">
</form>
<form action = "doctor.php">
	SUBMIT
</form>