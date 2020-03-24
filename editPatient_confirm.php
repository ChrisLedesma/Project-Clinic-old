
<?php
    $id = $_GET['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sex= $_POST['sex'];
	$bday = $_POST['bday'];
	$age = $_POST['age'];
    $blood = $_POST['blood'];
    $desc = $_POST['desc'];
    $num = $_POST['num'];
    $email = $_POST['email'];

    $conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12329213", "h6l6PqIgFp") or die (mysqli_error($conn));
    $db = mysqli_select_db($conn, "sql12329213");
    
    if($sex == 1){
        $sql="UPDATE tbl_patient
        SET pat_FName = '$fname', pat_LName = '$lname', pat_gender = 'M', pat_birthday ='$bday', pat_age ='$age', pat_bloodtype ='$blood', pat_desc = '$desc', pat_number = '$num', pat_email = '$email'
        WHERE pat_id ='$id';";
        $q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
        header("location:index.php?page=viewPatient&id=".$id);
    }else if($sex == 2){
        $sql="UPDATE tbl_patient
        SET pat_FName = '$fname', pat_LName = '$lname', pat_gender = 'F', pat_birthday ='$bday', pat_age ='$age', pat_bloodtype ='$blood', pat_desc = '$desc', pat_number = '$num', pat_email = '$email'
        WHERE pat_id ='$id';";
        $q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
        header("location:index.php?page=viewPatient&id=".$id);
    }

?>