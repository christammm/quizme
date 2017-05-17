-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: tamc1_db
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `highscores`
--

DROP TABLE IF EXISTS `highscores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `highscores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setid` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `score` int(5) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `highscores`
--

LOCK TABLES `highscores` WRITE;
/*!40000 ALTER TABLE `highscores` DISABLE KEYS */;
INSERT INTO `highscores` VALUES (1,5,'christam1995','','',2221,NULL),(2,6,'christam1995','','',221,NULL),(3,6,'christam1995','','',2231,NULL),(4,6,'christam1995','','',121,NULL),(5,8,'christam1995','','',121,NULL),(6,10,'christam1995','','',121,NULL),(7,42,'christam1995','','',121,NULL),(8,42,'christam1995','','',121,NULL),(9,42,'christam1995','','',121,NULL),(10,42,'christam1995','','',121,NULL),(11,42,'christam1995','','',121,NULL),(12,8,'christam1995','','',21,NULL),(13,42,'christam1995','','',121,'2017-04-26');
/*!40000 ALTER TABLE `highscores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Lorem Ipsuma','Chris Tam','2017-02-15','jabahut.jpg','fa hfldsahf jdsk hdkljdshrf kldswoue cwur erwkuh csDKL dcds Zudfcls fsdjfh dsk f8owerfewhl,jehdwwou ehdwnawku edhuryfwe rfwre3 urfweo rfyer nkfesh rkfrso yrowroy8wy rowyriuwyr iewr iewr ewiuer yweiry wei ryiewrwe rew','cms, answermi,dude',11,'draft'),(2,1,'fjdsfj sdlf','f jdsf dsf ds','2017-03-15','','fdsafhdsajf hdaskf y9h rj.fhsnr ofewrfwdfwesx fdgdf gfdffdfdfdfdgfdsgfsdg fdtfeqr tfaer er farer fdfdsafhdsajf hdaskf y9h rj.fhsnr ofewrfwdfwesx fdgdf gfdffdfdfdfdgfdsgfsdg fdtfeqr tfaer er farer fdfdsafhdsajf hdaskf y9h rj.fhsnr ofewrfwdfwesx fdgdf gfdffdfdfdfdgfdsgfsdg fdtfeqr tfaer er farer fdfdsafhdsajf hdaskf y9h rj.fhsnr ofewrfwdfwesx fdgdf gfdffdfdfdfdgfdsgfsdg fdtfeqr tfaer er farer fd','',11,'draft'),(3,3,'fdfsd','markenyou','2017-03-08','','         fdsfsd','fsdfds',0,'draft'),(4,3,'ello','markenyou','2017-03-08','','         fd','fdfd',0,'draft');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `set_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (8,5,'What is a flower?','','','',''),(8,6,'What is a rose?','i dont know','no idea','no clue','a red petal like flower'),(8,7,'What is a dandelion','a flower?','some kind of flower','uhh not sure....','a ball like flower where you can blow off the petal'),(8,8,'Why are you taking this test?','uhhh','uhh','uhh','i want to learn about flowers'),(8,9,'Choose the right answer','a ball like flower where you can blow off the pea ball like flower where you can blow off the petaltal','a ball like flower where you can blow off the petala ball like flower where you can blow off the petala ball like flower where you can blow off the petala ball like flower where you can blow off the petal','a ball like flower where you can blow off the petal','a ball like flower where you can blow off the petal'),(10,10,'2+2','1','2','3','4'),(10,11,'25-9','18','17','15','16'),(10,12,'10+20','20','10','23','30'),(10,13,'18 + 2','22','21','19','20'),(10,14,'89+11','98','94','99','100'),(10,15,'70 * 3','180','190','200','210'),(15,16,'What is carbon?','sdfd','hjkhjk','hkjhjk','molecule'),(15,17,'Define photosynthesis','fdf','jkljlk','jkljkkl','plants make their own food'),(15,18,'What is science','dfsdf','jkljkljlk','jklljkljkl','study of things'),(10,19,'3 + 7','1','4','5','10'),(10,20,'8 + 8','13','14','15','16'),(10,21,'9 + 9','11','48','29','18'),(10,22,'81 + 8','90','91','95','89');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setlist`
--

DROP TABLE IF EXISTS `setlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setlist` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `setname` varchar(255) NOT NULL,
  `setdescription` varchar(255) NOT NULL,
  `datecreated` date DEFAULT NULL,
  `username` varchar(18) NOT NULL,
  PRIMARY KEY (`set_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setlist`
--

LOCK TABLES `setlist` WRITE;
/*!40000 ALTER TABLE `setlist` DISABLE KEYS */;
INSERT INTO `setlist` VALUES (7,'Some Problem Sets','Here is a test Set','0000-00-00','christam'),(8,'Flower','Test about flowers','0000-00-00','Christam1995'),(9,'Some More Math Questions','Here are some more that i made for my students','0000-00-00','Christam1995'),(10,'Easy Arithmetic','Test Set 1','0000-00-00','Christam1995'),(14,'Vocabulary','Fill in the vocabulary sentences','2017-04-26','Christam1995'),(15,'Science','Science is cool','2017-04-28','Christam1995');
/*!40000 ALTER TABLE `setlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Christam1995','graypot1','Christopher','Tam','tamc1@hawkmail.newpaltz.edu','','admin',''),(4,'christam','$1$ot1.Ry/.$PELwKmd.ZmwoiLdEoKANB.','Christopher ','Tam','christam@123.com','','admin',''),(5,'anthonyrivera','123456','Anthony','Rivera','nathon@test.com','','student',''),(6,'anthonytam123','123456','Anthony','Tam','test@aol.com','','student',''),(8,'testuser123','test123','test123','test','test12453@aol.com','','student',''),(9,'test4','$2a$12$aeyNEP7ITp3n59c1C75ISOVUxUqWeIcpizGdiDlqvjhQRsqlPYOJm','test4','test4','test4@aol.com','','student',''),(10,'def1','$2a$12$6ZhfC0sWYv5TTZOHGCWMXeXP5ttk819kPNbmGD0s8sFBqntVlpvz2','def1','def1','def1@aol.com','','student',''),(11,'12312321','$2a$12$ykC7W5NJyahzsBq5AHOv7OpvpxV83v/uIMD6M/RqOqLx2Dckq2gKa','21312321','321321321','test1231232131@aol.com','','student',''),(12,'test12345','$2a$12$Hbh8Zpvz9Qt3O7efYtL5lOpfE3roKm92ZKypTNUrHEDIq5EtDY8hi','test123','test123','teststest@aol.com','','student',''),(13,'arivera','game1','Anthony','Rivera','test123@aol.com','','admin',''),(14,'testttt','$2a$12$wIWoMUzQr1mVTv5e.LABme0aSsVYwNgrSKIeH4F1cV/gSeZhKxq4i','test','test123','testtt123@aol.com','','student',''),(15,'rivera','test123','riveraa','anthony','ariva@aol.com','','admin',''),(16,'dsadsadadsad','$2a$12$MzJUl0cCh5heDba6qHrUde5lTtdZXhLv3yfdQKI6lu.5iV3eHcvBm','dsadsadsada','Christam1995','sdsadsadsad@aol.com','','student',''),(17,'riveraa3','$2a$12$N7XCiVMRNDxO0vYqsrBcj.Wb0goSHyiBFkOsdAkaU2cAF8gsHmX8u','Anthony','Rivera','ant@aol.com','','student',''),(18,'Dennis','$2a$12$iJHhXTQf/ALZc77.57JVDepXdfAF/LNUWmtsQDuPsQ2kp5IysD7/q','roman','madada','dasdfdsfds@aol.com','','student',''),(19,'riveraa33','$2a$12$zt2QoAtLWbb3El0vXk0HAee8KX16ICcIGZifWSdQGxhqZFMMskGKq','Ant','Riv','ant@aoll.com','','student',''),(20,'blah','$2a$12$71bTM6gNCsyoko9ceqDoUeg8dYTo9ejTJ2YvgRzwPPbkH4dBZ06Za','blah','blah','blahblah@password.com','','student',''),(21,'Dennis123','$2a$12$KaHs3QU5CcKmTBf9fsNqNuF9h66ThEherHdsYjZ2QW.wtAA8bflu2','Dennis','Rodman','dnnisrodman@aol.com','','student',''),(22,'dennisMenace','$2a$12$GbmGrtjc9JD9wn5K1d5A5.kKkvYFTrt5PVuva4cLwCvli2lA2YaZ2','versace','versace','tamc1@hawkasa.com','','student',''),(23,'JennyHellings','$2a$12$JRcrX88FgqG07eb0kRpc4esQ1L4NhOHHdfGUaR57PjoYD3beUxp0m','Jenny','Hellings','jhellings@gmail.com','','student',''),(24,'Amitoz','$2a$12$/Y8z3US/PBVxNdKTGZSH1uiaABht2JgYOQj5E3D.1tMm6gKNTvcSO','amitoz','deol','amitozsinghdeol@gmail.com','','student',''),(25,'Garchung','$2a$12$wQDbppA.EXG0WwE1e4/tEuaHPtJD84aWUc0jaGx/6zqAX4MI7.Rw2','Gar','Chung','garchung@gmail.com','','student','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-17 11:00:16
