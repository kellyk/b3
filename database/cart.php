<?php

// return all books in database
function getCartItems() {
	return "SELECT *
    		FROM book, author, wrote
    		WHERE wrote.isbn = book.isbn 
    		AND wrote.author_id = author.id
    		GROUP by book.isbn;";
}