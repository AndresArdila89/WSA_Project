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
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `customer_address` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `province` varchar(25) NOT NULL,
  `postal_code` char(7) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `pwd` char(255) NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-30          project init\r\n#andres ardila         2021-03-30          customer table created\r\n#andres aridla         2021-04-07          password column name changed to pwd \r\nfirstname, lastname (20 chart long)\r\naddress\r\ncity (8 min)\r\nprovince (max 25 char)\r\npostal code (7 char)\r\nusername (must be unique)(max 12 char)\r\npassword (max 255 characters)';

-- Dumping data for table database_1931557.customers: ~4 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_id`, `firstname`, `lastname`, `customer_address`, `city`, `province`, `postal_code`, `user_name`, `pwd`, `creation_date`, `modification_date`) VALUES
	('12ab40fc-a654-11eb-85ee-0800272e460d', 'Andres', 'Ardila', '1007 Rue Bellevue', 'asdasd', 'Quebec', 'H9C2Y6', 'andresA', '$2y$10$AN24Ez0NezQsDyIFalZyFeb0rK/NYytlGYKENccZIFuEN0F/fwqti', '2021-04-26 13:38:25', '2021-05-01 01:38:31'),
	('5d4be7db-a8ef-11eb-a30a-0800272e460d', 'Catherine', 'Ospina', '1007 Rue Bellevue', 'Montreal', 'Quebec', 'H9C2Y6', 'Cospina', '$2y$10$xJKlyT65lMCoJ7XFqqOSsetHH/1q/xElN1EsyZS/r/JQ8SXsa8Hy6', '2021-04-29 18:56:47', '2021-04-29 18:56:47'),
	('95843318-abd2-11eb-803d-0800272e460d', 'Urum', 'Aso', 'mont', 'mont', 'sahd', 'sjfd', 'aso', '$2y$10$ELYG5F/LrVjKbIzLq/M3VOS41D4CpZkWwQjM1XAy7ErRml4vnqy/i', '2021-05-03 01:44:10', '2021-05-03 01:44:10'),
	('e74b6f70-a986-11eb-a30a-0800272e460d', 'Aso', 'Urum', 'rue', 'montreal', 'quebec', '123123', 'urum', '$2y$10$HjbSOLZNWvhFHb2TZoRjy.g4KtgS.tvUD5OHJk1XdNtypRNt1Rgge', '2021-04-30 22:17:01', '2021-04-30 22:17:01');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for procedure database_1931557.customers_delete
DELIMITER //
CREATE PROCEDURE `customers_delete`(
	IN `p_user_name` VARCHAR(12),
	IN `p_customer_id` CHAR(36)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-06	procedure created

-- delete one  by id
DELETE FROM customers
WHERE	customers.user_name = p_user_name OR customers.customer_id= p_customer_id;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customers_get_password
DELIMITER //
CREATE PROCEDURE `customers_get_password`(
	IN `p_user_name` VARCHAR(12)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-06	procedure created

# ACCEPTS THE USERNAME AND RETURNS THE PASSWORD IF THERE IS A MATCH

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
	IN `p_province` VARCHAR(25),
	IN `p_postal_code` CHAR(7),
	IN `p_user_name` VARCHAR(12),
	IN `p_pwd` CHAR(255)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-06	procedure created

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

-- Dumping structure for procedure database_1931557.customers_login
DELIMITER //
CREATE PROCEDURE `customers_login`(
	IN `p_username` VARCHAR(12)
)
BEGIN
#REVISION HISTORY
#DEVELOPER				DATE				COMMENTS
#Andres Ardila			2021-04-26		Store procedure creation for loging

SELECT customer_id, firstname, lastname,user_name,pwd
FROM customers
WHERE user_name = p_username;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customers_select
DELIMITER //
CREATE PROCEDURE `customers_select`(
	IN `p_user_name` CHAR(36)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-06	procedure created

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
WHERE	user_name = p_user_name OR customer_id = p_user_name;
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.customers_select_all
DELIMITER //
CREATE PROCEDURE `customers_select_all`()
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-06	procedure created

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

-- Dumping structure for procedure database_1931557.customers_update
DELIMITER //
CREATE PROCEDURE `customers_update`(
	IN `p_customer_id` CHAR(36),
	IN `p_firstname` VARCHAR(20),
	IN `p_lastname` VARCHAR(20),
	IN `p_customer_address` VARCHAR(25),
	IN `p_city` VARCHAR(25),
	IN `p_province` VARCHAR(25),
	IN `p_postal_code` CHAR(7),
	IN `p_user_name` VARCHAR(12),
	IN `p_pwd` CHAR(255)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-06	procedure created

-- update customer

UPDATE customers
	SET	firstname = p_firstname,
			lastname = p_lastname,
			customer_address = p_customer_address,
			province = p_province,
			city = p_city,
			postal_code = p_postal_code,
			pwd = p_pwd,
			modification_date = NOW()
	WHERE customer_id = p_customer_id; 

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.filter_by_date
DELIMITER //
CREATE PROCEDURE `filter_by_date`(
	IN `p_creation_date` DATETIME,
	IN `p_customer_FK` CHAR(36)
)
BEGIN
SELECT * FROM purchases_view_all
WHERE (purchases_view_all.`Creation Date`>= p_creation_date OR purchases_view_all.`Creation Date` = NULL) AND purchases_view_all.`Customer FK`= p_customer_FK;


END//
DELIMITER ;

-- Dumping structure for table database_1931557.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` char(36) NOT NULL DEFAULT uuid(),
  `product_code` varchar(12) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-31          product table created\r\n\r\nproduct code: (max 12)\r\ndescription: (max 100)\r\nprice: (2 decimals, max 10000$)\r\ncost:(2 decimals, optional)';

-- Dumping data for table database_1931557.products: ~3 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `product_code`, `description`, `price`, `cost`, `creation_date`, `modification_date`) VALUES
	('1c201c9f-9204-11eb-b238-0800272e460d', 'P2323', 'This is the updated product', 100.00, 50.00, '2021-03-31 22:16:02', '2021-04-09 09:39:22'),
	('20e41028-9cff-11eb-a493-0800272e460d', 'P4545', 'glass', 100.00, 10.00, '2021-04-17 23:18:45', '2021-04-17 23:18:45'),
	('e781f676-9cfe-11eb-a493-0800272e460d', 'P3434', 'ole', 100.00, 10.00, '2021-04-17 23:17:09', '2021-04-17 23:17:09');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for procedure database_1931557.products_delete
DELIMITER //
CREATE PROCEDURE `products_delete`(
	IN `p_product_id` CHAR(36)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

-- delete one product by id
DELETE FROM products 
WHERE	product_id = p_product_id;
END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.products_get_price
DELIMITER //
CREATE PROCEDURE `products_get_price`(
	IN `p_product_id` CHAR(36)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created
#Andres Ardila		2021-04-17	chage parametor from product id to product code
-- select one row by id

SELECT 	price
FROM 	products
	
WHERE product_id = p_product_id;


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
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

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
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created
#Andres Ardila		2021-04-17	chage parametor from product id to product code
-- select one row by id

SELECT 	product_id,
			product_code,
			description,
			price,
			cost,
			creation_date,
			modification_date	
FROM 	products
	
WHERE product_id = p_product_id;


END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.products_select_all
DELIMITER //
CREATE PROCEDURE `products_select_all`()
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

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
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created
#Andres Ardila		2021-04-17	added modification_date now()
-- update product

UPDATE  products	
	SET	product_code = p_product_code,
			description = p_description,
			price = p_price,
			cost = p_cost,
			modification_date = NOW()

WHERE 	product_id = p_product_id;
END//
DELIMITER ;

-- Dumping structure for table database_1931557.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_id` char(36) NOT NULL DEFAULT uuid(),
  `customer_fk` char(36) NOT NULL,
  `product_fk` char(36) NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `product_price` decimal(7,2) unsigned DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `subtotal` decimal(7,2) DEFAULT NULL,
  `taxes_amount` decimal(7,2) DEFAULT NULL,
  `grand_total` decimal(7,2) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`purchase_id`),
  KEY `FK_purchases_customers` (`customer_fk`) USING BTREE,
  KEY `FK_purchases_products` (`product_fk`) USING BTREE,
  CONSTRAINT `FK_purchases_customers` FOREIGN KEY (`customer_fk`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `FK_purchases_products` FOREIGN KEY (`product_fk`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-31         purchases table created\r\n#andres ardila         2021-03-31         primary key and foreign keys implemented\r\n#andres ardila         2021-04-07         change column name from comment to comments, "COMMENT" is a keyword. \r\n\r\n--------details----------\r\nforeign key of customers\r\nforeign key of products\r\nquantity sold (max 999)\r\nproduct price (if price change older orders should not be affected)\r\ncomments (max 200, optional)\r\ncreated_date\r\nmodify date';

-- Dumping data for table database_1931557.purchases: ~15 rows (approximately)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` (`purchase_id`, `customer_fk`, `product_fk`, `quantity`, `product_price`, `comments`, `subtotal`, `taxes_amount`, `grand_total`, `creation_date`, `modification_date`) VALUES
	('2a06ae52-aa20-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 12, 100.00, 'sdf', 1200.00, 182.40, 1382.40, '2021-05-02 14:04:54', '2021-05-02 14:04:54'),
	('31694be7-aa21-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 3, 100.00, 'sdfs', 300.00, 45.60, 345.60, '2021-05-02 14:12:16', '2021-05-02 14:12:16'),
	('3bbaf627-abd1-11eb-803d-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 12, 100.00, 'Hello this is just for the user', 1200.00, 182.40, 1382.40, '2021-05-03 01:34:30', '2021-05-03 01:34:30'),
	('41a43756-aa21-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 3, 100.00, 'sdfs', 300.00, 45.60, 345.60, '2021-05-02 14:12:43', '2021-05-02 14:12:43'),
	('4a2a2e9e-aa20-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 23, 100.00, 'sdfsd', 2300.00, 349.60, 2649.60, '2021-05-02 14:05:48', '2021-05-02 14:05:48'),
	('5810bb1e-aa21-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 3, 100.00, 'sdfs', 300.00, 45.60, 345.60, '2021-05-02 14:13:21', '2021-05-02 14:13:21'),
	('7380e033-aa20-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 12, 100.00, 'dfsd', 1200.00, 182.40, 1382.40, '2021-05-02 14:06:58', '2021-05-02 14:06:58'),
	('96ba2ee4-aa20-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 23, 100.00, 'sdfs', 2300.00, 349.60, 2649.60, '2021-05-02 14:07:57', '2021-05-02 14:07:57'),
	('a0ada5ae-abd2-11eb-803d-0800272e460d', '95843318-abd2-11eb-803d-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 12, 100.00, 'asd', 1200.00, 182.40, 1382.40, '2021-05-03 01:44:29', '2021-05-03 01:44:29'),
	('c6462dcb-abd1-11eb-803d-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 12, 100.00, 'asd', 1200.00, 182.40, 1382.40, '2021-05-03 01:38:22', '2021-05-03 01:38:22'),
	('d4c84c86-aa21-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 11, 100.00, 'unset', 1100.00, 167.20, 1267.20, '2021-05-02 14:16:50', '2021-05-02 14:16:50'),
	('e96944e3-aa13-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 23, 100.00, 'sdfsdf', 2300.00, 349.60, 2649.60, '2021-05-02 12:37:12', '2021-05-02 12:37:12'),
	('ebc499eb-aa1f-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 12, 100.00, '1sds', 1200.00, 182.40, 1382.40, '2021-05-02 14:03:10', '2021-05-02 14:03:10'),
	('ebfb4296-aa21-11eb-a30a-0800272e460d', '12ab40fc-a654-11eb-85ee-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 11, 100.00, 'unset', 1100.00, 167.20, 1267.20, '2021-05-02 14:17:29', '2021-05-02 14:17:29'),
	('ff7b67f4-abd2-11eb-803d-0800272e460d', '95843318-abd2-11eb-803d-0800272e460d', '1c201c9f-9204-11eb-b238-0800272e460d', 23, 100.00, 'adfsdf', 2300.00, 349.60, 2649.60, '2021-05-03 01:47:08', '2021-05-03 01:47:08');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

-- Dumping structure for procedure database_1931557.purchases_delete
DELIMITER //
CREATE PROCEDURE `purchases_delete`(
	IN `p_purchase_id` CHAR(36)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

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
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

-- filter all purchases by customer id and sort by creation date
SELECT 	purchases.purchase_id,
			products.product_code, 
			customers.firstname,
			customers.lastname,
			customers.city,
			purchases.comments,
			purchases.product_price,
			purchases.quantity

FROM	purchases
	INNER JOIN products ON purchases.product_fk = products.product_id
	INNER JOIN customers ON purchases.customer_fk = customers.customer_id
WHERE	purchases.customer_fk = p_customer_id
ORDER BY purchases.creation_date;

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_filter_by_date
DELIMITER //
CREATE PROCEDURE `purchases_filter_by_date`(
	IN `p_creation_date` VARCHAR(50)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

-- filter purchases by date if no date is input by the user all purchases would be shown

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
	INNER JOIN products ON purchases.product_fk = products.product_id
	INNER JOIN customers ON purchases.customer_fk = customers.customer_id
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
	IN `p_comments` VARCHAR(200),
	IN `p_subtotal` DECIMAL(7,2),
	IN `p_taxes_amount` DECIMAL(7,2),
	IN `p_grand_total` DECIMAL(7,2)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

-- insert a new purchase

INSERT INTO purchases (
	customer_fk,
	product_fk,
	quantity,
	product_price,
	comments,
	subtotal,
	taxes_amount,
	grand_total
	)
VALUES 	(
	p_customer_id,
	p_product_id,
	p_quantity,
	p_product_price,
	p_comments,
	p_subtotal,
	p_taxes_amount,
	p_grand_total
	);	

END//
DELIMITER ;

-- Dumping structure for procedure database_1931557.purchases_select
DELIMITER //
CREATE PROCEDURE `purchases_select`(
	IN `p_purchase_id` CHAR(36)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

-- select one row by id

SELECT 	purchase_id,
			customer_fk,
			product_fk,
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
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

-- Selects all rows from the table purchases

SELECT 	purchase_id,
			customer_fk,
			product_fk,
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
CREATE PROCEDURE `purchases_update`(
	IN `p_purchase_id` CHAR(36),
	IN `p_customer_fk` CHAR(36),
	IN `p_product_fk` CHAR(36),
	IN `p_quantity` INT,
	IN `p_product_price` DECIMAL(7,2),
	IN `p_comments` VARCHAR(200)
)
BEGIN
# Revision history:
#DEVELOPER			DATE			COMMENTS
#Andres Ardila		2021-04-07	procedure created

-- update purchase

UPDATE 	purchases
	SET	customer_fk = p_customer_fk,
			product_fk = p_product_fk,
			quantity = p_quantity,
			product_price = p_product_price,
			comments = p_comments,
			modification_date = NOW()

WHERE 	purchase_id = p_purchase_id;
END//
DELIMITER ;

-- Dumping structure for view database_1931557.purchases_view_all
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `purchases_view_all` (
	`Id` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Quantity` SMALLINT(5) UNSIGNED NOT NULL,
	`Comments` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`Price` DECIMAL(7,2) UNSIGNED NULL,
	`Subtotal` DECIMAL(7,2) NULL,
	`Taxes Amount` DECIMAL(7,2) NULL,
	`Grand Total` DECIMAL(7,2) NULL,
	`Creation Date` DATETIME NULL,
	`Modification Date` DATETIME NULL,
	`Product FK` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Product Code` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Description` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`Cost` DECIMAL(7,2) NULL,
	`Product Creation Date` DATETIME NULL,
	`Product Modification Date` DATETIME NULL,
	`Customer FK` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`First Name` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Last Name` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Customer Address` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`City` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Province` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Postal Code` CHAR(7) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Username` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Password` CHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Customer Creation Date` DATETIME NULL,
	`Customer Modification Date` DATETIME NULL
) ENGINE=MyISAM;

-- Dumping structure for view database_1931557.purchases_view_all
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `purchases_view_all`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `purchases_view_all` AS select `purchases`.`purchase_id` AS `Id`,`purchases`.`quantity` AS `Quantity`,`purchases`.`comments` AS `Comments`,`purchases`.`product_price` AS `Price`,`purchases`.`subtotal` AS `Subtotal`,`purchases`.`taxes_amount` AS `Taxes Amount`,`purchases`.`grand_total` AS `Grand Total`,`purchases`.`creation_date` AS `Creation Date`,`purchases`.`modification_date` AS `Modification Date`,`products`.`product_id` AS `Product FK`,`products`.`product_code` AS `Product Code`,`products`.`description` AS `Description`,`products`.`cost` AS `Cost`,`products`.`creation_date` AS `Product Creation Date`,`products`.`modification_date` AS `Product Modification Date`,`customers`.`customer_id` AS `Customer FK`,`customers`.`firstname` AS `First Name`,`customers`.`lastname` AS `Last Name`,`customers`.`customer_address` AS `Customer Address`,`customers`.`city` AS `City`,`customers`.`province` AS `Province`,`customers`.`postal_code` AS `Postal Code`,`customers`.`user_name` AS `Username`,`customers`.`pwd` AS `Password`,`customers`.`creation_date` AS `Customer Creation Date`,`customers`.`modification_date` AS `Customer Modification Date` from ((`purchases` join `products` on(`purchases`.`product_fk` = `products`.`product_id`)) join `customers` on(`purchases`.`customer_fk` = `customers`.`customer_id`)) order by `purchases`.`creation_date`;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
