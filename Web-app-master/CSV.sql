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
	CONSTRAINT account_type FOREIGN KEY (username) REFERENCES Taikhoan(username) ON DELETE CASCADE
);