<?php include_once('views/global/header.php'); ?>

	<h3>Register!</h3>
		<div class="row">
		<?php 
			if ($error_message) {
				echo '<div class="alert alert-danger">' . $error_message. '</div>';
			}
		?>
		<form role="form" method="POST" action="<?php echo SITE_ROOT ?>profile/register">
			<div class="col-lg-5">
			  	<div class="form-group">
			    	<input type="text" name="username" class="form-control" placeholder="Username" required />
			  	</div>
			  	<div class="form-group">
				   <input type="text" name="pin" class="form-control" placeholder="Pin (digits only)" required />
				</div>
				<div class="form-group">
				    <input type="text" name="repin" class="form-control" placeholder="Verify Pin" required />
				</div>
				<div class="form-group">
				    <input type="text" name="firstname" class="form-control" placeholder="First Name" required />
				</div>
				<div class="form-group">
				    <input type="text" name="lastname" class="form-control" placeholder="Last Name" required />
				</div>
				<div class="form-group">
				    <input type="text" name="street" class="form-control" placeholder="Street" required />
				</div>
				<div class="form-group">
				    <input type="text" name="city" class="form-control" placeholder="City" required />
				</div>
				<div class="form-group">
				    <select type="text" name="state" class="form-control">
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
				    </select><br />
				    <input type="text" name="zip" class="form-control" placeholder="Zip Code" required />
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
				<div class="form-group">
				    <label for="cc-type">Credit Card</label>
				    <select name="card_type" class="form-control">
				    	<option value="visa">Visa</option>
				    	<option value="mastercard">Mastercard</option>
				    	<option value="discover">Discover</option>
				    </select>
				</div>
			    <div class="form-group">
				    <label for="cc-number">Number</label>
				    <input type="text" name="card_number" class="form-control" id="cc-number" placeholder="ex. 1234 5678 9012 3456" required />
				</div>
				<div class="form-group">
				    <label for="cc-month">Month</label>
				    <select class="form-control" name="card_month">
				    	<option value="1">Jan</option>
				    	<option value="2">Feb</option>
				    	<option value="3">Mar</option>
				    </select>
				</div>
				<div class="form-group">
				    <label for="cc-year">Year</label>
				    <select class="form-control" name="card_year">
				    	<option value="2014">2014</option>
				    	<option value="2015">2015</option>
				    	<option value="2016">2016</option>
				    	<option value="2017">2017</option>
				    	<option value="2018">2018</option>
				    </select>
				</div>
				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-lg btn-success" />
				</div>
			</div>
		</form>

		</div>

<?php include_once('views/global/footer.php'); ?>