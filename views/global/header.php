<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>B3</title>
	<link rel="stylesheet" href="<?php echo SITE_ROOT_PUBLIC; ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo SITE_ROOT_PUBLIC; ?>/css/style.css" />
	<script src="<?php echo SITE_ROOT_PUBLIC; ?>/scripts/jquery.js"></script>
	<script src="<?php echo SITE_ROOT_PUBLIC; ?>/scripts/bootstrap.min.js"></script>
	<script src="<?php echo SITE_ROOT_PUBLIC; ?>/scripts/main.js"></script>

</head>
<body>
<div class="container">
	<div class="page-header">
	  	<h1>Best Book Buy <small>for all your textbook needs</small></h1>
		<?php if(!$_SESSION['logged_in']) { ?>
		<a href="<?php echo SITE_ROOT; ?>admin/login">
			<button id="adminLogin" class="btn btn-primary pull-right">Admin Login</button>
		</a>
		<?php } ?>
 		<button data-toggle="tooltip" title="temp dev tool.. click and refresh to simulate first visit"
 			id="clearStorage" class="btn btn-default pull-right" onclick="localStorage.clear(); return false;"
 			style="margin-right:20px">Clear Local Storage
 		</button>

	</div>
	<nav>
		<ul class="main-nav nav nav-tabs pull-down">
			<?php if (!$_SESSION['administrator']) { ?>
			<li><a href="<?php echo SITE_ROOT; ?>search">Search</a></li>
			<li><a href="<?php echo SITE_ROOT; ?>cart">Cart</a></li>
			<?php } ?>
			<?php if (!$_SESSION['logged_in']) { ?>
			<li><a href="<?php echo SITE_ROOT; ?>login">Login / Register</a></li>
			<?php } else { ?>
			<li><a href="">Hello, <?php echo $_SESSION['username']; ?></a></li>
			<li><a href="<?php echo SITE_ROOT; ?>login/logout">Logout</a></li>
			<?php } ?>
		</ul>
	</nav>

	<div class="container pull-down">

