CREATE DATABASE MeetingDB;

USE MeetingDB;

CREATE TABLE Meetings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    note TEXT,
    date DATE,
    time TIME,
    responseStatus VARCHAR(255)

);

CREATE TABLE Responses (
    meeting_id INT,
    response VARCHAR(50),
    FOREIGN KEY (meeting_id) REFERENCES Meetings(id)
);