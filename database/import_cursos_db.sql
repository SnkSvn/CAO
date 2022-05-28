/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - cursosdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cursos_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cursos_db`;

/*Table structure for table `clasificaciones` */

DROP TABLE IF EXISTS `clasificaciones`;

CREATE TABLE `clasificaciones` (
  `idclasificacion` INT(11) NOT NULL AUTO_INCREMENT,
  `clasificacion` VARCHAR(40) DEFAULT NULL,
  PRIMARY KEY (`idclasificacion`)
) ENGINE=INNODB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clasificaciones` */

INSERT  INTO `clasificaciones`(`idclasificacion`,`clasificacion`) VALUES 
(1,'Desarrollo Movil'),
(2,'Desarrollo Web'),
(3,'Lenguajes de Programacion'),
(4,'Desarrollo de videojuegos'),
(5,'Informatica'),
(6,'Testeo de software'),
(7,'Base de datos');

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `idcurso` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `precio` DECIMAL(6,2) DEFAULT NULL,
  `descuentoprecio` INT(11) DEFAULT NULL,
  `calificacion` INT(11) DEFAULT NULL,
  `duracioncurso` INT(11) DEFAULT NULL,
  `imagencurso` VARCHAR(150) DEFAULT NULL,
  `idregistrador` INT(11) NOT NULL,
  `idclasificacion` INT(11) DEFAULT NULL,
  `idresponsable` INT(11) NOT NULL,
  `fecharegistro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `estado` CHAR(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcurso`),
  KEY `fk_idregistrador_cur` (`idregistrador`),
  KEY `fk_idresponsable_cur` (`idresponsable`),
  KEY `fk_idclasificacion_cur` (`idclasificacion`),
  CONSTRAINT `fk_idclasificacion_cur` FOREIGN KEY (`idclasificacion`) REFERENCES `clasificaciones` (`idclasificacion`),
  CONSTRAINT `fk_idregistrador_cur` FOREIGN KEY (`idregistrador`) REFERENCES `usuarios` (`idusuario`),
  CONSTRAINT `fk_idresponsable_cur` FOREIGN KEY (`idresponsable`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=INNODB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cursos` */

INSERT  INTO `cursos`(`idcurso`,`titulo`,`descripcion`,`precio`,`descuentoprecio`,`calificacion`,`duracioncurso`,`imagencurso`,`idregistrador`,`idclasificacion`,`idresponsable`,`fecharegistro`,`estado`) VALUES 
(1,'Curso de Python','Aprende los conceptos basicos de Python.',NULL,NULL,NULL,NULL,'2022/05/adbfcadca96cf45fa587daddd6adc469.jpg',3,1,3,'2022-05-12 05:01:46','A'),
(2,'Curso de Java Basico','Aprende Java desde Cero',NULL,NULL,NULL,NULL,'2022/05/53a1dea2014ebbf785163fecd86e7fa2.jpg',3,3,3,'2022-05-13 10:17:49','A'),
(3,'Curso de C++','Aprende c++ desde cero.',NULL,NULL,NULL,NULL,'2022/05/3e86d6393d873c18713df7ae895c10d8.jpg',3,3,3,'2022-05-13 10:20:39','A'),
(4,'Introduccion a Java','Conocimientos necesarios para comenzar a programar en Java',NULL,NULL,NULL,NULL,'2022/05/7f6b159f41d7b2aaaf131f694042c022.jpg',3,1,3,'2022-05-15 05:01:01','F'),
(5,'Introduccion a Java','Conocimientos necesarios para comenzar a programar en Java.',NULL,NULL,NULL,NULL,'2022/05/054f12c0f8ef2fd530138507d057149a.jpg',3,1,3,'2022-05-15 05:01:15','F'),
(6,'Aprende a programar en C','Declarar variables, trabajar con caracteres y utilizar operadores.',NULL,NULL,NULL,NULL,'2022/05/1942eee4977d238c50c57ead70262027.jpg',3,3,3,'2022-05-15 05:04:25','X'),
(7,'Curso de Android Studio','Programa aplicaciones moviles.',NULL,NULL,NULL,NULL,'2022/05/75b30ec10a2fc2495397a1bde99456e5.jpg',3,1,3,'2022-05-15 05:36:09','X'),
(8,'Fundamentos de la I.A','Aprende sobre la Inteligencia Artificial.',NULL,NULL,NULL,NULL,'2022/05/ef92af3fb7bc176992a75f8623e98220.jpg',3,5,3,'2022-05-15 05:39:02','A'),
(9,'Desarrollo de videojuegos en Unity','Aprende a usar Unity para crear videojuegos.',NULL,NULL,NULL,NULL,'2022/05/11e981c0d5bdd782980a506ebd075760.jpg',3,4,3,'2022-05-15 05:40:09','A'),
(10,'Machine Learning con Python','Aprende Machine Learning con Python',NULL,NULL,NULL,NULL,'2022/05/1be0692eacc71e3de31dfffee3a29dfd.jpg',3,5,3,'2022-05-15 05:48:34','A'),
(11,'Introduccion a C++','Aprende c++',NULL,NULL,NULL,NULL,'2022/05/d5ef24fcc0bc7afede0b5160666303f5.jpg',3,1,3,'2022-05-16 22:14:30','X'),
(12,'Python','Aprende Python',NULL,NULL,NULL,NULL,'2022/05/c706712d8d0c1601b6e9850fe94f15e6.jpg',3,1,3,'2022-05-19 10:31:46','X'),
(13,'Python Básico','Manejo de condicionales',NULL,NULL,NULL,NULL,NULL,1,1,3,'2022-05-23 03:56:19','F');

/*Table structure for table `opiniones` */

DROP TABLE IF EXISTS `opiniones`;

CREATE TABLE `opiniones` (
  `idcurso` INT(11) NOT NULL,
  `idusuario` INT(11) NOT NULL,
  `estrellas` INT(11) NOT NULL DEFAULT 0,
  `comentario` VARCHAR(250) DEFAULT '',
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idcurso`,`idusuario`),
  KEY `fk_idusuario_opn` (`idusuario`),
  CONSTRAINT `fk_idcurso_opn` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `fk_idusuario_opn` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `opiniones` */

INSERT  INTO `opiniones`(`idcurso`,`idusuario`,`estrellas`,`comentario`,`fecha`) VALUES 
(1,2,4,'Lorem ipsum dolor sit amet consectetur adipisicing elit magnam suscipit ratione eaque sunt veniam sed aliquam perferendis.','2022-05-24 21:12:55'),
(1,3,5,'','2022-05-25 20:39:20'),
(1,8,3,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quo voluptatibus autem. Minus, eius doloribus? Omnis voluptas fugit dolorum minima cum odit unde aut commodi qui a sequi, repellendus atque.','2022-05-24 21:21:06'),
(1,9,4,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, esse aliquam cupiditate doloribus dolor quod excepturi dolores suscipit porro autem reprehenderit dicta pariatur quidem eius, ea saepe eos nulla labore.','2022-05-24 21:21:22'),
(1,16,5,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto vero numquam delectus animi vitae dolores cumque ducimus eveniet esse, sint nisi quisquam voluptatum quis eaque. Sint modi explicabo in suscipit.','2022-05-24 21:19:01'),
(1,17,5,'','2022-05-26 11:27:43'),
(2,3,4,'Mi opinión acerca del curso de Java.','2022-05-25 11:14:23'),
(2,12,5,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis obcaecati sit.','2022-05-26 09:53:20'),
(3,3,4,'Mi opinión del curso.','2022-05-24 22:21:24'),
(3,12,5,'Lorem ipsum dolor sit amet consectetur adipisicing elit.','2022-05-26 09:54:11'),
(8,3,4,'Mi opinión sobre el curso de Fundamentos de IA','2022-05-25 19:12:50'),
(9,3,4,'','2022-05-26 11:30:01');


/*Table structure for table `temas` */

DROP TABLE IF EXISTS `temas`;

CREATE TABLE `temas` (
  `idtemas` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) DEFAULT NULL,
  `descripcion` VARCHAR(200) DEFAULT NULL,
  `duracion` INT(11) NOT NULL,
  `idcurso` INT(11) NOT NULL,
  `link` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idtemas`),
  KEY `fk_idcurso_tem` (`idcurso`),
  CONSTRAINT `fk_idcurso_tem` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`)
) ENGINE=INNODB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `temas` */

INSERT  INTO `temas`(`idtemas`,`titulo`,`descripcion`,`duracion`,`idcurso`,`link`) VALUES 
(1,'Introduccion','En esta fase te explicaremos lo que aprenderas.',6,1,'https://www.youtube.com/embed/9ojhJsXNWCI'),
(2,'Sintaxis Basica','En este vídeo comenzamos a ver la sintaxis básica del lenguaje e instalamos Sublime Text 3. ',15,1,'https://www.youtube.com/embed/yppT6GPZMyo'),
(3,'Tipos, operadores y variables','En este vídeo vemos los tipos de datos, operadores y variables en Python.',21,1,'https://www.youtube.com/embed/u4I9PqhqCo8'),
(4,'Sintaxis con Funciones','En este vídeo comenzamos a ver el tema de las funciones, una estructura fundamental en casi todos los lenguajes de programación.',18,1,'https://www.youtube.com/embed/VY448UWAQ_0'),
(5,'Presentación del curso','Presentamos en este vídeo las características y el contenido del nuevo curso de Java que comienza en el canal.',17,2,'https://www.youtube.com/embed/coK4jM5wvko'),
(6,'Instalación JRE y Eclipse','Antes de comenzar a programar tenemos que instalar el software a utilizar en el curso y es lo que hacemos en este vídeo. Instalación de Eclipse y JRE.',22,2,'https://www.youtube.com/embed/F0ILFYl8YgI'),
(7,'Primer programa - Hola Mundo','En este vídeo vamos a crear nuestro primer programa en C++, el famoso \"Hola mundo\", y además veremos como dar saltos de linea en la consola \"\\n\".',6,3,'https://www.youtube.com/embed/g26aTQy1AQk'),
(8,'Tipos de datos','En este vídeo vamos a aprender los tipos de datos básicos en C++ y aprenderemos el significado de variable y operador.',9,3,'https://www.youtube.com/embed/MsQgZxy0gNU'),
(9,'Presentación','Presentación del curso de desarrollo de aplicaciones de Inteligencia Artificial .',33,8,'https://www.youtube.com/embed/ivpWblHUwUM'),
(10,'¿Qué es la I.A.?','Bases de la I.A. Áreas de las que se compone (Conocimiento, Razonamiento, Planificación, Toma de Decisiones, Aprendizaje) ',64,8,'https://www.youtube.com/embed/If-Ly5C8HmU'),
(11,'Presentación y descarga de Unity 3D','En este capitulo te explico las características generales del motor de desarrollo de videojuegos Unity 3D.',11,9,'https://www.youtube.com/embed/Tpvg8tnHaO4'),
(12,'Navegación creación y transformación de GameObject','En este capitulo te explico como navegar dentro de Unity y crear o  transformar Gameobject.',9,9,'https://www.youtube.com/embed/iWSZlh8sX4A'),
(13,'Introducción al curso','En este curso nos basaremos en aprender Machine Learning pero enfocándonos principalmente en Python.',4,10,'https://www.youtube.com/embed/4c7oFu36d6k'),
(14,'Lenguajes de Programación para Machine Learning','La industria tiene innumerables lenguajes de programación con el objetivo de resolver las complejidades del negocio y traer innovaciones tecnológicas, incluyendo Machine Learning.',7,10,'https://www.youtube.com/embed/pi7OkcTdvmQ'),
(15,'Layout y Transformaciones de cámara','En este capitulo te explico como hacer transformaciones de cámara y modificar o crear y personalizar los diferentes modos de visualizacion',6,9,'https://www.youtube.com/embed/FxXfUokIdjQ');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `clave` VARCHAR(250) NOT NULL,
  `imagenperfil` VARCHAR(100) DEFAULT NULL,
  `tipousuario` CHAR(1) NOT NULL DEFAULT '1',
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  `fecharegistro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `uk_correo_usu` (`correo`)
) ENGINE=INNODB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

INSERT  INTO `usuarios`(`idusuario`,`nombres`,`apellidos`,`correo`,`clave`,`imagenperfil`,`tipousuario`,`estado`,`fecharegistro`) VALUES 
(1,'Axel','Farfan','axelfarfan@gmail.com','$2y$10$jkx5umxVOLh9sOBdJNU6GeviD0imi5XAwpg9Jw/Yql7j1nHr3OkY2',NULL,'1','1','2022-05-12 02:00:45'),
(2,'Marco Antonio','Muñoz Lopez','ignieve16@gmail.com','$2y$10$1x/2gIQOYsXJvSECgGCob.lyqjDoGhgVaQCXpccSE9zGnPLNWajHC',NULL,'1','1','2022-05-12 02:00:45'),
(3,'Axel','Farfan','axel@gmail.com','$2y$10$qwP9aL1Ui7zuesym7P0WReQ2OIKJY1cFbKOM7LdXUFJCyy5qvPO2u',NULL,'1','1','2022-05-12 02:01:08'),
(8,'Kiara','Robles','kiara@gmail.com','$2y$10$fc9bjW3YF1oSL10Sx.ncsOQqt97ldYzBJnpunLAWUS2CU0RibcDKG',NULL,'1','1','2022-05-13 01:43:15'),
(9,'Julian','Valdelomar','julian@gmail.com','$2y$10$afm8AZO21i5frnlCFnJ9BOG1spSDkmEJcwgFEdwLm7ptHJvyYShce',NULL,'1','1','2022-05-13 01:43:47'),
(10,'Victor','Calderon','vcalderon@gmail.com','$2y$10$MZ1HM/nkm2UT5S1s08BKyeoVItCeIuWWJpUl0wjxhabWnoRhrT31u',NULL,'1','1','2022-05-13 10:33:09'),
(11,'Julieta','Martinez','julieta@gmail.com','$2y$10$7tJPVahmS9ZyZG4MbK/mTey.YNRNuwfDP.Wcmn3cK29yojt4tF/bG',NULL,'1','1','2022-05-18 16:56:52'),
(12,'Diego','Diaz','diego@gmail.com','$2y$10$S3U3dCGNC18hoZF5n.A2DulMDhoF4SVD/.MhCZNjDl2JB7.wqL0CS',NULL,'1','1','2022-05-19 09:02:29'),
(13,'Javier','Diaz','javier@gmail.com','$2y$10$jvK4FEzzc6z3g1w9euu2A.oP3z9P8.UAqWDu0thtF/H5AfElLccau',NULL,'1','1','2022-05-19 09:05:13'),
(14,'Kelly','Diaz','kelly@gmail.com','$2y$10$np8l3JaT6J5HokWsm0LDTujUgtp61xFECic4irO5tHPEu1K9bHybK',NULL,'1','1','2022-05-19 09:07:02'),
(15,'Usuario','Apelli','usuario@gmail.com','$2y$10$aqwe473pah0fKTllhqTFluLST1cjoniSvzwJhDUqN3tjmc9knwdim',NULL,'1','1','2022-05-19 11:26:17'),
(16,'Axel','Farfan','axelfarfan.g@gmail.com','$2y$10$EfjhqRYcIU6kIKB.hskh6OmBnAAUM9DvuyGmtcezoDPj05LVuyIi6',NULL,'1','1','2022-05-21 19:08:02'),
(17,'Andres','Garcia','andres01@gmail.com','$2y$10$NcsNVAZoZXdNksHnAVWsUeQy94VRqFvUoebTAyp2CrOD5tovx/j3K',NULL,'1','1','2022-05-26 11:26:36');


/* Procedure structure for procedure `spu_clasificaciones_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_clasificaciones_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_clasificaciones_listar`()
BEGIN
	SELECT * FROM clasificaciones;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_actualizar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_actualizar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_actualizar`(
	IN _idcurso		INT,
	IN _titulo		VARCHAR (200),
	IN _descripcion		TEXT, 		
	IN _imagencurso		VARCHAR(150), 		
	IN _idresponsable	INT,
	IN _idclasificacion	INT,
	IN _estado		CHAR(1)
)
BEGIN
	-- Actualizar titulo
	IF _titulo != '' AND _titulo IS NOT NULL THEN
		UPDATE cursos SET titulo = _titulo WHERE idcurso = _idcurso;
	END IF;
	-- Actualizar descipcion
	IF _descripcion != '' AND _descripcion IS NOT NULL THEN
		UPDATE cursos SET descripcion = _descripcion WHERE idcurso = _idcurso;
	END IF;
	-- Actualizar imagencurso
	IF _imagencurso != '' AND _imagencurso IS NOT NULL THEN
		UPDATE cursos SET imagencurso = _imagencurso WHERE idcurso = _idcurso;
	END IF;
	-- Actualizar idresponsable
	IF _idresponsable != '' AND _idresponsable IS NOT NULL THEN
		UPDATE cursos SET idresponsable = _idresponsable WHERE idcurso = _idcurso;
	END IF;
	-- Actualizar idclasificacion
	IF _idclasificacion != '' AND _idclasificacion IS NOT NULL THEN
		UPDATE cursos SET idclasificacion = _idclasificacion WHERE idcurso = _idcurso;
	END IF;
	-- Actualizar estado
	IF _estado != '' AND _estado IS NOT NULL THEN
		UPDATE cursos SET estado = _estado WHERE idcurso = _idcurso;
	END IF;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_cambiarestado` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_cambiarestado` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_cambiarestado`(
	IN _idcurso	INT,
	IN _estado	CHAR(1)
)
BEGIN
	UPDATE cursos SET estado = _estado WHERE idcurso = _idcurso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_datos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_datos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_datos`(IN _idcurso INT)
BEGIN

	SELECT CRS.idcurso, CRS.titulo, CRS.descripcion,
		CONCAT(USR1.apellidos, ' ', USR1.nombres) AS 'responsable',
		CRS.fecharegistro, CRS.imagencurso, CRS.estado, CLS.idclasificacion, CLS.clasificacion
	FROM cursos CRS
	INNER JOIN usuarios USR1 ON USR1.idusuario = CRS.idresponsable
	INNER JOIN usuarios USR2 ON USR2.idusuario = CRS.idregistrador
	INNER JOIN clasificaciones CLS ON CRS.idclasificacion = CLS.idclasificacion
	WHERE CRS.idcurso = _idcurso
	ORDER BY CRS.fecharegistro;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_duracion` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_duracion` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_duracion`(IN _idcurso int)
BEGIN
	SELECT SUM(temas.duracion) FROM cursos
	INNER JOIN temas ON cursos.idcurso = temas.idcurso
	WHERE cursos.idcurso = _idcurso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_listar`(IN _estado CHAR(1), IN _idresponsable INT)
BEGIN

	SELECT CRS.idcurso, CRS.titulo, CRS.descripcion,
		CONCAT(USR1.apellidos, ' ', USR1.nombres) AS 'responsable',
		CRS.fecharegistro, CRS.imagencurso, CRS.estado, CLS.idclasificacion, CLS.clasificacion
	FROM cursos CRS
	INNER JOIN usuarios USR1 ON USR1.idusuario = CRS.idresponsable
	INNER JOIN usuarios USR2 ON USR2.idusuario = CRS.idregistrador
	INNER JOIN clasificaciones CLS ON CRS.idclasificacion = CLS.idclasificacion
	WHERE CRS.estado = _estado AND CRS.idresponsable = _idresponsable
	ORDER BY CRS.fecharegistro;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_listarTodo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_listarTodo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_listarTodo`()
BEGIN

	SELECT CRS.idcurso, CRS.titulo, CRS.descripcion,
		CONCAT(USR1.apellidos, ' ', USR1.nombres) AS 'responsable',
		CRS.fecharegistro, CRS.imagencurso, CRS.estado, CLS.idclasificacion, CLS.clasificacion
	FROM cursos CRS
	INNER JOIN usuarios USR1 ON USR1.idusuario = CRS.idresponsable
	INNER JOIN usuarios USR2 ON USR2.idusuario = CRS.idregistrador
	INNER JOIN clasificaciones CLS ON CRS.idclasificacion = CLS.idclasificacion
	WHERE CRS.estado = 'A'
	ORDER BY CRS.fecharegistro;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_cursos_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_cursos_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cursos_registrar`(
	IN _titulo		VARCHAR (200),
	IN _descripcion		TEXT,
	IN _imagencurso		VARCHAR(150), 	
	IN _idregistrador	INT, 		
	IN _idresponsable	INT,
	IN _idclasificacion	INT
	
)
BEGIN 
	IF _imagencurso = '' THEN
		SET _imagencurso = NULL;
	END IF;
	
	INSERT INTO cursos (titulo, descripcion, imagencurso, idregistrador, idresponsable, idclasificacion)
		VALUES (_titulo, _descripcion, _imagencurso, _idregistrador, _idresponsable, _idclasificacion);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_curso_vista` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_curso_vista` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_curso_vista`(
	IN _idcurso 	INT
)
BEGIN
	SELECT CRS.idcurso, CRS.titulo, CRS.descripcion,
			CONCAT(USR1.apellidos, ' ', USR1.nombres) AS 'responsable',
			CRS.fecharegistro, CRS.imagencurso, CRS.estado, CRS.idclasificacion, CLS.clasificacion, ROUND(AVG(estrellas),1) AS 'Opinion'
		FROM cursos CRS
		INNER JOIN usuarios USR1 ON USR1.idusuario = CRS.idresponsable
		INNER JOIN usuarios USR2 ON USR2.idusuario = CRS.idregistrador
		INNER JOIN clasificaciones CLS ON CRS.idclasificacion = CLS.idclasificacion
		INNER JOIN opiniones OPN ON CRS.idcurso = OPN.idcurso
		WHERE CRS.estado = 'A' AND CRS.idcurso = _idcurso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_cartas_limit` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_cartas_limit` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_cartas_limit`(
	IN _desde	INT,
	IN _cantidad 	INT
	
)
BEGIN
	IF _desde IS NULL THEN
		SELECT CRS.idcurso, CRS.titulo, CRS.descripcion,
			CONCAT(USR1.apellidos, ' ', USR1.nombres) AS 'responsable',
			CRS.fecharegistro, CRS.imagencurso, CRS.estado, CRS.idclasificacion, CLS.clasificacion
		FROM cursos CRS
		INNER JOIN usuarios USR1 ON USR1.idusuario = CRS.idresponsable
		INNER JOIN usuarios USR2 ON USR2.idusuario = CRS.idregistrador
		INNER JOIN clasificaciones CLS ON CRS.idclasificacion = CLS.idclasificacion
		WHERE CRS.estado = 'A'
		ORDER BY idcurso
		LIMIT _cantidad;
	ELSE
		SELECT CRS.idcurso, CRS.titulo, CRS.descripcion,
			CONCAT(USR1.apellidos, ' ', USR1.nombres) AS 'responsable',
			CRS.fecharegistro, CRS.imagencurso, CRS.estado, CRS.idclasificacion, CLS.clasificacion
		FROM cursos CRS
		INNER JOIN usuarios USR1 ON USR1.idusuario = CRS.idresponsable
		INNER JOIN usuarios USR2 ON USR2.idusuario = CRS.idregistrador
		INNER JOIN clasificaciones CLS ON CRS.idclasificacion = CLS.idclasificacion
		WHERE CRS.estado = 'A' AND CRS.idcurso >= _desde
		ORDER BY idcurso
		LIMIT _cantidad;
	END IF;

END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_PDF` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_PDF` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_PDF`(
	IN _idusuario	INT,
	IN _estado	CHAR(1)
)
BEGIN
	SELECT CRS.idcurso, CRS.titulo, CRS.fecharegistro ,SUM(distinct TMS.duracion) AS 'duracion', COUNT(DISTINCT OPN.idusuario) AS 'opiniones', ROUND(AVG(OPN.estrellas),1) AS 'estrellas', MAX(OPN.estrellas) as 'max', MIN(OPN.estrellas) AS 'min'
		FROM cursos CRS
		INNER JOIN temas TMS ON CRS.idcurso = TMS.idcurso 
		INNER JOIN opiniones OPN ON CRS.idcurso = OPN.idcurso
		INNER JOIN usuarios USR ON USR.idusuario = CRS.idresponsable
		WHERE USR.idusuario = _idusuario AND CRS.estado = _estado
		GROUP BY CRS.idcurso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_opinion_actualizar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_opinion_actualizar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_opinion_actualizar`(
	IN _idcurso	INT,
	IN _idusuario	INT,
	IN _estrellas	INT,
	IN _comentario	VARCHAR(250)
)
BEGIN
	IF _comentario IS NOT NULL AND _estrellas > -1 AND _estrellas < 6 AND _estrellas IS NOT NULL THEN
				
		UPDATE opiniones SET estrellas = _estrellas, comentario = _comentario, fecha = NOW() WHERE idcurso = _idcurso AND idusuario = _idusuario;	
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_opinion_buscar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_opinion_buscar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_opinion_buscar`(
	IN _idcurso	INT,
	IN _idusuario	INT
)
BEGIN
	SELECT * FROM opiniones where idcurso = _idcurso and idusuario = _idusuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_opinion_guardar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_opinion_guardar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_opinion_guardar`(
	IN _idcurso	INT,
	IN _idusuario	INT,
	IN _estrellas	INT,
	IN _comentario	VARCHAR(250)
)
BEGIN
	IF _comentario IS NOT NULL AND _estrellas > -1 AND _estrellas < 6 and _estrellas IS NOT NULL THEN
	
		INSERT INTO opiniones(idcurso, idusuario, estrellas, comentario) VALUES
			(_idcurso, _idusuario, _estrellas, _comentario);
			
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_opinion_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_opinion_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_opinion_listar`(
	_idcurso	INT
)
BEGIN
	SELECT opiniones.idcurso, opiniones.idusuario, opiniones.estrellas, opiniones.comentario, opiniones.fecha,
	usuarios.nombres, usuarios.apellidos
	FROM opiniones
	INNER JOIN usuarios ON opiniones.idusuario = usuarios.idusuario
	WHERE idcurso = _idcurso
	ORDER BY opiniones.fecha DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_temas_crear` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_temas_crear` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_temas_crear`(
	IN _titulo 	VARCHAR(50),
	IN _descripcion VARCHAR(200),
	IN _duracion	INT,
	IN _idcurso	INT,
	IN _link	VARCHAR(200)
)
BEGIN
	INSERT INTO temas (titulo, descripcion, duracion, idcurso, link) VALUES
		(_titulo, _descripcion, _duracion, _idcurso, _link);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_temas_editar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_temas_editar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_temas_editar`(
	IN _idtemas	INT,
	IN _titulo	VARCHAR(50),
	IN _descripcion	VARCHAR(200),
	IN _duracion	INT,
	IN _link	VARCHAR(200)
)
BEGIN
	-- Titulo
	IF _titulo != '' AND _titulo IS NOT NULL THEN
		UPDATE temas SET titulo = _titulo
		WHERE idtemas = _idtemas;
	END IF;
	-- Descripcion
	IF _descripcion != '' AND _descripcion IS NOT NULL THEN
		UPDATE temas SET descripcion = _descripcion
		WHERE idtemas = _idtemas;
	END IF;
	-- Duracion
	IF _duracion != '' AND _duracion > 0 AND _duracion IS NOT NULL THEN
		UPDATE temas SET duracion = _duracion
		WHERE idtemas = _idtemas;
	END IF;
	-- Link
	IF _link != '' AND _link IS NOT NULL THEN
		UPDATE temas SET link = _link
		WHERE idtemas = _idtemas;
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_temas_listar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_temas_listar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_temas_listar`(
	IN _idcurso	INT
)
BEGIN
	SELECT temas.idtemas, temas.titulo, temas.descripcion, temas.duracion, temas.idcurso, temas.link FROM temas 
	INNER JOIN cursos ON temas.idcurso = cursos.idcurso
	WHERE temas.idcurso = _idcurso;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_actualizarclave` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_actualizarclave` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_actualizarclave`(
	IN _idusuario	INT,
	IN _clave	VARCHAR(250)
)
BEGIN
	UPDATE usuarios SET clave = _clave WHERE idusuario = _idusuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_actualizardatos` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_actualizardatos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_actualizardatos`(
	IN _idusuario		INT,	
	IN _nombres		VARCHAR (100),
	IN _apellidos		VARCHAR (100),
	IN _correo		VARCHAR (100)
)
BEGIN
	IF _nombres IS NOT NULL THEN
		UPDATE usuarios SET nombres = _nombres WHERE idusuario = _idusuario;
	END IF;
	IF _apellidos IS NOT NULL THEN
		UPDATE usuarios SET apellidos = _apellidos WHERE idusuario = _idusuario;
	END IF;
	IF _correo IS NOT NULL THEN
		UPDATE usuarios SET correo = _correo WHERE idusuario = _idusuario;
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_buscar_correo` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_buscar_correo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_buscar_correo`(IN _correo VARCHAR(100))
BEGIN
	SELECT idusuario, CONCAT(apellidos, ' ' , nombres) AS 'datosusuario'
	FROM usuarios
	WHERE correo = _correo AND estado = '1';
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_login`(
	IN _correo VARCHAR(100)
)
BEGIN
	SELECT idusuario, apellidos, nombres,
		correo, clave, imagenperfil, tipousuario, fecharegistro
	FROM usuarios
	WHERE correo = _correo AND estado = 1;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_registro` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_registro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_registro`(
	IN _nombres		VARCHAR (100),	
	IN _apellidos		VARCHAR (100),
	IN _correo		VARCHAR (100),
	IN _clave		VARCHAR (250)
	
)
BEGIN				
	INSERT INTO usuarios ( nombres, apellidos, correo, clave) 
		VALUES(_nombres, _apellidos, _correo, _clave);
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
