CREATE DATABASE Web ;

CREATE TABLE users
(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
login CHAR(50) NOT NULL ,
password CHAR(50) NOT NULL
) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_bin ;
