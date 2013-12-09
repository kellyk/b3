<?php
require_once('BaseModel.php');
class ReportsModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}


	function getBooksByCategoryTotalNumberDesc() {
		$sql = "SELECT category, sum(inventory_quantity) AS books_count
			  	FROM book
			  	GROUP BY category 
			  	ORDER BY books_count DESC;";
		$data = $this->performQuery($sql);
		return $data;
	}



	function getAvgSalesPerMonth() {
		$sql = "SELECT sum(line_item.quantity * line_item.unit_price) / sum(line_item.quantity) AS sumOrders, MONTH(orders.order_date) AS month
				FROM line_item 
				INNER JOIN orders
				ON line_item.order_number = orders.order_number
				WHERE YEAR(orders.order_date) = YEAR(CURDATE())
				GROUP BY month;";
		$data = $this->performQuery($sql);
		return $data;
	}
}