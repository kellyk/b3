/* book */
INSERT INTO book VALUES (0073523321, 'Database System Concepts', 'Computer Science', 'McGraw-Hill', FALSE, 25, 10, 2010, 159.99);
INSERT INTO book VALUES (0810994429, 'Art: A World History', 'Art', 'Abrams', FALSE, 25, 10, 2007, 21.95);
INSERT INTO book VALUES (0077274334, 'Biology', 'Biology', 'McGraw Hill', FALSE, 25, 10, 2009, 189.99);

/* author */
INSERT INTO author VALUES (DEFAULT, 'Silberschatz', 'Abraham');
INSERT INTO author VALUES (DEFAULT, 'Korth', 'Henry');
INSERT INTO author VALUES (DEFAULT, 'Sudarshan', 'S');
INSERT INTO author VALUES (DEFAULT, 'Buchholz', 'Elke');
INSERT INTO author VALUES (DEFAULT, 'Mader', 'Sylvia');

/* wrote */
INSERT INTO wrote VALUES (0073523321, 1);
INSERT INTO wrote VALUES (0073523321, 2);
INSERT INTO wrote VALUES (0073523321, 3);
INSERT INTO wrote VALUES (0810994429, 4);
INSERT INTO wrote VALUES (0077274334, 5);

/* review */
INSERT INTO review VALUES (DEFAULT, 0073523321, 'Great book. Helped me learn SQL');
INSERT INTO review VALUES (DEFAULT, 0810994429, 'I hate art now. Worst book ever');
INSERT INTO review VALUES (DEFAULT, 0077274334, 'Not a bad primer on biology. A little expensive.');

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
INSERT INTO administrator VALUES('Sue', '1238742937');
INSERT INTO administrator VALUES('Sue', '4238793127');
INSERT INTO administrator VALUES('Bill', '9338747122');
INSERT INTO administrator VALUES('Ahmed', '3874122929');
