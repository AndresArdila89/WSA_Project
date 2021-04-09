-------------------- STORED PROCEDURES --------------------
-- REVISION HISTORY:
-- DEVELOPER		DATE		COMMENTS
-- Andres Ardila	2021-04-07	file created 
-- Andres Ardila	2021-04-07	select all rows procedure created
-- Andres Ardila	2021-04-07	select one row procedure created
-- Andres Ardila	2021-04-07	insert customer procedure created
-- Andres Ardila	2021-04-07	update customer procedure created	
-- Andres Ardila	2021-04-07	update,delete,insert,select purchases	-- Andres Ardila	2021-04-08	update,delete,insert,select products		

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
FROM 	customers
ORDER BY creation_date ASC;

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
WHERE	purchase_id = p_purchase_id;
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



-- TABLE PRODUCTS 
-- Select all rows

SELECT 	product_id,
	product_code,
	description,
	price,
	cost,
	creation_date,
	modification_date	
FROM 	products;
	


-- Select one row

SELECT 	product_id,
	product_code,
	description,
	price,
	cost,
	creation_date,
	modification_date	
FROM 	products
	
WHERE	product_id = p_product_id;

-- Insert 

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
	p_cost,
	);	

-- Update 

UPDATE  products	
SET	product_code = p_product_code,
	description = p_description,
	price = p_price,
	cost = p_cost

WHERE 	product_id = p_product_id,

-- Delete 
DELETE FROM products 
WHERE	product_id = p_product_id;


-- GET THE PASSWORD FOR A GIVEN USERNAME

SELECT pwd
FROM customers
WHERE user_name = p_user_name;

-- FILTER PURCHASES by customer

SELECT 	purchases.purchase_id,
	products.product_code, 
	customers.firstname,
	customers.lastname,
	customers.city,
	purchases.comments,
	purchases.product_price,
	purchases.quantity,
	purchases.subtotal,
	purchases.taxes,
	purchases.grand_total
FROM	purchases
	INNER JOIN products ON purchases.product_id = products.product_id
	INNER JOIN customers ON purchases.customer_id = customers.customer_id
WHERE	purchases.customer_id = p_customer_id
ORDER BY purchases.creation_date;


--FILTER PURCHASES by date


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
