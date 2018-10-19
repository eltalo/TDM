/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : tdm

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-10-16 22:49:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_10_03_152134_create_partidos_table', '2');

-- ----------------------------
-- Table structure for `partidos`
-- ----------------------------
DROP TABLE IF EXISTS `partidos`;
CREATE TABLE `partidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IDJugador1` tinyint(3) unsigned NOT NULL,
  `IDJugador2` tinyint(3) unsigned NOT NULL,
  `PtosJugador1Set1` tinyint(3) unsigned NOT NULL,
  `PtosJugador2Set1` tinyint(3) unsigned NOT NULL,
  `PtosJugador1Set2` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador2Set2` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador1Set3` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador2Set3` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador1Set4` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador2Set4` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador1Set5` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador2Set5` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador1Set6` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador2Set6` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador1Set7` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `PtosJugador2Set7` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `FechaPartido` datetime NOT NULL,
  `IdUsuarioInserta` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `GANADOR` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of partidos
-- ----------------------------
INSERT INTO `partidos` VALUES ('8', '2', '1', '11', '1', '11', '1', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-07 22:42:05', '0', null, null, '2');
INSERT INTO `partidos` VALUES ('9', '2', '1', '1', '5', '2', '6', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-07 23:06:54', '0', null, null, '1');
INSERT INTO `partidos` VALUES ('10', '2', '3', '3', '11', '2', '11', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-07 23:07:12', '0', null, null, '3');
INSERT INTO `partidos` VALUES ('11', '2', '1', '11', '2', '11', '4', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-07 23:11:29', '0', null, null, '2');
INSERT INTO `partidos` VALUES ('12', '2', '1', '1', '11', '1', '11', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-08 23:14:36', '1', null, null, '1');
INSERT INTO `partidos` VALUES ('13', '2', '1', '1', '11', '1', '11', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-08 23:51:59', '1', null, null, '1');
INSERT INTO `partidos` VALUES ('14', '2', '1', '1', '11', '1', '11', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-08 23:52:29', '1', null, null, '1');
INSERT INTO `partidos` VALUES ('15', '1', '3', '11', '6', '11', '6', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2018-10-14 12:04:39', '1', null, null, '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diapago` tinyint(3) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Marcelo Madriaga', null, '88312463', 'eltalo@gmail.com', '$2y$10$.DbwCiKakjmFomzhW43cGebewEXgZ9oYzLdUbsgzJrve6loy23lY2', null, 'kisLIgZdlzPABU0eolDmehoYuuMKw0wmTfE8SNWsnilz4uQDa5xgsoCitDuh', '2018-10-02 23:47:17', '2018-10-02 23:47:17');
INSERT INTO `users` VALUES ('2', 'Daniel Bastías', null, '+56962179917', 'danielcorchea@gmail.com', null, null, null, null, null);
INSERT INTO `users` VALUES ('3', 'Felipe Sandoval', null, '+56984283566', 'pipechano@hotmail.cl', null, null, null, null, null);

-- ----------------------------
-- Procedure structure for `SP_TDM_INFO_JUGADOR`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_TDM_INFO_JUGADOR`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TDM_INFO_JUGADOR`()
BEGIN

	SELECT 
	AA.id,
	AA.NOMBRE,
	AA.JUGADOS, 
	IFNULL(CC.QGANADOS,0) AS GANADOS,
	round((IFNULL(CC.QGANADOS,0) / IFNULL(AA.JUGADOS,1)  * 100 ),2) AS Rendimiento
	FROM 
	(
		SELECT
		A.id,
		A.`name`  AS NOMBRE,
		COUNT(1) AS JUGADOS
		FROM users A
		INNER JOIN 
		(
			SELECT IDJugador1 AS JUGADOR FROM partidos 
			UNION all SELECT IDJugador2 AS JUGADOR FROM partidos 	
		) B
		ON A.id = B.JUGADOR 
		GROUP BY A.id,NOMBRE
	) AA
	LEFT JOIN
	(
		SELECT GANADOR , COUNT(8) AS QGANADOS FROM partidos GROUP BY GANADOR 
	) CC
	ON AA.id = CC.GANADOR
	order by AA.NOMBRE
;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `SP_TDM_INFO_PARTIDO`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_TDM_INFO_PARTIDO`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TDM_INFO_PARTIDO`(p_id INTEGER)
BEGIN
	SELECT
		A.id as idPartido,
		B.name as `Jugador`,
		`PtosJugador1Set1` as SET1,
		`PtosJugador1Set2` as SET2,
		`PtosJugador1Set3` as SET3,
		`PtosJugador1Set4` as SET4,
		`PtosJugador1Set5` as SET5,
		`PtosJugador1Set6` as SET6,
		`PtosJugador1Set7` as SET7,
		`FechaPartido`,
		CASE WHEN (GANADOR = A.IDJugador1) THEN 'X' ELSE NULL END AS GANADOR,
		B.id as idJugador
	FROM `tdm`.`partidos` A 
	INNER JOIN `tdm`.`users` B
	ON A.IDJugador1 = B.ID
	WHERE A.id = p_id
	UNION ALL SELECT 
		A.id as idPartido,
		B.name as `Jugador`,
	`PtosJugador2Set1`,
	`PtosJugador2Set2`,
	`PtosJugador2Set3`,
	`PtosJugador2Set4`,
	`PtosJugador2Set5`,  
	`PtosJugador2Set6`,
	`PtosJugador2Set7`,
	NULL,
	CASE WHEN (GANADOR = A.IDJugador2) THEN 'X' ELSE NULL END AS GANADOR ,
	B.id as idJugador
	FROM `tdm`.`partidos` A 
	INNER JOIN `tdm`.`users` B
	ON A.IDJugador2 = B.ID
	WHERE A.id = p_id;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `SP_TDM_INFO_PARTIDO_FECHA`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_TDM_INFO_PARTIDO_FECHA`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TDM_INFO_PARTIDO_FECHA`(p_fecha char(10))
BEGIN
SELECT AA.*
FROM 
(
	SELECT
		A.id as idPartido,
		B.name as `Jugador`,
		`PtosJugador1Set1` as SET1,
		`PtosJugador1Set2` as SET2,
		`PtosJugador1Set3` as SET3,
		`PtosJugador1Set4` as SET4,
		`PtosJugador1Set5` as SET5,
		`PtosJugador1Set6` as SET6,
		`PtosJugador1Set7` as SET7,
		CASE WHEN (GANADOR = A.IDJugador1) THEN FechaPartido ELSE NULL END AS FechaPartido,
		CASE WHEN (GANADOR = A.IDJugador1) THEN 'X' ELSE NULL END AS GANADOR,
		B.id as idJugador
	FROM `tdm`.`partidos` A 
	INNER JOIN `tdm`.`users` B
	ON A.IDJugador1 = B.ID
	WHERE DATE_FORMAT(FechaPartido,'%d-%m-%Y')=p_fecha 
	UNION ALL SELECT 
		A.id as idPartido,
		B.name as `Jugador`,
	`PtosJugador2Set1`,
	`PtosJugador2Set2`,
	`PtosJugador2Set3`,
	`PtosJugador2Set4`,
	`PtosJugador2Set5`,  
	`PtosJugador2Set6`,
	`PtosJugador2Set7`,
	CASE WHEN (GANADOR = A.IDJugador2) THEN FechaPartido ELSE NULL END AS FechaPartido,
	CASE WHEN (GANADOR = A.IDJugador2) THEN 'X' ELSE NULL END AS GANADOR ,
	B.id as idJugador
	FROM `tdm`.`partidos` A 
	INNER JOIN `tdm`.`users` B
	ON A.IDJugador2 = B.ID
	WHERE DATE_FORMAT(FechaPartido,'%d-%m-%Y')=p_fecha 
)AA ORDER BY 1 desc , FechaPartido Desc 
;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `SP_TDM_INFO_PARTIDO_JUGADOR`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_TDM_INFO_PARTIDO_JUGADOR`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TDM_INFO_PARTIDO_JUGADOR`(p_id_user INTEGER)
BEGIN
SELECT AA.*
FROM 
(
	SELECT
		A.id as idPartido,
		B.name as `Jugador`,
		`PtosJugador1Set1` as SET1,
		`PtosJugador1Set2` as SET2,
		`PtosJugador1Set3` as SET3,
		`PtosJugador1Set4` as SET4,
		`PtosJugador1Set5` as SET5,
		`PtosJugador1Set6` as SET6,
		`PtosJugador1Set7` as SET7,
		CASE WHEN (GANADOR = A.IDJugador1) THEN FechaPartido ELSE NULL END AS FechaPartido,
		CASE WHEN (GANADOR = A.IDJugador1) THEN 'X' ELSE NULL END AS GANADOR,
		B.id as idJugador
	FROM `tdm`.`partidos` A 
	INNER JOIN `tdm`.`users` B
	ON A.IDJugador1 = B.ID
	WHERE A.idJugador1 = p_id_user or A.idJugador2 = p_id_user 
	UNION ALL SELECT 
		A.id as idPartido,
		B.name as `Jugador`,
	`PtosJugador2Set1`,
	`PtosJugador2Set2`,
	`PtosJugador2Set3`,
	`PtosJugador2Set4`,
	`PtosJugador2Set5`,  
	`PtosJugador2Set6`,
	`PtosJugador2Set7`,
	CASE WHEN (GANADOR = A.IDJugador2) THEN FechaPartido ELSE NULL END AS FechaPartido,
	CASE WHEN (GANADOR = A.IDJugador2) THEN 'X' ELSE NULL END AS GANADOR ,
	B.id as idJugador
	FROM `tdm`.`partidos` A 
	INNER JOIN `tdm`.`users` B
	ON A.IDJugador2 = B.ID
	WHERE A.idJugador1 = p_id_user or A.idJugador2 = p_id_user 
)AA ORDER BY 1 desc , Jugador  
;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `SP_TDM_LISTA_FECHA_PARTIDO`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_TDM_LISTA_FECHA_PARTIDO`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TDM_LISTA_FECHA_PARTIDO`()
BEGIN
	SELECT 'Todos' as FechaPartido 
	union SELECT DISTINCT DATE_FORMAT(FechaPartido,'%d-%m-%Y') as FechaPartido from partidos order by FechaPartido  desc;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_TDM_partido_add`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_TDM_partido_add`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TDM_partido_add`(IN `Pjugador1` INT, IN `Pjugador2` INT, IN `Pj1s1` SMALLINT, IN `Pj1s2` SMALLINT, IN `Pj1s3` SMALLINT, IN `Pj1s4` SMALLINT, IN `Pj1s5` SMALLINT, IN `Pj2s1` SMALLINT, IN `Pj2s2` SMALLINT, IN `Pj2s3` SMALLINT, IN `Pj2s4` SMALLINT, IN `Pj2s5` SMALLINT, p_id_user smallint)
begin

DECLARE V_ID_PARTIDO INT; 
	
	
insert into partidos
(
IDJugador1,
IDJugador2,
PtosJugador1Set1,
PtosJugador1Set2,
PtosJugador1Set3,
PtosJugador1Set4,
PtosJugador1Set5,
PtosJugador2Set1,
PtosJugador2Set2,
PtosJugador2Set3,
PtosJugador2Set4,
PtosJugador2Set5,
IdUsuarioInserta,
FechaPartido
)
values
(
Pjugador1,
Pjugador2,
Pj1s1,
Pj1s2,
Pj1s3,
Pj1s4,
Pj1s5,
Pj2s1,
Pj2s2,
Pj2s3,
Pj2s4,
Pj2s5,
p_id_user,
now()
);

SELECT MAX(id) INTO V_ID_PARTIDO from partidos ;

call SP_TDM_VERIFICA_GANADOR(V_ID_PARTIDO);

SELECT 200 AS CODIGO, 'INFORMACION GUARDADA CORRECTAMENTE' AS MENSAJE;


end
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `SP_TDM_VERIFICA_GANADOR`
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_TDM_VERIFICA_GANADOR`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TDM_VERIFICA_GANADOR`(IN `p_id_partido` INT)
begin
	DECLARE Q_SGJ1 SMALLINT; 
	DECLARE Q_SGJ2 SMALLINT; 

	DECLARE V_J1 SMALLINT; 
	DECLARE V_J2 SMALLINT; 
	DECLARE Vj1s1 smallint;
	DECLARE Vj1s2 smallint;
	DECLARE Vj1s3 smallint;
	DECLARE Vj1s4 smallint;
	DECLARE Vj1s5 smallint;
	DECLARE Vj2s1 smallint;
	DECLARE Vj2s2 smallint;
	DECLARE Vj2s3 smallint;
	DECLARE Vj2s4 smallint;
	DECLARE Vj2s5 smallINT;
	
	SELECT  0 INTO Q_SGJ1; 
	SELECT  0 INTO Q_SGJ2; 

	select PtosJugador1Set1 into Vj1s1 from partidos where  id = p_id_partido ;
	select PtosJugador1Set2 into Vj1s2 from partidos where  id = p_id_partido ;
	select PtosJugador1Set3 into Vj1s3 from partidos where  id = p_id_partido ;
	select PtosJugador1Set4 into Vj1s4 from partidos where  id = p_id_partido ;
	select PtosJugador1Set5 into Vj1s5 from partidos where  id = p_id_partido ;
	select PtosJugador2Set1 into Vj2s1 from partidos where  id = p_id_partido ;
	select PtosJugador2Set2 into Vj2s2 from partidos where  id = p_id_partido ;
	select PtosJugador2Set3 into Vj2s3 from partidos where  id = p_id_partido ;
	select PtosJugador2Set4 into Vj2s4 from partidos where  id = p_id_partido ;
	select PtosJugador2Set5 into Vj2s5 from partidos where  id = p_id_partido ;

	select IDJugador1 into V_J1 from partidos where  id = p_id_partido ;
	select IDJugador2 into V_J2 from partidos where  id = p_id_partido ;
	
	
	IF (Vj1s1 > Vj2s1) THEN
		SELECT Q_SGJ1 +1 INTO Q_SGJ1;
	ELSE 
		SELECT Q_SGJ2 +1 INTO Q_SGJ2;
	END IF;

	IF (Vj1s2 > Vj2s2) THEN
		SELECT Q_SGJ1 +1 INTO Q_SGJ1;
	ELSE 
		SELECT Q_SGJ2 +1 INTO Q_SGJ2;
	END IF;

	IF (Vj1s3 > Vj2s3) THEN
		SELECT Q_SGJ1 +1 INTO Q_SGJ1;
	ELSE 
		SELECT Q_SGJ2 +1 INTO Q_SGJ2;
	END IF;

	IF (Vj1s4 > Vj2s4) THEN
		SELECT Q_SGJ1 +1 INTO Q_SGJ1;
	ELSE 
		SELECT Q_SGJ2 +1 INTO Q_SGJ2;
	END IF;

	IF (Vj1s5 > Vj2s5) THEN
		SELECT Q_SGJ1 +1 INTO Q_SGJ1;
	ELSE 
		SELECT Q_SGJ2 +1 INTO Q_SGJ2;
	END IF;

	IF (Q_SGJ1 > Q_SGJ2) THEN
		UPDATE partidos SET GANADOR = V_J1  where  id= p_id_partido ;
	ELSE
		UPDATE partidos SET GANADOR = V_J2  where  id = p_id_partido ;
	END IF;
	
end
;;
DELIMITER ;
