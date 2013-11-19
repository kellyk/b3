START TRANSACTION;
BEGIN;

CREATE TABLE IF NOT EXISTS user (
	username 	VARCHAR(32) NOT NULL,
	PIN 	 	NUMERIC(4,0) NOT NULL,
	first_name	VARCHAR(32) NOT NULL,
	last_name	VARCHAR(32) NOT NULL,
	city		VARCHAR(32) NOT NULL,
	address		VARCHAR(32) NOT NULL,
	zip		NUMERIC(5,0) NOT NULL, 
	state		CHARACTER(2) NOT NULL, /* maybe we could use this http://kimbriggs.com/computers/computer-notes/mysql-notes/mysql-create-state-table.file*/
	cctype		ENUM('MasterCard','VISA','American Express', 'Discover'), # more?
	ccnumber	NUMERIC(16), 
	PRIMARY KEY (username)
	/* cart and order reference this table */
)ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS book(
	isbn 			INTEGER NOT NULL,
	title 			VARCHAR(255),
	category		VARCHAR(50),
	publisher 		VARCHAR(255),
	deleted 		BOOLEAN,
	inventory_quantity 	SMALLINT,
	inventory_minimum	SMALLINT,
	year_published 		SMALLINT,
	price 			DECIMAL(6,2),
	PRIMARY KEY (isbn)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS author(
	id 		INTEGER NOT NULL AUTO_INCREMENT,
	first_name 	VARCHAR(255),
	last_name 	VARCHAR(255),
	PRIMARY KEY (id)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS wrote(
	isbn 		INTEGER NOT NULL,
	author_id 	INTEGER NOT NULL,
	PRIMARY KEY (isbn, author_id),
	FOREIGN KEY (isbn) REFERENCES book (isbn),
	FOREIGN KEY (author_id) REFERENCES author(id)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS review (
	review_number 		INTEGER NOT NULL AUTO_INCREMENT,
	isbn 			INTEGER NOT NULL,
	review_text 		TEXT,
	PRIMARY KEY (review_number, isbn),
	FOREIGN KEY (isbn) REFERENCES book (isbn)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS orders (
	order_number	INTEGER PRIMARY KEY AUTO_INCREMENT,
	order_date	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	username	varchar(32) NOT NULL REFERENCES user (username),
	shipped_date	TIMESTAMP,
	address_line	VARCHAR(50),
	address_city	VARCHAR(50),
	address_state	CHARACTER(2)
) ENGINE='InnoDB';


CREATE TABLE IF NOT EXISTS line_item (
	order_number	INTEGER NOT NULL REFERENCES orders (order_number),
	isbn		INTEGER NOT NULL REFERENCES book (isbn),
	quantity	INTEGER NOT NULL,
	unit_price	NUMERIC(8,2) NOT NULL,
	PRIMARY KEY (order_number, isbn)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS cart (
	username	VARCHAR(32) PRIMARY KEY,
	expire_date	TIMESTAMP NOT NULL,
	FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS cart_item (
	username	VARCHAR(32) NOT NULL REFERENCES cart (username) ON DELETE CASCADE,
	isbn		INTEGER NOT NULL REFERENCES book (isbn) ON DELETE CASCADE,
	quantity	INTEGER NOT NULL DEFAULT 1,
	PRIMARY KEY (username, isbn)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS administrator (
	username	VARCHAR(32) NOT NULL REFERENCES user (username) ON DELETE CASCADE,
	hire_date	DATE NOT NULL,
	/* phone numbers are in phone_number*/
	PRIMARY KEY (username)
)ENGINE='InnoDB';


CREATE TABLE IF NOT EXISTS phone_number (
	username 	VARCHAR(32) NOT NULL REFERENCES administrator (username) ON DELETE CASCADE,
	phone_number	NUMERIC(10, 0),
	PRIMARY KEY (username, phone_number) /* The whole record is the primary key */
)ENGINE='InnoDB';



COMMIT;
