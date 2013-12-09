<?php 
	$user = $args['user'];
?>
<div>
	<form role="form">
		<div class="form-group">
			<label for="username">Username:</label>
			<input class="form-control" type="text" id="username_disabled" value="<?php echo $user[username]; ?>" disabled />
			<input type="hidden" id="username" name="username" value="<?php echo $user[username]; ?>" />
			<label for="newPin">New PIN:</label>
			<input class="form-control" type="password" id="newPin" name="newPin" value="*****" />
			<label for="retypePin">Retype New Pin:</label>
			<input class="form-control" type="password" id="retypePin" name="retypePin" value="*****" />
			<label for="fName">First Name: </label>
			<input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $user['first_name']; ?>" />
			<label for="lName">Last Name: </label>
			<input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $user['last_name']; ?>" />
			<label for="address">Address:</label>
			<input class="form-control" type="text" name="address" id="address" value="<?php echo $user['address']; ?>" />
			<label for="city">City: </label>
			<input class="form-control" type="text" name="city" id="city" value="<?php echo $user['city']; ?>" />
			<label for="state">State: </label>
			<input class="form-control" type="text" name="state" id="state" value="<?php echo $user['state']; ?>" />
			<label for="zip">Zip Code:</label>
			<input class="form-control" type="text" name="zip" id="zip" value="<?php echo $user['zip']; ?>" />
			<label for"hireDate">Hire Date: </label>
			<input class="form-control" type="text" name="hire_date" id="hireDate" value="<?php echo $user['hire_date']; ?>" disabled />
			<input type="hidden" name="hire_date" id="hire_date" value="<?php echo $user['hire_date']; ?>" />
		</div>
	</form>
</div>
