create database `bdautopartesmeza`;

use `bdautopartesmeza`;

CREATE TABLE `login` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL auto_increment,
  `fecha_venta` varchar(100) NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `nombre_producto` varchar(102) NOT NULL,
  `cantidad_piezas` int(20) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `direccion` varchar(102) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY  (`id_venta`),
  CONSTRAINT FK_ventas_1
  FOREIGN KEY (login_id) REFERENCES login(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
