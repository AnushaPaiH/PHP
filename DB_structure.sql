

-- Dumping database structure for php
CREATE DATABASE IF NOT EXISTS `php` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `php`;


-- Dumping structure for table php.enduser
CREATE TABLE IF NOT EXISTS `enduser` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `pwd` varchar(15) DEFAULT NULL,
  `mob` mediumint(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  UNIQUE KEY `u_Id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

