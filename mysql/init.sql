CREATE DATABASE
    wordpress_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'user'@'%' IDENTIFIED BY '';

GRANT ALL PRIVILEGES ON wordpress_db.* TO 'user'@'%';

GRANT ALL PRIVILEGES ON wordpress_db.* TO 'user'@'%';