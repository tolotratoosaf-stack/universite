<?php
    require_once __DIR__ . "/../../config/config.php";

    // CLASSE DISPONIBLE POUR UNE FILIERE PRECIS
    header("Content-Type: application/json; charset=UTF-8");

    $filiere = $_GET['filiere'] ?? '';
    if ($filiere === '') {
        echo json_encode([
            "success" => false,
            "classes" => []
        ]);
        exit;
    }
    $sql = "SELECT DISTINCT c.code_classe, c.nom_classe
            FROM classe_filiere cf
            INNER JOIN filiere f
                ON f.id = cf.id_filiere
            INNER JOIN classe c
                ON c.id = cf.id_classe
            WHERE f.nom_filiere = :filiere
            ORDER BY c.id ASC";
    $classes = getData($sql, [
        "filiere" => $filiere
    ]);
    echo json_encode([
        "success" => true,
        "classes" => $classes
    ]);
?>