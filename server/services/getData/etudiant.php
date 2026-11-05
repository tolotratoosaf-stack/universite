<?php
    require_once __DIR__ . "/../../config/config.php";

    // RECUPERATION DES FILTRES
    $search = trim($_GET['search']??'');
    $filiere_actif = $_GET['filiere'] ?? '';
    $classe_actif = $_GET['classe'] ?? '';
    $statut = $_GET['statut'] ?? '';
    $annee = $_GET['annee']??'2026-2027';

    // RECUPERATION DE TOUTES LES ETUDIANTS
    $sql = (string) 'SELECT e.matricule, e.nom, e.prenom, e.telephone, e.email, e.actif,
            f.nom_filiere, c.nom_classe, a.libelle AS annee
        FROM inscription i
        JOIN etudiant e ON e.id = i.id_etudiant
        JOIN classe_filiere cf ON cf.id = i.id_classe_filiere
        JOIN filiere f ON f.id = cf.id_filiere
        JOIN classe c ON c.id = cf.id_classe
        JOIN annee_universitaire a ON a.id = i.id_annee_universitaire
        WHERE a.libelle = :annee';
    
    $params = [ "annee" => $annee ];

    if($search !== '') {
        $sql .= ' AND (
                e.nom LIKE :search
                OR e.prenom LIKE :search
                OR e.matricule LIKE :search';
        $params["search"] = '%' . $search . '%';
    }

    if($filiere_actif !== '') {
        $sql .= ' AND f.nom_filiere = :filiere';
        $params['filiere'] = $filiere_actif;
    }

    if($classe_actif !== '') {
        $sql .= ' AND c.nom_classe = :classe';
        $params['classe'] = $classe_actif;
    }

    if($statut !== '') {
        $sql .= ' AND e.actif = :statut';
        $params['statut'] = $statut;
    }

    $etudiants = getData($sql, $params);

    // STATISTIQUES
    $sql_etudiant = (string) 'SELECT COUNT(*) AS count_etudiant FROM etudiant';
    $count_etudiant = getData($sql_etudiant, []);

    $sql_etudiant_actif = (string) 'SELECT COUNT(*) AS etudiant_actif
        FROM etudiant 
        WHERE actif = 1';
    $etudiant_actif = getData($sql_etudiant_actif,[]);

    $sql_nouveau_etudiant = (string) 'SELECT COUNT(*) AS nouveau_etudiant
        FROM inscription
        WHERE date_inscription 
            BETWEEN MAKEDATE(YEAR(CURDATE()),1)
            AND CONCAT(YEAR(CURDATE()), "-12-31")';
    $nouveau_etudiant = getData($sql_nouveau_etudiant,[]);
?>