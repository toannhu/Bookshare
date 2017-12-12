CREATE DATABASE pdfonline;
USE pdfonline;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL DEFAULT '',
  email varchar(250) NOT NULL DEFAULT '',
  password varchar(200) NOT NULL DEFAULT '',
  fullname varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  phone_number varchar(15) NOT NULL DEFAULT '',
  role int(1) unsigned NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;