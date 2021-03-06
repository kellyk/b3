/* book */
INSERT INTO book VALUES ('0073523321', 'Database System Concepts', 'computer science', 'McGraw-Hill', FALSE, 25, 10, 2010, 159.99);
INSERT INTO book VALUES ('0810994429', 'Art: A World History', 'art', 'Abrams', FALSE, 25, 10, 2007, 21.95);
INSERT INTO book VALUES ('0077274334', 'Biology', 'biology', 'McGraw Hill', FALSE, 25, 10, 2009, 189.99);

/* author */
INSERT INTO author VALUES (DEFAULT, 'Silberschatz', 'Abraham');
INSERT INTO author VALUES (DEFAULT, 'Korth', 'Henry');
INSERT INTO author VALUES (DEFAULT, 'Sudarshan', 'S');
INSERT INTO author VALUES (DEFAULT, 'Buchholz', 'Elke');
INSERT INTO author VALUES (DEFAULT, 'Mader', 'Sylvia');

/* wrote */
INSERT INTO wrote VALUES ('0073523321', 1);
INSERT INTO wrote VALUES ('0073523321', 2);
INSERT INTO wrote VALUES ('0073523321', 3);
INSERT INTO wrote VALUES ('0810994429', 4);
INSERT INTO wrote VALUES ('0077274334', 5);

/* review */
INSERT INTO review VALUES (DEFAULT, '0073523321', 'Great book. Helped me learn SQL');
INSERT INTO review VALUES (DEFAULT, '0810994429', 'I hate art now. Worst book ever');
INSERT INTO review VALUES (DEFAULT, '0077274334', 'Not a bad primer on biology. A little expensive.');

/* user */
INSERT INTO user VALUES('Jonny97', 1234, 'John', 'Doe', 'Chicago', '56 Main St', 60616, 'IL', 'MasterCard', 1234567890123456);
INSERT INTO user VALUES('Mary', 4321, 'Mary', 'Smith', 'San Francisco', '89 7th Ave', 94101, 'CA', 'Discover', 6734568901234512);
INSERT INTO user VALUES('Tom', 9021, 'Tom', 'Kulic', 'Johnson City', '142 Montgomery Rd', 37601, 'TN', 'MasterCard', 8901231245634567);
INSERT INTO user VALUES('Sue', 9021, 'Susanne', 'Lovelace', 'Ann Arbor', '96 Packard St', 48104, 'MI', NULL, NULL);
INSERT INTO user VALUES('Bill', 9021, 'William', 'Carmichael', 'Ypsilanti', '134 Carpenter Rd', 48197, 'MI', NULL, NULL);
INSERT INTO user VALUES('Ahmed', 9021, 'Ahmed', 'Hassan', 'Ypsilanti', '73 Clubview Rd', 48197, 'MI', NULL, NULL);

/* administrator */
INSERT INTO administrator VALUES('Sue', '2012-07-21');
INSERT INTO administrator VALUES('Bill', '2012-01-01');
INSERT INTO administrator VALUES('Ahmed', '2013-03-12');

/* phone_number */
INSERT INTO phone_number VALUES('Sue', '1238742937');
INSERT INTO phone_number VALUES('Sue', '4238793127');
INSERT INTO phone_number VALUES('Bill', '9338747122');
INSERT INTO phone_number VALUES('Ahmed', '3874122929');

/* orders */
INSERT INTO orders (username, ccnumber, cctype, address_line, address_city, address_state, address_zip)
SELECT username, ccnumber, cctype, address, city, state, zip
FROM user
WHERE username = 'Jonny97';

INSERT INTO orders (username, ccnumber, cctype, address_line, address_city, address_state, address_zip)
SELECT username, ccnumber, cctype, '449 W Grove st', 'Lansing', 'MI', 48917
FROM user
WHERE username = 'Jonny97';

INSERT INTO orders (username, ccnumber, cctype, address_line, address_city, address_state, address_zip, order_date, shipped_date)
SELECT username, ccnumber, cctype, address, city, state, zip, '2012-04-09 14:52:49', '2012-04-13 16:43:12'
FROM user
where username = 'Tom';

/* line_item */
INSERT INTO line_item (order_number, isbn, quantity, unit_price)
SELECT 1, isbn, 5, price
FROM book 
WHERE isbn = '0073523321';

INSERT INTO line_item (order_number, isbn, quantity, unit_price)
SELECT 2, isbn, 2, price
FROM book
WHERE isbn = '0077274334';

INSERT INTO line_item (order_number, isbn, quantity, unit_price)
SELECT 2, isbn, 1, 14.95
FROM book
WHERE isbn = '0810994429';

INSERT INTO line_item (order_number, isbn, quantity, unit_price)
SELECT 3, isbn, 1, price
FROM book
WHERE isbn = '0810994429';

/* cart */
INSERT INTO cart (SELECT 'Mary', NOW() + INTERVAL 14 DAY);
INSERT INTO cart VALUES ('Tom', '2013-12-1 10:10:10');
INSERT INTO cart SELECT 'Jonny97', NOW() + INTERVAL 7 DAY;

/* cart_item */
INSERT INTO cart_item VALUES('Mary', '0073523321', 2);
INSERT INTO cart_item VALUES('Tom', '0077274334', 1);
INSERT INTO cart_item VALUES('Jonny97', '0077274334', 1);
INSERT INTO cart_item VALUES('Jonny97', '0810994429', 97);
