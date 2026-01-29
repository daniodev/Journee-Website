DROP DATABASE IF EXISTS journee_db;


CREATE DATABASE IF NOT EXISTS journee_db
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE journee_db;

-- =========================
-- Tabella: Utenti
-- =========================
CREATE TABLE Utenti (
    idUtente INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(50) NOT NULL UNIQUE,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- =========================
-- Tabella: Pagine
-- =========================
CREATE TABLE Pagine (
    idPagina INT AUTO_INCREMENT PRIMARY KEY,
    giornoScrittura DATE NOT NULL,
    titolo VARCHAR(100) NOT NULL,
    pensieroGiornaliero TEXT,
    idUtente INT NOT NULL,

    CONSTRAINT fk_pagine_utenti
        FOREIGN KEY (idUtente)
        REFERENCES Utenti(idUtente)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =========================
-- Tabella: TipologiaScale
-- =========================
CREATE TABLE TipologiaScale (
    idTipoScala INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descrizione VARCHAR(255)
) ENGINE=InnoDB;

-- =========================
-- Tabella: Scale
-- =========================
CREATE TABLE Scale (
    idScala INT AUTO_INCREMENT PRIMARY KEY,
    valutazione INT NOT NULL,
    idPagina INT NOT NULL,
    idTipoScala INT NOT NULL,

    CONSTRAINT fk_scale_pagine
        FOREIGN KEY (idPagina)
        REFERENCES Pagine(idPagina)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT fk_scale_tipologia
        FOREIGN KEY (idTipoScala)
        REFERENCES TipologiaScale(idTipoScala)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;
