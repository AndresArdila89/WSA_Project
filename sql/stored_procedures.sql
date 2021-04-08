-------------------- STORED PROCEDURES --------------------
-- REVISION HISTORY:
-- DEVELOPER		DATE		COMMENTS
-- Andres Ardila	2021-04-07	file created 
-- Andres Ardila	2021-04-07	select all rows procedure created
-- Andres Ardila	2021-04-07	select one row procedure created
-- Andres Ardila	2021-04-07	insert customer procedure created
-- Andres Ardila	2021-04-07	update customer procedure created	
-- Andres Ardila	2021-04-07	update,delete,insert,select purchases		

-- TABLE CUSTOMERS

-- Select all rows
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
FROM 	customers;

-- Select one row
 
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
-- Insert Customer

INSERT INTO customers (
	firstname,
	lastname,
	customer_address,
	city,province,
	postal_code,
	user_name,
	pwd,
	creation_date,
	modification_date
	)
VALUES 	(
	p_firstname,
	p_lastname,
	p_customer_address,
	p_province,
	p_city,
	p_postal_code,
	p_user_name,
	p_pwd
	);	

-- Update Customer 

UPDATE customers
SET	firstname = p_firstname,
	lastname = p_lastname,
	customer_address = p_customer_address,
	province = p_province,
	city = p_city,
	postal_code = p_postal_code,
	user_name = p_user_name,
	pwd = p_pwd
WHERE 	customers.user_name = p_user_name;

-- Delete Customer

DELETE FROM customers
WHERE	customers.user_name = p_user_name;


-- TABLE PURCHASES 
-- Select all rows

SELECT 	purchase_id,
	customer_id AS 'Customer FK',
	product_id AS 'Product FK',
	quantity,
	product_price,
	comments,
	creation_date,
	modification_date
FROM 	purchases;
	


-- Select one row

SELECT 	purchase_id,
	customer_id AS 'Customer FK',
	product_id AS 'Product FK',
	quantity,
	product_price,
	comments,
	creation_date,
	modification_date
FROM 	purchases	
WHERE	purchases.purchase_id = p_purchase_id;
-- Insert 

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
	p_comments,
	);	

-- Update 

UPDATE 	purchases
SET	customer_id = p_customer_id,
	product_id = p_product_id,
	quantity = p_quantity,
	product_price = p_product_price,
	comments = p_comments,

WHERE 	purchase_id = p_purchase_id;

-- Delete 

DELETE FROM purchases
WHERE	purchase_id = p_purchase_id;
