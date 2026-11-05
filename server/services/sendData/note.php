<?php
    require_once __DIR__ . "/../../config/config.php";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        // RECUPERATION DE L'ID DE L'INSCRIPTION ET LES NOTES
        $note = $_POST['note'] ?? [];
        $inscription_id = (int) $_POST['inscription_id'] ?? 0;

        if($inscription_id <= 0 || !is_array($note)) {
            exit("Donnees invalide");
        }


        // Types de note autorises
        $types_autorise = ['semestre1','semestre2','examen_final'];

        // REQUETE
        $sql_insertion = 'INSERT INTO note (inscription_id, matiere_id, type_note, valeur)
            VALUES 
                (:inscription, :matiere, :type_note, :valeur)';
        
        foreach ($note as $type => $matieres) {
            if(!in_array($type,$types_autorise,TRUE)){ continue; }
            if(!is_array($matieres)) { continue; }

            foreach ($matieres as $matiere_id => $valeur) {
                if($valeur === '' || $valeur === null) { continue; }
                if(!$matiere_id || !is_numeric($valeur)) { continue; }

                $valeur = (float) $valeur;

                if($valeur < 0 || $valeur > 20) { continue; }

                $params = [
                    "inscription" => $inscription_id,
                    "matiere" => $matiere_id,
                    "type_note" => $type,
                    "valeur" => $valeur
                ];
                sendData($sql_insertion, $params);
            }
        }

        header("Location: ../../../public/pages/note/note.php");
        exit;
    }
?>
