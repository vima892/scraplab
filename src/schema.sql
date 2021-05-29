CREATE DATABASE scraplab;
USE scraplab;

CREATE TABLE collection_team (
    collection_team_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    status VARCHAR(10)
);

CREATE TABLE users (
    userId INT PRIMARY KEY AUTO_INCREMENT, 
    username VARCHAR(30) NOT NULL, 
    email VARCHAR(255) NOT NULL,
    name VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    password TEXT NOT NULL,
    birthdate DATE NOT NULL,
    account_type VARCHAR(20), 
    collection_team_id INT,
    CONSTRAINT collection_team_id FOREIGN KEY (collection_team_id)
    REFERENCES collection_team(collection_team_id)
);

CREATE TABLE SLDMs (
    SLDM_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    location TEXT, 
    userId INT, 
    status VARCHAR(20),
    CONSTRAINT userId FOREIGN KEY (userId)
    REFERENCES users(userId)
);

CREATE TABLE collection_jobs(
    collection_job_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    SLDM_ID INT NOT NULL,
    collection_datetime DATETIME NOT NULL DEFAULT '2000-01-01 00:00:00', 
    collection_team_id INT,
    CONSTRAINT collection_team FOREIGN KEY (collection_team_id)
    REFERENCES collection_team(collection_team_id),
    CONSTRAINT SLDM_ID FOREIGN KEY (SLDM_ID)
    REFERENCES SLDMs(SLDM_ID)
);