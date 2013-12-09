<?php include_once('views/global/header.php'); ?>
<h3>Confirm Order</h3><br />
<?php
if ($error_message) {
	echo '<div class="alert alert-danger">' . $error_message . '</div>';
}
?>
	<div class="row">
		<div class="col-xs-12 col-lg-3">
		<h4>Shipping Address</h4>
			<p>
				<?php echo "{$user['first_name']} {$user['last_name']}"?> <br />
				<?php echo $user['address']?><br />
				<?php echo "{$user['city']}, {$user['state']} {$user['zip']}"?><br />
			</p>
		</div>
		<div class="col-xs-12 col-lg-3">
			<h4>Credit Card</h4>
			<form action="<?php echo SITE_ROOT ?>cart/submit" method="POST">
				<input type="radio" name="credit-card" value="existing" checked>Use existing ending in *<?php echo $user['ccnumber']?><br>
				<input type="radio" name="credit-card" value="new">Use different card
		</div>
		<div class="col-xs-12 col-lg-3">
				<div class="newCreditCard">
					<div class="form-group">
					    <select class="form-control" name="cc-type">
					    	<option value="VISA">Visa</option>
					    	<option value="MasterCard">Mastercard</option>
					    	<option value="American Express">American Express</option>
					    	<option value="Discover">Discover</option>
					    </select>
					</div>
				    <div class="form-group">
					    <input name="new-cc-number" type="text" class="form-control" placeholder="ex. 1234 5678 9012 3456">
					</div>
					</div>
				</div><!-- end hidden -->
		</div>
	</div> <!-- end row -->
	<?php
		if (isset($data['books'])) {
	?>

	<div class="row">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<th>Title</th>
				<th>Author</th>
				<th>Publish Date</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Price</th>
			</tr>
			<?php
			// iterate through books array and display in cart
			foreach ($data['books'] as $book) {
				echo '<tr><td>' . $book['isbn'] . '</td>';
				echo '<td>' . $book['title'] . '</td>';
				echo '<td>' . $book['first_name'] . ' ' . $book['last_name'] . '</td>';
				echo '<td>' . $book['year_published'] . '</td>';
				echo '<td>' . $book['quantity'] . '</td>';
				echo '<td>' . $book['price'] . '</td>';
				echo '<td>' . $book['total'] . '</td></tr>';
			}
			?>

			<tr>
				<td colspan="6" class="right-align">Subtotal</td>
				<td><?php echo $data['total']; ?></td>
			</tr>
			<tr>
				<td colspan="6" class="right-align">Shipping</td>
				<td>$<?php echo $data['num_books'] * 2; ?>.00</td>
			</tr>
			<tr>
				<td colspan="6" class="right-align">Total</td>
				<td><?php echo $data['total'] + ($data['num_books'] * 2); ?></td>
			</tr>
		</table>
		<div class="cart-controls pull-right">
			<input type="submit" value="Place Order" class="btn btn-lg btn-success" />
		</div>
	</form>
		<?php } ?>
	</div>
<?php include_once('views/global/footer.php'); ?>