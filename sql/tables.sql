START TRANSACTION;
BEGIN;

CREATE TABLE IF NOT EXISTS orders (
	order_number	INTEGER PRIMARY KEY AUTO_INCREMENT,
	order_date	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	username	varchar(20) NOT NULL REFERENCES user (username),
	shipped_date	TIMESTAMP,
	address_line	VARCHAR(50),
	address_city	VARCHAR(50),
	address_state	CHARACTER(2)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS line_item (
	order_number	INTEGER NOT NULL REFERENCES orders (order_number),
	isbn		VARCHAR(11) NOT NULL REFERENCES book (isbn),
	quantity	INTEGER NOT NULL,
	unit_price	NUMERIC(8,2) NOT NULL,
	PRIMARY KEY (order_number, isbn)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS cart (
	username	VARCHAR(20) PRIMARY KEY,
	expire_date	TIMESTAMP NOT NULL,
	FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS cart_item (
	username	VARCHAR(20) NOT NULL REFERENCES cart (username) ON DELETE CASCADE,
	isbn		varchar(11) NOT NULL REFERENCES book (isbn) ON DELETE CASCADE,
	quantity	INTEGER NOT NULL DEFAULT 1,
	PRIMARY KEY (username, isbn)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS user (
	username 	VARCHAR(32) NOT NULL,
	PIN 	 	NUMERIC(4,0) NOT NULL,
	first_name	VARCHAR(32) NOT NULL,
	last_name	VARCHAR(32) NOT NULL,
	city		VARCHAR(32) NOT NULL,
	address		VARCHAR(32) NOT NULL,
	zip		NUMERIC(5,0) NOT NULL, 
	state		VARCHAR(32) NOT NULL, /* maybe we could use this http://kimbriggs.com/computers/computer-notes/mysql-notes/mysql-create-state-table.file*/
	cctype		ENUM('MasterCard','VISA','American Express'), # more?
	ccnumber	NUMERIC(16), 
	PRIMARY KEY (username)
	/* cart and order are not total for this relation so they don't have to be here?*/
)ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS administrator (
	username	VARCHAR(32) NOT NULL REFERENCES user (username) ON DELETE CASCADE,
	hire_date	DATE NOT NULL,
	/* phone numbers are in phone_number*/
	PRIMARY KEY (username)
)ENGINE='InnoDB';


CREATE TABLE IF NOT EXISTS phone_number (
	username 	VARCHAR(32) NOT NULL REFERENCES administrator (username) ON DELETE CASCADE,
	phone_number	NUMERIC(10, 0),
	PRIMARY KEY (phone_number) /* is a primary key needed? And index on username would make more sense*/
)ENGINE='InnoDB';



COMMIT;
