CREATE DATABASE IF NOT EXISTS elearn_db;
USE elearn_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    verification_code VARCHAR(6),
    is_verified TINYINT(1) DEFAULT 0,
    profile_image VARCHAR(255) DEFAULT 'default_avatar.png',
    bio TEXT,
    job_title VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
