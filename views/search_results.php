<?php include_once('views/global/header.php'); ?>
<div>
	<h3>Results for <span class="text-primary">Databases in <i>Keyword Anywhere</i></span></h3>
	<?php if (!empty($data)) { ?>
		<table class="table">
			<thead>
				<th>Action</th>
				<th>Book Description</th>
			</thead>
		<?php
		// iterate through books array and display in cart
		foreach ($data as $book) {
			echo '<tr><td>';
			echo '<a href="' . SITE_ROOT . 'cart" class="btn btn-med btn-success search-result-button">Add</a> <br />';
			echo '<a href="' . SITE_ROOT . 'search/reviews/' . $book['isbn'];
			echo '" class="btn btn-med btn-default search-result-button">Reviews</a></td>';
			echo "<td>{$book['title']}<br />";
			echo "{$book['year_published']}, {$book['publisher']}<br />";
			echo "<strong>By</strong> {$book['first_name']} {$book['last_name']} <br />";
			echo "<strong>Price:</strong> {$book['price']}<br /></td></tr>";
		}
	} else { ?>

	No matches find.

	<?php } ?>

	</tbody>
	<tfoot>
	</tfoot>
</table>

</div

</div>
</div>

<?php include_once('views/global/footer.php'); ?>
