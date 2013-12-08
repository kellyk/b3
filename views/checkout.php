<?php include_once('views/global/header.php'); ?>
<h3>Confirm Order</h3><br />

	<div class="row col-md-3">
		<h4>Shipping Address</h4>
			<p>
				Kelly King <br />
				922 W. Maple St. <br />
				Ann Arbor, MI 48103
			</p>

	</div>
	<div class="row col-md-3">
		<h4>Credit Card</h4>
			<form>
				<input type="radio" name="credit-card" value="existing">Use existing ending in *3456<br>
				<input type="radio" name="credit-card" value="new">Add new card
				<div class="newCreditCard hidden">
					<div class="row col-md-6">
			<div class="form-group">
			    <label for="cc-type">Type</label>
			    <select class="form-control" id="cc-type">
			    	<option value="visa">Visa</option>
			    	<option value="mastercard">Mastercard</option>
			    	<option value="discover">Discover</option>
			    </select>
			</div>
		    <div class="form-group">
			    <label for="cc-number">Number</label>
			    <input type="text" class="form-control" id="cc-number" placeholder="ex. 1234 5678 9012 3456">
			</div>
			<div class="form-inline">
				<div class="form-group">
				    <label for="cc-month">Month</label>
				    <select class="form-control" id="cc-month">
				    	<option value="1">Jan</option>
				    	<option value="2">Feb</option>
				    	<option value="3">Mar</option>
				    </select>
				</div>
				<div class="form-group">
				    <label for="cc-year">Year</label>
				    <select class="form-control" id="cc-year">
				    	<option value="2013">2013</option>
				    	<option value="2014">2014</option>
				    	<option value="2015">2015</option>
				    	<option value="2016">2016</option>
				    	<option value="2017">2017</option>
				    	<option value="2018">2018</option>
				    </select>
				</div>
			</div> <br />
			<div class="form-group">
				<button type="submit" class="btn btn-lg btn-success">Sign up</button>
			</div>
				</div>
			</form>

	</div>
<?php include_once('views/global/footer.php'); ?>