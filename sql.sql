-- Create the personal_task_management database
CREATE DATABASE personal_task_management;

-- Use the database
USE personal_task_management;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(255) NOT NULL,
    attachment VARCHAR(255),
    create_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    create_user_id INT NOT NULL
);