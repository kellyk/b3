<div>
	
 <!--Total number of customers in the system at the time and date of inquiry.
·         Total number of books in stock for each category, in descending order.
·         Average monthly sales, in dollars, for the current year, ordered by month.-->
<h1>Reports</h1>
<br>
<h3>Users online:</h3>
Currently there are <?php echo $count ?> user online.
<br><br>

<h3>Books in stock:</h3>
	<table class="table">
		<thead>
			<th>Category</th>
			<th>Books in stock</th>
		</thead>
		<?php
			foreach ($books as $category) {
				echo '<tr>';
				echo '<td>' . $category['category'] . '</td>';
				echo '<td>' . $category['books_count'] . '</td>';
				echo '</tr>';
			}
		?>
	</table>
<br>

<h3>Average sales per month:</h3>
	<table class="table">
		<thead>
			<th>Month</th>
			<th>Average sales value in $</th>
		</thead>
		<?php
			foreach ($sales as $month) {
				echo '<tr>';
				echo '<td>' . date("F", mktime(0, 0, 0,$month['month'], 10)) . '</td>';
				echo '<td>' .  round($month['sumOrders'], 2, PHP_ROUND_HALF_UP)  . '</td>';
				echo '</tr>';
			}
		?>
	</table>


</div>
