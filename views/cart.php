<?php
include_once('views/global/header.php');

if (isset($data)) {
?>

<table class="table">
	<tr>
		<th>ISBN</th>
		<th>Title</th>
		<th>Author</th>
		<th>Publish Date</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Remove</th>
	</tr>

	<?php
	// iterate through books array and display in cart
	foreach ($data as $book) {
		// delete button
		echo '<tr>';
		echo $book['isbn'];

		// book info
		foreach ($book as $key => $value) {
			echo "<td>{$value}</td>";
		}
		echo '<td><input class="form-control small-input" type="number" min="0" value="1" />' .
			'<button class="btn btn-sm btn-primary">Update</button></td>';
		echo '<td><span class="glyphicon glyphicon-remove"></span></td></tr>';
	}
	echo '</table>';
}
// if no items in cart, display appropriate message
else {
	echo "There are no items in your cart.";
}

include_once('views/global/footer.php');