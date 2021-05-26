CREATE DATABASE scraplab;
USE scraplab;

CREATE TABLE collection_team (
    collection_team_id INT PRIMARY KEY NOT NULL, 
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
    SLDM_ID INT NOT NULL PRIMARY KEY, 
    location TEXT, 
    userId INT, 
    status VARCHAR(20),
    CONSTRAINT userId FOREIGN KEY (userId)
    REFERENCES users(userId)
);

CREATE TABLE collection_jobs(
    SLDM_ID INT NOT NULL,
    timestamp DATETIME NOT NULL, 
    collection_team_id INT,
    CONSTRAINT primary_key PRIMARY KEY(SLDM_ID, timestamp),
    CONSTRAINT collection_team FOREIGN KEY (collection_team_id)
    REFERENCES collection_team(collection_team_id),
    CONSTRAINT SLDM_ID FOREIGN KEY (SLDM_ID)
    REFERENCES SLDMs(SLDM_ID)
);