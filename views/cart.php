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
		<th>Unit Price</th>
		<th>Price</th>
	</tr>
	<?php
	// iterate through books array and display in cart
	foreach ($data['books'] as $book) {
		echo '<tr><td><a href="' . SITE_ROOT . 'cart/remove/' . $book['isbn'] . '"><span class="glyphicon glyphicon-remove"></span></a></td>';
		echo '<td>' . $book['isbn'] . '</td>';
		echo '<td>' . $book['title'] . '</td>';
		echo '<td>' . $book['first_name'] . ' ' . $book['last_name'] . '</td>';
		echo '<td>' . $book['year_published'] . '</td>';
		echo '<td><form method="POST" action="' . SITE_ROOT . 'cart/update">' . 
			'<input type="hidden" name="isbn" value="' . $book['isbn'] . '" />'. 
			'<input type="number" name="quantity" class="small-input" min="0" value="' . $book['quantity']. '" />' .
			'<input type="submit" class="btn btn-sm btn-primary" value="Update" /></form></td>';
		echo '<td>' . $book['price'] . '</td>';
		echo '<td>' . $book['total'] . '</td></tr>';
	}
	?>

	<tr>
		<td colspan="7" class="right-align">Total</td>
		<td><?php echo $data['total']; ?></td>
	</tr>
</table>

<div class="cart-controls pull-right">
	<button class="btn btn-lg btn-default">Recalculate</button>
	<a href="<?php echo SITE_ROOT; ?>cart/checkout" class="btn btn-lg btn-success">Checkout</a>
</div>
<?php
}
// if no items in cart, display appropriate message
else if (isset($error)) {
	echo $error;
} else {
	echo "There are no items in your cart.";
}

include_once('views/global/footer.php');