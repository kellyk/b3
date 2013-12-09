<?php
	$orders = $args['orders'];
	$needs  = $args['needs'];
?>
<div>
	<h1>Customer Orders</h1>
	<?php if(!$orders) : ?>
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
		<?php foreach ($orders as $order) {
			$user = $orders['user'];
			$items = $order['items'];
		?>
			<tr>
				<td>
					<a href="<?php echo SITE_ROOT . "admin/shipped/$order[order_num]" ;?>" class="form-control btn btn-med" >Shipped</a><br /><br />
					<a href="<?php echo SITE_ROOT . "admin/canel/$order[order_num]" ; ?>" class="form-control btn btn-med" >Cancel</a>
				</td>
				<td><strong>#<?php echo $order['order_number'];  ?></strong></td>
				<td>
					<?php echo "$user[first_name] $user[last_name]"; ?><br />
					<?php echo $order['address_line']; ?><br />
					<?php echo $order['address_city']; ?><br />
					<?php echo "$order[address_state] $order[zip]"; ?>
				</td>
				<td>
					<table class="table">
						<thead>
							<th>ISBN</th>
							<th>Qty</th>
							<th>Unit Price</th>
						</thead>
						<tbody>
						<?php foreach ($items as $item) { ?>
							<tr>
								<td><a href="#"><?php echo $item['isbn']; ?></a></td>
								<td><?php echo $item['quantity']; ?></td>
								<td>$34.99</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</td>
				<td><?php $order['shipping']?></td>
				<td><?php $order['total'] ?></td>
			</tr>
		<?php } ?>
		<tbody>
		</tbody>
		<tfoot>
		</tfoot>
	</table>
	<?php endif; ?>

	<h1>Internal Order</h1>
	<?php if (!$needs) { ?>
	<h3>No Needs</h3>
	<?php } else { ?>
		<table class="table">
			<thead>
				<th>Action</th>
				<th>ISBN</th>
				<th>Title</th>
				<th>Current Inventory</th>
				<th>Minimum Inventory</th>
			</thead>
			<tbody>
			<?php foreach ($needs as $need) { ?>
				<tr>
					<td><a href="<?php echo SITE_ROOT . "admin/order/$need[isbn]" ;?>" >Order</a></td>
					<td><?php echo $need['isbn']; ?></td>
					<td><?php echo $need['title']; ?></td>
					<td><?php echo $need['inventory_quantity']; ?></td>
					<td><?php echo $need['inventory_minimum']; ?></td>
				</tr>
			
			<?php } ?>
			</tbody>
		</table>
	<?php } ?>
</div>
</div>
