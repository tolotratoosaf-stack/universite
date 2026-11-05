mysql - u root - p;

CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- =================================================
--CREATION DU TABLE DE RELATION CLASSE -> FILIERE N-N
-- =================================================
CREATE TABLE IF NOT EXISTS classe_filiere (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_classe INT UNSIGNED NOT NULL,
  id_filiere INT UNSIGNED NOT NULL,
  capacite INT UNSIGNED NOT NULL DEFAULT 1,
  UNIQUE KEY uq_classe_filiere (id_classe, id_filiere),
  CONSTRAINT fk_cf_classe FOREIGN KEY (id_classe) REFERENCES classe (id),
  CONSTRAINT fk_cf_filiere FOREIGN KEY (id_filiere) REFERENCES filiere (id)
);

-- ---------------------------------------------------------------------
--  Classe dans une filière (ex : « Informatique L1 »)
-- ---------------------------------------------------------------------
INSERT INTO
  classe_filiere (id, id_classe, id_filiere, capacite)
VALUES
  (1, 1, 1, 40), -- L1 Informatique
  (2, 2, 1, 35), -- L2 Informatique
  (3, 3, 1, 30), -- L3 Informatique
  (4, 1, 2, 50), -- L1 Gestion
  (5, 2, 2, 45), -- L2 Gestion
  (6, 1, 3, 60);