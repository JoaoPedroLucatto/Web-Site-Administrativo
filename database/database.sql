-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: foto
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `feedback` varchar(2000) DEFAULT NULL,
  `mostrar_feedback` tinyint(1) DEFAULT NULL,
  `id_statusregistro` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'João Pedro A Lucatto','teste@teste.com.br','admin','123','teste',1,3),(2,'REGINALDO SAVIAN','teste@gordo.com.br','admin2','123','teste2',0,1),(3,'TESTE','teste@teste.com.br','TESTE','$2y$10$iLu25jQUVKXf0dRfVfEbb./oUdMeEtQlyvCmVSLb0xj7UP8pyNQEi','teste',1,3),(4,'JOAO PEDRO','exemplo','JOAO','$2y$10$EtN.eeYS3.v7LxbCjXkPYOD3usbW2ctyVKmheJKMSt6NJwwnmhd1m','Aqui ficará todos os texto, que aparecerá na aba portfólio....... João Pedro, Avô, avó.....@#$%¨&*()',1,3),(5,'TESTE','testeee@teste.com.br','TESTE','$2y$10$LJjV9a80ZjQQDrbnq2jpKed5zGqar79Z50ztOcvFTI/EhedrewU8y','Top de mais!!!!',1,1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracoes`
--

DROP TABLE IF EXISTS `configuracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link_video_sobre` varchar(1000) DEFAULT NULL,
  `nome_sobre` varchar(100) DEFAULT NULL,
  `texto_sobre` varchar(500) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `end_logradouro` varchar(200) DEFAULT NULL,
  `end_numero` varchar(20) DEFAULT NULL,
  `end_bairro` varchar(100) DEFAULT NULL,
  `end_cidade` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracoes`
--

LOCK TABLES `configuracoes` WRITE;
/*!40000 ALTER TABLE `configuracoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `subtitulo_1` varchar(100) DEFAULT NULL,
  `subtitulo_2` varchar(100) DEFAULT NULL,
  `tipo_registro` tinyint(1) DEFAULT NULL,
  `cor_texto` tinyint(1) DEFAULT NULL,
  `posicao_texto` varchar(10) DEFAULT NULL,
  `id_statusregistro` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projetos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `datahorainclusao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_statusregistro` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos_clientes`
--

DROP TABLE IF EXISTS `projetos_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projetos_clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_projeto` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos_clientes`
--

LOCK TABLES `projetos_clientes` WRITE;
/*!40000 ALTER TABLE `projetos_clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `projetos_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_registros`
--

DROP TABLE IF EXISTS `status_registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_registros` (
  `id` int NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_registros`
--

LOCK TABLES `status_registros` WRITE;
/*!40000 ALTER TABLE `status_registros` DISABLE KEYS */;
INSERT INTO `status_registros` VALUES (1,'Ativo'),(2,'Inativo'),(3,'Excluído');
/*!40000 ALTER TABLE `status_registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(100) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `id_statusregistro` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'João Pedro A Lucatto','admin','1234',1),(2,'Reginaldo Savian','admin2','1234',1),(3,'TESTE','TESTE','$2y$10$bY/GkO8dKrd/LMzAkQMVGuMDKZIJ2MzMKobOShQxF.ZdSeGGsx.Wm',3),(4,'TESTE','TESTE',NULL,3),(5,'WILL','WILLL','$2y$10$4pJQzrNqDyVuyd61KtI.buqIHcQhfwc0z3FjmOiaysb2ESGkAvvDa',3),(6,'ADMIN4444','ADMIN','$2y$10$h0OwApHwqGUun4lWMJkz.OY93aGhH0l6wbRvIH3xeTOPwJtmj2rT2',3),(7,'TESTE','TESTE','$2y$10$LjBjzs0hHUjyI.KJPt1Z0.ikNMbLk8jPq7.pykKI4PgNRW4WfsJpG',3),(8,'TESTE','TESTE','$2y$10$.ojN8kx320cYKHBYnGLWtOWJWpCi15/MojBKrhUYM7gMKKGFihY1K',3),(9,'TESTE','TESTE','$2y$10$D8rhn/yqWrtR/4NrENclt.R87oLb3DmwA3tWLMn8JaS82bWZB/Vby',3),(10,'TESTE','TESTE','$2y$10$OrDxpB5fVcrl1zD.hw97U.YCpG.tgVbd9pVDRzB1TTrgFWaKWIu9m',3),(11,'TESTE','TESTE','$2y$10$CRKjvJu7t65o1Q9V5OJqOeUel4jyUa6X1hJJyEz84rxFdzgYnXopa',3),(12,'TESTE','TESTE','$2y$10$VY2qkDXRI17uJ7si4T2xROkXkYhA7b0AC9LUp7DXBfIDO.yHNLlfu',3),(13,'TESTE','TESTE','$2y$10$br0JyhmZQTwceIDscwBmc.6LQXEDNUyyibT12X5q7H87OnNtecjfi',3),(14,'TESTE','TESTE','$2y$10$q6VQcBWI/96E1JYGX1zfSOrnoyzFN7m07mW2vxbK6aO/9UKgiYCM2',3),(15,'TESTE','TESTE','$2y$10$QEcecnq2RkO0Wm9.AUcJ8.8AhIhVHal1kGKYlzOxsJ7nDO5.gQcJ2',3),(16,'TESTE','TESTE','$2y$10$xoBjQ1LkP58HSJH7s2/Yy.BcVfM10kKiNkXkZijpxODKgb0g9owcW',3),(17,'TESTE','TESTE','$2y$10$1eO5ywWWdRqEuh9W/0N1Pe37DJDLco.AihCPuYInH3cKA4RB/H2Gm',3),(18,'TESTE','TESTE','$2y$10$4Ydagk/pILUD28l2v.bTfONGNAbQZyah5NAMnVkv.Q7YJmX7HJm2y',3),(19,'TESTE','TESTE','$2y$10$TkkegSWAezggeNmGFUmTBuWuFvx5kmeI4keyq85vHgMxibIfN0ARW',3),(20,'TESTE','TESTE','$2y$10$fQ.FM8HHU7Fc02Zqis1AheA1LcEUlrraeRO1NfF6E.Fxil8olAb0i',3),(21,'TESTE','TESTE','$2y$10$bPaQIFFY67/zL19ctrlOL.bZREeGVwIi5csJXZrngTnShwrWo7Yie',3),(22,'TESTE','TESTE','$2y$10$EBC0P.8.jdJJQmYQQkyqkekM9/zScik7r8S2aJQ1iLxO1fA//sdW2',3),(23,'TESTE','TESTE','$2y$10$qb6C6zi640HgkEjbF78zdOlMZ1bAFd.rOggpRlVWgYdNGxvisEvIm',3),(24,'TESTE','TESTE','$2y$10$Qdex3cum2a/LBoI.dFEflumky8EKODihJR6es6R5O6CWkukQ.DWgm',3),(25,'TESTE','TESTE','$2y$10$nNKX63H8PAiLqsqh5f.QVeYY3cnjsejlCxQhxE3JZsd13KyqPWL5u',3),(26,'TESTE','TESTE','$2y$10$DaQ6n1H8MR7dXr3KMeq0VOMWu2z9Y8MIiPTamX9nuGbNr6YS3OQcC',3),(27,'TESTE','TESTE','$2y$10$gBh1m2qeN86NyrIdZZ1BMuNcWaqqrZpv8XaCxcfH/gjZd7c/jbpia',3),(28,'TESTE','TESTE','$2y$10$BWNXxri6IUQHIhIZFBdSSOX.AvQzah3n9gUTn5fq7Qz0aAqUW4baa',3),(29,'TESTE','TESTE','$2y$10$arl2q/klXJxpiYx5hWt.merrTLn28GvHs.5pouBr06RDAyYx8kdF2',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website_contato`
--

DROP TABLE IF EXISTS `website_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `website_contato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `nome_conjuge` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `celular` varchar(25) DEFAULT NULL,
  `evento` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `observacoes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `website_contato`
--

LOCK TABLES `website_contato` WRITE;
/*!40000 ALTER TABLE `website_contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `website_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'foto'
--

--
-- Dumping routines for database 'foto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-08 21:20:34
