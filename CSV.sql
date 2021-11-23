CREATE DATABASE Cuusinhvien;
USE Cuusinhvien;

CREATE TABLE Taikhoan (
	username VARCHAR(255) PRIMARY KEY,
	password VARCHAR(255),
	fullname VARCHAR(255),
	grade VARCHAR(10),
	date_of_birth DATE,
	gender VARCHAR(10),
	email VARCHAR(100),
	website VARCHAR(255),
	phone VARCHAR(20),
	address VARCHAR(255),
	achievement TEXT
);

CREATE TABLE LoaiTaiKhoan (
	username VARCHAR(255) REFERENCES Taikhoan(username) PRIMARY KEY,
	type VARCHAR(10)
);