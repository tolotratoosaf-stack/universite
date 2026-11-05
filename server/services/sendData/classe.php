<?php
    require_once __DIR__ . "/../../config/config.php";

    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        $classe_name = $_POST['classe_name'];
        $code_classe = $_POST['code_classe'];
        $capacite = $_POST['capacite'];
        $filiere = $_POST['filiere'] ?? '';
        $classe_description = $_POST['classe_description'];

        if($filiere === '') {
            exit('Impossible d\'enregistrer une classe sans le filiere rattacher');
        }

        $sql_enregistrement = 'INSERT INTO classe (nom_classe, code_classe, description_classe)
            VALUES (:classe_name, :code_classe, :classe_description)';
        $params_enregistrement = [
            "classe_name" => $classe_name,
            "code_classe" => $code_classe,
            "classe_description" => $classe_description
        ];
        sendData($sql_enregistrement, $params_enregistrement);


        // IDENTIFICATION
        $sql_cible = 'SELECT c.id AS id_classe, f.id AS id_filiere
            FROM classe c
            CROSS JOIN filiere f
            WHERE c.code_classe = :code_classe
            AND f.code_filiere = :filiere';
        $params_cible = [
            "filiere" => $filiere,
            "code_classe" => $code_classe
        ];
        $resultat = getData($sql_cible, $params_cible);


        // VERIFICATION
        $sql_verification = 'SELECT id_classe
            FROM classe_filiere
            WHERE id_classe = :id_classe
            AND id_filiere = :id_filiere';
        $existe = getData($sql_verification, [
            "id_classe" => $resultat[0]['id_classe'],
            "id_filiere" => $resultat[0]['id_filiere']
        ]);

        if (!empty($existe)) {
            exit("Cette classe est déjà associée à cette filière.");
        }

        // ENVOIE DU DONNEE
        $sql = 'INSERT INTO classe_filiere (id_classe, id_filiere, capacite)
            VALUES (:id_classe, :id_filiere, :capacite);';
        $params = [
            "id_classe" => $resultat[0]['id_classe'],
            "id_filiere" => $resultat[0]['id_filiere'],
            "capacite" => $capacite
        ];
        sendData($sql, $params);

        header("Location: ../../../public/pages/admin/administration.php");
        exit;
    }
?>