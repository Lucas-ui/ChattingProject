DROP
DATABASE IF EXISTS chatting_project;
CREATE
DATABASE chatting_project;
USE
chatting_project;

CREATE TABLE Users
(
    idUser      INT AUTO_INCREMENT NOT NULL,
    pseudo      VARCHAR(64),
    email       VARCHAR(64),
    pass        VARCHAR(64),
    photo       VARCHAR(254),
    birthdate   DATE,
    status      BOOLEAN DEFAULT true  NOT NULL,
    description TEXT,
    isAdmin     BOOLEAN DEFAULT false NOT NULL,
    createdAt   DATE,
    PRIMARY KEY (idUser)
);

CREATE TABLE Posts
(
    idPost   INT AUTO_INCREMENT NOT NULL,
    content  TEXT,
    photo    VARCHAR(256),
    datePost DATETIME,
    idUser   INT,
    PRIMARY KEY (idPost),
    FOREIGN KEY (idUser) REFERENCES Users (idUser)
);

CREATE TABLE Messages
(
    idMessage   INT AUTO_INCREMENT,
    content     TEXT,
    photo       VARCHAR(256),
    dateMessage DATETIME,
    idUser      INT,
    idPost      INT,
    PRIMARY KEY (idMessage),
    CONSTRAINT idUser FOREIGN KEY (idUser) REFERENCES Users (idUser),
    CONSTRAINT idPost FOREIGN KEY (idPost) REFERENCES Posts (idPost)
);

INSERT INTO Users (pseudo, email, pass, photo, birthdate, status, description, isAdmin, createdAt)
VALUES ('admin', 'admin@admin.fr', SHA2("admin", 256), null, '2023-07-03', true, 'Administrateur', true, '2023-07-03'),
       ('Dupont', 'dupont@gmail.fr', SHA2("password", 256),  null, '2023-07-03', true, 'Monsieur Dupont', false, '2023-07-03');

INSERT INTO Posts (content, photo, datePost)
VALUES ('test', null, '2023-07-03'),
       ('test2', null, '2023-07-03'),
       ('test3', null, '2023-07-03'),
       ('test4', null, '2023-07-03');

INSERT INTO Messages (content, photo, dateMessage)
VALUES ('message1',null,'2023-07-03'),
       ('message2',null,'2023-07-03'),
       ('message3',null,'2023-07-03'),
       ('message4',null,'2023-07-03');