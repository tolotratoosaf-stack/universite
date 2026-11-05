<?php
    require_once __DIR__ . "/../../config/config.php";

    // RECUPERATION DE TOUTES LES MATIERES
    $sql = (string) 'SELECT * FROM matiere;';
    $all_matiere = getData($sql,[]);

    // RECUPERATION DE TOUTES LES FILIERES
    $sql_filiere = (string) 'SELECT * FROM filiere';
    $all_filiere = getData($sql_filiere,[]);

    // RECUPERATION DE TOUTES LES CLASSES PAR FILIERES
    $sql_classe_filiere = (string) 'SELECT cf.id, f.nom_filiere, f.code_filiere, c.code_classe 
        FROM classe_filiere cf
        JOIN filiere f ON f.id = cf.id_filiere
        JOIN classe c ON c.id = cf.id_classe';
    $classe_filiere = getData($sql_classe_filiere,[]);

    // RECUPERATION DE TOUTES LES PROFESSEURS
    $sql_professeur = (string) 'SELECT * FROM professeur';
    $professeur = getData($sql_professeur,[]);
?>