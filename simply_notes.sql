# Host: 127.0.0.1:33060  (Version 5.7.27-0ubuntu0.16.04.1)
# Date: 2020-11-25 17:33:01
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "user"
#

CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL DEFAULT '',
  `Password` varchar(255) NOT NULL DEFAULT '',
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "user"
#


#
# Structure for table "Notes"
#

CREATE TABLE `Notes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_user` int(11) NOT NULL DEFAULT '-1',
  `Header` varchar(255) DEFAULT NULL,
  `Note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_user` (`Id_user`),
  CONSTRAINT `Notes_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "Notes"
#

