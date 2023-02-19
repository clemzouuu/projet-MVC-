CREATE TABLE IF NOT EXISTS Users
(
    `id`        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username`  VARCHAR(255) NOT NULL UNIQUE,
    `password`  VARCHAR(255) NOT NULL,
    `email`   VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Posts
(
    `post_id`      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `content` TEXT,
    `author`  INT NOT NULL,
    `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `username` VARCHAR(255),
    FOREIGN KEY (`author`) REFERENCES Users(`id`),
    FOREIGN KEY (`username`) REFERENCES Users(`username`)
);

CREATE TABLE IF NOT EXISTS Comments (
    `comment_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `content` TEXT,
    `author_id` INT NOT NULL,
    `author_username` VARCHAR(255),
    `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`author_id`) REFERENCES Users(`id`),
    FOREIGN KEY (`author_username`) REFERENCES Users(`username`)
);
