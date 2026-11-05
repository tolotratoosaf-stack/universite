mysql - u root - p;

CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- =================================================
--      CREATION DU TABLE CLASSE
-- =================================================
CREATE TABLE IF NOT EXISTS classe (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nom_classe VARCHAR(100) NOT NULL UNIQUE,
  description_classe TEXT NULL,
  INDEX idx_nom_classe (nom_classe)
);

-- ---------------------------------------------------------------------
--  Classes
-- ---------------------------------------------------------------------
INSERT INTO
  classe (id, nom_classe, description_classe)
VALUES
  (1, 'L1', 'Première année de licence'),
  (2, 'L2', 'Deuxième année de licence'),
  (3, 'L3', 'Troisième année de licence'),
  (4, 'M1', 'Première année de master'),
  (5, 'M2', 'Deuxième année de master');

-- MODIFICATION TABLE
ALTER TABLE classe
ADD COLUMN code_classe VARCHAR(10) NULL AFTER id;

UPDATE classe
SET
  code_classe = nom_classe;

UPDATE classe
SET
  nom_classe = CASE code_classe
    WHEN 'L1' THEN 'Licence 1'
    WHEN 'L2' THEN 'Licence 2'
    WHEN 'L3' THEN 'Licence 3'
    WHEN 'M1' THEN 'Master 1'
    WHEN 'M2' THEN 'Master 2'
    ELSE nom_classe
  END;