CREATE DATABASE  IF NOT EXISTS `db_orcamento` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_orcamento`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_orcamento
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `tb_cartsproducts`
--

LOCK TABLES `tb_cartsproducts` WRITE;
/*!40000 ALTER TABLE `tb_cartsproducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_cartsproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (41,'Com Nota','2020-04-27 00:04:05');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_categoriesproducts`
--

LOCK TABLES `tb_categoriesproducts` WRITE;
/*!40000 ALTER TABLE `tb_categoriesproducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_categoriesproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_itens`
--

LOCK TABLES `tb_itens` WRITE;
/*!40000 ALTER TABLE `tb_itens` DISABLE KEYS */;
INSERT INTO `tb_itens` VALUES (1,1,'codigo','item cod','',''),(2,1,'','item ok','',''),(3,1,'1212','item ok','',''),(7,1,NULL,'pedido do 111','',''),(8,1,'1688','pedido do 111','',''),(9,1,'4128','item 1','',''),(11,1,'L7783','pedido do L7783','',''),(12,1,'A3537','item a3537','',''),(14,1,NULL,'','',''),(15,1,NULL,'','',''),(16,1,NULL,'','',''),(17,1,'A6015','','',''),(18,1,'J1295','','',''),(19,1,'K8160','','',''),(20,1,NULL,'','',''),(21,1,NULL,'','',''),(22,2,NULL,'','',''),(23,2,NULL,'','',''),(24,2,NULL,'','',''),(25,2,NULL,'','',''),(26,1,'C6378','','',''),(27,2,'','','',''),(28,1,'B4936','','',''),(32,1,'B4360','item 1','qtd ok','valor ok'),(38,1,'B3536','pedido do 111','',''),(44,2,'B4360','kjasdlf lakjsdfl  jaksdfkjagsj lkjlakjsgdl kjagfjgaldshsj ','',''),(45,3,'B4360','xfgigh usigiohps oshdgi sdg hs h~sj~gdh j~lh k iid g dpg p dgph  ipi idgi i ','qtd ok','20.000,00'),(56,1,'C4610','item ok','',''),(57,1,'A2400','','',''),(58,1,'A3250','','',''),(59,1,'G1950','','',''),(64,2,'A3250','','',''),(65,1,'L8026','','','');
/*!40000 ALTER TABLE `tb_itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (8,'','',0,'2020-04-22 02:09:10'),(12,'','',0,'2020-04-22 20:35:01'),(14,'admin','',0,'2020-04-23 20:03:00'),(19,'Beto','lukaquinellato@gmail.com',0,'2020-04-30 18:32:02');
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_products`
--

LOCK TABLES `tb_products` WRITE;
/*!40000 ALTER TABLE `tb_products` DISABLE KEYS */;
INSERT INTO `tb_products` VALUES (175,'','','','','','','',0.00,'','16/05/2020, 02:19','','(5)Não Iniciado','(3)Baixa','A2400'),(176,'','','','','','','',0.00,'','16/05/2020, 08:09','','(5)Não Iniciado','(3)Baixa','A3250'),(177,'','','','','','','',0.00,'','16/05/2020, 02:21','','(5)Não Iniciado','(3)Baixa','G1950'),(178,'','teste','','','','','',0.00,'','16/05/2020, 08:09','','(5)Não Iniciado','(2)Média','G7847'),(179,'','teste editado','','','','','',0.00,'','16/05/2020, 07:45','','(5)Não Iniciado','(3)Baixa','L8026');
/*!40000 ALTER TABLE `tb_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_productscategories`
--

LOCK TABLES `tb_productscategories` WRITE;
/*!40000 ALTER TABLE `tb_productscategories` DISABLE KEYS */;
INSERT INTO `tb_productscategories` VALUES (24,24),(26,10);
/*!40000 ALTER TABLE `tb_productscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (14,14,'admin','$2y$12$JzJbE1QffCXUV0lYXgF4TuPgJu6KkfVJMwQChh67UcOyGjUfi7Z7.',1,'2020-04-23 20:03:00'),(19,19,'beto','$2y$12$/HO9AlQS.jfSd2h1fJObFOFVbNmpkJERsfbZlxFPcbTLzwmkK.xG2',1,'2020-04-30 18:32:02');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_userslogs`
--

LOCK TABLES `tb_userslogs` WRITE;
/*!40000 ALTER TABLE `tb_userslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
INSERT INTO `tb_userspasswordsrecoveries` VALUES (1,8,'127.0.0.1',NULL,'2020-04-22 19:58:09'),(2,8,'127.0.0.1',NULL,'2020-04-22 19:59:08'),(3,8,'127.0.0.1',NULL,'2020-04-22 20:31:50'),(4,12,'127.0.0.1',NULL,'2020-04-22 20:35:31'),(5,12,'127.0.0.1',NULL,'2020-04-22 20:42:57');
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_orcamento'
--

--
-- Dumping routines for database 'db_orcamento'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_categories_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save`(
pidcategory INT,
pdescategory VARCHAR(64)
)
BEGIN
	
	IF pidcategory > 0 THEN
		
		UPDATE tb_categories
        SET descategory = pdescategory
        WHERE idcategory = pidcategory;
        
    ELSE
		
		INSERT INTO tb_categories (descategory) VALUES(pdescategory);
        
        SET pidcategory = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE idcategory = pidcategory;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_itens_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_itens_save`(
pid int(11),
piditem int(11),
pcod varchar(30),
pitem varchar(255),
pqtd varchar(45),
pvalor varchar(45)
)
BEGIN
	
	IF pid > 0 THEN
		
		UPDATE tb_itens
        SET 
			iditem = piditem,
			cod = pcod,
            item = pitem,
            qtd = pqtd,
            valor = pvalor
            
        WHERE id = pid;
        
    ELSE
		
		INSERT INTO tb_itens ( iditem, cod, item, qtd, valor) 
        VALUES(piditem, pcod, pitem, pqtd, pvalor) ;
        
        SET pid = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_itens WHERE id = pid;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_products_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_products_save`(
pidproduct int(11),
pdesproduct varchar(64),
pvlprice varchar(64),
pvlwidth varchar(30),
pvlheight varchar(30),
pvllength varchar(10),
pvlweight varchar(10),
pdesction varchar(200),
pprice decimal(30,2),
pdesurl varchar(128),
pnota varchar(20),
pstats varchar(45),
pprioridade varchar(20),
pdtregister varchar(20),
pcod varchar(45)

)
BEGIN
	
	IF pidproduct > 0 THEN
		
		UPDATE tb_products
        SET 
			desproduct = pdesproduct,
            vlprice = pvlprice,
            vlwidth = pvlwidth,
            vlheight = pvlheight,
            vllength = pvllength,
            vlweight = pvlweight,
            desction = pdesction,
            price = pprice,
            desurl = pdesurl,
            nota = pnota,
            stats = pstats,
            prioridade = pprioridade,
            dtregister= pdtregister,
            cod = pcod

        WHERE idproduct = pidproduct;
        
    ELSE
		
		INSERT INTO tb_products (desproduct, vlprice, vlwidth, vlheight, vllength, vlweight, desction, price, desurl, nota, stats, prioridade, dtregister, cod) 
        VALUES(pdesproduct, pvlprice, pvlwidth, pvlheight, pvllength, pvlweight, pdesction, pprice, pdesurl, pnota, pstats, pprioridade, pdtregister, pcod);
        
        SET pidproduct = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_products WHERE idproduct = pidproduct;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_userspasswordsrecoveries_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(
piduser INT,
pdesip VARCHAR(45)
)
BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usersupdate_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save`(
piduser INT,
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
		desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
	WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
		deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin
	WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete`(
piduser INT
)
BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    DELETE FROM tb_users WHERE iduser = piduser;
    DELETE FROM tb_persons WHERE idperson = vidperson;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-16 14:52:54
