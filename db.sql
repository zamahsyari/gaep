/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.12-log : Database - gaep
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

insert  into `kategori`(`id`,`name`,`deskripsi`) values (1,'Matematika SMA','Pelajaran SMA'),(2,'TIK SMA','Teknologi Informasi Tingkat SMA');

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

insert  into `subkategori`(`id`,`kategori_id`,`nama`,`deskripsi`,`icon`) values (1,1,'Matematika Kelas 1 SMA','Matematika Kelas 1 SMA, tentang penjumlahan, pengurangan, pembagian','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation'),(2,1,'Matematika Kelas 2 SMA','Matematika Kelas 2 SMA, tentang turunan dan integral','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation'),(3,1,'Matematika Kelas 3 SMA','Matematika Kelas 3 SMA, Berisi tentang aljabar, vektor, dan matriks','icon-custom icon-sm rounded-x icon-bg-green icon-line icon-graduation');

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
  `downloads` bigint(20) DEFAULT NULL,
  `views` bigint(20) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tutorial_user_fk` (`user_id`),
  KEY `subkategori_fk` (`subkategori_id`),
  CONSTRAINT `subkategori_fk` FOREIGN KEY (`subkategori_id`) REFERENCES `subkategori` (`id`),
  CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tutorial` */

insert  into `tutorial`(`id`,`judul`,`file`,`thumb`,`user_id`,`tag`,`subkategori_id`,`deskripsi`,`downloads`,`views`,`created`,`modified`) values (4,'Mengisi Record Tabel Base','uploads/tutorial/tutorial_4.zip',NULL,NULL,NULL,1,'Bagian dari Tutorial base tentang Mengisi Record Tabel Base',NULL,NULL,'2015-06-28 08:16:50','0000-00-00 00:00:00'),(5,'Sesuatu Tutorial','uploads/tutorial/tutorial_5.pdf',NULL,8,NULL,1,'Yay',NULL,NULL,'2015-10-04 06:52:23','0000-00-00 00:00:00');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`) values (7,'gunturbudi','JsPWVomlEYPlLzmd5ssagOayAh4fJmzZ','$2y$13$oK3hXZLmH2uK26VntpViqejD4cWXXRB66GL/klEsTb8SfTMLwCwJ6',NULL,'gunturbudi@gmail.com',10,0,0),(8,'budi','SvwbJA098bfmi6ubCwDTS2yugDQH9hnX','$2y$13$Xdwnfze29fgnVpkVgOhojuVjBBUQA8CbIz3wZLfVq7M7541kGLYQ.',NULL,'budi@gmail.com',10,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
