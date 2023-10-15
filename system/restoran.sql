CREATE DATABASE restoran;

USE DATABASE restoran;

CREATE TABLE menu(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    kategori ENUM("Makanan", "Minuman", "Lainnya"),
    deskripsi VARCHAR(200),
    harga INT UNSIGNED NOT NULL,
    foto VARCHAR(100)
);

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    password VARCHAR(30),
    role ENUM("user", "admin")
);