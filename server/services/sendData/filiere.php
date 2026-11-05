<?php
    require_once __DIR__ . "/../../config/config.php";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom_filiere = $_POST['nom_filiere'];
        $code_filiere = $_POST['code_filiere'];
        $description_filiere = $_POST['description_filiere'] ?? $nom_filiere;
        $matieres = $_POST['matieres'] ?? [];
        $credits = $_POST['credits'] ?? [];
        $classes = $_POST['classes'] ?? [];



        // VERIFICATION DES MATIERES ET CREDITS ASSOCIES
        if($matieres === [] || $credits === [] || $classes === []) {
            exit('Impossible d\'enregistrer sans les matieres et le credit');
        }

        $sql_filiere = (string) 'INSERT INTO filiere (code_filiere, nom_filiere, description_filiere)
                VALUES (:code_filiere, :nom_filiere, :description_filiere);';
        $params_filiere = [
            "code_filiere" => $code_filiere,
            "nom_filiere" => $nom_filiere,
            "description_filiere" => $description_filiere
        ];
        sendData($sql_filiere,$params_filiere);



        // RECUPERATION DU FILIERE DERNIEREMENT ENREGISTRER DANS FILIERE
        $sql_recup_filiere = (string) 'SELECT id FROM filiere WHERE code_filiere = :code_filiere';
        $last_filiere = getData($sql_recup_filiere,["code_filiere" => $code_filiere]);


        // RECUPERATION DE L'ID DES CLASSES
        $placeholders_classes = implode(",", array_fill(0, count($classes), "?"));
        $sql_id_classes = "SELECT id FROM classe WHERE code_classe IN ($placeholders_classes)";
        $id_classes = getData($sql_id_classes, array_values($classes));




        // RECUPERATION DE L'ID DU MATIERE
        $placeholders = implode(",", array_fill(0, count($matieres), "?"));
        $sql_id_matiere = "SELECT id, code_matiere FROM matiere WHERE code_matiere IN ($placeholders)";
        $id_matiere = getData($sql_id_matiere, array_values($matieres));




        // ENREGISTREMENT DU CLASSE_FILIERE
        foreach ($id_classes as $classe) {
            $sql_classe_filiere = (string) ' INSERT INTO classe_filiere (id_classe, id_filiere, capacite)
                VALUES (:id_classe, :id_filiere, 40)';
            $params_classes = [
                "id_classe" => $classe['id'],
                "id_filiere" => $last_filiere[0]['id']
            ];
            sendData($sql_classe_filiere,$params_classes);

            // RECUPERATION DE L'ID DANS CLASSE_FILIERE
            $sql_recup_classe_filiere = (string) 'SELECT id FROM classe_filiere
                    WHERE id_filiere = :id_filiere AND id_classe = :id_classe';
            $result = getData($sql_recup_classe_filiere, [
                "id_filiere" => $last_filiere[0]['id'],
                "id_classe" => $classe['id']
            ]);
            $id_classe_filiere = $result[0]['id'];

            // ENREGISTREMENT DANS CLASSE_FILIERE_MATIERE
            foreach ($id_matiere as $matiere) {
                $credit = $credits[$matiere['code_matiere']] ?: 2;

                $sql = (string) 'INSERT INTO
                    classe_filiere_matiere (id_classe_filiere, id_matiere, id_professeur, credit)
                    VALUES (:id_classe_filiere, :id_matiere, :id_professeur, :credit)';
                $params = [
                    "id_classe_filiere" => $id_classe_filiere,
                    "id_matiere" => $matiere['id'],
                    "id_professeur" => 1,
                    "credit" => $credit
                ];
                sendData($sql, $params);
            }
        }


        

        header('Location: ../../../public/pages/admin/administration.php');
        exit;

    }
?>