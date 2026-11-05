mysql - u root - p;

CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- ===============================================
--      CREATION DU TABLE MATIERE
-- ===============================================
CREATE TABLE IF NOT EXISTS matiere (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  code_matiere VARCHAR(30) NOT NULL UNIQUE,
  nom_matiere VARCHAR(150) NOT NULL,
  description_matiere TEXT NULL,
  INDEX idx_nom_matiere (nom_matiere)
);

-- ---------------------------------------------------------------------
--  Matières
-- ---------------------------------------------------------------------
INSERT INTO
  matiere (id, code_matiere, nom_matiere, description_matiere)
VALUES
  (1, 'MAT101', 'Mathématiques', 'Mathématiques générales'),
  (2, 'INFO101', 'Informatique générale', 'Initiation à l''informatique'),
  (3, 'COMPTA101', 'Comptabilité', 'Comptabilité générale'),
  (4, 'ALGO201', 'Algorithmique', 'Algorithmes et structures de données'),
  (5, 'BD201', 'Bases de données', 'Modélisation et SQL'),
  (6, 'DRT101', 'Introduction au droit', 'Notions fondamentales du droit'),
  (7, 'ECO101', 'Économie', 'Microéconomie et macroéconomie'),
  (8, 'ANG101', 'Anglais', 'Anglais général et professionnel');