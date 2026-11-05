-- CREATION ET UTILISATION DU DATABASES
CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- ===============================================
--      CREATION DU TABLE PROFESSEUR
-- ===============================================
CREATE TABLE IF NOT EXISTS professeur (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(200) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  telephone VARCHAR(20) NULL,
  email VARCHAR(255) NULL
);

-- ---------------------------------------------------------------------
--  Professeurs
-- ---------------------------------------------------------------------
INSERT INTO
  professeur (id, nom, prenom, telephone, email)
VALUES
  (1, 'Rakoto', 'Jean', '+261 34 11 111 11', 'jean.rakoto@exemple.mg'),
  (2, 'Rabe', 'Marie', '+261 33 22 222 22', 'marie.rabe@exemple.mg'),
  (3, 'Randria', 'Paul', '+261 32 33 333 33', 'paul.randria@exemple.mg'),
  (4, 'Rasoa', 'Hanta', '+261 34 44 444 44', 'hanta.rasoa@exemple.mg');