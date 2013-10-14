<?php
include_once('views/global/header.php');
?>
<h3>Shopping Cart</h3><br />
<?php
if (isset($data)) {
?>

<table class="table">
	<tr>
		<th>Remove</th>
		<th>ISBN</th>
		<th>Title</th>
		<th>Author</th>
		<th>Publish Date</th>
		<th>Quantity</th>
		<th>Price</th>
	</tr>
	<?php
	// iterate through books array and display in cart
	foreach ($data as $book) {
		echo '<tr><td><span class="glyphicon glyphicon-remove"></span></td>';
		echo '<td>' . $book['isbn'] . '</td>';
		echo '<td>' . $book['title'] . '</td>';
		echo '<td>' . $book['author'] . '</td>';
		echo '<td>' . $book['publishDate'] . '</td>';
		echo '<td><input class="form-control small-input" type="number" min="0" value="1" />' .
		'<button class="btn btn-sm btn-primary">Update</button></td>';
		echo '<td>' . $book['price'] . '</td></tr>';
	}
	?>

	<tr>
		<td colspan="6" class="right-align">Total</td>
		<td>$167.98</td>
	</tr>
</table>

<div class="cart-controls pull-right">
	<button class="btn btn-lg btn-default">Recalculate</button>
	<a href="<?php echo SITE_ROOT; ?>cart/checkout" class="btn btn-lg btn-success">Checkout</a>
</div>
<?php
}
// if no items in cart, display appropriate message
else {
	echo "There are no items in your cart.";
}

include_once('views/global/footer.php');