CREATE DATABASE IF NOT EXISTS php_pdo;

USE php_pdo;

DROP TABLE IF EXISTS products;
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (name, price) VALUES
('Laptop Lenovo ThinkPad', 3200.00),
('Mouse Inalambrico Logitech', 85.50),
('Teclado Mecanico Redragon', 199.99),
('Monitor Samsung 24"', 890.00),
('Audifonos Sony WH-1000XM4', 1450.00),
('Silla Ergonomica Ejecutiva', 980.00),
('Disco Duro Externo 1TB', 240.75),
('Webcam Full HD Logitech', 135.00),
('Microfono USB Blue Yeti', 410.90),
('Hub USB-C 7 en 1', 110.00),
('Memoria RAM 16GB DDR4', 320.40),
('Tarjeta de Video RTX 4060', 1850.00),
('Tablet Samsung Galaxy Tab S7', 2600.00),
('Cargador Rapido USB-C', 75.00),
('Impresora Multifuncional HP', 560.00),
('Base Refrigerante para Laptop', 95.99),
('Switch HDMI 4K', 120.00),
('Router Wi-Fi 6 TP-Link', 300.00),
('Cable HDMI 2.1 2m', 35.50),
('Soporte de Monitor Ajustable', 160.00);


CREATE TABLE campers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    documento VARCHAR(30) UNIQUE NOT NULL,
    tipo_documento VARCHAR(20) NOT NULL,
    nivel_ingles TINYINT DEFAULT 0,
    nivel_programacion TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO campers (nombre, edad, documento, tipo_documento, nivel_ingles, nivel_programacion)
VALUES 
('Ana María Ríos', 19, '1001234567', 'Cédula', 4, 3),
('Luis Alberto Peña', 22, '1002234568', 'Cédula', 3, 4),
('Camila Torres', 20, '1003234569', 'Cédula', 5, 5),
('Carlos Méndez', 18, '1004234570', 'TI', 2, 1),
('Laura Galvis', 21, '1005234571', 'Cédula', 3, 3),
('Diego Suárez', 24, '1006234572', 'Cédula', 1, 2),
('Valentina López', 20, '1007234573', 'Cédula', 4, 4),
('Andrés Gómez', 23, '1008234574', 'Pasaporte', 2, 3),
('María Fernanda Ruiz', 25, '1009234575', 'Cédula', 5, 5),
('Jhonatan Páez', 19, '1010234576', 'Cédula', 3, 2);