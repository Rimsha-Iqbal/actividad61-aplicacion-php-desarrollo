CREATE TABLE empleados (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  apellido VARCHAR(100) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  edad INT UNSIGNED NOT NULL,
  puesto VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO empleados (apellido, nombre, edad, puesto) VALUES('Coloma', 'Javier', 25, 'Contable');
INSERT INTO empleados (apellido, nombre, edad, puesto) VALUES('Oviedo', 'Carmen', 34, 'Administrativo');
INSERT INTO empleados (apellido, nombre, edad, puesto) VALUES('Vargas', 'Pascual', 19, 'Dependiente');
INSERT INTO empleados (apellido, nombre, edad, puesto) VALUES('Donoso', 'Maria', 45, 'Gerente');
INSERT INTO empleados (apellido, nombre, edad, puesto) VALUES('Celis', 'Manuel', 56, 'Dependiente');
INSERT INTO empleados (apellido, nombre, edad, puesto) VALUES('Palencia', 'Jana', 31, 'Dependiente');
INSERT INTO empleados (apellido, nombre, edad, puesto) VALUES('Zamanillo', 'Pedro', 63, 'Repartidor');


