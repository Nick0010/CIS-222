CREATE TABLE Contact ( id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, name varchar(30) NOT NULL, email varchar(30) NULL, message varchar(100) NOT NULL, primary key(id));
INSERT INTO Contact VALUES(NULL, 'Nick Bartel', 'njbartel@hawkmail.hfcc.edu', 'Lorem Ipsum DOlor');

CREATE TABLE Product (pid BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(150) NOT NULL, price FLOAT(4,2) NOT NULL DEFAULT 0.00, PRIMARY KEY(pid));
INSERT INTO Product VALUES(NULL, 'Xerox C-70', "A business grade multi function printer featuring full color printing, copying, and fax capabilities", 600.00);
INSERT INTO Product VALUES(NULL, 'Xerox C-60', "A business grade multi function printer featuring Partial color printing, copying, and fax capabilities", 550.00);