CREATE TABLE `Inventory`.`users` ( `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL ) ENGINE = MyISAM;
INSERT INTO `users` (`username`, `password`) VALUES ('red', 'password');

CREATE TABLE `inventory`.`current inventory` ( `product id` INT NOT NULL , `product name` VARCHAR(50) NOT NULL , `starting inventory` INT NOT NULL , `inventory received` INT NOT NULL , `inventory shipped` INT NOT NULL , PRIMARY KEY (`product id`)) ENGINE = MyISAM;


CREATE TABLE `inventory`.`incoming inventory` ( `product id` INT NOT NULL AUTO_INCREMENT , `product name` VARCHAR(50) NOT NULL , `inventory received` INT NOT NULL , `date of purchase` DATE NOT NULL  , PRIMARY KEY (`product id`)) ENGINE = MyISAM;

CREATE TABLE `inventory`.`outgoing inventory` ( `product id` INT NOT NULL  , `product name` VARCHAR(50) NOT NULL , `inventory shipped` INT NOT NULL , `date of order` DATE NOT NULL, PRIMARY KEY (`product id`)) ENGINE = MyISAM;

ALTER TABLE `incoming inventory` 
ADD FOREIGN KEY (`product id`) 
REFERENCES `current inventory`(`product id`)

ALTER TABLE `outgoing inventory` 
ADD FOREIGN KEY (`product id`) 
REFERENCES `current inventory`(`product id`) 