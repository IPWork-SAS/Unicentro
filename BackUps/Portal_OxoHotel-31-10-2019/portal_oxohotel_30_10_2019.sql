USE portal_oxohotel;

-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: portal_oxohotel
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Id_Ciudad_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'Cartagena','Hotel Marriot en Cartagena','2019-10-23 02:11:19');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_locacion` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ano_evento` int(11) DEFAULT NULL,
  `campania` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_locacion` (`id_locacion`),
  CONSTRAINT `id_locacion` FOREIGN KEY (`id_locacion`) REFERENCES `locaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,1,'Publicidad_A','Portal cautivo que cuenta con un banner con publicidad','2019-10-23 02:13:38','2019-10-31 02:13:38','2019-10-24 15:02:02',2019,'publicidad_a_2019_campania'),(2,1,'Publicidad_B','Portal cautivo que cuenta con un banner con publicidad y un formulario de registro','2019-10-23 02:13:38','2019-10-31 02:13:38','2019-10-24 15:02:02',2019,'publicidad_b_2019_campania');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locaciones`
--

DROP TABLE IF EXISTS `locaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `locaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`id_ciudad`),
  CONSTRAINT `id` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locaciones`
--

LOCK TABLES `locaciones` WRITE;
/*!40000 ALTER TABLE `locaciones` DISABLE KEYS */;
INSERT INTO `locaciones` VALUES (1,1,'Hotel AC Cartagena','Hotel AC Cartagena','2019-10-23 02:13:38');
/*!40000 ALTER TABLE `locaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_esp` varchar(250) DEFAULT NULL,
  `nombre_en` varchar(250) DEFAULT NULL,
  `nombre_fr` varchar(250) DEFAULT NULL,
  `iso2` varchar(45) DEFAULT NULL,
  `iso3` varchar(45) DEFAULT NULL,
  `indicativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'Afganistán','Afghanistan','Afghanistan','AF','AFG',93),(2,'Albania','Albania','Albanie','AL','ALB',355),(3,'Alemania','Germany','Allemagne','DE','DEU',49),(4,'Algeria','Algeria','Algérie','DZ','DZA',213),(5,'Andorra','Andorra','Andorra','AD','AND',376),(6,'Angola','Angola','Angola','AO','AGO',244),(7,'Antártida','Antarctica','L\'Antarctique','AQ','ATA',672),(8,'Arabia Saudita','Saudi Arabia','Arabie Saoudite','SA','SAU',966),(9,'Argentina','Argentina','Argentine','AR','ARG',54),(10,'Armenia','Armenia','L\'Arménie','AM','ARM',374),(11,'Aruba','Aruba','Aruba','AW','ABW',297),(12,'Australia','Australia','Australie','AU','AUS',61),(13,'Austria','Austria','Autriche','AT','AUT',43),(14,'Azerbaiyán','Azerbaijan','L\'Azerbaïdjan','AZ','AZE',994),(15,'Bélgica','Belgium','Belgique','BE','BEL',32),(16,'Bahrein','Bahrain','Bahreïn','BH','BHR',973),(17,'Bangladesh','Bangladesh','Bangladesh','BD','BGD',880),(18,'Belice','Belize','Belize','BZ','BLZ',501),(19,'Benín','Benin','Bénin','BJ','BEN',229),(20,'Bhután','Bhutan','Le Bhoutan','BT','BTN',975),(21,'Bielorrusia','Belarus','Biélorussie','BY','BLR',375),(22,'Birmania','Myanmar','Myanmar','MM','MMR',95),(23,'Bolivia','Bolivia','Bolivie','BO','BOL',591),(24,'Bosnia y Herzegovina','Bosnia and Herzegovina','Bosnie-Herzégovine','BA','BIH',387),(25,'Botsuana','Botswana','Botswana','BW','BWA',267),(26,'Brasil','Brazil','Brésil','BR','BRA',55),(27,'Brunéi','Brunei','Brunei','BN','BRN',673),(28,'Bulgaria','Bulgaria','Bulgarie','BG','BGR',359),(29,'Burkina Faso','Burkina Faso','Burkina Faso','BF','BFA',226),(30,'Burundi','Burundi','Burundi','BI','BDI',257),(31,'Cabo Verde','Cape Verde','Cap-Vert','CV','CPV',238),(32,'Camboya','Cambodia','Cambodge','KH','KHM',855),(33,'Camerún','Cameroon','Cameroun','CM','CMR',237),(34,'Canadá','Canada','Canada','CA','CAN',1),(35,'Chad','Chad','Tchad','TD','TCD',235),(36,'Chile','Chile','Chili','CL','CHL',56),(37,'China','China','Chine','CN','CHN',86),(38,'Chipre','Cyprus','Chypre','CY','CYP',357),(39,'Ciudad del Vaticano','Vatican City State','Cité du Vatican','VA','VAT',39),(40,'Colombia','Colombia','Colombie','CO','COL',57),(41,'Comoras','Comoros','Comores','KM','COM',269),(42,'República del Congo','Republic of the Congo','République du Congo','CG','COG',242),(43,'República Democrática del Congo','Democratic Republic of the Congo','République démocratique du Congo','CD','COD',243),(44,'Corea del Norte','North Korea','Corée du Nord','KP','PRK',850),(45,'Corea del Sur','South Korea','Corée du Sud','KR','KOR',82),(46,'Costa de Marfil','Ivory Coast','Côte-d\'Ivoire','CI','CIV',225),(47,'Costa Rica','Costa Rica','Costa Rica','CR','CRI',506),(48,'Croacia','Croatia','Croatie','HR','HRV',385),(49,'Cuba','Cuba','Cuba','CU','CUB',53),(50,'Curazao','Curaçao','Curaçao','CW','CWU',5999),(51,'Dinamarca','Denmark','Danemark','DK','DNK',45),(52,'Ecuador','Ecuador','Equateur','EC','ECU',593),(53,'Egipto','Egypt','Egypte','EG','EGY',20),(54,'El Salvador','El Salvador','El Salvador','SV','SLV',503),(55,'Emiratos Árabes Unidos','United Arab Emirates','Emirats Arabes Unis','AE','ARE',971),(56,'Eritrea','Eritrea','Erythrée','ER','ERI',291),(57,'Eslovaquia','Slovakia','Slovaquie','SK','SVK',421),(58,'Eslovenia','Slovenia','Slovénie','SI','SVN',386),(59,'España','Spain','Espagne','ES','ESP',34),(60,'Estados Unidos de América','United States of America','États-Unis d\'Amérique','US','USA',1),(61,'Estonia','Estonia','L\'Estonie','EE','EST',372),(62,'Etiopía','Ethiopia','Ethiopie','ET','ETH',251),(63,'Filipinas','Philippines','Philippines','PH','PHL',63),(64,'Finlandia','Finland','Finlande','FI','FIN',358),(65,'Fiyi','Fiji','Fidji','FJ','FJI',679),(66,'Francia','France','France','FR','FRA',33),(67,'Gabón','Gabon','Gabon','GA','GAB',241),(68,'Gambia','Gambia','Gambie','GM','GMB',220),(69,'Georgia','Georgia','Géorgie','GE','GEO',995),(70,'Ghana','Ghana','Ghana','GH','GHA',233),(71,'Gibraltar','Gibraltar','Gibraltar','GI','GIB',350),(72,'Grecia','Greece','Grèce','GR','GRC',30),(73,'Groenlandia','Greenland','Groenland','GL','GRL',299),(74,'Guatemala','Guatemala','Guatemala','GT','GTM',502),(75,'Guinea','Guinea','Guinée','GN','GIN',224),(76,'Guinea Ecuatorial','Equatorial Guinea','Guinée Equatoriale','GQ','GNQ',240),(77,'Guinea-Bissau','Guinea-Bissau','Guinée-Bissau','GW','GNB',245),(78,'Guyana','Guyana','Guyane','GY','GUY',592),(79,'Haití','Haiti','Haïti','HT','HTI',509),(80,'Honduras','Honduras','Honduras','HN','HND',504),(81,'Hong kong','Hong Kong','Hong Kong','HK','HKG',852),(82,'Hungría','Hungary','Hongrie','HU','HUN',36),(83,'India','India','Inde','IN','IND',91),(84,'Indonesia','Indonesia','Indonésie','ID','IDN',62),(85,'Irán','Iran','Iran','IR','IRN',98),(86,'Irak','Iraq','Irak','IQ','IRQ',964),(87,'Irlanda','Ireland','Irlande','IE','IRL',353),(88,'Isla de Man','Isle of Man','Ile de Man','IM','IMN',44),(89,'Isla de Navidad','Christmas Island','Christmas Island','CX','CXR',61),(90,'Islandia','Iceland','Islande','IS','ISL',354),(91,'Islas Cocos (Keeling)','Cocos (Keeling) Islands','Cocos (Keeling','CC','CCK',61),(92,'Islas Cook','Cook Islands','Iles Cook','CK','COK',682),(93,'Islas Feroe','Faroe Islands','Iles Féro','FO','FRO',298),(94,'Islas Maldivas','Maldives','Maldives','MV','MDV',960),(95,'Islas Malvinas','Falkland Islands (Malvinas)','Iles Falkland (Malvinas','FK','FLK',500),(96,'Islas Marshall','Marshall Islands','Iles Marshall','MH','MHL',692),(97,'Islas Pitcairn','Pitcairn Islands','Iles Pitcairn','PN','PCN',870),(98,'Islas Salomón','Solomon Islands','Iles Salomon','SB','SLB',677),(99,'Israel','Israel','Israël','IL','ISR',972),(100,'Italia','Italy','Italie','IT','ITA',39),(101,'Japón','Japan','Japon','JP','JPN',81),(102,'Jordania','Jordan','Jordan','JO','JOR',962),(103,'Kazajistán','Kazakhstan','Le Kazakhstan','KZ','KAZ',7),(104,'Kenia','Kenya','Kenya','KE','KEN',254),(105,'Kirguistán','Kyrgyzstan','Kirghizstan','KG','KGZ',996),(106,'Kiribati','Kiribati','Kiribati','KI','KIR',686),(107,'Kuwait','Kuwait','Koweït','KW','KWT',965),(108,'Líbano','Lebanon','Liban','LB','LBN',961),(109,'Laos','Laos','Laos','LA','LAO',856),(110,'Lesoto','Lesotho','Lesotho','LS','LSO',266),(111,'Letonia','Latvia','La Lettonie','LV','LVA',371),(112,'Liberia','Liberia','Liberia','LR','LBR',231),(113,'Libia','Libya','Libye','LY','LBY',218),(114,'Liechtenstein','Liechtenstein','Liechtenstein','LI','LIE',423),(115,'Lituania','Lithuania','La Lituanie','LT','LTU',370),(116,'Luxemburgo','Luxembourg','Luxembourg','LU','LUX',352),(117,'México','Mexico','Mexique','MX','MEX',52),(118,'Mónaco','Monaco','Monaco','MC','MCO',377),(119,'Macao','Macao','Macao','MO','MAC',853),(120,'Macedônia','Macedonia','Macédoine','MK','MKD',389),(121,'Madagascar','Madagascar','Madagascar','MG','MDG',261),(122,'Malasia','Malaysia','Malaisie','MY','MYS',60),(123,'Malawi','Malawi','Malawi','MW','MWI',265),(124,'Mali','Mali','Mali','ML','MLI',223),(125,'Malta','Malta','Malte','MT','MLT',356),(126,'Marruecos','Morocco','Maroc','MA','MAR',212),(127,'Mauricio','Mauritius','Iles Maurice','MU','MUS',230),(128,'Mauritania','Mauritania','Mauritanie','MR','MRT',222),(129,'Mayotte','Mayotte','Mayotte','YT','MYT',262),(130,'Micronesia','Estados Federados de','Federados Estados de','FM','FSM',691),(131,'Moldavia','Moldova','Moldavie','MD','MDA',373),(132,'Mongolia','Mongolia','Mongolie','MN','MNG',976),(133,'Montenegro','Montenegro','Monténégro','ME','MNE',382),(134,'Mozambique','Mozambique','Mozambique','MZ','MOZ',258),(135,'Namibia','Namibia','Namibie','NA','NAM',264),(136,'Nauru','Nauru','Nauru','NR','NRU',674),(137,'Nepal','Nepal','Népal','NP','NPL',977),(138,'Nicaragua','Nicaragua','Nicaragua','NI','NIC',505),(139,'Niger','Niger','Niger','NE','NER',227),(140,'Nigeria','Nigeria','Nigeria','NG','NGA',234),(141,'Niue','Niue','Niou','NU','NIU',683),(142,'Noruega','Norway','Norvège','NO','NOR',47),(143,'Nueva Caledonia','New Caledonia','Nouvelle-Calédonie','NC','NCL',687),(144,'Nueva Zelanda','New Zealand','Nouvelle-Zélande','NZ','NZL',64),(145,'Omán','Oman','Oman','OM','OMN',968),(146,'Países Bajos','Netherlands','Pays-Bas','NL','NLD',31),(147,'Pakistán','Pakistan','Pakistan','PK','PAK',92),(148,'Palau','Palau','Palau','PW','PLW',680),(149,'Panamá','Panama','Panama','PA','PAN',507),(150,'Papúa Nueva Guinea','Papua New Guinea','Papouasie-Nouvelle-Guinée','PG','PNG',675),(151,'Paraguay','Paraguay','Paraguay','PY','PRY',595),(152,'Perú','Peru','Pérou','PE','PER',51),(153,'Polinesia Francesa','French Polynesia','Polynésie française','PF','PYF',689),(154,'Polonia','Poland','Pologne','PL','POL',48),(155,'Portugal','Portugal','Portugal','PT','PRT',351),(156,'Puerto Rico','Puerto Rico','Porto Rico','PR','PRI',1),(157,'Qatar','Qatar','Qatar','QA','QAT',974),(158,'Reino Unido','United Kingdom','Royaume-Uni','GB','GBR',44),(159,'República Centroafricana','Central African Republic','République Centrafricaine','CF','CAF',236),(160,'República Checa','Czech Republic','République Tchèque','CZ','CZE',420),(161,'República de Sudán del Sur','South Sudan','Soudan du Sud','SS','SSD',211),(162,'Ruanda','Rwanda','Rwanda','RW','RWA',250),(163,'Rumanía','Romania','Roumanie','RO','ROU',40),(164,'Rusia','Russia','La Russie','RU','RUS',7),(165,'Samoa','Samoa','Samoa','WS','WSM',685),(166,'San Bartolomé','Saint Barthélemy','Saint-Barthélemy','BL','BLM',590),(167,'San Marino','San Marino','San Marino','SM','SMR',378),(168,'San Pedro y Miquelón','Saint Pierre and Miquelon','Saint-Pierre-et-Miquelon','PM','SPM',508),(169,'Santa Elena','Ascensión y Tristán de Acuña','Ascensión y Tristan de Acuña','SH','SHN',290),(170,'Santo Tomé y Príncipe','Sao Tome and Principe','Sao Tomé et Principe','ST','STP',239),(171,'Senegal','Senegal','Sénégal','SN','SEN',221),(172,'Serbia','Serbia','Serbie','RS','SRB',381),(173,'Seychelles','Seychelles','Les Seychelles','SC','SYC',248),(174,'Sierra Leona','Sierra Leone','Sierra Leone','SL','SLE',232),(175,'Singapur','Singapore','Singapour','SG','SGP',65),(176,'Siria','Syria','Syrie','SY','SYR',963),(177,'Somalia','Somalia','Somalie','SO','SOM',252),(178,'Sri lanka','Sri Lanka','Sri Lanka','LK','LKA',94),(179,'Sudáfrica','South Africa','Afrique du Sud','ZA','ZAF',27),(180,'Sudán','Sudan','Soudan','SD','SDN',249),(181,'Suecia','Sweden','Suède','SE','SWE',46),(182,'Suiza','Switzerland','Suisse','CH','CHE',41),(183,'Surinám','Suriname','Surinam','SR','SUR',597),(184,'Swazilandia','Swaziland','Swaziland','SZ','SWZ',268),(185,'Tayikistán','Tajikistan','Le Tadjikistan','TJ','TJK',992),(186,'Tailandia','Thailand','Thaïlande','TH','THA',66),(187,'Taiwán','Taiwan','Taiwan','TW','TWN',886),(188,'Tanzania','Tanzania','Tanzanie','TZ','TZA',255),(189,'Timor Oriental','East Timor','Timor-Oriental','TL','TLS',670),(190,'Togo','Togo','Togo','TG','TGO',228),(191,'Tokelau','Tokelau','Tokélaou','TK','TKL',690),(192,'Tonga','Tonga','Tonga','TO','TON',676),(193,'Tunez','Tunisia','Tunisie','TN','TUN',216),(194,'Turkmenistán','Turkmenistan','Le Turkménistan','TM','TKM',993),(195,'Turquía','Turkey','Turquie','TR','TUR',90),(196,'Tuvalu','Tuvalu','Tuvalu','TV','TUV',688),(197,'Ucrania','Ukraine','L\'Ukraine','UA','UKR',380),(198,'Uganda','Uganda','Ouganda','UG','UGA',256),(199,'Uruguay','Uruguay','Uruguay','UY','URY',598),(200,'Uzbekistán','Uzbekistan','L\'Ouzbékistan','UZ','UZB',998),(201,'Vanuatu','Vanuatu','Vanuatu','VU','VUT',678),(202,'Venezuela','Venezuela','Venezuela','VE','VEN',58),(203,'Vietnam','Vietnam','Vietnam','VN','VNM',84),(204,'Wallis y Futuna','Wallis and Futuna','Wallis et Futuna','WF','WLF',681),(205,'Yemen','Yemen','Yémen','YE','YEM',967),(206,'Yibuti','Djibouti','Djibouti','DJ','DJI',253),(207,'Zambia','Zambia','Zambie','ZM','ZMB',260),(208,'Zimbabue','Zimbabwe','Zimbabwe','ZW','ZWE',263);
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicidad_a_2019_campania`
--

DROP TABLE IF EXISTS `publicidad_a_2019_campania`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `publicidad_a_2019_campania` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_evento` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `edad` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `ssid` varchar(250) DEFAULT NULL,
  `mac_cliente` varchar(250) DEFAULT NULL,
  `ip_cliente` varchar(250) DEFAULT NULL,
  `ip_ap` varchar(250) DEFAULT NULL,
  `mac_ap` varchar(250) DEFAULT NULL,
  `id_pais` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicidad_a_2019_campania`
--

LOCK TABLES `publicidad_a_2019_campania` WRITE;
/*!40000 ALTER TABLE `publicidad_a_2019_campania` DISABLE KEYS */;
INSERT INTO `publicidad_a_2019_campania` VALUES (1,1,'2019-10-24 11:37:31','Juan David pachon Suzunaga','juan.suzunaga@gmail.com','32','3223650805','Mujer','Android','Test_R','34e12d43a922','10.165.0.16','10.165.0.8',NULL,NULL),(2,1,'2019-10-25 11:56:10','Juan david','juan.suzunaga@email.com','21','3223650805','Hombre','Windows','oxohotel_1','30074d8595f0','192.168.0.12','192.168.0.23','60d02c2d04f0',NULL),(3,1,'0000-00-00 00:00:00','Soporte','soport@soporte.com','66','2131472580','Hombre','MacOS','oxohotel_1','d0c5f3c5da5a','192.168.0.14','192.168.0.23','60d02c2d04f0',NULL),(4,1,'2019-10-24 11:57:59','Hola','hoq@gsjd.xon','77','2312536325','Hombre','Windows','oxohotel_1','d0c5f3c5da5a','192.168.0.14','192.168.0.23','60d02c2d04f0',NULL),(5,1,'2019-10-25 12:00:32','Juan','juan.suzunaga@gmail.com','23','2345678654321','Hombre','Windows','oxohotel_1','34e12d43a922','192.168.0.13','192.168.0.23','60d02c2d04f0',NULL),(6,1,'2019-10-24 12:31:33','Hola','ge@gsjd.com','66','3214569807','Mujer','Android','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0',NULL),(7,1,'2019-10-30 02:47:20','Gerardo Mendoza','ger@correo.com.co','34','1231234565','Hombre','MacOS','oxohotel_1','34e12d43a922','192.168.0.13','192.168.0.23','60d02c2d04f0',NULL),(8,1,'2019-10-24 02:48:16','Gerardp Mendoza','ger@correo.com','32','32222121212','Hombre','Windows','oxohotel_1','34e12d43a922','192.168.0.13','192.168.0.23','60d02c2d04f0',NULL),(9,1,'2019-10-31 02:49:16','Gerardo Mendoza','ger@correo.com','35','3445633432','Hombre','Windows','oxohotel_1','34e12d43a922','192.168.0.13','192.168.0.23','60d02c2d04f0',NULL),(10,1,'2019-10-24 05:11:39','sdjflsd sdjfsdkjf','sdsds@gmail.com','34','3156726860','Otro','Linux','','','','','',NULL),(11,1,'2019-10-28 09:24:21','Juan David','juan.suzunaga@gmail.com','30','3223650805','Hombre','MacOS','oxohotel_1','34e12d43a922','192.168.0.11','192.168.0.13','60d02c2d04f0',NULL),(12,1,'2019-10-28 04:25:30','Juan','juan.suzunaga@gmail.com','23','1234567654321','Mujer','Android','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0',NULL),(13,1,'2019-10-30 03:17:30','','','','','','','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0',NULL),(14,1,'2019-10-30 03:18:45','','','','','','','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0',NULL),(15,1,'2019-10-30 03:21:34','pedro','pepe@hotmail.com','12','12345234124','Mujer','','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0',NULL),(16,1,'2019-10-30 03:44:32','Juan David','juan.suzunaga@gmail.com','12','123456712345','Hombre','Windows','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0',NULL),(17,1,'2019-10-30 03:53:03','Juan David','juan.suzunaga@gmail.com','12','1234567890\'¿\'0987654','Hombre','Windows','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0','1'),(18,1,'2019-10-30 03:53:28','QWERTY','juan.suzunaga@gmail.com','12','23452345676543','Hombre','Windows','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0','1'),(19,1,'2019-10-30 03:54:08','Juan David','juan.suzunaga@gmail.com','32','12345623452','Hombre','Windows','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0','2'),(20,1,'2019-10-30 03:58:57','Juan David','juan.suzunaga@gmail.com','12','2345|1234567890\'','Hombre','Windows','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0','1'),(21,1,'2019-10-30 04:01:06','Juan David','juan.suzunaga@gmail.com','23','1234567812','Hombre','Windows','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0','1'),(22,1,'2019-10-30 06:32:39','Jorge Eduardo','jpqjp@com','34','3223453456','Hombre','Otro','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0','10');
/*!40000 ALTER TABLE `publicidad_a_2019_campania` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicidad_b_2019_campania`
--

DROP TABLE IF EXISTS `publicidad_b_2019_campania`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `publicidad_b_2019_campania` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_evento` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ssid` varchar(250) DEFAULT NULL,
  `mac_cliente` varchar(250) DEFAULT NULL,
  `ip_cliente` varchar(250) DEFAULT NULL,
  `ip_ap` varchar(250) DEFAULT NULL,
  `mac_ap` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicidad_b_2019_campania`
--

LOCK TABLES `publicidad_b_2019_campania` WRITE;
/*!40000 ALTER TABLE `publicidad_b_2019_campania` DISABLE KEYS */;
INSERT INTO `publicidad_b_2019_campania` VALUES (1,1,'2019-10-24 10:19:09','Test_R','34e12d43a922','10.165.0.16','10.165.0.8',NULL),(2,1,'2019-10-25 10:25:44','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0'),(3,1,'2019-10-30 11:36:21','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0'),(4,1,'2019-10-25 11:39:59','Test_R','34e12d43a922','10.165.0.16','10.165.0.8','60d02c2d04f0'),(5,1,'2019-10-24 11:58:36','oxohotel_2','30074d8595f0','192.168.0.12','192.168.0.23','60d02c2d04f0'),(6,1,'2019-10-28 11:59:29','oxohotel_2','d0c5f3c5da5a','192.168.0.14','192.168.0.23','60d02c2d04f0'),(7,1,'2019-10-24 12:01:43','oxohotel_2','34e12d43a922','192.168.0.13','192.168.0.23','60d02c2d04f0'),(8,1,'2019-10-31 12:04:28','oxohotel_2','30074d8595f0','192.168.0.12','192.168.0.23','60d02c2d04f0'),(9,1,'2019-10-24 12:05:33','oxohotel_2','30074d8595f0','192.168.0.12','192.168.0.23','60d02c2d04f0'),(10,1,'2019-10-25 12:07:28','oxohotel_2','34e12d43a922','192.168.0.13','192.168.0.23','60d02c2d04f0'),(11,1,'2019-10-24 12:11:04','oxohotel_2','30074d8595f0','192.168.0.12','192.168.0.23','60d02c2d04f0'),(12,1,'2019-10-31 12:12:35','oxohotel_2','d0c5f3c5da5a','192.168.0.14','192.168.0.23','60d02c2d04f0'),(13,1,'2019-10-24 02:51:40','oxohotel_2','34e12d43a922','192.168.0.13','192.168.0.23','60d02c2d04f0');
/*!40000 ALTER TABLE `publicidad_b_2019_campania` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_usuarios`
--

DROP TABLE IF EXISTS `roles_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_usuarios`
--

LOCK TABLES `roles_usuarios` WRITE;
/*!40000 ALTER TABLE `roles_usuarios` DISABLE KEYS */;
INSERT INTO `roles_usuarios` VALUES (1,'administrador','rol de super usuario, que permite el uso de la totalidad de caracteristicas de la plataforma','2019-08-18 12:03:36');
/*!40000 ALTER TABLE `roles_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','mauricio.pascuas@ipwork.com.co','admin','IPwork2019.',1,'2019-08-18 12:03:37');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'portal_oxohotel'
--

--
-- Dumping routines for database 'portal_oxohotel'
--
/*!50003 DROP PROCEDURE IF EXISTS `create_evento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_evento`(
	in id_locacion int,
	in nombre_evento varchar(250),
    in descripcion_evento varchar(1000),
    in ano_evento int,
    in fecha_inicio_evento datetime,
    in fecha_fin_evento datetime  
)
BEGIN	
	/*DEFINIMOS LAS VARIABLES INTERNAS*/
	DECLARE NOMBRE_CAMPANIA_EVENTO VARCHAR(250) DEFAULT '';
    
	/*INSERTAMOS EL EVENTO*/
	INSERT INTO eventos (
		id_locacion, 
        nombre, 
        descripcion, 
        ano_evento,
        fecha_inicio,
        fecha_fin) 
	VALUES (
		id_locacion,
        nombre_evento, 
        descripcion_evento,
        ano_evento,
        fecha_inicio_evento,
        fecha_fin_evento
	);
    
    /*CREAMOS LA CAMPAÑA, ESTOS DATOS POR EL MOMENTO ESTAN QUEMADOS */
    /*PERO CUANDO SE REALIZE EL CMS SE INGRESARIAN AL PROCEDIMIENTO */
    /*DEFINIMOS EL NOMBRE QUE TENDRA LA TABLA DE LA CAMPAÑA*/	
    SET NOMBRE_CAMPANIA_EVENTO = concat(nombre_evento, '_', ano_evento, '_campania');
    /*CREACION DE LA TABLA*/
    SET @QUERY_CREATE_TABLE = CONCAT(
		'CREATE TABLE ',
        NOMBRE_CAMPANIA_EVENTO,
		' (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `id_evento` bigint(20) NOT NULL,
		  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
		  `nombre` varchar(255) DEFAULT NULL,
		  `email` varchar(255) DEFAULT NULL,
		  `edad` varchar(255) DEFAULT NULL,
		  `telefono` varchar(255) DEFAULT NULL,
		  `genero` varchar(255) DEFAULT NULL,
		  `ssid` varchar(250) DEFAULT NULL,
		  `mac_cliente` varchar(250) DEFAULT NULL,
          `ip_cliente` varchar(250) DEFAULT NULL,
		  `ip_ap` varchar(250) DEFAULT NULL,
          `mac_ap` varchar(250) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		);'
    );
	 PREPARE QUERY_RESULT FROM @QUERY_CREATE_TABLE;
     EXECUTE QUERY_RESULT;
     DEALLOCATE PREPARE QUERY_RESULT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `create_evento_voucher` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_evento_voucher`(
	in id_locacion int,
	in nombre_evento varchar(250),
    in descripcion_evento varchar(1000),
    in ano_evento int,
    in fecha_inicio_evento datetime,
    in fecha_fin_evento datetime  
)
BEGIN	
	/*DEFINIMOS LAS VARIABLES INTERNAS*/
	DECLARE NOMBRE_CAMPANIA_EVENTO VARCHAR(250) DEFAULT '';
    
	/*INSERTAMOS EL EVENTO*/
	INSERT INTO eventos (
		id_locacion, 
        nombre, 
        descripcion, 
        ano_evento,
        fecha_inicio,
        fecha_fin) 
	VALUES (
		id_locacion,
        nombre_evento, 
        descripcion_evento,
        ano_evento,
        fecha_inicio_evento,
        fecha_fin_evento
	);
    
    /*CREAMOS LA CAMPAÑA, ESTOS DATOS POR EL MOMENTO ESTAN QUEMADOS */
    /*PERO CUANDO SE REALIZE EL CMS SE INGRESARIAN AL PROCEDIMIENTO */
    /*DEFINIMOS EL NOMBRE QUE TENDRA LA TABLA DE LA CAMPAÑA*/	
    SET NOMBRE_CAMPANIA_EVENTO = concat(nombre_evento, '_', ano_evento, '_campania');
    /*CREACION DE LA TABLA*/
    SET @QUERY_CREATE_TABLE = CONCAT(
		'CREATE TABLE ',
        NOMBRE_CAMPANIA_EVENTO,
		' (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `id_evento` bigint(20) NOT NULL,
		  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
		  `consecutivo` varchar(255) DEFAULT NULL,
		  `ssid` varchar(250) DEFAULT NULL,
		  `mac_cliente` varchar(250) DEFAULT NULL,
		  `nombre_ap` varchar(250) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		);'
    );
	 PREPARE QUERY_RESULT FROM @QUERY_CREATE_TABLE;
     EXECUTE QUERY_RESULT;
     DEALLOCATE PREPARE QUERY_RESULT;
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

-- Dump completed on 2019-10-30 18:33:52
