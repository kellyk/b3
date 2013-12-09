<?php include_once('views/global/header.php'); ?>
<h3>Confirm Order</h3><br />

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
			<form>
				<input type="radio" name="credit-card" value="existing" checked>Use existing ending in *<?php echo $user['ccnumber']?><br>
				<input type="radio" name="credit-card" value="new">Use different card
		</div>
		<div class="col-xs-12 col-lg-3">
				<div class="newCreditCard">
					<div class="form-group">
					    <select class="form-control" id="cc-type">
					    	<option value="visa">Visa</option>
					    	<option value="mastercard">Mastercard</option>
					    	<option value="discover">Discover</option>
					    </select>
					</div>
				    <div class="form-group">
					    <input type="text" class="form-control" id="cc-number" placeholder="ex. 1234 5678 9012 3456">
					</div>
					</div>
				</div><!-- end hidden -->
			</form>
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
				echo '<td><form method="POST" action="' . SITE_ROOT . 'cart/update">' . 
					'<input type="hidden" name="isbn" value="' . $book['isbn'] . '" />'. 
					'<input type="number" name="quantity" class="small-input" min="0" value="' . $book['quantity']. '" disabled/>' .
					'</form></td>';
				echo '<td>' . $book['price'] . '</td>';
				echo '<td>' . $book['total'] . '</td></tr>';
			}
			?>

			<tr>
				<td colspan="6" class="right-align">Total</td>
				<td><?php echo $data['total']; ?></td>
			</tr>
		</table>
		<div class="cart-controls pull-right">
			<a href="<?php echo SITE_ROOT; ?>cart/checkout" class="btn btn-lg btn-success">Place Order</a>
		</div>
		<?php } ?>
	</div>
<?php include_once('views/global/footer.php'); ?>