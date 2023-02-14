CREATE TABLE IF NOT EXISTS Users
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL UNIQUE,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(255) NOT NULL,
);

CREATE TABLE IF NOT EXISTS Posts
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    author  int NOT NULL
);

CREATE TABLE if not EXISTS Comments (
    `comment_id` INT NOT NULL auto_increment,
    `username` VARCHAR(255),
    `id` INT,
    `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `content` TEXT,
    PRIMARY KEY (`comment_id`)
);

