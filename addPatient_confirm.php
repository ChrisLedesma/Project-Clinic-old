
<?php
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
        $sql="INSERT INTO tbl_patient(pat_FName, pat_LName, pat_gender, pat_birthday, pat_age, pat_bloodtype, pat_desc, pat_number, pat_email)
        VALUES('$fname', '$lname','M', '$bday', '$age', '$blood','$desc', '$num', '$email')";
        $q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
        header("location:index.php?page=pat");
    }else if($sex == 2){
        $sql="INSERT INTO tbl_patient(pat_FName, pat_LName, pat_gender, pat_birthday, pat_age, pat_bloodtype, pat_desc, pat_number, pat_email)
        VALUES('$fname', '$lname','F', '$bday', '$age', '$blood','$desc', '$num', '$email')";
        $q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
        header("location:index.php?page=pat");
    }

?>