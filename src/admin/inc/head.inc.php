<?php

/*This will ensure that once the user has logged out, the querystring is removed so that a user can log in again*/
if(isset($_GET['logout'])){
	$url = $_SERVER['REQUEST_URI'];
	$parts = parse_url($url);
	$url = $parts['path'];
	header("Location:$url");
}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Music Store</title>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap-theme.css">
	<link rel="stylesheet" href="../../styles/applicationStyle.css">
</head>
<body>
<div class="navbar navbar-inverse navbar-static-top" id="navBar">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span>
				Home</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="navButtons navbar-right">
				<li>
					<a class="btn btn-primary navbar-btn"
					   href="all_record_companies.php"
					   id="navButton1">Record Companies</a>
					<a class="btn btn-success navbar-btn" href="all_artists.php"
					   id="navButton2">Artists</a>
					<a class="btn btn-warning navbar-btn" href="all_albums.php"
					   id="navButton3">Albums</a>
					<?php
						if(!LoggedIn()){
							echo "<button class='btn btn-danger' id='loginButton'>Login</button>";
						} else{
							echo "<a class='btn btn-danger' href='".$_SERVER['PHP_SELF']."?logout=1'>Logout</a>";
						}
					?>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="jumbotron text-center" id="jumbo">
	<h1>Welcome to the Music Store</h1>
</div>
<div class="hidden" id="loginDiv">
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-inline" role="form">
		<div class="form-group">
			<label class="sr-only" for="uname">label</label>
			<input type="text" class="form-control" name="uname" id="uname" placeholder="Username">
		</div>
		<div class="form-group">
			<div class="form-group">
				<label for="password" class="sr-only">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<div class="container">