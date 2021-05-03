-------------------- ALL VIEWS --------------------
-- REVISION HISTORY:
-- DEVELOPER		DATE		COMMENTS
-- Andres Ardila	2021-04-07	view all purchases info created

-- view all purchases

SELECT 	purchases.purchase_id AS Id,
		purchases.quantity AS Quantity,
		purchases.comments AS Comments,	
		purchases.product_price AS Price,
		purchases.subtotal AS Subtotal,
		purchases.taxes_amount AS 'Taxes Amount',
		purchases.grand_total AS 'Grand Total',
		purchases.creation_date AS 'Creation Date',
		purchases.modification_date AS 'Modification Date',
		products.product_id AS 'Product FK',
		products.product_code AS 'Product Code',
		products.description AS Description,
		products.cost AS Cost,
		products.creation_date AS 'Product Creation Date',
		products.modification_date AS 'Product Modification Date',
		customers.customer_id AS 'Customer FK',
		customers.firstname AS 'First Name',
		customers.lastname AS 'Last Name',
		customers.customer_address AS 'Customer Address',
		customers.city AS 'City',
		customers.province AS 'Province',
		customers.postal_code AS 'Postal Code',
		customers.user_name AS 'Username',
		customers.pwd AS 'Password',
		customers.creation_date AS 'Customer Creation Date',
		customers.modification_date AS 'Customer Modification Date'
FROM 	purchases
	INNER JOIN products ON purchases.product_fk = products.product_id
	INNER JOIN customers ON purchases.customer_fk = customers.customer_id
ORDER BY purchases.creation_date ASC;

