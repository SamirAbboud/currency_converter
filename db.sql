-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for currency_convert_db
CREATE DATABASE IF NOT EXISTS `currency_convert_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `currency_convert_db`;

-- Dumping structure for table currency_convert_db.conversions
CREATE TABLE IF NOT EXISTS `conversions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(3) DEFAULT NULL,
  `target` varchar(3) DEFAULT NULL,
  `amount` double unsigned DEFAULT NULL,
  `result` double unsigned DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `rate` double unsigned DEFAULT NULL,
  `created_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='currency conversions';

-- Dumping data for table currency_convert_db.conversions: ~1 rows (approximately)
/*!40000 ALTER TABLE `conversions` DISABLE KEYS */;
INSERT INTO `conversions` (`id`, `source`, `target`, `amount`, `result`, `created_date`, `rate`, `created_time`) VALUES
	(1, 'GBP', 'JPY', 25, 3724.305775, '2018-02-22', 148.972231, 1519328414),
	(2, 'USD', 'EUR', 10, 8.53, '2020-11-04', 0.85, 1519329414);
/*!40000 ALTER TABLE `conversions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
