-- CREATION ET UTILISATION DU DATABASES
CREATE DATABASE IF NOT EXISTS universite CHARACTER
SET
  = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE universite;

-- ===============================================
--      CREATION DU TABLE DE NOTE
-- ===============================================
CREATE TABLE IF NOT EXISTS note (
  id INT AUTO_INCREMENT PRIMARY KEY,
  inscription_id INT UNSIGNED NOT NULL,
  matiere_id INT UNSIGNED NOT NULL,
  type_note ENUM ('semestre1', 'semestre2', 'examen_final') NOT NULL,
  valeur DECIMAL(4, 2) NOT NULL,
  --   
  --   CHECK
  CONSTRAINT chk_valeur CHECK (valeur BETWEEN 0 AND 20),
  --   CLE ETRANGERE
  CONSTRAINT fk_note_inscription FOREIGN KEY (inscription_id) REFERENCES inscription (id),
  CONSTRAINT fk_note_matiere FOREIGN KEY (matiere_id) REFERENCES matiere (id),
  --   UNIQUE
  CONSTRAINT uq_type_matiere_inscription UNIQUE (inscription_id, matiere_id, type_note)
);

-- ---------------------------------------------
--    TESTE D'INSERTION NOTE
-- ---------------------------------------------
INSERT INTO
  note (inscription_id, matiere_id, type_note, valeur)
VALUES
  -- Inscription 1 : Étudiant 1, L1 Informatique, 2025-2026 (matières 1, 2, 8)
  (1, 1, 'semestre1', 12.50),
  (1, 2, 'semestre1', 14.00),
  (1, 8, 'semestre1', 11.75),
  -- Inscription 2 : Étudiant 1, L2 Informatique, 2026-2027 (matières 4, 5, 1)
  (2, 4, 'semestre1', 13.25),
  (2, 5, 'semestre1', 15.50),
  (2, 1, 'semestre1', 10.00),
  -- Inscription 3 : Étudiant 2, L1 Gestion, 2025-2026 (matières 1, 3, 7)
  (3, 1, 'semestre1', 9.50),
  (3, 3, 'semestre1', 12.00),
  (3, 7, 'semestre1', 13.75),
  -- Inscription 4 : Étudiant 2, L2 Gestion, 2026-2027 (matières 3, 7)
  (4, 3, 'semestre1', 14.50),
  (4, 7, 'semestre1', 12.25),
  -- Inscription 5 : Étudiant 3, L1 Informatique, 2025-2026 (matières 1, 2, 8)
  (5, 1, 'semestre1', 7.50),
  (5, 2, 'semestre1', 9.00),
  (5, 8, 'semestre1', 10.50),
  -- Inscription 6 : Étudiant 3 (redoublant), L1 Informatique, 2026-2027 (matières 1, 2, 8)
  (6, 1, 'semestre1', 11.00),
  (6, 2, 'semestre1', 12.75),
  (6, 8, 'semestre1', 13.00),
  -- Inscription 7 : Étudiant 4, L1 Droit, 2025-2026 (matières 6, 8)
  (7, 6, 'semestre1', 15.00),
  (7, 8, 'semestre1', 16.25),
  -- Inscription 8 : Étudiant 5, L1 Informatique, 2026-2027 (matières 1, 2, 8)
  (8, 1, 'semestre1', 16.00),
  (8, 2, 'semestre1', 17.50),
  (8, 8, 'semestre1', 14.25),
  -- Inscription 9 : Étudiant 6, L1 Gestion, 2026-2027 (matières 1, 3, 7)
  (9, 1, 'semestre1', 8.75),
  (9, 3, 'semestre1', 11.50),
  (9, 7, 'semestre1', 10.25),
  -- Inscription 10 : Étudiant 7, L1 Informatique, 2026-2027 (matières 1, 2, 8)
  (10, 1, 'semestre1', 13.50),
  (10, 2, 'semestre1', 12.00),
  (10, 8, 'semestre1', 15.75),
  -- Inscription 11 : Étudiant 8, L1 Droit, 2026-2027 (matières 6, 8)
  (11, 6, 'semestre1', 12.50),
  (11, 8, 'semestre1', 9.75),
  -- Inscription 12 : Étudiant 9, L1 Gestion, 2026-2027 (matières 1, 3, 7)
  (12, 1, 'semestre1', 10.50),
  (12, 3, 'semestre1', 13.00),
  (12, 7, 'semestre1', 11.25),
  -- Inscription 13 : Étudiant 10, L1 Droit, 2026-2027 (matières 6, 8)
  (13, 6, 'semestre1', 14.75),
  (13, 8, 'semestre1', 17.00);