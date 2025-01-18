# Ostad Module 18 Assignment

### Task: Develop a Product Management System in Laravel & use Eloquent ORM that allows users to perform the following operations:
Create a new product
Read (view) all products
Update an existing product
Delete a product

#### Requirements:
Product Table Structure:
id: Integer, Primary Key
product_id: String, Required, Unique
name: String, Required
description: Text, Optional
price: Decimal, Required
stock: Integer, Optional
image: string, Required
created_at: Timestamp
updated_at: Timestamp
.
#### Routes:
GET /products: List all products
GET /products/create: Show the form to create a new product
POST /products: Store a new product
GET /products/{id}: Show a specific product
GET /products/{id}/edit: Show the form to edit a product
PUT /products/{id}: Update a product
DELETE /products/{id}: Delete a product
.
#### Controllers:
ProductController: Handle all product-related operations using Eloquent ORM for querying the database.

#### Views:
index.blade.php: Display all products with pagination
create.blade.php: Form to create a new product
edit.blade.php: Form to edit an existing product
show.blade.php: View a specific product's details
.
#### Sorting:
Allow sorting by name and price.
Implement sorting links on the index.blade.php page.

#### Search:
Implement search functionality by product_id or description , name, price on the index.blade.php page.
