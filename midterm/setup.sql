/*
 * @author: Nick Bartel
 * @link: https://cislinux.hfcc.edu/~njbartel/cis222/midterm
 * setup file for midterm database
 */
CREATE TABLE midterm (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, make VARCHAR(20) NOT NULL, model VARCHAR(30) NOT NULL, price float(10,2) NOT NULL DEFAULT 00.00, year INT UNSIGNED DEFAULT 0,PRIMARY KEY(id));
INSERT INTO midterm VALUES(NULL, 'Tesla', 'Model X', 79000.00, 2018);
INSERT INTO midterm VALUES(NULL, 'Tesla', 'Model 3', 49000.00, 2018);
INSERT INTO midterm VALUES(NULL, 'Ford', 'Escape', 25000.00, 2018);