mysql - u root - p;

CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- =================================================
--      CREATION DU TABLE DE RELATION N-N
-- =================================================
CREATE TABLE IF NOT EXISTS classe_filiere_matiere (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_classe_filiere INT UNSIGNED NOT NULL,
  id_matiere INT UNSIGNED NOT NULL,
  id_professeur INT UNSIGNED NULL,
  credit TINYINT UNSIGNED NOT NULL DEFAULT 1,
  UNIQUE KEY uq_cf_matiere (id_classe_filiere, id_matiere),
  CONSTRAINT fk_cfm_classe_filiere FOREIGN KEY (id_classe_filiere) REFERENCES classe_filiere (id),
  CONSTRAINT fk_cfm_matiere FOREIGN KEY (id_matiere) REFERENCES matiere (id),
  CONSTRAINT fk_cfm_professeur FOREIGN KEY (id_professeur) REFERENCES professeur (id) ON DELETE SET NULL
);

-- ---------------------------------------------------------------------
--  Matières par classe_filiere : (id_classe_filiere, id_matiere, id_professeur, credit)
-- ---------------------------------------------------------------------
INSERT INTO
  classe_filiere_matiere (id_classe_filiere, id_matiere, id_professeur, credit)
VALUES
  -- L1 Informatique
  (1, 1, 1, 6),
  (1, 2, 2, 6),
  (1, 8, 4, 3),
  -- L2 Informatique
  (2, 4, 2, 6),
  (2, 5, 3, 6),
  (2, 1, 1, 4),
  -- L3 Informatique
  (3, 5, 3, 5),
  -- L1 Gestion
  (4, 1, 1, 4),
  (4, 3, 3, 5),
  (4, 7, 4, 4),
  -- L2 Gestion
  (5, 3, 3, 6),
  (5, 7, 4, 4),
  -- L1 Droit
  (6, 6, 4, 5),
  (6, 8, 4, 3);