USE dbadonai;

# ******************************************************************************

INSERT INTO tb_rol (rol, fecha_creacion, fecha_actualizacion) VALUES
('ADMINISTRADOR', now(), null),
('USUARIO', now(), null),
('ALMACEN', now(), null);

# ******************************************************************************

INSERT INTO tb_usuario (nombres, correo, contrasena, token, fecha_creacion, fecha_actualizacion, id_rol) VALUES
('ANDRES TEJADA', 'vamp@gmail.com', '$2y$10$RpxhA7sUOLwFNpVzJCYm2et4XEMLK5sI8ejiOo6GTz7e4Moq6fZcy', 'token1234', '2024-07-18 10:00:01', null, 1);

# ******************************************************************************

INSERT INTO tb_categoria (categoria, fecha_creacion, fecha_actualizacion) VALUES
('Bebidas', NOW(), null),
('Snacks', NOW(), null),
('Lácteos', NOW(), null),
('Carnes y Embutidos', NOW(), null),
('Frutas y Verduras', NOW(), null),
('Panadería y Pastelería', NOW(), null),
('Cereales y Granos', NOW(), null),
('Condimentos y Especias', NOW(), null),
('Limpieza del Hogar', NOW(), null),
('Higiene Personal', NOW(), null);

# ******************************************************************************

INSERT INTO tb_producto (codigo, producto, descripcion, stock, stock_min, stock_max, precio_compra, precio_venta, fecha_ingreso, imagen, fecha_creacion, fecha_actualizacion, id_categoria, id_usuario) VALUES
('GAS001', 'Gasesosa 3 ltrs.','Gaseosa de la marca Inka kola', 10, 5, 50, '9.50', '12.00', '2024-07-23', NULL, NOW(), null, 1, 6);

# ******************************************************************************

INSERT INTO tb_proveedor (proveedor, celular, telefono, empresa, correo, direccion, fecha_creacion, fecha_actualizacion) VALUES
('Adolfo', '984544556', '084-232225', 'Inka Kola SAC', 'adolfo@gmail.com', 'Av. Emancipación', NOW(), null);

# ******************************************************************************

INSERT INTO tb_compra (nro_compra, fecha_compra, comprobante, precio_compra, cantidad, fecha_creacion, fecha_actualizacion, id_producto, id_proveedor, id_usuario) VALUES
('00001', NOW(), 'FAC-00001', '150.00', 10, NOW(), null, 6, 1, 6);

# ******************************************************************************

# $2y$10$RpxhA7sUOLwFNpVzJCYm2et4XEMLK5sI8ejiOo6GTz7e4Moq6fZcy

SELECT * FROM tb_cliente;
SELECT * FROM tb_empleado;
SELECT * FROM tb_producto;
SELECT * FROM tb_categoria;
SELECT * FROM tb_usuario;
