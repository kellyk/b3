<?php include_once('views/global/header.php'); ?>

<div class = "row col-xs-5">
	<h3>Administrator Login</h3>
	<form role="form">
	  	<div class="form-group">
	    	<label for="username">Username</label>
	    	<input type="text" class="form-control" id="username" placeholder="Enter username">
	  	</div>
	  	<div class="form-group">
		    <label for="pin">Pin</label>
		    <input type="pin" class="form-control" id="pin" placeholder="Pin">
		</div>
		<button type="submit" class="btn btn-primary">Sign in</button>
	</form>
</div>

<div class="clearfix"></div>

<?php include_once('views/global/footer.php'); ?>