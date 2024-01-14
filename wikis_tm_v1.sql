CREATE DATABASE IF NOT EXISTS wikis_tm_v1;
USE wikis_tm_v1;

CREATE TABLE IF NOT EXISTS category (
    idCategory INT (11) AUTO_INCREMENT PRIMARY KEY,
    nameCategory VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL, 
    pictureCategory VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tag (
    idTag INT (11) AUTO_INCREMENT PRIMARY KEY,
    nameTag VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS user (
    idUser INT(11) AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role enum('author','admin') NOT NULL
);

CREATE TABLE IF NOT EXISTS wiki (
    idWiki INT (11) AUTO_INCREMENT PRIMARY KEY,
    pictureWiki VARCHAR(255) NOT NULL,
    titleWiki VARCHAR(255) NOT NULL,
    contentWiki LONGTEXT NOT NULL,
    summaryWiki TEXT NOT NULL,
    dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idCategory INT (10) NOT NULL,
    idUser INT(11) NOT NULL,
    archived ENUM('0','1') NOT NULL DEFAULT '1',
    FOREIGN KEY (idCategory) REFERENCES category (idCategory) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idUser) REFERENCES user (idUser) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE IF NOT EXISTS tagsOfWiki (
    idTagsOfWiki INT (11) NOT NULL,
    idTag INT (11) NOT NULL,
    idWiki INT (11) NOT NULL,
    FOREIGN KEY (idTag) REFERENCES tag (idTag) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idWiki) REFERENCES wiki (idWiki) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO user (fullName, email, password, role) 
VALUES ("ABD-ELHAQ AZROUR", "abdelhakazrour3@gmail.com", "$2y$10$Lg6NL1lzO08isblJ/NEHzuKnMqATylQ008sjwtDUqp7zc0I8l9Dsa", "admin");
