-- This file contains the queries necessary to construct the database for the project

-- Create table for pizza sizes
CREATE TABLE sizes (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   size VARCHAR(100)
);

-- Create table for crust types
CREATE TABLE crusts (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   crust VARCHAR(100)
);

-- Create table for pizza toppings
CREATE TABLE toppings (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   topping VARCHAR(100)
);

-- Create table to store the pizzas ordered
CREATE TABLE pizzas (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   size_id INT NOT NULL,
   crust_id INT NOT NULL,
   FOREIGN KEY (size_id) REFERENCES sizes(id),
   FOREIGN KEY (crust_id) REFERENCES crusts(id)
);

-- Create table to store the pizzas' toppings
CREATE TABLE pizzas_toppings (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   pizza_id INT NOT NULL,
   topping_id INT NOT NULL, 
   FOREIGN KEY (pizza_id) REFERENCES pizzas(id),
   FOREIGN KEY (topping_id) REFERENCES toppings(id)
);

-- Create table for order statuses
CREATE TABLE orders_status(
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   status VARCHAR(100)
);

-- Create table for orders
CREATE TABLE orders (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   pizza_id INT NOT NULL,
   status_id INT NOT NULL,
   FOREIGN KEY (pizza_id) REFERENCES pizzas(id),
   FOREIGN KEY (status_id) REFERENCES orders_status(id)
);

-- Insert default pizza sizes
INSERT INTO sizes (size) VALUES ('Small'), ('Medium'), ('Large');

-- Insert default crust types
INSERT INTO crusts (crust) VALUES ('Pan'), ('Thin'), ('Gluten Free');

-- Insert default pizza toppings
INSERT INTO toppings (topping) VALUES ('Pepperoni'), ('Chicken'), ('Margherita'), ('Bacon'), ('Pineapple'),
   ('Mozzarella'), ('Sausage'), ('Shrimp'), ('Spinach'), ('Mushroom');
    
-- Insert default order statuses
INSERT INTO orders_status (status) VALUES ('Pending'), ('Preparing'), ('Completed'), ('Cancelled');