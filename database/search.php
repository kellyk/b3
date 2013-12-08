<?php

// search form field
function getSearchResults($term, $fields, $category) {
    $term = '"%' . $term . '%"';

    $query = "SELECT *
            FROM book, author, wrote
            WHERE wrote.isbn = book.isbn 
            AND wrote.author_id = author.id";
    
    $fieldStatements = array();

    foreach ($fields as $field) {
        array_push($fieldStatements, createStatement($term, $field));
    }

    if (!empty($fieldStatements)){
        $query .= " AND " . join(" OR ", $fieldStatements);
    }

    $query .= " GROUP by book.isbn;";
    return $query;
}

function createStatement($term, $field) {
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
            return '(book.title like {$term})';
        }
    }
}

// return all books in database
function getBooks() {
	return "SELECT *
    		FROM book, author, wrote
    		WHERE wrote.isbn = book.isbn 
    		AND wrote.author_id = author.id
    		GROUP by book.isbn;";
}

// search for books by ISBN -- since this is primary key, should return one result
function getBookByISBN($isbn) {
	return "SELECT *
    		FROM book, author, wrote
    		WHERE wrote.isbn = book.isbn 
    		AND wrote.author_id = author.id
    		AND isbn = $isbn
    		GROUP by book.isbn;";
}

// search for books by title
function getBooksByTitle($title) {
	$term = '"%' . $title . '%"';
	return "SELECT *
    		FROM book, author, wrote
    		WHERE wrote.isbn = book.isbn 
    		AND wrote.author_id = author.id
    		AND title like $term
    		GROUP by book.isbn;";
}

// search for books by title
function getBooksByAuthor($author) {
	$term = '"%' . $author . '%"';
	return "SELECT *
    		FROM book, author, wrote
    		WHERE wrote.isbn = book.isbn 
    		AND wrote.author_id = author.id
    		AND (author.last_name like $term
    		OR author.first_name like $term)
    		GROUP by book.isbn";
}

// search for books by title
function getBooksByPublisher($publisher) {
	$term = '"%' . $publisher . '%"';
	return "SELECT *
    		FROM book
    		WHERE title like $term;";
}