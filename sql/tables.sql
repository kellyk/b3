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

COMMIT;
