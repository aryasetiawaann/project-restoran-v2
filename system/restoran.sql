CREATE DATABASE restoran;

USE restoran;

CREATE TABLE menu(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    -- kategori ENUM("", "", ""),
    detail VARCHAR(200),
    harga INT UNSIGNED NOT NULL,
    foto VARCHAR(100)
);

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30), 
    username VARCHAR(50),
    password VARCHAR(30),
    tgl_lahir DATE,
    gender ENUM("Laki-laki", "Perempuan"),
    role ENUM("Customer", "Admin")
);

CREATE TABLE cart(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_menu INT,
    id_user INT,
    jumlah INT UNSIGNED NOT NULL,
    FOREIGN KEY(id_menu) REFERENCES menu(id),
    FOREIGN KEY(id_user) REFERENCES users(id)
);