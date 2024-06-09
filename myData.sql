CREATE DATABASE nile_rcc_meetingdb;

USE nile_rcc_meetingdb;

CREATE TABLE meetings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    note TEXT,
    date DATE,
    time TIME,
    responseStatus VARCHAR(255)

);

CREATE TABLE responses (
    meeting_id INT,
    response VARCHAR(50)
);