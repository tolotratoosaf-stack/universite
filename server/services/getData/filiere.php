<?php
    require_once __DIR__ . "/../../config/config.php";

    // RECUPERATION DE TOUTES LES FILIERES
    $sql_all_filiere = "SELECT DISTINCT(nom_filiere), description_filiere FROM filiere";
    $all_filiere = getData($sql_all_filiere,[]);

    $sql_filiere = (string) 'SELECT f.nom_filiere, c.nom_classe, cf.capacite
        FROM classe_filiere cf
        JOIN filiere f ON f.id = cf.id_filiere
        JOIN classe c ON c.id = cf.id_classe';
    $apercu_filiere = getData($sql_filiere,[]);
?>