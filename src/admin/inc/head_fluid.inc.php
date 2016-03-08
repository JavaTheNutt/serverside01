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
					<a class="btn btn-danger navbar-btn" href="all_artists.php"
					   id="navButton2">Artists</a>
					<a class="btn btn-warning navbar-btn" href="all_albums.php"
					   id="navButton3">Albums</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="jumbotron text-center" id="jumbo">
	<h1>Welcome to the Music Store</h1>
</div>
<div class="container-fluid">