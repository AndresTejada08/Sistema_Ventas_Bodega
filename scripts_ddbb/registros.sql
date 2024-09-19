USE dbadonai;
 
# ******************************************************************************

INSERT INTO `tb_cliente` (`dni`, `nombre_cliente`, `direccion`, `estado`) VALUES
('20451245', 'Juan Guerrero Solis', 'Los Alamos', '1'),
('19787575', 'Maria Rosas Villanueva', 'Los Laureles 234', '1'),
('33568912', 'Andres de Santa Cruz', 'Av. La Frontera 347', '1'),
('44224152', 'Andres Mendoza', 'Chosica, Lurigancho', '1');

# ******************************************************************************

INSERT INTO `tb_empleado` (`dni`, `nombre_empleado`, `telefono`, `estado`, `user`) VALUES
('14455123', 'Pedro Hernandez', '988252459', '1', 'emp01'),
('73942123', 'Roman Riquelme', '993522458', '1', 'Jo46'),
('12343398', 'Palermo Suarez', '953536458', '1', 'Em22');

# ******************************************************************************

INSERT INTO `tb_producto` (`nombre_producto`, `precio`, `stock`, `estado`) VALUES
('Teclado Logitech 345 Editado', 150.00, 99, '1'),
('Mouse Logitech 567', 20.00, 98, '1'),
('Laptop Lenovo Ideapad 520', 800.00, 100, '1'),
('HeadPhones Sony M333', 500.00, 98, '1'),
('Producto Nuevo w', 22.00, 35, '1');

# ******************************************************************************

INSERT INTO tb_usuario (nombres, correo, contrasena, token, fecha_creacion, fecha_actualizacion) VALUES
('ANDRES TEJADA', 'vamp@gmail.com', '12345678', 'token0811', '2024-07-10 10:00:00', now()),
('JUAN PEREZ', 'juan.perez@gmail.com', 'password123', 'token1234', '2024-07-12 10:00:01', '2024-07-14 10:00:01'),
('MARIA GOMEZ', 'maria.gomez@gmail.com', 'passw0rd!', 'token5678', '2024-07-13 10:05:37', '2024-07-14 10:05:00'),
('CARLOS LOPEZ', 'carlos.lopez@gmail.com', 'securePa$$', 'token9101', '2024-07-14 10:10:49', '2024-07-14 10:10:01'),
('ANA MARTINEZ', 'ana.martinez@gmail.com', 'myP@ssword', 'token1121', '2024-07-14 10:15:59', '2024-07-14 10:15:44'),
('LUIS RODRIGUEZ', 'luis.rodriguez@gmail.com', 'P@ssw0rd2024', 'token3141', '2024-07-14 10:21:13', '2024-07-14 10:27:07');

# ******************************************************************************

INSERT INTO tb_cliente (cliente, dni, celular, correo, fecha_creacion, fecha_actualizacion) VALUES
('ELBA BEJAR', '70541242', '984998877', 'elbita@gmail.com', now(), null),
('GEPSI SARABIA', '71241544', '993441542', 'gepsi@gmail.com', now(), null);

# ******************************************************************************

SELECT * FROM tb_cliente;
SELECT * FROM tb_empleado;
SELECT * FROM tb_producto;
SELECT * FROM tb_usuario;
  
