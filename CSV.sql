CREATE DATABASE cuusinhvien;
USE cuusinhvien;

CREATE TABLE taikhoan (
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(255),
	password VARCHAR(255),
	fullname VARCHAR(255),
	grade VARCHAR(100),
	date_of_birth DATE,
	gender VARCHAR(10),
	email VARCHAR(100),
	website VARCHAR(255),
	phone VARCHAR(20),
	address VARCHAR(255),
	achievement TEXT,
	account_type VARCHAR(100)
);

CREATE TABLE diendan (
	id INT PRIMARY KEY AUTO_INCREMENT,
	author_id INT,
	topic VARCHAR(255),
	views INT,
	CONSTRAINT author_forum FOREIGN KEY (author_id) REFERENCES taikhoan(id) ON DELETE CASCADE
);

CREATE TABLE noidungdiendan (
	id INT PRIMARY KEY AUTO_INCREMENT,
	forum_id INT,
	user_id INT,
	comment TEXT,
	post_date DATETIME,
	CONSTRAINT diendan_noidung FOREIGN KEY (forum_id) REFERENCES diendan(id) ON DELETE CASCADE,
	CONSTRAINT diendan_docgia FOREIGN KEY (user_id) REFERENCES taikhoan(id) ON DELETE CASCADE
);

CREATE TABLE thongbao (
	id INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(255),
	content TEXT,
	post_date DATETIME
);

CREATE TABLE sukien (
	id INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(255),
	location VARCHAR(255),
	time DATETIME,
	description TEXT
);

CREATE TABLE thamgiasukien (
	id INT PRIMARY KEY AUTO_INCREMENT,
	event_id INT,
	participant INT,
	CONSTRAINT nguoithamgia FOREIGN KEY (participant) REFERENCES taikhoan(id) ON DELETE CASCADE,
	CONSTRAINT sukien_nguoithamgia FOREIGN KEY (event_id) REFERENCES sukien(id) ON DELETE CASCADE
);