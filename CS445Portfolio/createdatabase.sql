CREATE TABLE `cs445portfolio`.`users` (
  `username` VARCHAR(30) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(30) CHARACTER SET 'armscii8' NOT NULL,
  `userType` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`username`));
  
  