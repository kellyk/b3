START TRANSACTION;
BEGIN;

CREATE TABLE IF NOT EXISTS orders (
	order_number	INTEGER PRIMARY KEY AUTO_INCREMENT,
	order_date	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	username	varchar(20) NOT NULL REFERENCES user (username),
	shipped_date	DATE,
	address_line	VARCHAR(50),
	address_city	VARCHAR(50),
	address_state	CHARACTER(2)
) ENGINE='InnoDB';

CREATE TABLE IF NOT EXISTS line_item (
	order_number	INTEGER NOT NULL REFERENCES orders (order_number),
	isbn		VARCHAR(20) NOT NULL REFERENCES book (isbn),
	quantity	INTEGER NOT NULL,
	unit_price	NUMERIC(8,2) NOT NULL,
	PRIMARY KEY (order_number, isbn)
) ENGINE='InnoDB';

COMMIT;
