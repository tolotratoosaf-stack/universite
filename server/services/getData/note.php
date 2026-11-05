<?php
    require_once __DIR__ . "/../../config/config.php";

    // FILTRES
    $filiere_actif = $_GET['filiere'] ?? 'gestion';
    $classe_actif = $_GET['classe'] ?? 'l1';
    $annee_actif = $_GET['annee'] ?? '2026-2027';

    // RECUPERATION DE TOUTES LES NOTES
    $sql_note = (string) 'SELECT 
    e.id AS etudiant_id, e.matricule, e.nom, e.prenom,
    a.libelle AS annee,
    m.id AS matiere_id, m.nom_matiere,
    n.type_note, n.valeur
        FROM note n
        JOIN inscription i ON i.id = n.inscription_id
        JOIN classe_filiere cf ON cf.id = i.id_classe_filiere
        JOIN filiere f ON f.id = cf.id_filiere
        JOIN classe c ON c.id = cf.id_classe
        JOIN etudiant e ON e.id = i.id_etudiant
        JOIN annee_universitaire a ON a.id = i.id_annee_universitaire
        JOIN matiere m ON m.id = n.matiere_id
        WHERE f.nom_filiere = :filiere
        AND c.code_classe = :classe
        AND a.libelle = :annee
        ORDER BY e.id, a.libelle, m.nom_matiere;';
    // SYNTAXE DU NOTE
    $params_note_sem = [
        "filiere" => $filiere_actif,
        "classe" => $classe_actif,
        "annee" => $annee_actif
        ];
    $apercu_note = getData($sql_note,$params_note_sem);

    // REPARTITION DES NOTES
    $grilles = [];
    foreach ($apercu_note as $n) {
        $grilles[$n['etudiant_id']][$n['type_note']][$n['matiere_id']] = $n['valeur'];
    };



    // RECUPERATION DE TOUTES LES ETUDIANTS VIA L'INSCRIPTION
    $sql_inscription = (string) 'SELECT DISTINCT i.id AS inscription_id, e.id, e.matricule, e.nom, e.prenom, f.nom_filiere, c.nom_classe
        FROM inscription i
        JOIN etudiant e ON e.id = i.id_etudiant
        JOIN classe_filiere cf ON cf.id = i.id_classe_filiere
        JOIN filiere f ON f.id = cf.id_filiere
        JOIN classe c ON c.id = cf.id_classe
        JOIN annee_universitaire a ON a.id = i.id_annee_universitaire
        WHERE f.nom_filiere = :filiere
        AND c.code_classe = :classe
        AND a.libelle = :annee;';
    $all_etudiant_inscrit = getData($sql_inscription,$params_note_sem);


    // RECUPERATION DE TOUTES LES MATIERES D'UNE FILIERES
    $sql_matiere = (string) 'SELECT m.id, m.nom_matiere
        FROM classe_filiere_matiere cfm
        JOIN classe_filiere cf ON cf.id = cfm.id_classe_filiere
        JOIN filiere f ON f.id = cf.id_filiere
        JOIN classe c ON c.id = cf.id_classe
        JOIN matiere m ON m.id = cfm.id_matiere
        WHERE f.nom_filiere = :filiere
        AND c.code_classe = :classe';
    $all_matiere = getData($sql_matiere, ["filiere"=>$filiere_actif, "classe"=>$classe_actif]);
?>