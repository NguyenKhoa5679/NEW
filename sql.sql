CREATE
DATABASE  IF NOT EXISTS `keistory` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE
`keistory`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: keistory
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `chuong`
--

DROP TABLE IF EXISTS `chuong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chuong`
(
    `chuong_id`      int  NOT NULL AUTO_INCREMENT,
    `chuong_so`      int  NOT NULL,
    `chuong_ten`     text NOT NULL,
    `chuong_noidung` text NOT NULL,
    `truyen_id`      int  NOT NULL,
    `luotxem`        int  NOT NULL,
    `created_at`     datetime DEFAULT NULL,
    `updated_at`     datetime DEFAULT NULL,
    PRIMARY KEY (`chuong_id`),
    KEY              `truyen_id_idx` (`truyen_id`),
    CONSTRAINT `truyen_id` FOREIGN KEY (`truyen_id`) REFERENCES `truyen` (`truyen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuong`
--

LOCK
TABLES `chuong` WRITE;
/*!40000 ALTER TABLE `chuong` DISABLE KEYS */;
INSERT INTO `chuong`
VALUES (1, 1, 'Chuong 1', 'abcdefghijklmhop', 1, 1, NULL, '2023-05-04 12:30:31'),
       (2, 2, 'Tiêu đề', 'abc', 1, 0, '2023-05-03 22:18:09', '2023-05-03 22:18:09'),
       (3, 3, 'Tiêu đề', 'a\r\na\r\na\r\nb\r\nc\r\nd', 1, 0, '2023-05-03 22:18:38', '2023-05-03 22:18:38'),
       (4, 4, 'Tiêu đề', '\r\n                               ', 1, 0, '2023-05-04 11:07:48', '2023-05-04 11:07:48'),
       (5, 5, 'Tiêu đề', '\r\n                               ', 1, 0, '2023-05-04 11:09:04', '2023-05-04 11:09:04'),
       (6, 6, 'Tiêu đề', '\r\n                               ', 1, 0, '2023-05-04 11:09:42', '2023-05-04 11:09:42'),
       (7, 7, 'Tiêu đề', '\r\n                               ', 1, 0, '2023-05-04 11:09:47', '2023-05-04 11:09:47'),
       (8, 8, 'Tiêu đề', '\r\n                               ', 1, 0, '2023-05-04 11:10:52', '2023-05-04 11:10:52'),
       (9, 9, 'Tiêu đề', '\r\n                               ', 1, 0, '2023-05-04 11:11:06', '2023-05-04 11:11:06'),
       (10, 10, 'Tiêu đề', '\r\n                               ', 1, 0, '2023-05-04 11:13:51', '2023-05-04 11:13:51');
/*!40000 ALTER TABLE `chuong` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `chuong_hinhanh`
--

DROP TABLE IF EXISTS `chuong_hinhanh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chuong_hinhanh`
(
    `chuong_hinhanh_id`      int         NOT NULL,
    `chuong_id`              varchar(45) NOT NULL,
    `chuong_hinhanh_tenhinh` text        NOT NULL,
    PRIMARY KEY (`chuong_hinhanh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuong_hinhanh`
--

LOCK
TABLES `chuong_hinhanh` WRITE;
/*!40000 ALTER TABLE `chuong_hinhanh` DISABLE KEYS */;
/*!40000 ALTER TABLE `chuong_hinhanh` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `theloai`
--

DROP TABLE IF EXISTS `theloai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theloai`
(
    `truyen_theloai` int         NOT NULL AUTO_INCREMENT,
    `ten_theloai`    varchar(45) NOT NULL,
    PRIMARY KEY (`truyen_theloai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theloai`
--

LOCK
TABLES `theloai` WRITE;
/*!40000 ALTER TABLE `theloai` DISABLE KEYS */;
INSERT INTO `theloai`
VALUES (1, 'Ngôn tình'),
       (2, 'Đam Mỹ'),
       (3, 'Đô thị');
/*!40000 ALTER TABLE `theloai` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `truyen`
--

DROP TABLE IF EXISTS `truyen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `truyen`
(
    `truyen_id`        int         NOT NULL AUTO_INCREMENT,
    `truyen_ten`       text        NOT NULL,
    `truyen_img`       text,
    `truyen_theloai`   varchar(45) DEFAULT NULL,
    `truyen_mota`      text        NOT NULL,
    `truyen_ngaydang`  date        DEFAULT NULL,
    `truyen_tinhtrang` varchar(45) NOT NULL,
    `TacGia`           text,
    `iduser`           int         DEFAULT NULL,
    `created_at`       datetime    DEFAULT NULL,
    `updated_at`       datetime    DEFAULT NULL,
    PRIMARY KEY (`truyen_id`),
    KEY                `truyen_theloai_idx` (`truyen_theloai`),
    KEY                `iduser_idx` (`iduser`),
    CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truyen`
--

LOCK
TABLES `truyen` WRITE;
/*!40000 ALTER TABLE `truyen` DISABLE KEYS */;
INSERT INTO `truyen`
VALUES (1, 'Hệ thống xuyên không: Boss phản diện đột kích',
        'https://www.dtv-ebook.com/images/cover_1/he-thong-xuyen-nhanh_-boss-phan-dien-dot-kich-mac-linh.jpg', '1',
        'Khi boss trùm biến thành người phụ nữ điên dại, các nhân vật chính xuyên không cùng với trọng sinh đã chuẩn bị sẵn sàng chưa? Một phó bản cực kỳ khó đã mở ra.',
        NULL, 'chưa hoàn', 'Mặc Linh', 2, NULL, NULL),
       (2, 'Dưới những dặm mưa sa', 'https://storage.googleapis.com/july-bucket/YMRiEarrfizUaeA6Rn1nkPjz', '3', ' ',
        NULL, 'Chưa hoàn', 'Nam Ly', 2, NULL, NULL),
       (3, 'New story', 'img/uploads/New storyNew storyArtboard 5.png', '1, 2, 3', 'abc', '2023-04-30',
        'Chưa hoàn thành', 'Nguyên khoa', 2, '2023-04-30 20:03:52', '2023-04-30 20:03:52');
/*!40000 ALTER TABLE `truyen` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role`
(
    `role`        int         NOT NULL,
    `role_detail` varchar(45) NOT NULL,
    PRIMARY KEY (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK
TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role`
VALUES (-1, 'non_per'),
       (1, 'admin'),
       (2, 'user_reader'),
       (3, 'user_author');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users`
(
    `user_id`    int         NOT NULL AUTO_INCREMENT,
    `username`   text        NOT NULL,
    `password`   text        NOT NULL,
    `fullname`   varchar(45) NOT NULL,
    `email`      varchar(45) NOT NULL,
    `created_at` datetime    NOT NULL,
    `updated_at` datetime    NOT NULL,
    `role`       int         NOT NULL,
    PRIMARY KEY (`user_id`),
    KEY          `role_idx` (`role`),
    CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `user_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK
TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users`
VALUES (1, 'user', '$argon2id$v=19$m=65536,t=4,p=1$d3pXQ3ExdnYxOEg1cDhZWA$x6T55KeEdpWoQramrXZyC9J7fj6T2xRgOlDezGa2oeI',
        'user', 'user1@gmail.com', '2023-04-10 00:00:00', '2023-04-10 00:00:00', 2),
       (2, 'nguyenkhoa',
        '$argon2id$v=19$m=65536,t=4,p=1$N1lmVE5yL3FaT1oxSk5VZQ$dgyPx8YF5bmrbQryf1T0qfTT4SpqbNHL+LdofTCNofk',
        'nguyenkhoa', 'nguyenkhoaht002@gmail.com', '2023-04-17 10:48:30', '2023-05-02 23:04:38', 3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK
TABLES;

--
-- Dumping events for database 'keistory'
--

--
-- Dumping routines for database 'keistory'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-04 19:52:50
