
/*
 * User: Nick Bartel
 * Date: September 27th, 2018
 * Desc: Quiz 3
 */

/*
4 pts
1. Your IT department has been tasked with keeping track of all hardware in your organizations.
	Create a database table to store this information in. All queries in this quiz refer to this table.
	Name the table hardware and give it 8 fields, the field information is below.
		hid is a whole number that can get very large, it should be the primary key of the table.
		uid is also a whole number that can get very large, it should link to the id of the user who owns the device.
		value should track the cost or value of the machine.
		sn is a string of numbers and letters used to identify the machine by the manufacturer.
		notes should store any amount of text based notes about the machine, such is if it went for service or has a virus.
		cdate should store when the machine was purchased, so this field should never be null.
		mdate should store when the machine was modified, this field can be null by default.
		rdate should store when the machine was retired, so null by default.
*/
	CREATE TABLE Hardware(
		hid BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        uid BIGINT UNSIGNED NOT NULL,
        cost FLOAT(10,2) NOT NULL,
        sn VARCHAR(30) NOT NULL,
        notes VARCHAR(100),
        cdate DATE NOT NULL,
        mdate DATE NULL,
        rdate DATE NULL,
        PRIMARY KEY(hid),
		CONSTRAINT FK_HardwareUser FOREIGN KEY (uid) REFERENCES Users(uid)
    );


-- 3 pts
-- 2. Write an insert statement that will insert 3 rows of data into this table, you can make the data up but it should make sense.
-- Feel free to ask me if you need any clarification.
	INSERT INTO Hardware VALUES(NULL, 1, 140.23, '6N549', NULL, 6/5/2017, NULL, 6/6/2017),
								(NULL, 1, 1090.96, '54Q678', 'BOSSES MACHINE, MAX PRIORITY', 1/3/2015, 5/6/2018),
                                (NULL, 3, 100.63, '4B', 'An old gameboy we gave to the bosses kid, dont service', 3/5/2016, 7/23/2016);

-- 1 pts
-- 3. Write an update statement that will retire any machine that has a user id of 4.
-- Hint: This is done by populating the retire date field and adding a note that says "RETIRED!"
	UPDATE Hardware SET rdate = NOW(), notes='RETIRED!' WHERE uid = 4;

-- 1 pts
-- 4. Write a select statement that will show me the top 5 most expensive pieces of hardware, but do not include any machines are retired.
	SELECT * FROM Hardware WHERE rdate = NULL ORDER BY cost LIMIT 5;

-- 1 pt
-- 5. Which engine did I go over that is newer and more efficient than MyISAM?
-- Hint: Is should be the default for newer MySQL installations.

/* INNODB */

-- 1 pt
-- Ex: Write a single statement that will remove all the data from your table and reset the auto_increment to 1. 
-- Hint: You should not use the word DROP.
	TRUNCATE Hardware;
