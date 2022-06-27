CREATE DATABASE facebook

CREATE TABLE users (
	 usersId INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	 usersFname varchar(128)  NOT NULL,
	 usersLname varchar(128)  NOT NULL,
	 usersEmailOrPhone varchar(128) NOT NULL,
	 usersPwd varchar(128) NOT NULL,
	 usersBirth DATE NOT NULL,
	 usersGender varchar(9) NOT NULL,
)

Select * from users
DELETE FROM users
