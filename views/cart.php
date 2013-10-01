<?php

include_once('views/global/header.php');

if (isset($data)) {
	echo '<table class="table"><tr>';
	foreach ($data as $key => $value) {
		echo "<th>{$key}</th>";
	}
	echo '</tr><tr>';
	foreach ($data as $key => $value) {
		echo "<td>{$value}</td>";
	}
	echo '</tr></table>';
} else {
	echo "There are no items in your cart.";
}

include_once('views/global/footer.php');