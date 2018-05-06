-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 01, 2017 at 01:17 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be_saci12012014`
--

-- --------------------------------------------------------

--
-- Table structure for table `sa_acervo`
--

CREATE TABLE `sa_acervo` (
  `Id_CABMS` text,
  `vCaracteristicas` text,
  `Id_ConsecutivoInv` text,
  `vUbicacion` varchar(200) DEFAULT NULL,
  `vTitulo` varchar(200) DEFAULT NULL,
  `vAutor` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_cabms`
--

CREATE TABLE `sa_cabms` (
  `Id` int(11) NOT NULL,
  `Id_CABMS` varchar(10) DEFAULT NULL,
  `Id_UMedida` int(10) DEFAULT NULL,
  `vDescripcionCABMS` varchar(60) DEFAULT NULL,
  `cTipoAlmacen` varchar(1) DEFAULT NULL,
  `nConsecutivoInv` decimal(6,0) DEFAULT NULL,
  `ePartidaPresupuestal` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_cabms`
--

INSERT INTO `sa_cabms` (`Id`, `Id_CABMS`, `Id_UMedida`, `vDescripcionCABMS`, `cTipoAlmacen`, `nConsecutivoInv`, `ePartidaPresupuestal`) VALUES
(5009, '2111000002', 1, 'ACEITE PARA MUEBLES', 'N', '0', 2111),
(5010, '2111000004', 1, 'ACHAPARRADOR DE LETRAS', 'N', '0', 2111),
(5011, '2111000006', 1, 'AGENDA', 'N', '0', 2111),
(5012, '2111000008', 1, 'AGUJA PARA ALACRÁN', 'N', '0', 2111),
(5013, '2111000010', 1, 'ALARGADERA', 'N', '0', 2111),
(5014, '2111000012', 1, 'ÁLBUM', 'N', '0', 2111),
(5015, '2111000014', 1, 'ALFILER PARA SEÑALIZACIÓN EN MAPA', 'N', '0', 2111),
(5016, '2111000016', 1, 'ATRIL MECANOGRÁFICO', 'N', '0', 2111),
(5017, '2111000018', 1, 'BARRA LISTERO (PORTA LISTAS O BARRA ROTAFOLIO)', 'N', '0', 2111),
(5018, '2111000020', 1, 'BARRIL PUNTO RAPIDÓGRAFO', 'N', '0', 2111),
(5019, '2111000022', 1, 'BASE AGENDA', 'N', '0', 2111),
(5020, '2111000024', 1, 'BASE CALENDARIO', 'N', '0', 2111),
(5021, '2111000026', 1, 'BASE CORTES MATERIAL DIBUJO', 'N', '0', 2111),
(5022, '2111000028', 1, 'BASE PLANOS', 'N', '0', 2111),
(5023, '2111000030', 1, 'BASTIDOR', 'N', '0', 2111);

-- --------------------------------------------------------

--
-- Table structure for table `sa_cargainiarticulo`
--

CREATE TABLE `sa_cargainiarticulo` (
  `Id_Unidad` varchar(10) DEFAULT NULL,
  `nAnioCarga` int(11) DEFAULT NULL,
  `Id_CveCABMS` text,
  `cTipoCarga` varchar(1) DEFAULT NULL,
  `cEstadoCarga` varchar(1) DEFAULT NULL,
  `eCantidadCargaIni` int(10) DEFAULT NULL,
  `eCantidadEntregada` int(10) DEFAULT NULL,
  `cEstadoDocto` varchar(1) DEFAULT NULL,
  `dFechaCaptura` date DEFAULT NULL,
  `dFechaUltimoMovimiento` date DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `dFechaModRegistro` date DEFAULT NULL,
  `eNumFolioCarga` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_consumohistorico`
--

CREATE TABLE `sa_consumohistorico` (
  `Id_CABMS` text,
  `eAnio` decimal(4,0) DEFAULT NULL,
  `eMes` decimal(2,0) DEFAULT NULL,
  `eTotalAcumulado` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_contrarecibo`
--

CREATE TABLE `sa_contrarecibo` (
  `Id` int(10) NOT NULL,
  `Id_Folio` varchar(255) NOT NULL,
  `dFechaAlta` date DEFAULT NULL,
  `Id_Pedido` int(10) DEFAULT NULL,
  `Id_Proveedor` text NOT NULL,
  `vNoRemisionFactura` text,
  `mImporte` float(19,4) DEFAULT NULL,
  `cEstado` varchar(1) DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `dFechaModRegistro` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_detallepedido`
--

CREATE TABLE `sa_detallepedido` (
  `Id` int(10) NOT NULL,
  `Id_Partida` int(11) NOT NULL,
  `Id_Pedido` varchar(10) DEFAULT NULL,
  `Id_CABMS` varchar(10) DEFAULT NULL,
  `Id_CveARTCABMS` decimal(4,0) DEFAULT NULL,
  `Id_UMedida` int(10) DEFAULT NULL,
  `Id_CveInternaAC` int(10) DEFAULT NULL,
  `eCantidad` int(10) DEFAULT NULL,
  `mPrecioUnitario` decimal(19,4) DEFAULT NULL,
  `vCaracteristicas` longtext,
  `dFechaRegistro` datetime DEFAULT NULL,
  `dFechaModRegistro` datetime DEFAULT NULL,
  `cEstado` varchar(1) DEFAULT NULL,
  `nIva` decimal(6,2) DEFAULT NULL,
  `nDescuento` decimal(6,2) DEFAULT NULL,
  `cTipoAlmacen` varchar(1) DEFAULT NULL,
  `eCantidadEntregada` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_empleado`
--

CREATE TABLE `sa_empleado` (
  `Id_NumEmpleado` int(10) NOT NULL,
  `vNombre` text NOT NULL,
  `vRFC` text NOT NULL,
  `eZonaPago` text NOT NULL,
  `vCargo` text NOT NULL,
  `Adscripcion` text NOT NULL,
  `Ubicacion` text NOT NULL,
  `Domicilio` text NOT NULL,
  `eZonaPagoAnterior` int(10) NOT NULL,
  `bEstadoEmpleado` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_estadobien`
--

CREATE TABLE `sa_estadobien` (
  `Id` int(10) NOT NULL,
  `Id_EdoBien` varchar(255) NOT NULL,
  `vDescripcion` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_estadobien`
--

INSERT INTO `sa_estadobien` (`Id`, `Id_EdoBien`, `vDescripcion`) VALUES
(5, '1', 'Bueno'),
(6, '2', 'Regular'),
(7, '3', 'Malo'),
(8, '4', 'Pendiente de ReparaciÃ³n'),
(9, '5', 'Pendiente de Baja'),
(10, '6', 'Pendiente de EvaluaciÃ³n'),
(11, '7', 'Dado de Baja');

-- --------------------------------------------------------

--
-- Table structure for table `sa_existenciasconsumible`
--

CREATE TABLE `sa_existenciasconsumible` (
  `Id` int(11) NOT NULL,
  `Id_CABMS` text NOT NULL,
  `eCantidadExistenciaDisponible` int(10) DEFAULT NULL,
  `eCantidadExistenciaApartada` int(10) DEFAULT NULL,
  `mCostoPromedioActual` float DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `dFechaModRegistro` date DEFAULT NULL,
  `eConsumoPromedio` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_factorpronostico`
--

CREATE TABLE `sa_factorpronostico` (
  `Id` int(11) NOT NULL,
  `eAnio` varchar(20) NOT NULL,
  `eMes` varchar(50) NOT NULL,
  `eFactor` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_fechaprogramadaentrega`
--

CREATE TABLE `sa_fechaprogramadaentrega` (
  `Id` int(11) NOT NULL,
  `Id_Pedido` varchar(10) DEFAULT NULL,
  `Id_Partida` int(10) DEFAULT NULL,
  `Id_dFechEntrega` date DEFAULT NULL,
  `eCantidad` int(10) DEFAULT NULL,
  `Id_Modificacion` int(10) DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `dFechaModRegistro` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_giro`
--

CREATE TABLE `sa_giro` (
  `Id_Giro` int(10) NOT NULL,
  `vDescripcionGR` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_giro`
--

INSERT INTO `sa_giro` (`Id_Giro`, `vDescripcionGR`) VALUES
(1, 'qqqq'),
(2, 'MATERIAL DE LIMPIEZA'),
(3, 'MATERIAL DIDACTICO'),
(4, 'MATERIAL DE REPRODICCION GRAFICA'),
(5, 'MATERIAL DE IMPRERSION INFORMATICA'),
(6, 'MATERIAS PRIMAS'),
(7, 'REFACCIONES Y HERRAMIENTAS'),
(8, 'MATERIAL DE CONSTRUCCION'),
(9, 'ESTRUCTURAS Y MANUFACTURAS'),
(10, 'MATERIAL ELECTRICO'),
(11, 'PRODUCTOS FARMACEUTICOS'),
(12, 'MATERIALES MEDICOS Y DE LABORATORIO'),
(13, 'UTENSILIOS DE ALIMENTACION'),
(14, 'COMBUSTIBLES, ACEITES Y LUBRICANTES'),
(15, 'VESTUARIO, UNIFORMES Y BLANCOS'),
(16, 'PRENDAS DE PROTECCION'),
(17, 'ARTICULOS DEPORTIVOS'),
(18, 'IMPRESIONES Y PUBLICACIONES OFICIALES'),
(19, 'MOBILIARIO'),
(20, 'EQUIPO ADMINISTRATIVO'),
(21, 'MAQUINAS Y EQUIPO ELECTRONICO'),
(22, 'EQUIPO DE COMPUTACION'),
(23, 'EQUIPO DE SOFTWARE'),
(24, 'VEHICULOS'),
(25, 'PRESTACIONES Y SERVICIOS'),
(26, 'COMERCIALIZADORAS'),
(27, 'MATERIAL DE FERRETERIA'),
(28, 'EQUIPO Y APARATOS DE  Y COMUNICACIONES Y TELECOMUNICACIONES'),
(34, ''),
(35, '');

-- --------------------------------------------------------

--
-- Table structure for table `sa_grid`
--

CREATE TABLE `sa_grid` (
  `Id` int(10) NOT NULL,
  `Id_CveARTCABMS` int(10) NOT NULL,
  `Id_CveInternaAC` int(10) NOT NULL,
  `IdCABMS` text NOT NULL,
  `VDescripcion` text NOT NULL,
  `ArtApartado` int(10) NOT NULL,
  `ArtDisponibles` int(10) NOT NULL,
  `CostoPromedio` int(10) NOT NULL,
  `NoMarbete` text NOT NULL,
  `Session` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_grid_otroscargos`
--

CREATE TABLE `sa_grid_otroscargos` (
  `Id` int(11) NOT NULL,
  `Id_CABMS` text NOT NULL,
  `Descripcion` text NOT NULL,
  `UnidadMedida` text NOT NULL,
  `Id_UMedida` int(11) NOT NULL,
  `RemFac` text NOT NULL,
  `CostoPromedio` float NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `Session` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_informatico`
--

CREATE TABLE `sa_informatico` (
  `Id` int(11) NOT NULL,
  `Id_CABMS` text,
  `vNumSerie` text,
  `Id_ConsecutivoInv` text,
  `vMarca` text,
  `vModelo` text,
  `vDiscoDuro` text,
  `vRAM` text,
  `vProcesador` text,
  `ePaginasMinuto` text,
  `vFuentePoder` text,
  `vCaracteristicas` text,
  `vMonitorSerie` text,
  `vMonitorMarca` text,
  `vTecladoSerie` text,
  `vTecladoMarca` text,
  `vMouseSerie` text,
  `vMouseMarca` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_inventario`
--

CREATE TABLE `sa_inventario` (
  `Id_ConsecutivoInv` int(11) NOT NULL,
  `Id_CABMS` text,
  `Id_TipoBien` text,
  `Id_Localizacion` text,
  `id_InventarioAnterior` text,
  `vNoFactura` text,
  `mCosto` float DEFAULT NULL,
  `vNumPedido` text,
  `dFechaFactura` date DEFAULT NULL,
  `Id_EdoBien` int(10) DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `dFechaModRegistro` date DEFAULT NULL,
  `bEtiquetaImpresa` tinyint(1) NOT NULL,
  `bEtiquetaImpChica` tinyint(1) NOT NULL,
  `eResguardoImpreso` float DEFAULT NULL,
  `CveUsuario` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_inventarioanterior`
--

CREATE TABLE `sa_inventarioanterior` (
  `Id` int(10) NOT NULL,
  `Id_InventarioAnterior` text,
  `dFechaFactura` date DEFAULT NULL,
  `eNoFactura` text,
  `eNoPedido` text,
  `mCosto` float(19,4) DEFAULT NULL,
  `eCausa` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_inventariofisico`
--

CREATE TABLE `sa_inventariofisico` (
  `Id` int(10) NOT NULL,
  `Id_Cabms` text,
  `Id_ConsecutivoInv` text,
  `Id_unidad` text,
  `dFechaRegistro` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_localizacion`
--

CREATE TABLE `sa_localizacion` (
  `Id_Localizacion` decimal(4,0) DEFAULT NULL,
  `bEstadoRegistro` tinyint(1) NOT NULL,
  `vDescripcion` varchar(60) DEFAULT NULL,
  `cTipoAlmacen` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_localizacion`
--

INSERT INTO `sa_localizacion` (`Id_Localizacion`, `bEstadoRegistro`, `vDescripcion`, `cTipoAlmacen`) VALUES
('100', -1, 'NAVE CENTRAL ANAQUEL  0', 'C'),
('200', -1, 'NAVE CENTRAL ANAQUEL 30', 'C'),
('300', -1, 'NAVE CENTRAL GABINETE 1', 'C'),
('400', -1, 'NAVE CENTRAL GABINETE 2', 'C'),
('500', -1, 'NAVE CENTRAL GABINETE 3', 'C'),
('600', -1, 'NAVE CENTRAL GABINETE 4', 'C'),
('700', -1, 'NAVE CENTRAL GABINETE 5', 'C'),
('800', -1, 'NAVE CENTRAL GABINETE 6', 'C'),
('900', -1, 'NAVE CENTRAL PASILLO \"A\"  ANAQUEL  1', 'C'),
('1000', -1, 'NAVE CENTRAL PASILLO \"A\"  ANAQUEL  2', 'C'),
('1100', -1, 'NAVE CENTRAL PASILLO \"A\"  MODULO  1', 'C'),
('1200', -1, 'NAVE CENTRAL PASILLO \"B\"  ANAQUEL  3', 'C'),
('1300', -1, 'NAVE CENTRAL PASILLO \"B\"  ANAQUEL  4', 'C'),
('1400', -1, 'NAVE CENTRAL PASILLO \"B\"  MODULO  1', 'C'),
('1500', -1, 'NAVE CENTRAL PASILLO \"C\"  ANAQUEL  5', 'C'),
('1600', -1, 'NAVE CENTRAL PASILLO \"C\"  ANAQUEL  6', 'C'),
('1700', -1, 'NAVE CENTRAL PASILLO \"C\"  MODULO  1', 'C'),
('1800', -1, 'NAVE CENTRAL PASILLO \"D\"  ANAQUEL  7', 'C'),
('1900', -1, 'NAVE CENTRAL PASILLO \"D\"  ANAQUEL  8', 'C'),
('2000', -1, 'NAVE CENTRAL PASILLO \"D\"  MODULO  1', 'C'),
('2100', -1, 'NAVE CENTRAL PASILLO \"E\"  ANAQUEL  9', 'C'),
('2200', -1, 'NAVE CENTRAL PASILLO \"E\"  ANAQUEL 10', 'C'),
('2300', -1, 'NAVE CENTRAL PASILLO \"E\"  MODULO  1', 'C'),
('2400', -1, 'NAVE CENTRAL PASILLO \"F\"  ANAQUEL 11', 'C'),
('2500', -1, 'NAVE CENTRAL PASILLO \"F\"  ANAQUEL 12', 'C'),
('2600', -1, 'NAVE CENTRAL PASILLO \"F\"  MODULO  1', 'C'),
('2700', -1, 'NAVE CENTRAL PASILLO \"G\"  ANAQUEL 13', 'C'),
('2800', -1, 'NAVE CENTRAL PASILLO \"G\"  ANAQUEL 14', 'C'),
('2900', -1, 'NAVE CENTRAL PASILLO \"G\"  MODULO  1', 'C'),
('3000', -1, 'NAVE CENTRAL PASILLO \"H\"  ANAQUEL 15', 'C'),
('3100', -1, 'NAVE CENTRAL PASILLO \"H\"  ANAQUEL 16', 'C'),
('3200', -1, 'NAVE CENTRAL PASILLO \"H\"  MODULO  1', 'C'),
('3300', -1, 'NAVE CENTRAL PASILLO \"I\"  ANAQUEL 17', 'C'),
('3400', -1, 'NAVE CENTRAL PASILLO \"I\"  ANAQUEL 18', 'C'),
('3500', -1, 'NAVE CENTRAL PASILLO \"I\"  MODULO  1', 'C'),
('3600', -1, 'NAVE CENTRAL PASILLO \"J\"  ANAQUEL 19', 'C'),
('3700', -1, 'NAVE CENTRAL PASILLO \"J\"  ANAQUEL 20', 'C'),
('3800', -1, 'NAVE CENTRAL PASILLO \"J\"  MODULO  1', 'C'),
('3900', -1, 'NAVE CENTRAL PASILLO \"K\"  ANAQUEL 21', 'C'),
('4000', -1, 'NAVE CENTRAL PASILLO \"K\"  ANAQUEL 22', 'C'),
('4100', -1, 'NAVE CENTRAL PASILLO \"K\"  MODULO  1', 'C'),
('4200', -1, 'NAVE CENTRAL PASILLO \"L\"  ANAQUEL 23', 'C'),
('4300', -1, 'NAVE CENTRAL PASILLO \"L\"  ANAQUEL 24', 'C'),
('4400', -1, 'NAVE CENTRAL PASILLO \"L\"  MODULO  1', 'C'),
('4500', -1, 'NAVE CENTRAL PASILLO \"LL\" ANAQUEL 25', 'C'),
('4600', -1, 'NAVE CENTRAL PASILLO \"LL\" ANAQUEL 26', 'C'),
('4700', -1, 'NAVE CENTRAL PASILLO \"LL\" MODULO  1', 'C'),
('4800', -1, 'NAVE CENTRAL PASILLO \"M\"  ANAQUEL 27', 'C'),
('4900', -1, 'NAVE CENTRAL PASILLO \"M\"  ANAQUEL 28', 'C'),
('5000', -1, 'NAVE CENTRAL PASILLO \"M\"  MODULO  1', 'C'),
('5100', -1, 'NAVE CENTRAL PASILLO \"N\"  ANAQUEL 29', 'C'),
('5200', -1, 'NAVE CENTRAL PASILLO \"N\"  MODULO  1', 'C'),
('5300', -1, 'NAVE CENTRAL PASILLO \"N\"  MODULO  2', 'C'),
('5400', -1, 'NAVE MENOR MODULO  4', 'C'),
('5500', -1, 'NAVE MENOR MODULO  5', 'C'),
('5600', -1, 'NAVE MENOR MODULO  6', 'C'),
('5700', -1, 'NAVE MENOR MODULO  7', 'C'),
('5800', -1, 'NAVE MENOR MODULO  8', 'C'),
('5900', -1, 'NAVE MENOR MODULO  9', 'C'),
('6000', -1, 'NAVE MENOR MODULO 10', 'C'),
('6100', -1, 'NAVE MENOR MODULO 11', 'C'),
('6200', -1, 'NAVE MENOR MODULO 12', 'C'),
('6300', -1, 'NAVE MENOR MODULO 13', 'C'),
('6400', -1, 'NAVE MENOR MODULO 14', 'C'),
('6500', -1, 'NAVE MENOR MODULO 15', 'C'),
('6600', -1, 'NAVE MENOR MODULO 16', 'C'),
('9980', -1, 'PENDIENTE DE UBICACION CONSUMIBLES', 'C'),
('9990', -1, 'PENDIENTE DE UBICACION INVENTARIABLES', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `sa_locarticulos`
--

CREATE TABLE `sa_locarticulos` (
  `Id` int(11) NOT NULL,
  `Id_Localizacion` text,
  `Id_CABMS` text,
  `eCantidadLocalizacion` int(10) DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `dFechaModRegistro` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_menu_catalogos`
--

CREATE TABLE `sa_menu_catalogos` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Empleado` varchar(3) NOT NULL,
  `Cabms` varchar(3) NOT NULL,
  `Cabms_Consumible` varchar(3) NOT NULL,
  `Giro` varchar(3) NOT NULL,
  `UnidadMemoria` varchar(3) NOT NULL,
  `Proveedores` varchar(3) NOT NULL,
  `UnidadAdministrativa` varchar(3) NOT NULL,
  `TipoMovimiento` varchar(3) NOT NULL,
  `Parametro` varchar(3) NOT NULL,
  `EstadoBien` varchar(3) NOT NULL,
  `TipoBienInventariable` varchar(3) NOT NULL,
  `FactoresPronostico` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_menu_catalogos`
--

INSERT INTO `sa_menu_catalogos` (`Id`, `IdUsuario`, `Empleado`, `Cabms`, `Cabms_Consumible`, `Giro`, `UnidadMemoria`, `Proveedores`, `UnidadAdministrativa`, `TipoMovimiento`, `Parametro`, `EstadoBien`, `TipoBienInventariable`, `FactoresPronostico`) VALUES
(1, 1, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(2, 3, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(6, 18, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO'),
(7, 19, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(8, 20, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO'),
(9, 21, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO'),
(10, 22, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO'),
(11, 23, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `sa_menu_procesos`
--

CREATE TABLE `sa_menu_procesos` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Procesos` varchar(3) NOT NULL,
  `Pedidos` varchar(3) NOT NULL,
  `Consumibles` varchar(3) NOT NULL,
  `Consumibles_Entradas` varchar(3) NOT NULL,
  `Consumibles_Salidas` varchar(3) NOT NULL,
  `Invetaribales` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_menu_procesos`
--

INSERT INTO `sa_menu_procesos` (`Id`, `IdUsuario`, `Procesos`, `Pedidos`, `Consumibles`, `Consumibles_Entradas`, `Consumibles_Salidas`, `Invetaribales`) VALUES
(1, 1, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(2, 3, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(6, 18, 'YES', 'NO', 'NO', 'NO', 'NO', 'NO'),
(7, 19, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(8, 20, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO'),
(9, 21, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO'),
(10, 22, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO'),
(11, 23, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `sa_menu_reportes`
--

CREATE TABLE `sa_menu_reportes` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Reportes` varchar(3) NOT NULL,
  `Pedidos` varchar(3) NOT NULL,
  `Consumibles` varchar(3) NOT NULL,
  `Inventarios` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_menu_reportes`
--

INSERT INTO `sa_menu_reportes` (`Id`, `IdUsuario`, `Reportes`, `Pedidos`, `Consumibles`, `Inventarios`) VALUES
(4, 1, 'YES', 'YES', 'YES', 'YES'),
(5, 19, 'YES', 'YES', 'YES', 'YES'),
(6, 20, 'NO', 'NO', 'NO', 'NO'),
(7, 21, 'NO', 'NO', 'NO', 'NO'),
(8, 22, 'NO', 'NO', 'NO', 'NO'),
(9, 23, 'YES', 'YES', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `sa_movconsumo`
--

CREATE TABLE `sa_movconsumo` (
  `Id` int(10) NOT NULL,
  `Id_CABMS` text,
  `Id_Unidad` text,
  `Id_TipoMovimiento` int(10) DEFAULT NULL,
  `dFechaMovRegistro` date DEFAULT NULL,
  `nFolio` text,
  `vNumPedido` text,
  `vDocumento` text,
  `eCantidad` int(10) DEFAULT NULL,
  `mCostoUnitario` float DEFAULT NULL,
  `eExistenciaIniMovto` int(10) DEFAULT NULL,
  `eCantidadApartadaSalida` int(10) DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `mCostoPromedioIniMovto` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_movdirecto`
--

CREATE TABLE `sa_movdirecto` (
  `Id_Unidad` varchar(10) DEFAULT NULL,
  `Id_CveARTCABMS` int(10) DEFAULT NULL,
  `Id_CveInternaAC` int(10) DEFAULT NULL,
  `eCantidadEntrada` int(10) DEFAULT NULL,
  `eCantidadSurtida` int(10) DEFAULT NULL,
  `vDocumento` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_movinventario`
--

CREATE TABLE `sa_movinventario` (
  `Id` int(11) NOT NULL,
  `Id_CABMS` text,
  `Id_ConsecutivoInv` text,
  `Resguardante1` text,
  `Id_TipoMovimiento` text,
  `Id_Unidad` text,
  `Resguardante2` text,
  `Resguardante3` text,
  `eNumFolio` text,
  `dFechaResguardo` date DEFAULT NULL,
  `dFechaMovRegistro` date DEFAULT NULL,
  `vDoctoOficial` text,
  `Id_EdoMovimiento` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_movinventario`
--

INSERT INTO `sa_movinventario` (`Id`, `Id_CABMS`, `Id_ConsecutivoInv`, `Resguardante1`, `Id_TipoMovimiento`, `Id_Unidad`, `Resguardante2`, `Resguardante3`, `eNumFolio`, `dFechaResguardo`, `dFechaMovRegistro`, `vDoctoOficial`, `Id_EdoMovimiento`) VALUES
(1, '1', '1', '1', '1', '1', '1', '11', '1', '2015-11-13', '2015-11-13', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sa_mueble`
--

CREATE TABLE `sa_mueble` (
  `Id` int(10) NOT NULL,
  `Id_CABMS` text,
  `vCaracteristicas` text,
  `Id_ConsecutivoInv` text,
  `vNumSerie` text,
  `vMarca` text,
  `vModelo` text,
  `vTipo` text,
  `eNoCajon` text,
  `eNoGaveta` text,
  `eNoEntrepanio` text,
  `bPedestal` varchar(3) NOT NULL,
  `bFija` varchar(3) NOT NULL,
  `bGiratoria` varchar(3) NOT NULL,
  `bRodajas` varchar(3) NOT NULL,
  `bPlegable` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_parametro`
--

CREATE TABLE `sa_parametro` (
  `Id` int(10) NOT NULL,
  `Id_Parametro` varchar(255) NOT NULL,
  `sDescripcion` text,
  `sValor` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_parametro`
--

INSERT INTO `sa_parametro` (`Id`, `Id_Parametro`, `sDescripcion`, `sValor`) VALUES
(52, '1', 'DEPENDECIA RESGUARDO', 'SECRETARIA DE FINANZAS'),
(53, '2', 'DGRMSG RESGUARDO', 'CAT'),
(54, '3', 'DEP. RESGUARDO', '61'),
(55, '4', 'PROC RESGUARDO', '61'),
(56, '5', 'A-O DE EJERCICIO ACTUAL', '2011'),
(57, '6', 'FACTOR DE CALCULO DE MINUMOS', '3'),
(58, '7', 'FACTOR DE CALCULO DE MAXIMOS', '9'),
(59, '8', 'TITULO REPORTES 1', 'SECRETARIA DE FINANZAS'),
(60, '9', 'TITULO REPORTES 2', 'DIRECCION GENERAL DE ADMINISTRACION'),
(61, '10', 'TITULO REPORTES 3', 'DIRECCION DE RECURSOS MATERIALES'),
(62, '11', 'TITULO REPORTES 4', 'SUBDIRECCION DE RECURSOS MATERIALES'),
(63, '12', 'TITULO REPORTES 5', 'U.D. DE ALAMACENES E INVENTARIOS'),
(64, '13', 'JEFE DE INFORMATICA', '303757'),
(65, '14', 'SECCION DE PEDIDOS', '79641'),
(66, '15', 'JEFE DE ALMACEN DE BIENES DE CONSUMO', '896448'),
(67, '16', 'SECCION DEL ALMACEN DE CONSUMIBLE', '30362'),
(68, '17', 'JEFE DE ALMACEN DE MOBILIARIO Y EQUIPO', '303632'),
(69, '18', 'SECCION DE ALMACEN DE MOBILIARIO Y EQUIPO', '36168'),
(70, '19', 'UNIDAD ADMINISTRATIVA DE ALAMENES E INVETARIOS', 'K212'),
(71, '20', 'UNIDAD ADMINISTRATIVA DE ALAMENES E INVETARIOS(BODEGA)', 'K2128'),
(72, '21', 'UNIDAD ADMINISTRATIVA DE ALAMENES E INVETARIOS(RESGUARDO)', 'K212C'),
(73, '22', 'UNIDAD ADMINISTRATIVA DE ALAMENES E INVETARIOS(BAJA)', 'K212D');

-- --------------------------------------------------------

--
-- Table structure for table `sa_pedido`
--

CREATE TABLE `sa_pedido` (
  `Id` int(10) NOT NULL,
  `Id_Pedido` text NOT NULL,
  `Id_Proveedor` text,
  `Id_UnidadAdmonDes` varchar(10) DEFAULT NULL,
  `dFechaPedido` date DEFAULT NULL,
  `vNoRequisicion` varchar(40) DEFAULT NULL,
  `vNoLicitacion` varchar(15) DEFAULT NULL,
  `dFechaRegistro` date DEFAULT NULL,
  `dFechaModRegistro` date DEFAULT NULL,
  `cEstado` varchar(1) DEFAULT NULL,
  `vDocumentoOficio` varchar(10) DEFAULT NULL,
  `eNumModificaciones` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_proveedor`
--

CREATE TABLE `sa_proveedor` (
  `Id` int(10) NOT NULL,
  `Id_Proveedor` varchar(7) DEFAULT NULL,
  `Id_Giro` int(10) DEFAULT NULL,
  `vNombre` text,
  `vResponsable` text,
  `vCalle` text,
  `vNumero` text,
  `Colonia` text,
  `vPoblacion` text,
  `vCP` text,
  `cRFC` text,
  `cPadronFedProv` text,
  `cCedulaEmpadr` text,
  `cCamaraComercio` text,
  `cCanacintra` text,
  `cCamaraRamo` text,
  `vTelefono1` text,
  `vTelefono2` text,
  `bNacional` text NOT NULL,
  `vTelFax` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_settings`
--

CREATE TABLE `sa_settings` (
  `Id` int(11) NOT NULL,
  `Inicio` text NOT NULL,
  `Header` text NOT NULL,
  `Reportes` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_settings`
--

INSERT INTO `sa_settings` (`Id`, `Inicio`, `Header`, `Reportes`) VALUES
(1, 'logo_gdf.jpg', 'sep_logo.png', 'logo_gdf_reportes.png');

-- --------------------------------------------------------

--
-- Table structure for table `sa_tipobieninventariable`
--

CREATE TABLE `sa_tipobieninventariable` (
  `Id` int(10) NOT NULL,
  `Id_TipoBien` varchar(255) NOT NULL,
  `vDescripcion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_tipobieninventariable`
--

INSERT INTO `sa_tipobieninventariable` (`Id`, `Id_TipoBien`, `vDescripcion`) VALUES
(8, '1', 'Bienes Muebles y Equipo'),
(9, '2', 'Bienes de Equipo InformÃ¡tico'),
(10, '3', 'VehÃ­culos'),
(11, '4', 'Bienes de Acervo Cultural');

-- --------------------------------------------------------

--
-- Table structure for table `sa_tipomovimiento`
--

CREATE TABLE `sa_tipomovimiento` (
  `Id` int(10) NOT NULL,
  `Id_TipoMovimiento` varchar(4) DEFAULT NULL,
  `vDescripcion` text,
  `bEntrada` varchar(3) NOT NULL,
  `bBaja` varchar(3) NOT NULL,
  `cTipoAlmacen` varchar(1) DEFAULT NULL,
  `bSalida` varchar(3) NOT NULL,
  `bEstadoMov` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_tipomovimiento`
--

INSERT INTO `sa_tipomovimiento` (`Id`, `Id_TipoMovimiento`, `vDescripcion`, `bEntrada`, `bBaja`, `cTipoAlmacen`, `bSalida`, `bEstadoMov`) VALUES
(1, '101', 'COMPRA DENTRO DE ALMACEN', '1', '0', 'I', '0', '1'),
(2, '102', 'COMPRA DIRECTO', '1', '0', 'C', '0', '1'),
(3, '103', 'COMPRA DISPONIBLE', '1', '0', 'C', '0', '1'),
(4, '104', 'COMPRA FUERA DE ALMACEN', '1', '0', 'A', '0', '1'),
(5, '300', 'DESTRUCCION', '0', '-1', 'I', '0', '1'),
(6, '1500', 'TRASPASO', '1', '-1', 'I', '0', '1'),
(7, '1900', 'RECLASIFICACION', '1', '-1', 'I', '0', '1'),
(8, '2000', 'SUSTITUCION', '1', '-1', 'I', '0', '1'),
(9, '2401', 'CARGA INICIAL POR LEVANTAMIENTO DE INVENTARIO', '1', '0', 'I', '0', '1'),
(10, '2500', 'SALIDA CONSUMIBLES', '0', '0', 'C', '1', '1'),
(11, '2501', 'SALIDA PENDIENTE', '0', '0', 'C', '1', '1'),
(12, '2502', 'SALIDA CERRADO', '0', '0', 'C', '1', '1'),
(13, '2600', 'CARGA DE PRESUPUESTO ANUAL DE CONSUMIBLES', '1', '0', 'C', '0', '1'),
(14, '2700', 'DONACION', '1', '0', 'I', '0', '1'),
(15, '2800', 'DESTINO FINAL: DESTRUCCION', '0', '0', 'I', '1', '1'),
(16, '2900', 'DESTINO FINAL: VENTA POR LICITACION', '0', '0', 'I', '1', '1'),
(17, '3000', 'REACTIVACION', '0', '1', 'I', '0', '1'),
(18, '4000', 'OTROS CONCEPTOS', '1', '0', 'C', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sa_umedida`
--

CREATE TABLE `sa_umedida` (
  `Id_UMedida` int(10) NOT NULL,
  `vDescripcion` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_umedida`
--

INSERT INTO `sa_umedida` (`Id_UMedida`, `vDescripcion`) VALUES
(1, 'EQUIPO1'),
(2, 'BLOCK'),
(3, 'BOBINAS'),
(4, 'BOLSA'),
(5, 'BOTE'),
(6, 'BOTELLA'),
(7, 'BULTO'),
(8, 'CAJA'),
(9, 'CARTUCHO'),
(10, 'CIENTO'),
(11, 'CMS'),
(12, 'CUBETA'),
(13, 'ESTUCHE'),
(14, 'FAJILLA'),
(15, 'FRASCO'),
(16, 'GALON'),
(17, 'HOJA'),
(18, 'JUEGO'),
(19, 'KILOGRAMO'),
(20, 'LATA'),
(21, 'LITRO'),
(22, 'LOTE'),
(23, 'METRO'),
(24, 'MILLAR'),
(25, 'METRO CUADRADO'),
(26, 'METRO LINEAL'),
(27, 'METRO CUBICO'),
(28, 'PAQUETE'),
(29, 'PAR'),
(30, 'PIEZA'),
(31, 'PLIEGO'),
(32, 'POMO'),
(33, 'PROGRAMA'),
(34, 'ROLLO'),
(35, 'SERVICIO'),
(36, 'SUSCRIPCION'),
(37, 'TAMBO'),
(38, 'TRAMO'),
(39, 'TUBO'),
(40, 'CMS CUADRADOS'),
(41, 'CARRETE'),
(48, 'Armando'),
(49, 'Armando 3'),
(50, 'BMW'),
(51, 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `sa_unidadadmva`
--

CREATE TABLE `sa_unidadadmva` (
  `Id` int(10) NOT NULL,
  `Id_Unidad` text,
  `Id_ResponsableArea` int(10) DEFAULT NULL,
  `Id_Zonas` int(10) DEFAULT NULL,
  `vDescripcion` text,
  `vCalle` text,
  `VNumero` varchar(50) DEFAULT NULL,
  `vColonia` text,
  `vPoblacion` text,
  `vCP` varchar(50) DEFAULT NULL,
  `vTelefono` varchar(50) DEFAULT NULL,
  `vTelFax` varchar(50) DEFAULT NULL,
  `ePrioridad` text,
  `bAreaActiva` varchar(3) NOT NULL,
  `eNumFolio` int(10) DEFAULT NULL,
  `uEjec` varchar(100) DEFAULT NULL,
  `eNumEmpleados` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_usuarios`
--

CREATE TABLE `sa_usuarios` (
  `Id` int(11) NOT NULL,
  `IdEmpleado` text NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Nombres` text NOT NULL,
  `Password` text NOT NULL,
  `Habilitado` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_usuarios`
--

INSERT INTO `sa_usuarios` (`Id`, `IdEmpleado`, `Usuario`, `Nombres`, `Password`, `Habilitado`) VALUES
(1, '000001', 'Root', 'Armando Aguilar Lopez', 'faf074d3a0eb694a83b684c2626eb87a', 'YES'),
(19, '00023', 'AAguilar', 'Armando Aguilar', 'e10adc3949ba59abbe56e057f20f883e', 'YES'),
(23, '0001', 'Oliver', 'Oliver', 'fcea920f7412b5da7be0cf42b8c93759', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `sa_vehiculo`
--

CREATE TABLE `sa_vehiculo` (
  `Id` int(11) NOT NULL,
  `Id_CABMS` text,
  `vMarca` text,
  `Id_ConsecutivoInv` text,
  `vTipo` text,
  `vModelo` text,
  `vNumSerie` text,
  `vNumMotor` text,
  `vPlacas` text,
  `vRFV` text,
  `cTipoTransmision` varchar(3) DEFAULT NULL,
  `cUso` varchar(3) DEFAULT NULL,
  `vCaracteristicas` text,
  `cTipoDireccion` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sa_zona`
--

CREATE TABLE `sa_zona` (
  `Id_Zonas` int(10) DEFAULT NULL,
  `vDescripcionZn` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_zona`
--

INSERT INTO `sa_zona` (`Id_Zonas`, `vDescripcionZn`) VALUES
(1, 'ZONA NORTE'),
(2, 'ZONA SUR'),
(3, 'ZONA ORIENTE'),
(4, 'ZONA PONIENTE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sa_cabms`
--
ALTER TABLE `sa_cabms`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_cargainiarticulo`
--
ALTER TABLE `sa_cargainiarticulo`
  ADD PRIMARY KEY (`eNumFolioCarga`);

--
-- Indexes for table `sa_contrarecibo`
--
ALTER TABLE `sa_contrarecibo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_detallepedido`
--
ALTER TABLE `sa_detallepedido`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_empleado`
--
ALTER TABLE `sa_empleado`
  ADD PRIMARY KEY (`Id_NumEmpleado`);

--
-- Indexes for table `sa_estadobien`
--
ALTER TABLE `sa_estadobien`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_existenciasconsumible`
--
ALTER TABLE `sa_existenciasconsumible`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_factorpronostico`
--
ALTER TABLE `sa_factorpronostico`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_fechaprogramadaentrega`
--
ALTER TABLE `sa_fechaprogramadaentrega`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_giro`
--
ALTER TABLE `sa_giro`
  ADD PRIMARY KEY (`Id_Giro`);

--
-- Indexes for table `sa_grid`
--
ALTER TABLE `sa_grid`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_grid_otroscargos`
--
ALTER TABLE `sa_grid_otroscargos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_informatico`
--
ALTER TABLE `sa_informatico`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_inventario`
--
ALTER TABLE `sa_inventario`
  ADD PRIMARY KEY (`Id_ConsecutivoInv`);

--
-- Indexes for table `sa_inventarioanterior`
--
ALTER TABLE `sa_inventarioanterior`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_inventariofisico`
--
ALTER TABLE `sa_inventariofisico`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_locarticulos`
--
ALTER TABLE `sa_locarticulos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_menu_catalogos`
--
ALTER TABLE `sa_menu_catalogos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_menu_procesos`
--
ALTER TABLE `sa_menu_procesos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_menu_reportes`
--
ALTER TABLE `sa_menu_reportes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_movconsumo`
--
ALTER TABLE `sa_movconsumo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_movinventario`
--
ALTER TABLE `sa_movinventario`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_mueble`
--
ALTER TABLE `sa_mueble`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_parametro`
--
ALTER TABLE `sa_parametro`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_pedido`
--
ALTER TABLE `sa_pedido`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_proveedor`
--
ALTER TABLE `sa_proveedor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_tipobieninventariable`
--
ALTER TABLE `sa_tipobieninventariable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_tipomovimiento`
--
ALTER TABLE `sa_tipomovimiento`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_umedida`
--
ALTER TABLE `sa_umedida`
  ADD PRIMARY KEY (`Id_UMedida`);

--
-- Indexes for table `sa_unidadadmva`
--
ALTER TABLE `sa_unidadadmva`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_usuarios`
--
ALTER TABLE `sa_usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sa_vehiculo`
--
ALTER TABLE `sa_vehiculo`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sa_cabms`
--
ALTER TABLE `sa_cabms`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14196;
--
-- AUTO_INCREMENT for table `sa_cargainiarticulo`
--
ALTER TABLE `sa_cargainiarticulo`
  MODIFY `eNumFolioCarga` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_contrarecibo`
--
ALTER TABLE `sa_contrarecibo`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_detallepedido`
--
ALTER TABLE `sa_detallepedido`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_empleado`
--
ALTER TABLE `sa_empleado`
  MODIFY `Id_NumEmpleado` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_estadobien`
--
ALTER TABLE `sa_estadobien`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sa_existenciasconsumible`
--
ALTER TABLE `sa_existenciasconsumible`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_factorpronostico`
--
ALTER TABLE `sa_factorpronostico`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_fechaprogramadaentrega`
--
ALTER TABLE `sa_fechaprogramadaentrega`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_giro`
--
ALTER TABLE `sa_giro`
  MODIFY `Id_Giro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `sa_grid`
--
ALTER TABLE `sa_grid`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `sa_grid_otroscargos`
--
ALTER TABLE `sa_grid_otroscargos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `sa_informatico`
--
ALTER TABLE `sa_informatico`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10417;
--
-- AUTO_INCREMENT for table `sa_inventario`
--
ALTER TABLE `sa_inventario`
  MODIFY `Id_ConsecutivoInv` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_inventarioanterior`
--
ALTER TABLE `sa_inventarioanterior`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_inventariofisico`
--
ALTER TABLE `sa_inventariofisico`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_locarticulos`
--
ALTER TABLE `sa_locarticulos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2501;
--
-- AUTO_INCREMENT for table `sa_menu_catalogos`
--
ALTER TABLE `sa_menu_catalogos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sa_menu_procesos`
--
ALTER TABLE `sa_menu_procesos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sa_menu_reportes`
--
ALTER TABLE `sa_menu_reportes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sa_movconsumo`
--
ALTER TABLE `sa_movconsumo`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_movinventario`
--
ALTER TABLE `sa_movinventario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sa_mueble`
--
ALTER TABLE `sa_mueble`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_parametro`
--
ALTER TABLE `sa_parametro`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `sa_pedido`
--
ALTER TABLE `sa_pedido`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_proveedor`
--
ALTER TABLE `sa_proveedor`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_tipobieninventariable`
--
ALTER TABLE `sa_tipobieninventariable`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sa_tipomovimiento`
--
ALTER TABLE `sa_tipomovimiento`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sa_umedida`
--
ALTER TABLE `sa_umedida`
  MODIFY `Id_UMedida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `sa_unidadadmva`
--
ALTER TABLE `sa_unidadadmva`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sa_usuarios`
--
ALTER TABLE `sa_usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sa_vehiculo`
--
ALTER TABLE `sa_vehiculo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
