<?php
require_once('BaseModel.php');

class SearchModel extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function getData($term, $fields, $category) {
		$sql = $this->createSQL($term, $fields, $category);
		$data = $this->performQuery($sql);

		return $data;
	}

	// parameters are the values of the search form fields
	protected function createSQL($term, $fields, $category) {
    	$term = '"%' . $term . '%"';

	    $query = "SELECT *
	            FROM book, author, wrote
	            WHERE wrote.isbn = book.isbn 
	            AND wrote.author_id = author.id
	            AND book.category = '{$category}'";
	    
	    // since $fields was a multiple select input, we need to iterate through
	    // each selection and find any matches. Could be refactored to be more modular.
	    $fieldStatements = array();
	    foreach ($fields as $field) {
	        array_push($fieldStatements, $this->createStatement($term, $field));
	    }
	    if (!empty($fieldStatements)){
	        $query .= " AND " . join(" OR ", $fieldStatements);
	    }

	    $query .= " GROUP by book.isbn;";
	    return $query;
	}

	protected function createStatement($term, $field) {
	    switch($field) {
	        case 'keyword': {
	            return "(book.isbn like {$term}" .
	                " OR book.title like {$term}" . 
	                " OR book.publisher like {$term}" .
	                " OR author.first_name like {$term}" .
	                " OR author.last_name like {$term}
	                )"; 
	        }
	        case 'title': {
	            return " (book.title like {$term}) ";
	        }
	        case 'author': {
	            return " (author.first_name like {$term}" .
	                " OR author.last_name like {$term}) ";
	        }
	        case 'publisher': {
	            return " (book.publisher like {$term}) ";
	        }
	        case 'isbn': {
	            return " (book.isbn like {$term}) ";
	        }
	        default: {
	            return "(book.title like {$term})";
	        }
	    }
	}
}