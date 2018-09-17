CREATE DATABASE IF NOT EXISTS iad;
USE iad;

CREATE TABLE IF NOT EXISTS `user`(
  id int NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  isOnline tinyint(1),
  CONSTRAINT u_username UNIQUE (username),
  PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS message(
  id int NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(255),
  `date` datetime NOT NULL,
  user_id int NOT NULL,
  CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES user(id),
  PRIMARY KEY(id)
)ENGINE=InnoDB;