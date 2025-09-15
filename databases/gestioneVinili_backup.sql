CREATE TABLE Artist (
    id INTEGER PRIMARY KEY,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    photo_image TEXT
);

CREATE TABLE Music_Genre (
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);

CREATE TABLE Vinyl (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    release_year INTEGER,
    cover_image TEXT,
    artist_id INTEGER,
    FOREIGN KEY (artist_id) REFERENCES Artist(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE Vinyl_Music_Genres (
    vinyl_id INTEGER,
    genre_id INTEGER,
    PRIMARY KEY (vinyl_id, genre_id),
    FOREIGN KEY (vinyl_id) REFERENCES Vinyl(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (genre_id) REFERENCES Music_Genre(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);