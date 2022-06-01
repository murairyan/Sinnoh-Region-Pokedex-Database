use bw_db32;

-- Drop the tables below in the event data type and/or values change
-- Have to drop this table first
DROP TABLE CanLearn;

-- Drop this table next
DROP TABLE IsType;

-- Drop #3
DROP TABLE Move;

-- Drop #4
DROP TABLE PokemonType;

-- Drop #5
DROP TABLE Ability;

-- Drop #6
DROP TABLE EvolvesTo;

-- Drop #7
DROP TABLE Pokemon;

-- Drop #8
DROP TABLE Stats;

-- Create tables in the descending order
CREATE TABLE Ability (
aName VARCHAR(50),
    aDescription VARCHAR(1000),
    PRIMARY KEY (aName)
);

CREATE TABLE Stats (
statID INTEGER,
    HP INTEGER,
    Attack INTEGER,
    Defense INTEGER,
    SpAtk INTEGER,
    SpDef INTEGER,
    Speed INTEGER,
    PRIMARY KEY (statID)
);

CREATE TABLE Pokemon (
PokemonID INTEGER,
    pName VARCHAR(30) NOT NULL UNIQUE,
    Height NUMERIC,
    Weight NUMERIC,
    Species VARCHAR(50),
--  pDescription VARCHAR(1000),
--  statID INTEGER,
    PRIMARY KEY (PokemonID)
--  FOREIGN KEY (statID) REFERENCES Stats(statID),
--  FOREIGN KEY (aName) REFERENCES Ability(aName)
);

CREATE TABLE PokemonType (
tName VARCHAR(10),
--  tDescription VARCHAR(100),
    PRIMARY KEY (tName)
);

CREATE TABLE Move (
mName VARCHAR(30),
    PP INTEGER,
Power INTEGER,
    Accuracy DECIMAL (3,2),
    tName VARCHAR(10),
    PRIMARY KEY (mName),
    FOREIGN KEY (tName) REFERENCES PokemonType(tName)
);

CREATE TABLE CanLearn (
PokemonID INTEGER,
    mName VARCHAR(15),
PRIMARY KEY (PokemonID, mName),
    FOREIGN KEY (PokemonID) REFERENCES Pokemon(PokemonID),
    FOREIGN KEY (mName) REFERENCES Move(mName)
);

CREATE TABLE IsType (
PokemonID INTEGER,
    tName VARCHAR(10),
    PRIMARY KEY (PokemonID, tName),
    FOREIGN KEY (PokemonID) REFERENCES Pokemon(PokemonID),
    FOREIGN KEY (tName) REFERENCES PokemonType(tName)
);

CREATE TABLE EvolvesTo (
PokemonID INTEGER,
    EvolutionID INTEGER,
    PRIMARY KEY (PokemonID, EvolutionID),
    FOREIGN KEY (PokemonID) REFERENCES Pokemon(PokemonID)
);

-- Specific tuples that are being added to the table (example)
INSERT INTO Ability
VALUES ('Intimidate', 'Lowers the foes Attack stat.'),
('Aura Break', 'Reduces power of Dark- and Fairy-type moves.'),
        ('Blaze', 'Powers up Fire-type moves in a pinch.'),
        ('Sturdy', 'It cannot be knocked out with one hit.'),
        ('Forecast', 'Castform transforms with the weather.');
   
-- This is a test to make sure the insert values into Ability table was saved
SELECT *
FROM Ability;

-- Selecting all the existing rows and columsn in the Ability table after importing CSV file
SELECT Count(*)
FROM Ability;

SELECT Count(*)
FROM Pokemon;

SELECT Count(*)
FROM EvolvesTo;

SELECT Count(*)
FROM Move;

SELECT Count(*)
FROM PokemonType;

SELECT *
FROM Ability
LIMIT 10;

SELECT *
FROM Pokemon
LIMIT 10;

SELECT *
FROM EvolvesTo
LIMIT 10;

SELECT *
FROM PokemonType
LIMIT 10;

SELECT *
FROM Move
LIMIT 10;
