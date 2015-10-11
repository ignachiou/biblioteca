-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2015 a las 00:29:44
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo_articulo` varchar(50) NOT NULL,
  `resumen_articulo` varchar(500) NOT NULL,
  `autor_articulo` varchar(50) NOT NULL,
  `url_articulo` varchar(50) NOT NULL,
  `id_revista` int(11) NOT NULL,
  `desc1_articulo` varchar(50) NOT NULL,
  `desc2_articulo` varchar(50) NOT NULL,
  `desc3_articulo` varchar(50) NOT NULL,
  `desc4_articulo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `titulo_articulo`, `resumen_articulo`, `autor_articulo`, `url_articulo`, `id_revista`, `desc1_articulo`, `desc2_articulo`, `desc3_articulo`, `desc4_articulo`) VALUES
(1, 'hola', 'ljskljadkl', 'chichin', '', 0, 'lkjlkjh', 'kjhkjghj', 'jhghjghj', 'jhgjhk'),
(2, 'hola', 'ljskljadkl', 'chichin', '', 0, 'lkjlkjh', 'kjhkjghj', 'jhghjghj', 'jhgjhk'),
(3, 'sdf', 'sdf', 'sdf', '', 0, 'sdf', 'ghh', 'jjiu', 'tyuh'),
(4, 'ihbuibu', 'uhbuib', 'buhbiu', '', 0, 'iuiubuhb', 'iuuiu', 'uhibu', 'hubiub'),
(5, 'guy', 'iig', 'yuguy', '', 3, 'iug', 'iug', 'uyguyggiyu', 'guyguig'),
(6, 'n knkj', 'kjnkjnkj', 'nkjnkjn', '', 3, 'nkjnkjnkj', 'nkjnkjn', 'kjnkjnkjn', 'kjnknk'),
(7, 'uguyg', 'hiuhbhiub', 'ilbhilniu', '', 0, 'bbiu', 'biubuy', 'buybuyb', 'buybi'),
(8, 'debe aparecer ocho', 'jnlii', 'nkjln', '', 0, 'nili', 'kjnkj', 'nkljnkjn', 'kjnlkjasd'),
(9, 'hiuohio', 'hiouhoioi', 'uhiuohoiu', '', 0, 'uhoiho', 'ihiuohoiuh', 'iouhiohiou', 'hih'),
(10, 'jpooikjk', 'joijpoij', 'ojoijoi', '', 0, 'pihiuni', 'nlkm', 'lkmlk', 'noinin'),
(11, 'asdfs', 'guygu', 'iuhuidsghuyguy', '', 0, 'guguy', 'guigy', 'guig', 'uiasd'),
(12, 'jhbuy', 'ioboiu', 'buybib', '', 0, 'bubpo', 'bob', 'oubiub', 'obop'),
(13, 'biuon', 'nionoiun', 'oiunionoiu', '', 0, 'ionioni', 'nioni', 'oinionio', 'uinioniu'),
(14, 'iubiub', 'unonon', 'iubiunuin', '', 0, 'oiniopnoi', 'pnpoinoin', 'oipnpoinoi', 'noinpo'),
(15, 'viyg', 'ugg', 'uyguygi', '', 0, 'yuguyguig', 'ygigu', 'guygiugiuygiugiu', 'guguig'),
(16, 'iyhuih', 'iuohiuhi', 'iuhiuh', '', 3, 'ouhiuhio', 'hiouh', 'oihiuoh', 'iuhiou'),
(19, 'sdhuih', 'oiuhoui', 'iuhiuh', '', 18, 'hoh', 'ihoh', 'ohoho', 'hoh'),
(20, 'ojoij', 'oijioj', 'iojoij', '', 19, 'oijoijoi', 'joijoi', 'joij', 'oijo'),
(21, 'ijoijoi', 'oijoijoijoi', 'joijoij', '', 21, 'joijoijo', 'ijoijoij', 'oijoijoi', 'joijoi'),
(31, '', '', '', '', 0, '', '', '', ''),
(32, 'hioh', 'uihih', 'iuhuihih', '', 31, 'oihuihui', 'hiuhohui', 'hiuohiuh', 'ohoiuho'),
(33, '', '', '', '', 0, '', '', '', ''),
(34, 'tsad', 'ysad', 'fty', '', 33, 'fydsa', 'yftyfytf', 'ytfyfy', 'fytfytfy'),
(35, '', '', '', '', 0, '', '', '', ''),
(36, 'sadasooij', 'joijoij', 'oijoijoi', '', 35, 'iojiojoij', 'oijojo', 'jojoi', 'joijoijo'),
(37, 'huih', 'hihi', 'iuhiuhiu', '', 31, 'hihih', 'ihihi', 'hihi', 'hihih'),
(38, 'hiu', 'iuhiuoho', 'hiuhiuoh', '', 33, 'ihoiuho', 'ihoiuho', 'iuhiohiu', 'hoi'),
(39, 'hihi', 'hihih', 'hihihi', '', 0, 'ihihih', 'ihihi', 'hihih', 'ihihi'),
(40, 'asdadj', 'jojo', 'oijoi', '', 0, 'jojoi', 'jjo', 'ijojoj', 'ojoj'),
(41, 'giugu', 'igiug', 'giugg', '', 0, 'yug', 'igiygi', 'giygiu', 'giugiug'),
(42, 'okpok', 'pkpokpo', 'pokpk', '', 0, 'kpokp', 'kpkpk', 'pkpkp', 'kpokpk'),
(43, 'okpok', 'pkpokpo', 'pokpk', '', 0, 'kpokp', 'kpkpk', 'pkpkp', 'kpokpk'),
(44, 'okpok', 'pkpokpo', 'pokpk', '', 0, 'kpokp', 'kpkpk', 'pkpkp', 'kpokpk'),
(45, 'okpok', 'pkpokpo', 'pokpk', '', 0, 'kpokp', 'kpkpk', 'pkpkp', 'kpokpk'),
(46, 'asdasjoi', 'joijih', 'joijoi', '', 0, 'ihiuhu', 'guyguig', 'uigugi', 'gugi'),
(47, '470', 'ojoij', 'kopkop', '', 0, 'oijoij', 'oijoj', 'oijoi', 'jojo'),
(48, 'asd', 'asd', 'asd', '', 0, 'asd', 'asd', 'asd', 'asd'),
(49, 'joij', 'ijioj', 'iojoijoij', '', 0, 'iojoijoi', 'jojoi', 'joijoijoj', 'oasd'),
(50, 'asdasda', 'sadasd', 'asdasd', '', 20, 'asdasd', 'asd', 'asdasd', 'dsasd'),
(51, 'chupita', 'dfs', 'asdasd', '', 46, 'sad', 'asd', 'ads', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE IF NOT EXISTS `objeto` (
  `id_objeto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(80) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `fecha` int(11) NOT NULL,
  `url` varchar(80) NOT NULL,
  `desc1` varchar(50) NOT NULL,
  `desc2` varchar(50) NOT NULL,
  `desc3` varchar(50) NOT NULL,
  `desc4` varchar(50) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `colaborador` varchar(50) NOT NULL,
  `lengua` varchar(50) NOT NULL,
  `resumen` varchar(50) NOT NULL,
  `isbn` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `objeto`
--

INSERT INTO `objeto` (`id_objeto`, `nombre`, `autor`, `editorial`, `fecha`, `url`, `desc1`, `desc2`, `desc3`, `desc4`, `tema`, `colaborador`, `lengua`, `resumen`, `isbn`) VALUES
(1, 'calculo', 'salvador', 'caracas', 1989, 'C:/xampp/htdocs/basic/imagenes/monografias/1/', 'hola', 'hola', 'hola', 'hola', 'calculo', 'no', 'espanol', 'jeiuiui', 'laksjflkafsda'),
(2, 'salva', 'salva', 'salva', 1989, '', 'Csalva', 'Csalva', 'Csalva', 'Csalva', 'salva', '', 'Csalva', 'salva', 'Csalva'),
(3, 'ignacio', 'ignacio', 'ignacio', 1989, '', 'ignacio', 'ignacio', 'ignacio', 'ignacio', 'ignacio', '', 'ignacio', 'ignacio', 'ignacio'),
(4, 'salvatierra', 'salvatierra', 'salvatierra', 1989, '', 'salvatierra', 'salvatierra', 'salvatierra', 'salvatierra', 'salvatierra', '', 'salvatierra', 'salvatierra', 'salvatierra'),
(5, 'moreno', 'moreno', 'moreno', 1989, '', 'moreno', 'moreno', 'moreno', 'moreno', 'moreno', '', 'moreno', 'moreno', 'moreno'),
(6, 'moreno', 'moreno', 'moreno', 1989, 'C:/xampp/htdocs/basic/imagenes/monografias/', 'moreno', 'moreno', 'moreno', 'moreno', 'moreno', '', 'moreno', 'moreno', 'moreno'),
(7, 'carolian', 'carolian', 'carolian', 1877, 'C:/xampp/htdocs/basic/imagenes/monografias/', 'carolian', 'carolian', 'carolian', 'carolian', 'carolian', '', 'carolian', 'carolian', 'carolian'),
(8, 'salva', 'salva', 'salva', 1989, 'C:/xampp/htdocs/basic/imagenes/monografias/', 'salva', 'salva', 'salva', 'salva', 'salva', '', 'salva', 'salva', 'salva'),
(9, 'salva', 'salva', 'salva', 7894, 'C:/xampp/htdocs/basic/imagenes/monografias/', 'salva', 'salva', 'salvatierra', 'salvatierra', 'salva', '', 'salva', 'salva', 'salva'),
(10, 'salva', 'salva', 'salva', 1788, 'C:/xampp/htdocs/basic/imagenes/monografias/', 'salva', 'salva', 'salva', 'salva', 'salva', '', 'salva', 'salva', 'salva'),
(11, 'salva', 'salva', 'salva', 1877, 'C:/xampp/htdocs/basic/imagenes/monografias/', 'salva', 'salva', 'salva', 'salva', 'salva', '', 'salva', 'salva', 'salva'),
(12, 'sad', 'sad', 'sad', 1877, '', 'sad', 'sad', 'sad', 'sad', 'sad', '', 'sad', 'sad', 'sad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista`
--

CREATE TABLE IF NOT EXISTS `revista` (
  `id_revista` int(11) NOT NULL,
  `titulo_revista` varchar(50) NOT NULL,
  `editorial_revista` varchar(50) NOT NULL,
  `publicacion_revista` varchar(50) NOT NULL,
  `serie_revista` varchar(50) NOT NULL,
  `fecha_revista` int(5) NOT NULL,
  `issn_revista` varchar(50) NOT NULL,
  `distribucion_revista` varchar(50) NOT NULL,
  `volumen_revista` varchar(50) NOT NULL,
  `periodicidad_revista` varchar(50) NOT NULL,
  `url_revista` varchar(50) NOT NULL,
  `desc1_revista` varchar(50) NOT NULL,
  `desc3_revista` varchar(50) NOT NULL,
  `desc4_revista` varchar(50) NOT NULL,
  `desc2_revista` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revista`
--

INSERT INTO `revista` (`id_revista`, `titulo_revista`, `editorial_revista`, `publicacion_revista`, `serie_revista`, `fecha_revista`, `issn_revista`, `distribucion_revista`, `volumen_revista`, `periodicidad_revista`, `url_revista`, `desc1_revista`, `desc3_revista`, `desc4_revista`, `desc2_revista`) VALUES
(1, 'qwe', 'qwe', 'ery', 'tuy', 1989, 'ghkh', 'ghjk', 'gkj', 'hjkl', 'C:/xampp/htdocs/basic/imagenes/revista/', 'kjh', 'hla', 'hlas', 'hjlk'),
(2, 'chu', 'chu', 'chuc', 'chu', 1989, 'ashu', 'chu', 'chu', 'chu', 'C:/xampp/htdocs/basic/imagenes/revista/', 'chu', 'chu', 'chu', 'chu'),
(4, 'qwe', 'yiu', 'ghj', 'gkhj', 1989, 'hkjhkjh', 'jkhkjhkjhk', 'kjhkjhkj', 'kjhkjhkj', 'C:/xampp/htdocs/basic/imagenes/revista/', 'lhjkhjk', 'kjhkjhkjh', 'kjhkjhkj', 'hkjhkjhkjh'),
(5, 'jhbkjlh', 'jkhkjlhlkj', 'hkjhljh', 'kljhkjhkj', 1989, 'hlkjhlkjh', 'jkhklhkjlh', 'kjlhkjhlkjh', 'kjlhklhlkhk', 'C:/xampp/htdocs/basic/imagenes/revista/', 'jhkhkjhkl', 'kjlhkljhklj', 'hlkhk', 'hlkhkljh'),
(6, 'knjn', 'kjnkjnkjn', 'kjnknk', 'nknkjnkj', 1989, 'kjnkjn', 'kjnkjnkjn', 'kjnkjnkjn', 'knkjnkjn', 'C:/xampp/htdocs/basic/imagenes/revista/', 'kjnknkjn', 'nkjnkn', 'knkn', 'kjnknk'),
(7, 'ihiuh', 'iuhiuhiu', 'hugh', 'bhjbi', 1989, 'jhgytry', 'trytfuyv', 'hbjhb', 'jhbgvtr', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ctryvjb', 'yububub', 'hbhbhj', 'hbubuy'),
(8, 'joij', 'iojihiu', 'hoihiouh', 'iuohiohiu', 1989, 'kjoij', 'oij', 'ioji', 'ojiou', 'C:/xampp/htdocs/basic/imagenes/revista/', 'hiu', 'iuoh', 'hiohoi', 'has'),
(9, 'joij', 'oijoij', 'oijoijp', 'oijpojoi', 1989, 'jkhh', 'uhouho', 'uhuihiuoh', 'iuohoiuh', 'C:/xampp/htdocs/basic/imagenes/revista/', 'oihiouhoiu', 'hohoiuh', 'iuohoi', 'hiouhoiu'),
(10, 'pokopij', 'ojoipjpo', 'jopjpoij', 'iopjpoijio', 1989, 'kjioj', 'iuojiuohiuoh', 'iuhiuhj', 'nlknmlk', 'C:/xampp/htdocs/basic/imagenes/revista/', 'nkjnkjn', 'biubuib', 'iubuio', 'ibniu'),
(11, 'hiuhiuo', 'uiob', 'iuuyb', 'uybyuiu', 1989, 'hbiusbobo', 'basda', 'bui', 'uisadas', 'C:/xampp/htdocs/basic/imagenes/revista/', 'iuboui', 'asdasd', 'asdds', 'sadasd'),
(12, 'nonoin', 'onoinoin', 'ionoin', 'poinopinpo', 1989, 'klmom', 'oipmoi', 'moimoip', 'niniou', 'C:/xampp/htdocs/basic/imagenes/revista/', 'niuoniou', 'ionionio', 'noin', 'noiun'),
(13, 'ooiuhiou', 'hiouhoih', 'iuohihiouh', 'iuohiouhi', 1989, 'jnini', 'unionion', 'uoniouniun', 'iuniooi', 'C:/xampp/htdocs/basic/imagenes/revista/', 'unooiunui', 'niinin', 'ionionoi', 'nininiuo'),
(14, 'iojio', 'joijoij', 'poijpoij', 'poijpoijo', 1989, 'ihoiu', 'ioniunoiu', 'noinio', 'iion', 'C:/xampp/htdocs/basic/imagenes/revista/', 'oubbiyb', 'iububiu', 'biubiub', 'iuybub'),
(15, 'cvytv', 'ytvyvy', 'uyvuyvu', 'vuvytvyuv', 1989, 'vyvyuvy', 'yuyu', 'uybuyb', 'uiuibuyb', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ubuybu', 'ytvytvyt', 'vytvyu', 'bvs'),
(16, 'hiuhi', 'uhiuhiuoh', 'ihoiuhiou', 'hiohoiuh', 1989, 'kjoijio', 'jiiuiu', 'hiuhiuh', 'iuohiu', 'C:/xampp/htdocs/basic/imagenes/revista/', 'hiuh', 'hiuoh', 'iuhiu', 'iuohiu'),
(17, 'hjioj', 'oijoijoi', 'joijoijoi', 'joijoijo', 1989, 'joijo', 'ijoijoij', 'oijoijo', 'joj', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ojoj', 'oijoij', 'ojoijo', 'ojoij'),
(18, 'ajoinjoi', 'joijoij', 'oijopj', 'poijpojpoij', 1989, 'iokmoi', 'kioioj', 'oijiojoi', 'joipjoip', 'C:/xampp/htdocs/basic/imagenes/revista/', 'joijopij', 'jiojoij', 'ojopj', 'oijoi'),
(19, '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(20, 'joijoi', 'joijoij', 'oijoij', 'oijoijoi', 1989, 'jojoiji', 'jojojoi', 'joijoij', 'oijoi', 'C:/xampp/htdocs/basic/imagenes/revista/', 'joij', 'joijoij', 'oijojo', 'oijoijoi'),
(21, '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(22, 'uhiuhiu', 'hiuhiuh', 'ihiuhiuh', 'ihihi', 1989, 'uihiuh', 'iuhiuhiu', 'hihiu', 'hiuhih', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ihihi', 'ihihih', 'ihi', 'hihih'),
(24, 'pokpo', 'kpokpo', 'kpokpok', 'pokpokpo', 1989, 'kpokpo', 'kpkpok', 'pokpok', 'pokpk', 'C:/xampp/htdocs/basic/imagenes/revista/', 'pokpkp', 'pkpk', 'pkpk', 'kpkpk'),
(25, 'iojioj', 'oijoijoij', 'oijoijoi', 'joijoj', 1989, 'ojoijoi', 'joijoi', 'joijoj', 'ojoij', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ojoj', 'joijojoj', 'ojo', 'ojojo'),
(26, 'jioijoi', 'joijoij', 'oijoijoij', 'iojojo', 1989, 'joijio', 'iuhuygyug', 'yugyu', 'guygytf', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ytfytf', 'ftyfy', 'fytf', 'tyasd'),
(27, 'jioj', 'iuogh', 'guygu', 'guig', 1777, 'uiug', 'uyi', 'hiyug', 'uyguyg', 'C:/xampp/htdocs/basic/imagenes/revista/', 'iugiu', 'iuguig', 'giugu', 'giugiug'),
(28, 'oijj', 'jioijo', 'jioijo', 'iojjioijo', 1989, 'ioijo', 'jiijo', 'ijooij', 'oijijo', 'C:/xampp/htdocs/basic/imagenes/revista/', 'oijioj', 'iojoij', 'iojioj', 'oijjio'),
(29, 'ijoij', 'iojoijoi', 'joijojo', 'ijoijoijo', 1989, 'ijioj', 'oijoij', 'oijoijo', 'jojoij', 'C:/xampp/htdocs/basic/imagenes/revista/', 'oijoj', 'joijo', 'jojo', 'oijoijoi'),
(30, 'joijoi', 'joijoi', 'joijoij', 'oijojoijoi', 1989, 'joijoi', 'joijoij', 'oijoij', 'oijoijoi', 'C:/xampp/htdocs/basic/imagenes/revista/', 'jojo', 'joijo', 'jojojo', 'joijo'),
(31, '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(32, 'jpjp', 'jiojioj', 'pojpoijopi', 'jopijopjo', 1989, 'uuih', 'iuhiuhiu', 'hiuhih', 'iuhiuhiu', 'C:/xampp/htdocs/basic/imagenes/revista/', 'hihi', 'iuhihi', 'hihi', 'hihih'),
(33, '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(34, 'ijoij', 'iopjoijopi', 'jopijoi', 'jopj', 1989, 'komom', 'oimiom', 'oomo', 'moimom', 'C:/xampp/htdocs/basic/imagenes/revista/', 'omomo', 'moimoim', 'omoi', 'momoi'),
(35, 'iojioj', 'iojoijo', 'jojoi', 'joijojo', 1989, 'kjioj', 'oijoijoij', 'oiiuhuih', 'iuhiuhih', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ihihi', 'ihihihi', 'hih', 'hihih'),
(36, 'jhiuh', 'uihiuh', 'iuhiuhi', 'hihihi', 1989, 'jijoi', 'jioji', 'ojoij', 'oijo', 'C:/xampp/htdocs/basic/imagenes/revista/', 'joijo', 'ojoj', 'ojo', 'ijoj'),
(37, 'gugyu', 'uygiugi', 'gigigu', 'gigiugiu', 1989, 'iuhiuh', 'iuhihih', 'ihihiuh', 'ihihi', 'C:/xampp/htdocs/basic/imagenes/revista/', 'hihi', 'hihihi', 'hiuhi', 'hihi'),
(38, 'iojoi', 'joijoij', 'oijoi', 'jojojoj', 1989, 'iojoij', 'oijoijo', 'jojoj', 'ojojo', 'C:/xampp/htdocs/basic/imagenes/revista/', 'jojoj', 'ojojoj', 'ojo', 'ojoijoj'),
(39, 'ijij', 'ijpji', 'joipjpj', 'pjpojpo', 1989, 'jiojio', 'joijoij', 'ojoj', 'ojoj', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ojoij', 'oijojo', 'jojo', 'ojoijj'),
(40, 'kpokp', 'okpokp', 'kpokp', 'kpokp', 1989, 'ijioj', 'oijoj', 'oijoij', 'ojojoj', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ojojoj', 'ojojoj', 'ojoj', 'ojoj'),
(41, 'joij', 'oijoijoij', 'oijoij', 'oijojo', 1989, 'jjas', 'joijo', 'ijoj', 'ojoij', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ojoj', 'ojojo', 'sadd', 'ojojj'),
(42, 'pkpokpo', 'kpokpk', 'pkpkp', 'okpkpk', 1989, 'jiojio', 'joijoi', 'jojo', 'joijoj', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ojojo', 'jojoj', 'oijo', 'joijo'),
(43, 'qsdsad', 'sadsad', 'dsadsad', 'saddas', 159, 'sadasd', 'ijojioijo', 'ijoijoijo', 'ijooiji', 'C:/xampp/htdocs/basic/imagenes/revista/', 'oijooji', 'ojijiij', 'jiojo', 'oijjiooijoi'),
(44, 'zasd', 'asdasd', 'asdasd', 'asdd', 157, 'iojoi', 'joijoij', 'oijoij', 'oijo', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ijoijoi', 'jojoij', 'ojo', 'jojo'),
(45, 'kopokpo', 'kpokpok', 'pokpok', 'pokpokp', 1989, 'oijoij', 'oijoj', 'oijoij', 'oijoj', 'C:/xampp/htdocs/basic/imagenes/revista/', 'ojo', 'jojo', 'joij', 'jojoi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE IF NOT EXISTS `tesis` (
  `id_tesis` int(11) NOT NULL,
  `titulo_tesis` varchar(50) NOT NULL,
  `tutor_tesis` varchar(50) NOT NULL,
  `cotutor_tesis` varchar(50) NOT NULL,
  `redactor_tesis` varchar(50) NOT NULL,
  `fecha_tesis` int(5) NOT NULL,
  `resumen_tesis` varchar(500) NOT NULL,
  `url` varchar(50) NOT NULL,
  `desc1_tesis` varchar(50) NOT NULL,
  `desc2_tesis` varchar(50) NOT NULL,
  `desc3_tesis` varchar(50) NOT NULL,
  `desc4_tesis` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id_tesis`, `titulo_tesis`, `tutor_tesis`, `cotutor_tesis`, `redactor_tesis`, `fecha_tesis`, `resumen_tesis`, `url`, `desc1_tesis`, `desc2_tesis`, `desc3_tesis`, `desc4_tesis`) VALUES
(3, 'servidor de paginasss', 'Domingo Hernandez', 'javier', 'salvador salvatierra', 1989, 'salvador', 'C:/xampp/htdocs/basic/imagenes/tesis/', 'hola', 'como', 'esta', 'tud'),
(4, 'arana robotic', 'chuchin', 'locota', 'tulio', 1989, 'dsfdsf', 'C:/xampp/htdocs/basic/imagenes/tesis/', 'asldkjaskl', 'alhfdajkd', 'askhaskfj', 'asdasd'),
(5, 'arana robotic', 'chuchin', 'locota', 'tulio', 1989, 'dsfdsf', 'C:/xampp/htdocs/basic/imagenes/tesis/', 'asldkjaskl', 'alhfdajkd', 'askhaskfj', 'asdasd'),
(6, 'hola', 'hola', 'hola', 'hola', 1989, 'hola', 'C:/xampp/htdocs/basic/imagenes/tesis/', 'hola', 'holah', 'oal', 'djqq'),
(7, 'hola', 'holak', 'hasdasd', 'hol', 17979, 'jkh', 'C:/xampp/htdocs/basic/imagenes/tesis/', 'kjh', 'lhlkj', 'hljh', 'lasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `authKey` varchar(250) NOT NULL,
  `accessToken` varchar(250) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  `rol` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `clave`, `authKey`, `accessToken`, `activate`, `rol`) VALUES
(1, 'ignachiou', 'salvador.ignacio.salvatierra@gmail.com', 'fsQNeuZsb/3Ts', '7c82cd0ade4c85c7e166d6ba71ac79bf1bcb2c63ba8f9aa10ba2a015b9e3098ca0fb62b17cb89561fac55157e6ff6f3f0b018de615b77707d0cef76ef9f1bbc85bfc8fe0939c3e838cac646be2c9ed3772ce76d0f767cbe42e61b63fb277f59c8f763497', '32094e2c96fceff8671bd3c76203d7435290a74af37c0d98f286a8d83b6751d658fde65e27d3f20d64d652ced9b1c03e3430fb384110cd69bb1cd29b6ee0068df769f6f831327d9ae828484ec9f622b19f68d79e173b04b1fb1a94d71ae223bb1d4e9e1a', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id_objeto`), ADD UNIQUE KEY `id_objeto` (`id_objeto`);

--
-- Indices de la tabla `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`id_revista`);

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`id_tesis`), ADD UNIQUE KEY `id_tesis` (`id_tesis`), ADD KEY `titulo_tesis` (`titulo_tesis`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `usuario` (`usuario`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `revista`
--
ALTER TABLE `revista`
  MODIFY `id_revista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id_tesis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
