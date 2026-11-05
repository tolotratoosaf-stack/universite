USE universite;

CREATE
OR REPLACE VIEW v_moyenne_matiere AS
SELECT
  inscription_id,
  matiere_id,
  ROUND(AVG(valeur), 2) AS moyenne,
  COUNT(*) AS nb_notes
FROM
  note
GROUP BY
  inscription_id,
  matiere_id;

CREATE
OR REPLACE VIEW v_bulletin AS
SELECT
  t.*,
  CASE
    WHEN NOT t.complet THEN NULL
    WHEN t.moyenne_generale >= 10 THEN 'admis'
    ELSE 'redouble'
  END AS decision,
  CASE
    WHEN NOT t.complet
    OR t.moyenne_generale < 10 THEN NULL
    WHEN t.moyenne_generale < 12 THEN 'passable'
    WHEN t.moyenne_generale < 14 THEN 'assez-bien'
    WHEN t.moyenne_generale < 16 THEN 'bien'
    ELSE 'tres-bien'
  END AS observation
FROM
  (
    SELECT
      i.id AS inscription_id,
      i.id_etudiant,
      i.id_classe_filiere,
      i.id_annee_universitaire,
      COUNT(vm.matiere_id) = COUNT(cfm.id_matiere) AS complet,
      ROUND(SUM(vm.moyenne * cfm.credit) / SUM(cfm.credit), 2) AS moyenne_generale
    FROM
      inscription i
      JOIN classe_filiere_matiere cfm ON cfm.id_classe_filiere = i.id_classe_filiere
      LEFT JOIN v_moyenne_matiere vm ON vm.inscription_id = i.id
      AND vm.matiere_id = cfm.id_matiere
      AND vm.nb_notes = 3
    GROUP BY
      i.id
  ) t;