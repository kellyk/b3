<?php include_once('views/global/header.php'); ?>

<div class = "row col-md-5">
	<h3>Login</h3>
	<form role="form">
	  	<div class="form-group">
	    	<label for="username">Username</label>
	    	<input type="text" class="form-control" id="username" placeholder="Enter username">
	  	</div>
	  	<div class="form-group">
		    <label for="pin">Pin</label>
		    <input type="pin" class="form-control" id="pin" placeholder="Pin">
		</div>
		<!--This button auto forwards temporarily until we have users.
			Later we will authenticate and redirect as appropriate -->
		<a href="<?php echo SITE_ROOT; ?>search" class="btn btn-primary">Sign in</a>
	</form>
</div>
<div class = "row col-md-1"></div>
<div class = "row col-md-5">
	<h3>Not a member yet?</h3>
	<a href="<?php echo SITE_ROOT; ?>profile/register"><button class="btn-lg btn-success">Register</button></a>
</div>
<div class="clearfix"></div>

<?php include_once('views/global/footer.php'); ?>