CREATE DATABASE bdfetch;
USE bdfetch;

CREATE TABLE productos
(
	idproducto 	INT AUTO_INCREMENT PRIMARY KEY,
	nombre		VARCHAR(30)		NOT NULL,
	marca		VARCHAR(30)		NOT NULL,
	precio 		DECIMAL(7,2)	NOT NULL
)ENGINE = INNODB;

INSERT INTO productos (nombre, marca, precio) VALUES
	('Teclado', 'Genius', 50),
	('Monitor', 'Samsung', 700),
	('Audífonos', 'Micronics', 40);

ALTER TABLE productos ADD CONSTRAINT uk_nombremarca UNIQUE (nombre, marca);
SELECT * FROM productos;

CREATE TABLE componentes
(
	idcomponente 	INT AUTO_INCREMENT PRIMARY KEY,
	componente 		VARCHAR(50)	NOT NULL,
	fotografia		VARCHAR(90) NOT NULL,
	create_at 		DATETIME		NOT NULL DEFAULT NOW()
)ENGINE = INNODB;

SELECT * FROM componentes;