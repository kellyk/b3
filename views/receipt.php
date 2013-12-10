 <?php
 include_once('views/global/header.php');
 ?>
<h3>Receipt for order #<?php echo $data['items'][0]['order_number']?> at your B3 shop</h3><br />
<table class="table">
<?php
	echo "<tr><th>Receipient: </th><th>UserID: </th><td>" . $user['username'] . "</td></tr>";
	echo  "<tr><td>" . $user['first_name'] . " " . $user['last_name'] . "</td><th>Date: </th><td>" . $data['items'][0]['order_date'] . "</td></tr>";
	echo  "<tr><td>" . $user['address']. "</td><th>Creditcard#: </th><td>" . $user['ccnumber'] . "</td></tr>";
	echo  "<tr><td>" . $user['zip'] . " " . $user['city'] . " " . $user['state'] . "</td><th>CCType: </th><td>" . $user['cctype'] . "</td></tr>";;
?>
<br>
<br>
<br>
<br>



<table class="table">
	<tr>
		<th>Your Orders</th>
</tr>
</table>


<table class="table">
	<tr>
		<th>ISBN</th>
		<th>Title</th>
		<th>Quantity</th>
		<th>Unit Price in $</th>
	</tr>
	<?php
	// iterate through books array and display in cart
	foreach ($data['items'] as $book) {
		echo '<tr>';
		echo '<td>' . $book['isbn'] . '</td>';
		echo '<td>' . $book['title'] . '</td>';
		echo '<td>' . $book['quantity'] . '</td>';
		echo '<td>' . $book['price'] . '</td>';
		//echo '<td>' . $book['total'] . '</td>
		echo '</tr>';
	}
	?>

	<tr>
		<td colspan="3" class="right-align">Subtotal</td>
		<td><?php echo $data['total']; ?></td>
	</tr>
	<tr>
		<td colspan="3" class="right-align">Shipping</td>
		<td>4.00</td>
	</tr>
	<tr>
		<td colspan="3" class="right-align">Total</td>
		<td><?php echo $data['total'] + 4.00; ?></td>
	</tr>
</table>

<div class="cart-controls pull-right">
	<a href="javascript:window.print()" class="btn btn-lg btn-success">Print</a>
</div>

