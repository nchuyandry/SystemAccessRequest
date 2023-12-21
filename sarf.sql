/*
SQLyog Enterprise v10.42 
MySQL - 5.7.18-log : Database - sarf
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sarf` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sarf`;

/*Table structure for table `t_request` */

DROP TABLE IF EXISTS `t_request`;

CREATE TABLE `t_request` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `dept` varchar(25) DEFAULT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `lokasi` varchar(10) DEFAULT NULL,
  `system` varchar(10) DEFAULT NULL,
  `reason` text,
  `status` varchar(10) DEFAULT NULL,
  `approval` text,
  `tglapprove` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
