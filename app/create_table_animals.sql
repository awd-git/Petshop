PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE animals (id INTEGER PRIMARY KEY, animal VARCHAR(32), name VARCHAR(64), age INTEGER NOT NULL, favoriteFood VARCHAR(32));
COMMIT;
