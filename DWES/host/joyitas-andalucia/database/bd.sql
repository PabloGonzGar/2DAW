CREATE TABLE Artist (
    id          int(255) auto_increment not null,
    name        varchar(20) not null,
    price       decimal(6,2) not null,
    CONSTRAINT pk_artist PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE Concert (
    id          int(255) auto_increment not null,
    name        varchar(100) not null,
    place       varchar(100) not null,
    time        datetime DEFAULT null,
    CONSTRAINT pk_concert PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE Artist_Concert(
    id_artist   int(255),
    id_concert   int(255),
    CONSTRAINT pk_artist_concert PRIMARY KEY(id_artist, id_concert),
    CONSTRAINT fk_artist FOREIGN KEY (id_artist) REFERENCES Artist(id),
    CONSTRAINT fk_concert FOREIGN KEY (id_concert) REFERENCES Concert(id)
)ENGINE=InnoDb;