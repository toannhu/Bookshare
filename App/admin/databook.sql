
drop DATABASE PDFONLINE;
CREATE DATABASE PDFONLINE;
USE PDFONLINE;

DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `phone_number` varchar(15) NOT NULL DEFAULT '',
  `role` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone_number`, `role`) VALUES (NULL, 'admin', 'admin', 'admin@gmail.com', 'ADMIN', '012345789', '3');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone_number`, `role`) VALUES (NULL, 'thien123', 'thien123', 'thien123@gmail.com', 'Thien', '012345789', '1');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone_number`, `role`) VALUES (NULL, 'toan123', 'toan123', 'toan123@gmail.com', 'Toan', '012345789', '2');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone_number`, `role`) VALUES (NULL, 'cong123', 'cong123', 'cong123@gmail.com', 'COng chua', '012345789', '1');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone_number`, `role`) VALUES (NULL, 'Nguyen123', 'Nguyen123', 'Nguyen123@gmail.com', 'Nguyen', '012345789', '1');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone_number`, `role`) VALUES (NULL, 'thu123', 'thu123', 'thu123@gmail.com', 'Thu Vo', '012345789', '2');

DROP TABLE IF EXISTS books;

create table books
(
id int AUTO_INCREMENT primary key, 
title varchar(100) NOT NULL,
author varchar(50)  NOT NULL,
genre varchar(50) NOT NULL,
view int,
description varchar(1000) ,
url varchar(100) NOT NULL,
image varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


insert into books values (null,'Hạt Giống Tâm Hồn','Nguyễn Khánh Công','Truyện','100',null,'https://drive.google.com/file/d/1eH7a0loUKDM24d3DyHWYKlrDc9lAlNMr/view?usp=sharing','https://imgur.com/C797aUk.png');
insert into books values (null,'Chúa nhẫn','Nguyễn Phạm Anh Nguyên','Truyện','200',null,'https://drive.google.com/file/d/1B07i1IdUz_8dESmfB3JbyH2agqfYQw-d/view','https://imgur.com/gfLUE65.png');
insert into books values (null,'Chicken Soup','Nhữ Đình Toàn','Springer','10',null,'https://drive.google.com/file/d/1ajD9I-twx-0QDSV8VxLSxXQ-rP7jLpmY/view?usp=sharing','https://imgur.com/51EOAH6.jpg');

DROP TABLE IF EXISTS comments;

create table comments
(
	 idcomment int primary key AUTO_INCREMENT,
	 username varchar(50) NOT NULL DEFAULT '',
	 idbook int NOT NULL,
	 content varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci ,
	 commenttime date

)


INSERT INTO `comments` (`idcomment`, `username`, `idbook`, `content`, `commenttime`) VALUES (NULL, 'Toan', '1', 'Truyen hay qua', '2017-12-03');

INSERT INTO `comments` (`idcomment`, `username`, `idbook`, `content`, `commenttime`) VALUES (NULL, 'Nguyen', '2', 'Bai viet hay', '2017-12-12');
INSERT INTO `comments` (`idcomment`, `username`, `idbook`, `content`, `commenttime`) VALUES (NULL, 'Cong', '1', 'Dich nhieu loi', '2017-12-08');



-------------------

url :
hat giong tam hon tap 1: https://drive.google.com/file/d/1eH7a0loUKDM24d3DyHWYKlrDc9lAlNMr/view?usp=sharing
https://drive.google.com/file/d/16p2sgNCGvVqL6Vn2kpdbGUqxLkbTNT1U/view?usp=sharing

chua te nhung chiec nhan  tap 1: https://drive.google.com/file/d/1B07i1IdUz_8dESmfB3JbyH2agqfYQw-d/view
https://drive.google.com/file/d/1EaPlp3bfQtGVLEGLZJdP4DK6zRknMuim/view?usp=sharing

chicken soup : https://drive.google.com/file/d/1ajD9I-twx-0QDSV8VxLSxXQ-rP7jLpmY/view?usp=sharing
https://drive.google.com/file/d/1j5qg0CaUr3F3aCNLVtinWh5d5eiOwIcw/view


Editor Handbook : https://drive.google.com/file/d/1b2Zp-eYx3NGgUJGwLd5wslwNsVveBVLZ/view?usp=sharing

https://drive.google.com/file/d/1kG8aSh44RgdVTLe0CrRlPmDkQBK8jdGD/view?usp=sharing

select * from books;
