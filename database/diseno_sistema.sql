CREATE TABLE `bitacora_mantenimiento` (
  `codbitacora` int(11) NOT NULL,
  `codmantenimiento` int(11) NOT NULL,
  `codequipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `clientes` (
  `codcliente` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefeno` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `experiencia` varchar(150) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `equipos` (
  `codequipo` int(11) NOT NULL,
  `codtipo_equipo` int(11) NOT NULL,
  `codpropietario` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `mantenimiento` (
  `codmantenimiento` int(11) NOT NULL,
  `codtipo_mant` int(11) NOT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `valor_mantenimiento` varchar(20) DEFAULT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `propietario` (
  `codpropietario` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefeno` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `experiencia` varchar(150) DEFAULT NULL,
  `estado` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `propietario` (`codpropietario`, `nombre`, `direccion`, `telefeno`, `fecha_nacimiento`, `experiencia`, `estado`) VALUES
(1, 'Miguel Tejada', 'Santiago, Villa Flores', '8098557878', '2018-07-09', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'A'),
(2, 'Alberto', 'La Vega', '809-573-4848', '1980-12-01', 'Es una prueba', 'I'),
(3, 'Juan', 'Primavera', '809555555', '2020-07-14', 'novato', 'I'),
(4, 'sdasd', 'sdasd', '', '2020-07-29', ' Descrisdasdpcion Experiencia ', 'I'),
(5, 'Angelo Lopez', 'La Vega', '809-573-4545', '2020-07-28', 'Es programador junior', 'A'),
(6, 'Carlo Diaz', 'La VEga', '809-242-4545', '2020-07-20', ' Ninguna ', 'A'),
(7, 'ssdf', 'sdfsdf', 'dsfsdfd', '2020-07-27', 'dfdsfsd', 'A'),
(8, 'ssdf', 'sdfsdf', 'dsfsdfd', '2020-07-27', 'dfdsfsd', 'A');

CREATE TABLE `tipo_equipo` (
  `codtipo_equipo` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `comentario` text NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tipo_mantenimiento` (
  `codtipo_mant` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `comentario` text NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tipo_mantenimiento` (`codtipo_mant`, `descripcion`, `comentario`, `estado`) VALUES
(2, 'prueba  ', 'prueba', 'A'),
(3, 'prueba', 'prueba', 'A'),
(4, 'prueba', 'prueba', 'A'),
(8, 'PRUEBA 8.5', 'PRUEBA 8.5', 'A'),
(10, 'as', 'as', 'A'),
(11, 'a ', 'prueba', 'A'),
(12, 'a  ', 'prueba222', 'A'),
(14, 'asas', 'asasssa', 'A'),
(15, 'prueba', 'prueba', 'A'),
(16, 'asda', 'asdasasd', 'A'),
(18, 'Prueba 10', 'Ojo prueba 10', 'A');

CREATE TABLE `tripulacion` (
  `codtribulacion` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefeno` varchar(20) DEFAULT NULL,
  `num_horas` varchar(20) DEFAULT NULL,
  `valor_hora` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `viajes` (
  `codviaje` int(11) NOT NULL,
  `valor_viaje` varchar(20) DEFAULT NULL,
  `ruta_viaje` varchar(20) DEFAULT NULL,
  `codcliente` int(11) NOT NULL,
  `codequipo` int(11) NOT NULL,
  `codtribulacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `bitacora_mantenimiento`
  ADD PRIMARY KEY (`codbitacora`),
  ADD KEY `codequipo` (`codequipo`),
  ADD KEY `codmantenimiento` (`codmantenimiento`);

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codcliente`);

ALTER TABLE `equipos`
  ADD PRIMARY KEY (`codequipo`),
  ADD KEY `codpropietario` (`codpropietario`),
  ADD KEY `codtipo_equipo` (`codtipo_equipo`);

ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`codmantenimiento`),
  ADD KEY `codtipo_mant` (`codtipo_mant`);

ALTER TABLE `propietario`
  ADD PRIMARY KEY (`codpropietario`);

ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`codtipo_equipo`);

ALTER TABLE `tipo_mantenimiento`
  ADD PRIMARY KEY (`codtipo_mant`);

ALTER TABLE `tripulacion`
  ADD PRIMARY KEY (`codtribulacion`);

ALTER TABLE `viajes`
  ADD PRIMARY KEY (`codviaje`),
  ADD KEY `codequipo` (`codequipo`),
  ADD KEY `codcliente` (`codcliente`),
  ADD KEY `codtribulacion` (`codtribulacion`);

ALTER TABLE `clientes`
  MODIFY `codcliente` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `equipos`
  MODIFY `codequipo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mantenimiento`
  MODIFY `codmantenimiento` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `propietario`
  MODIFY `codpropietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `tipo_equipo`
  MODIFY `codtipo_equipo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tipo_mantenimiento`
  MODIFY `codtipo_mant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `tripulacion`
  MODIFY `codtribulacion` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `viajes`
  MODIFY `codviaje` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `bitacora_mantenimiento`
  ADD CONSTRAINT `bitacora_mantenimiento_ibfk_1` FOREIGN KEY (`codequipo`) REFERENCES `equipos` (`codequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bitacora_mantenimiento_ibfk_2` FOREIGN KEY (`codmantenimiento`) REFERENCES `mantenimiento` (`codmantenimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`codpropietario`) REFERENCES `propietario` (`codpropietario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`codtipo_equipo`) REFERENCES `tipo_equipo` (`codtipo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`codtipo_mant`) REFERENCES `tipo_mantenimiento` (`codtipo_mant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`codequipo`) REFERENCES `equipos` (`codequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`codcliente`) REFERENCES `clientes` (`codcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`codtribulacion`) REFERENCES `tripulacion` (`codtribulacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
