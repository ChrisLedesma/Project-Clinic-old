<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('sql12.freemysqlhosting.net', 'sql12329213', 'h6l6PqIgFp', 'sql12329213');


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
        $query = "SELECT * FROM tbl_user WHERE use_email='$username' AND use_password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) > 0) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination"); 
        }
    }
  }
  
  ?>
