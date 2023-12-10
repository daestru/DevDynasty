CREATE TABLE `cs445portfolio`.`users` (
  `username` VARCHAR(30) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `passwrd` VARCHAR(30) CHARACTER SET 'armscii8' NOT NULL,
  `userType` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`username`));
  
CREATE TABLE `templates` (
  `templateName` varchar(20) NOT NULL,
  `templateID` int(11) NOT NULL,
  `description` varchar(40) NOT NULL
);