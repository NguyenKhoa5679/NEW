CREATE DATABASE  IF NOT EXISTS `keistory` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `keistory`;
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
-- Table structure for table `baocao`
--

DROP TABLE IF EXISTS `baocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `baocao` (
  `idbaocao` int NOT NULL AUTO_INCREMENT,
  `truyen_id` int NOT NULL,
  `user_id` int NOT NULL,
  `LyDo` text,
  `NoiDung` text,
  `tinhtrang` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idbaocao`),
  KEY `BC_user_fk_idx_idx` (`user_id`),
  KEY `bc_truyen_fk_idx` (`truyen_id`),
  CONSTRAINT `bc_truyen_fk` FOREIGN KEY (`truyen_id`) REFERENCES `truyen` (`truyen_id`),
  CONSTRAINT `bc_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baocao`
--

LOCK TABLES `baocao` WRITE;
/*!40000 ALTER TABLE `baocao` DISABLE KEYS */;
INSERT INTO `baocao` VALUES (2,12,7,'Nội dung nhạy cảm',NULL,0,'2023-05-10 21:27:16','2023-05-10 21:27:16');
/*!40000 ALTER TABLE `baocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binhluan` (
  `idbinhluan` int NOT NULL AUTO_INCREMENT,
  `truyen_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL,
  `noiDung` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idbinhluan`),
  KEY `bl_truyen_fk_idx_idx` (`truyen_id`),
  KEY `bl_user_fk_idx_idx` (`user_id`),
  CONSTRAINT `bl_truyen_fk_idx` FOREIGN KEY (`truyen_id`) REFERENCES `truyen` (`truyen_id`),
  CONSTRAINT `bl_user_fk_idx` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binhluan`
--

LOCK TABLES `binhluan` WRITE;
/*!40000 ALTER TABLE `binhluan` DISABLE KEYS */;
INSERT INTO `binhluan` VALUES (1,12,1,4,'hihi','2023-05-07 16:39:19','2023-05-07 18:42:03'),(2,12,1,5,'new','2023-05-07 16:39:55','2023-05-07 18:39:43');
/*!40000 ALTER TABLE `binhluan` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `binhluan_BEFORE_INSERT` BEFORE INSERT ON `binhluan` FOR EACH ROW BEGIN

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `chuong`
--

DROP TABLE IF EXISTS `chuong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chuong` (
  `chuong_id` int NOT NULL AUTO_INCREMENT,
  `chuong_so` int NOT NULL,
  `chuong_ten` text NOT NULL,
  `chuong_noidung` text NOT NULL,
  `truyen_id` int NOT NULL,
  `luotxem` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`chuong_id`),
  KEY `truyen_id_idx` (`truyen_id`),
  CONSTRAINT `truyen_id` FOREIGN KEY (`truyen_id`) REFERENCES `truyen` (`truyen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuong`
--

LOCK TABLES `chuong` WRITE;
/*!40000 ALTER TABLE `chuong` DISABLE KEYS */;
INSERT INTO `chuong` VALUES (21,1,'','Nước thật tĩnh lặng, tiếng ồn ào là của ngày Hè trong xanh.\r\n\r\nKhi kim đồng hồ quay về 18 giờ 13 phút, là lúc những bọt nước bắn tung tóe, cùng bóng người vụt lên, tiếng hò hét, những tràng pháo tay nồng nhiệt, kèm theo đó là hơi thở náo động và đồ uống mát lạnh. Bên bể bơi có vô số tiếng cười, bầu không khí high đến cực điểm khi được chứng kiến một cuộc thi dưới nước gay cấn.\r\n\r\nMột khoảnh khắc yên lặng bỗng xuất hiện trong điện thoại.\r\n\r\n“Tôi sắp ly hôn rồi.” Người phụ nữ mở đầu bằng câu nói thẳng thừng.\r\n\r\n“Đợi đến khi phân chia xong tài sản, tôi sẽ đưa Chu Phàm Tần sang Úc.” Người phụ nữ bình tĩnh hít thở, chỉ đơn giản là thông báo quyết định của bản thân mình: “Phiền cô trong vòng một tuần làm thủ tục rời Câu lạc bộ bơi lội cho thằng bé, lấy lại được tiền hay không không quan trọng, tôi không muốn thằng bé lãng phí nhiều thời gian cho khóa học này.”\r\n\r\nMột bóng người chợt trồi lên khỏi mặt nước, ngay sau đó là rất nhiều bóng người rơi xuống bể bơi. Dưới ánh đèn sáng trắng, có thể nhìn thấy những bọt nước bắn tung tóe trong không trung, những cậu bé mười một, mười hai tuổi tràn đầy nhiệt huyết, trên cổ đeo huy chương bằng dây sọc đỏ trắng, phản chiếu lại ánh sáng chói mắt.\r\n\r\nChung Ức đứng trên bờ, rũ mắt nhìn về phía cậu bé đang từ từ tiến lại gần. Mười lăm phút trước, cô đã dùng giọng điệu công tư phân minh để trả lời lại mẹ của cậu bé này, cũng chính là chủ hợp đồng của cô: “Em ấy đã giành được huy chương bạc trong cuộc thi lần này, trước đó tôi đã hứa rằng, nếu đạt được giải trong cuộc thi bơi lội này, thì có thể được thêm hai tiếng đồng hồ ăn mừng. Tôi muốn hoàn thành nguyện vọng đã hứa trước khi thi đấu với thằng bé, rồi mới đứa em ấy về nhà.”\r\n\r\n“Tôi không phản đối, phụ thuộc cả vào sự sắp xếp của nhóm gia sư toàn thời gian các cô.” Người phụ nữ hoàn toàn không hỏi han về giải thưởng, giọng nói đột nhiên trở nên xa vời, hình như đang thảo luận việc gì đó với người bên cạnh, rồi lại vội vàng ghé vào điện thoại: “Hôm nay, tôi không về nhà, khi nào đưa thằng bé về đến nhà an toàn thì phiền cô báo với tôi một tiếng nhé cô giáo Tiểu Ức.”\r\n\r\n“Được.”\r\n\r\nKhi cuộc gọi kết thúc, cô nhìn thấy ở đằng xa, cậu bé mười hai tuổi đang đứng giữa nhóm bạn, nở nụ cười rạng rỡ, giơ cao chiếc huy chương.\r\n\r\nChu Phàm Tần nằm ngửa giữa bể bơi, để nước nâng cơ thể mình lên, đồng thời chậm rãi bắt chuyện: “Cô ơi, khi mẹ của Lý Tuấn Trì bằng tuổi cô, thì dì ấy đã sinh người con thứ hai rồi, sau này nếu mang thai, thì cô có còn đi dạy nữa không ạ?”\r\n\r\n“Giữa hai người có mối liên hệ nào sao?”\r\n\r\n“Mẹ bạn ấy sau khi sinh đứa đầu thì không đi làm nữa.” Cậu nhóc lật người, nằm úp trên mặt nước: “Nên có nhiều thời gian dành cho bạn ấy hơn ạ.”\r\n\r\nKhi cậu ấy che giấu những cảm xúc bé nhỏ của mình, sẽ không bao giờ đối diện với ánh mắt của cô. Chung Ức hơi cúi người, đưa ngón trỏ nên chọc nhẹ vào gò má ướt át của cậu bé: “Nhà hàng mà em muốn đi đã đặt chỗ rồi, tối nay em không cần phải học bù tiếng Anh nữa.”\r\n\r\nChu Phàm Tần đập tay xuống mặt nước bằng tất cả sự phấn khích, khiến Chung Ức phải rụt vai lại, cô cảm thấy mát mát trên khuôn mặt, đúng là vẫn không né tránh được. Đôi mắt đen láy của cậu nhóc quay lại, hỏi đầy mong đợi: “Cô ơi, em muốn dẫn theo một người, có được không ạ?”\r\n\r\n“Em cứ mời, chỉ cần đối phương và phụ huynh đều đồng ý, thì cô sẽ đưa mọi người đi.”\r\n\r\nCậu bé hét to một tiếng, như chú cá rong chơi trong nước, uyển chuyển nhẹ nhàng hòa vào làm một dùng dòng nước. Chung Ức nhìn Chu Phàm Tần bơi đến vùng nước sâu, bèn chậm rãi đi quanh bờ, cô ngẫm nghĩ một lúc, rồi mở khung chat trên Wechat, chọn vài bức ảnh sau đó gửi ảnh gốc đi.\r\n\r\nGiai điệu đoạn cuối của bài “Summer vibe” vang vọng khắp bể bơi, rồi kết thúc, nắng trên bãi biển, gió biển ẩm ướt cùng tiếng sóng vỗ vào bờ đã, từng nhịp điệu ấy đã phác họa nên một bức tranh của mùa Hè. \r\n\r\nKhu vực nước sâu ít người qua lại hơn, cậu bé lặn xuống bơi một lúc lâu vẫn không nổi lên, nhìn kỹ thì thấy cậu đang nhào lộn dưới nước với tư thế thật kỳ lạ. Chung Ức cảm thấy có gì đó không ổn, bèn hô hoán nhân viên cứu hộ trên bục cao, tiếng thổi còi vang lên chói tai, một bóng đen như rồng tiến vào trong nước, nhanh chóng bơi đến bên cạnh Chu Phàm Tần lúc này đang giãy giụa điên cuồng, rồi túm lấy cậu ấy, lao lên mặt nước.\r\n\r\n“Chu Phàm Tần.” Chung Ức lo lắng gọi cậu bé.\r\n\r\n“Anh Viễn, anh nhanh thật đó!”\r\n\r\nCậu bé lau khuôn mặt đẫm nước, hoàn toàn không còn giãy giụa hay ho sặc sụa, ánh mắt chột dạ liếc nhìn Chung Ức bên bờ, nhưng lại bị ánh mắt của cô bắt lấy: “Em lên trên ngay, không được bơi nữa.”\r\n\r\nNgười đàn ông được Chu Phàm Tần gọi là anh Viễn, lập tức đờ mặt, thả cậu ấy ra rồi kéo lên, tiếp đến là tét ba phát liên tiếp vào mông cậu.\r\n\r\n“Đánh hay lắm, đánh hay lắm.” Chu Phàm Tần chạy loanh quanh phối hợp, như thể đang tụng kinh bên cạnh người đàn ông: “Anh bơi nhanh thật, khi nãy em thấy anh còn đang đứng trên bục cao, thế mà thoáng một cái đã đến bên cạnh em rồi, ngầu đét!”\r\n\r\nNgười đàn ông mặc bộ đồ bơi liền thân màu đen, bờ vai rộng, vòng eo hẹp, để lộ cẳng tay với đường nét săn chắc và láng mịn, cơ bắp vừa phải, toát lên dáng dấp của dân thể thao. Vài sợi tóc ngắn ướt sũng che đi đôi mắt của anh, thoạt nhìn, gương mặt nghiêng nghiêng ấy đang tái nhợt dưới ánh đèn, sống mũi cao thẳng tắp, đôi môi luôn mím chặt, khiến người ta cảm thấy hơi lạnh lùng.\r\n\r\nNhìn lại Chu Phàm Tần, cậu nhóc vẫn không chịu buông người đàn ông ra, tay chân gầy guộc như con bạch tuộc đang quấn lấy người đàn ông, tựa chú khỉ hoang trên núi muốn nhảy lên bức tượng đá lạnh lẽo.\r\n\r\nCậu không ăn năn hối cải, mà còn chẳng biết xấu hổ, nói: “Anh Viễn, tối nay em đãi, chúc mừng em giành được huy chương bạc, anh nhất định phải đến nha, không đến thì không là anh em tốt.”\r\n\r\nXưng em gọi anh, Chu Phàm Tần quả là đã vận dụng hết kỹ năng giao tiếp độc đáo thoải mái của mình rồi. Người đàn ông lạnh lùng nhìn cậu ấy, rồi đưa hai tay ra túm lấy tay chân cậu, kéo cái người đàn bám dính trên người mình ra, ném xuống nước: “Không rảnh.”\r\n\r\nSau đó, sóng nước bắn tung, bóng đen lặn xuống đáy bể rồi nhanh chóng hòa vào đám người, đến rồi đi chẳng còn tăm tích, từ khi xuất hiện cho đến khi rời đi, anh không nhìn lên bờ một lần nào.\r\n\r\nNăm phút sau, hành lang thông gió hai bên tràn ngập tiếng kêu rú của Chu Phàm Tần.\r\n\r\n“Em đã từng nghe câu chuyện “Sói đến rồi” chưa?” Chung Ức mặc cậu bé lượn trái rồi lượn phải, cuối cùng thì nhìn thẳng về phía trước, bước đi không ngừng: “Chết đuối cũng dám lừa, cô thấy em, nhận giải xong hóa bay bổng quá rồi đó.”\r\n\r\n“Ở dưới nước cũng bay bổng được mà cô.” Chu Phàm Tần đưa cánh tay ra vẫy như rong biển, cười khúc khích như tên ngốc.\r\n\r\n“Cô đã hủy đặt bàn nhà hàng rồi, đưa thẳng em về nhà.” Thái độ của cô rất kiên quyết.\r\n\r\n“Đừng mà…”\r\n\r\nChu Phàm Tần phàn nàn lên tận trời xanh, vừa xin lỗi vừa cầu xin, cứ thế làm ầm làm ĩ cho đến cửa Câu lạc bộ.\r\n\r\nGiữa Hè, bầu trời giống như chiếc nồi hấp, khi màn đêm buông xuống, những dãy đèn đường báo hiệu cuộc sống về đêm đã bắt đầu. Trong bóng tối ở góc phố, người đàn ông mới gặp cách đây không lâu đang đứng dựa vào tường, đôi mắt cụp xuống như đang chờ đợi ai đó.\r\n\r\nKhông giống như lúc ở trong bể bơi, lúc này anh đã đổi thành bộ đồ đen rộng rãi, lộ ra dáng người gọn gàng có lực, trên cổ tay trái đeo chiếc đồng hồ màu đen, trang phục tối giản, dưới mái tóc nửa khô là đôi mắt đen láy khó quên.\r\n\r\nAnh ngước mắt nhìn họ, Chung Ức còn chưa kịp lên tiếng, thì Chu Phàm Tần đã lớn tiếng hét, rồi vội vàng chạy qua: “Anh Viễn, anh khen em với cô giáo của em một chút đi, nếu không tối nay cả hai ta đều không có cái ăn đâu!”\r\n\r\n“Là em không có cái ăn chứ không phải anh.” Giọng nói của người đàn ông trong trẻo, vô cùng trẻ trung, thực sự hợp với khí chất của anh.\r\n\r\nHai người kẻ hát người múa, vẫn như lúc ở bể bơi, hoàn toàn không hề để ý tới cô.\r\n\r\n“Anh cầu xin giúp em đi mà!”\r\n\r\n“Anh nói thì có tác dụng hả?”\r\n\r\n“Cô tiểu Ức thích nhất là trai đẹp, anh lại đẹp trai thế này, nên đương nhiên là có tác dụng rồi.”\r\n\r\nLời vừa dứt, thì ánh mắt của người đàn ông cũng dừng lại trên người cô lần thứ hai trong ngày hôm nay, đuôi mắt anh hơi nhếch lên, cười mà như không cười, hình dáng đôi mắt dịu dàng, nhưng trong ánh mắt lại chiếu ra một cảm giác khó tả, như thể đang dò xét.\r\n\r\n“Đưa Huấn luyện viên qua bên đường đứng đợi, để cô lái xe đến.”\r\n\r\nChung Ức bất lực nhéo mặt Chu Phàm Tần, khiến cậu phấn khích nhảy cẫng cả lên. Còn cô thì dần dần rời đi trong ánh mắt lặng lẽ như ẩn khuất những cảm xúc không rõ của người nào đó.\r\n\r\n…..\r\n\r\nTrong nhà hàng đồ Tây ồn ào, nhân viên phục vụ đi đi lại lại, tiếng thành cốc va chạm, cùng những bài hát thuộc các phong cách khác nhau đang hòa vào giọng nói của con người.\r\n\r\nCảm hứng và mục tiêu của Chu Phàm Tần chỉ tập trung vào người đàn ông bên cạnh cậu, mà chủ đề trò chuyện là đủ các loại trò chơi và hoạt hình, hoạt hình thì cô có thể miễn cưỡng nghe ra, nhưng game thì chịu hẳn. Người đàn ông đáp lại từng câu, dù ngắn gọn nhưng cũng đủ để khiến cậu nhóc hăng hái.\r\n\r\nChung Ức có rất ít khoảng trống để chen vào, cùng lắm chỉ được khoảng ba, bốn câu và hầu như chẳng có gì khác ngoài mấy câu: “Còn muốn gọi thêm món không? Muốn gọi đồ uống không? Muốn ăn tráng miệng hay kem không?”\r\n\r\nSau khi Chu Phàm Tần trả lời, cô lại dùng ánh mắt để hỏi người đàn ông, nhưng anh luôn kiệm chữ như vàng: “Không cần, cảm ơn.”\r\n\r\nTrong khoảng cách cùng một bàn ăn, rất hiếm khi anh quay sang nhìn Chu Phàm Tần, tuy Chung Ức ngồi đối diện với anh, mà anh cũng chẳng thèm liếc nhìn cô lấy một cái. Kiêu ngạo ư? Không nhìn ra sự kiêu ngạo. Lạnh lùng ư? Có thể là do biết mặt biết người nhưng không biết lòng người ta.\r\n\r\nCô đã ăn gần no, nên mượn ánh đèn vàng trên đỉnh đầu rồi chống má lướt điện thoại và nghe nhạc, bản nhạc đang được phát là một bài hát tiếng Nhật. Giai điệu tươi mới, nhưng sự thoải mái khi ăn dưa hấu mát cùng ngồi hứng gió lại không phù hợp với nhà hàng đồ Tây mờ ảo, sang trọng mà đầy màu sắc này.\r\n\r\nCác ngón tay của cô trượt xuống, để đọc lời bài hát được phiên dịch trên điện thoại.\r\n\r\n“Dàn nóng của máy điều hòa đặt bên ngoài cửa sổ làm tăng cảm giác ngột ngạt, nhưng tại sao bạn không đổ mồ hôi? Gương mặt bình tĩnh ngồi trong góc phòng, làm lơ với mùa Hạ.”\r\n\r\nĐầu ngón tay của Chung Ức hơi khựng lại, trong giai điệu nhẹ nhàng, cô ngước mắt nhìn về vị trí đối diện, đúng lúc bắt gặp đôi mắt đen trắng rõ ràng kia, rồi đôi bên cùng lặng lẽ quan sát nhau.\r\n\r\n……\r\n\r\nTrên đường vào nhà vệ sinh, cô đã ghé qua quầy lễ tân để thanh toán, nhưng nhân viên phục vụ lại nói rằng bàn của cô đã được thanh toán rồi.\r\n\r\nChu Phàm Tần thấy cô quay lại, bèn cứ thế đứng dậy, vội vàng ấn ngón tay lên màn hình, rồi lại là một màn “chiến đấu” kịch liệt: “Anh Viễn về rồi, nhà anh ấy không cùng đường với chúng ta, em hỏi anh ấy ở đâu nhưng anh ấy không nói, có thể đưa anh ấy đến trạm tàu điện ngầm cũng được mà!”\r\n\r\n“Tối nay, trong mắt em ngoài đồ ăn ra thì chỉ có anh ấy thôi.” Chung Ức ấn tay lên lưng cậu nhóc, rồi một trước một sau ra khỏi nhà hàng.\r\n\r\nTrong xe, Chu Phàm Tần đã dùng cách nói nhẹ nhàng để lấy lòng cô, cậu hỏi: “Cô tiểu Ức, tại sao trong bữa ăn cô lại không nói chuyện với anh Viễn?”\r\n\r\nTiếp đến là vài giây im lặng. \r\n\r\nChung Ức xoay vô lăng, ánh sáng ngoài cửa sổ chiếu vào gương mặt cô, trái tim cô hơi chùng xuống, đáp: “Để em có thêm thời gian nói chuyện về game với anh ấy.”\r\n\r\nKhông ngờ nhóc con lại không “trúng kế”, mà tiếp tục ranh mãnh công kích: “Có phải cô xấu hổ không?”\r\n\r\n“Tại sao cô lại phải xấu hổ?”\r\n\r\n“Bởi vì anh ấy đẹp trai.”\r\n\r\n“Thế cô không đẹp gái hả?”\r\n\r\n“Vậy nên cả hai người đều xấu hổ.” Ngón tay Chu Phàm Tần xoay xoay chiếc dây huy chương, cậu lắc lắc bả vai: “Em giới thiệu Huấn luyện viên siêu đẹp trai của Câu lạc bộ cho cô, đã đủ thú vị chưa ạ?”\r\n\r\nChung Ức cố làm ra vẻ nghiêm nghị, nghiêm túc chỉ bảo cậu ấy: “Đây không phải việc mà em nên để ý, đến Câu lạc bộ là để học bơi, còn ở với cô thì phải học hành đàng hoàng, nếu thành tích không đạt tiêu chuẩn thì chẳng cần đến cô ra tay cũng sẽ có người bắt em luyện tập thêm đó.”\r\n\r\nCậu bĩu môi nói ba lần “không vui”, sau nhịp đèn đỏ, bèn nép người vào ghế phụ lái rồi nghiêng đầu ngủ thiếp đi, chiếc huy chương vẫn luôn được đeo trên cổ, chưa một lần tháo ra.\r\n\r\nSau khi đưa Chu Phàm Tần về nhà an toàn, Chung Ức không lái thẳng xe về nhà mà rẽ vào một con phố khác, cô đến bãi đậu xe dưới tầng hầm và đi thang máy lên siêu thị lớn.\r\n\r\nLần đầu tiên đến thành phố này, thì khoảng thời gian thư giãn nhất sau giờ làm việc chính là được đi mua sắm ở một siêu thị gần đó, bên trong có rất nhiều lại sản phẩm, người đi bộ kề sát vai nhau, cùng với tiếng hò hét quảng cáo khuyến mãi của các nhân viên. Màu trắng của sữa tươi, màu xanh của rau củ và màu đỏ của thịt không ngừng tô điểm cho cuộc sống đầy buồn tẻ này. \r\n\r\nCô thích kiếm tìm những phút giây bình yên giữa dòng đời hối hả. Nhưng trong cuộc sống bình lặng chẳng sóng gió, luôn có thứ gì đó xen vào và phá vỡ vùng cân bằng thoải mái ấy, nó khuấy động làn nước trong vắt để bể đời hoạt động sục sôi.\r\n\r\nWechat của Chu Phàm Tần nhảy lên: “Cô tiểu Ức, em cho cô Wechat của anh Viễn nhé, cô có muốn không?”\r\n\r\nChung Ức giải phóng một bàn tay của mình để trả lời: “Tại sao em không đưa Wechat của cô cho anh ấy?”\r\n\r\nChu Phàm Tần: “Đó là việc đương nhiên rồi ạ, chỉ có điều là anh ấy không trả lời em.”\r\n\r\nChung Ức đáp: “Em bớt lo chuyện người lớn đi, tắt đèn ngủ, không được chơi game nữa. Ngày mai đúng 9 giờ sáng cô sẽ có mặt ở nhà em và sẽ kiểm tra bài tập Toán trước.”\r\n\r\nChu Phàm Tần: “Cô chăm chỉ hệt như ông mặt trời vậy đó.”\r\n\r\nChung Ức: “Cảm ơn.”\r\n\r\nChung Ức thoát khỏi khung chat, tầm mắt liếc từ trên xuống dưới, rồi hơi khựng lại. Liếc thấy có bóng người tới gần, cô tránh đường theo phản xạ, nhưng ánh mắt lại bắt gặp bàn tay xương khớp rõ ràng với gân xanh ẩn hiện, dường như đã từng nhìn thấy đường bánh răng của chiếc đồng hồ màu đen kia ở đâu rồi thì phải.\r\n\r\nNhư thể bị thu hút bởi thứ gì đó, Chung Ức cứ thế nhìn chằm chằm vào bộ phận kim loại trên mặt số, hương sữa tắm của người đàn ông khiến cô lập tức nhớ đến ánh sáng của những bóng đèn sợi đốt, tiếng nước khẽ đung đưa cùng tiếng nhạc du dương nhẹ nhàng, còn cả…\r\n\r\nÁnh mắt của cô không dừng lại ở chiếc áo phông đen trước mặt nữa mà từ từ di chuyển lên trên, anh lấy một chai sữa tươi trên kệ, rồi liếc nhìn cô từ trên xuống dưới.\r\n\r\n“Thật trùng hợp.” Chung Ức tắt điện thoại, đối diện với ánh mắt càng sâu thẳm khi ở gần kia: “Vẫn chưa về nhà sao?”\r\n\r\n“Ừm.” Câu đáp lại vô cùng đơn giản, cũng giống như bản thân anh vậy, lạnh lùng mà xa cách.\r\n\r\nAnh chẳng hề ngạc nhiên khi gặp lại cô, cũng không có hứng thú tán gẫu, sau khi khẽ gật đầu bèn nhẹ nhàng đi lướt qua cánh tay cô.\r\n\r\nChung Ức cứ đứng ngây tại chỗ, sau ba giây, cô mới quay lại không gian ban đầu, nhưng lại quên mất vừa rồi mình đang định mua gì.\r\n\r\nChung Ức xách túi thực phẩm đã mua, ngồi nghỉ ngơi ở một góc, sau đó mở gói bánh xoài ra, dùng nĩa thủy tinh quét nhẹ lên mép bánh. Xoài vàng được nhúng trong lớp kem trắng như tuyết, bọc lấy miếng bánh bông lan, cô xắn một miếng đầy ăm ắp đưa vào miệng.\r\n\r\nTrên ô cửa sổ kính trong suốt từ trần đến sàn nhà cách đó ba mét, một góc siêu thị được phản chiếu lại, có cậu bé lấy gói đồ ăn vặt trên kệ, mẹ cậu nhìn thấy rồi lắc đầu, đặt lại vị trí cũ, có nhân viên kiểm đếm theo thứ tự và cho vào kệ hàng, có người đàn ông kẹp chiếc túi xách dưới cánh tay, đang đứng giữa kệ cúi đầu gọi điện.\r\n\r\nChung Ức cụp mắt xuống để xắn thêm một thìa bánh nữa, đến khi đưa lên miệng, thì tấm kính phản chiếu phía sau cô lại có thêm một bóng người. \r\n\r\nVẫn là anh, nhưng không giống anh của ngày hôm nay. Tựa như tảng băng của ngày khác, làn khói trắng đang cuồn cuộn bốc lên, đó là sự lạnh lùng tự thân, cũng là bằng chứng cho thấy nó đang không ngừng tan chảy. Hóa ra sự im lặng không phải là anh muốn tỏ ra thần bí, mà chỉ là đang cố gắng căng mặt để không tỏ ra ấm ức.\r\n\r\nMột tay anh xách bình sữa, rũ mi nhìn cô chằm chằm, cuối cùng ủ rũ hỏi: “Tại sao không trả lời tin nhắn của tớ?”',13,7,'2023-05-06 21:35:11','2023-05-11 13:22:50'),(22,2,'','Phía sau anh là tiếng ồn ào, đêm càng về khuya thì các cửa hàng càng nhộn nhịp, hai người một đứng, một ngồi tạo thành góc, cùng yên tĩnh không lên tiếng. Ánh sáng chiếu vào mắt anh, giống như hai đốm lửa nhỏ đốt cháy đống củi trong lòng cô, bùng lên thành tiếng.\r\n\r\nNhưng cô không làm gì cả, ánh mắt lặng lẽ mà dịu dàng nhìn anh, khóe môi khẽ cong: “Muốn nhận ra tớ rồi hả?”\r\n\r\nAnh bướng bỉnh nhắc lại: “Cậu không trả lời tin nhắn của tớ.”\r\n\r\n“Cả ngày tớ phải chăm lo cho Chu Phàm Tần, vừa mới tan làm không lâu.” Hai má cô động đậy, ngẩng đầu lên nhìn người đang chắn ánh đèn: “Không ngồi sao?”\r\n\r\nMôi cô có màu nhàn nhạt như trái cherry, khi ăn có lớp nước mỏng trên môi, trông kết cấu như thạch, ánh mắt anh khẽ dừng lại trên môi cô.\r\n\r\nChút kem trắng lăn tăn dính bên trên, đầu lưỡi cô quét qua, nhưng lại không hề để ý mà vẫn ngước nhìn anh với nụ cười trong veo cùng đôi mắt sáng ngời. Anh muốn giơ tay lên nhưng lại nắm chặt lại trong sự phản kháng của chính bản thân, trái tim như bị kiến cắn, ngứa ngáy không thể chịu nổi, tất cả đều là lỗi của ngày Hè!\r\n\r\nChung Ức không phát hiện ra những suy nghĩ vụn vặt của anh, cô tìm trong túi một hộp bánh ngọt khác, đặt sang bên cạnh: “Ăn cái này đi.”\r\n\r\nSau vài giây, anh ngồi xuống vị trí cách cô nửa sải tay.\r\n\r\n“Chỉ còn duy nhất một chiếc vị Việt quất, nguy hiểm thật.” Cô vừa ăn vừa lẩm bẩm, dù sao thì người nào đó rất kén ăn, ăn bánh chỉ ăn vị Việt quất.\r\n\r\n“Tớ nhớ là cậu không ăn đồ ngọt sau tám giờ tối mà.” Anh chỉ nhớ đến điều này.\r\n\r\n“Ừm, mua hộ người khác.”\r\n\r\nChiếc nĩa của anh dừng lại phía trên chiếc bánh Việt quất, sau đó đóng hộp vào, hai cánh tay buông thõng xuống, anh không nói lời nào, chỉ ủ rũ liếc nhìn cô.\r\n\r\nChung Ức nghiêng đầu quan sát anh, rồi lại ngó đến chiếc bánh kem, ánh mắt lưu luyến vài lần rồi có chút tiếc nuối, nói: “Nhưng hình như hôm nay cậu ấy không muốn ăn.”\r\n\r\nKhuôn mặt của ai kia đang như mây đen lại hóa xán lạn, hoàn toàn có thể nhìn thấy bằng mắt thường, anh mím môi, cúi đầu bắt đầu ăn. Cô ăn xong xoài và phôi bánh, rồi bưng phần kem, chống tay lên má nhìn anh: “Quen cậu lâu như vậy rồi, sở thích này của cậu chưa từng thay đổi nhỉ?”\r\n\r\nAnh giải quyết xong chiếc bánh chỉ trong hai, ba miếng, ăn sạch sẽ lại không thô lỗ, sau đó hai người nhét hộp nhựa vào túi: “Nói thừa, tớ vô cùng nhất quán, chưa từng thay đổi sở thích.”\r\n\r\nKhi vứt rác quay lại, anh trông thấy ánh mắt cô đang trầm ngâm rơi trên người mình, dưới ánh nhìn mê mang của anh, cô khẽ cười, nói: “Anh Viễn.”\r\n\r\nTay đang cầm bình sữa đưa lên của anh khẽ khựng lại, cô ghé người lại gần: “Không đúng, A Viễn.” Hai chữ cuối cùng, rõ ràng là âm lượng đã trầm xuống, như thể nhẹ nhàng ở đầu lưỡi, ẩn chứa thói quen mà người ngoài không biết.\r\n\r\nĐộng tác vặn nắp chai của anh gần như bị nhấn nút tua chậm, Chung Ức rời mắt đi, rồi lại quay về khuôn mặt anh, cắn môi cười: “Quả nhiên, thói quen hay đỏ mặt cũng chẳng thay đổi.”\r\n\r\n……\r\n\r\nSiêu thị lớn này nằm ở vị trí rất đắc địa, từ cổng phía Đông đi vào là một công viên nhỏ, những con đường quanh co, cây cầu cong nước chảy, cùng chiếc ghế đá trong bóng tối được bao quanh bởi khoảng rừng, có thể mơ hồ nhìn thấy bóng người đang âu yếm nhau. Bước trên con đường rải sỏi đi sâu vào trong, đôi tình nhân tựa vào thân cây được quét vôi trắng và trao nhau nụ hôn trong làn gió nóng ban đêm\r\n\r\n“Có muỗi.”\r\n\r\n“Đi ở nơi có ánh sáng ấy.”\r\n\r\n“Ở đây mát.”\r\n\r\n“Tại sao cậu không đeo chiếc vòng tay chống muỗi mà tớ tặng cho cậu?” Trong bóng tối, anh quay đầu tìm kiếm ánh mắt cô: “Người thu hút muỗi nhất là cậu đó.”\r\n\r\nChung Ức chắp tay sau lưng, nhìn đường dưới chân: “Thông thường tớ cũng không hay đến công viên đi bộ.”\r\n\r\nHai người từ khoảng rừng quay trở lại con đường dài dưới ánh đèn, xung quanh là đám côn trùng mùa Hè bay lượn thành vòng. Bên cạnh không ngừng có đi qua họ, trước mặt là một nhóm người già đang tản bộ, cùng nhóm thanh niên kề vai sát cánh chạy bộ buổi tối.\r\n\r\nÁnh mắt Chung Ức không còn bị đám côn trùng thu hút nữa, mà nhìn thẳng vào tấm lưng trần nóng bỏng cường tráng, phải bốn, năm giây sau cô mới nhận ra bên cạnh có người đang liên tục ho khan.\r\n\r\nChung Ức quay sang nhìn anh với sự quan tâm hiện rõ trong ánh mắt, anh lặng lẽ nhìn cô và khịt khịt mũi từ trong khoang mũi, phá tan việc cô muốn bớt thời gian ra để quan tâm anh.\r\n\r\nKhông ngờ, một đợt tiếng thở d0c nặng nề từ sau tiến tới, lại là một người đàn ông cởi tr4n chạy bộ đêm, cô lại bị thu hút, bèn vừa nhìn vừa hỏi: “Từ Án Viễn, cậu có múi bụng không?”\r\n\r\nLần này, anh thậm chí còn không thèm ậm ừ, cứ thế vô cảm nhìn về phía trước, quyết định phớt lờ cô.\r\n\r\n“Tớ phát hiện ra mình thích người có múi bụng.” Chung Ức nhìn theo bóng người biến mất nơi đầu đường, tự nghĩ tự nói.\r\n\r\nTrên nét mặt nghiêm nghị của Từ Án Viễn hiện lên vết nứt, anh cụp mắt vội vàng liếc nhìn cô, đến khi cô ngẩng đầu, anh mới rời mắt, lúng túng đáp: “Đương nhiên là có.”\r\n\r\nChung Ức mỉm cười, đôi mắt cong cong như vầng trăng: “Nhưng cậu toàn mặc đồ bơi liền thân màu đen, tớ cũng đâu có nhìn thấy.”\r\n\r\nTừ Án Viễn dừng bước, như thể đang nhớ lại điều gì đó, rồi bĩu môi cười: “Tớ muốn giữ lại sự trong sạch cho nhân gian.”\r\n\r\nTừ Án Viễn rõ cô hơn ai hết, người này cái gì cũng giỏi, có năng lực trong công việc, dịu dàng nhã nhặn, luôn kiên nhẫn, thông minh lanh lợi, nhưng cứ hễ động đến rượu là say, mà say xong lại muốn “lên cơn” rồi ngất lịm. Anh đã từng chứng kiến cô say khướt, cứ thế túm lấy cổ áo anh, ngón tay chọc hết chỗ này tới chỗ kia, mấy lần định vén vạt áo của anh lên để rúc cái đầu nhỏ của mình vào trong, không nhìn thấy cơ bắp thì quyết không chịu bỏ cuộc.\r\n\r\nLần đó, anh đã ngã xuống ghế sofa và vội vàng khống chế cô, hơi thở mềm mại của cô gái lướt qua sau tai, cổ, yết hầu, đến xương quai xanh của anh. Từ Án Viễn ngửi thấy mùi rượu thơm trên người cô, vị ngọt lịm lên men, nó khơi dậy cảm giác bồn chồn mơ hồ mà thầm kín trong cơ thể anh… Ngày hôm sau tỉnh lại, cô mở to đôi mắt nghe anh miêu tả, cũng chẳng phủ nhận, chỉ dùng ánh mắt dịu dàng, áy náy nhìn anh rồi chắp tay xin lỗi.\r\n\r\n…..\r\n\r\nMột thiếu niên trượt patin lại gần, lướt qua như cơn gió.\r\n\r\n“Đi lùi vào trong một chút, cẩn thận người ta đụng vào cậu đó.” Chung Ức kéo anh vào trong, vốn dĩ cô tưởng rằng mình đã đủ nóng rồi, vậy mà nhiệt độ cơ thể anh còn nóng hơn.\r\n\r\nGần như vào thời khắc ngay khi cô chạm vào anh, thì Từ Án Viễn đã lập tức cúi đầu, sau đó mất tự nhiên nhìn thẳng về phía trước, mặc cho cô lẩm bẩm, rồi lơ đãng đáp: “Lát nữa tớ đưa cậu về nhà.”\r\n\r\n“Sao lại không muốn đi dạo cùng tớ thế?” Cô có chút hiểu lầm, bèn chậm rãi nói: “Không cần cậu đưa, tớ tự về được.”\r\n\r\n“Không phải.” Anh nhất thời sững sờ, mím môi trầm giọng nói: “Cậu đừng nghĩ lung tung.”\r\n\r\n“Vậy thì là gì?”\r\n\r\nTừ Án Viễn hít sâu một hơi, rồi chậm rãi đáp lại: “Tối tăm mà cậu còn đến tìm tớ, vậy sao tớ có thể để cậu về một mình chứ?”\r\n\r\nKhông ngờ rằng đi dạo một vòng mà vẫn gặp cặp đôi đang hôn nhau trong rừng cây, chiếc váy hoa của cô gái đung đưa theo gió, cọ vào bắp chân của chàng trai đang mặc quần lửng, lưu lại ngứa ngáy, hệt như tâm trạng của họ khi đó vậy.\r\n\r\nChung Ức mơ hồ cong môi, cánh tay khẽ chạm vào anh, có một cảm giác tĩnh điện nhẹ nhàng như kim châm, khiến đầu óc tê dại.\r\n\r\nCô nói không đầu chẳng đuôi: “Cứ cho là vậy đi.”\r\n\r\n…..\r\n\r\nChung Ức đến nhà Chu Phàm Tần là 08 giờ 45 phút, điều làm cô ngạc nhiên là người ra mở cửa lại là ba của Chu Phàm Tần, một nhà ba người, rất hiếm khi tụ họp tại phòng khách vào giờ này, trông như đang họp gia đình vậy.\r\n\r\nGiọng nói của Ngũ Vân Sơ từ xa truyền đến: “Cô tiểu Ức, cứ vào đi, không sao đâu.”\r\n\r\n“Cô giáo tiểu Ức đã ăn sáng chưa?” Chu Húc Hoa dịu dàng mỉm cười chào hỏi, sau đó cúi người lấy trong tủ giày ra một đôi dép lê. \r\n\r\nChung Ức vội vàng đón lấy và nói cảm ơn: “Tôi dậy sớm, nên ăn xong mới tới đây.” Cô vào trong lướt nhìn, thấy Chu Phàm Tần đang rũ đầu như đóa hoa Hướng dương mất đi ánh nắng cùng hơi ấm, bèn thầm đoán ra vài phần chủ đề của buổi họp này.\r\n\r\n“Đúng lúc chúng tôi đang nói về việc học bơi.” Ngũ Vân Sơ ra hiệu cho cô ngồi xuống bên cạnh mình, Chu Húc Hoa bưng cốc nước ấm đến, khi đi qua Chu Phàm Tần thì xoa phía sau đầu cậu ấy một cái: “Còn chưa quyết định được sao?”\r\n\r\n“Con muốn học.” Một giọng nói cứng rắn truyền đến, Chu Phàm Tần ngẩng đầu, ủ rũ phản đối: “Con muốn học buổi cuối cùng.”\r\n\r\n“Được, học xong buổi học chiều nay, ngày mai không cần học nữa.” Ngũ Vân Sơ quay đầu lại, khuôn mặt sắc sảo và thanh tú dưới cặp kính không viền. Cô ta nhìn Chung Ức, nói: “Cô giáo Tiểu Ức, việc thôi học phiền cô thông báo với bên Câu lạc bộ nhé.”\r\n\r\nTrong đầu Chung Ức vẫn là hình bóng trong bể bơi dưới ánh đèn ngày hôm qua, nhìn sang cậu thiếu niên bơ phờ, đôi mắt như mất đi ánh sáng, cô không đành lòng phủ thêm một lớp bụi lên người cậu, chỉ nói: “Tôi sẽ hỏi kỹ càng việc hoàn lại học phí.”\r\n\r\n……\r\n\r\nMặc dù tình trạng của Chu Phàm Tần không được tốt trong bài kiểm tra Toán ngày hôm nay, nhưng Chung Ức vẫn hứa sẽ đưa cậu đến Câu lạc bộ bơi lội thanh thiếu niên Tinh Viễn sớm hơn nửa giờ.\r\n\r\nThời điểm tiến vào sân, trông cậu như con cá lâu ngày không gặp nước, cứ thế chạy thẳng về hướng bể bơi rồi nhảy xuống, cơ thể chìm dưới đáy, sau đó mới chậm rãi nổi lên và nằm bất động trên mặt nước.\r\n\r\nHiện tại, có rất ít người, chỉ có hai người họ ở khu vực này, Chung Ức đứng trên bờ, nhìn cậu ấy, nói: “Em thích bơi lội, nếu muốn tiếp tục bơi thì cô sẽ giúp em nói chuyện với mẹ.”\r\n\r\nChu Phàm Tần không lên tiếng.\r\n\r\n“Huy chương bạc hôm qua giành được, em đã cho họ xem chưa?”\r\n\r\nCậu nhóc lại cứ thế lật người, dùng tay gạt nước sang hai bên rồi tung chân bơi đi, hết vòng này đến vòng khác, không biết mệt mỏi, chỉ cảm nhận làn nước bằng cả cơ thể và tâm trí. Chung Ức có gọi cậu hai lần, nhưng cuối cùng chỉ đành im lặng, cậu nhóc bơi trong bể, còn cô thì đi quanh trên bờ.\r\n\r\nĐột nhiên, tư thế của cậu thay đổi, cơ thể nghiêng rồi đổ xuống, khiến nước bắn tung tóe trong bể bơi, cơ thể Chung Ức phản ứng còn nhanh hơn cả não bộ, cô cứ thế nhảy xuống bể, bơi về phía cậu ấy, nhưng vừa mới chạm vào người Chu Phàm Tần thì bị một lực mạnh kéo xuống. Chung Ức cắn răng dồn lực giữ lấy vai cậu ấy từ phía sau, để đầu cậu ló ra khỏi mặt nước, rồi bơi tới bậc thềm.\r\n\r\nCó người ở đằng xa đã nhận ra điều bất thường, bèn bơi từ mọi hướng đến để giúp đỡ, Chu Phàm Tần nằm úp sấp trên bờ, chân trái co quắp, bả vai co rúm run rẩy, cánh tay đặt trên sống mũi, che đi lông mày cùng đôi mắt, bờ môi mím chặt, có một vệt nước từ khóe mắt cậu trượt ra sau tai.\r\n\r\nCả người Chung Ức ướt sũng, cô quỳ gối bên cạnh cậu ấy, trong bóng tối bao quanh, đôi mắt cô hiện lên tia đau đớn không thể giải thích. Bỗng một chiếc khăn trắng mềm mại, thơm mùi xà phòng phủ lên người cô từ phía sau, bọc lấy cơ thể ướt đẫm của cô.\r\n\r\nNgay khi Chung Ức ngẩng đầu lên, thì một bàn tay dày và ấm đã chạm nhẹ vào đầu cô, còn người đó thì đi vòng đến vị trí bắp chân của Chu Phàm Tần và bắt đầu xoa bóp bắp chân trái cho cậu ấy.\r\n\r\n“Sẽ không sao đâu, đừng sợ.” Từ Án Viễn trầm giọng nói, giữa đám đông ồn ào, anh ngước mắt nhìn cô.\r\n\r\nChung Ức biết rằng, câu nói này là đang nói với cô và Chu Phàm Tần, anh đang trấn an hai người họ. Cô đưa tay ra, lau đi vết nước đọng trên khóe mắt Chu Phàm Tần.\r\n\r\n……\r\n\r\nChu Húc Hoa đến đưa con trai đi.\r\n\r\nTrước đó, ông ta đã một mình tới đây, vốn dĩ muốn ở bên ngoài ngắm nhìn Chu Phàm Tần bơi lội, nhưng nào ngờ lại chứng kiến cảnh con trai mình suýt chết đuối. Vào thời khắc Chung Ức nhảy xuống bể bơi, ông ta đã lớn tiếng hô hoán mọi người, đồng thời chạy về khu vực nước sâu.\r\n\r\nCó lẽ là do ý trời, Chu Húc Hoa lại nhìn thấy tình yêu và sự cống hiến hết mình mà Chu Phàm Tần dành cho bơi lội, cũng như nỗi mong manh và những đấu tranh của cậu ấy trong nguy hiểm. Cộng thêm việc chặn đứng niềm yêu thích của con trai, cuối cùng ông ta cũng phải đối mặt với việc bản thân mình đã gây ra ảnh hưởng cho con trai vì chính cuộc hôn nhân này.\r\n\r\nChung Ức quấn chăn, đi theo Từ Án Viễn đến phòng nghỉ dành cho nhân viên, cô vào trong, anh theo sau. Khi cánh cửa sau lưng đóng lại, cô tựa người vào dãy tủ, hai tay định vén khăn ra, nhưng vừa cúi đầu bèn khựng lại, rồi kéo khăn lên che kín vạt áo trước.\r\n\r\n“Cậu có áo phông màu đen không?”\r\n\r\nNhưng vừa mới quay đầu, thì bóng người đã ở ngay trước mắt, trong phòng không bật đèn, rèm kéo kín mít, khiến tầm nhìn bị giảm sút, ngay cả không khí trong khoảng cách gần cũng dường như loãng hơn. Đối diện với đôi mắt đen láy ấy, cảm giác rơi xuống đáy bể lại ùa về trong cô.\r\n\r\n“Cậu học bơi khi nào vậy?” Chung Ức còn đang đắm chìm trong sự im lặng đến ngột ngạt, thì chợt nghe thấy anh trầm giọng hỏi.\r\n\r\nCô tựa lưng vào tủ, khi bóng anh ập đến, giữa hai người chỉ có một kẽ hở có thể để gió luồn qua\r\n\r\n“Sau khi cậu chuyển trường.” Cô nói.',13,8,'2023-05-06 21:35:48','2023-05-11 13:13:06'),(23,1,'Đầu bảng phố ăn chơi','Lâu lâu mới có được một ngày nghỉ, Ôn Dĩ Phàm quyết định thức khuya để xem phim kinh dị.\r\n\r\nBộ phim này cố ý hù doạ người xem bằng những kỹ xảo tiếng động và âm nhạc rùng rợn, nhưng ngược lại không làm cô sợ hãi chút nào. Xem phim kinh dị mà lòng cô bình thản như nước sôi để nguội.\r\n\r\nVì có chứng bệnh ám ảnh cưỡng chế, cô cố gắng chống mí mắt xem cho xong phim.\r\n\r\nHàng chữ kết thúc vừa xuất hiện, Ôn Dĩ Phàm thậm chí còn có cảm giác như được giải thoát.\r\n\r\nCô nhắm mắt, suy nghĩ trong nháy mắt trở nên mù mịt. Lúc cô sắp rơi vào giấc ngủ, bất chợt, cửa phòng bị cốc cốc gõ vài cái.\r\n\r\nBịch một tiếng ——\r\n\r\nÔn Dĩ Phàm lập tức mở mắt ra. Men theo ánh trăng chiếu qua khe hở của rèm cửa sổ, cô nhìn về phía cửa phòng. Từ bên ngoài, có thể nghe được rõ ràng tiếng đàn ông say rượu đục ngầu vọng lại, cùng với tiếng lảo đảo chân nam đá chân xiêu. Sau đó là tiếng cửa bị mở ra rồi đóng lại.\r\n\r\nLại có tiếng động nho nhỏ, cô nhìn chằm chằm vào cửa mấy giây.\r\n\r\nCho đến lúc hoàn toàn an tĩnh lại, Ôn Dĩ Phàm mới buông lỏng tinh thần.\r\n\r\nCô mím môi, tự dưng cảm thấy giận dữ. Tuần này cũng mấy lần rồi.\r\n\r\nMột khi cơn buồn ngủ bị cắt ngang, Ôn Dĩ Phàm rất khó ngủ lại. Cô trở mình, lại nhắm mắt lần nữa, nhàm chán nhớ lại bộ phim vừa xem. Ôi, đây mà là phim kinh dị sao ? Loại phim này mà có thể hù dọa được ai sao?\r\n\r\nĐang lúc mơ mơ màng màng, Ôn Dĩ Phàm trong đầu mơ hồ hiện lên hình ảnh khuôn mặt quỷ trong phim. Ba giây sau, cô chợt bò dậy, bật đèn ở đầu giường.\r\n\r\nToàn bộ thời gian sau nửa đêm, cô nằm trằn trọc. Nửa ngủ nửa tỉnh, luôn cảm thấy bên cạnh có khuôn mặt quỷ dị dầm dề máu đang nhìn cô chằm chằm.\r\n\r\nCho đến khi trời sáng hoàn toàn, cô mới miễn cưỡng thiếp đi một chút.\r\n\r\nNgày hôm sau, Ôn Dĩ Phàm bị tiếng chuông điện thoại đánh thức.\r\n\r\nVì thức đêm và ngủ chưa đủ giấc, thái dương của cô giống như bị kim châm, tỉ mỉ phát đau. Cô hơi bực bội, lề mề cầm điện thoại di động lên, nhấn phím nghe.\r\n\r\nĐầu dây bên kia vang lên giọng nói của Chung Tư Kiều, thanh âm thật thấp: \"Lát nữa mình gọi lại cho cậu.\"\r\n\r\n\". . .\" Ôn Dĩ Phàm mí mắt giật giật, đầu óc bị treo máy hai giây.\r\n\r\nGọi điện thoại tới đánh thức cô. Coi như không tính đi.\r\n\r\nMà cũng chẳng nói là có chuyện gì, chỉ báo trước vậy thôi.\r\n\r\nCô tức muốn nổ tung, bật thốt lên: \"Cậu có phải không tồn. . .\"\r\n\r\nLời còn chưa nói hết, điện thoại đã bị cắt đứt.\r\n\r\nĐấm một phát mạnh vào gối, Ôn Dĩ Phàm mở mắt, cũng thấy hết tức giận.\r\n\r\nLại nằm trên giường thêm một chút, cô cầm điện thoại di động lên, liếc nhìn thời gian. Đã gần hai giờ chiều. Ôn Dĩ Phàm không nằm thêm nữa, vớ lấy cái áo khoác, mặc lên, ra khỏi chăn.\r\n\r\nĐi vào nhà vệ sinh, Ôn Dĩ Phàm đang đánh răng, điện thoại lại lần nữa vang lên. Cô với tay mở khóa màn hình, trực tiếp mở loa ngoài.\r\n\r\nChung Tư Kiều lên tiếng trước: \"Ôi trời, mới vừa gặp phải bạn học cấp ba, đầu tóc mình bê bết lại còn không trang điểm, lúng túng muốn chết!\"\r\n\r\n\"Nào có thể chết dễ dàng như vậy\". Ôn Dĩ Phàm trong miệng đầy bọt kem đánh răng, nói lúng búng: \"Cậu đây không phải chỉ là lộ mặt thật sao?\"\r\n\r\n\". . .\" Chung Tư Kiều yên lặng ba giây, lười cùng cô so đo.\r\n\r\n\"Tối nay ra ngoài chơi không? Ôn phóng viên. Ngài tăng ca cả tuần, không ra ngoài giải trí tôi sợ ngài kiệt sức mà chết đột ngột\".\r\n\r\n\"Ừ. Đi đâu?\"\r\n\r\n\"Hay là đi ngay bên cạnh cơ quan của cậu nhé? Không biết cậu có đến đó chưa. Đồng nghiệp của mình nói ở đó có quán bar, ông chủ quán dáng dấp cực kỳ đẹp trai...\"\r\n\r\nChung Tư Kiều nói tiếp: \"Này, sao bên cậu có tiếng nước chảy vậy? Cậu rửa chén à?\"\r\n\r\nÔn Dĩ Phàm: \"Rửa mặt.\"\r\n\r\nChung Tư Kiều kinh ngạc: \"Cậu mới vừa tỉnh à?\"\r\n\r\nÔn Dĩ Phàm nhẹ ừ một tiếng.\r\n\r\n\"Giờ này cũng hai giờ rồi, giờ nghỉ trưa cũng qua rồi.\" Chung Tư Kiều cảm thấy kỳ quái: \"Cậu tối qua đi làm gì?\"\r\n\r\n\"Xem phim kinh dị.\"\r\n\r\n\"Tên gì?\"\r\n\r\n\"《 Tỉnh giấc thì gặp quỷ》.\"\r\n\r\nChung Tư Kiều rõ ràng đã xem qua phim này, nghẹn một hơi: \"Đây cũng là phim kinh dị sao?\"\r\n\r\n\"Xem xong mình ngủ liền mà.\" Ôn Dĩ Phàm như không nghe cô nói, kéo khăn lông qua, lau hết nước trên mặt: \"Kết quả nửa đêm tự nhiên tỉnh lại, sau đó giống như cảnh trong phim, mình nhìn thấy quỷ\".\r\n\r\n\". . .\"\r\n\r\n\" Mình liền đánh nhau với quỷ cả đêm.\"\r\n\r\nChung Tư Kiều có chút im lặng: \"Cậu sao lại tự nhiên nói với mình đề tài này?\"\r\n\r\nÔn Dĩ Phàm nhíu mày: \"Nói đề tài này thì sao?\"\r\n\r\n\"Sao lại muốn đánh cả đêm?\"\r\n\r\n\". . .\"\r\n\r\n\"Được rồi, đừng chơi với quỷ. Chị đây mang cậu đi chơi với đàn ông.\" Chung Tư Kiều cười híp mắt \"Đẹp trai, thơm ngon, nóng hừng hực, đàn ông.\"\r\n\r\n\"Vậy thôi để mình đi chơi với quỷ còn hơn.\"\r\n\r\nCầm điện thoại di động lên, Ôn Dĩ Phàm đi ra khỏi nhà vệ sinh, \"Ít nhất không tốn tiền, miễn phí.\"\r\n\r\nChung Tư Kiều: \"Ai nói tốn tiền chứ, đàn ông mình cũng có thể chơi miễn phí nha.\"\r\n\r\nÔn Dĩ Phàm: \"Ừ?\"\r\n\r\n\"Mình chỉ dùng mắt để chơi thôi.\"\r\n\r\n\". . .\" -\r\n\r\nCúp điện thoại, Ôn Dĩ Phàm qua WeChat kể sơ lược tình huống tối hôm qua với chủ nhà. Theo đó, cô do dự thêm một câu, hợp đồng đến kỳ sau, có thể sẽ không thuê tiếp nữa.\r\n\r\nHai tháng trước, cô từ Nghi Hà dọn tới thành phố Nam Vu.\r\n\r\nNhà thuê là do Chung Tư Kiều tìm giúp, cũng không có vấn đề lớn lao gì. Chỉ bất tiện là, đây là một dãy phòng cho thuê chung. Chủ nhà đem một cái nhà tám mươi mét vuông cải tạo thành ba căn phòng độc lập, mỗi căn phòng có một nhà vệ sinh. Cho nên không có phòng bếp và sân phơi. Nhưng được cái giá cả khá mềm. Ôn Dĩ Phàm không có yêu cầu cao đối với chỗ ở. Huống chi nơi này giao thông tiện lợi, bốn phía cũng náo nhiệt. Cô còn cân nhắc sẽ ký tiếp hợp đồng thuê.\r\n\r\nCho đến ngày hôm đó, cô lúc ra cửa vừa vặn đụng phải người đàn ông ở sát vách. Dần dần trở thành tình trạng như bây giờ.\r\n\r\nTrong lúc không để ý, mặt trời đã xuống núi, căn phòng nhỏ bị một tầng bóng tối bao trùm. Nhà nhà đèn đuốc lục tục thắp lên, cả thành phố chuyển mình sang một trạng thái khác, chợ đêm cũng dần dần náo nhiệt.\r\n\r\nThấy sắp đến giờ hẹn, Ôn Dĩ Phàm thay quần áo, rồi sau đó trang điểm đơn giản.\r\n\r\nChung Tư Kiều ở WeChat không ngừng oanh tạc cô.\r\n\r\nKéo kéo lại áo khoác, Ôn Dĩ Phàm đáp một câu \"Bây giờ mình đi đây\" .\r\n\r\nCô đi ra ngoài, liếc nhìn phía đối diện, không tự chủ được đi nhanh hơn một chút, ra đến sảnh cầu thang liền xuống lầu.\r\n\r\nHai người hẹn gặp nhau ở trạm xe lửa.\r\n\r\nNơi định đến là quán rượu Chung Tư Kiều nhắc đến trưa nay, vị trí ở phía đối diện quảng trường Thượng An. Xuyên qua một đường hầm, là có thể thấy liên tiếp không ngừng những chuỗi đèn nê ông, tô điểm trên mỗi bảng hiệu của các cửa hàng mặt tiền.\r\n\r\nNơi này chỉ có ban đêm mới có thể náo nhiệt như vậy.\r\n\r\nĐây là dãy quán bar nổi tiếng ở Nam Vu, được mọi người gọi là Phố Đọa Lạc.\r\n\r\nBởi vì chưa từng đến, hai người tìm nửa ngày, rốt cuộc ở một góc nhỏ tìm thấy được quán bar này. Tên còn thật có ý nghĩa, gọi là \"Tăng ca\" .\r\n\r\nBảng hiệu của quán rất đơn giản. Màu đen tuyền, kiểu chữ vuông vắn ngay ngắn, thuần một màu trắng. Giữa một đống đèn nê ông sặc sỡ giương nanh múa vuốt xung quanh, bảng hiệu khiêm tốn này ngược lại thật nổi bật.\r\n\r\n\"Ý tưởng này rất tốt, \" Ôn Dĩ Phàm nhìn chằm chằm nhìn chốc lát, có ý phê bình, \"Trong quán bar này chắc có dịch vụ mờ ám gì, nên phía trước mới bày ra vẻ nghiêm túc như vậy\"\r\n\r\nChung Tư Kiều hơi bĩu môi, dắt cô đi vào trong: \"Đừng nói nhảm.\"\r\n\r\nKhông ngờ, bên trong không hề như Ôn Dĩ Phàm nghĩ, cả quán lạnh tanh.\r\n\r\nCác cô đến tương đối sớm, vẫn chưa tới giờ cao điểm, nhưng trong tiệm chỗ ngồi đã linh linh tán tán bị chiếm hơn nửa.\r\n\r\nTrên khán đài có một nữ ca sĩ đang nhẹ nhàng hát, không khí trữ tình lãng mạn.\r\n\r\nQuầy bar phía trước, người pha chế nhuộm một đầu tóc vàng, lúc này đang uyển chuyển pha rượu, dáng điệu ung dung và thành thục.\r\n\r\nTìm một chỗ ngồi ngồi xuống, Ôn Dĩ Phàm chọn loại rượu phổ biến nhất.\r\n\r\nChung Tư Kiều đi bốn phía nhìn một vòng, ánh mắt tìm kiếm: \"Ông chủ có phải không có ở đây không, mình không thấy ai có dáng dấp đẹp trai cả?\"\r\n\r\nÔn Dĩ Phàm không để ý, thờ ơ nói: \"Có thể chính là cậu pha rượu đó.\"\r\n\r\n\"Không thể!\" Chung Tư Kiều rõ ràng không thể nào đồng ý. \"Đồng nghiệp đó của mình đến phố này nhiều năm, nói chủ quán bar này là đầu bảng* của phố Đọa Lạc\"\r\n\r\n(*đầu bảng: trai bao hạng nhất)\r\n\r\n\"Nói không chừng là tự xưng.\"\r\n\r\n\"?\"\r\n\r\nChú ý tới ánh mắt bất thiện của Chung Tư Kiều, Ôn Dĩ Phàm ngồi thẳng lại, nhấn mạnh: \"Nói không chừng là vậy.\"\r\n\r\nChung Tư Kiều hừ một tiếng.\r\n\r\nHai người lại lúc có lúc không trò chuyện. Chung Tư Kiều nhắc tới chuyện buổi trưa: \"Đúng rồi, người mình gặp phải hôm nay là lớp phó học tập lớp mười của mình, đại học cậu ta cũng học Nam đại, hình như còn ở cùng phòng ký túc xá với Tang Diên.\"\r\n\r\nNghe được cái tên này, Ôn Dĩ Phàm hơi ngạc nhiên.\r\n\r\n\"Nhắc tới, cậu còn nhớ ——\" vừa nói, Chung Tư Kiều tầm mắt tùy ý liếc một cái, đột nhiên hướng phía quầy bar, \"A, cậu nhìn hướng mười giờ, có phải là \'đầu bảng phố Đọa Lạc\' không ?\"\r\n\r\nĐồng thời, Ôn Dĩ Phàm nghe được có người gọi một tiếng \"Anh Diên\".\r\n\r\nCô nhìn theo.\r\n\r\nKhông biết từ khi nào, có một người đàn ông đứng bên cạnh người pha rượu. Bên trong quầy bar ánh sáng mờ mờ, anh ta nửa dựa dọc theo bàn, cả người đưa lưng về phía quầy bar, hơi quay sang bên như là đang cùng người pha chế nói chuyện.\r\n\r\nMặc chiếc áo lạnh màu đen, vóc người cao lớn lại thẳng tắp, lúc này anh chợt hơi khom lưng, xoay người lại.\r\n\r\nTròng mắt đen nhánh, thần sắc lãnh đạm, hơi có vẻ bất cần đời. Đèn xoay màu sắc rực rỡ trên trần rọi đến, rơi xuống tạo thành mấy vệt sáng trên mặt anh.\r\n\r\nÔn Dĩ Phàm trong nháy mắt nhận ra anh.\r\n\r\n\"Bà nó.\"\r\n\r\nĐại khái là cùng lúc cô phát hiện, Chung Tư Kiều cao giọng lên, hết sức khiếp sợ nói, \"Chị em gái mà, đây là đầu bảng Tang Diên á !\"\r\n\r\n\". . .\"\r\n\r\n\"Làm sao mình vừa nhắc tới tên anh ta là gặp được người rồi. Cậu còn nhớ anh ta không? Trước khi cậu chuyển trường, anh ấy còn theo đuổi cậu. . .\"\r\n\r\nNghe được câu này, Ôn Dĩ Phàm hơi rũ mắt xuống.\r\n\r\nVừa lúc đó có nhân viên bồi bàn đi ngang qua, Ôn Dĩ Phàm có chút không được tự nhiên, bỗng nhiên bên tai truyền tới một tiếng thét kinh hãi.\r\n\r\nCô ngẩng đầu, chỉ thấy cậu bồi bàn như bị ai đụng phải, cái mâm trong tay hơi nghiêng, ly rượu đặt bên trong ngã xuống, hướng về phía cô.\r\n\r\nRượu xen lẫn đá cục, theo vai trái của cô trượt xuống. Cô hôm nay mặc quần áo rộng thùng thình, lúc này hơn nửa bên áo bị ướt, cái lạnh thấm vào. Cô cảm thấy lạnh cóng đến nỗi da đầu như tê dại. Ôn Dĩ Phàm hít một hơi, phản xạ có điều kiện đứng lên.\r\n\r\nTrong bar âm thanh ồn ào, nhưng động tĩnh ở bên này cũng không coi là nhỏ.\r\n\r\nGiống như bị hù dọa, cậu bồi bàn mặt mũi trắng bệch, luôn miệng nói xin lỗi.\r\n\r\nChung Tư Kiều cũng đứng lên, giúp Ôn Dĩ Phàm đem đá cục trên áo phủi xuống, cau mày nói: \"Không sao chứ?\"\r\n\r\n\"Không có chuyện gì\" Ôn Dĩ Phàm thanh âm không khống chế được run rẩy, nhưng cũng không tức giận, nhìn về phía cậu bồi bàn.\r\n\r\n\"Không cần nói xin lỗi nữa, sau này chú ý một chút là được.\"\r\n\r\nSau đó cô nhìn Chung Tư Kiều nói: \"Mình vào phòng vệ sinh xử lý một chút.\"\r\n\r\nNói xong, cô hơi giương mắt nhìn quanh.\r\n\r\nVô ý bắt gặp một ánh mắt. Thâm thúy, lãnh đạm mà lại mịt mờ không rõ.\r\n\r\nCách hai giây.\r\n\r\nÔn Dĩ Phàm thu hồi tầm mắt, đi về phía nhà vệ sinh nữ.\r\n\r\nVào một buồng vệ sinh, cô cởi áo lông xuống, bên trong chỉ còn lại một lớp áo mỏng. May mắn là cách lớp áo lông dày nên không bị ướt nhiều. Ôn Dĩ Phàm ôm theo áo lông đi tới bồn rửa tay, dùng khăn giấy thấm chút nước, miễn cưỡng đem rượu trên người lau sạch.\r\n\r\nXử lý qua loa xong, cô đi ra ngoài.\r\n\r\nKhóe mắt thấy ở hành lang có một bóng người đang đứng, Ôn Dĩ Phàm vô ý thức nhìn sang, bất chợt dừng chân.\r\n\r\nNgười đàn ông dựa nhẹ vào tường, trong miệng cắn điếu thuốc, mí mắt hơi rũ, thần sắc nhàn tản lãnh đạm. Chỉ khác so với lúc ở quầy bar là lúc này anh đã cởi áo khoác ra, cầm lỏng lẻo trên tay.\r\n\r\nCách lần cuối gặp mặt, đã qua sáu năm.\r\n\r\nKhông xác định được anh có nhận ra cô hay không, Ôn Dĩ Phàm cũng không biết có nên chào hỏi không. Vùng vẫy không đến một giây, cô hạ thấp tầm mắt, dứt khoát giả vờ như cũng không nhận ra anh, nhắm mắt tiếp tục đi ra ngoài.\r\n\r\nHành lang hơi tối, chỉ có ánh sáng phản chiếu từ bức tường cẩm thạch bên cạnh. Ở chỗ này còn có thể nghe được tiếng nữ ca sĩ hát, rất nhẹ, mang theo triền miên cùng lưu luyến.\r\n\r\nCàng ngày càng gần.\r\n\r\nSắp đi ngang qua anh.\r\n\r\nVào lúc này.\r\n\r\n\"Này.\" Anh như có như không mà cất tiếng, ngữ điệu lười biếng.\r\n\r\nÔn Dĩ Phàm ngừng lại, đang muốn nhìn sang. Không một chút phòng bị, Tang Diên đột nhiên đem áo khoác trên tay quay đầu ném tới, che hơn phân nửa tầm mắt của cô.\r\n\r\nÔn Dĩ Phàm sửng sốt một chút, lập tức thò tay kéo áo xuống, hơi ngơ ngác.\r\n\r\nTang Diên vẫn không ngẩng đầu, cúi xuống, đem thuốc dập tắt ở bên cạnh thùng rác.\r\n\r\nHai người không ai chủ động nói gì.\r\n\r\nTựa như qua rất lâu, trên thực tế cũng chỉ qua mấy giây. Tang Diên chậm rãi ngước mắt, cùng cô ánh mắt đối nhau. Trên khuôn mặt mang theo vẻ hời hợt.\r\n\r\n\"Nói chuyện một chút\". Anh nói.',12,15,'2023-05-06 22:03:57','2023-05-11 13:12:55');
/*!40000 ALTER TABLE `chuong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quyentacgia`
--

DROP TABLE IF EXISTS `quyentacgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quyentacgia` (
  `idYeucau` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `tinhtrang` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idYeucau`),
  KEY `fk_yc_user_idx` (`user_id`),
  CONSTRAINT `fk_yc_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quyentacgia`
--

LOCK TABLES `quyentacgia` WRITE;
/*!40000 ALTER TABLE `quyentacgia` DISABLE KEYS */;
/*!40000 ALTER TABLE `quyentacgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theloai`
--

DROP TABLE IF EXISTS `theloai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theloai` (
  `truyen_theloai` int NOT NULL AUTO_INCREMENT,
  `ten_theloai` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`truyen_theloai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theloai`
--

LOCK TABLES `theloai` WRITE;
/*!40000 ALTER TABLE `theloai` DISABLE KEYS */;
INSERT INTO `theloai` VALUES (1,'Ngôn tình',NULL,'2023-05-10 22:35:03'),(2,'Đam Mỹ',NULL,NULL),(3,'Đô thị',NULL,NULL),(4,'Xuyên không','2023-05-10 22:02:37','2023-05-10 22:35:38');
/*!40000 ALTER TABLE `theloai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truyen`
--

DROP TABLE IF EXISTS `truyen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `truyen` (
  `truyen_id` int NOT NULL AUTO_INCREMENT,
  `truyen_ten` text NOT NULL,
  `truyen_img` text,
  `truyen_theloai` varchar(45) DEFAULT NULL,
  `truyen_mota` text NOT NULL,
  `truyen_ngaydang` date DEFAULT NULL,
  `truyen_tinhtrang` mediumtext NOT NULL,
  `TacGia` text,
  `iduser` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`truyen_id`),
  KEY `truyen_theloai_idx` (`truyen_theloai`),
  KEY `iduser_idx` (`iduser`),
  CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truyen`
--

LOCK TABLES `truyen` WRITE;
/*!40000 ALTER TABLE `truyen` DISABLE KEYS */;
INSERT INTO `truyen` VALUES (12,'Khó dỗ dành','img/uploads/Khó dỗ dànhKhó dỗ dànhkhododanh.jpg','1','Tình cờ, Ôn Dĩ Phàm cùng người bạn học cấp ba từng bị cô cự tuyệt là Tang Diên thuê chung một nhà.\r\nHai người nước giếng không phạm nước sông, như hai người xa lạ sống dưới cùng một mái hiên.\r\nCuộc sống bình yên dừng lại ở một buổi sáng. \r\nTối trước đó Ôn Dĩ Phàm ngủ ở phòng mình, vậy mà sáng hôm sau lại tỉnh dậy ở trên giường Tang Diên.               ','2023-05-06','Chưa hoàn thành','Trúc Dĩ',4,'2023-05-06 20:24:46','2023-05-06 21:02:34'),(13,'Thiết lập mùa hè','img/uploads/Thiết lập mùa hèThiết lập mùa hèthietLapMuaHe.jpg','1','Dưới ánh đèn vàng mờ ảo, ánh mắt Chung Ức chẳng thể rời khỏi trai đẹp, trước cái nhìn càng ngày càng trở nên bất mãn của người bên cạnh, cô lên tiếng hỏi: “Từ Án Viễn, cậu có múi bụng không?”\r\n\r\nAnh hừ lạnh, chẳng buồn trả lời.\r\n\r\nCô nói: “Tớ phát hiện ra mình rất thích người có múi bụng.”\r\n\r\nTừ Án Viễn bĩu môi, không vui, đáp: “Đương nhiên là có.”\r\n\r\nGặp lại giữa ngày hè, cùng thắp sáng cho nhau.','2023-05-06','Chưa hoàn thành','Kỉ Ngọc',4,'2023-05-06 21:34:51','2023-05-06 21:34:51');
/*!40000 ALTER TABLE `truyen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `role` int NOT NULL,
  `role_detail` varchar(45) NOT NULL,
  PRIMARY KEY (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (-1,'non_per'),(1,'Admin'),(2,'Người đọc'),(3,'Tác giả');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_idx` (`role`),
  CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `user_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user','$argon2id$v=19$m=65536,t=4,p=1$d3pXQ3ExdnYxOEg1cDhZWA$x6T55KeEdpWoQramrXZyC9J7fj6T2xRgOlDezGa2oeI','user','user1@gmail.com','2023-04-10 00:00:00','2023-04-10 00:00:00',2),(2,'nguyenkhoa','$argon2id$v=19$m=65536,t=4,p=1$N1lmVE5yL3FaT1oxSk5VZQ$dgyPx8YF5bmrbQryf1T0qfTT4SpqbNHL+LdofTCNofk','nguyenkhoa','nguyenkhoaht002@gmail.com','2023-04-17 10:48:30','2023-05-02 23:04:38',3),(3,'admin','$argon2id$v=19$m=65536,t=4,p=1$czZSeWhjbkJZRjlTbWhITg$BO3vqSv1CK1pQazKdVWa2QP5hD6ZQYN2j2INzUmFp2M','admin','admin@gmail.com','2023-05-06 19:49:18','2023-05-06 19:49:18',1),(4,'thanhdung','$argon2id$v=19$m=65536,t=4,p=1$UjJjWXN0aHJvdUw4bkdIbw$P+1V0KFy/Y6QBIdtEnEhVVFn/J5RYeSlGWi43xKdvAw','Thanh Dung','thanhdung@gmail.com','2023-05-06 20:21:26','2023-05-06 20:21:26',3),(7,'luuly','$argon2id$v=19$m=65536,t=4,p=1$dzVGOXplRzR2N3BUa3JiUQ$PZ3VQp7IzQYIVZ+1dUrW1HTCgj2mm/je8LKvHHC8isw','Lưu Ly','ly@gmail.com','2023-05-10 21:14:27','2023-05-10 21:14:27',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yeuthich`
--

DROP TABLE IF EXISTS `yeuthich`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `yeuthich` (
  `truyen_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`truyen_id`,`user_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `truyen_id_idx` FOREIGN KEY (`truyen_id`) REFERENCES `truyen` (`truyen_id`),
  CONSTRAINT `user_id_idx` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yeuthich`
--

LOCK TABLES `yeuthich` WRITE;
/*!40000 ALTER TABLE `yeuthich` DISABLE KEYS */;
INSERT INTO `yeuthich` VALUES (12,2,'2023-05-07 22:23:26','2023-05-07 22:23:26'),(12,4,'2023-05-07 21:33:04','2023-05-07 21:33:04');
/*!40000 ALTER TABLE `yeuthich` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2023-05-11 19:35:48
