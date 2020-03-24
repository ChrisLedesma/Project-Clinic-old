<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Log in</title>
	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi|Rubik&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div id="content1">
		<div class="header"><h1>LOG-IN</h1></div>
		<div class="empty-small"></div>
		<div class="empty-small"></div>
		<form method="post" action="login.php">			
			<div class=" d-flex flex-row justify-content-around align-items-center" style="width: 30vw; border: 0px solid red;">
			<div class="card w-100 border-info mb-6" style="margin-right: 10px; ">
				<div class="card-header d-flex justify-content-between align-items-center">
				<div>Enter your credentials below</div>
			
				</div>
				<div class="row justify-content-center card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
					<h5 class="card-title">Email Address:</h5>
					<p class="card-text"><input type="email" name="username" class="form-control w-100"></p>
				</div>
				<div class="row justify-content-center card-body text-info" style="padding: 2vw 5vw 0vw 5vw;">
					<h5 class="card-title">Password:</h5>
					<p class="card-text"><input type="password" name="password" class="form-control"></p>
				</div>
				<div class="empty-small"></div>
				<div class="row justify-content-around card-body text-info" style="padding: 0vw 5vw 5vw 5vw;">
				<input class="btn btn-info btn-lg" type="submit" name="login_user" value="Log in">
				</div>
			</div>
		</form>			
	</div>
	<p><?php include('errors.php'); ?></p>
</body>
</html>