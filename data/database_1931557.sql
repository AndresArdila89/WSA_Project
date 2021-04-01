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
  `password` char(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-30          project init\r\n#andres ardila         2021-03-30          customer table created\r\nfirstname, lastname (20 chart long)\r\naddress\r\ncity (8 min)\r\nprovince (max 25 char)\r\npostal code (7 char)\r\nusername (must be unique)(max 12 char)\r\npassword (max 255 characters)';

-- Dumping data for table database_1931557.customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table database_1931557.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_id` char(36) NOT NULL DEFAULT uuid(),
  `customer_id` char(36) DEFAULT NULL,
  `product_id` char(36) DEFAULT NULL,
  `quantity` smallint(5) unsigned DEFAULT NULL,
  `product_price` decimal(7,2) unsigned DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`purchase_id`),
  KEY `FK_purchases_customers` (`customer_id`),
  KEY `FK_purchases_products` (`product_id`),
  CONSTRAINT `FK_purchases_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `FK_purchases_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision history\r\n#DEVELOPER           DATE                    COMMENTS\r\n#andres ardila         2021-03-31         purchases table created\r\n#andres ardila         2021-03-31         primary key and foreign keys implemented\r\n\r\n--------details----------\r\nforeign key of customers\r\nforeign key of products\r\nquantity sold (max 999)\r\nproduct price (if price change older orders should not be affected)\r\ncomments (max 200, optional)\r\ncreated_date\r\nmodify date';

-- Dumping data for table database_1931557.purchases: ~0 rows (approximately)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
