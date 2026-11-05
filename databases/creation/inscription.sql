CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- ===============================================
--      CREATION DU TABLE D'INSCRIPTION
-- ===============================================
CREATE TABLE IF NOT EXISTS inscription (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_etudiant INT UNSIGNED NOT NULL,
  id_classe_filiere INT UNSIGNED NOT NULL,
  id_annee_universitaire INT UNSIGNED NOT NULL,
  date_inscription DATE NOT NULL,
  UNIQUE KEY uq_etudiant_annee (id_etudiant, id_annee_universitaire),
  CONSTRAINT fk_insc_etudiant FOREIGN KEY (id_etudiant) REFERENCES etudiant (id),
  CONSTRAINT fk_insc_classe_fil FOREIGN KEY (id_classe_filiere) REFERENCES classe_filiere (id),
  CONSTRAINT fk_insc_annee FOREIGN KEY (id_annee_universitaire) REFERENCES annee_universitaire (id)
);

-- ---------------------------------------------------------------------
--  Inscriptions : (étudiant, classe_filiere, année, date)
--  Étudiants 1 et 2 : L1 en 2025-2026 puis L2 en 2026-2027 (historique)
--  Étudiant 3 : redoublant en L1 Informatique
--  Étudiant 4 : inscrit en 2025-2026 seulement
-- ---------------------------------------------------------------------
INSERT INTO
  inscription (id_etudiant, id_classe_filiere, id_annee_universitaire, date_inscription)
VALUES
  (1, 1, 2, '2025-10-06'),
  (1, 2, 3, '2026-10-05'),
  (2, 4, 2, '2025-10-07'),
  (2, 5, 3, '2026-10-06'),
  (3, 1, 2, '2025-10-08'),
  (3, 1, 3, '2026-10-07'),
  (4, 6, 2, '2025-10-09'),
  (5, 1, 3, '2026-10-08'),
  (6, 4, 3, '2026-10-08'),
  (7, 1, 3, '2026-10-09'),
  (8, 6, 3, '2026-10-09'),
  (9, 4, 3, '2026-10-10'),
  (10, 6, 3, '2026-10-12');