<?php include_once('views/global/header.php'); ?>

<div class = "row col-xs-5">
	<h2>Register!</h2>
	<form role="form">
	  	<div class="form-group">
	    	<label for="username">Username</label>
	    	<input type="text" class="form-control" id="username" placeholder="Enter username">
	  	</div>
	  	<div class="form-group">
		    <label for="pin">Pin</label>
		    <input type="pin" class="form-control" id="pin" placeholder="Pin">
		</div>
		<div class="form-group">
		    <label for="verifyPin">Retype Pin</label>
		    <input type="verifyPin" class="form-control" id="verifyPin" placeholder="Pin">
		</div>
		<div class="form-group">
		    <label for="fName">First Name</label>
		    <input type="fName" class="form-control" id="fName" placeholder="John">
		</div>
		<div class="form-group">
		    <label for="lName">Last Name</label>
		    <input type="lName" class="form-control" id="lName" placeholder="Smith">
		</div>
		<div class="form-group">
		    <label for="address">Address</label>
		    <input type="address" class="form-control" id="address" placeholder="123 Main St.">
		</div>
		<div class="form-group">
		    <label for="city">City</label>
		    <input type="text" class="form-control" id="city" placeholder="Ann Arbor">
		</div>
		<button type="submit" class="btn btn-success">Sign up</button>
	</form>
</div>
<?php include_once('views/global/footer.php'); ?>