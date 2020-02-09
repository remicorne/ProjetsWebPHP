DROP TABLE IF EXISTS albums;
DROP TABLE IF EXISTS photos;
DROP TABLE IF EXISTS users;

CREATE TABLE LOL ();

CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL UNIQUE
);

CREATE TABLE albums(
  album_id INTEGER PRIMARY KEY AUTOINCREMENT,  
  album_name TEXT NOT NULL,
  user_id INTEGER NOT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE photos(
  photo_id INTEGER PRIMARY KEY AUTOINCREMENT, 
  album_id INTEGER NOT NULL, 
  user_id INTEGER NOT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
  photo_name TEXT NOT NULL,
  fullsize BLOB TEXT NOT NULL,
  thumbnail BLOB TEXT NOT NULL,
  FOREIGN KEY(album_id) REFERENCES albums(album_id) ON DELETE CASCADE ON UPDATE CASCADE,

);

