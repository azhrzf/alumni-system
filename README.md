# 📰 Online News System
This repository contains a system for managing online news articles, developed using native PHP. The application allows users to create, read, update, and delete news articles seamlessly.

## 🛠️ How to Set Up Locally
To run this system on your local machine, you need to set up a database. Follow these steps:
1. Clone the repository:
2. Set up your local server using tools like XAMPP or MAMP.
3. Create the Database and Tables:
Open phpMyAdmin, create a new database called online_news, and run the following SQL script to set up the required tables:

```sql
-- Create 'alu' table
CREATE TABLE alu (
  id INT(11) NOT NULL AUTO_INCREMENT,
  alunim VARCHAR(11) DEFAULT NULL,
  alupassword VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (alunim)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create 'alumni' table
CREATE TABLE alumni (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nim CHAR(11) DEFAULT NULL,
  nama VARCHAR(100) DEFAULT NULL,
  prodi VARCHAR(30) DEFAULT NULL,
  thlulus INT(4) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (nim)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create 'user' table
CREATE TABLE user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) DEFAULT NULL,
  password VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

```
