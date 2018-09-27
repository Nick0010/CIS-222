CREATE TABLE Schools (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  school_name VARCHAR(60) NOT NULL,
  phone CHAR(10),
  PRIMARY KEY(id)
);

CREATE TABLE Classes (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  school_id BIGINT UNSIGNED NOT NULL,
  department VARCHAR(30),
  class_code VARCHAR(15),
  class_Name VARCHAR(75),
  PRIMARY KEY(id),
  CONSTRAINT FK_classschool FOREIGN KEY(school_id) REFERENCES Schools(id)
);

CREATE TABLE Reviews (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  school_id BIGINT UNSIGNED NOT NULL,
  class_id BIGINT UNSIGNED NOT NULL,
  rating INT,
  comment VARCHAR(200),
  PRIMARY KEY(id),
  CONSTRAINT FK_reviewSchool FOREIGN KEY (school_id) REFERENCES Schools(id),
  CONSTRAINT FK_reviewClass FOREIGN KEY (class_id) REFERENCES Classes(id)
);

INSERT INTO Schools VALUES(NULL, 'Henry Ford Community College', 7555551234);
INSERT INTO Classes VALUES(NULL, 1, 'Technology', 'CIS-222', 'Web Database Development with ASP
');
INSERT INTO Reviews Values(NULL, 1, 1, 5, 'Lorum Ipsum Dolor');

UPDATE Classes SET class_Name = 'Web Database Development with PHP' where id = 1;

SELECT * FROM Classes WHERE school_id = 1;

SELECT * FROM Classes WHERE class_Name = 'Web Database Development with PHP';