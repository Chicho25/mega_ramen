-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2018 a las 18:18:49
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mega_ramen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id`, `description`, `stat`) VALUES
(1, 'Panama', 1),
(2, 'Nicaragua', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_condition_terms`
--

CREATE TABLE `crm_condition_terms` (
  `id` int(11) NOT NULL,
  `n_conditions` int(11) NOT NULL,
  `description` text NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_condition_terms`
--

INSERT INTO `crm_condition_terms` (`id`, `n_conditions`, `description`, `stat`, `log_user_register`, `log_time`) VALUES
(1, 0, 'NO TRABAJAMOS POR HOROMETRO.', 1, 1, '2018-02-14 06:43:34'),
(2, 0, 'el tiempo de armado, desarmado y reubicación de la grúa y sus accesorios cuentan como tiempo trabajo  ', 1, 1, '2018-02-14 06:44:38'),
(3, 0, 'Permiso de cierre de calle por gestiÃ³n y cuenta del cliente', 1, 1, '2018-02-14 18:39:43'),
(4, 0, 'Aislamiento del cableado elÃ©ctrico corre por gestiÃ³n y cuenta del cliente.', 1, 1, '2018-02-14 18:40:34'),
(5, 0, 'Cliente provee los punto de levantamiento de la estructura.', 1, 1, '2018-02-14 18:41:24'),
(6, 0, 'No incluye aparejador ni seÃ±alero', 1, 1, '2018-02-14 18:42:10'),
(7, 0, 'Los domingos y dÃ­as feriados tendrÃ¡n un cargo mÃ­nimo de 8 horas min consecutivas y recargo de 30%, y serÃ¡n trabajados segÃºn disponibilidad del operador. ', 1, 1, '2018-02-14 18:45:27'),
(8, 0, 'No nos hacemos responsables por ningÃºn tipo de atraso en el proyecto. En caso de desperfecto en la grÃºa nosotros procederemos a su reparaciÃ³n o de ser posible el reemplazo de la misma, sin embargo, el cliente podrÃ¡ desistir del servicio en caso de considerar el tiempo de reparaciÃ³n o reemplazo muy extenso  ', 1, 1, '2018-02-14 18:51:00'),
(9, 0, 'nuestra pÃ³liza tiene un limite de responsabilidad civil y daÃ±os a terceros de $250,000.00 por lo tanto el cliente nos exonera de toda reclamaciÃ³n superiora este monto en caso de siniestro. Si esta clausula no es aceptable el Ãºnico remedio exclusivo sera desistir del servicio. ', 1, 1, '2018-02-14 19:07:03'),
(10, 0, 'si la lluvia no deja trabajar al menos 5 h, se facturan 5h min. ', 1, 1, '2018-02-14 19:24:39'),
(11, 0, 'El tiempo atascado o encerrado cuenta como tiempo trabajado.', 1, 1, '2018-02-14 19:25:03'),
(12, 0, 'los cambios de fecha de inicio con un dÃ­a hÃ¡bil al info@salernoheavylift.com, de lo contrario se cobraran 5h mÃ­nimas. LTM1800 y RL1600 requieren 6 dÃ­as hÃ¡biles de anticipaciÃ³n  ', 1, 1, '2018-02-14 19:33:21'),
(13, 0, 'El cliente debe preparar el suelo de la grÃºa en todo momento, no nos hacemos responsables por grietas o roturas en el suelo o pavimento.', 1, 1, '2018-02-14 19:35:52'),
(14, 0, 'Tarifas, cargos, Fiscalizacion o cuotas requeridas para entrar al sitio de trabajo corren por cuenta del cliente. El cliente\r\ndebe tramitar, pagar, coordinar permisos, tareas y seguridad requeridas durante y al finalizar el trabajo, para mantener en el sitio\r\nla grÃºa hasta que la misma pueda ser retirada de acuerdo a los horarios y dÃ­as hÃ¡biles que el transito permite para retirar los equipos.', 1, 1, '2018-02-14 19:38:19'),
(15, 0, 'Todo trabajo donde la pieza tenga un valor de $500,000 o mas lleva un seguro cotizado aparte y una supervision especial con un mÃ­nimo de 24 horas de trabajo.', 1, 1, '2018-02-14 19:39:33'),
(16, 0, 'Fajas: El cliente acepta proveer una superficie resistente y libre de aristas, formas cortantes, altas temperaturas etc. Que puedan romper o deteriorar las fajas.', 1, 1, '2018-02-14 19:40:15'),
(17, 0, 'Si la grÃºa no puede accesar al proyecto se considera dÃ­a de espera.', 1, 1, '2018-02-14 19:41:08'),
(18, 0, 'El cliente debe proveer vigilancia al equipo en caso que el mismo deba permanecer en el proyecto.', 1, 1, '2018-02-14 19:41:34'),
(19, 0, 'De requerirse instalaciÃ³n de Jib fijo o abatible y contrapesos adicionales a lo cotizado, tendrÃ¡ un costo adicional.', 1, 1, '2018-02-14 19:42:15'),
(20, 0, 'La grÃºa se mueve sin contrapesos si el terreno estÃ©n Optimas condiciones y plano, de lo contrario se cobrarÂ· el transporte $250/dÃ­a', 1, 1, '2018-02-14 19:43:10'),
(21, 0, 'Toda Disputa comercial o legal serÃ¡ en territorio PanameÃ±o bajo la ley PanameÃ±a.', 1, 1, '2018-02-14 19:44:08'),
(22, 0, 'LA HORA DEL OPERADOR DE LA MAQUINA SON CONSECUTIVOS DESDE EL COMIENZO DEL TURNO DE TRABAJO.', 1, 1, '2018-02-14 19:44:37'),
(23, 0, 'Equipos estÃ¡n sujeto a disponibilidad al momento que sean requeridos.', 1, 1, '2018-02-14 19:49:14'),
(24, 0, 'Para proceder con el trabajo requerimos de orden de compra firmada.', 1, 1, '2018-02-14 19:49:41'),
(25, 0, 'Viernes Santo Cerrado sin operaciones comerciales.', 1, 1, '2018-02-14 19:50:01'),
(26, 0, 'Una vez inicia el trabajo la Ãºnica manera de romper continuidad es cumpliendo con el cargo mÃ­nimo y desmovilizar el equipo.', 1, 1, '2018-02-14 19:50:48'),
(27, 0, 'DÃ­a de Espera 5h sin oper y 8h con oper, sin afectar mÃ­nimos.', 1, 1, '2018-02-14 19:51:34'),
(28, 0, 'Costo por Radio daÃ±ado $267.50', 1, 1, '2018-02-14 19:52:01'),
(29, 0, 'ExtensiÃ³n del periodo de alquiler esta sujeto a disponibilidad.', 1, 1, '2018-02-14 19:52:43'),
(30, 0, 'Tiempo de Charlas Diarias de seguridad cuenta como tiempo de trabajo.', 1, 1, '2018-02-14 19:53:10'),
(31, 0, 'Contado', 1, 1, '2018-02-14 19:53:37'),
(32, 0, 'Procede si el cliente completa nuestros formularios y es aprobado por SHL. El CrÃ©dito mÃ¡ximo es a 30 dÃ­as y comienza desde el cierre de la factura de SHL y envÃ­o al cliente (no al cierre del mes contable del cliente).', 1, 1, '2018-02-14 19:54:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_contact`
--

CREATE TABLE `crm_contact` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `name_contact` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `charge` varchar(30) NOT NULL,
  `phone_1` varchar(20) NOT NULL,
  `phone_2` varchar(20) NOT NULL,
  `phone_3` varchar(20) NOT NULL,
  `extention` varchar(20) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_contact`
--

INSERT INTO `crm_contact` (`id`, `id_customer`, `name_contact`, `last_name`, `email`, `charge`, `phone_1`, `phone_2`, `phone_3`, `extention`, `log_user_register`, `log_time`, `stat`) VALUES
(2, 3, 'Pablo', 'perez', 'perez@gmail.com', 'Gerente ', '2316611', '', '66665555', '', 6, '2018-02-15 19:15:43', 1),
(3, 4, 'Nancy', 'James', 'nancy.james@boskalis.com', 'Departamento de Compras', '3177100', '', '3177100', '', 1, '2018-02-15 19:34:25', 1),
(4, 5, 'Ashleys ', 'CedeÃ±o', 'ashleyrey131@hotmail.com', '0', '0', '66123281', '65675887', '0', 7, '2018-02-19 13:32:51', 1),
(5, 6, 'Francisco', 'Paz', 'fpaz@dycopanama.com', '0', '3220606', '0', '66775536', '0', 7, '2018-02-19 16:50:47', 1),
(6, 7, 'HARRY', 'KING SING', 'hkingsing@gmail.com', 'DUEÃ‘O', '0', '0', '0', '0', 8, '2018-02-19 16:56:49', 1),
(7, 8, 'Irene E', 'Rubides   ', 'contabilidad@grupogardellini.com', 'Asist. Administrativa', '2927132', '0', '63188450', '7133', 7, '2018-02-20 13:38:31', 1),
(8, 9, 'Omar ', 'Salerno Guerrero', 'milla81@gruasshl.com', 'Gerente', '2218877', '0', '67808014', '0', 7, '2018-02-20 14:04:02', 1),
(9, 10, 'WILMA', 'MILLAN', 'wilma@roda.com.pa', 'Gerente de Operaciones', '4301530', '0', '0', '0', 7, '2018-02-20 16:43:16', 1),
(10, 11, 'MIRIELLE ', 'MONTENEGRO', 'mcsapanama@cwpanama.net', 'Asist. Administrativa', '3602373', '0', '0', '0', 7, '2018-02-20 18:39:51', 1),
(11, 12, 'ING TEXILIA', 'VARELA', 'varela@haristmo.net', ' 0', '0', '0', '66786364', '0', 7, '2018-02-20 21:13:52', 1),
(12, 13, 'Francisco', 'Del Cid', 'francisco-26-09@hotmail.com', '0', '0', '0', '67213067', '0', 7, '2018-02-20 21:24:56', 1),
(13, 14, 'Lizbeth', 'Rodriguez', 'lizbeth.rodriguez@lsspanama.com', '0', '3927134', '0', '68383872', '0', 7, '2018-02-20 22:02:55', 1),
(14, 15, 'Reinmar', 'Duncan', 'rduncan@mecshipyards.com', 'Sales Department', '3140179', '3140180', '67470114', '0', 7, '2018-02-21 17:05:15', 1),
(15, 16, 'Jesus', 'Fernandez', 'jfernandez@treelogistics.com', '0', '3202200', '0', '67470181', '0', 7, '2018-02-21 18:46:48', 1),
(16, 17, 'Abraham', 'Dabah', 'abedabah@gmail.com', '0', '0', '0', '66751612', '0', 7, '2018-02-21 19:21:43', 1),
(17, 18, 'Ing Lizbeth', 'Morcillo', 'lmorcillo@unesa.com', 'Ingenieria', '0', '0', '64931923', '0', 7, '2018-02-21 20:59:12', 1),
(18, 19, 'Arjan', 'Missinne', 'td.vi@jandenul.com', 'Technical Superintendent ', '64009386', '0', '64009386', '0', 7, '2018-02-22 16:51:27', 1),
(19, 20, 'Yorian', 'Roa', 'lacasadelaspiscinas.pty@gmail.com', 'Vendedor', '0', '0', '65085191', '0', 7, '2018-02-23 16:10:49', 1),
(20, 21, 'Pedro ', 'Vega', 'pvega@isspanama.com', 'Operaciones', '2757550', '0', '66780361', '0', 7, '2018-02-23 18:46:10', 1),
(21, 22, 'Denis', 'Delgado', 'denis@sedelsa.com', '0', '0', '0', '66760182', '0', 7, '2018-02-23 19:25:43', 1),
(22, 23, 'JOAQUIN', 'MARTINEZ', 'jmb@flse.com', 'Sales Manager', '34933043189', '34933018022', '0', '0', 7, '2018-02-23 20:35:40', 1),
(23, 24, 'Ing Gabriel ', 'Osorio', 'gabriel.osorio@daikinapplied.com', 'Ingenieria', '0', '0', '62515125', '0', 7, '2018-02-23 21:44:47', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_craner`
--

CREATE TABLE `crm_craner` (
  `id` int(11) NOT NULL,
  `name_craner` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `capacity` decimal(11,2) NOT NULL,
  `feather` decimal(11,2) NOT NULL,
  `price_hour` decimal(11,2) NOT NULL,
  `price_day` decimal(11,2) NOT NULL,
  `price_week` decimal(11,2) NOT NULL,
  `price_mon` decimal(11,2) NOT NULL,
  `price_year` decimal(11,2) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_craner`
--

INSERT INTO `crm_craner` (`id`, `name_craner`, `brand`, `model`, `capacity`, `feather`, `price_hour`, `price_day`, `price_week`, `price_mon`, `price_year`, `photo`, `stat`, `log_user_register`, `log_time`) VALUES
(3, 'LTM 1400', 'LIEBHERR', 'LTM ', '400.00', '25.00', '400.00', '400.00', '300.00', '225.00', '100.00', '', 1, 6, '2018-02-15 19:16:46'),
(4, 'GMK5130', 'GROVE', 'GMK5130', '130.00', '0.00', '175.00', '1400.00', '148.75', '148.75', '148.75', 'image_craner/4_thumb.jpg', 1, 1, '2018-02-15 19:37:35'),
(5, 'NATIONAL 571E', 'NATIONAL CRANE', '571E', '18.00', '0.00', '85.00', '680.00', '72.25', '72.25', '72.25', 'image_craner/5_thumb.jpg', 1, 7, '2018-02-16 18:39:09'),
(6, 'BT4485', 'TEREX', 'BT4485', '22.00', '85.00', '85.00', '680.00', '72.25', '72.25', '72.25', 'image_craner/6_thumb.jpg', 1, 7, '2018-02-16 18:41:14'),
(7, 'LTM1100-4.2', 'LIEBHERR', 'LTM1100-4.2', '100.00', '0.00', '175.00', '1400.00', '148.75', '148.75', '141.75', 'image_craner/7_thumb.jpg', 1, 7, '2018-02-16 19:00:52'),
(8, 'FWT60', 'FUWA', 'FWT60', '60.00', '38.00', '200.00', '1600.00', '95.00', '95.00', '95.00', 'image_craner/8_thumb.jpg', 1, 7, '2018-02-16 19:05:40'),
(9, 'TRABAJO A EJECUTAR', 'TRABAJO A EJECUTAR', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 1, 7, '2018-02-19 14:30:23'),
(10, 'SANY SPC400', 'SANY', 'SANY SPC400', '40.00', '0.00', '100.00', '800.00', '85.00', '85.00', '85.00', '', 1, 7, '2018-02-20 14:17:12'),
(11, 'LTM 1050', 'LIEBHERR', 'LTM 1050', '50.00', '0.00', '100.00', '800.00', '85.00', '85.00', '85.00', 'image_craner/11_thumb.jpg', 1, 7, '2018-02-20 18:43:23'),
(12, 'LTM 1080', 'LIEBHERR', 'LTM 1080', '80.00', '0.00', '150.00', '1200.00', '127.50', '127.50', '125.50', 'image_craner/12_thumb.jpg', 1, 7, '2018-02-20 18:44:57'),
(13, 'LTM 1040', 'LIEBHERR', 'LTM 1040', '40.00', '0.00', '100.00', '800.00', '85.00', '85.00', '85.00', 'image_craner/13_thumb.jpg', 1, 7, '2018-02-21 19:24:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_customers`
--

CREATE TABLE `crm_customers` (
  `id` int(11) NOT NULL,
  `trade_name` varchar(100) NOT NULL,
  `legal_name` varchar(100) NOT NULL,
  `ruc` varchar(50) NOT NULL,
  `dv` varchar(50) NOT NULL,
  `address_1` varchar(250) NOT NULL,
  `address_2` varchar(250) NOT NULL,
  `phone_1` varchar(50) NOT NULL,
  `phone_2` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `type_industry` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_customers`
--

INSERT INTO `crm_customers` (`id`, `trade_name`, `legal_name`, `ruc`, `dv`, `address_1`, `address_2`, `phone_1`, `phone_2`, `email`, `fax`, `type_industry`, `country`, `province`, `city`, `log_user_register`, `log_time`, `stat`) VALUES
(3, 'Mec', 'Mec', '4416520', '00', 'milla 8', '', '2315818', '', 'lkdapdab@gmail.com', '', 'Construccion', 'Panama', 'Panama ', 'Panama ', 6, '2018-02-15 19:15:05', 1),
(4, 'BOSKALIS', 'BOSKALIS', '1114-12-1111', '11', 'Vacamonte', '', '3177100', '', 'nancy.james@boskalis.com', '', 'Embarcacion', 'Panama', 'Panama', 'Panama', 1, '2018-02-15 19:33:33', 1),
(5, 'Ashleys Cedeno', 'Ashleys Cedeno', '000000000', '0', '0', '0', '65675887', '66123281', 'ashleyrey131@hotmail.com', '0', 'Transporte', 'Panama', 'Panama', 'Panama', 7, '2018-02-19 13:31:14', 1),
(6, 'DYNAMIC CONSTRUCTION', 'DYNAMIC CONSTRUCTION', '1352924-1-617833', '0', 'Pueblo Nuevo, centro industrial Orillac, calle 81  d oeste, entrando por Bandag de transistmica .\r\n\r\n', '0', '2610121', '', 'fpaz@dycopanama.com', '0', '0', 'Panama', 'Panama', 'Panama', 7, '2018-02-19 16:48:58', 1),
(7, 'HARRY KING SING', 'HARRY KING SING', '0', '0', 'NICARAGUA', '', '0', '0', 'hkingsing@gmail.com', '0', 'gruas', 'NICARAGUA', 'MANAGUA', 'NA', 8, '2018-02-19 16:56:18', 1),
(8, 'Grupo Logistico Gardellini, S.A. ', 'Grupo Logistico Gardellini, S.A. ', '0000000000', '0', '0', '0', '2927132', '63188450', 'contabilidad@grupogardellini.com', '0', 'Transporte', 'Panama', 'Panama', 'Panama', 7, '2018-02-20 13:37:16', 1),
(9, 'GRUAS SALERNO, S.A.', 'GRUAS SALERNO, S.A.', '2384-104-411401', '10', ' SANTA ELENA, PARQUE LEFEVRE', '0', '2218877', '67808014', 'milla81@gruasshl.com', '0', 'Izaje ', 'Panama', 'Panama', 'Panama', 7, '2018-02-20 14:01:52', 1),
(10, 'RODA', 'RODA', '0', '0', '0', '0', '66167528', '0', 'wilma@roda.com.pa', '0', 'Transporte', 'Panama', 'Panama', 'Panama', 7, '2018-02-20 16:42:17', 1),
(11, 'MANTENIMIENTO Y CONSTRUCCION', 'MANTENIMIENTO Y CONSTRUCCION', '0', '0', '0', '0', '3602373', '', 'mcsapanama@cwpanama.net', '0', '0', 'Panama', 'Panama', 'PanamÃ¡', 7, '2018-02-20 18:33:06', 1),
(12, 'HARINAS DE ISTMO', 'HARINAS DE ISTMO', '0', '0', 'TOCUMEN', '0', '66786364', '0', 'varela@haristmo.net', '0', '  0', 'Panama', 'Panama', 'Panama', 7, '2018-02-20 21:13:06', 1),
(13, 'SOLDADURA INDUSTRIALES', 'SOLDADURA INDUSTRIALES', '4-575-45 ', ' 48', 'COLON', '0', '67213067', '0', 'francisco-26-09@hotmail.com', '0', '0', 'Panama', 'COLON', 'COLON', 7, '2018-02-20 21:24:17', 1),
(14, 'lSS PANAMA', 'lSS PANAMA', '0', '0', 'Local 1, Esquina con Calle 74 Oeste y Ave 17C Norte,', 'Bethania, PanamÃ¡ City, PanamÃ¡', '3927134', '0', 'lizbeth.rodriguez@lsspanama.com', '0', 'Transporte', 'Panama', 'Panama', 'Panama', 7, '2018-02-20 22:02:00', 1),
(15, 'MEC ASTILLERO', 'MEC ASTILLERO', '0', '0', 'Balboa; MEC Astilleros; Muelle 8', '0', '3140179', '', 'rduncan@mecshipyards.com', '0', 'Reparaciones Barco', 'Panama', 'Panama', 'Panama', 7, '2018-02-21 17:03:54', 1),
(16, 'TREE LOGISTICS', 'TREE LOGISTICS', '0', '0', '0', '0', '3202200', '67470181', 'jfernandez@treelogistics.com', '0', 'Transporte', 'Panama', 'Panama', 'Panama', 7, '2018-02-21 18:45:17', 1),
(17, 'METALES  24 DE DICIEMBRE', 'METALES  24 DE DICIEMBRE', '0', '0', 'MaÃ±anitas', '0', '66751612', '0', 'abedabah@gmail.com', '0', '0', 'Panama', 'Panama', 'Panama', 7, '2018-02-21 19:18:07', 1),
(18, 'GRUPO SU CASA', 'GRUPO SU CASA', '0000000000', '', '0', '0', '64931923', '0', 'lmorcillo@unesa.com', '0', 'VIVIENDA', 'Panama', 'Panama', 'Panama', 7, '2018-02-21 20:58:28', 1),
(19, 'JAN DE NULL', 'JAN DE NULL', '0', '0', 'PSA  ', '0', '64009386', '0', 'td.vi@jandenul.com', '0', '0', 'Panama', 'Panama', 'Panama', 7, '2018-02-22 16:50:01', 1),
(20, 'LA CASA DE LA PISCINA', 'LA CASA DE LA PISCINA', '0', '0', 'Bejuco', 'Chame', '65085191', '65085191', 'lacasadelaspiscinas.pty@gmail.com', '0', 'Piscina', 'Panama', 'Panama', 'Panama', 7, '2018-02-23 16:09:34', 1),
(21, 'TELFER TANKS', 'TELFER TANKS', '0', '0', 'Diablos', '0', '2757550', '0', 'sef@isspanama.com', '0', '0', 'Panama', 'Panama', 'Panama', 7, '2018-02-23 18:45:01', 1),
(22, 'SERVICIO DELGADO, S.A.', 'SERVICIO DELGADO, S.A.', '0', '0', 'Chilibre ', '0', '66760182', '0', 'denis@sedelsa.com', '0', '0', 'Panama', 'Panama', 'PanamÃ¡', 7, '2018-02-23 19:23:38', 1),
(23, 'FEDERAL LOGISTIC', 'FEDERAL LOGISTIC', '0', '0', 'ESPAÃ‘A', '0', '34933043189', '0', 'jmb@flse.com', '+ 34 933 018 022 ', 'Logistica', 'Panama', 'Panama', 'Panama', 7, '2018-02-23 20:34:43', 1),
(24, 'DAIKIN APPLIED LATIN AMERICA', 'DAIKIN APPLIED LATIN AMERICA', '0', '0', 'Metromall', '0', '62515125', '0', 'gabriel.osorio@daikinapplied.com', '0', '0', 'Panama', 'Panama', 'Panama', 7, '2018-02-23 21:43:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_entry`
--

CREATE TABLE `crm_entry` (
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `id_type_media` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `proyect_name` varchar(250) NOT NULL,
  `work_do` varchar(500) NOT NULL,
  `width_aprox` decimal(11,2) NOT NULL,
  `height_aprox` decimal(11,2) NOT NULL,
  `weight_aprox` decimal(11,2) NOT NULL,
  `proyect_locate` varchar(500) NOT NULL,
  `id_type_work` int(11) NOT NULL,
  `inspection` int(11) NOT NULL,
  `date_form` datetime NOT NULL,
  `number_tickets` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_entry`
--

INSERT INTO `crm_entry` (`stat`, `log_user_register`, `log_time`, `id`, `id_type_media`, `id_country`, `id_customer`, `id_contact`, `proyect_name`, `work_do`, `width_aprox`, `height_aprox`, `weight_aprox`, `proyect_locate`, `id_type_work`, `inspection`, `date_form`, `number_tickets`) VALUES
(3, 6, '2018-02-15 19:18:21', 5, 1, 1, 3, 2, 'Balboa', 'Izaje de estructura', '50.00', '10.00', '25.00', 'Balboa', 1, 1, '2018-02-15 19:17:33', ''),
(3, 1, '2018-02-15 19:42:55', 6, 1, 1, 4, 3, 'Isla de Punta Pacifica No.1', 'Movimiento de 2 contenedores', '2.00', '20.00', '32.00', 'Isla de Punta Pacifica No.1', 1, 1, '2018-02-15 19:39:41', ''),
(4, 7, '2018-02-19 13:44:08', 7, 4, 1, 5, 4, ' Muelle 45 Gatun', 'Izaje de camiÃ³n bomba ', '0.00', '19.00', '45.00', ' Muelle 45 Gatun', 2, 1, '2018-02-19 13:41:58', ''),
(4, 7, '2018-02-19 16:52:16', 8, 5, 1, 6, 5, 'ACP', 'TRANSPORE DE TUBOS', '0.00', '0.00', '0.00', 'acp', 2, 1, '2018-02-19 16:51:11', ''),
(3, 8, '2018-02-19 16:58:35', 9, 4, 2, 7, 6, 'SOPORTE TENICO', 'RevisiÃ³n del sistema elÃ©ctrico del limitador del momento de carga de la\r\nQY100K en las instalaciones de GrÃºas HOCRI en Managua Nicaragua.', '0.00', '0.00', '0.00', 'GRUAS HOCRI en Managua Nicaragua.', 1, 0, '2018-02-19 16:56:55', ''),
(3, 7, '2018-02-20 13:40:08', 10, 2, 1, 8, 7, 'PanamÃ¡ Bond Milla 9, Las cumbres', 'DESCARGA DE MONTACARGA', '0.00', '0.00', '0.00', 'PanamÃ¡ Bond Milla 9, Las cumbres', 2, 1, '2018-02-20 13:38:41', ''),
(4, 7, '2018-02-20 14:05:30', 11, 4, 1, 9, 8, 'Parque lefevre', 'RENTA DESNUDA', '0.00', '0.00', '0.00', 'Parque lefevre', 1, 1, '2018-02-20 14:04:17', ''),
(3, 1, '2018-02-20 15:52:11', 12, 3, 1, 3, 2, '123123123', '12312', '12312.00', '123123.00', '123123.00', '12312', 1, 1, '2018-02-20 15:51:33', '2018000012'),
(3, 7, '2018-02-20 16:44:36', 13, 1, 1, 10, 9, 'Llano Sanchez y Progreso', 'Descarga de transformadores', '0.00', '0.00', '0.00', 'Aguadulce', 2, 1, '2018-02-20 16:43:25', '2018000013'),
(3, 7, '2018-02-20 18:40:54', 14, 1, 1, 11, 10, 'MANZANILLO', 'Izaje de 4 GrÃºas en MIT.', '0.00', '0.00', '0.00', 'MAZANILLO', 1, 1, '2018-02-20 18:40:01', '2018000014'),
(3, 7, '2018-02-20 21:15:05', 15, 5, 1, 12, 11, 'TOCUMEN', 'IZAJE DE  ESTRUCTURA METALICAS', '0.00', '0.00', '0.00', '0', 2, 1, '2018-02-20 21:14:02', '2018000015'),
(3, 7, '2018-02-20 21:27:02', 16, 5, 1, 13, 12, 'Celsia', 'verticalizar tanques ', '0.00', '0.00', '0.00', 'Bahia las Minas', 2, 1, '2018-02-20 21:26:15', '2018000016'),
(3, 7, '2018-02-20 22:05:13', 17, 1, 1, 14, 13, 'Progreso y Llano Sanchez', 'Transporte y descarga de transformador', '0.00', '0.00', '0.00', '0', 2, 1, '2018-02-20 22:04:16', '2018000017'),
(3, 7, '2018-02-21 17:10:00', 18, 1, 1, 15, 14, 'Balboa; MEC Astilleros; Muelle 8', 'Izaje de Antena.', '0.00', '0.00', '0.00', 'Muelle 8', 2, 1, '2018-02-21 17:06:43', '2018000018'),
(3, 7, '2018-02-21 18:49:22', 19, 1, 1, 16, 15, 'LLANO SANCHES Y PROGRESO', 'Descarga y transporte de trasnformadores', '0.00', '0.00', '0.00', '0', 2, 1, '2018-02-21 18:48:22', '2018000019'),
(3, 7, '2018-02-21 19:23:08', 20, 5, 1, 17, 16, 'MaÃ±anita', 'Materiales de GT', '0.00', '0.00', '0.00', '0', 1, 1, '2018-02-21 19:21:56', '2018000020'),
(3, 7, '2018-02-21 21:00:01', 21, 5, 1, 18, 17, 'Via EspaÃ±a', 'Aramdo de grua torre 2da etapa', '0.00', '0.00', '0.00', '0', 2, 1, '2018-02-21 20:59:20', '2018000021'),
(3, 7, '2018-02-22 16:53:47', 22, 1, 1, 19, 18, 'PSA FASE 1', 'Peso de pieza: max 8T;', '0.00', '0.00', '0.00', '0', 1, 1, '2018-02-22 16:51:35', '2018000022'),
(3, 7, '2018-02-23 16:11:43', 23, 5, 1, 20, 19, 'Bejuco', 'Izaje y descarga de pisicina', '0.00', '0.00', '0.00', 'Bejuco', 2, 1, '2018-02-23 16:11:00', '2018000023'),
(6, 1, '2018-02-23 17:59:06', 24, 1, 1, 3, 2, 'prueba tayron', 'prueba tayron', '123.00', '123.00', '123.00', 'prueba tayron', 2, 1, '2018-02-23 17:58:06', '2018000024'),
(8, 1, '2018-02-23 17:59:40', 25, 4, 1, 3, 2, 'prueba tayron 2', 'prueba tayron 2', '123.00', '123.00', '132.00', 'prueba tayron 2', 1, 1, '2018-02-23 17:59:06', '2018000025'),
(6, 1, '2018-02-23 18:00:19', 26, 2, 1, 3, 2, 'prueba tayron 3', 'prueba tayron 3', '123.00', '123.00', '123.00', 'prueba tayron 3', 1, 1, '2018-02-23 17:59:40', '2018000026'),
(3, 7, '2018-02-23 18:47:15', 27, 1, 1, 21, 20, 'Diablo', 'Izaje  de contenedores ', '0.00', '0.00', '5.00', 'Diablo', 2, 1, '2018-02-23 18:46:18', '2018000027'),
(6, 7, '2018-02-23 19:28:02', 28, 4, 1, 21, 20, 'Chilibre', 'Izaje de turbinas', '0.00', '0.00', '10.00', 'Chilibre', 2, 1, '2018-02-23 19:26:01', '2018000028'),
(3, 7, '2018-02-23 19:38:23', 29, 4, 1, 22, 21, 'Chilbre', 'Izaje de turbinas', '0.00', '15.00', '10.00', 'Planta potabilizadora de Chilibre', 2, 1, '2018-02-23 19:37:13', '2018000029'),
(3, 7, '2018-02-23 20:42:07', 30, 1, 1, 23, 22, 'CHIRIQUI-AGUADULCE', 'DESCARGA DE TRANSFORMADORES', '0.00', '0.00', '0.00', 'CHIRIQUI-AGUADULCE', 2, 1, '2018-02-23 20:37:40', '2018000030'),
(3, 7, '2018-02-23 21:47:53', 31, 1, 1, 24, 23, 'Metromall', 'Desmontaje  e izaje de chillers', '0.00', '26.00', '1.90', 'Tocumen', 2, 1, '2018-02-23 21:47:09', '2018000031'),
(6, 1, '2018-02-24 14:48:11', 32, 1, 1, 3, 2, 'prueba ernesto', 'prueba ernesto', '123.00', '123.00', '123.00', 'prueba ernesto', 1, 1, '2018-02-24 14:47:37', '2018000032'),
(8, 1, '2018-03-01 18:16:18', 33, 1, 1, 3, 2, 'prueba Tayron 123', 'prueba Tayron 123', '13.00', '123.00', '123.00', 'prueba Tayron 123', 1, 1, '2018-03-01 18:15:37', '2018000033'),
(3, 1, '2018-03-12 19:45:06', 34, 1, 1, 3, 2, 'prueba Tayron 444', 'sdasd', '123.00', '123.00', '123.00', '123', 1, 1, '2018-03-12 19:44:40', '2018000034');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_notes`
--

CREATE TABLE `crm_notes` (
  `id` int(11) NOT NULL,
  `type_note` int(11) NOT NULL,
  `conten_note` text NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `id_entry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_quot`
--

CREATE TABLE `crm_quot` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_entry` int(11) NOT NULL,
  `proyect_name` varchar(225) NOT NULL,
  `adress_proyect` varchar(400) NOT NULL,
  `contact_site` varchar(50) NOT NULL,
  `description_charge` varchar(500) NOT NULL,
  `dimensions` varchar(50) NOT NULL,
  `radio_giro` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight_max` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perception_value_work` varchar(400) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `customer_service_agreement` varchar(400) NOT NULL,
  `comentary` text NOT NULL,
  `taxable_sale` decimal(11,2) NOT NULL,
  `non_taxable_sale` decimal(11,2) NOT NULL,
  `itbms` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `date_save` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `date_send` datetime NOT NULL,
  `date_cancel` datetime NOT NULL,
  `id_contact` int(11) NOT NULL,
  `id_user_finish` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `number_tickets` varchar(20) NOT NULL,
  `n_invoice` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_quot`
--

INSERT INTO `crm_quot` (`id`, `id_customer`, `id_entry`, `proyect_name`, `adress_proyect`, `contact_site`, `description_charge`, `dimensions`, `radio_giro`, `height`, `weight_max`, `email`, `perception_value_work`, `id_seller`, `customer_service_agreement`, `comentary`, `taxable_sale`, `non_taxable_sale`, `itbms`, `total`, `stat`, `log_user_register`, `log_time`, `date_save`, `date_end`, `date_send`, `date_cancel`, `id_contact`, `id_user_finish`, `version`, `number_tickets`, `n_invoice`) VALUES
(33, 3, 5, 'Balboa', 'Balboa', 'Carlos', 'Estructuras de acero', '2.60', '15', '20', '35', 'irma.rodriguez@gruasshl.com', 'Balboa', 6, 'al contado ', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA', '3200.00', '2000.00', '224.00', '5424.00', 5, 6, '2018-02-15 19:22:03', '2018-02-15 19:22:03', '0000-00-00 00:00:00', '2018-02-15 19:22:30', '0000-00-00 00:00:00', 2, 6, 1, '', ''),
(34, 4, 6, 'Isla de Punta Pacifica No.1', 'Isla de Punta Pacifica No.1', 'Kuijl Hugo van', 'Movimiento de contenedores', '0', '16', '20', '32', 'moira.chavez@gruasshl.com', 'Isla de Punta Pacifica No.1', 1, 'Lev. 32 ton, a un radio de 16 m y un alto de 20 m', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '1400.00', '200.00', '98.00', '1698.00', 5, 1, '2018-02-15 19:47:03', '2018-02-15 19:47:03', '0000-00-00 00:00:00', '2018-02-15 19:47:26', '0000-00-00 00:00:00', 3, 1, 1, '', ''),
(35, 5, 7, ' Muelle 45 Gatun', ' Muelle 45 Gatun', 'Ashleys ', 'Camion Bomba', '0', '0', '15', '45', 'ashleyrey131@hotmail.com', '0', 7, 'ev 22.5 ton, a un radio de 8 m y un 15m, LTM 1100 \r\nlev 22.5 ton, a un radio de 7 m y un 15m, LTM 1080', 'nbnbnnbn', '0.00', '0.00', '0.00', '0.00', 7, 7, '2018-02-19 14:22:14', '2018-02-19 14:22:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-19 14:24:35', 4, 0, 1, '', ''),
(36, 5, 7, ' Muelle 45 Gatun', ' Muelle 45 Gatun', '', '0', '0', '0', '0', '45', 'ashleyrey131@hotmail.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '0.00', '0.00', '0.00', '0.00', 7, 7, '2018-02-19 14:29:23', '2018-02-19 14:29:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-19 14:31:39', 4, 0, 1, '', ''),
(37, 5, 7, ' Muelle 45 Gatun', ' Muelle 45 Gatun', '', '0', '0', '0', '0', '45', 'ashleyrey131@hotmail.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '7000.00', '0.00', '490.00', '7490.00', 4, 7, '2018-02-19 14:34:04', '2018-02-19 14:34:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 0, 1, '', ''),
(38, 4, 6, 'Isla de Punta Pacifica No.1', 'Isla de Punta Pacifica No.1', 'qweqwe', 'qweqwwe', '123', '123', '123', '1231', 'tayronperez17@gmail.com', 'asdeasd', 1, '12asdas', 'asdasd', '1400.00', '0.00', '98.00', '1498.00', 5, 1, '2018-02-19 16:45:54', '2018-02-19 16:45:54', '0000-00-00 00:00:00', '2018-02-19 16:46:13', '0000-00-00 00:00:00', 3, 1, 2, '', ''),
(39, 7, 9, 'SOPORTE TENICO', 'GRUAS HOCRI en Managua Nicaragua.', 'HARRY SING', '0', '0', '0', '0', '0', '', '0', 8, '0', 'Cliente Cubre con gastos de hospedaje, alimentaciÃ³n y traslados.\r\nCliente cubre Tiquetes aÃ©reos.\r\nTiempo de vuelo y traslado es considerado tiempo de trabajo al 50% de la rata que aplique. \r\nNo incluye piezas, ni los materiales.\r\nNo incluye trÃ¡mites de aduanas y costos que puedan surgir por el traslado de herramientas o\r\ninstrumentos para el trabajo a realizar.', '0.00', '1000.00', '0.00', '1000.00', 5, 8, '2018-02-19 17:06:54', '2018-02-19 17:06:54', '0000-00-00 00:00:00', '2018-02-19 20:13:32', '0000-00-00 00:00:00', 6, 1, 1, '', ''),
(40, 6, 8, 'ACP', 'Acp', '0', '0', '0', '0', '0', '0', 'fpaz@dycopanama.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA EQUIPO NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERÃ\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '0.00', '111650.00', '0.00', '111650.00', 7, 7, '2018-02-19 17:10:53', '2018-02-19 17:10:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-19 17:15:15', 5, 0, 1, '', ''),
(41, 6, 8, 'ACP', 'acp', '0', '0', '0', '0', '0', '0', 'fpaz@dycopanama.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LAEQUIPO NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '0.00', '111650.00', '0.00', '111650.00', 4, 7, '2018-02-19 17:18:25', '2018-02-19 17:18:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 0, 1, '', ''),
(42, 3, 5, 'Balboa', 'Balboa', '123', 'ASas', '123', '123', '1231', '123', 'tayronperez17@gmail.com', 'ASas', 6, 'AS', 'asAS', '1400.00', '75.00', '98.00', '1573.00', 5, 1, '2018-02-19 18:25:39', '2018-02-19 18:25:39', '0000-00-00 00:00:00', '2018-02-19 18:25:45', '0000-00-00 00:00:00', 2, 1, 2, '', ''),
(43, 3, 5, 'Balboa', 'Balboa', 'asda', 'ASDASDA', '123', '1231', '123', '23', 'perez@gmail.com', 'DASD', 6, 'ASDAS', 'SDASDA', '175.00', '25.00', '12.25', '212.25', 5, 1, '2018-02-19 18:39:36', '2018-02-19 18:39:36', '0000-00-00 00:00:00', '2018-02-19 18:39:42', '0000-00-00 00:00:00', 2, 1, 3, '', ''),
(44, 3, 5, 'Balboa', 'Balboa', '23', '23', '23', '23', '23', '23', 'tayronperez17@gmail.com', '2323', 6, '232', '32323', '2000.00', '12000.00', '140.00', '14140.00', 5, 1, '2018-02-19 18:47:45', '2018-02-19 18:47:45', '0000-00-00 00:00:00', '2018-02-19 18:47:49', '0000-00-00 00:00:00', 2, 1, 4, '', ''),
(45, 3, 5, 'Balboa', 'Balboa', '234', 'werwer', '234', '234', '234', '234', 'perez@gmail.com', 'werw', 6, 'werwer', 'werwer', '175.00', '5000.00', '12.25', '5187.25', 5, 1, '2018-02-19 18:55:10', '2018-02-19 18:55:10', '0000-00-00 00:00:00', '2018-02-19 18:55:24', '0000-00-00 00:00:00', 2, 1, 5, '', ''),
(46, 3, 5, 'Balboa', 'Balboa', '123', 'qweqwe', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'qweqwe', 6, 'qwe', 'asdasd', '1200.00', '1233.00', '84.00', '2517.00', 5, 1, '2018-02-19 19:07:28', '2018-02-19 19:07:28', '0000-00-00 00:00:00', '2018-02-19 19:08:06', '0000-00-00 00:00:00', 2, 1, 6, '', ''),
(47, 3, 5, 'Balboa', 'Balboa', 'qweq', 'qweqw', '123', '123', '123', '123', 'perez@gmail.com', 'qweqw', 6, 'qweqwe', 'asdasd', '1400.00', '1234.00', '98.00', '2732.00', 5, 1, '2018-02-19 19:09:55', '2018-02-19 19:09:55', '0000-00-00 00:00:00', '2018-02-19 19:10:07', '0000-00-00 00:00:00', 2, 1, 7, '', ''),
(48, 3, 5, 'Balboa', 'Balboa', 'asdasd', 'asdas', '123', '123', '123', '123', 'perez@gmail.com', 'dasd', 6, 'asda', 'asdasd', '175.00', '222.00', '12.25', '409.25', 5, 1, '2018-02-19 19:15:13', '2018-02-19 19:15:13', '0000-00-00 00:00:00', '2018-02-19 19:15:24', '0000-00-00 00:00:00', 2, 1, 8, '', ''),
(49, 3, 5, 'Balboa', 'Balboa', '', 'asc', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'ascasc', 6, 'ascasc', 'ascascasd', '148.75', '25.00', '10.41', '184.16', 5, 1, '2018-02-19 19:23:03', '2018-02-19 19:23:03', '0000-00-00 00:00:00', '2018-02-19 19:23:58', '0000-00-00 00:00:00', 2, 1, 9, '', ''),
(50, 3, 5, 'Balboa', 'Balboa', 'asdasd', 'asdasd', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'asdasd', 6, 'asdas', 'asdasd', '0.00', '0.00', '0.00', '0.00', 5, 1, '2018-02-19 19:25:51', '2018-02-19 19:25:51', '0000-00-00 00:00:00', '2018-02-19 19:26:06', '0000-00-00 00:00:00', 2, 1, 10, '', ''),
(51, 3, 5, 'Balboa', 'Balboa', 'asdasd', 'asdasd', '123', '1231', '123', '23', 'tayronperez17@gmail.com', 'adsasdas', 6, '1e12e', 'asdasda', '148.75', '1249.00', '10.41', '1408.16', 5, 1, '2018-02-19 19:30:34', '2018-02-19 19:30:34', '0000-00-00 00:00:00', '2018-02-19 19:31:13', '0000-00-00 00:00:00', 2, 1, 11, '', ''),
(52, 3, 5, 'Balboa', 'Balboa', '', 'qwdqwd', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'qwdqw', 6, 'dqqw', 'dqwd', '148.75', '1333.00', '10.41', '1492.16', 5, 1, '2018-02-19 19:38:49', '2018-02-19 19:38:49', '0000-00-00 00:00:00', '2018-02-19 19:38:59', '0000-00-00 00:00:00', 2, 1, 12, '', ''),
(53, 3, 5, 'Balboa', 'Balboa', '123', '123', '123', '123', '123', '123', 'tayronperez17@gmail.com', '123', 6, '123', 'asdasd', '1400.00', '15.00', '98.00', '1513.00', 5, 1, '2018-02-19 19:43:56', '2018-02-19 19:43:56', '0000-00-00 00:00:00', '2018-02-19 19:44:06', '0000-00-00 00:00:00', 2, 1, 13, '', ''),
(54, 3, 5, 'Balboa', 'Balboa', 'asxas', 'asxasx', '123', '12', '123', '123', 'tayronperez17@gmail.com', 'asxasx', 6, 'asxas', 'qwewqe', '175.00', '1234.00', '12.25', '1421.25', 5, 1, '2018-02-19 19:58:32', '2018-02-19 19:58:32', '0000-00-00 00:00:00', '2018-02-19 19:59:19', '0000-00-00 00:00:00', 2, 1, 14, '', ''),
(55, 3, 5, 'Balboa', 'Balboa', '123', '123', '23', '1231', '1231', '123', 'perez@gmail.com', '1231', 6, '123', '123123', '85.00', '25.00', '5.95', '115.95', 5, 1, '2018-02-19 20:10:42', '2018-02-19 20:10:42', '0000-00-00 00:00:00', '2018-02-19 20:10:49', '0000-00-00 00:00:00', 2, 1, 15, '', ''),
(56, 8, 10, 'PanamÃ¡ Bond Milla 9, Las cumbres', 'PanamÃ¡ Bond Milla 9, Las cumbres', '0', '0', '0', '0', '0', '0', 'contabilidad@grupogardellini.com', '0', 7, '0', 'CotizaciÃ³n sujeta a que suministre dimensiÃ³n y peso de los bultos y enviÃ© fotos del lugar.', '1650.00', '0.00', '115.50', '1765.50', 7, 7, '2018-02-20 13:46:10', '2018-02-20 13:46:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-20 13:51:38', 7, 0, 1, '', ''),
(57, 8, 10, 'PanamÃ¡ Bond Milla 9, Las cumbres', 'PanamÃ¡ Bond Milla 9, Las cumbres', '0', '0', '0', '0', '0', '0', 'contabilidad@grupogardellini.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '1650.00', '0.00', '115.50', '1765.50', 5, 7, '2018-02-20 13:53:07', '2018-02-20 13:53:07', '0000-00-00 00:00:00', '2018-02-20 13:53:29', '0000-00-00 00:00:00', 7, 7, 1, '', ''),
(58, 9, 11, 'Parque lefevre', 'Parque lefevre', 'Omar Salerno Guerrrer', '0', '0', '0', '0', '0', 'milla81@gruasshl.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '6375.00', '0.00', '446.25', '6821.25', 4, 7, '2018-02-20 14:20:32', '2018-02-20 14:20:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 0, 1, '', ''),
(59, 3, 12, '123123123', '12312', '123', '12312', '123123', '12312', '1231', '123123', 'tayronperez17@gmail.com', '12312', 1, '1231', '1231231', '175.00', '0.00', '12.25', '187.25', 5, 1, '2018-02-20 15:54:44', '2018-02-20 15:54:44', '0000-00-00 00:00:00', '2018-02-20 15:54:55', '0000-00-00 00:00:00', 2, 1, 1, '2018000012', ''),
(60, 10, 13, 'Llano Sanchez y Progreso', 'Aguadulce', 'WILMA MILLAN', '0', '0', '0', '0', '0', 'moira.chavez@gruasshl.com', '0', 7, '0', 'Sin inspeccion', '170000.00', '0.00', '11900.00', '181900.00', 5, 7, '2018-02-20 16:48:51', '2018-02-20 16:48:51', '0000-00-00 00:00:00', '2018-02-20 16:51:32', '0000-00-00 00:00:00', 9, 7, 1, '2018000013', ''),
(61, 10, 13, 'Llano Sanchez y Progreso', 'Aguadulce', '0', '0', '0', '0', '0', '0', 'moira.chavez@gruasshl.com', '0', 7, '0', 'Sin inspeccion, tentativa', '6400.00', '3120.00', '448.00', '9968.00', 5, 7, '2018-02-20 17:00:23', '2018-02-20 17:00:23', '0000-00-00 00:00:00', '2018-02-20 17:00:51', '0000-00-00 00:00:00', 9, 7, 2, '2018000013', ''),
(62, 11, 14, 'MANZANILLO', 'MAZANILLO', 'MIRIELLE', '0', '0', '0', '0', '0', 'mcsapanama@cwpanama.net', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '3400.00', '733.20', '238.00', '4371.20', 5, 7, '2018-02-20 18:55:14', '2018-02-20 18:55:14', '0000-00-00 00:00:00', '2018-02-20 18:59:25', '0000-00-00 00:00:00', 10, 7, 1, '2018000014', ''),
(63, 11, 14, 'MANZANILLO', 'MAZANILLO', '0', '0', '0', '0', '0', '0', 'mcsapanama@cwpanama.net', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '65025.00', '733.20', '4551.75', '70309.95', 5, 7, '2018-02-20 19:57:09', '2018-02-20 19:57:09', '0000-00-00 00:00:00', '2018-02-20 20:00:25', '0000-00-00 00:00:00', 10, 7, 2, '2018000014', ''),
(64, 12, 15, 'TOCUMEN', '0', 'TEXILIA', '0', '0', '0', '0', '0', 'varela@haristmo.net', '0', 7, '0', ' Despejar Ã¡rea de trabajo y asegurar el perÃ­metro\r\n* Manipular la carga, guiar con sogas.\r\n* guiar GrÃºa dentro de las instalaciones.\r\n* suministar personal con equipo de soldadura para asegurar carga sobre los silos.\r\n* limpieza de espacio indicado en campo, caliche, retroexcavadoras, etc.\r\n\r\n ', '1200.00', '0.00', '84.00', '1284.00', 5, 7, '2018-02-20 21:20:08', '2018-02-20 21:20:08', '0000-00-00 00:00:00', '2018-02-20 21:20:40', '0000-00-00 00:00:00', 11, 7, 1, '2018000015', ''),
(65, 13, 16, 'Celsia', 'Bahia las Minas', 'francisco', '0', '0', '0', '0', '0', 'francisco-26-09@hotmail.com', '0', 7, '0', 'Cliente debe enviar costo de los tanques antes de la maniobra\r\n Forma de pago: Por anticipado.', '1500.00', '0.00', '105.00', '1605.00', 5, 7, '2018-02-20 21:35:28', '2018-02-20 21:35:28', '0000-00-00 00:00:00', '2018-02-20 21:35:47', '0000-00-00 00:00:00', 12, 7, 1, '2018000016', ''),
(66, 10, 13, 'Llano Sanchez ', 'Aguadulce', 'Wilma', 'Dercarga de transformador', '0', '0', '0', '0', 'wilma@roda.com.pa', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO. \r\nCondiciones ideales de espacio asumidas.\r\n- Sujeto a inspecciÃ³n.\r\n- Si existen muros cortafuegos se requerirÃ¡ LTM1800.\r\n- Ãrea completamente despejada de cualquier linea elÃ©ctrica, postes, barreras, etc.\r\n- GrÃºa al lado del Transporte.\r\n', '35300.00', '0.00', '2471.00', '37771.00', 5, 7, '2018-02-20 21:43:57', '2018-02-20 21:43:57', '0000-00-00 00:00:00', '2018-02-20 21:44:36', '0000-00-00 00:00:00', 9, 7, 3, '2018000013', ''),
(67, 10, 13, 'Progreso', 'Aguadulce', 'WILMA MILLAN', '0', '0', '0', '0', '0', 'wilma@roda.com.pa', '0', 7, '0', ' Condiciones ideales de espacio asumidas.\r\n- Sujeto a inspecciÃ³n.\r\n- Si existen muros cortafuegos se requerirÃ¡ LTM1800.\r\n- Ãrea completamente despejada de cualquier linea elÃ©ctrica, postes, barreras, etc.\r\n- GrÃºa al lado del Transporte.\r\nSOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '46000.00', '0.00', '3220.00', '49220.00', 5, 7, '2018-02-20 21:48:54', '2018-02-20 21:48:54', '0000-00-00 00:00:00', '2018-02-20 21:49:24', '0000-00-00 00:00:00', 9, 7, 4, '2018000013', ''),
(68, 14, 17, 'Progreso y Llano Sanchez', '0', 'Lizbeth', 'Transporte y descarga de transformadores', '0', '0', '0', '0', 'lizbeth.rodriguez@lsspanama.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '65000.00', '0.00', '4550.00', '69550.00', 5, 7, '2018-02-20 22:08:51', '2018-02-20 22:08:51', '0000-00-00 00:00:00', '2018-02-20 22:08:56', '0000-00-00 00:00:00', 13, 7, 1, '2018000017', ''),
(69, 14, 17, 'Progreso ', '0', '0', '0', '0', '0', '0', '0', 'lizbeth.rodriguez@lsspanama.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '97500.00', '0.00', '6825.00', '104325.00', 5, 7, '2018-02-20 22:10:43', '2018-02-20 22:10:43', '0000-00-00 00:00:00', '2018-02-20 22:11:01', '0000-00-00 00:00:00', 13, 7, 2, '2018000017', ''),
(70, 15, 18, 'Balboa; MEC Astilleros; Muelle 8', 'Muelle 8', '0', '0', '0', '0', '0', '0', 'rduncan@mecshipyards.com', '0', 7, '0', 'Nota: Despejar Ã¡rea de trabajo; ubicar carga dentro de radio de trabajo.', '1500.00', '0.00', '105.00', '1605.00', 5, 7, '2018-02-21 17:22:01', '2018-02-21 17:22:01', '0000-00-00 00:00:00', '2018-02-21 17:23:30', '0000-00-00 00:00:00', 14, 7, 1, '2018000018', ''),
(71, 16, 19, 'LLANO SANCHES Y PROGRESO', '0', '0', 'Descarga y transporte de transformadores', '0', '0', '0', '0', 'jfernandez@treelogistics.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERÃ CON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. ', '97500.00', '0.00', '6825.00', '104325.00', 7, 7, '2018-02-21 18:59:54', '2018-02-21 18:59:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-21 19:00:19', 15, 0, 1, '2018000019', ''),
(72, 16, 19, ' PROGRESO', '0', '0', '0', '0', '0', '0', '0', 'jfernandez@treelogistics.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '99800.00', '0.00', '6986.00', '106786.00', 7, 7, '2018-02-21 19:05:57', '2018-02-21 19:05:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-21 19:07:15', 15, 0, 1, '2018000019', ''),
(73, 16, 19, ' PROGRESO', '0', '0', '0', '0', '0', '0', '0', 'jfernandez@treelogistics.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '99600.00', '0.00', '6972.00', '106572.00', 5, 7, '2018-02-21 19:09:40', '2018-02-21 19:09:40', '0000-00-00 00:00:00', '2018-02-21 19:10:24', '0000-00-00 00:00:00', 15, 7, 1, '2018000019', ''),
(74, 16, 19, 'LLANO SANCHES ', '0', '0', '0', '0', '0', '0', '0', 'jfernandez@treelogistics.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '67100.00', '0.00', '4697.00', '71797.00', 5, 7, '2018-02-21 19:12:31', '2018-02-21 19:12:31', '0000-00-00 00:00:00', '2018-02-21 19:12:44', '0000-00-00 00:00:00', 15, 7, 2, '2018000019', ''),
(75, 17, 20, 'MaÃ±anita', '0', 'Abraham', '0', '0', '0', '0', '0', 'abedabah@gmail.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '2400.00', '0.00', '168.00', '2568.00', 5, 7, '2018-02-21 19:27:07', '2018-02-21 19:27:07', '0000-00-00 00:00:00', '2018-02-21 19:27:48', '0000-00-00 00:00:00', 16, 7, 1, '2018000020', ''),
(76, 18, 21, 'Via EspaÃ±a', '0', '0', '0', '0', '0', '0', '0', 'lmorcillo@unesa.com', '0', 7, '0', 'Mantener el lugar de trabajo despejado, quitar alumas y cualquier otro equipo del area de trabajo.\r\n\r\nArmar la pluma de la manera acordada en la inspecciÃ³n.', '0.00', '0.00', '0.00', '0.00', 5, 7, '2018-02-21 21:07:50', '2018-02-21 21:07:50', '0000-00-00 00:00:00', '2018-02-21 21:08:04', '0000-00-00 00:00:00', 17, 7, 1, '2018000021', ''),
(77, 18, 21, 'Via EspaÃ±a', '0', '0', '0', '0', '0', '0', '0', 'lmorcillo@unesa.com', '0', 7, '0', 'Mantener el lugar de trabajo despejado, quitar alumas y cualquier otro equipo del area de trabajo. Armar la pluma de la manera acordada en la inspecciÃ³n.', '4100.00', '0.00', '287.00', '4387.00', 5, 7, '2018-02-21 21:10:55', '2018-02-21 21:10:55', '0000-00-00 00:00:00', '2018-02-21 21:11:02', '0000-00-00 00:00:00', 17, 7, 2, '2018000021', ''),
(78, 19, 22, 'PSA FASE 1', '0', '', '0', '0', '0', '0', '0', 'td.vi@jandenul.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '1400.00', '1466.40', '98.00', '2964.40', 7, 7, '2018-02-22 17:04:08', '2018-02-22 17:04:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-22 17:05:05', 18, 0, 1, '2018000022', ''),
(79, 19, 22, 'PSA FASE 1', '0', '0', '0', '0', '0', '0', '0', 'td.vi@jandenul.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '1400.00', '887.20', '98.00', '2385.20', 5, 7, '2018-02-22 17:07:11', '2018-02-22 17:07:11', '0000-00-00 00:00:00', '2018-02-22 17:07:28', '0000-00-00 00:00:00', 18, 7, 1, '2018000022', ''),
(80, 4, 6, 'Isla de Punta Pacifica No.1', 'Isla de Punta Pacifica No.1', 'Nancy', 'Izaje y descarga de contenedores', '0', '0', '0', '0', 'nancy.james@boskalis.com', '0', 1, '0', 'Nota: mantener el lugar de trabajo despejado.', '5278.00', '0.00', '369.46', '5647.46', 5, 7, '2018-02-22 18:35:33', '2018-02-22 18:35:33', '0000-00-00 00:00:00', '2018-02-22 18:36:03', '0000-00-00 00:00:00', 3, 7, 3, '', ''),
(81, 20, 23, 'Bejuco', 'Bejuco', 'Yorian', 'Descargar y sacar piscinas de 2.7 ton', '0', '0', '0', '0', 'lacasadelaspiscinas.pty@gmail.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '1800.00', '0.00', '126.00', '1926.00', 5, 7, '2018-02-23 16:21:36', '2018-02-23 16:21:36', '0000-00-00 00:00:00', '2018-02-23 16:22:25', '0000-00-00 00:00:00', 19, 7, 1, '2018000023', ''),
(82, 3, 24, 'prueba tayron', 'prueba tayron', 'prueba tayron', 'prueba tayron', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba tayron', 1, 'prueba tayron', 'prueba tayron', '800.00', '3500.00', '56.00', '4356.00', 5, 1, '2018-02-23 18:10:46', '2018-02-23 18:10:46', '0000-00-00 00:00:00', '2018-02-23 18:17:03', '0000-00-00 00:00:00', 2, 1, 1, '2018000024', ''),
(83, 21, 27, 'Diablo', 'Diablo', '0', '0', '0', '0', '0', '0', 'pvega@isspanama.com', '0', 7, '0', 'ncfhgjgjghj', '0.00', '0.00', '0.00', '0.00', 7, 7, '2018-02-23 18:49:46', '2018-02-23 18:49:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-02-23 18:50:07', 20, 0, 1, '2018000027', ''),
(84, 21, 27, 'Diablo', 'Diablo', 'Pedro', 'Izaje de contenedores', '0', '0', '0', '0', 'pvega@isspanama.com', '0', 7, '0', '* Garantizar espacio para la maniobra, indicados en campo.\r\n* remover carros, retaserrÃ­a, etc.\r\n* asegurar perÃ­metro de trabajo\r\n* definir fecha de maniobra.\r\n* brindar apoyo con escaleras para subir y desamarrar accesorios.', '1100.00', '0.00', '77.00', '1177.00', 5, 7, '2018-02-23 18:56:25', '2018-02-23 18:56:25', '0000-00-00 00:00:00', '2018-02-23 18:56:46', '0000-00-00 00:00:00', 20, 7, 1, '2018000027', ''),
(85, 22, 29, 'Chilbre', 'Planta potabilizadora de Chilibre', 'Denis', 'Izaje de 2 turbinas ', '0', '32', '15', '10', 'denis@sedelsa.com', '4500.00', 7, 'Lev. 10 ton, a un radio de 32 m y un alto de 38 m', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '4500.00', '0.00', '315.00', '4815.00', 5, 7, '2018-02-23 19:43:06', '2018-02-23 19:43:06', '0000-00-00 00:00:00', '2018-02-23 19:43:54', '0000-00-00 00:00:00', 21, 7, 1, '2018000029', ''),
(86, 20, 23, 'Bejuco', 'Bejuco', 'Yorian', 'Descargar y sacar piscinas de 2.7 ton ', '0', '0', '0', '0', 'lacasadelaspiscinas.pty@gmail.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '500.00', '0.00', '35.00', '535.00', 5, 7, '2018-02-23 20:19:01', '2018-02-23 20:19:01', '0000-00-00 00:00:00', '2018-02-23 20:19:05', '0000-00-00 00:00:00', 19, 7, 2, '2018000023', ''),
(87, 3, 26, 'prueba tayron 3', 'prueba tayron 3', 'qweqwe', 'qweqwe', '123', '123', '123', '123', 'yenika.gonzalez@gruasshl.com', 'qweqwe', 1, 'qweqw', 'qweqweq', '150.00', '144.00', '10.50', '304.50', 5, 1, '2018-02-23 20:48:40', '2018-02-23 20:48:40', '0000-00-00 00:00:00', '2018-02-23 20:55:29', '0000-00-00 00:00:00', 2, 9, 1, '2018000026', ''),
(88, 23, 30, 'LLANO SANCHEZ', 'CHIRIQUI-AGUADULCE', 'JOAQUIN', 'DESCARGA DE TRANSFORMADORES', '0', '0', '0', '0', 'jmb@flse.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '73000.00', '0.00', '5110.00', '78110.00', 7, 7, '2018-02-23 20:49:14', '2018-02-23 20:49:14', '0000-00-00 00:00:00', '2018-02-23 20:51:49', '2018-02-23 20:52:36', 22, 7, 1, '2018000030', ''),
(89, 23, 30, 'LLANO SANCHEZ', 'CHIRIQUI', 'Joaquin', 'DESCARGA Y TRANSPORTE', '0', '0', '0', '0', 'jmb@flse.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '77000.00', '0.00', '5390.00', '82390.00', 5, 7, '2018-02-23 20:59:35', '2018-02-23 20:59:35', '0000-00-00 00:00:00', '2018-02-23 21:00:46', '0000-00-00 00:00:00', 22, 7, 1, '2018000030', ''),
(90, 23, 30, 'Progreso', 'AGUADULCE', 'Joaquin', 'Descarga y transporte de transformador', '0', '0', '0', '0', 'jmb@flse.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO', '116236.00', '0.00', '8136.52', '124372.52', 5, 7, '2018-02-23 21:11:05', '2018-02-23 21:11:05', '0000-00-00 00:00:00', '2018-02-23 21:14:40', '0000-00-00 00:00:00', 22, 7, 2, '2018000030', ''),
(91, 15, 18, 'ZARUMA', 'PSA TERMINAL 1', 'Duncan', 'Desmontar los Molinetes', '0', '36', '30', '10', 'rduncan@mecshipyards.com', '0', 7, '0', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO. No incluye pases.', '13000.00', '0.00', '910.00', '13910.00', 5, 7, '2018-02-23 21:26:38', '2018-02-23 21:26:38', '0000-00-00 00:00:00', '2018-02-23 21:28:29', '0000-00-00 00:00:00', 14, 7, 2, '2018000018', ''),
(92, 15, 18, 'PSA', 'PSA TERMINAL 1', 'Duncan', 'DESMONTAR MOLINETES', '0', '24', '30', '10', 'rduncan@mecshipyards.com', '0', 7, 'Lev. 10 ton a un radio de 24 m y un alto de 30 m', 'SOLICITAR INSPECCIÃ“N ANTES DE LA MANIOBRA SI LA GRÃšA NO PUEDE REALIZAR EL TRABAJO EL CLIENTE CORRERA\r\nCON LOS COSTOS, COTIZACIÃ“N TENTATIVA Y SUJETA A CAMBIOS DESPUÃ‰S DE LA INSPECCIÃ“N. FORMA DE PAGO AL\r\nCONTADO. No incluye pases.', '7838.00', '0.00', '548.66', '8386.66', 5, 7, '2018-02-23 21:33:09', '2018-02-23 21:33:09', '0000-00-00 00:00:00', '2018-02-23 21:33:38', '0000-00-00 00:00:00', 14, 7, 3, '2018000018', ''),
(93, 24, 31, 'Metromall', 'Tocumen', 'Metromall', 'Desmontaje e izaje de chillers', '0', '38', '26', '1.9', 'gabriel.osorio@daikinapplied.com', '0', 7, ' Lev. 1.9 ton, a un radio de 38 m y un alto de 26 m.', 'Nota: mantener el lugar de trabajo despejado, obtener un cierre parcial de los estacionamiento', '2603.00', '0.00', '182.21', '2785.21', 5, 7, '2018-02-23 21:58:29', '2018-02-23 21:58:29', '0000-00-00 00:00:00', '2018-02-23 21:59:20', '0000-00-00 00:00:00', 23, 7, 1, '2018000031', ''),
(94, 3, 32, 'prueba ernesto', 'prueba ernesto', 'prueba ernesto', 'prueba ernesto', '123', '123', '123', '123', 'ernesto.ortiz@gruasshl.com', 'prueba ernesto', 1, 'prueba ernesto', 'prueba ernesto', '300.00', '312.00', '21.00', '633.00', 5, 1, '2018-02-24 14:49:36', '2018-02-24 14:49:36', '0000-00-00 00:00:00', '2018-02-24 14:49:43', '0000-00-00 00:00:00', 2, 1, 1, '2018000032', ''),
(95, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123', 1, 'prueba Tayron 123', 'prueba Tayron 123', '680.00', '400.00', '47.60', '1127.60', 5, 1, '2018-03-01 18:17:58', '2018-03-01 18:17:58', '0000-00-00 00:00:00', '2018-03-01 18:18:51', '0000-00-00 00:00:00', 2, 1, 1, '2018000033', ''),
(96, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123123', 'prueba Tayron 123', 'prueba Tayron 123123', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123', 1, 'prueba Tayron 123', 'prueba Tayron 123', '680.00', '400.00', '47.60', '1127.60', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 21:10:58', '0000-00-00 00:00:00', 2, 1, 0, '', ''),
(97, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '12376565', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123ojhjh', 1, 'prueba Tayron 123', 'prueba Tayron 123', '680.00', '400.00', '47.60', '1127.60', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 21:34:47', '0000-00-00 00:00:00', 2, 1, 0, '2018000033', ''),
(98, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '123123', '123', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123123123', 1, 'prueba Tayron 123123123', 'prueba Tayron 123', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 21:40:51', '0000-00-00 00:00:00', 2, 1, 0, '2018000033', ''),
(99, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123 asdas', '123123', '123123', '123123', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123 123123', 1, 'prueba Tayron 123 123123', 'prueba Tayron 123', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 21:54:48', '0000-00-00 00:00:00', 2, 1, 5, '2018000033', ''),
(100, 3, 33, 'prueba Tayron 123asd', 'prueba Tayron 123 asdasd', 'prueba Tayron 123asd', 'prueba Tayron 123 asdasd', '123123', '123123', '123123', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123 fffffff', 1, 'prueba Tayron 123 asdasd', 'prueba Tayron 123 sdfsdf', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 22:16:31', '0000-00-00 00:00:00', 2, 1, 6, '2018000034', ''),
(101, 3, 33, 'prueba Tayron 123 qwe', 'prueba Tayron 123asda', 'prueba Tayron 123 qwe', 'prueba Tayron 123asda', '123123', '12313', '123119', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123 qweq', 1, 'prueba Tayron 123 qweq', 'prueba Tayron 123 scsdc123', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 22:18:28', '0000-00-00 00:00:00', 2, 1, 7, '2018000034', ''),
(102, 3, 33, 'prueba Tayron 123123', 'prueba Tayron 123123', 'prueba Tayron 123123', 'prueba Tayron 123123', '123123', '123123', '123123', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123123', 1, 'prueba Tayron 123123', 'prueba Tayron 123123', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 22:28:30', '0000-00-00 00:00:00', 2, 1, 8, '2018000034', ''),
(103, 3, 33, 'prueba Tayron 123123', 'prueba Tayron 123123', 'prueba Tayron 12313', 'prueba Tayron 123123', '12312', '123123', '123123', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123123', 1, 'prueba Tayron 123123', 'prueba Tayron 123123', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 22:41:21', '0000-00-00 00:00:00', 2, 1, 9, '2018000034', '11111111'),
(104, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123asd', 1, 'prueba Tayron 123asd', 'prueba Tayron 123', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-01 22:58:49', '0000-00-00 00:00:00', 2, 1, 10, '2018000034', ''),
(105, 3, 33, 'prueba Tayron 123qwe', 'prueba Tayron 123qwe', 'prueba Tayron 123qwe', 'prueba Tayron 123qwe', '123123', '123123', '123123', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123we', 1, 'prueba Tayron 123qweq', 'prueba Tayron 123qwe', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-02 15:52:39', '0000-00-00 00:00:00', 2, 1, 11, '2018000034', ''),
(106, 3, 33, 'prueba Tayron 123123', 'prueba Tayron 12323', 'prueba Tayron 12312312', 'prueba Tayron 1231231', '12312312', '123123', '1233', '123123', 'tayronperez17@gmail.com', 'prueba Tayron 123123', 1, 'prueba Tayron 123123', 'prueba Tayron 123qwe', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-02 16:15:02', '0000-00-00 00:00:00', 2, 1, 12, '2018000034', ''),
(107, 3, 33, 'prueba Tayron 123123', 'prueba Tayron 1231231', 'prueba Tayron 12312', 'prueba Tayron 12323', '123123', '1231231', '123123', '12323', 'tayronperez17@gmail.com', 'prueba Tayron 123123123', 1, 'prueba Tayron 12312312', 'prueba Tayron 1231231', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-02 16:58:25', '0000-00-00 00:00:00', 2, 1, 13, '2018000034', ''),
(108, 3, 33, 'prueba Tayron 123321', 'prueba Tayron 123321', 'prueba Tayron 123321', 'prueba Tayron 12331', '123321', '123312', '123321', '12332', 'tayronperez17@gmail.com', 'prueba Tayron 12331', 1, 'prueba Tayron 123321', 'prueba Tayron 123321231', '680.00', '400.00', '47.60', '1127.60', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-02 17:09:06', '0000-00-00 00:00:00', 2, 1, 14, '2018000034', ''),
(109, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123', 1, 'prueba Tayron 123', 'prueba Tayron 123123123', '680.00', '1400.00', '0.00', '2080.00', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-02 17:53:07', '0000-00-00 00:00:00', 2, 1, 15, '2018000034', ''),
(110, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123', 1, 'prueba Tayron 123', 'prueba Tayron 123123123', '680.00', '1400.00', '0.00', '2080.00', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-15 16:57:07', '0000-00-00 00:00:00', 2, 1, 16, '2018000035', ''),
(111, 3, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123', 1, 'prueba Tayron 123', 'prueba Tayron 123123123', '680.00', '1400.00', '0.00', '2080.00', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-15 16:59:31', '0000-00-00 00:00:00', 2, 1, 17, '2018000036', ''),
(112, 5, 33, 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', 'prueba Tayron 123', '123', '123', '123', '123', 'tayronperez17@gmail.com', 'prueba Tayron 123', 1, 'prueba Tayron 123', 'prueba Tayron 123123123', '680.00', '1400.00', '0.00', '2080.00', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-03-15 17:08:07', '0000-00-00 00:00:00', 4, 1, 18, '2018000037', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_quot_producs`
--

CREATE TABLE `crm_quot_producs` (
  `id` int(11) NOT NULL,
  `id_quot` int(11) NOT NULL,
  `id_produc` int(11) NOT NULL,
  `type` decimal(11,2) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itbms` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `comentary` text NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `id_tmp` int(11) NOT NULL,
  `date_finish` datetime NOT NULL,
  `id_user_finish` int(11) NOT NULL,
  `type_product` int(11) NOT NULL,
  `itbms_product` decimal(11,2) NOT NULL,
  `type_detail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_quot_producs`
--

INSERT INTO `crm_quot_producs` (`id`, `id_quot`, `id_produc`, `type`, `price`, `quantity`, `itbms`, `total`, `comentary`, `stat`, `log_user_register`, `log_time`, `id_tmp`, `date_finish`, `id_user_finish`, `type_product`, `itbms_product`, `type_detail`) VALUES
(53, 33, 3, '400.00', '400.00', 8, '224.00', '3.00', 'Izaje de estructura un dÃ­a de 8 horas minimas de trabajo. horas extras 400.00', 1, 6, '2018-02-15 19:22:03', 22, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(54, 33, 4, '2000.00', '2000.00', 1, '224.00', '2.00', 'MOVILIZACIÃ“N ', 1, 6, '2018-02-15 19:22:03', 23, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(55, 34, 4, '175.00', '175.00', 8, '98.00', '1.00', '', 1, 1, '2018-02-15 19:47:03', 24, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(56, 34, 5, '25.00', '25.00', 8, '98.00', '200.00', '', 1, 1, '2018-02-15 19:47:03', 25, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(57, 36, 18, '0.00', '7.00', 0, '0.00', '0.00', 'sIN INSPECCION', 3, 7, '2018-02-19 14:29:23', 26, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(58, 37, 9, '0.00', '7.00', 1, '490.00', '7.00', ' Izaje de  camiÃ³n bomba S 52 SX para montarlo en el transporte.', 1, 7, '2018-02-19 14:34:04', 27, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(59, 38, 7, '1400.00', '1400.00', 1, '98.00', '1498.00', 'sddsdf', 1, 1, '2018-02-19 16:45:54', 29, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(60, 39, 19, '50.00', '50.00', 8, '0.00', '400.00', 'DÃ­as de 8 horas. / Horas Adicionales Durante Semana a la misma rata. / Horas en Domingo, noche o DÃ­as de Fiesta 50% Adicional.', 2, 8, '2018-02-19 17:06:54', 33, '2018-02-19 20:13:32', 1, 1, '0.00', 'Servicio'),
(61, 39, 20, '75.00', '75.00', 8, '0.00', '600.00', 'DÃ­as de 8 horas / Horas Adicionales Durante Semana a la misma rata. / Horas en Domingo, noche o DÃ­as de Fiesta 50% Adicional.', 2, 8, '2018-02-19 17:06:54', 34, '2018-02-19 20:13:32', 1, 1, '0.00', 'Servicio'),
(62, 40, 10, '0.00', '350.00', 319, '0.00', '111650.00', 'Transporte de tubos  de Polietileno  (Minimo 3 tubos por viaje) dia sin viajes a 525.00 el dia', 3, 7, '2018-02-19 17:10:53', 32, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(63, 41, 21, '75.00', '350.00', 319, '0.00', '111650.00', 'Transporte de tubos  de Polietileno  (Minimo 3 tubos por viaje) dia sin viajes a 525.00 el dia', 1, 7, '2018-02-19 17:18:25', 35, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(64, 42, 7, '1400.00', '1400.00', 1, '98.00', '1498.00', '', 1, 1, '2018-02-19 18:25:39', 29, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(65, 42, 21, '75.00', '75.00', 1, '98.00', '75.00', '', 1, 1, '2018-02-19 18:25:39', 37, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(66, 43, 7, '175.00', '175.00', 1, '12.25', '187.25', 'dasda', 1, 1, '2018-02-19 18:39:36', 29, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(67, 43, 17, '25.00', '25.00', 1, '12.25', '25.00', 'asdas', 1, 1, '2018-02-19 18:39:36', 39, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(68, 44, 7, '0.00', '2000.00', 1, '140.00', '2140.00', '23232', 1, 1, '2018-02-19 18:47:45', 29, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(69, 44, 4, '0.00', '4000.00', 3, '140.00', '12000.00', '23232', 1, 1, '2018-02-19 18:47:45', 41, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(70, 45, 7, '175.00', '175.00', 1, '12.25', '187.25', '', 1, 1, '2018-02-19 18:55:10', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Hora'),
(71, 45, 16, '0.00', '5000.00', 1, '12.25', '5000.00', '', 1, 1, '2018-02-19 18:55:10', 43, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(72, 46, 7, '1400.00', '1400.00', 1, '98.00', '1498.00', 'asdedf', 1, 1, '2018-02-19 19:07:28', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Dia'),
(73, 46, 17, '0.00', '1233.00', 1, '98.00', '1233.00', '', 1, 1, '2018-02-19 19:07:28', 45, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(74, 47, 7, '1400.00', '1400.00', 1, '98.00', '1498.00', '', 1, 1, '2018-02-19 19:09:55', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Dia'),
(75, 47, 17, '0.00', '1234.00', 1, '98.00', '1234.00', 'qwe', 1, 1, '2018-02-19 19:09:55', 45, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(76, 48, 7, '175.00', '175.00', 1, '12.25', '187.25', '', 1, 1, '2018-02-19 19:15:13', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Hora'),
(77, 48, 17, '0.00', '222.00', 1, '12.25', '222.00', 'qadascsa', 1, 1, '2018-02-19 19:15:13', 45, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(78, 49, 7, '148.75', '148.75', 1, '10.41', '159.16', '', 1, 1, '2018-02-19 19:23:03', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Semana'),
(79, 49, 17, '25.00', '25.00', 1, '10.41', '25.00', '', 1, 1, '2018-02-19 19:23:03', 45, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Flag'),
(80, 50, 7, '148.75', '148.75', 0, '0.00', '0.00', '123123', 1, 1, '2018-02-19 19:25:51', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Semana'),
(81, 50, 15, '0.00', '134.00', 0, '0.00', '0.00', '123123', 1, 1, '2018-02-19 19:25:51', 50, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(82, 50, 14, '0.00', '1454.00', 0, '0.00', '0.00', '', 1, 1, '2018-02-19 19:25:51', 51, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(83, 51, 7, '148.75', '148.75', 1, '10.41', '159.16', '', 1, 1, '2018-02-19 19:30:34', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Semana'),
(84, 51, 15, '0.00', '1234.00', 1, '10.41', '1234.00', '', 1, 1, '2018-02-19 19:30:34', 50, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(85, 51, 14, '15.00', '15.00', 1, '10.41', '15.00', '', 1, 1, '2018-02-19 19:30:34', 51, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Normal'),
(86, 52, 7, '148.75', '148.75', 1, '10.41', '159.16', '123', 1, 1, '2018-02-19 19:38:49', 29, '0000-00-00 00:00:00', 0, 0, '7.00', 'Mes'),
(87, 52, 15, '100.00', '100.00', 1, '10.41', '100.00', '123', 1, 1, '2018-02-19 19:38:49', 50, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Flag'),
(88, 52, 14, '0.00', '1233.00', 1, '10.41', '1233.00', '', 1, 1, '2018-02-19 19:38:49', 51, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Fijo'),
(89, 53, 7, '1400.00', '1400.00', 1, '98.00', '1498.00', 'adasdsad', 2, 1, '2018-02-19 19:43:56', 29, '2018-02-19 19:44:06', 1, 0, '7.00', ''),
(90, 53, 15, '0.00', '0.00', 1, '98.00', '0.00', '123123', 2, 1, '2018-02-19 19:43:56', 50, '2018-02-19 19:44:06', 1, 1, '0.00', ''),
(91, 53, 14, '15.00', '15.00', 1, '98.00', '15.00', '1133', 2, 1, '2018-02-19 19:43:56', 51, '2018-02-19 19:44:06', 1, 1, '0.00', ''),
(92, 54, 7, '175.00', '175.00', 1, '12.25', '187.25', '123213', 2, 1, '2018-02-19 19:58:32', 29, '2018-02-19 19:59:19', 1, 0, '7.00', ''),
(93, 54, 15, '1234.00', '1234.00', 1, '12.25', '1234.00', '123123', 2, 1, '2018-02-19 19:58:32', 50, '2018-02-19 19:59:19', 1, 1, '0.00', ''),
(94, 55, 6, '85.00', '85.00', 1, '5.95', '90.95', '123123', 2, 1, '2018-02-19 20:10:42', 59, '2018-02-19 20:10:49', 1, 0, '7.00', 'Hora'),
(95, 55, 17, '25.00', '25.00', 1, '5.95', '25.00', '123123', 2, 1, '2018-02-19 20:10:42', 60, '2018-02-19 20:10:49', 1, 1, '0.00', 'Precio Flag'),
(96, 56, 9, '0.00', '1650.00', 1, '115.50', '1765.50', 'Descargar 4 bultos de un contenedor. un dÃ­a de ejecuciÃ³n. Incluye: Montacarga, operador, ayudante y movil ida y vuelta. ', 3, 7, '2018-02-20 13:46:10', 61, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(97, 57, 9, '1650.00', '1650.00', 1, '115.50', '1765.50', 'Descargar 4 bultos de un contenedor. un dÃ­a de ejecuciÃ³n. Incluye: Montacarga, operador, ayudante y movil ida y vuelta. Cliente debe suministrar peso de los bultos', 2, 7, '2018-02-20 13:53:07', 62, '2018-02-20 13:53:29', 7, 0, '7.00', ''),
(98, 58, 10, '85.00', '42.50', 150, '446.25', '6821.25', 'Renta desnudas, por horometro. 150 horas mensuales por 6 meses a 42.50 la hora. ', 1, 7, '2018-02-20 14:20:32', 63, '0000-00-00 00:00:00', 0, 0, '7.00', 'Mes'),
(99, 59, 7, '175.00', '175.00', 1, '12.25', '187.25', '1212', 2, 1, '2018-02-20 15:54:44', 64, '2018-02-20 15:54:55', 1, 0, '7.00', 'Hora'),
(100, 59, 15, '0.00', '0.00', 1, '12.25', '0.00', '1212', 2, 1, '2018-02-20 15:54:44', 65, '2018-02-20 15:54:55', 1, 1, '0.00', 'Precio Fijo'),
(101, 60, 9, '85000.00', '85000.00', 2, '11900.00', '181900.00', 'Descarga de 2 tranformadores ', 2, 7, '2018-02-20 16:48:51', 66, '2018-02-20 16:51:32', 7, 0, '7.00', 'Precio Fijo'),
(102, 61, 3, '400.00', '400.00', 16, '448.00', '6848.00', 'Descargar tranfor', 2, 7, '2018-02-20 17:00:23', 67, '2018-02-20 17:00:51', 7, 0, '7.00', 'Hora'),
(103, 61, 9, '3120.00', '3120.00', 1, '448.00', '3120.00', 'Movilizaciones  ida y vuelta', 2, 7, '2018-02-20 17:00:23', 68, '2018-02-20 17:00:51', 7, 1, '0.00', 'Precio Normal'),
(104, 62, 11, '100.00', '100.00', 8, '238.00', '856.00', 'Izaje de 4 GrÃºas en MIT. Un dia de 8 horas minimas consecutivas de trabajo , horas extra 100.00', 2, 7, '2018-02-20 18:55:14', 69, '2018-02-20 18:59:25', 7, 0, '7.00', 'Hora'),
(105, 62, 12, '150.00', '150.00', 8, '238.00', '1284.00', 'Izaje de 4 GrÃºas en MIT. Un dia de 8 horas minimas consecutivas de trabajo , horas extra 150', 2, 7, '2018-02-20 18:55:14', 70, '2018-02-20 18:59:25', 7, 0, '7.00', 'Hora'),
(106, 62, 7, '175.00', '175.00', 8, '238.00', '1498.00', 'Izaje de 4 GrÃºas en MIT. Un dia de 8 horas minimas consecutivas de trabajo , horas extra 175.00', 2, 7, '2018-02-20 18:55:14', 74, '2018-02-20 18:59:25', 7, 0, '7.00', 'Hora'),
(107, 62, 9, '733.20', '733.20', 1, '238.00', '733.20', 'Movilizacion ida y vuelta de contrapesos de grua de 100 ton', 2, 7, '2018-02-20 18:55:14', 75, '2018-02-20 18:59:25', 7, 1, '0.00', 'Precio Fijo'),
(108, 63, 11, '85.00', '85.00', 180, '4551.75', '16371.00', '	Izaje de 4 GrÃºas en MIT. Un mes de 180 horas , dias de 8 horas minimas consecutivas de trabajo , horas extra 85.00', 2, 7, '2018-02-20 19:57:09', 79, '2018-02-20 20:00:25', 7, 0, '7.00', 'Mes'),
(109, 63, 12, '127.50', '127.50', 180, '4551.75', '24556.50', '	Izaje de 4 GrÃºas en MIT. Un mes de 180 horas , dÃ­as de 8 horas mÃ­nimas consecutivas de trabajo , horas extra 127.50', 2, 7, '2018-02-20 19:57:09', 80, '2018-02-20 20:00:25', 7, 0, '7.00', 'Mes'),
(110, 63, 7, '148.75', '148.75', 180, '4551.75', '28649.25', '	Izaje de 4 GrÃºas en MIT. Un mes de 180 horas , dias de 8 horas minimas consecutivas de trabajo , horas extra 148.75', 2, 7, '2018-02-20 19:57:09', 81, '2018-02-20 20:00:25', 7, 0, '7.00', 'Mes'),
(111, 63, 9, '733.20', '733.20', 1, '4551.75', '733.20', 'MOVILIZACION IDA Y VUELTA DE CONTRAPESOS', 2, 7, '2018-02-20 19:57:09', 82, '2018-02-20 20:00:25', 7, 1, '0.00', 'Precio Fijo'),
(112, 64, 9, '1200.00', '1200.00', 1, '84.00', '1284.00', 'IZAJE DE ESTRUCTURAS METALICAS. TIEMPO DE EJECUCION UN DIA ', 2, 7, '2018-02-20 21:20:08', 85, '2018-02-20 21:20:40', 7, 0, '7.00', 'Precio Fijo'),
(113, 65, 9, '1500.00', '1500.00', 1, '105.00', '1605.00', 'Verticalizar 2 tanques de 7 y 9 ton. Un dia de ejecucion', 2, 7, '2018-02-20 21:35:28', 85, '2018-02-20 21:35:47', 7, 0, '7.00', 'Precio Fijo'),
(114, 66, 9, '35300.00', '35300.00', 1, '2471.00', '37771.00', 'Descarga de un transformador de 116 toneladas. (incluye: Grua, movilzaciones, operador, y contrapesos)', 2, 7, '2018-02-20 21:43:57', 87, '2018-02-20 21:44:36', 7, 0, '7.00', ''),
(115, 67, 9, '46000.00', '46000.00', 1, '3220.00', '49220.00', 'Descarga de transformador de 106 en Progreso. Un dia de ejecucion ( Incluye: grua, operador, movilzacion ida y vuelta, contrapesos y combustible.)', 2, 7, '2018-02-20 21:48:54', 88, '2018-02-20 21:49:24', 7, 0, '7.00', ''),
(116, 68, 9, '65000.00', '65000.00', 1, '4550.00', '69550.00', 'Descarga y transporte de transformador de 116 toneladas. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, movilizaciones, operador, y contrapesos)', 2, 7, '2018-02-20 22:08:51', 89, '2018-02-20 22:08:56', 7, 0, '7.00', ''),
(117, 69, 9, '97500.00', '97500.00', 1, '6825.00', '104325.00', 'Descarga y transporte de transformador de 106 toneladas en progreso. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, transporte, movilizaciones, operador, y contrapesos)', 2, 7, '2018-02-20 22:10:43', 90, '2018-02-20 22:11:01', 7, 0, '7.00', ''),
(118, 70, 9, '1500.00', '1500.00', 1, '105.00', '1605.00', 'Izaje de Antena. Un dÃ­a de ejecuciÃ³n (incluye: grÃºa, combustible, aparejador)', 2, 7, '2018-02-21 17:22:01', 91, '2018-02-21 17:23:30', 7, 0, '7.00', ''),
(119, 71, 9, '0.00', '97500.00', 1, '6825.00', '104325.00', 'Descarga y transporte de transformador de 106 toneladas en Progreso. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, transporte, movilizaciones, operador, y contrapesos)', 3, 7, '2018-02-21 18:59:54', 92, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(120, 72, 9, '0.00', '97500.00', 1, '6986.00', '104325.00', 'Descarga y transporte de transformador de 106 toneladas en Progreso. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, transporte, movilizaciones, operador, y contrapesos)', 3, 7, '2018-02-21 19:05:57', 93, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(121, 72, 9, '0.00', '2300.00', 1, '6986.00', '2461.00', 'Transporte de contenedores  de Manzanillo a Progreso a 2,300.00 por viaje', 3, 7, '2018-02-21 19:05:57', 94, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(122, 73, 9, '97500.00', '97500.00', 1, '6972.00', '104325.00', 'Descarga y transporte de transformador de 106 toneladas en Progreso. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, transporte, movilizaciones, operador, y contrapesos)', 2, 7, '2018-02-21 19:09:40', 95, '2018-02-21 19:10:24', 7, 0, '7.00', ''),
(123, 73, 9, '2100.00', '2100.00', 1, '6972.00', '2247.00', 'Transporte de contenedores de manzanillo a Progreso  2100.00 por viaje', 2, 7, '2018-02-21 19:09:40', 96, '2018-02-21 19:10:24', 7, 0, '7.00', ''),
(124, 74, 9, '65000.00', '65000.00', 1, '4697.00', '69550.00', 'Descarga y transporte de transformador de 116 toneladas en LLano Sanchez. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, movilizaciones, operador, y contrapesos)', 2, 7, '2018-02-21 19:12:31', 95, '2018-02-21 19:12:44', 7, 0, '7.00', ''),
(125, 74, 9, '2100.00', '2100.00', 1, '4697.00', '2247.00', 'ransporte de contenedores de manzanillo a Progreso 2100.00 por viaje', 2, 7, '2018-02-21 19:12:31', 96, '2018-02-21 19:12:44', 7, 0, '7.00', ''),
(126, 75, 13, '100.00', '100.00', 24, '168.00', '2568.00', 'Grua para bajar de la mesa al suelo partes de GT. Tres dias de 8 horas minimas consecutivas de trabajo. Hora extra 100.00', 2, 7, '2018-02-21 19:27:07', 100, '2018-02-21 19:27:48', 7, 0, '7.00', 'Hora'),
(127, 76, 9, '4100.00', '4100.00', 0, '0.00', '0.00', 'ARMADO DE GRUA TORRE. DOS DIAS DE EJECUCION. DIAS ADICIONALES 1400.00, Incluye: INCLUYE: GRUA , OPERADOR, RIGGER, APAREJADOR, COMBUSTIBLE Y MOVILIZACIONES IDA Y VUELTA', 2, 7, '2018-02-21 21:07:50', 101, '2018-02-21 21:08:04', 7, 0, '7.00', ''),
(128, 77, 9, '4100.00', '4100.00', 1, '287.00', '4387.00', 'ARMADO DE GRUA TORRE. DOS DIAS DE EJECUCION. DIAS ADICIONALES 1400.00, Incluye: INCLUYE: GRUA , OPERADOR, RIGGER, APAREJADOR, COMBUSTIBLE Y MOVILIZACIONES IDA Y VUELTA', 2, 7, '2018-02-21 21:10:55', 102, '2018-02-21 21:11:02', 7, 0, '7.00', ''),
(129, 78, 7, '175.00', '175.00', 8, '98.00', '1498.00', '', 3, 7, '2018-02-22 17:04:08', 103, '0000-00-00 00:00:00', 0, 0, '7.00', 'Hora'),
(130, 78, 9, '0.00', '733.20', 1, '98.00', '733.20', '', 3, 7, '2018-02-22 17:04:08', 104, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(131, 78, 13, '0.00', '733.20', 1, '98.00', '733.20', 'Pases por ingreso puerto', 3, 7, '2018-02-22 17:04:08', 105, '0000-00-00 00:00:00', 0, 1, '0.00', 'Precio Normal'),
(132, 79, 7, '175.00', '175.00', 8, '98.00', '1498.00', 'Izaje de 8 ton a un radio de 15m', 2, 7, '2018-02-22 17:07:11', 106, '2018-02-22 17:07:28', 7, 0, '7.00', 'Hora'),
(133, 79, 9, '733.20', '733.20', 1, '98.00', '733.20', 'Movilizacion ida y vuelta de contrapesos.', 2, 7, '2018-02-22 17:07:11', 107, '2018-02-22 17:07:28', 7, 1, '0.00', ''),
(134, 79, 13, '154.00', '154.00', 1, '98.00', '154.00', 'Pases por ingreso a puerto ', 2, 7, '2018-02-22 17:07:11', 108, '2018-02-22 17:07:28', 7, 1, '0.00', ''),
(135, 80, 9, '5278.00', '5278.00', 1, '369.46', '5647.46', 'IZAJE  Y DESCARGA DE  CONTENEDORES PESO MÃXIMO 35 TON. DOS DÃA DE EJECUCIÃ“N: GRÃšA, OPERADOR, SLINGA, COMBUSTIBLE Y MOVILIZACIÃ“N, RIGGER Y APAREJADOR.', 2, 7, '2018-02-22 18:35:33', 109, '2018-02-22 18:36:03', 7, 0, '7.00', ''),
(136, 81, 9, '1800.00', '1800.00', 1, '126.00', '1926.00', 'Descargar y sacar piscinas de 2.7 ton . Dos dÃ­as de ejecuciÃ³n, dÃ­as adicionales 680.00. Forma de pago al contado.', 2, 7, '2018-02-23 16:21:36', 110, '2018-02-23 16:22:25', 7, 0, '7.00', ''),
(137, 82, 13, '100.00', '100.00', 8, '56.00', '856.00', 'prueba tayron', 2, 1, '2018-02-23 18:10:46', 111, '2018-02-23 18:17:03', 1, 0, '7.00', 'Hora'),
(138, 82, 19, '50.00', '50.00', 8, '56.00', '400.00', 'prueba tayron', 2, 1, '2018-02-23 18:10:46', 112, '2018-02-23 18:17:03', 1, 1, '0.00', 'Precio Normal'),
(139, 82, 18, '0.00', '50.00', 8, '56.00', '400.00', 'prueba tayron', 2, 1, '2018-02-23 18:10:46', 113, '2018-02-23 18:17:03', 1, 1, '0.00', 'Precio Fijo'),
(140, 82, 12, '300.00', '300.00', 9, '56.00', '2700.00', '', 2, 1, '2018-02-23 18:16:22', 0, '2018-02-23 18:17:03', 1, 1, '0.00', 'Precio Flag'),
(141, 83, 9, '0.00', '100.00', 0, '0.00', '0.00', 'moira', 3, 7, '2018-02-23 18:49:46', 110, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(142, 83, 9, '0.00', '0.00', 0, '0.00', '0.00', '', 3, 7, '2018-02-23 18:49:46', 114, '0000-00-00 00:00:00', 0, 0, '7.00', ''),
(143, 84, 9, '1100.00', '1100.00', 1, '77.00', '1177.00', 'Izaje de contenedores de 40 pies. Un dia de ejecucion. DÃ­as adicional 800.00 , Incluye: Grua, operador, combustible, eslinga, aparejador y movilizacion.', 2, 7, '2018-02-23 18:56:25', 116, '2018-02-23 18:56:46', 7, 0, '7.00', ''),
(144, 85, 9, '4500.00', '4500.00', 1, '315.00', '4815.00', 'Izaje de 2 turbinas de 10 ton a una altura de 15 m. Un dÃ­a de ejecuciÃ³n, DÃ­as adicional 2,400.00.    Incluye: grÃºa, operador, contrapesos y combustible.', 2, 7, '2018-02-23 19:43:06', 116, '2018-02-23 19:43:54', 7, 0, '7.00', ''),
(145, 0, 9, '0.00', '0.00', 0, '0.00', '0.00', '', 2, 7, '2018-02-23 20:15:01', 0, '0000-00-00 00:00:00', 0, 0, '0.00', ''),
(146, 86, 9, '500.00', '500.00', 1, '35.00', '535.00', 'Descargar y sacar piscinas de 2.7 ton . Un dÃ­a de 8 horas  . Hora extra 62.50 Forma de pago al contado. Tiempo de movilizaciÃ³n de la grua es tiempo de trabajo.', 2, 7, '2018-02-23 20:19:01', 116, '2018-02-23 20:19:05', 7, 0, '7.00', 'Select'),
(147, 87, 12, '150.00', '150.00', 1, '10.50', '160.50', 'sadas', 2, 1, '2018-02-23 20:48:40', 120, '2018-02-23 20:55:29', 9, 0, '7.00', 'Hora'),
(148, 87, 18, '0.00', '12.00', 12, '10.50', '144.00', 'sds', 2, 1, '2018-02-23 20:48:40', 121, '2018-02-23 20:55:29', 9, 1, '0.00', 'Precio Fijo'),
(149, 88, 9, '0.00', '73000.00', 1, '5110.00', '78110.00', 'Descarga y transporte de transformador de 116 toneladas y 9 viajes de sus accesorios. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, movilizaciones, operador, y contrapesos) ', 3, 7, '2018-02-23 20:49:14', 116, '2018-02-23 20:51:49', 7, 0, '7.00', ''),
(150, 87, 9, '0.00', '0.00', 0, '10.50', '0.00', '', 2, 9, '2018-02-23 20:54:09', 0, '2018-02-23 20:55:29', 9, 1, '0.00', ''),
(151, 87, 17, '0.00', '0.00', 0, '10.50', '0.00', '', 2, 9, '2018-02-23 20:54:47', 0, '2018-02-23 20:55:29', 9, 1, '0.00', ''),
(152, 89, 9, '77000.00', '77000.00', 1, '5390.00', '82390.00', 'Descarga y transporte de transformador de 116 toneladas y 9 viajes de sus accesorios. Dos dÃ­as de ejecuciÃ³n ( incluye: GrÃºa, movilizaciones, operador, contrapesos, combustible y transporte)', 2, 7, '2018-02-23 20:59:35', 122, '2018-02-23 21:00:46', 7, 0, '7.00', ''),
(153, 90, 9, '116236.00', '116236.00', 1, '8136.52', '124372.52', 'Descarga y transporte de transformador de 106 toneladas y 9 viajes de accesorios en progreso. Un dÃ­a de ejecuciÃ³n ( incluye: GrÃºa, transporte, movilizaciones, operador,contrapesos ,combustible y transporte.', 2, 7, '2018-02-23 21:11:05', 122, '2018-02-23 21:14:40', 7, 0, '7.00', ''),
(154, 91, 9, '0.00', '13000.00', 1, '910.00', '13910.00', 'Opcion #1: Si el barco no se pueda dar la vuelta para bajar las piezas.  Desmontar los Molinetes.4 dÃ­a de ejecuciÃ³n. Dia adicional 2,600.00', 2, 7, '2018-02-23 21:26:38', 122, '2018-02-23 21:28:29', 7, 0, '7.00', ''),
(155, 92, 9, '7838.00', '7838.00', 1, '548.66', '8386.66', 'Opcion #2: Dar la vuelta al barco para que las piezas queden a un radio mÃ¡s pequeÃ±o. Desmontar los molinetes, 4 dÃ­as de ejecuciÃ³n, dÃ­a adicional. Incluye: GrÃºa, contrapesos, operador y combustible.', 2, 7, '2018-02-23 21:33:09', 122, '2018-02-23 21:33:38', 7, 0, '7.00', ''),
(156, 93, 9, '0.00', '2603.00', 1, '182.21', '2785.21', 'Desmontaje e izaje de chillers. Un dÃ­a de ejecuciÃ³n. DÃ­a adicional 1400.00 . Incluye : Grua, operador, combustible,esliga, rigger, aparejador, spreader y contrapesos.', 2, 7, '2018-02-23 21:58:29', 122, '2018-02-23 21:59:20', 7, 0, '7.00', ''),
(157, 94, 12, '150.00', '150.00', 2, '21.00', '321.00', '', 2, 1, '2018-02-24 14:49:36', 128, '2018-02-24 14:49:43', 1, 0, '7.00', 'Hora'),
(158, 94, 17, '25.00', '25.00', 12, '21.00', '300.00', '', 2, 1, '2018-02-24 14:49:36', 129, '2018-02-24 14:49:43', 1, 1, '0.00', 'Precio Normal'),
(159, 94, 16, '12.00', '12.00', 1, '21.00', '12.00', '', 2, 1, '2018-02-24 14:49:36', 130, '2018-02-24 14:49:43', 1, 1, '0.00', 'Precio Fijo'),
(160, 95, 11, '85.00', '85.00', 8, '47.60', '727.60', '', 2, 1, '2018-03-01 18:17:58', 131, '2018-03-01 18:18:52', 1, 0, '7.00', 'Semana'),
(161, 95, 19, '50.00', '50.00', 8, '47.60', '400.00', '', 2, 1, '2018-03-01 18:17:59', 132, '2018-03-01 18:18:52', 1, 1, '0.00', 'Precio Normal'),
(174, 103, 160, '85.00', '85.00', 8, '47.60', '727.60', '', 2, 0, '0000-00-00 00:00:00', 133, '2018-03-01 22:41:21', 1, 0, '7.00', 'Semana'),
(175, 103, 161, '50.00', '50.00', 8, '47.60', '400.00', '', 2, 0, '0000-00-00 00:00:00', 134, '2018-03-01 22:41:22', 1, 0, '0.00', 'Precio Normal'),
(176, 104, 11, '85.00', '85.00', 8, '47.60', '727.60', 'as', 1, 0, '0000-00-00 00:00:00', 0, '2018-03-01 22:58:49', 1, 0, '7.00', 'Semana'),
(177, 104, 0, '50.00', '50.00', 8, '47.60', '400.00', 'asd', 1, 0, '0000-00-00 00:00:00', 0, '2018-03-01 22:58:49', 1, 0, '0.00', 'Precio Normal'),
(178, 105, 11, '85.00', '85.00', 8, '47.60', '727.60', 'qwe', 1, 0, '0000-00-00 00:00:00', 0, '2018-03-02 15:52:40', 1, 0, '7.00', 'Semana'),
(179, 105, 0, '50.00', '50.00', 8, '47.60', '400.00', 'qwe', 1, 0, '0000-00-00 00:00:00', 0, '2018-03-02 15:52:40', 1, 0, '0.00', 'Precio Normal'),
(180, 106, 11, '85.00', '85.00', 8, '47.60', '727.60', '', 1, 0, '0000-00-00 00:00:00', 0, '2018-03-02 16:15:02', 1, 0, '7.00', 'Semana'),
(181, 106, 19, '50.00', '50.00', 8, '47.60', '400.00', '', 1, 0, '0000-00-00 00:00:00', 0, '2018-03-02 16:15:02', 1, 1, '0.00', 'Precio Normal'),
(182, 107, 11, '85.00', '85.00', 8, '47.60', '727.60', '123', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 16:58:25', 1, 0, '7.00', 'Semana'),
(183, 107, 19, '50.00', '50.00', 8, '47.60', '400.00', '123', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 16:58:25', 1, 1, '0.00', 'Precio Normal'),
(184, 108, 11, '85.00', '85.00', 8, '47.60', '727.60', '231231', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 17:09:06', 1, 0, '7.00', 'Semana'),
(185, 108, 19, '50.00', '50.00', 8, '47.60', '400.00', '313123', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 17:09:06', 1, 1, '0.00', 'Precio Normal'),
(186, 95, 15, '0.00', '0.00', 0, '0.00', '0.00', '', 9, 1, '2018-03-02 17:14:57', 0, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(187, 95, 17, '0.00', '0.00', 0, '0.00', '0.00', '', 9, 1, '2018-03-02 17:24:49', 0, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(188, 95, 19, '0.00', '0.00', 0, '0.00', '0.00', '', 2, 1, '2018-03-02 17:29:51', 0, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(189, 95, 12, '0.00', '0.00', 0, '0.00', '0.00', '', 2, 1, '2018-03-02 17:30:18', 0, '0000-00-00 00:00:00', 0, 1, '0.00', ''),
(190, 109, 11, '85.00', '85.00', 8, '0.00', '680.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 17:53:08', 1, 0, '0.00', 'Semana'),
(191, 109, 19, '50.00', '50.00', 8, '0.00', '400.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 17:53:08', 1, 1, '0.00', 'Precio Normal'),
(192, 109, 19, '50.00', '50.00', 2, '0.00', '100.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 17:53:08', 1, 1, '0.00', 'Precio Normal'),
(193, 109, 12, '300.00', '300.00', 3, '0.00', '900.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-02 17:53:08', 1, 1, '0.00', 'Precio Flag'),
(194, 110, 11, '85.00', '85.00', 8, '0.00', '680.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:57:07', 1, 0, '0.00', 'Semana'),
(195, 110, 19, '50.00', '50.00', 8, '0.00', '400.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:57:07', 1, 1, '0.00', 'Precio Normal'),
(196, 110, 19, '50.00', '50.00', 2, '0.00', '100.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:57:07', 1, 1, '0.00', 'Precio Normal'),
(197, 110, 12, '300.00', '300.00', 3, '0.00', '900.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:57:08', 1, 1, '0.00', 'Precio Flag'),
(198, 111, 11, '85.00', '85.00', 8, '0.00', '680.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:59:31', 1, 0, '0.00', 'Semana'),
(199, 111, 19, '50.00', '50.00', 8, '0.00', '400.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:59:31', 1, 1, '0.00', 'Precio Normal'),
(200, 111, 19, '50.00', '50.00', 2, '0.00', '100.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:59:31', 1, 1, '0.00', 'Precio Normal'),
(201, 111, 12, '300.00', '300.00', 3, '0.00', '900.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 16:59:31', 1, 1, '0.00', 'Precio Flag'),
(202, 112, 11, '85.00', '85.00', 8, '0.00', '680.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 17:08:07', 1, 0, '0.00', 'Semana'),
(203, 112, 19, '50.00', '50.00', 8, '0.00', '400.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 17:08:08', 1, 1, '0.00', 'Precio Normal'),
(204, 112, 19, '50.00', '50.00', 2, '0.00', '100.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 17:08:08', 1, 1, '0.00', 'Precio Normal'),
(205, 112, 12, '300.00', '300.00', 3, '0.00', '900.00', '', 2, 0, '0000-00-00 00:00:00', 0, '2018-03-15 17:08:08', 1, 1, '0.00', 'Precio Flag');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_quot_service`
--

CREATE TABLE `crm_quot_service` (
  `id` int(11) NOT NULL,
  `id_quot` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `id_tmp_ser` int(11) NOT NULL,
  `des_ser` text NOT NULL,
  `id_user_finish` int(11) NOT NULL,
  `date_finish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_service`
--

CREATE TABLE `crm_service` (
  `id` int(11) NOT NULL,
  `name_service` varchar(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `flag` decimal(11,2) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_service`
--

INSERT INTO `crm_service` (`id`, `name_service`, `price`, `flag`, `stat`, `log_user_register`, `log_time`) VALUES
(4, 'MOVILIZACION', '2000.00', '2000.00', 1, 6, '2018-02-15 19:17:18'),
(5, 'RIGGER', '25.00', '20.00', 1, 1, '2018-02-15 19:39:31'),
(6, 'ARMADO', '0.00', '0.00', 1, 7, '2018-02-16 19:29:45'),
(7, 'DESARMADO', '0.00', '0.00', 1, 7, '2018-02-16 19:29:57'),
(8, 'TRANSPORTE EN CAMA BAJA', '0.00', '0.00', 1, 7, '2018-02-16 19:30:09'),
(9, 'MOVILIZACION IDA Y VUELTA', '0.00', '0.00', 1, 7, '2018-02-16 19:30:22'),
(10, 'TRANSPORTE EN MODULAR', '0.00', '0.00', 1, 7, '2018-02-16 19:30:37'),
(11, 'RECARGO POR DIA DOMINGO', '0.00', '0.00', 1, 7, '2018-02-16 19:30:52'),
(12, 'PATINES', '300.00', '300.00', 1, 7, '2018-02-16 19:31:04'),
(13, 'PASES POR INGRESO A PUERTO', '0.00', '0.00', 1, 7, '2018-02-16 19:31:21'),
(14, 'SPREADER', '15.00', '15.00', 1, 7, '2018-02-16 19:31:33'),
(15, 'CANASTA HUMANA', '100.00', '100.00', 1, 7, '2018-02-16 19:31:48'),
(16, 'MOB/DEMOB', '0.00', '0.00', 1, 7, '2018-02-16 19:31:59'),
(17, 'APAREJADOR', '25.00', '25.00', 1, 7, '2018-02-16 19:32:18'),
(18, 'MOVIMIENTO', '0.00', '0.00', 1, 7, '2018-02-19 14:26:38'),
(19, 'TECNICO JR.', '50.00', '0.00', 1, 8, '2018-02-19 17:00:54'),
(20, 'TECNICO SENIOR', '75.00', '0.00', 1, 8, '2018-02-19 17:01:09'),
(21, 'TRANSPORTE', '75.00', '0.00', 1, 7, '2018-02-19 17:12:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_tmp_craner`
--

CREATE TABLE `crm_tmp_craner` (
  `id` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_craner` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_tmp_product`
--

CREATE TABLE `crm_tmp_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `type_product` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `id_entry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_tmp_product`
--

INSERT INTO `crm_tmp_product` (`id`, `id_product`, `id_session`, `type_product`, `stat`, `log_user_register`, `log_time`, `id_entry`) VALUES
(22, 3, 'p9mkoniia25vu0jdgu5cq83ah3', 0, 1, 6, '2018-02-15 19:20:18', 0),
(23, 4, 'p9mkoniia25vu0jdgu5cq83ah3', 1, 1, 6, '2018-02-15 19:20:47', 0),
(24, 4, 'higjlliu70oq0frfo7fd2k5860', 0, 1, 1, '2018-02-15 19:45:37', 0),
(25, 5, 'higjlliu70oq0frfo7fd2k5860', 1, 1, 1, '2018-02-15 19:45:53', 0),
(33, 19, 's1gf0b85omfnrlrgc9mfjaptg7', 1, 1, 8, '2018-02-19 17:02:11', 0),
(34, 20, 's1gf0b85omfnrlrgc9mfjaptg7', 1, 1, 8, '2018-02-19 17:02:16', 0),
(35, 21, '9cg0dq0kr1a8habo7t6o2kei60', 1, 1, 7, '2018-02-19 17:16:10', 0),
(61, 9, '83nmro9q7n853e16tir18abhf4', 0, 3, 7, '2018-02-20 13:40:50', 0),
(90, 9, '83nmro9q7n853e16tir18abhf4', 0, 1, 7, '2018-02-20 22:09:44', 0),
(92, 9, '1d5eo07uv1t22c841k4hsf3ug5', 0, 3, 7, '2018-02-21 18:54:44', 0),
(93, 9, '1d5eo07uv1t22c841k4hsf3ug5', 0, 3, 7, '2018-02-21 19:00:32', 0),
(94, 9, '1d5eo07uv1t22c841k4hsf3ug5', 0, 3, 7, '2018-02-21 19:01:02', 0),
(102, 9, '1d5eo07uv1t22c841k4hsf3ug5', 0, 1, 7, '2018-02-21 21:09:49', 0),
(103, 7, '92tqnaif7ktqo62ain2bp3cbm0', 0, 3, 7, '2018-02-22 16:54:23', 0),
(104, 9, '92tqnaif7ktqo62ain2bp3cbm0', 1, 3, 7, '2018-02-22 16:54:37', 0),
(105, 13, '92tqnaif7ktqo62ain2bp3cbm0', 1, 3, 7, '2018-02-22 17:01:25', 0),
(109, 9, '92tqnaif7ktqo62ain2bp3cbm0', 0, 1, 7, '2018-02-22 18:32:09', 0),
(110, 9, 'i0tmaoqjndo0vhot8d728b2pn3', 0, 3, 7, '2018-02-23 16:15:12', 0),
(111, 13, 'eugf0t2tkqi74bplkq81daaq66', 0, 1, 1, '2018-02-23 18:09:50', 0),
(112, 19, 'eugf0t2tkqi74bplkq81daaq66', 1, 1, 1, '2018-02-23 18:10:01', 0),
(113, 18, 'eugf0t2tkqi74bplkq81daaq66', 1, 1, 1, '2018-02-23 18:10:02', 0),
(114, 9, 'i0tmaoqjndo0vhot8d728b2pn3', 0, 3, 7, '2018-02-23 18:47:38', 0),
(116, 9, 'i0tmaoqjndo0vhot8d728b2pn3', 0, 3, 7, '2018-02-23 18:50:33', 0),
(120, 12, 'pvfefe1i36pj8u0dq6tqnul6s3', 0, 1, 1, '2018-02-23 20:48:14', 0),
(121, 18, 'pvfefe1i36pj8u0dq6tqnul6s3', 1, 1, 1, '2018-02-23 20:48:21', 0),
(122, 9, 'i0tmaoqjndo0vhot8d728b2pn3', 0, 1, 7, '2018-02-23 20:52:46', 0),
(128, 12, '02eq0ku14ban9hto85k7grdhe5', 0, 1, 1, '2018-02-24 14:49:04', 0),
(129, 17, '02eq0ku14ban9hto85k7grdhe5', 1, 1, 1, '2018-02-24 14:49:09', 0),
(130, 16, '02eq0ku14ban9hto85k7grdhe5', 1, 1, 1, '2018-02-24 14:49:10', 0),
(131, 11, '1l8hchq6qn3f4tj1aka737p7v4', 0, 1, 1, '2018-03-01 18:17:23', 0),
(132, 19, '1l8hchq6qn3f4tj1aka737p7v4', 1, 1, 1, '2018-03-01 18:17:30', 0),
(133, 13, '3thsbllgdnt5g4iq2pbkn6f664', 0, 1, 1, '2018-03-12 19:46:01', 0),
(134, 19, '3thsbllgdnt5g4iq2pbkn6f664', 1, 1, 1, '2018-03-12 19:46:07', 0),
(135, 18, '3thsbllgdnt5g4iq2pbkn6f664', 1, 1, 1, '2018-03-12 19:46:08', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_tpm_service`
--

CREATE TABLE `crm_tpm_service` (
  `id` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crm_type_media`
--

CREATE TABLE `crm_type_media` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crm_type_media`
--

INSERT INTO `crm_type_media` (`id`, `description`, `stat`) VALUES
(1, 'Correo Electronico', 1),
(2, 'Llamada de central', 1),
(3, 'Visita', 1),
(4, 'Referido', 1),
(5, 'Llamada de Celular', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_tracing`
--

CREATE TABLE `log_tracing` (
  `id` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `log_tracing`
--

INSERT INTO `log_tracing` (`id`, `id_module`, `description`, `id_user`, `log_time`) VALUES
(336, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-15 19:10:11'),
(337, 3, 'El usuasrio Tayron Arrieta ha Registrado al usuario: Irma Rodriguez.', 1, '2018-02-15 19:11:42'),
(338, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-15 19:11:50'),
(339, 1, 'El usuasrio Irma Rodriguez ha ingresado al sistema.', 6, '2018-02-15 19:11:59'),
(340, 2, 'El usuasrio Irma Rodriguez ha salido del sistema.', 6, '2018-02-15 19:12:37'),
(341, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-15 19:12:46'),
(342, 4, 'El usuasrio Tayron Arrieta ha Actualizado al usuario: Irma Rodriguez.', 1, '2018-02-15 19:12:59'),
(343, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-15 19:13:02'),
(344, 1, 'El usuasrio Irma Rodriguez ha ingresado al sistema.', 6, '2018-02-15 19:13:12'),
(345, 6, 'El usuasrio Irma Rodriguez ha Registrado al cliente: Mec Mec.', 6, '2018-02-15 19:15:05'),
(346, 8, 'El usuasrio Irma Rodriguez ha Registrado al contacto: Pablo perez.', 6, '2018-02-15 19:15:43'),
(347, 10, 'El usuasrio Irma Rodriguez ha Registrado La grua : LTM 1400.', 6, '2018-02-15 19:16:46'),
(348, 10, 'El usuasrio Irma Rodriguez ha Registrado el Servicio : MOVILIZACION.', 6, '2018-02-15 19:17:18'),
(349, 14, 'El usuasrio Irma Rodriguez ha Registrado El ingreso : Balboa.', 6, '2018-02-15 19:18:21'),
(350, 15, 'El usuasrio Irma Rodriguez ha agregado el producto LTM 1400', 6, '2018-02-15 19:20:18'),
(351, 17, 'El usuasrio Irma Rodriguez ha agregado el servicio MOVILIZACION', 6, '2018-02-15 19:20:47'),
(352, 21, 'El usuasrio Irma Rodriguez ha Registrado una cotizacion ID: 33.', 6, '2018-02-15 19:22:03'),
(353, 22, 'El usuasrio Irma Rodriguez ha Enviado una cotizacion ID: 33.', 6, '2018-02-15 19:22:30'),
(354, 2, 'El usuasrio Irma Rodriguez ha salido del sistema.', 6, '2018-02-15 19:25:21'),
(355, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-15 19:29:39'),
(356, 3, 'El usuasrio Tayron Arrieta ha Registrado al usuario: Moira Chavez.', 1, '2018-02-15 19:31:08'),
(357, 6, 'El usuasrio Tayron Arrieta ha Registrado al cliente: BOSKALIS BOSKALIS.', 1, '2018-02-15 19:33:33'),
(358, 8, 'El usuasrio Tayron Arrieta ha Registrado al contacto: Nancy James.', 1, '2018-02-15 19:34:25'),
(359, 10, 'El usuasrio Tayron Arrieta ha Registrado La grua : GROVE.', 1, '2018-02-15 19:37:35'),
(360, 11, 'El usuasrio Tayron Arrieta ha Actualizado La grua: GROVE.', 1, '2018-02-15 19:38:23'),
(361, 10, 'El usuasrio Tayron Arrieta ha Registrado el Servicio : RIGGER.', 1, '2018-02-15 19:39:31'),
(362, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : Isla de Punta Pacifica No.1.', 1, '2018-02-15 19:42:55'),
(363, 15, 'El usuasrio Tayron Arrieta ha agregado el producto GROVE', 1, '2018-02-15 19:45:37'),
(364, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio RIGGER', 1, '2018-02-15 19:45:53'),
(365, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 34.', 1, '2018-02-15 19:47:03'),
(366, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 34.', 1, '2018-02-15 19:47:26'),
(367, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-15 19:51:23'),
(368, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-15 19:51:37'),
(369, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-15 20:54:54'),
(370, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-16 14:21:01'),
(371, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-16 15:03:50'),
(372, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-16 15:06:22'),
(373, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-16 18:35:12'),
(374, 10, 'El usuasrio Moira Chavez ha Registrado La grua : NATIONAL CRANE.', 7, '2018-02-16 18:39:10'),
(375, 10, 'El usuasrio Moira Chavez ha Registrado La grua : TEREX.', 7, '2018-02-16 18:41:14'),
(376, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: TEREX.', 7, '2018-02-16 18:49:36'),
(377, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: NATIONAL CRANE.', 7, '2018-02-16 18:50:40'),
(378, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: LTM 1400.', 7, '2018-02-16 18:56:38'),
(379, 10, 'El usuasrio Moira Chavez ha Registrado La grua : LIEBHERR.', 7, '2018-02-16 19:00:52'),
(380, 10, 'El usuasrio Moira Chavez ha Registrado La grua : FUWA.', 7, '2018-02-16 19:05:40'),
(381, 4, 'El usuasrio Moira Chavez ha Actualizado al usuario: Irma Rodriguez.', 7, '2018-02-16 19:28:07'),
(382, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : ARMADO.', 7, '2018-02-16 19:29:45'),
(383, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : DESARMADO.', 7, '2018-02-16 19:29:57'),
(384, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : TRANSPORTE EN CAMA BAJA.', 7, '2018-02-16 19:30:09'),
(385, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : MOVILIZACION IDA Y VUELTA.', 7, '2018-02-16 19:30:22'),
(386, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : TRANSPORTE EN MODULAR.', 7, '2018-02-16 19:30:37'),
(387, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : RECARGO POR DIA DOMINGO.', 7, '2018-02-16 19:30:52'),
(388, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : PATINES.', 7, '2018-02-16 19:31:04'),
(389, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : PASES POR INGRESO A PUERTO.', 7, '2018-02-16 19:31:21'),
(390, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : SPREADER.', 7, '2018-02-16 19:31:33'),
(391, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : CANASTA HUMANA.', 7, '2018-02-16 19:31:48'),
(392, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : MOB/DEMOB.', 7, '2018-02-16 19:31:59'),
(393, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : APAREJADOR.', 7, '2018-02-16 19:32:18'),
(394, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-19 13:26:24'),
(395, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: Ashleys Cedeno Ashleys Cedeno.', 7, '2018-02-19 13:31:14'),
(396, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Ashleys  CedeÃ±o.', 7, '2018-02-19 13:32:51'),
(397, 7, 'El usuasrio Moira Chavez ha Actualizado al Cliente: Ashleys Cedeno Ashleys Cedeno.', 7, '2018-02-19 13:37:41'),
(398, 7, 'El usuasrio Moira Chavez ha Actualizado al Cliente: Ashleys Cedeno Ashleys Cedeno.', 7, '2018-02-19 13:40:40'),
(399, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso :  Muelle 45 Gatun.', 7, '2018-02-19 13:44:08'),
(400, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 35.', 7, '2018-02-19 14:22:14'),
(401, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : MOVIMIENTO.', 7, '2018-02-19 14:26:38'),
(402, 17, 'El usuasrio Moira Chavez ha agregado el servicio MOVIMIENTO', 7, '2018-02-19 14:27:03'),
(403, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 36.', 7, '2018-02-19 14:29:23'),
(404, 10, 'El usuasrio Moira Chavez ha Registrado La grua : TRABAJO A EJECUTAR.', 7, '2018-02-19 14:30:23'),
(405, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-19 14:31:52'),
(406, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-19 14:32:00'),
(407, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 37.', 7, '2018-02-19 14:34:04'),
(408, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-19 14:48:46'),
(409, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-19 16:38:40'),
(410, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-19 16:44:53'),
(411, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LIEBHERR', 1, '2018-02-19 16:45:39'),
(412, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 38.', 1, '2018-02-19 16:45:54'),
(413, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 38.', 1, '2018-02-19 16:46:13'),
(414, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: DYNAMIC CONSTRUCTION DYNAMIC CONSTRUCTION.', 7, '2018-02-19 16:48:58'),
(415, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Francisco Paz.', 7, '2018-02-19 16:50:47'),
(416, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-19 16:52:16'),
(417, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : ACP.', 7, '2018-02-19 16:52:16'),
(418, 17, 'El usuasrio Moira Chavez ha agregado el servicio TRANSPORTE EN MODULAR', 7, '2018-02-19 16:52:48'),
(419, 3, 'El usuasrio Tayron Arrieta ha Registrado al usuario: Luis Hernandez.', 1, '2018-02-19 16:52:59'),
(420, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-19 16:53:31'),
(421, 1, 'El usuasrio Luis Hernandez ha ingresado al sistema.', 8, '2018-02-19 16:53:42'),
(422, 17, 'El usuasrio Moira Chavez ha agregado el servicio TRANSPORTE EN MODULAR', 7, '2018-02-19 16:54:13'),
(423, 6, 'El usuasrio Luis Hernandez ha Registrado al cliente: HARRY KING SING HARRY KING SING.', 8, '2018-02-19 16:56:18'),
(424, 8, 'El usuasrio Luis Hernandez ha Registrado al contacto: HARRY KING SING.', 8, '2018-02-19 16:56:49'),
(425, 14, 'El usuasrio Luis Hernandez ha Registrado El ingreso : SOPORTE TENICO.', 8, '2018-02-19 16:58:35'),
(426, 17, 'El usuasrio Moira Chavez ha agregado el servicio TRANSPORTE EN MODULAR', 7, '2018-02-19 16:58:42'),
(427, 10, 'El usuasrio Luis Hernandez ha Registrado el Servicio : TECNICO JR..', 8, '2018-02-19 17:00:54'),
(428, 10, 'El usuasrio Luis Hernandez ha Registrado el Servicio : TECNICO SENIOR.', 8, '2018-02-19 17:01:09'),
(429, 17, 'El usuasrio Luis Hernandez ha agregado el servicio TECNICO JR.', 8, '2018-02-19 17:02:11'),
(430, 17, 'El usuasrio Luis Hernandez ha agregado el servicio TECNICO SENIOR', 8, '2018-02-19 17:02:16'),
(431, 21, 'El usuasrio Luis Hernandez ha Registrado una cotizacion ID: 39.', 8, '2018-02-19 17:06:54'),
(432, 2, 'El usuasrio Luis Hernandez ha salido del sistema.', 8, '2018-02-19 17:09:42'),
(433, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 40.', 7, '2018-02-19 17:10:53'),
(434, 10, 'El usuasrio Moira Chavez ha Registrado el Servicio : TRANSPORTE 0.', 7, '2018-02-19 17:12:51'),
(435, 17, 'El usuasrio Moira Chavez ha agregado el servicio TRANSPORTE 0', 7, '2018-02-19 17:16:10'),
(436, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 41.', 7, '2018-02-19 17:18:25'),
(437, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-19 18:24:15'),
(438, 15, 'El usuasrio Tayron Arrieta ha agregado el producto FUWA', 1, '2018-02-19 18:25:05'),
(439, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio TRANSPORTE 0', 1, '2018-02-19 18:25:23'),
(440, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 42.', 1, '2018-02-19 18:25:39'),
(441, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 42.', 1, '2018-02-19 18:25:45'),
(442, 15, 'El usuasrio Tayron Arrieta ha agregado el producto FUWA', 1, '2018-02-19 18:39:01'),
(443, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio APAREJADOR', 1, '2018-02-19 18:39:17'),
(444, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 43.', 1, '2018-02-19 18:39:36'),
(445, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 43.', 1, '2018-02-19 18:39:42'),
(446, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1400', 1, '2018-02-19 18:46:28'),
(447, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio MOVILIZACION', 1, '2018-02-19 18:46:54'),
(448, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 44.', 1, '2018-02-19 18:47:45'),
(449, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 44.', 1, '2018-02-19 18:47:49'),
(450, 15, 'El usuasrio Tayron Arrieta ha agregado el producto FUWA', 1, '2018-02-19 18:54:31'),
(451, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio MOB/DEMOB', 1, '2018-02-19 18:54:49'),
(452, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 45.', 1, '2018-02-19 18:55:10'),
(453, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 45.', 1, '2018-02-19 18:55:24'),
(454, 15, 'El usuasrio Tayron Arrieta ha agregado el producto TEREX', 1, '2018-02-19 19:06:55'),
(455, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio APAREJADOR', 1, '2018-02-19 19:07:10'),
(456, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 46.', 1, '2018-02-19 19:07:28'),
(457, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 46.', 1, '2018-02-19 19:08:06'),
(458, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LIEBHERR', 1, '2018-02-19 19:09:34'),
(459, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 47.', 1, '2018-02-19 19:09:55'),
(460, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 47.', 1, '2018-02-19 19:10:07'),
(461, 15, 'El usuasrio Tayron Arrieta ha agregado el producto TEREX', 1, '2018-02-19 19:14:39'),
(462, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 48.', 1, '2018-02-19 19:15:13'),
(463, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 48.', 1, '2018-02-19 19:15:24'),
(464, 15, 'El usuasrio Tayron Arrieta ha agregado el producto NATIONAL CRANE', 1, '2018-02-19 19:22:13'),
(465, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 49.', 1, '2018-02-19 19:23:03'),
(466, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 49.', 1, '2018-02-19 19:23:58'),
(467, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1400', 1, '2018-02-19 19:25:05'),
(468, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio CANASTA HUMANA', 1, '2018-02-19 19:25:22'),
(469, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio SPREADER', 1, '2018-02-19 19:25:25'),
(470, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 50.', 1, '2018-02-19 19:25:51'),
(471, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 50.', 1, '2018-02-19 19:26:06'),
(472, 15, 'El usuasrio Tayron Arrieta ha agregado el producto GROVE', 1, '2018-02-19 19:30:10'),
(473, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 51.', 1, '2018-02-19 19:30:34'),
(474, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 51.', 1, '2018-02-19 19:31:13'),
(475, 15, 'El usuasrio Tayron Arrieta ha agregado el producto GROVE', 1, '2018-02-19 19:38:19'),
(476, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 52.', 1, '2018-02-19 19:38:49'),
(477, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 52.', 1, '2018-02-19 19:38:59'),
(478, 15, 'El usuasrio Tayron Arrieta ha agregado el producto TEREX', 1, '2018-02-19 19:43:22'),
(479, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 53.', 1, '2018-02-19 19:43:56'),
(480, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 53.', 1, '2018-02-19 19:44:06'),
(481, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LIEBHERR', 1, '2018-02-19 19:44:32'),
(482, 15, 'El usuasrio Tayron Arrieta ha agregado el producto TEREX', 1, '2018-02-19 19:58:07'),
(483, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 54.', 1, '2018-02-19 19:58:32'),
(484, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 54.', 1, '2018-02-19 19:59:19'),
(485, 15, 'El usuasrio Tayron Arrieta ha agregado el producto TRABAJO A EJECUTAR', 1, '2018-02-19 20:03:16'),
(486, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio TECNICO SENIOR', 1, '2018-02-19 20:03:33'),
(487, 15, 'El usuasrio Tayron Arrieta ha agregado el producto TEREX', 1, '2018-02-19 20:10:20'),
(488, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio APAREJADOR', 1, '2018-02-19 20:10:28'),
(489, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 55.', 1, '2018-02-19 20:10:42'),
(490, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 55.', 1, '2018-02-19 20:10:49'),
(491, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 39.', 1, '2018-02-19 20:13:32'),
(492, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-19 21:21:53'),
(493, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-20 13:34:32'),
(494, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: Grupo Logistico Gardellini, S.A.  Grupo Logistico Gardellini, S.A. .', 7, '2018-02-20 13:37:16'),
(495, 7, 'El usuasrio Moira Chavez ha Actualizado al Cliente: Grupo Logistico Gardellini, S.A.  Grupo Logistico Gardellini, S.A. .', 7, '2018-02-20 13:37:34'),
(496, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Irene E Rubides   .', 7, '2018-02-20 13:38:31'),
(497, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : PanamÃ¡ Bond Milla 9, Las cumbres.', 7, '2018-02-20 13:40:08'),
(498, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 13:40:50'),
(499, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 56.', 7, '2018-02-20 13:46:10'),
(500, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 13:51:55'),
(501, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 57.', 7, '2018-02-20 13:53:07'),
(502, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 57.', 7, '2018-02-20 13:53:29'),
(503, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: GRUAS SALERNO, S.A. GRUAS SALERNO, S.A..', 7, '2018-02-20 14:01:52'),
(504, 7, 'El usuasrio Moira Chavez ha Actualizado al Cliente: GRUAS SALERNO, S.A. GRUAS SALERNO, S.A..', 7, '2018-02-20 14:03:01'),
(505, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Omar  Salerno Guerrero.', 7, '2018-02-20 14:04:02'),
(506, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Parque lefevre.', 7, '2018-02-20 14:05:30'),
(507, 10, 'El usuasrio Moira Chavez ha Registrado La grua : SANY SPC400.', 7, '2018-02-20 14:17:12'),
(508, 15, 'El usuasrio Moira Chavez ha agregado el producto SANY SPC400', 7, '2018-02-20 14:17:50'),
(509, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 58.', 7, '2018-02-20 14:20:32'),
(510, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-20 15:43:29'),
(511, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : 123123123.', 1, '2018-02-20 15:52:11'),
(512, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LIEBHERR', 1, '2018-02-20 15:53:04'),
(513, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio CANASTA HUMANA', 1, '2018-02-20 15:54:26'),
(514, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 59.', 1, '2018-02-20 15:54:44'),
(515, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 59.', 1, '2018-02-20 15:54:55'),
(516, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-20 16:39:09'),
(517, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: RODA RODA.', 7, '2018-02-20 16:42:17'),
(518, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: WILMA MILLAN.', 7, '2018-02-20 16:43:16'),
(519, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Llano Sanchez y Progreso.', 7, '2018-02-20 16:44:36'),
(520, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 16:46:25'),
(521, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 60.', 7, '2018-02-20 16:48:51'),
(522, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 60.', 7, '2018-02-20 16:51:32'),
(523, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1400', 7, '2018-02-20 16:57:51'),
(524, 17, 'El usuasrio Moira Chavez ha agregado el servicio MOVILIZACION IDA Y VUELTA', 7, '2018-02-20 16:59:03'),
(525, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 61.', 7, '2018-02-20 17:00:23'),
(526, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 61.', 7, '2018-02-20 17:00:51'),
(527, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-20 18:28:23'),
(528, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: MANTENIMIENTO Y CONSTRUCCION MANTENIMIENTO Y CONSTRUCCION.', 7, '2018-02-20 18:33:06'),
(529, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: MIRIELLE  MONTENEGRO.', 7, '2018-02-20 18:39:51'),
(530, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : MANZANILLO.', 7, '2018-02-20 18:40:54'),
(531, 10, 'El usuasrio Moira Chavez ha Registrado La grua : LIEBHERR 1050.', 7, '2018-02-20 18:43:23'),
(532, 10, 'El usuasrio Moira Chavez ha Registrado La grua : LIEBHERR 1080.', 7, '2018-02-20 18:44:57'),
(533, 15, 'El usuasrio Moira Chavez ha agregado el producto LIEBHERR 1050', 7, '2018-02-20 18:45:59'),
(534, 15, 'El usuasrio Moira Chavez ha agregado el producto LIEBHERR 1080', 7, '2018-02-20 18:46:38'),
(535, 15, 'El usuasrio Moira Chavez ha agregado el producto LIEBHERR', 7, '2018-02-20 18:47:09'),
(536, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: GROVEGMK5130.', 7, '2018-02-20 18:48:10'),
(537, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: GMK5130.', 7, '2018-02-20 18:48:37'),
(538, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: NATIONAL 571E.', 7, '2018-02-20 18:48:59'),
(539, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: BT4485.', 7, '2018-02-20 18:49:15'),
(540, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: LTM1100-4.2.', 7, '2018-02-20 18:49:31'),
(541, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: FWT60.', 7, '2018-02-20 18:49:50'),
(542, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: LTM 1050.', 7, '2018-02-20 18:50:12'),
(543, 11, 'El usuasrio Moira Chavez ha Actualizado La grua: LTM 1080.', 7, '2018-02-20 18:50:38'),
(544, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1050', 7, '2018-02-20 18:51:43'),
(545, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1080', 7, '2018-02-20 18:51:45'),
(546, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM1100-4.2', 7, '2018-02-20 18:51:47'),
(547, 17, 'El usuasrio Moira Chavez ha agregado el servicio MOVILIZACION IDA Y VUELTA', 7, '2018-02-20 18:52:36'),
(548, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 62.', 7, '2018-02-20 18:55:14'),
(549, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 62.', 7, '2018-02-20 18:59:25'),
(550, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1050', 7, '2018-02-20 19:00:32'),
(551, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1080', 7, '2018-02-20 19:00:37'),
(552, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM1100-4.2', 7, '2018-02-20 19:00:54'),
(553, 1, 'El usuasrio Luis Hernandez ha ingresado al sistema.', 8, '2018-02-20 19:45:59'),
(554, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-20 19:53:41'),
(555, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1050', 7, '2018-02-20 19:54:20'),
(556, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1080', 7, '2018-02-20 19:54:21'),
(557, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM1100-4.2', 7, '2018-02-20 19:54:22'),
(558, 17, 'El usuasrio Moira Chavez ha agregado el servicio MOVILIZACION IDA Y VUELTA', 7, '2018-02-20 19:54:42'),
(559, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 63.', 7, '2018-02-20 19:57:09'),
(560, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 63.', 7, '2018-02-20 20:00:25'),
(561, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-20 20:06:38'),
(562, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1080', 1, '2018-02-20 20:13:29'),
(563, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1050', 1, '2018-02-20 20:13:29'),
(564, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-20 21:06:53'),
(565, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: HARINAS DE ISTMO HARINAS DE ISTMO.', 7, '2018-02-20 21:13:06'),
(566, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: ING TEXILIA VARELA.', 7, '2018-02-20 21:13:52'),
(567, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : TOCUMEN.', 7, '2018-02-20 21:15:05'),
(568, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 21:15:39'),
(569, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 64.', 7, '2018-02-20 21:20:08'),
(570, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 64.', 7, '2018-02-20 21:20:40'),
(571, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: SOLDADURA INDUSTRIALES SOLDADURA INDUSTRIALES.', 7, '2018-02-20 21:24:17'),
(572, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Francisco Del Cid.', 7, '2018-02-20 21:24:56'),
(573, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Celsia.', 7, '2018-02-20 21:27:02'),
(574, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 21:27:38'),
(575, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 65.', 7, '2018-02-20 21:35:28'),
(576, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 65.', 7, '2018-02-20 21:35:47'),
(577, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 21:40:34'),
(578, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 66.', 7, '2018-02-20 21:43:57'),
(579, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 66.', 7, '2018-02-20 21:44:36'),
(580, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 21:46:31'),
(581, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 67.', 7, '2018-02-20 21:48:54'),
(582, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 67.', 7, '2018-02-20 21:49:24'),
(583, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: lSS PANAMA lSS PANAMA.', 7, '2018-02-20 22:02:00'),
(584, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Lizbeth Rodriguez.', 7, '2018-02-20 22:02:55'),
(585, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Progreso y Llano Sanchez.', 7, '2018-02-20 22:05:13'),
(586, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 22:06:26'),
(587, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 68.', 7, '2018-02-20 22:08:51'),
(588, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 68.', 7, '2018-02-20 22:08:56'),
(589, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-20 22:09:44'),
(590, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 69.', 7, '2018-02-20 22:10:43'),
(591, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 69.', 7, '2018-02-20 22:11:01'),
(592, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-21 04:48:31'),
(593, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-21 06:04:05'),
(594, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-21 15:44:24'),
(595, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-21 16:48:57'),
(596, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: MEC ASTILLERO MEC ASTILLERO.', 7, '2018-02-21 17:03:54'),
(597, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Reinmar Duncan.', 7, '2018-02-21 17:05:15'),
(598, 9, 'El usuasrio Moira Chavez ha Actualizado al Contacto: Reinmar Duncan.', 7, '2018-02-21 17:06:23'),
(599, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Balboa; MEC Astilleros; Muelle 8.', 7, '2018-02-21 17:10:00'),
(600, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 17:17:49'),
(601, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 70.', 7, '2018-02-21 17:22:01'),
(602, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 70.', 7, '2018-02-21 17:23:30'),
(603, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-21 18:39:05'),
(604, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: TREE LOGISTICS TREE LOGISTICS.', 7, '2018-02-21 18:45:17'),
(605, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Jesus Fernandez.', 7, '2018-02-21 18:46:48'),
(606, 9, 'El usuasrio Moira Chavez ha Actualizado al Contacto: Jesus Fernandez.', 7, '2018-02-21 18:47:22'),
(607, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : LLANO SANCHES Y PROGRESO.', 7, '2018-02-21 18:49:22'),
(608, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 18:54:44'),
(609, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 71.', 7, '2018-02-21 18:59:54'),
(610, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 19:00:32'),
(611, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 19:01:02'),
(612, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 72.', 7, '2018-02-21 19:05:57'),
(613, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 19:07:24'),
(614, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 19:07:25'),
(615, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 73.', 7, '2018-02-21 19:09:40'),
(616, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 73.', 7, '2018-02-21 19:10:24'),
(617, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 19:10:37'),
(618, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 19:10:38'),
(619, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 74.', 7, '2018-02-21 19:12:31'),
(620, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 74.', 7, '2018-02-21 19:12:44'),
(621, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: METALES  24 DE DICIEMBRE METALES  24 DE DICIEMBRE.', 7, '2018-02-21 19:18:07'),
(622, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Abraham Dabah.', 7, '2018-02-21 19:21:43'),
(623, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : MaÃ±anita.', 7, '2018-02-21 19:23:08'),
(624, 10, 'El usuasrio Moira Chavez ha Registrado La grua : LTM 1040.', 7, '2018-02-21 19:24:47'),
(625, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1040', 7, '2018-02-21 19:25:05'),
(626, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1040', 7, '2018-02-21 19:25:23'),
(627, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 75.', 7, '2018-02-21 19:27:07'),
(628, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 75.', 7, '2018-02-21 19:27:48'),
(629, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-21 20:56:24'),
(630, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: GRUPO SU CASA GRUPO SU CASA.', 7, '2018-02-21 20:58:28'),
(631, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Ing Lizbeth Morcillo.', 7, '2018-02-21 20:59:12'),
(632, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Via EspaÃ±a.', 7, '2018-02-21 21:00:01'),
(633, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 21:00:39'),
(634, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 76.', 7, '2018-02-21 21:07:50'),
(635, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 76.', 7, '2018-02-21 21:08:04'),
(636, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-21 21:09:49'),
(637, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 77.', 7, '2018-02-21 21:10:55'),
(638, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 77.', 7, '2018-02-21 21:11:02'),
(639, 1, 'El usuasrio Luis Hernandez ha ingresado al sistema.', 8, '2018-02-22 13:20:16'),
(640, 4, 'El usuasrio Luis Hernandez ha Actualizado al usuario: Irma Rodriguez.', 8, '2018-02-22 13:21:10'),
(641, 4, 'El usuasrio Luis Hernandez ha Actualizado al usuario: Luis Hernandez.', 8, '2018-02-22 13:21:27'),
(642, 4, 'El usuasrio Luis Hernandez ha Actualizado al usuario: Luis Hernandez.', 8, '2018-02-22 13:21:35'),
(643, 2, 'El usuasrio Luis Hernandez ha salido del sistema.', 8, '2018-02-22 13:22:37'),
(644, 1, 'El usuasrio Luis Hernandez ha ingresado al sistema.', 8, '2018-02-22 14:33:17'),
(645, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-22 15:42:17'),
(646, 2, 'El usuasrio   ha salido del sistema.', 0, '2018-02-22 16:05:09'),
(647, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-22 16:48:54'),
(648, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: JAN DE NULL JAN DE NULL.', 7, '2018-02-22 16:50:01'),
(649, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Arjan Missinne.', 7, '2018-02-22 16:51:27'),
(650, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : PSA FASE 1.', 7, '2018-02-22 16:53:47'),
(651, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM1100-4.2', 7, '2018-02-22 16:54:23'),
(652, 17, 'El usuasrio Moira Chavez ha agregado el servicio MOVILIZACION IDA Y VUELTA', 7, '2018-02-22 16:54:37'),
(653, 17, 'El usuasrio Moira Chavez ha agregado el servicio PASES POR INGRESO A PUERTO', 7, '2018-02-22 17:01:25'),
(654, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 78.', 7, '2018-02-22 17:04:08'),
(655, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM1100-4.2', 7, '2018-02-22 17:05:13'),
(656, 17, 'El usuasrio Moira Chavez ha agregado el servicio MOVILIZACION IDA Y VUELTA', 7, '2018-02-22 17:05:26'),
(657, 17, 'El usuasrio Moira Chavez ha agregado el servicio PASES POR INGRESO A PUERTO', 7, '2018-02-22 17:05:30'),
(658, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 79.', 7, '2018-02-22 17:07:11'),
(659, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 79.', 7, '2018-02-22 17:07:28'),
(660, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-22 18:28:59'),
(661, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-22 18:32:09'),
(662, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 80.', 7, '2018-02-22 18:35:33'),
(663, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 80.', 7, '2018-02-22 18:36:03'),
(664, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-22 22:05:29'),
(665, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-23 16:05:03'),
(666, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: LA CASA DE LA PISCINA LA CASA DE LA PISCINA.', 7, '2018-02-23 16:09:34'),
(667, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Yorian Roa.', 7, '2018-02-23 16:10:49'),
(668, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Bejuco.', 7, '2018-02-23 16:11:43'),
(669, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 16:15:12'),
(670, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 81.', 7, '2018-02-23 16:21:36'),
(671, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 81.', 7, '2018-02-23 16:22:25'),
(672, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 17:57:26'),
(673, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : prueba tayron.', 1, '2018-02-23 17:59:06'),
(674, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : prueba tayron 2.', 1, '2018-02-23 17:59:40'),
(675, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : prueba tayron 3.', 1, '2018-02-23 18:00:19'),
(676, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 18:01:15'),
(677, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 18:01:20'),
(678, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 18:02:12'),
(679, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 18:02:29'),
(680, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 18:02:44'),
(681, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 18:03:00'),
(682, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 18:03:18'),
(683, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 18:03:38'),
(684, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 18:03:57'),
(685, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 18:04:46'),
(686, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1040', 1, '2018-02-23 18:09:50'),
(687, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio TECNICO JR.', 1, '2018-02-23 18:10:01'),
(688, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio MOVIMIENTO', 1, '2018-02-23 18:10:02'),
(689, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 82.', 1, '2018-02-23 18:10:46'),
(690, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 82.', 1, '2018-02-23 18:11:03'),
(691, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 18:11:52'),
(692, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 18:12:10'),
(693, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 82.', 1, '2018-02-23 18:17:03'),
(694, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 18:30:41'),
(695, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 18:30:49'),
(696, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-23 18:39:38'),
(697, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: TELFER TANKS TELFER TANKS.', 7, '2018-02-23 18:45:01'),
(698, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Pedro  Vega.', 7, '2018-02-23 18:46:10'),
(699, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Diablo.', 7, '2018-02-23 18:47:15'),
(700, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 18:47:38'),
(701, 15, 'El usuasrio Moira Chavez ha agregado el producto LTM 1040', 7, '2018-02-23 18:48:40'),
(702, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 83.', 7, '2018-02-23 18:49:46'),
(703, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 18:50:33'),
(704, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 84.', 7, '2018-02-23 18:56:25'),
(705, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 84.', 7, '2018-02-23 18:56:46'),
(706, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: SERVICIO DELGADO, S.A. SERVICIO DELGADO, S.A..', 7, '2018-02-23 19:23:38'),
(707, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Denis Delgado.', 7, '2018-02-23 19:25:43'),
(708, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Chilibre.', 7, '2018-02-23 19:28:02'),
(709, 7, 'El usuasrio Moira Chavez ha Actualizado al Cliente: SERVICIO DELGADO, S.A. SERVICIO DELGADO, S.A..', 7, '2018-02-23 19:30:02'),
(710, 7, 'El usuasrio Moira Chavez ha Actualizado al Cliente: SERVICIO DELGADO, S.A. SERVICIO DELGADO, S.A..', 7, '2018-02-23 19:36:07'),
(711, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Chilbre.', 7, '2018-02-23 19:38:23'),
(712, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 19:38:59'),
(713, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 85.', 7, '2018-02-23 19:43:06'),
(714, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 85.', 7, '2018-02-23 19:43:54'),
(715, 2, 'El usuasrio   ha salido del sistema.', 0, '2018-02-23 20:01:09'),
(716, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 20:01:17'),
(717, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 20:15:53'),
(718, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 86.', 7, '2018-02-23 20:19:01'),
(719, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 86.', 7, '2018-02-23 20:19:05'),
(720, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: FEDERAL LOGISTIC FEDERAL LOGISTIC.', 7, '2018-02-23 20:34:43'),
(721, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: JOAQUIN MARTINEZ.', 7, '2018-02-23 20:35:40'),
(722, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 20:40:27'),
(723, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : CHIRIQUI-AGUADULCE.', 7, '2018-02-23 20:42:07'),
(724, 3, 'El usuasrio Tayron Arrieta ha Registrado al usuario: Yenika Gonzalez.', 1, '2018-02-23 20:43:18'),
(725, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 20:43:31'),
(726, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 20:43:37'),
(727, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 20:44:24'),
(728, 4, 'El usuasrio Tayron Arrieta ha Actualizado el password de :  .', 1, '2018-02-23 20:44:55'),
(729, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 20:44:58'),
(730, 1, 'El usuasrio Yenika Gonzalez ha ingresado al sistema.', 9, '2018-02-23 20:45:12'),
(731, 2, 'El usuasrio Yenika Gonzalez ha salido del sistema.', 9, '2018-02-23 20:47:02'),
(732, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 20:47:16'),
(733, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1080', 1, '2018-02-23 20:48:14'),
(734, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio MOVIMIENTO', 1, '2018-02-23 20:48:21'),
(735, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 87.', 1, '2018-02-23 20:48:40'),
(736, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 87.', 1, '2018-02-23 20:48:46'),
(737, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 20:49:08'),
(738, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 88.', 7, '2018-02-23 20:49:14'),
(739, 1, 'El usuasrio Yenika Gonzalez ha ingresado al sistema.', 9, '2018-02-23 20:49:20'),
(740, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 20:52:46'),
(741, 22, 'El usuasrio Yenika Gonzalez ha Enviado una cotizacion ID: 87.', 9, '2018-02-23 20:55:29'),
(742, 2, 'El usuasrio Yenika Gonzalez ha salido del sistema.', 9, '2018-02-23 20:58:41'),
(743, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-23 20:58:49'),
(744, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 89.', 7, '2018-02-23 20:59:35'),
(745, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 89.', 7, '2018-02-23 21:00:46'),
(746, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 21:00:59'),
(747, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-23 21:01:01'),
(748, 2, 'El usuasrio Moira Chavez ha salido del sistema.', 7, '2018-02-23 21:02:39'),
(749, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-23 21:03:47'),
(750, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 21:08:14'),
(751, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 90.', 7, '2018-02-23 21:11:05'),
(752, 1, 'El usuasrio Yenika Gonzalez ha ingresado al sistema.', 9, '2018-02-23 21:13:15'),
(753, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 90.', 7, '2018-02-23 21:14:40'),
(754, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 21:21:26'),
(755, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 91.', 7, '2018-02-23 21:26:38'),
(756, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 91.', 7, '2018-02-23 21:28:29'),
(757, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 21:29:44'),
(758, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 92.', 7, '2018-02-23 21:33:09'),
(759, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 92.', 7, '2018-02-23 21:33:38'),
(760, 6, 'El usuasrio Moira Chavez ha Registrado al cliente: DAIKIN APPLIED LATIN AMERICA DAIKIN APPLIED LATIN AMERICA.', 7, '2018-02-23 21:43:29'),
(761, 8, 'El usuasrio Moira Chavez ha Registrado al contacto: Ing Gabriel  Osorio.', 7, '2018-02-23 21:44:47'),
(762, 14, 'El usuasrio Moira Chavez ha Registrado El ingreso : Metromall.', 7, '2018-02-23 21:47:53'),
(763, 15, 'El usuasrio Moira Chavez ha agregado el producto TRABAJO A EJECUTAR', 7, '2018-02-23 21:51:06'),
(764, 21, 'El usuasrio Moira Chavez ha Registrado una cotizacion ID: 93.', 7, '2018-02-23 21:58:29'),
(765, 22, 'El usuasrio Moira Chavez ha Enviado una cotizacion ID: 93.', 7, '2018-02-23 21:59:20'),
(766, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-24 14:03:27'),
(767, 1, 'El usuasrio Moira Chavez ha ingresado al sistema.', 7, '2018-02-24 14:15:58'),
(768, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-24 14:40:12'),
(769, 3, 'El usuasrio Tayron Arrieta ha Registrado al usuario: Ernesto Ortiz.', 1, '2018-02-24 14:41:30'),
(770, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-24 14:41:35'),
(771, 1, 'El usuasrio Ernesto Ortiz ha ingresado al sistema.', 10, '2018-02-24 14:41:48'),
(772, 2, 'El usuasrio Ernesto Ortiz ha salido del sistema.', 10, '2018-02-24 14:47:27'),
(773, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-24 14:47:33'),
(774, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : prueba ernesto.', 1, '2018-02-24 14:48:11'),
(775, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1080', 1, '2018-02-24 14:49:04'),
(776, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio APAREJADOR', 1, '2018-02-24 14:49:09'),
(777, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio MOB/DEMOB', 1, '2018-02-24 14:49:10'),
(778, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 94.', 1, '2018-02-24 14:49:36'),
(779, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 94.', 1, '2018-02-24 14:49:43'),
(780, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-02-24 14:51:56'),
(781, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-02-26 21:37:11'),
(782, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-01 18:11:58'),
(783, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : prueba Tayron 123.', 1, '2018-03-01 18:16:19'),
(784, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1050', 1, '2018-03-01 18:17:23'),
(785, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio TECNICO JR.', 1, '2018-03-01 18:17:30'),
(786, 21, 'El usuasrio Tayron Arrieta ha Registrado una cotizacion ID: 95.', 1, '2018-03-01 18:17:59'),
(787, 22, 'El usuasrio Tayron Arrieta ha Enviado una cotizacion ID: 95.', 1, '2018-03-01 18:18:52'),
(788, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-02 15:51:30'),
(789, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-03 17:56:28'),
(790, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-09 22:39:10'),
(791, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-12 14:40:59'),
(792, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-03-12 15:31:10'),
(793, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-12 15:31:55'),
(794, 2, 'El usuasrio Tayron Arrieta ha salido del sistema.', 1, '2018-03-12 15:32:37'),
(795, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-12 15:32:44'),
(796, 14, 'El usuasrio Tayron Arrieta ha Registrado El ingreso : prueba Tayron 444.', 1, '2018-03-12 19:45:07'),
(797, 15, 'El usuasrio Tayron Arrieta ha agregado el producto LTM 1040', 1, '2018-03-12 19:46:01'),
(798, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio TECNICO JR.', 1, '2018-03-12 19:46:07'),
(799, 17, 'El usuasrio Tayron Arrieta ha agregado el servicio MOVIMIENTO', 1, '2018-03-12 19:46:08'),
(800, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-14 18:38:52'),
(801, 1, 'El usuasrio Tayron Arrieta ha ingresado al sistema.', 1, '2018-03-16 20:37:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `master_stat`
--

CREATE TABLE `master_stat` (
  `id` int(11) NOT NULL,
  `id_stat` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `master_stat`
--

INSERT INTO `master_stat` (`id`, `id_stat`, `description`, `stat`) VALUES
(1, 1, 'Activo', 1),
(2, 2, 'No activo', 1),
(3, 3, 'Sin Cotizacion', 1),
(4, 4, 'Cotización Creada', 1),
(5, 5, 'Cotización Enviada', 1),
(6, 6, 'Cotización Facturacion', 1),
(7, 7, 'Cotización Eliminada', 1),
(8, 8, 'Cotización Aprobada', 1),
(9, 9, 'Producto Eliminado', 1),
(10, 10, 'Cotización Aprobada Final', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `description`, `stat`) VALUES
(1, 'Ingresoal Sistema', 1),
(2, 'Salida del Siatema', 1),
(3, 'Registro Usuario', 1),
(4, 'Editar usuario', 1),
(5, 'Cambio de Password', 1),
(6, 'Registro de Cliente', 1),
(7, 'Editar Cliente', 1),
(8, 'Registro de Contacto', 1),
(9, 'Editar Contacto', 1),
(10, 'Registro de Grua', 1),
(11, 'Editar Grua', 1),
(12, 'Registro de Servicio', 1),
(13, 'Edicion de Servicio', 1),
(14, 'Registro de Ingreso', 1),
(15, 'Producto Agredado', 1),
(16, 'Producto Eliminado', 1),
(17, 'Servicio Agregado', 1),
(18, 'Servicio Eliminado', 1),
(19, 'Nota', 1),
(20, 'Nota de Llamada', 1),
(21, 'Registro de Cotizacion', 1),
(22, 'Envio de Cotizacion', 1),
(23, 'Registro Terminos y condiciones', 1),
(24, 'Editar Condiciones y terminos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rc_bussines`
--

CREATE TABLE `rc_bussines` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rc_bussines`
--

INSERT INTO `rc_bussines` (`id`, `description`, `stat`) VALUES
(1, 'Gruas SHL', 1),
(2, 'Seal Xpress (Torno de Sellos)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rc_category`
--

CREATE TABLE `rc_category` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `stat` int(11) NOT NULL,
  `id_bussines` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rc_category`
--

INSERT INTO `rc_category` (`id`, `description`, `stat`, `id_bussines`) VALUES
(1, 'Sistema', 1, 1),
(2, 'Administracion', 1, 1),
(3, 'Gerencia', 1, 1),
(4, 'Ventas', 1, 1),
(5, 'Mensajeria', 1, 1),
(6, 'Inspectores', 1, 1),
(7, 'Compras', 1, 1),
(8, 'Facturacion', 1, 1),
(9, 'Contabilidad', 1, 1),
(10, 'Cuentas Por Cobrar', 1, 1),
(11, 'Cuentas Por Pagar', 1, 1),
(12, 'Planilla', 1, 1),
(13, 'Recursos Humanos', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rc_employer`
--

CREATE TABLE `rc_employer` (
  `id` int(11) NOT NULL,
  `name_employer` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `date_register` datetime NOT NULL,
  `id_register` int(11) NOT NULL,
  `number_phone` int(11) NOT NULL,
  `id_bussines` int(11) NOT NULL,
  `charge` varchar(50) NOT NULL,
  `extention` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rc_employer`
--

INSERT INTO `rc_employer` (`id`, `name_employer`, `last_name`, `id_category`, `stat`, `date_register`, `id_register`, `number_phone`, `id_bussines`, `charge`, `extention`, `photo`) VALUES
(1, 'Tayron', 'Arrieta', 1, 1, '2018-03-13 00:00:00', 1, 60026773, 1, 'Gerente de Sistemas', 5003, ''),
(2, 'Luis', 'Hernandez', 2, 1, '2018-03-13 00:00:00', 1, 63721914, 1, 'Gerente General', 5011, ''),
(3, 'Rafael', 'Pons', 0, 1, '2018-03-19 00:00:00', 1, 66788599, 2, 'Colaborador', 5010, ''),
(4, 'Luis', 'Marrugo', 0, 1, '2018-03-19 00:00:00', 1, 67375867, 2, 'Gerente', 5010, ''),
(5, 'Marcos', 'Hooper', 0, 1, '2018-03-19 00:00:00', 1, 63914683, 2, 'Colaborador', 5010, ''),
(6, 'Keysi', 'Perez', 0, 1, '2018-03-19 00:00:00', 1, 97375843, 2, 'Colaborador', 5010, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_users`
--

CREATE TABLE `type_users` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type_users`
--

INSERT INTO `type_users` (`id`, `description`, `stat`) VALUES
(1, 'Admin', 1),
(2, 'User', 1),
(3, 'Ventas fase 1', 1),
(4, 'Ventas fase 2', 1),
(5, 'Contabilidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `real_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `type_user` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `log_user_register` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `real_name`, `last_name`, `pass`, `photo`, `type_user`, `stat`, `log_user_register`, `log_time`, `email`) VALUES
(1, 'tayron', 'Tayron', 'Arrieta', 'rEqbiBtYxeOa4ZSRiIuwkVh532h7w2Ldbgtv+UJ47ek=', '1.jpg', 1, 1, 0, '2018-01-23 21:03:52', ''),
(6, 'rirma', 'Irma', 'Rodriguez', 'KDMxElV0HaKEpVY1VXlPrrrv0uy/KKihH6idZetCp9c=', 'image_users/6_thumb.png', 1, 1, 1, '2018-02-15 19:11:42', 'irma.rodriguez@gruasshl.com'),
(7, 'moirachavez', 'Moira', 'Chavez', 'WaCq+ipobBOb5J54c+EbnIzaSW/BSiUuNNnhthKtHK0=', 'image_users/7_thumb.tif', 3, 1, 1, '2018-02-15 19:31:08', 'moira.chavez@gruasshl.com'),
(8, 'lhernandez', 'Luis', 'Hernandez', 'D2W2IPAvjygTkugDSupbRHhfm0XAT+oo5QNxUCWioF8=', 'image_users/8_thumb.jpg', 1, 1, 1, '2018-02-19 16:52:59', 'luis.hernandez@gruasshl.com'),
(9, 'gyenika', 'Yenika', 'Gonzalez', 'eICv5d+WeBCoYO05SR7KV8HjcjjsnF05s27D+/5Dcps=', 'image_users/9_thumb.jpg', 4, 1, 1, '2018-02-23 20:43:18', 'yenika.gonzalez@gruasshl.com'),
(10, 'oernesto', 'Ernesto', 'Ortiz', 'aV/9JgyoFl4Mnl3lpTseim/Tz4kSrNUnQrnONiTZBQ8=', 'image_users/10_thumb.jpg', 5, 1, 1, '2018-02-24 14:41:30', 'ernesto.ortiz@gruasshl.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_condition_terms`
--
ALTER TABLE `crm_condition_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_contact`
--
ALTER TABLE `crm_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_craner`
--
ALTER TABLE `crm_craner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_customers`
--
ALTER TABLE `crm_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_entry`
--
ALTER TABLE `crm_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_notes`
--
ALTER TABLE `crm_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_quot`
--
ALTER TABLE `crm_quot`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_quot_producs`
--
ALTER TABLE `crm_quot_producs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_quot_service`
--
ALTER TABLE `crm_quot_service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_service`
--
ALTER TABLE `crm_service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_tmp_craner`
--
ALTER TABLE `crm_tmp_craner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_tmp_product`
--
ALTER TABLE `crm_tmp_product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_tpm_service`
--
ALTER TABLE `crm_tpm_service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crm_type_media`
--
ALTER TABLE `crm_type_media`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log_tracing`
--
ALTER TABLE `log_tracing`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `master_stat`
--
ALTER TABLE `master_stat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rc_bussines`
--
ALTER TABLE `rc_bussines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rc_category`
--
ALTER TABLE `rc_category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rc_employer`
--
ALTER TABLE `rc_employer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_users`
--
ALTER TABLE `type_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `crm_condition_terms`
--
ALTER TABLE `crm_condition_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `crm_contact`
--
ALTER TABLE `crm_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `crm_craner`
--
ALTER TABLE `crm_craner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `crm_customers`
--
ALTER TABLE `crm_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `crm_entry`
--
ALTER TABLE `crm_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `crm_notes`
--
ALTER TABLE `crm_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crm_quot`
--
ALTER TABLE `crm_quot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `crm_quot_producs`
--
ALTER TABLE `crm_quot_producs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de la tabla `crm_quot_service`
--
ALTER TABLE `crm_quot_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crm_service`
--
ALTER TABLE `crm_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `crm_tmp_craner`
--
ALTER TABLE `crm_tmp_craner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crm_tmp_product`
--
ALTER TABLE `crm_tmp_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `crm_tpm_service`
--
ALTER TABLE `crm_tpm_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crm_type_media`
--
ALTER TABLE `crm_type_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `log_tracing`
--
ALTER TABLE `log_tracing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=802;

--
-- AUTO_INCREMENT de la tabla `master_stat`
--
ALTER TABLE `master_stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `rc_bussines`
--
ALTER TABLE `rc_bussines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rc_category`
--
ALTER TABLE `rc_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rc_employer`
--
ALTER TABLE `rc_employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `type_users`
--
ALTER TABLE `type_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
