DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_food` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `cart` WRITE;
INSERT INTO `cart` VALUES (1,1,3,153,'S',0),(2,1,3,39,'M',0),(3,1,1,8,'S',0),(4,1,2,105,'S',0),(5,1,2,12,'M',0),(6,1,2,46,'L',0);
UNLOCK TABLES;



DROP TABLE IF EXISTS `foods`;
CREATE TABLE `foods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `isDelete` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `foods` WRITE;
INSERT INTO `foods` VALUES (1,'Cà phê sữa đá','https://product.hstatic.net/1000075078/product/cfsd_615a3cb2b1e342d2b1986bfeb6572070_master.jpg',20000,1,0),(2,'Trà sữa trân châu','https://cf.shopee.vn/file/8e3b9b9d57559962a52c7699f98a0c67',30000,1,0),(3,'Trà đào cam sả','https://product.hstatic.net/1000075078/product/tra_dao_5f3925d9bfca4d0abc17f95b05fff5f7.jpg',40000,1,0),(4,'Sữa chua Kiwi','https://suachuatranchauhalong.vn/wp-content/uploads/2020/03/S%E1%BB%AFa-chua-Kiwi.png',70000,2,1),(5,'Mì xào trứng','https://vncooking.com/files/cuisine/2019/10/07/mi-xao-trung-don-gian-nxcu.png',30000,0,0),(6,'Cá viên chiên','https://product.hstatic.net/1000356263/product/cach-lam-ca-vien-chien-5-600x336_1024x1024.jpg',20000,0,0),(7,'Bò viên chiên','https://file.hstatic.net/1000356263/file/bo_vien_chien29822_32ce24433c3b47128082a3e7ae97a4c3_grande.jpg',20000,0,1),(8,'Xúc xích chiên','https://karaokebaonhu.com/wp-content/uploads/2017/09/xuc-xich-chien.jpg',15000,0,1),(9,'Bún bò','https://monngonbamien.org/wp-content/uploads/2019/10/cach-nau-bun-bo-hue-mien-nam-de-ban-don-gia-chuan-vi-ngon-nhat.jpg',30000,0,1),(10,'Cà phê đen','https://product.hstatic.net/1000075078/product/cf_da_copy_a33d6e77f8da405bba9da541744dcea9_master.jpg',20000,1,1),(11,'Bạc xỉu đá','https://www.huongnghiepaau.com/wp-content/uploads/2019/09/cach-pha-bac-xiu-3-tang.jpg',25000,1,0),(12,'Bạc sỉu nóng','https://classiccoffee.com.vn/files/product/bac-xiu-nong-aT6U9J.jpg',20000,1,1),(13,'Trà sữa khoai môn','uploads/13.png',25000,1,0),(14,'Cơm gà xối mỡ','uploads/14.jpg',30000,0,0),(15,'Lục trà Machiato','uploads/15.jpg',40000,1,0);
UNLOCK TABLES;



DROP TABLE IF EXISTS `infor_ship`;
CREATE TABLE `infor_ship` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `infor_ship` WRITE;
UNLOCK TABLES;



DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_order` int DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_price_item` int DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `order_detail` WRITE;
UNLOCK TABLES;



DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ship` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `total_qty` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `orders` WRITE;
UNLOCK TABLES;



DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_food` int DEFAULT NULL,
  `size_s` int DEFAULT NULL,
  `size_m` int DEFAULT NULL,
  `size_l` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `size` WRITE;
INSERT INTO `size` VALUES (1,1,1,1,0),(2,2,1,1,1),(3,3,1,1,0),(4,4,1,1,1),(5,5,0,0,0),(6,6,0,0,0),(7,7,0,0,0),(8,8,0,0,0),(9,9,0,0,0),(10,10,1,1,0),(11,11,1,1,0),(12,12,1,1,0),(13,13,1,1,1),(14,14,0,0,0),(15,15,1,1,0);
UNLOCK TABLES;



DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `role` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `user` WRITE;
INSERT INTO `user` VALUES (1,'admin','$2y$10$s91MKkZkGSVH1qK7b1gdcuHKzU3OFfthP3lB7kVMT8h2Fde0xy5cm',0),(3,'hakihome1412','$2y$10$vPE24znNIIf6bTjYzz5S2e1ALjYo9cpwdcGAwJu89NjPqx6ANmTkG',1),(4,'hakihome1412123','$2y$10$bYvTxR1YzOM/7gbUttlFK.s7PWlL67EQWud8H8FNm1uYcEdbHSl/m',1),(5,'mit123','$2y$10$Qocn3iLUNrfSeL.u.hkrGuyjSz0AmEHZGJAgmRldvbdEshP8ExV2q',1),(6,'mit','$2y$10$a1XOnQoCmPFDgnguWMGNlOBx1/lD4uvcCCsqnhLZWjxXUO.1Pb.vm',1),(7,'mit2','$2y$10$pzMlp8r8ASFCoYyvhZt9PeWxT1LHcwM220neBnBRDGnbX7MVIjo32',1);
UNLOCK TABLES;
