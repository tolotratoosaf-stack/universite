CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- ===============================================
--      CREATION DU TABLE ANNEE UNIVERSITAIRE
-- ===============================================
CREATE TABLE IF NOT EXISTS annee_universitaire (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(9) NOT NULL UNIQUE -- ex : '2026-2027'
);

-- ---------------------------------------------------------------------
--  Années universitaires
-- ---------------------------------------------------------------------
INSERT INTO
  annee_universitaire (id, libelle)
VALUES
  (1, '2024-2025'),
  (2, '2025-2026'),
  (3, '2026-2027');