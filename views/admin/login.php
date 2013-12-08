<?php include_once('views/global/header.php'); ?>

<div class = "row col-md-5">
	<h3>Administrator Login</h3>
	<?php if ($message) { ?>
	<div class="error"><?php echo $message; ?></div>
	<?php } ?>
	<form action="<?php echo SITE_ROOT; ?>login/submit" role="form" method="POST">
	  	<div class="form-group">
		<input type="hidden" name="insure_admin" id="insure_admin" value="1">
	    	<label for="username">Username</label>
	    	<input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
	  	</div>
	  	<div class="form-group">
		    <label for="pin">Pin</label>
		    <input type="password" class="form-control" id="pin" name="pin" placeholder="Pin">
		</div>
		<input type="submit" class="btn btn-primary" value="Sign In">
	</form>
</div>

<div class="clearfix"></div>

<?php include_once('views/global/footer.php'); ?>
