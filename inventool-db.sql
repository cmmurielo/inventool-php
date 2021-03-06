CREATE DATABASE  IF NOT EXISTS `inventool` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `inventool`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: inventool
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `categoria_id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1666 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `documento` int NOT NULL,
  `tipoDocumento` enum('CC','CE','PAP','NIP','NIT','TI') NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`documento`),
  UNIQUE KEY `documento_UNIQUE` (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (325432,'CC','JUANITO','ESCARCHA','4352343','juanitoescarcha@mail.com','PEREIRA','BARRIO LA CAPILLA'),(1053108142,'CC','LUISA FERNANDA','BUCURU','231232','lf.bucuru@mail.com','MANIZALES','ASLKDN'),(1053812639,'CC','CARLOS MARIO','MURIEL','3117766871','cmmuriel@gmail.com','DOSQUEBRADAS','MZ D CASA 8, LA SOLEDAD');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_factura` (
  `valor` float NOT NULL,
  `cantidad` int NOT NULL,
  `factura_id` int NOT NULL,
  `producto_codigo` int NOT NULL,
  `detalle_facturacol` varchar(45) NOT NULL,
  PRIMARY KEY (`factura_id`,`producto_codigo`),
  KEY `fk_detalle_factura_facturas1_idx` (`factura_id`),
  KEY `fk_detalle_factura_productos1_idx` (`producto_codigo`),
  CONSTRAINT `fk_detalle_factura_facturas1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`factura_id`),
  CONSTRAINT `fk_detalle_factura_productos1` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`producto_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_factura`
--

LOCK TABLES `detalle_factura` WRITE;
/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturas` (
  `factura_id` int NOT NULL,
  `fechaFactura` datetime NOT NULL,
  `cliente_documento` int NOT NULL,
  `usuario_documento` varchar(16) NOT NULL,
  PRIMARY KEY (`factura_id`),
  UNIQUE KEY `id_factura_UNIQUE` (`factura_id`),
  KEY `fk_facturas_clientes1_idx` (`cliente_documento`),
  KEY `fk_facturas_usuarios1_idx` (`usuario_documento`),
  CONSTRAINT `fk_facturas_clientes1` FOREIGN KEY (`cliente_documento`) REFERENCES `clientes` (`documento`),
  CONSTRAINT `fk_facturas_usuarios1` FOREIGN KEY (`usuario_documento`) REFERENCES `usuarios` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipios` (
  `municipio_id` int unsigned NOT NULL AUTO_INCREMENT,
  `municipio` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`municipio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,'Abriaqu??'),(2,'Acac??as'),(3,'Acand??'),(4,'Acevedo'),(5,'Ach??'),(6,'Agrado'),(7,'Agua de Dios'),(8,'Aguachica'),(9,'Aguada'),(10,'Aguadas'),(11,'Aguazul'),(12,'Agust??n Codazzi'),(13,'Aipe'),(14,'Albania'),(15,'Albania'),(16,'Albania'),(17,'Alb??n'),(18,'Alb??n (San Jos??)'),(19,'Alcal??'),(20,'Alejandria'),(21,'Algarrobo'),(22,'Algeciras'),(23,'Almaguer'),(24,'Almeida'),(25,'Alpujarra'),(26,'Altamira'),(27,'Alto Baud?? (Pie de Pato)'),(28,'Altos del Rosario'),(29,'Alvarado'),(30,'Amag??'),(31,'Amalfi'),(32,'Ambalema'),(33,'Anapoima'),(34,'Ancuya'),(35,'Andaluc??a'),(36,'Andes'),(37,'Angel??polis'),(38,'Angostura'),(39,'Anolaima'),(40,'Anor??'),(41,'Anserma'),(42,'Ansermanuevo'),(43,'Anzo??tegui'),(44,'Anz??'),(45,'Apartad??'),(46,'Apulo'),(47,'Ap??a'),(48,'Aquitania'),(49,'Aracataca'),(50,'Aranzazu'),(51,'Aratoca'),(52,'Arauca'),(53,'Arauquita'),(54,'Arbel??ez'),(55,'Arboleda (Berruecos)'),(56,'Arboledas'),(57,'Arboletes'),(58,'Arcabuco'),(59,'Arenal'),(60,'Argelia'),(61,'Argelia'),(62,'Argelia'),(63,'Ariguan?? (El Dif??cil)'),(64,'Arjona'),(65,'Armenia'),(66,'Armenia'),(67,'Armero (Guayabal)'),(68,'Arroyohondo'),(69,'Astrea'),(70,'Ataco'),(71,'Atrato (Yuto)'),(72,'Ayapel'),(73,'Bagad??'),(74,'Bah??a Solano (M??tis)'),(75,'Bajo Baud?? (Pizarro)'),(76,'Balboa'),(77,'Balboa'),(78,'Baranoa'),(79,'Baraya'),(80,'Barbacoas'),(81,'Barbosa'),(82,'Barbosa'),(83,'Barichara'),(84,'Barranca de Up??a'),(85,'Barrancabermeja'),(86,'Barrancas'),(87,'Barranco de Loba'),(88,'Barranquilla'),(89,'Becerr??l'),(90,'Belalc??zar'),(91,'Bello'),(92,'Belmira'),(93,'Beltr??n'),(94,'Bel??n'),(95,'Bel??n'),(96,'Bel??n de Bajir??'),(97,'Bel??n de Umbr??a'),(98,'Bel??n de los Andaqu??es'),(99,'Berbeo'),(100,'Betania'),(101,'Beteitiva'),(102,'Betulia'),(103,'Betulia'),(104,'Bituima'),(105,'Boavita'),(106,'Bochalema'),(107,'Bogot?? D.C.'),(108,'Bojac??'),(109,'Bojay?? (Bellavista)'),(110,'Bol??var'),(111,'Bol??var'),(112,'Bol??var'),(113,'Bol??var'),(114,'Bosconia'),(115,'Boyac??'),(116,'Brice??o'),(117,'Brice??o'),(118,'Bucaramanga'),(119,'Bucarasica'),(120,'Buenaventura'),(121,'Buenavista'),(122,'Buenavista'),(123,'Buenavista'),(124,'Buenavista'),(125,'Buenos Aires'),(126,'Buesaco'),(127,'Buga'),(128,'Bugalagrande'),(129,'Bur??tica'),(130,'Busbanza'),(131,'Cabrera'),(132,'Cabrera'),(133,'Cabuyaro'),(134,'Cachipay'),(135,'Caicedo'),(136,'Caicedonia'),(137,'Caimito'),(138,'Cajamarca'),(139,'Cajib??o'),(140,'Cajic??'),(141,'Calamar'),(142,'Calamar'),(143,'Calarc??'),(144,'Caldas'),(145,'Caldas'),(146,'Caldono'),(147,'California'),(148,'Calima (Dari??n)'),(149,'Caloto'),(150,'Cal??'),(151,'Campamento'),(152,'Campo de la Cruz'),(153,'Campoalegre'),(154,'Campohermoso'),(155,'Canalete'),(156,'Candelaria'),(157,'Candelaria'),(158,'Cantagallo'),(159,'Cant??n de San Pablo'),(160,'Caparrap??'),(161,'Capitanejo'),(162,'Caracol??'),(163,'Caramanta'),(164,'Carcas??'),(165,'Carepa'),(166,'Carmen de Apical??'),(167,'Carmen de Carupa'),(168,'Carmen de Viboral'),(169,'Carmen del Dari??n (CURBARAD??)'),(170,'Carolina'),(171,'Cartagena'),(172,'Cartagena del Chair??'),(173,'Cartago'),(174,'Carur??'),(175,'Casabianca'),(176,'Castilla la Nueva'),(177,'Caucasia'),(178,'Ca??asgordas'),(179,'Cepita'),(180,'Ceret??'),(181,'Cerinza'),(182,'Cerrito'),(183,'Cerro San Antonio'),(184,'Chachagu??'),(185,'Chaguan??'),(186,'Chal??n'),(187,'Chaparral'),(188,'Charal??'),(189,'Charta'),(190,'Chigorod??'),(191,'Chima'),(192,'Chimichagua'),(193,'Chim??'),(194,'Chinavita'),(195,'Chinchin??'),(196,'Chin??cota'),(197,'Chin??'),(198,'Chipaque'),(199,'Chipat??'),(200,'Chiquinquir??'),(201,'Chiriguan??'),(202,'Chiscas'),(203,'Chita'),(204,'Chitag??'),(205,'Chitaraque'),(206,'Chivat??'),(207,'Chivolo'),(208,'Choach??'),(209,'Chocont??'),(210,'Ch??meza'),(211,'Ch??a'),(212,'Ch??quiza'),(213,'Ch??vor'),(214,'Cicuco'),(215,'Cimitarra'),(216,'Circasia'),(217,'Cisneros'),(218,'Ci??naga'),(219,'Ci??naga'),(220,'Ci??naga de Oro'),(221,'Clemencia'),(222,'Cocorn??'),(223,'Coello'),(224,'Cogua'),(225,'Colombia'),(226,'Colos?? (Ricaurte)'),(227,'Col??n'),(228,'Col??n (G??nova)'),(229,'Concepci??n'),(230,'Concepci??n'),(231,'Concordia'),(232,'Concordia'),(233,'Condoto'),(234,'Confines'),(235,'Consaca'),(236,'Contadero'),(237,'Contrataci??n'),(238,'Convenci??n'),(239,'Copacabana'),(240,'Coper'),(241,'Cordob??'),(242,'Corinto'),(243,'Coromoro'),(244,'Corozal'),(245,'Corrales'),(246,'Cota'),(247,'Cotorra'),(248,'Covarach??a'),(249,'Cove??as'),(250,'Coyaima'),(251,'Cravo Norte'),(252,'Cuaspud (Carlosama)'),(253,'Cubarral'),(254,'Cubar??'),(255,'Cucaita'),(256,'Cucunub??'),(257,'Cucutilla'),(258,'Cuitiva'),(259,'Cumaral'),(260,'Cumaribo'),(261,'Cumbal'),(262,'Cumbitara'),(263,'Cunday'),(264,'Curillo'),(265,'Curit??'),(266,'Curuman??'),(267,'C??ceres'),(268,'C??chira'),(269,'C??cota'),(270,'C??queza'),(271,'C??rtegui'),(272,'C??mbita'),(273,'C??rdoba'),(274,'C??rdoba'),(275,'C??cuta'),(276,'Dabeiba'),(277,'Dagua'),(278,'Dibulla'),(279,'Distracci??n'),(280,'Dolores'),(281,'Don Mat??as'),(282,'Dosquebradas'),(283,'Duitama'),(284,'Durania'),(285,'Eb??jico'),(286,'El Bagre'),(287,'El Banco'),(288,'El Cairo'),(289,'El Calvario'),(290,'El Carmen'),(291,'El Carmen'),(292,'El Carmen de Atrato'),(293,'El Carmen de Bol??var'),(294,'El Castillo'),(295,'El Cerrito'),(296,'El Charco'),(297,'El Cocuy'),(298,'El Colegio'),(299,'El Copey'),(300,'El Doncello'),(301,'El Dorado'),(302,'El Dovio'),(303,'El Espino'),(304,'El Guacamayo'),(305,'El Guamo'),(306,'El Molino'),(307,'El Paso'),(308,'El Paujil'),(309,'El Pe??ol'),(310,'El Pe??on'),(311,'El Pe??on'),(312,'El Pe????n'),(313,'El Pi??on'),(314,'El Play??n'),(315,'El Retorno'),(316,'El Ret??n'),(317,'El Roble'),(318,'El Rosal'),(319,'El Rosario'),(320,'El Tabl??n de G??mez'),(321,'El Tambo'),(322,'El Tambo'),(323,'El Tarra'),(324,'El Zulia'),(325,'El ??guila'),(326,'El??as'),(327,'Encino'),(328,'Enciso'),(329,'Entrerr??os'),(330,'Envigado'),(331,'Espinal'),(332,'Facatativ??'),(333,'Falan'),(334,'Filadelfia'),(335,'Filandia'),(336,'Firavitoba'),(337,'Flandes'),(338,'Florencia'),(339,'Florencia'),(340,'Floresta'),(341,'Florida'),(342,'Floridablanca'),(343,'Flori??n'),(344,'Fonseca'),(345,'Fort??l'),(346,'Fosca'),(347,'Francisco Pizarro'),(348,'Fredonia'),(349,'Fresno'),(350,'Frontino'),(351,'Fuente de Oro'),(352,'Fundaci??n'),(353,'Funes'),(354,'Funza'),(355,'Fusagasug??'),(356,'F??meque'),(357,'F??quene'),(358,'Gachal??'),(359,'Gachancip??'),(360,'Gachantiv??'),(361,'Gachet??'),(362,'Galapa'),(363,'Galeras (Nueva Granada)'),(364,'Gal??n'),(365,'Gama'),(366,'Gamarra'),(367,'Garagoa'),(368,'Garz??n'),(369,'Gigante'),(370,'Ginebra'),(371,'Giraldo'),(372,'Girardot'),(373,'Girardota'),(374,'Gir??n'),(375,'Gonzalez'),(376,'Gramalote'),(377,'Granada'),(378,'Granada'),(379,'Granada'),(380,'Guaca'),(381,'Guacamayas'),(382,'Guacar??'),(383,'Guachav??s'),(384,'Guachen??'),(385,'Guachet??'),(386,'Guachucal'),(387,'Guadalupe'),(388,'Guadalupe'),(389,'Guadalupe'),(390,'Guaduas'),(391,'Guaitarilla'),(392,'Gualmat??n'),(393,'Guamal'),(394,'Guamal'),(395,'Guamo'),(396,'Guapota'),(397,'Guap??'),(398,'Guaranda'),(399,'Guarne'),(400,'Guasca'),(401,'Guatap??'),(402,'Guataqu??'),(403,'Guatavita'),(404,'Guateque'),(405,'Guavat??'),(406,'Guayabal de Siquima'),(407,'Guayabetal'),(408,'Guayat??'),(409,'Guepsa'),(410,'Guic??n'),(411,'Guti??rrez'),(412,'Gu??tica'),(413,'G??mbita'),(414,'G??meza'),(415,'G??nova'),(416,'G??mez Plata'),(417,'Hacar??'),(418,'Hatillo de Loba'),(419,'Hato'),(420,'Hato Corozal'),(421,'Hatonuevo'),(422,'Heliconia'),(423,'Herr??n'),(424,'Herveo'),(425,'Hispania'),(426,'Hobo'),(427,'Honda'),(428,'Ibagu??'),(429,'Icononzo'),(430,'Iles'),(431,'Im??es'),(432,'Inz??'),(433,'In??rida'),(434,'Ipiales'),(435,'Isnos'),(436,'Istmina'),(437,'Itag????'),(438,'Ituango'),(439,'Iz??'),(440,'Jambal??'),(441,'Jamund??'),(442,'Jard??n'),(443,'Jenesano'),(444,'Jeric??'),(445,'Jeric??'),(446,'Jerusal??n'),(447,'Jes??s Mar??a'),(448,'Jord??n'),(449,'Juan de Acosta'),(450,'Jun??n'),(451,'Jurad??'),(452,'La Apartada y La Frontera'),(453,'La Argentina'),(454,'La Belleza'),(455,'La Calera'),(456,'La Capilla'),(457,'La Ceja'),(458,'La Celia'),(459,'La Cruz'),(460,'La Cumbre'),(461,'La Dorada'),(462,'La Esperanza'),(463,'La Estrella'),(464,'La Florida'),(465,'La Gloria'),(466,'La Jagua de Ibirico'),(467,'La Jagua del Pilar'),(468,'La Llanada'),(469,'La Macarena'),(470,'La Merced'),(471,'La Mesa'),(472,'La Monta??ita'),(473,'La Palma'),(474,'La Paz'),(475,'La Paz (Robles)'),(476,'La Pe??a'),(477,'La Pintada'),(478,'La Plata'),(479,'La Playa'),(480,'La Primavera'),(481,'La Salina'),(482,'La Sierra'),(483,'La Tebaida'),(484,'La Tola'),(485,'La Uni??n'),(486,'La Uni??n'),(487,'La Uni??n'),(488,'La Uni??n'),(489,'La Uvita'),(490,'La Vega'),(491,'La Vega'),(492,'La Victoria'),(493,'La Victoria'),(494,'La Victoria'),(495,'La Virginia'),(496,'Labateca'),(497,'Labranzagrande'),(498,'Land??zuri'),(499,'Lebrija'),(500,'Leiva'),(501,'Lejan??as'),(502,'Lenguazaque'),(503,'Leticia'),(504,'Liborina'),(505,'Linares'),(506,'Llor??'),(507,'Lorica'),(508,'Los C??rdobas'),(509,'Los Palmitos'),(510,'Los Patios'),(511,'Los Santos'),(512,'Lourdes'),(513,'Luruaco'),(514,'L??rida'),(515,'L??bano'),(516,'L??pez (Micay)'),(517,'Macanal'),(518,'Macaravita'),(519,'Maceo'),(520,'Machet??'),(521,'Madrid'),(522,'Magangu??'),(523,'Mag??i (Pay??n)'),(524,'Mahates'),(525,'Maicao'),(526,'Majagual'),(527,'Malambo'),(528,'Mallama (Piedrancha)'),(529,'Manat??'),(530,'Manaure'),(531,'Manaure Balc??n del Cesar'),(532,'Manizales'),(533,'Manta'),(534,'Manzanares'),(535,'Man??'),(536,'Mapiripan'),(537,'Margarita'),(538,'Marinilla'),(539,'Marip??'),(540,'Mariquita'),(541,'Marmato'),(542,'Marquetalia'),(543,'Marsella'),(544,'Marulanda'),(545,'Mar??a la Baja'),(546,'Matanza'),(547,'Medell??n'),(548,'Medina'),(549,'Medio Atrato'),(550,'Medio Baud??'),(551,'Medio San Juan (ANDAGOYA)'),(552,'Melgar'),(553,'Mercaderes'),(554,'Mesetas'),(555,'Mil??n'),(556,'Miraflores'),(557,'Miraflores'),(558,'Miranda'),(559,'Mistrat??'),(560,'Mit??'),(561,'Mocoa'),(562,'Mogotes'),(563,'Molagavita'),(564,'Momil'),(565,'Momp??s'),(566,'Mongua'),(567,'Mongu??'),(568,'Moniquir??'),(569,'Montebello'),(570,'Montecristo'),(571,'Montel??bano'),(572,'Montenegro'),(573,'Monteria'),(574,'Monterrey'),(575,'Morales'),(576,'Morales'),(577,'Morelia'),(578,'Morroa'),(579,'Mosquera'),(580,'Mosquera'),(581,'Motavita'),(582,'Mo??itos'),(583,'Murillo'),(584,'Murind??'),(585,'Mutat??'),(586,'Mutiscua'),(587,'Muzo'),(588,'M??laga'),(589,'Nari??o'),(590,'Nari??o'),(591,'Nari??o'),(592,'Natagaima'),(593,'Nech??'),(594,'Necocl??'),(595,'Neira'),(596,'Neiva'),(597,'Nemoc??n'),(598,'Nilo'),(599,'Nimaima'),(600,'Nobsa'),(601,'Nocaima'),(602,'Norcasia'),(603,'Noros??'),(604,'Novita'),(605,'Nueva Granada'),(606,'Nuevo Col??n'),(607,'Nunch??a'),(608,'Nuqu??'),(609,'N??taga'),(610,'Obando'),(611,'Ocamonte'),(612,'Oca??a'),(613,'Oiba'),(614,'Oicat??'),(615,'Olaya'),(616,'Olaya Herrera'),(617,'Onzaga'),(618,'Oporapa'),(619,'Orito'),(620,'Orocu??'),(621,'Ortega'),(622,'Ospina'),(623,'Otanche'),(624,'Ovejas'),(625,'Pachavita'),(626,'Pacho'),(627,'Padilla'),(628,'Paicol'),(629,'Pailitas'),(630,'Paime'),(631,'Paipa'),(632,'Pajarito'),(633,'Palermo'),(634,'Palestina'),(635,'Palestina'),(636,'Palmar'),(637,'Palmar de Varela'),(638,'Palmas del Socorro'),(639,'Palmira'),(640,'Palmito'),(641,'Palocabildo'),(642,'Pamplona'),(643,'Pamplonita'),(644,'Pandi'),(645,'Panqueba'),(646,'Paratebueno'),(647,'Pasca'),(648,'Pat??a (El Bordo)'),(649,'Pauna'),(650,'Paya'),(651,'Paz de Ariporo'),(652,'Paz de R??o'),(653,'Pedraza'),(654,'Pelaya'),(655,'Pensilvania'),(656,'Peque'),(657,'Pereira'),(658,'Pesca'),(659,'Pe??ol'),(660,'Piamonte'),(661,'Pie de Cuesta'),(662,'Piedras'),(663,'Piendam??'),(664,'Pijao'),(665,'Piji??o'),(666,'Pinchote'),(667,'Pinillos'),(668,'Piojo'),(669,'Pisva'),(670,'Pital'),(671,'Pitalito'),(672,'Pivijay'),(673,'Planadas'),(674,'Planeta Rica'),(675,'Plato'),(676,'Policarpa'),(677,'Polonuevo'),(678,'Ponedera'),(679,'Popay??n'),(680,'Pore'),(681,'Potos??'),(682,'Pradera'),(683,'Prado'),(684,'Providencia'),(685,'Providencia'),(686,'Pueblo Bello'),(687,'Pueblo Nuevo'),(688,'Pueblo Rico'),(689,'Pueblorrico'),(690,'Puebloviejo'),(691,'Puente Nacional'),(692,'Puerres'),(693,'Puerto As??s'),(694,'Puerto Berr??o'),(695,'Puerto Boyac??'),(696,'Puerto Caicedo'),(697,'Puerto Carre??o'),(698,'Puerto Colombia'),(699,'Puerto Concordia'),(700,'Puerto Escondido'),(701,'Puerto Gait??n'),(702,'Puerto Guzm??n'),(703,'Puerto Legu??zamo'),(704,'Puerto Libertador'),(705,'Puerto Lleras'),(706,'Puerto L??pez'),(707,'Puerto Nare'),(708,'Puerto Nari??o'),(709,'Puerto Parra'),(710,'Puerto Rico'),(711,'Puerto Rico'),(712,'Puerto Rond??n'),(713,'Puerto Salgar'),(714,'Puerto Santander'),(715,'Puerto Tejada'),(716,'Puerto Triunfo'),(717,'Puerto Wilches'),(718,'Pul??'),(719,'Pupiales'),(720,'Purac?? (Coconuco)'),(721,'Purificaci??n'),(722,'Pur??sima'),(723,'P??cora'),(724,'P??ez'),(725,'P??ez (Belalcazar)'),(726,'P??ramo'),(727,'Quebradanegra'),(728,'Quetame'),(729,'Quibd??'),(730,'Quimbaya'),(731,'Quinch??a'),(732,'Quipama'),(733,'Quipile'),(734,'Ragonvalia'),(735,'Ramiriqu??'),(736,'Recetor'),(737,'Regidor'),(738,'Remedios'),(739,'Remolino'),(740,'Repel??n'),(741,'Restrepo'),(742,'Restrepo'),(743,'Retiro'),(744,'Ricaurte'),(745,'Ricaurte'),(746,'Rio Negro'),(747,'Rioblanco'),(748,'Riofr??o'),(749,'Riohacha'),(750,'Risaralda'),(751,'Rivera'),(752,'Roberto Pay??n (San Jos??)'),(753,'Roldanillo'),(754,'Roncesvalles'),(755,'Rond??n'),(756,'Rosas'),(757,'Rovira'),(758,'R??quira'),(759,'R??o Ir??'),(760,'R??o Quito'),(761,'R??o Sucio'),(762,'R??o Viejo'),(763,'R??o de oro'),(764,'R??onegro'),(765,'R??osucio'),(766,'Sabana de Torres'),(767,'Sabanagrande'),(768,'Sabanalarga'),(769,'Sabanalarga'),(770,'Sabanalarga'),(771,'Sabanas de San Angel (SAN ANGEL)'),(772,'Sabaneta'),(773,'Saboy??'),(774,'Sahag??n'),(775,'Saladoblanco'),(776,'Salamina'),(777,'Salamina'),(778,'Salazar'),(779,'Salda??a'),(780,'Salento'),(781,'Salgar'),(782,'Samac??'),(783,'Samaniego'),(784,'Saman??'),(785,'Sampu??s'),(786,'San Agust??n'),(787,'San Alberto'),(788,'San Andr??s'),(789,'San Andr??s Sotavento'),(790,'San Andr??s de Cuerqu??a'),(791,'San Antero'),(792,'San Antonio'),(793,'San Antonio de Tequendama'),(794,'San Benito'),(795,'San Benito Abad'),(796,'San Bernardo'),(797,'San Bernardo'),(798,'San Bernardo del Viento'),(799,'San Calixto'),(800,'San Carlos'),(801,'San Carlos'),(802,'San Carlos de Guaroa'),(803,'San Cayetano'),(804,'San Cayetano'),(805,'San Cristobal'),(806,'San Diego'),(807,'San Eduardo'),(808,'San Estanislao'),(809,'San Fernando'),(810,'San Francisco'),(811,'San Francisco'),(812,'San Francisco'),(813,'San G??l'),(814,'San Jacinto'),(815,'San Jacinto del Cauca'),(816,'San Jer??nimo'),(817,'San Joaqu??n'),(818,'San Jos??'),(819,'San Jos?? de Miranda'),(820,'San Jos?? de Monta??a'),(821,'San Jos?? de Pare'),(822,'San Jos?? de Ur??'),(823,'San Jos?? del Fragua'),(824,'San Jos?? del Guaviare'),(825,'San Jos?? del Palmar'),(826,'San Juan de Arama'),(827,'San Juan de Betulia'),(828,'San Juan de Nepomuceno'),(829,'San Juan de Pasto'),(830,'San Juan de R??o Seco'),(831,'San Juan de Urab??'),(832,'San Juan del Cesar'),(833,'San Juanito'),(834,'San Lorenzo'),(835,'San Luis'),(836,'San Lu??s'),(837,'San Lu??s de Gaceno'),(838,'San Lu??s de Palenque'),(839,'San Marcos'),(840,'San Mart??n'),(841,'San Mart??n'),(842,'San Mart??n de Loba'),(843,'San Mateo'),(844,'San Miguel'),(845,'San Miguel'),(846,'San Miguel de Sema'),(847,'San Onofre'),(848,'San Pablo'),(849,'San Pablo'),(850,'San Pablo de Borbur'),(851,'San Pedro'),(852,'San Pedro'),(853,'San Pedro'),(854,'San Pedro de Cartago'),(855,'San Pedro de Urab??'),(856,'San Pelayo'),(857,'San Rafael'),(858,'San Roque'),(859,'San Sebasti??n'),(860,'San Sebasti??n de Buenavista'),(861,'San Vicente'),(862,'San Vicente del Cagu??n'),(863,'San Vicente del Chucur??'),(864,'San Zen??n'),(865,'Sandon??'),(866,'Santa Ana'),(867,'Santa B??rbara'),(868,'Santa B??rbara'),(869,'Santa B??rbara (Iscuand??)'),(870,'Santa B??rbara de Pinto'),(871,'Santa Catalina'),(872,'Santa F?? de Antioquia'),(873,'Santa Genoveva de Docorod??'),(874,'Santa Helena del Op??n'),(875,'Santa Isabel'),(876,'Santa Luc??a'),(877,'Santa Marta'),(878,'Santa Mar??a'),(879,'Santa Mar??a'),(880,'Santa Rosa'),(881,'Santa Rosa'),(882,'Santa Rosa de Cabal'),(883,'Santa Rosa de Osos'),(884,'Santa Rosa de Viterbo'),(885,'Santa Rosa del Sur'),(886,'Santa Rosal??a'),(887,'Santa Sof??a'),(888,'Santana'),(889,'Santander de Quilichao'),(890,'Santiago'),(891,'Santiago'),(892,'Santo Domingo'),(893,'Santo Tom??s'),(894,'Santuario'),(895,'Santuario'),(896,'Sapuyes'),(897,'Saravena'),(898,'Sardinata'),(899,'Sasaima'),(900,'Sativanorte'),(901,'Sativasur'),(902,'Segovia'),(903,'Sesquil??'),(904,'Sevilla'),(905,'Siachoque'),(906,'Sibat??'),(907,'Sibundoy'),(908,'Silos'),(909,'Silvania'),(910,'Silvia'),(911,'Simacota'),(912,'Simijaca'),(913,'Simit??'),(914,'Sincelejo'),(915,'Sinc??'),(916,'Sip??'),(917,'Sitionuevo'),(918,'Soacha'),(919,'Soat??'),(920,'Socha'),(921,'Socorro'),(922,'Socot??'),(923,'Sogamoso'),(924,'Solano'),(925,'Soledad'),(926,'Solita'),(927,'Somondoco'),(928,'Sons??n'),(929,'Sopetr??n'),(930,'Soplaviento'),(931,'Sop??'),(932,'Sora'),(933,'Sorac??'),(934,'Sotaquir??'),(935,'Sotara (Paispamba)'),(936,'Sotomayor (Los Andes)'),(937,'Suaita'),(938,'Suan'),(939,'Suaza'),(940,'Subachoque'),(941,'Sucre'),(942,'Sucre'),(943,'Sucre'),(944,'Suesca'),(945,'Supat??'),(946,'Sup??a'),(947,'Surat??'),(948,'Susa'),(949,'Susac??n'),(950,'Sutamarch??n'),(951,'Sutatausa'),(952,'Sutatenza'),(953,'Su??rez'),(954,'Su??rez'),(955,'S??cama'),(956,'S??chica'),(957,'Tabio'),(958,'Tad??'),(959,'Talaigua Nuevo'),(960,'Tamalameque'),(961,'Tame'),(962,'Taminango'),(963,'Tangua'),(964,'Taraira'),(965,'Taraz??'),(966,'Tarqui'),(967,'Tarso'),(968,'Tasco'),(969,'Tauramena'),(970,'Tausa'),(971,'Tello'),(972,'Tena'),(973,'Tenerife'),(974,'Tenjo'),(975,'Tenza'),(976,'Teorama'),(977,'Teruel'),(978,'Tesalia'),(979,'Tibacuy'),(980,'Tiban??'),(981,'Tibasosa'),(982,'Tibirita'),(983,'Tib??'),(984,'Tierralta'),(985,'Timan??'),(986,'Timbiqu??'),(987,'Timb??o'),(988,'Tinjac??'),(989,'Tipacoque'),(990,'Tiquisio (Puerto Rico)'),(991,'Titirib??'),(992,'Toca'),(993,'Tocaima'),(994,'Tocancip??'),(995,'Togu??'),(996,'Toledo'),(997,'Toledo'),(998,'Tol??'),(999,'Tol?? Viejo'),(1000,'Tona'),(1001,'Topag??'),(1002,'Topaip??'),(1003,'Torib??o'),(1004,'Toro'),(1005,'Tota'),(1006,'Totor??'),(1007,'Trinidad'),(1008,'Trujillo'),(1009,'Tubar??'),(1010,'Tuch??n'),(1011,'Tul??a'),(1012,'Tumaco'),(1013,'Tunja'),(1014,'Tunungua'),(1015,'Turbaco'),(1016,'Turban??'),(1017,'Turbo'),(1018,'Turmequ??'),(1019,'Tuta'),(1020,'Tutas??'),(1021,'T??mara'),(1022,'T??mesis'),(1023,'T??querres'),(1024,'Ubal??'),(1025,'Ubaque'),(1026,'Ubat??'),(1027,'Ulloa'),(1028,'Une'),(1029,'Ungu??a'),(1030,'Uni??n Panamericana (??NIMAS)'),(1031,'Uramita'),(1032,'Uribe'),(1033,'Uribia'),(1034,'Urrao'),(1035,'Urumita'),(1036,'Usiacuri'),(1037,'Valdivia'),(1038,'Valencia'),(1039,'Valle de San Jos??'),(1040,'Valle de San Juan'),(1041,'Valle del Guamuez'),(1042,'Valledupar'),(1043,'Valparaiso'),(1044,'Valparaiso'),(1045,'Vegach??'),(1046,'Venadillo'),(1047,'Venecia'),(1048,'Venecia (Ospina P??rez)'),(1049,'Ventaquemada'),(1050,'Vergara'),(1051,'Versalles'),(1052,'Vetas'),(1053,'Viani'),(1054,'Vig??a del Fuerte'),(1055,'Vijes'),(1056,'Villa Caro'),(1057,'Villa Rica'),(1058,'Villa de Leiva'),(1059,'Villa del Rosario'),(1060,'Villagarz??n'),(1061,'Villag??mez'),(1062,'Villahermosa'),(1063,'Villamar??a'),(1064,'Villanueva'),(1065,'Villanueva'),(1066,'Villanueva'),(1067,'Villanueva'),(1068,'Villapinz??n'),(1069,'Villarrica'),(1070,'Villavicencio'),(1071,'Villavieja'),(1072,'Villeta'),(1073,'Viot??'),(1074,'Viracach??'),(1075,'Vista Hermosa'),(1076,'Viterbo'),(1077,'V??lez'),(1078,'Yacop??'),(1079,'Yacuanquer'),(1080,'Yaguar??'),(1081,'Yal??'),(1082,'Yarumal'),(1083,'Yolomb??'),(1084,'Yond?? (Casabe)'),(1085,'Yopal'),(1086,'Yotoco'),(1087,'Yumbo'),(1088,'Zambrano'),(1089,'Zapatoca'),(1090,'Zapay??n (PUNTA DE PIEDRAS)'),(1091,'Zaragoza'),(1092,'Zarzal'),(1093,'Zetaquir??'),(1094,'Zipac??n'),(1095,'Zipaquir??'),(1096,'Zona Bananera (PRADO - SEVILLA)'),(1097,'??brego'),(1098,'??quira'),(1099,'??mbita'),(1100,'??tica');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfiles` (
  `perfil_id` int NOT NULL AUTO_INCREMENT,
  `nombre` enum('ADMIN','VENDEDOR') NOT NULL,
  PRIMARY KEY (`perfil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_proveedor`
--

DROP TABLE IF EXISTS `producto_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto_proveedor` (
  `producto_codigo` int NOT NULL,
  `proveedor_documento` int NOT NULL,
  PRIMARY KEY (`producto_codigo`,`proveedor_documento`),
  KEY `fk_producto_proveedor_productos1_idx` (`producto_codigo`),
  KEY `fk_producto_proveedor_proveedores1_idx` (`proveedor_documento`),
  CONSTRAINT `fk_producto_proveedor_productos1` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`producto_codigo`),
  CONSTRAINT `fk_producto_proveedor_proveedores1` FOREIGN KEY (`proveedor_documento`) REFERENCES `proveedores` (`proveedor_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_proveedor`
--

LOCK TABLES `producto_proveedor` WRITE;
/*!40000 ALTER TABLE `producto_proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `producto_codigo` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `costo` float NOT NULL,
  `saldoBodega` int NOT NULL,
  `cantidadMinima` int NOT NULL,
  `cantidadMaxima` int NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria_id` int unsigned NOT NULL,
  PRIMARY KEY (`producto_codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`producto_codigo`),
  KEY `fk_categorias_id_categoria_idx` (`categoria_id`),
  CONSTRAINT `fk_categorias_id_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `proveedor_documento` int NOT NULL,
  `tipoPersona` enum('NATURAL','JURIDICA') NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `municipio_id` int unsigned DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`proveedor_documento`),
  UNIQUE KEY `documento_UNIQUE` (`proveedor_documento`),
  KEY `fk_proveedor_monicipio_idx` (`municipio_id`),
  CONSTRAINT `fk_proveedor_monicipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`municipio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usuario_documento` int NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `contrasena` varchar(256) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `perfil_id` int NOT NULL,
  PRIMARY KEY (`usuario_documento`),
  UNIQUE KEY `documento_UNIQUE` (`usuario_documento`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  KEY `fk_usuario_perfil_idx` (`perfil_id`),
  CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`perfil_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-04 21:01:49
