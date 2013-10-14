<div>
	<?php if(!$_GET['mock_orders']) : ?>
	<h3>No outstanding orders</h3>
	<?php else : ?>
	<table class="table">
		<thead>
			<th>Action</th>
			<th>Order Number</th>
			<th>Shipping address</th>
			<th>Items</th>
			<th>Shipping</th>
			<th>Total</th>
		</thead>
			<tr>
				<td>
					<input type="button" class="form-control" value="Shipped" /><br /><br />
					<input type="button" class="form-control" value="Cancel" />
				</td>
				<td><strong>#12345</strong></td>
				<td>
					Kevin Johnson<br />
					123 Pine dr.<br />
					Ypsilanti<br />
					Michigan   48917
				</td>
				<td>
					<table class="table">
						<thead>
							<th>ISBN</th>
							<th>Qty</th>
							<th>Unit Price</th>
						</thead>
						<tbody>
							<tr>
								<td><a href="#">123456</a></td>
								<td>1</td>
								<td>$34.99</td>
							</tr>
							<tr>
								<td><a href="#">654321</a></td>
								<td>1</td>
								<td>$38.49</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td>$4.00</td>
				<td>$77.98</td>
			</tr>
			<tr>
				<td>
					<input type="button" class="form-control" value="Order Placed" /><br /><br />
					<input type="button" class="form-control" value="Cancel" />
				</td>
				<td><strong>#12346</strong></td>
				<td>
					INVENTORY
				</td>
				<td>
					<a href="#">654321</a></td>
				</td>
				<td></td>
				<td></td>
			</tr>
		<tbody>
		</tbody>
		<tfoot>
		</tfoot>
	</table>
	<?php endif; ?>
</div>
</div>
