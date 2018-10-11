DROP DATABASE IF EXISTS pdo_example;

CREATE DATABASE pdo_example;

CREATE TABLE pdo_example.products
(
	productCode CHAR(10) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    cost DECIMAL(10, 2) NOT NULL DEFAULT 0,
    price DECIMAL(10, 2) NOT NULL DEFAULT 0,
    stock INT NOT NULL DEFAULT 0,
    PRIMARY KEY (productCode)
)Engine=InnoDB;