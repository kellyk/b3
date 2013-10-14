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
			</form>

	</div>
<?php include_once('views/global/footer.php'); ?>