<?php
    require_once __DIR__ . "/../../config/config.php";

    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        // information generale
        $matricule = $_POST['matricule'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'] ?? 1;
        $date_naissance = $_POST['date_naissance'];
        $lieu_naissance = $_POST['lieu_naissance'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];

        // information des parents
        $nom_mere = $_POST['nom_mere'];
        $prenom_mere = $_POST['prenom_mere'];
        $contact_mere = $_POST['contact_mere'];
        $nom_pere = $_POST['nom_pere'];
        $prenom_pere = $_POST['prenom_pere'];
        $contact_pere = $_POST['contact_pere'];
        $nom_tuteur = $_POST['nom_tuteur'];
        $prenom_tuteur = $_POST['prenom_tuteur'];
        $contact_tuteur = $_POST['contact_tuteur'];
        $lien_tuteur = $_POST['lien_tuteur'];

        // information d'inscription
        $filiere = $_POST['filiere'];
        $classe = $_POST['classe'];
        $annee_universitaire = $_POST['annee_universitaire'] ?? '2026-2027';
        $date_inscription = $_POST['date_inscription'];

        if(
            $filiere === '' ||
            $classe === '' ||
            $annee_universitaire === '' ||
            $date_inscription === ''
        ) { exit("Donnee invalide"); }

        // ENREGISTREMENT DE L'ETUDIANT
        $sql_enregistrement = 'INSERT INTO
            etudiant (matricule,nom,prenom,sexe,date_naissance,lieu_naissance,telephone,email,residence,
                mere_nom,mere_prenom,mere_contact,pere_nom,pere_prenom,pere_contact,
                tuteur_nom,tuteur_prenom,tuteur_contact,tuteur_lien)
            VALUES (:matricule,:nom,:prenom,:sexe,:date_naissance,:lieu_naissance,:telephone,:email,:residence,
                :mere_nom,:mere_prenom,:mere_contact,:pere_nom,:pere_prenom,:pere_contact,
                :tuteur_nom,:tuteur_prenom,:tuteur_contact,:tuteur_lien)';
        $params_enregistrement = [
            'matricule' => $matricule, 'nom' => $nom, 'prenom' => $prenom,
            'sexe' => $sexe, 'date_naissance' => $date_naissance, 'lieu_naissance' => $lieu_naissance,
            'telephone' => $contact, 'email' => $email, 'residence' => $adresse,
            'mere_nom' => $nom_mere, 'mere_prenom' => $prenom_mere, 'mere_contact' => $contact_mere,
            'pere_nom' => $nom_pere, 'pere_prenom' => $prenom_pere, 'pere_contact' => $contact_pere,
            'tuteur_nom' => $nom_tuteur, 'tuteur_prenom' => $prenom_tuteur, 'tuteur_contact' => $contact_tuteur,
            'tuteur_lien' => $lien_tuteur
        ];
        sendData($sql_enregistrement, $params_enregistrement);

        // RECUPERATION DE L'ID
        $sql_recup = "SELECT e.id AS id_etudiant, cf.id AS id_classe_filiere, a.id AS id_annee_universitaire
            FROM etudiant e
            JOIN classe_filiere cf
                ON cf.id_classe = (
                    SELECT c.id
                    FROM classe c
                    WHERE c.code_classe = :classe)
            JOIN filiere f
                ON f.id = cf.id_filiere
                AND f.nom_filiere = :filiere
            JOIN annee_universitaire a
                ON a.libelle = :annee_universitaire
            WHERE e.matricule = :matricule";

        $params_recup = [
            'matricule' => $matricule,
            'classe' => $classe,
            'filiere' => $filiere,
            'annee_universitaire' => $annee_universitaire
        ];

        $resultat = getData($sql_recup, $params_recup);

        if (empty($resultat)) {
            exit("Impossible de retrouver l'étudiant, la classe, la filière ou l'année universitaire.");
        }

        $id_etudiant = $resultat[0]['id_etudiant'];
        $id_classe_filiere = $resultat[0]['id_classe_filiere'];
        $id_annee_universitaire = $resultat[0]['id_annee_universitaire'];


        // INSCRIPTION
        $sql_inscription = 'INSERT INTO
                inscription (id_etudiant, id_classe_filiere, id_annee_universitaire, date_inscription)
            VALUES (:id_etudiant, :id_classe_filiere, :id_annee_universitaire, :date_inscription)';
        $params_inscription = [
            'id_etudiant' => $id_etudiant,
            'id_classe_filiere' => $id_classe_filiere,
            'id_annee_universitaire' => $id_annee_universitaire,
            'date_inscription' => $date_inscription
        ];
        sendData($sql_inscription, $params_inscription);

        header("Location: ../../../public/pages/admin/administration.php");
        exit;
    }
?>