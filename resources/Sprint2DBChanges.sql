< ! --CREATE DATABASE IF NOT EXISTS paintingdb;
< ! --USE paintingdb;
< ! --DROP TABLE IF EXISTS artists;

    <!--CREATE ARTISTS-->
CREATE TABLE artists(
    artistID INT AUTO_INCREMENT PRIMARY KEY,
    artistName VARCHAR(100) NOT NULL,
    imageFile MEDIUMBLOB NOT NULL,
    style VARCHAR(100) NOT NULL,
    lifeSpan VARCHAR(100) NOT NULL
);

    <!--IMPORTING ALL FILES-->
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    1,
        'UNKNOWN ARTIST',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/unknown.png'
        ),
        'UNKNOWN STYLE',
        'UNKNOWN LIFESPAN'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    2,
        'August Renoir',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/renoir.png'
        ),
        'Impressionism',
        '1841 – 1919'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    3,
        'Michelangelo',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/michelangelo.png'
        ),
        'Mannerism',
        '1475 – 1564'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    4,
        'Vincent Van Gogh',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/vangogh.png'
        ),
        'Realism',
        '1853 – 1890'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    5,
        'Claude Monet',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/monet.png'
        ),
        'Impressionism',
        '1840 -1926'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    6,
        'Rembrandt',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/rembrandt.png'
        ),
        'UNKNOWN',
        '1606 – 1669'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    7,
        'Pablo Picasso',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/picasso.png'
        ),
        'Impressionism',
        '1881 – 1973'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    8,
        'Jan Vermeer',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/vermeer.png'
        ),
        'Realism',
        '1632 – 1675'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    9,
        'Salvador Dali',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/dali.png'
        ),
        'Surrealism',
        '1904 -1989'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    10,
        'Paul Cezanne',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/cezanne.png'
        ),
        'Post-Impressionism',
        '1839 – 1906'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    11,
        'Leonardo da Vinci',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/davinci.png'
        ),
        'Humanism',
        '1452 – 1519'
    );
INSERT INTO artists(artistID, artistName, imageFile, style, lifeSpan)
VALUES(
    12,
        'Raphael',
        LOAD_FILE(
            'C:/Users/rhysg/Downloads/ArtistPortrait/raphael.png'
        ),
        'Realism',
        '1483 – 1520'
    );

    <!--UPDATE THE TABLE FOR THE NEW COLUMN AND SET TO UNKNOWN ARTIST-->
ALTER TABLE paintings
ADD COLUMN artistID INT NOT NULL DEFAULT 1;

    <!--UPDATE THE TABLE FOR THE NEW COLUMN AND ASSIGN A FOREIGN KEY-->
ALTER TABLE paintings
ADD FOREIGN KEY (artistID) REFERENCES artists(artistID);

    <!--COMPARE ARTISTS AND ASSIGN IDS-->
UPDATE paintings
SET artistID = 2
WHERE artist = 'August Renoir';
UPDATE paintings
SET artistID = 3
WHERE artist = 'Michelangelo';
UPDATE paintings
SET artistID = 4
WHERE artist = 'Vincent Van Gogh';
UPDATE paintings
SET artistID = 5
WHERE artist = 'Claude Monet';
UPDATE paintings
SET artistID = 6
WHERE artist = 'Rembrandt';
UPDATE paintings
SET artistID = 7
WHERE artist = 'Pablo Picasso';
UPDATE paintings
SET artistID = 8
WHERE artist = 'Jan Vermeer';
UPDATE paintings
SET artistID = 9
WHERE artist = 'Salvador Dali';
UPDATE paintings
SET artistID = 10
WHERE artist = 'Paul Cezanne';
UPDATE paintings
SET artistID = 11
WHERE artist = 'Leonardo da Vinci';
UPDATE paintings
SET artistID = 12
WHERE artist = 'Raphael';



    <!--CLEAN UP BY DROPPING THE COLUMN WHEN FINISHED-->
ALTER TABLE paintings DROP COLUMN artist;
