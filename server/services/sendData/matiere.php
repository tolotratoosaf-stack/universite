<?php
    require_once __DIR__ . "/../../config/config.php";

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        // information du matiere
        $matiere_name = $_POST['matiere_name'];
        $code_matiere = $_POST['code_matiere'];
        $description_matiere = $_POST['description_matiere'];
        // affectation
        $affectations = $_POST['affectations'];

        if($affectations === []) exit("Impossible d'enregistrer sans les affectations");

        // ENREGISTREMENT DANS LE MATIERE
        $sql_matiere = (string) 'INSERT INTO matiere (code_matiere, nom_matiere, description_matiere)
                VALUES (:code_matiere, :nom_matiere, :description_matiere)';
        $params_matiere = [
            "code_matiere" => $code_matiere,
            "nom_matiere" => $matiere_name,
            "description_matiere" => $description_matiere
        ];
        sendData($sql_matiere,$params_matiere);


        // RECUPERATION DE L'ID DU DERNIERE ENREGISTREMENT DANS MATIERE
        $sql_r_matiere = (string) 'SELECT id FROM matiere
            WHERE code_matiere = :code_matiere AND nom_matiere = :nom_matiere';
        $params_r_matiere = [
            "code_matiere" => $code_matiere,
            "nom_matiere" => $matiere_name
        ];
        $result_r_matiere = getData($sql_r_matiere, $params_r_matiere);
        $id_matiere = $result_r_matiere[0]['id'];



        // ENREGISTREMENT ET RECUPERATION
        // id_matiere ok
        // id_classe_filiere ok apres 3 boucles imbriques de "affections"
        foreach ($affectations as $affectation) {
            foreach ($affectation as $aff_filiere) {
                foreach ($aff_filiere as $aff_classe) {
                    $sql = 'INSERT INTO
                        classe_filiere_matiere (id_classe_filiere, id_matiere, id_professeur, credit)
                        VALUES (:id_classe_filiere, :id_matiere, :id_professeur, :credit)';
                    $params = [
                        "id_classe_filiere" => $aff_classe['active'],
                        "id_matiere" => $id_matiere,
                        "id_professeur" => $aff_classe['professeur'],
                        "credit" => $aff_classe['credit']
                    ];

                    sendData($sql, $params);
                }
            }
        }

        header("Location: ../../../public/pages/admin/administration.php");
        exit;
    }
?>
