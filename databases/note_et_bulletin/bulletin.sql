-- CREATION ET UTILISATION DU DATABASES
CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- ===============================================
--      CREATION DU TABLE DE BULLETIN
-- ===============================================
CREATE TABLE IF NOT EXISTS bulletin (
  id INT AUTO_INCREMENT PRIMARY KEY id_inscription INT UNSIGNED NOT NULL,
  id_matiere INT UNSIGNED NOT NULL,
  id_classe_filiere INT UNSIGNED NOT NULL,
  id_annee_universitaire INT UNSIGNED NOT NULL,
  decision ENUM ('admis', 'redouble') NOT NULL,
  observation ENUM ('passable', 'assez-bien', 'bien', 'tres-bien') NOT NULL,
  -- CONTRAINTE
  CONSTRAINT fq_bulletin_inscription FOREIGN KEY (id_inscription) REFERENCES inscription (id),
  CONSTRAINT fq_bulletin_matiere FOREIGN KEY (id_matiere) REFERENCES matiere (id),
  CONSTRAINT fq_bulletin_cf FOREIGN KEY (id_classe_filiere) REFERENCES classe_filiere (id),
  CONSTRAINT fq_bulletin_annee FOREIGN KEY (id_annee_universitaire) REFERENCES annee_universitaire (id)
);