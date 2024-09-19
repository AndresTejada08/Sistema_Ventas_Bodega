CREATE DATABASE dbadonai;
USE dbadonai;

# -------------------------------------------

CREATE TABLE tb_rol (
id_rol INT AUTO_INCREMENT NOT NULL,
rol VARCHAR(255) NOT NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
PRIMARY KEY(id_rol))ENGINE=InnoDB;

CREATE TABLE tb_usuario (
id_usuario INT AUTO_INCREMENT NOT NULL,
nombres VARCHAR(250) NOT NULL,
correo VARCHAR(250) NOT NULL,
contrasena TEXT NOT NULL,
token VARCHAR(100) NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
id_rol INT,
FOREIGN KEY (id_rol) REFERENCES tb_rol(id_rol) ON DELETE RESTRICT ON UPDATE CASCADE,
PRIMARY KEY(id_usuario))ENGINE=InnoDB;

CREATE TABLE tb_categoria (
id_categoria INT AUTO_INCREMENT NOT NULL,
categoria VARCHAR(255) NOT NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
PRIMARY KEY(id_categoria))ENGINE=InnoDB;

CREATE TABLE tb_producto (
id_producto INT AUTO_INCREMENT NOT NULL,
codigo VARCHAR(255) NOT NULL,
producto VARCHAR(255) NOT NULL,
descripcion TEXT NULL,
stock INT NOT NULL,
stock_min INT NULL,
stock_max INT NULL,
precio_compra VARCHAR(255) NOT NULL,
precio_venta VARCHAR(255) NOT NULL,
fecha_ingreso DATE NOT NULL,
imagen TEXT NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
id_categoria INT NOT NULL,
id_usuario INT NOT NULL,
FOREIGN KEY (id_categoria) REFERENCES tb_categoria(id_categoria) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario) ON DELETE NO ACTION	 ON UPDATE CASCADE,
PRIMARY KEY(id_producto))ENGINE=InnoDB;

CREATE TABLE tb_proveedor (
id_proveedor INT AUTO_INCREMENT NOT NULL,
proveedor VARCHAR(255) NOT NULL,
celular VARCHAR(50) NULL,
telefono VARCHAR(50) NULL,
empresa VARCHAR(255) NOT NULL,
correo VARCHAR(50) NULL,
direccion VARCHAR(255) NOT NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
PRIMARY KEY(id_proveedor))ENGINE=InnoDB;

CREATE TABLE tb_compra (
id_compra INT AUTO_INCREMENT NOT NULL,
nro_compra INT NOT NULL,
fecha_compra DATE NOT NULL,
comprobante VARCHAR(50) NOT NULL,
precio_compra VARCHAR(50) NOT NULL,
cantidad INT NOT NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
id_producto INT NOT NULL,
id_proveedor INT NOT NULL,
id_usuario INT NOT NULL,
FOREIGN KEY (id_producto) REFERENCES tb_producto(id_producto) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (id_proveedor) REFERENCES tb_proveedor(id_proveedor) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE,
PRIMARY KEY(id_compra))ENGINE=InnoDB;

CREATE TABLE tb_cliente (
id_cliente INT AUTO_INCREMENT NOT NULL,
cliente VARCHAR(255) NOT NULL,
dni VARCHAR(8) NOT NULL,
celular VARCHAR(15) NULL,
correo VARCHAR(60) NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
PRIMARY KEY(id_cliente))ENGINE=InnoDB;

CREATE TABLE tb_carrito (
id_carrito INT AUTO_INCREMENT NOT NULL,
cantidad INT NOT NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
nro_venta INT NOT NULL,
id_producto INT NOT NULL,
INDEX (nro_venta),
FOREIGN KEY (id_producto) REFERENCES tb_producto(id_producto) ON DELETE NO ACTION ON UPDATE NO ACTION,
PRIMARY KEY(id_carrito))ENGINE=InnoDB;

CREATE TABLE tb_venta (
id_venta INT AUTO_INCREMENT NOT NULL,
total INT NOT NULL,
fecha_creacion DATETIME,
fecha_actualizacion DATETIME,
nro_venta INT NOT NULL,
id_cliente INT NOT NULL,
FOREIGN KEY (nro_venta) REFERENCES tb_carrito(nro_venta) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (id_cliente) REFERENCES tb_cliente(id_cliente) ON DELETE NO ACTION ON UPDATE NO ACTION,
PRIMARY KEY(id_venta))ENGINE=InnoDB;

  
  
  
  
  
  