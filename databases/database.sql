--
-- File generated with SQLiteStudio v3.2.1 
--
-- Text encoding used: System
-- Walid Massaoudi , Zied Naimi
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Message
CREATE TABLE Message (
    id             INTEGER           PRIMARY KEY,
    email_sender   VARCHAR           REFERENCES User (email),
    email_reciever VARCHAR           REFERENCES User (email) 
                                     UNIQUE,
    object         VARCHAR,
    body           VARCHAR (1, 1500) NOT NULL,
    date           DATETIME
);


-- Table: User
CREATE TABLE User (
    email      VARCHAR PRIMARY KEY,
    first_name VARCHAR,
    last_name  VARCHAR NOT NULL,
    password   VARCHAR NOT NULL,
    status     BOOLEAN DEFAULT (true),
    admin      BOOLEAN DEFAULT (false) 
);


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;

INSERT INTO User (
                     email,
                     first_name,
                     last_name,
                     password,
                     status,
                     admin
                 )
                 VALUES (
                     'admin@company.com.',
                     'admin',
                     'admin',
                     'admin',
                     'true',
                     'true',
                 );