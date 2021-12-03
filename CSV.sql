CREATE DATABASE cuusinhvien;
USE cuusinhvien;

CREATE TABLE taikhoan (
	username VARCHAR(255) PRIMARY KEY,
	password VARCHAR(255),
	fullname VARCHAR(255),
	grade VARCHAR(100),
	date_of_birth DATE,
	gender VARCHAR(10),
	email VARCHAR(100),
	website VARCHAR(255),
	phone VARCHAR(20),
	address VARCHAR(255),
	achievement TEXT
);

CREATE TABLE loaitaikhoan (
	username VARCHAR(255) PRIMARY KEY,
	type VARCHAR(10),
	CONSTRAINT account_type FOREIGN KEY (username) REFERENCES taikhoan(username) ON DELETE CASCADE
);

CREATE TABLE diendan (
	id INT PRIMARY KEY AUTO_INCREMENT,
	author VARCHAR(255),
	topic VARCHAR(255),
	views INT,
	CONSTRAINT author_forum FOREIGN KEY (author) REFERENCES taikhoan(username) ON DELETE CASCADE
);

CREATE TABLE noidungdiendan (
	id INT PRIMARY KEY,
	user VARCHAR(255),
	comment TEXT,
	post_date DATE,
	CONSTRAINT diendan_noidung FOREIGN KEY (id) REFERENCES diendan(id) ON DELETE CASCADE,
	CONSTRAINT diendan_docgia FOREIGN KEY (user) REFERENCES taikhoan(username) ON DELETE CASCADE
);