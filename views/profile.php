<?php include_once('views/global/header.php'); ?>

<h2>Hello, Kelly!</h2>
<h4 class="text-muted">To update your profile, update the fields below and click save.</h4><br />
	<form role="form" >
		<div class = "row col-md-5">
		  	<div class="form-group">
		    	<label for="username">Username</label>
		    	<input type="text" class="form-control" id="username" value="kellyk">
		  	</div>
		  	<div class="form-inline">
			  	<div class="form-group">
				    <label for="pin">Pin</label>
				    <input type="pin" class="form-control" id="pin" value="****" required />
				</div>
				<div class="form-group">
				    <label for="verifyPin">Verify pin</label>
				    <input type="verifyPin" class="form-control" id="verifyPin" value="****" required />
				</div>
			</div><br />
			<div class="form-group">
			    <label for="fName">First Name</label>
			    <input type="fName" class="form-control" id="fName" value="Kelly">
			</div>
			<div class="form-group">
			    <label for="lName">Last Name</label>
			    <input type="lName" class="form-control" id="lName" value="King">
			</div>
			<div class="form-group">
			    <label for="address">Address</label>
			    <input type="address" class="form-control" id="address" value="922 W. Maple St.">
			</div>
			<div class="form-group">
			    <label for="city">City</label>
			    <input type="text" class="form-control" id="city" value="Ann Arbor">
			</div>
			<div class="form-inline">
				<div class="form-group">
				    <label for="state">State</label>
				    <select type="text" class="form-control" id="state">
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
						<option value="MI" selected="selected">Michigan</option>
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
				    </select>
				</div>
				<div class="form-group">
				    <label for="zip">Zip Code</label>
				    <input type="text" class="form-control" value="48103" id="zip">
				</div>
			</div>
		</div>
		<div class = "row col-md-1"></div>
		<div class = "row col-md-6">
			<div class="form-group">
			    <label for="cc-type">Credit Card</label>
			    <select class="form-control" id="cc-type">
			    	<option value="visa">Visa</option>
			    	<option value="mastercard">Mastercard</option>
			    	<option value="discover">Discover</option>
			    </select>
			</div>
		    <div class="form-group">
			    <label for="cc-number">Number</label>
			    <input type="text" class="form-control" id="cc-number" value="**** **** **** 3456">
			</div>
			<div class="form-inline">
				<div class="form-group">
				    <label for="cc-month">Month</label>
				    <select class="form-control" id="cc-month">
				    	<option value="1">Jan</option>
				    	<option value="2">Feb</option>
				    	<option value="3" selected="selected">Mar</option>
				    </select>
				</div>
				<div class="form-group">
				    <label for="cc-year">Year</label>
				    <select class="form-control" id="cc-year">
				    	<option value="2013">2013</option>
				    	<option value="2014">2014</option>
				    	<option value="2015">2015</option>
				    	<option value="2016" selected="selected">2016</option>
				    	<option value="2017">2017</option>
				    	<option value="2018">2018</option>
				    </select>
				</div>
			</div> <br />
			<div class="form-group">
				<button type="submit" class="btn btn-lg btn-success">Save</button>
			</div>
			</div>
		</div>
	</form>
<?php include_once('views/global/footer.php'); ?>