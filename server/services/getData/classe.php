<?php
    require_once __DIR__ . "/../../config/config.php";


    // RECUPERATION DES FILTRES
    $filiere_actif = $_GET['filiere'] ?? '';
    $classe_actif = $_GET['classe'] ?? '';
    $search = trim($_GET['search'] ?? '');

    // RECUPERATION DE TOUTES LES CLASSES
    $sql = (string) "SELECT f.nom_filiere, c.nom_classe, c.code_classe, c.description_classe, cf.capacite
            FROM classe_filiere cf
            JOIN filiere f ON f.id = cf.id_filiere
            JOIN classe c ON c.id = cf.id_classe
            WHERE 1 = 1";
    $params = [];

    if ($search !== '') {
        $sql .= " AND (c.nom_classe LIKE :s1 OR f.nom_filiere LIKE :s2)";
        $params["s1"] = $params["s2"] = "%" . $search . "%";
    }
    if ($filiere_actif !== '') {
        $sql .= " AND f.nom_filiere = :filiere";
        $params["filiere"] = $filiere_actif;
    }
    if ($classe_actif !== '') {
        $sql .= " AND c.code_classe = :classe";
        $params["classe"] = $classe_actif;
    }
    $sql .= " ORDER BY c.id, f.nom_filiere";
    $classe = getData($sql,$params);

    // RECUPERATION DE TOUTES LA CLASSE SANS DOUBLANT
    $sql_distinc = (string) "SELECT DISTINCT(nom_classe), code_classe, id FROM classe";
    $classe_distinct = getData($sql_distinc,[]);

    $sql_all_filiere = "SELECT DISTINCT(nom_filiere), code_filiere FROM filiere ORDER BY nom_filiere ASC";
    $all_filiere = getData($sql_all_filiere,[]);
?>