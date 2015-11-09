/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.46-cll : Database - u0793166_gaep
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`name`,`deskripsi`) values (1,'SEKOLAH','Pelajaran SMA');
insert  into `kategori`(`id`,`name`,`deskripsi`) values (2,'UMUM','Teknologi Informasi Tingkat SMA');
insert  into `kategori`(`id`,`name`,`deskripsi`) values (3,'PERGURUAN TINGGI','Perguruan Tinggi');

/*Table structure for table `subkategori` */

DROP TABLE IF EXISTS `subkategori`;

CREATE TABLE `subkategori` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `deskripsi` text,
  `icon` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_fk_sub` (`kategori_id`),
  CONSTRAINT `kategori_fk_sub` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subkategori` */

insert  into `subkategori`(`id`,`kategori_id`,`nama`,`deskripsi`,`icon`) values (1,1,'SD','Tutorial pada tingkat SD/MI','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation');
insert  into `subkategori`(`id`,`kategori_id`,`nama`,`deskripsi`,`icon`) values (2,1,'SMP','Tutorial pada tingkat SMP/MTs','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation');
insert  into `subkategori`(`id`,`kategori_id`,`nama`,`deskripsi`,`icon`) values (3,1,'SMA','Tutorial pada tingkat SMA/MAN','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation');
insert  into `subkategori`(`id`,`kategori_id`,`nama`,`deskripsi`,`icon`) values (4,2,'KOMPUTER','Tutorial Mengenai Komputer','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation');
insert  into `subkategori`(`id`,`kategori_id`,`nama`,`deskripsi`,`icon`) values (5,2,'ILMU KESEHATAN','Tutorial Mengenai Ilmu Kesehatan','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation');
insert  into `subkategori`(`id`,`kategori_id`,`nama`,`deskripsi`,`icon`) values (6,1,'SMK','Tutorial pada tingkat SMK','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation');

/*Table structure for table `tutorial` */

DROP TABLE IF EXISTS `tutorial`;

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `thumb` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tag` varchar(1000) DEFAULT NULL,
  `subkategori_id` int(11) DEFAULT NULL,
  `deskripsi` text,
  `downloads` bigint(20) DEFAULT '0',
  `views` bigint(20) DEFAULT '0',
  `like` bigint(20) DEFAULT '0',
  `share` bigint(20) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tutorial_user_fk` (`user_id`),
  KEY `subkategori_fk` (`subkategori_id`),
  CONSTRAINT `subkategori_fk` FOREIGN KEY (`subkategori_id`) REFERENCES `subkategori` (`id`),
  CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tutorial` */

insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (4,'Mengisi Record Tabel Base','uploads/tutorial/tutorial_4.zip',NULL,8,NULL,1,'Bagian dari Tutorial base tentang Mengisi Record Tabel Base',0,3,0,0,'2015-10-22 07:47:11','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (5,'Sesuatu Tutorial','uploads/tutorial/tutorial_5.pdf',NULL,8,NULL,1,'Yay',0,0,0,0,'2015-10-22 07:02:18','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (6,'Cobain','uploads/tutorial/tutorial_6.pdf',NULL,11,NULL,1,'Jadi ini adalah',0,4,0,0,'2015-10-26 09:11:23','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (7,'Set ukuran lebar dan tinggi sel','uploads/tutorial/tutorial_7.zip',NULL,10,NULL,3,'open office calc (materi Set ukuran lebar dan tinggi sel)',0,5,0,0,'2015-10-22 07:35:55','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (8,'denah Ka\'bah','',NULL,NULL,NULL,3,'denah Ka\'bah secara singkat',3,6,0,0,'2015-10-22 07:51:31','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (9,'denah Ka\'bah','uploads/tutorial/tutorial_9.zip',NULL,10,NULL,3,'denah Ka\'bah sederhana',1,5,0,0,'2015-10-22 07:56:20','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (10,'tutorial ikatan kovalen unsur N dan F','uploads/tutorial/tutorial_10.zip',NULL,13,NULL,3,'Ikatan kovalen antara unsur Nitrogen dengan unsur Flour. Nitrogen dengan nomor atom 7 yang mempunyai 5 elektron valensi dan unsur F dengan nomor atom 9 mempunyai 7 elektron valensi, sehingga ikatan unsur N dan F membentuk ikatan kovalen.',0,2,0,0,'2015-10-22 14:53:19','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (11,'fikih ibadah','uploads/tutorial/tutorial_11.zip',NULL,12,NULL,3,'coba lagi',0,3,0,0,'2015-10-22 14:56:40','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (12,'','uploads/tutorial/tutorial_12.zip',NULL,16,NULL,NULL,NULL,0,0,0,0,'2015-10-22 15:04:24','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (13,'','uploads/tutorial/tutorial_13.zip',NULL,16,NULL,NULL,NULL,0,0,0,0,'2015-10-22 15:05:08','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (14,'','uploads/tutorial/tutorial_14.zip',NULL,16,NULL,NULL,NULL,0,0,0,0,'2015-10-22 15:06:38','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (15,'tutorial bahasa inggris','uploads/tutorial/tutorial_15.zip',NULL,17,NULL,3,'text narrative',2,3,0,0,'2015-10-22 15:42:05','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (16,'','uploads/tutorial/tutorial_16.zip',NULL,16,NULL,NULL,NULL,0,0,0,0,'2015-10-22 15:09:39','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (17,'INTEGRAL','uploads/tutorial/tutorial_17.zip',NULL,19,NULL,3,'MENENTUKAN LUAS DAERAH ',0,3,0,0,'2015-11-02 14:51:38','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (18,'tutorial pkn','uploads/tutorial/tutorial_18.zip',NULL,21,NULL,3,'lambang negara Indonesia',0,2,0,0,'2015-10-22 15:19:19','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (19,'Tutorial BK ','uploads/tutorial/tutorial_19.zip',NULL,14,NULL,3,'Panduan Bimbingan Karier',0,2,0,0,'2015-10-22 15:21:36','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (20,'FISIKA','uploads/tutorial/tutorial_20.rar',NULL,23,NULL,3,'MENENTUKAN IMPEDANSI DAN ARUS  PADA RANGKAIAN R-L-C',0,2,0,0,'2015-10-22 15:42:00','0000-00-00 00:00:00');
insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`like`,`share`,`created`,`modified`) values (21,'latihan tutorial','uploads/tutorial/tutorial_21.zip',NULL,24,NULL,3,'struktur virus',0,4,0,0,'2015-10-26 09:11:38','0000-00-00 00:00:00');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `realname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (7,'gunturbudi','Guntur Budi','JsPWVomlEYPlLzmd5ssagOayAh4fJmzZ','$2y$13$oK3hXZLmH2uK26VntpViqejD4cWXXRB66GL/klEsTb8SfTMLwCwJ6',NULL,'gunturbudi@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (8,'budi','Budi Herwanto','SvwbJA098bfmi6ubCwDTS2yugDQH9hnX','$2y$13$Xdwnfze29fgnVpkVgOhojuVjBBUQA8CbIz3wZLfVq7M7541kGLYQ.',NULL,'budi@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (9,'zamah','Zamah Syari','ricJnPPGFYHVKSQexNPmQ03vTs_I6ofw','$2y$13$wJRidHaxY.0nHDMD8rOauOawIBCdtoq49lg80gu3KhswBNfbs96De',NULL,'zmachmobile@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (10,'lukman','Lukman Heryawan','ZZV9vgt7SayHuGEGbWA2A9bqUT_07QOA','$2y$13$xRN9S8a..YTLUWK64zAEne6dDkbx/SmJhTw8Oks9pMIoUT.P1liR6',NULL,'heryawan.lukman@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (11,'guntur','Guntur Budi Herwanto','_tOuo7-l2vbXykzkWW-bfIZcys8EYK05','$2y$13$IWNN1Akex2HDB2iE94YEMuj207b7YDtWsxY57aVDU6jTZBqLzYyxu',NULL,'gunturbudiherwanto@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (12,'Sae full','Sae full','weoC2f_eoeJH1JNDmjC9Jky8FosL_koC','$2y$13$qqzyNpKbgq3CPq/XLsP/p.xlxwHJvvJLPf2FDnD/DbcgP9e4iVq1e',NULL,'abukhansa76@yahoo.co.id',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (13,'sitinuroniyah','sitinuroniyah','PO3AStnrNZAQE2EKeHopgvFl5IpCQbGu','$2y$13$IB51OCrFJXx.RGQsBKzVDOEDWdBPFvY7t.0jIL3..H0dq7Fk1XIB2',NULL,'sitinuroniyah73@gmail.id',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (14,'Himmah','Himmah Hidayatun','Xed-gC0NDHh29HJ58RV58z9VsNQoMUtN','$2y$13$ZFYyxy8gdgMUram72nqXfekV0w83KxeY0c56qNaAMsfgnyAMb5v7m',NULL,'himmahpraptono@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (15,'Bu Nurrohmah','Nurrohmah','UKewo-MLDtSGxffZ3ST3n3I4EKtfln_t','$2y$13$A9IbRWKf5HjqWmZ8UFinYear9OAS5SaOsULQSPAPYAg0m9r3zkvZ2',NULL,'noorrochmah@yahoo.co.id',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (16,'hibana','hibana yusuf','Z6T9YeVXIk34rJUjqNGG3U56IJR4mbHC','$2y$13$Mm9jjxS6jftG3w15qe8DhO8mJVOP.zPNQ0aOgVu/dz8FbuK6bxaFW',NULL,'hibanayusuf@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (17,'EKA RAHMAWATI','EKA','XBw2kEVpMd9Tt67SwUG0hM1BN5Xb1qnn','$2y$13$i8kvDjZTJueHuAVM1j2V1eBvID2Q2ej80nPwDt.aZlyID53Gz.NZG',NULL,'batikmorinda_2008@yahoo.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (18,'Saptiwahyuni','Sapti Wahyuni','Pf-0QG6cxfQoaAZP4PNr3H0jawsJRIf8','$2y$13$E5wpwvLzHBtdQ9hvIdDqTezTXbum6NB5BKQEG2UI8VeZRy.1jcbZe',NULL,'saptiwahyuni@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (19,'SITI NURHASANAH K.','SITI NURHASANAH K.','3iHIrfjL73OCw73Y6TeQ280XqjscAFdf','$2y$13$UafdJQIlsxP/KhMZ/sXUSewa2MP3SQ.uLUk1UQI835TR0.QYFEasW',NULL,'titikfauzi@yahoo.co.id',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (20,'kholifdiniawati','Kholif diniawati','75L3HhSmC23tMKP6-Xrks3UgtEpoC88B','$2y$13$qoAlPEdiUo9eoA4uXFFq6.GPdKA083iTzdwHOL.jx8k7ojynGmf1e',NULL,'kholifdiniawati@yahoo.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (21,'yuni','yuni pratiwi','lF2rz5jDo3q67LAv8HXejWsA0jg03L3W','$2y$13$gSVZztgTXoLiXC3DVU/YzuYsgFovXEXFCZzVmhB.JlYC6X83BFyLm',NULL,'yunipratiwi_man@yahoo.co.id',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (22,'antara','mulyantara','e4g8rLMYZ2VRy5EHkBDGVPDUyW8ozMnX','$2y$13$9Iu.WhuLyC5SdkWjlSKaL.02luJMfTvGZ7pgKIynE6vX4fSx744Dy',NULL,'mulyantaraspd@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (23,'PARWITI','PARWITI','gbRUIleBIOqDwsHv37p4o4Wat1AY_b7b','$2y$13$dqUoNdH5bfnUXcYaGvMHw..GHXmYhr6wkuksRREe6/6otNkAPxa6q',NULL,'parwiti@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (24,'nana','sumarna','F75qugfGrQ3EnLiWnXjiqoVJN8_Vf1aS','$2y$13$GQPt3G953R2xq2YKccTF1OlbdLDXKUHLFEPQuMp9k4eRe.UpyPOOW',NULL,'sumarnaabunaufal@gmail.com',10,0,0);
insert  into `user`(`id`,`username`,`realname`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (25,'Anti','Sri Suharyanti','05TYlAjUKy3ylgyjIiLo99pZOygQ8MYZ','$2y$13$jwUGvskM3d8OucCBW2RkNOedOZv1bapg43iNV1qHRyt/MNZJI1OQ6',NULL,'dzakyanti@gmail.com',10,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
