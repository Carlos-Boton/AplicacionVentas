CREATE TABLE `usuario` (
    `idUser` int NOT NULL AUTO_INCREMENT,
    `usuario` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuario` (`idUser`, `usuario`, `password`) VALUES (NULL, 'Tiger', 'a79d43e66f755b370bb6ebe851b83ec35485c1ea5ca8830df94646e28aa13e29');

CREATE TABLE `categoria` (
    `idcategoria` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) NOT NULL,
    `condicion` int(100) NOT NULL,
    PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `producto` (
    `idarticulo` int NOT NULL AUTO_INCREMENT,
    `idcategoria` varchar(50) NOT NULL,
    `nombre` varchar(100) NOT NULL,
    `descripcion` varchar(10) NOT NULL,
    `condicion` int NOT NULL,
    PRIMARY KEY (`idarticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `rutas` (
    `idrutas` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) NOT NULL,
    `condicion` int(100) NOT NULL,
    PRIMARY KEY (`idrutas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `clientes` (
    `idclientes` int NOT NULL AUTO_INCREMENT,
    `idrutas` int(50) NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `condicion` int(100) NOT NULL,
    PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `ventas` (
    `idventa` int NOT NULL AUTO_INCREMENT,
    `idcliente` int NOT NULL,
    `idviaje` int NOT NULL,
    `comprobante` varchar(50) NOT NULL,
    `fecha_hora` datetime NOT NULL,
    `total_venta` decimal(11,2) NOT NULL,
    `estado` varchar(20) NOT NULL,
    PRIMARY KEY (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `detalle_venta` (
    `iddetalle_venta` int NOT NULL AUTO_INCREMENT,
    `idventa` int NOT NULL,
    `idarticulo` int NOT NULL,
    `cantidad` varchar(10) NOT NULL,
    `precio_venta` varchar(10) NOT NULL,
    PRIMARY KEY (`iddetalle_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;