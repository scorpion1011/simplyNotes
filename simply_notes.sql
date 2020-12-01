# Host: 127.0.0.1:33060  (Version 5.7.27-0ubuntu0.16.04.1)
# Date: 2020-12-01 20:04:44
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "user"
#

CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL DEFAULT '',
  `Password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Login` (`Login`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (10,'vlad123','e30d560d71818fd44e581457813ddcea6656e2c8'),(11,'vlad321','e30d560d71818fd44e581457813ddcea6656e2c8');

#
# Structure for table "notes"
#

CREATE TABLE `notes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_user` int(11) NOT NULL DEFAULT '-1',
  `Header` varchar(255) DEFAULT NULL,
  `Note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_user` (`Id_user`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Data for table "notes"
#

INSERT INTO `notes` VALUES (22,10,'i promise i ll finish tomorrow ...zzz...','story of one little lazy'),(27,11,'&lt;&gt;','&lt;script&gt;alert(\'2\')&lt;/script&gt;');
