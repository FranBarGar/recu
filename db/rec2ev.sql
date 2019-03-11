DROP TABLE usuarios CASCADE;

CREATE TABLE usuarios
(
    id       bigserial    PRIMARY KEY
  , email    varchar(255) NOT NULL UNIQUE
  , password varchar(255) NOT NULL
);

DROP TABLE albumes CASCADE;

CREATE TABLE albumes
(
    id     bigserial    PRIMARY KEY
  , titulo varchar(255) NOT NULL
  , anyo   numeric(4)
);

DROP TABLE canciones CASCADE;

CREATE TABLE canciones
(
    id     bigserial    PRIMARY KEY
  , titulo varchar(255) NOT NULL
  , duracion numeric(2)
);

DROP TABLE artistas CASCADE;

CREATE TABLE artistas
(
    id        bigserial    PRIMARY KEY
  , nombre    varchar(255) NOT NULL
  , biografia text
);

DROP TABLE albumes_canciones CASCADE;

CREATE TABLE albumes_canciones
(
    album_id   bigint REFERENCES albumes (id)
  , cancion_id bigint REFERENCES canciones (id)
  , PRIMARY KEY (album_id, cancion_id)
);

DROP TABLE artistas_canciones CASCADE;

CREATE TABLE artistas_canciones
(
    artista_id bigint REFERENCES artistas (id)
  , cancion_id bigint REFERENCES canciones (id)
  , PRIMARY KEY (artista_id, cancion_id)
);

INSERT INTO albumes (titulo, anyo)
VALUES ('Album uno', 1900)
    , ('Album dos', 2000);

INSERT INTO canciones (titulo, duracion)
VALUES ('Cancion uno', 5)
    , ('Cancion dos', 3);

INSERT INTO artistas (nombre, biografia)
VALUES ('Joselito', 'Biografia uno')
    , ('Pepito', 'Biografia dos');

INSERT INTO albumes_canciones (album_id, cancion_id)
VALUES (1,1)
    , (2,2);

INSERT INTO artistas_canciones (artista_id, cancion_id)
VALUES (1,1)
    , (2,2);
