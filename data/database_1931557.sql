-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for database_1931557
CREATE DATABASE IF NOT EXISTS `database_1931557` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `database_1931557`;

-- Dumping structure for table database_1931557.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` char(36) NOT NULL DEFAULT uuid(),
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `customer_address` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `province` varchar(25) DEFAULT NULL,
  `postal_code` char(7) DEFAULT NULL,
  `user_name` varchar(12) DEFAULT NULL,
  `pwd` char(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-30          project init\r\n#andres ardila         2021-03-30          customer table created\r\n#andres aridla         2021-04-07          password column name changed to pwd \r\nfirstname, lastname (20 chart long)\r\naddress\r\ncity (8 min)\r\nprovince (max 25 char)\r\npostal code (7 char)\r\nusername (must be unique)(max 12 char)\r\npassword (max 255 characters)';

-- Dumping data for table database_1931557.customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_id`, `firstname`, `lastname`, `customer_address`, `city`, `province`, `postal_code`, `user_name`, `pwd`, `creation_date`, `modification_date`) VALUES
	('1a7cef61-9247-11eb-b238-0800272e460d', 'Cate', 'Ospina', '1007 Rue Bellevue', 'montreal', 'quebec', '232323', 'cospina', '123', '2021-04-07 13:35:24', '2021-04-07 15:16:03'),
	('59277bed-9203-11eb-b238-0800272e460d', 'Andres', 'Ardila', 'Rue Bellevue', 'Montreal', 'Quebec', 'H9c2y6', 'aardila', '123', '2021-03-31 22:10:35', '2021-03-31 22:10:35');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for procedure database_1931557.customers_delete
DELIMITER //
CREATE PROCEDURE `customers_delete`(
	IN `p_user_name` VARCHAR(12),
	IN `p_customer_id` CHAR(36)
)
BEGIN
-- delete one  by id
DELETE FROM customers
WHERE	customers.user_name = p_user_name OR customers.customer_id= p_customer_id;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customers_get_password
DELIMITER //
CREATE PROCEDURE `customers_get_password`()
BEGIN
-- ACCEPTS THE USERNAME AND RETURNS THE PASSWORD IF THERE IS A MATCH

SELECT pwd
FROM customers
WHERE user_name = p_user_name;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customers_insert
DELIMITER //
CREATE PROCEDURE `customers_insert`(
	IN `p_firstname` VARCHAR(20),
	IN `p_lastname` VARCHAR(20),
	IN `p_customer_address` VARCHAR(20),
	IN `p_city` VARCHAR(20),
	IN `p_postal_code` CHAR(7),
	IN `p_user_name` VARCHAR(12),
	IN `p_pwd` CHAR(255),
	IN `p_province` VARCHAR(25)
)
BEGIN
-- insert a new customer
INSERT INTO customers (
	firstname,
	lastname,
	customer_address,
	city,
	province,
	postal_code,
	user_name,
	pwd
	)
VALUES 	(
	p_firstname,
	p_lastname,
	p_customer_address,
	p_city,
	p_province,
	p_postal_code,
	p_user_name,
	p_pwd
	);
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customers_select
DELIMITER //
CREATE PROCEDURE `customers_select`(
	IN `p_user_name` VARCHAR(12)
)
BEGIN
-- select one row by id

SELECT 	customer_id,
			firstname,
			lastname,
			customer_address,
			city,province,
			postal_code,
			user_name,
			pwd,
			creation_date,
			modification_date
FROM 	customers
WHERE	customers.user_name = p_user_name;
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customers_select_all
DELIMITER //
CREATE PROCEDURE `customers_select_all`()
BEGIN
-- Selects all rows from the table customers

SELECT 	customer_id,
			firstname,
			lastname,
			customer_address,
			city,
			province,
			postal_code,
			user_name,
			pwd,
			creation_date,
			modification_date
FROM 	customers
ORDER BY creation_date ASC;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customer_update
DELIMITER //
CREATE PROCEDURE `customer_update`(
	IN `p_user_name` VARCHAR(12),
	IN `p_firstname` VARCHAR(20),
	IN `p_lastname` VARCHAR(20),
	IN `p_customer_address` VARCHAR(25),
	IN `p_province` VARCHAR(25),
	IN `p_city` VARCHAR(25),
	IN `p_postal_code` CHAR(7),
	IN `p_pwd` CHAR(255)
)
BEGIN
-- update customer

UPDATE customers
	SET	firstname = p_firstname,
			lastname = p_lastname,
			customer_address = p_customer_address,
			province = p_province,
			city = p_city,
			postal_code = p_postal_code,
			pwd = p_pwd
	WHERE 	customers.user_name = p_user_name;	

END//
DELIMITER ;

-- Dumping structure for table database_1931557.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` char(36) NOT NULL DEFAULT uuid(),
  `product_code` varchar(12) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-31          product table created\r\n\r\nproduct code: (max 12)\r\ndescription: (max 100)\r\nprice: (2 decimals, max 10000$)\r\ncost:(2 decimals, optional)';

-- Dumping data for table database_1931557.products: ~0 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `product_code`, `description`, `price`, `cost`, `creation_date`, `modification_date`) VALUES
	('1c201c9f-9204-11eb-b238-0800272e460d', 'P123', 'This is a test product', 99.99, 12.99, '2021-03-31 22:16:02', '2021-03-31 22:16:02');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for procedure database_1931557.products_delete
DELIMITER //
CREATE PROCEDURE `products_delete`(
	IN `p_product_id` CHAR(36)
)
BEGIN
-- delete one product by id
DELETE FROM products 
WHERE	product_id = p_product_id;
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.products_insert
DELIMITER //
CREATE PROCEDURE `products_insert`(
	IN `p_product_code` VARCHAR(12),
	IN `p_description` VARCHAR(100),
	IN `p_price` DECIMAL(7,2),
	IN `p_cost` DECIMAL(7,2)
)
BEGIN
-- insert a new product
INSERT INTO products (
	product_code,
	description,
	price,
	cost	
	)
VALUES 	(
	p_product_code,
	p_description,
	p_price,
	p_cost
	);
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.products_select
DELIMITER //
CREATE PROCEDURE `products_select`(
	IN `p_product_id` CHAR(36)
)
BEGIN
-- select one row by id

SELECT 	product_id,
			product_code,
			description,
			price,
			cost,
			creation_date,
			modification_date	
FROM 	products
	
WHERE	product_id = p_product_id;


END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.products_select_all
DELIMITER //
CREATE PROCEDURE `products_select_all`()
BEGIN
-- Selects all rows from the table products

SELECT 	product_id,
			product_code,
			description,
			price,
			cost,
			creation_date,
			modification_date	
FROM 	products
ORDER BY creation_date ASC;

	
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.products_update
DELIMITER //
CREATE PROCEDURE `products_update`(
	IN `p_product_id` CHAR(36),
	IN `p_product_code` VARCHAR(12),
	IN `p_description` VARCHAR(100),
	IN `p_price` DECIMAL(7,2),
	IN `p_cost` DECIMAL(7,2)
)
BEGIN
-- update product

UPDATE  products	
	SET	product_code = p_product_code,
			description = p_description,
			price = p_price,
			cost = p_cost

WHERE 	product_id = p_product_id;
END//
DELIMITER ;

-- Dumping structure for table database_1931557.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_id` char(36) NOT NULL DEFAULT uuid(),
  `customer_id` char(36) DEFAULT NULL,
  `product_id` char(36) DEFAULT NULL,
  `quantity` smallint(5) unsigned DEFAULT NULL,
  `product_price` decimal(7,2) unsigned DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`purchase_id`),
  KEY `FK_purchases_customers` (`customer_id`),
  KEY `FK_purchases_products` (`product_id`),
  CONSTRAINT `FK_purchases_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `FK_purchases_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-31         purchases table created\r\n#andres ardila         2021-03-31         primary key and foreign keys implemented\r\n#andres ardila         2021-04-07         change column name from comment to comments, "COMMENT" is a keyword. \r\n\r\n--------details----------\r\nforeign key of customers\r\nforeign key of products\r\nquantity sold (max 999)\r\nproduct price (if price change older orders should not be affected)\r\ncomments (max 200, optional)\r\ncreated_date\r\nmodify date';

-- Dumping data for table database_1931557.purchases: ~2 rows (approximately)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` (`purchase_id`, `customer_id`, `product_id`, `quantity`, `product_price`, `comments`, `creation_date`, `modification_date`) VALUES
	('7aae0557-97fc-11eb-9906-0800272e460d', '1a7cef61-9247-11eb-b238-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 3, 34.99, 'This is a purchase from the stored procedure', '2021-04-07 23:06:28', '2021-04-07 23:06:28'),
	('8512b0c2-9867-11eb-9906-0800272e460d', '59277bed-9203-11eb-b238-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 9, NULL, 'uuyy', '2021-04-08 22:32:50', '2021-04-08 22:32:50'),
	('980d8f0a-97e2-11eb-9906-0800272e460d', '1a7cef61-9247-11eb-b238-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 5, NULL, 'new', '2021-04-07 16:48:23', '2021-04-07 16:49:16');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

-- Dumping structure for procedure database_1931557.purchases_delete
DELIMITER //
CREATE PROCEDURE `purchases_delete`(
	IN `p_purchase_id` CHAR(36)
)
BEGIN
-- delete one purchase by id

DELETE FROM purchases
WHERE	purchase_id = p_purchase_id;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_filter_by_customer
DELIMITER //
CREATE PROCEDURE `purchases_filter_by_customer`(
	IN `p_customer_id` CHAR(36)
)
BEGIN
-- filter all purchases by customer id and sort by creation date
-- 

SELECT 	purchases.purchase_id,
			products.product_code, 
			customers.firstname,
			customers.lastname,
			customers.city,
			purchases.comments,
			purchases.product_price,
			purchases.quantity

FROM	purchases
	INNER JOIN products ON purchases.product_id = products.product_id
	INNER JOIN customers ON purchases.customer_id = customers.customer_id
WHERE	purchases.customer_id = p_customer_id
ORDER BY purchases.creation_date;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_filter_by_date
DELIMITER //
CREATE PROCEDURE `purchases_filter_by_date`(
	IN `p_creation_date` VARCHAR(50)
)
BEGIN
SELECT 	purchases.purchase_id,
	products.product_code, 
	customers.firstname,
	customers.lastname,
	customers.city,
	purchases.comments,
	purchases.product_price,
	purchases.quantity,
	purchases.creation_date,
	purchases.modification_date
FROM	purchases
	INNER JOIN products ON purchases.product_id = products.product_id
	INNER JOIN customers ON purchases.customer_id = customers.customer_id
WHERE	(purchases.creation_date >= p_creation_date OR p_creation_date IS NULL) 
ORDER BY purchases.creation_date;
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_insert
DELIMITER //
CREATE PROCEDURE `purchases_insert`(
	IN `p_customer_id` CHAR(36),
	IN `p_product_id` CHAR(36),
	IN `p_quantity` INT,
	IN `p_product_price` DECIMAL(7,2),
	IN `p_comments` VARCHAR(200)
)
BEGIN
-- insert a new purchase

INSERT INTO purchases (
	customer_id,
	product_id,
	quantity,
	product_price,
	comments	
	)
VALUES 	(
	p_customer_id,
	p_product_id,
	p_quantity,
	p_product_price,
	p_comments
	);	

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_select
DELIMITER //
CREATE PROCEDURE `purchases_select`(
	IN `p_purchase_id` CHAR(36)
)
BEGIN
-- select one row by id

SELECT 	purchase_id,
			customer_id AS 'Customer FK',
			product_id AS 'Product FK',
			quantity,
			product_price,
			comments,
			creation_date,
			modification_date
FROM 		purchases	
WHERE		purchases.purchase_id = p_purchase_id;
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_select_all
DELIMITER //
CREATE PROCEDURE `purchases_select_all`()
BEGIN
-- Selects all rows from the table purchases

SELECT 	purchase_id,
			customer_id AS 'Customer FK',
			product_id AS 'Product FK',
			quantity,
			product_price,
			comments,
			creation_date,
			modification_date
FROM 	purchases
ORDER BY creation_date ASC;


END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_update
DELIMITER //
CREATE PROCEDURE `purchases_update`()
BEGIN
-- update purchase

UPDATE 	purchases
	SET	customer_id = p_customer_id,
			product_id = p_product_id,
			quantity = p_quantity,
			product_price = p_product_price,
			comments = p_comments

WHERE 	purchase_id = p_purchase_id;
END//
DELIMITER ;

-- Dumping structure for view database_1931557.purchases_view_all
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `purchases_view_all` (
	`Id` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Quantity` SMALLINT(5) UNSIGNED NULL,
	`Comments` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`Price` DECIMAL(7,2) UNSIGNED NULL,
	`Creation Date` DATETIME NULL,
	`Modification Date` DATETIME NULL,
	`Product FK` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Product Code` VARCHAR(12) NULL COLLATE 'utf8mb4_general_ci',
	`Description` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`Cost` DECIMAL(7,2) NULL,
	`Product Creation Date` DATETIME NULL,
	`Product Modification Date` DATETIME NULL,
	`Customer FK` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`First Name` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`Last Name` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`Customer Address` VARCHAR(25) NULL COLLATE 'utf8mb4_general_ci',
	`City` VARCHAR(25) NULL COLLATE 'utf8mb4_general_ci',
	`Province` VARCHAR(25) NULL COLLATE 'utf8mb4_general_ci',
	`Postal Code` CHAR(7) NULL COLLATE 'utf8mb4_general_ci',
	`Username` VARCHAR(12) NULL COLLATE 'utf8mb4_general_ci',
	`Password` CHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`Customer Creation Date` DATETIME NULL,
	`Customer Modification Date` DATETIME NULL
) ENGINE=MyISAM;

-- Dumping structure for view database_1931557.purchases_view_all
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `purchases_view_all`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `purchases_view_all` AS select `purchases`.`purchase_id` AS `Id`,`purchases`.`quantity` AS `Quantity`,`purchases`.`comments` AS `Comments`,`purchases`.`product_price` AS `Price`,`purchases`.`creation_date` AS `Creation Date`,`purchases`.`modification_date` AS `Modification Date`,`products`.`product_id` AS `Product FK`,`products`.`product_code` AS `Product Code`,`products`.`description` AS `Description`,`products`.`cost` AS `Cost`,`products`.`creation_date` AS `Product Creation Date`,`products`.`modification_date` AS `Product Modification Date`,`customers`.`customer_id` AS `Customer FK`,`customers`.`firstname` AS `First Name`,`customers`.`lastname` AS `Last Name`,`customers`.`customer_address` AS `Customer Address`,`customers`.`city` AS `City`,`customers`.`province` AS `Province`,`customers`.`postal_code` AS `Postal Code`,`customers`.`user_name` AS `Username`,`customers`.`pwd` AS `Password`,`customers`.`creation_date` AS `Customer Creation Date`,`customers`.`modification_date` AS `Customer Modification Date` from ((`purchases` join `products` on(`purchases`.`product_id` = `products`.`product_id`)) join `customers` on(`purchases`.`customer_id` = `customers`.`customer_id`)) order by 'Creation Date';

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
