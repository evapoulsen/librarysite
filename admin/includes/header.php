<?php
require_once('../conn.php');
if(isset($_SESSION['admin_id'])) {
	$logout = 'Logout';
	$author = 'Authors';
	$publisher = 'Publishers';
	$book = 'Books';
	$user = 'Users';
	$cl = '';
}
else {
	$logout = 'Login';
	$author = '';
	$publisher = '';
	$book = '';
	$user = '';
	$cl = 'nodisplay';
}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>MyLibrary Administration System</title>
		<!--Google Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Dosis|Exo+2|Hind+Siliguri" rel="stylesheet">
		<!-- Bootstrap core CSS -->
		<link href="../styles/bootstrap.css" rel="stylesheet" type="text/css">
		<!-- Custom styles for this template -->
		<link href="../styles/scrolling-nav.css" rel="stylesheet" type="text/css">
		<link href="../styles/style.css" rel="stylesheet" type="text/css"> </head>

	<body id="page-top">
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="../images/icon1.png" class="logo"><span class="yellow1">My</span><span class="blue1">Library</span> <span class="admin">Admin</span></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown <?php echo $cl; ?>"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $author; ?></a>
							<div class="dropdown-menu"> <a class="dropdown-item" href="#">View Authors</a> <a class="dropdown-item" href="#">Add Author</a> <a class="dropdown-item" href="#">Edit Author</a> </div>
						</li>
						<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Publishers</a>
							<div class="dropdown-menu"> <a class="dropdown-item" href="#">View Publishers</a> <a class="dropdown-item" href="#">Add Publisher</a> <a class="dropdown-item" href="#">Edit Publisher</a> </div>
						</li>
						<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Genres</a>
							<div class="dropdown-menu"> <a class="dropdown-item" href="#">View Genres</a> <a class="dropdown-item" href="#">Add Genre</a> <a class="dropdown-item" href="#">Edit Genre</a> </div>
						</li>
						<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Books</a>
							<div class="dropdown-menu"> <a class="dropdown-item" href="#">View Books</a> <a class="dropdown-item" href="#">Add Book</a> <a class="dropdown-item" href="#">Edit Book</a> </div>
						</li>
						<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
							<div class="dropdown-menu"> <a class="dropdown-item" href="#">View Users</a> <a class="dropdown-item" href="#">Edit User</a> </div>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="logout.php">
							<?php echo $logout; ?>
						</a>
							</li>
					</ul>
				</div>
			</div>
		</nav>