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