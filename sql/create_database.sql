START TRANSACTION;
BEGIN;

CREATE DATABASE b3;

CREATE USER 'rstahl'@'localhost' IDENTIFIED BY '';
CREATE USER 'kking'@'localhost' IDENTIFIED BY '';
CREATE USER 'kjohnson'@'localhost' IDENTIFIED BY '';
CREATE USER 'b3site'@'localhost' IDENTIFIED BY '';

GRANT USAGE ON b3.* TO 'rstahl'@'localhost';
GRANT USAGE ON b3.* TO 'kking'@'localhost';
GRANT USAGE ON b3.* TO 'kjohnson'@'localhost';
GRANT USAGE ON b3.* TO 'b3site'@'localhost';

GRANT SELECT, INSERT, DELETE, CREATE, ALTER, DROP ON b3.* TO 'rstahl'@'localhost';
GRANT SELECT, INSERT, DELETE, CREATE, ALTER, DROP ON b3.* TO 'kking'@'localhost';
GRANT SELECT, INSERT, DELETE, CREATE, ALTER, DROP ON b3.* TO 'kjohnson'@'localhost';
GRANT SELECT, INSERT, DELETE ON b3.* TO 'b3site'@'localhost';

COMMIT;
