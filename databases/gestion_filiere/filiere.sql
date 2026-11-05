mysql - u root - p;

CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- =================================================
--      CREATION DU TABLE FILIERE
-- =================================================
CREATE TABLE IF NOT EXISTS filiere (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  code_filiere VARCHAR(20) NOT NULL UNIQUE,
  nom_filiere VARCHAR(150) NOT NULL,
  description_filiere TEXT NULL,
  INDEX idx_nom_filiere (nom_filiere)
);

-- ---------------------------------------------------------------------
--  Filières
-- ---------------------------------------------------------------------
INSERT INTO
  filiere (id, code_filiere, nom_filiere, description_filiere)
VALUES
  (
    1,
    'INFO',
    'Informatique',
    'Formation en développement, bases de données et réseaux.'
  ),
  (2, 'GEST', 'Gestion', 'Formation en comptabilité, économie et management.'),
  (3, 'DROIT', 'Droit', 'Formation en droit privé et droit public.');