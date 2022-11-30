/*DROP DATABASE crud_venta;*/
CREATE DATABASE crud_venta;

USE crud_venta;

CREATE TABLE colores(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50)
);

INSERT INTO colores(nombre) VALUES
	('Blanco'),
	('Negro'),
	('Rojo'),
	('Azul'),
	('Rosado');
	
CREATE TABLE tallas(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(3)
);

INSERT INTO tallas(nombre) VALUES 
	('S'),
	('M'),
	('L'),
	('XL'),
	('XXL');
	
CREATE TABLE camisas(
	id INT AUTO_INCREMENT PRIMARY KEY,
	precio DECIMAL(5,2),
	existencias INT,
	id_talla INT,
	FOREIGN KEY(id_talla) REFERENCES tallas(id),
	id_color INT,
	FOREIGN KEY(id_color) REFERENCES colores(id)
);