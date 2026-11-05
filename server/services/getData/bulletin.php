<?php
    require_once __DIR__ . "/../../config/config.php";

    // RECUPERATION DES FILTRES
    $annee_actif = $_GET['annee'] ?? '2026-2027';
    $filiere_actif = $_GET['filiere'] ?? 'gestion';
    $classe_actif = $_GET['classe'] ?? 'l1';
    $search = trim($_GET['search'] ?? '');
    $decision_f = $_GET['decision'] ?? '';

    $params = [
        "filiere" => $filiere_actif,
        "classe" => $classe_actif,
        "annee" => $annee_actif
    ];
    $where = "";

    // AJOUT DE CONDITION
    if($search !== '') {
        $where .= ' AND (e.nom LIKE :s1 OR e.prenom LIKE :s2 OR e.matricule LIKE :s3)';
        $params['s1'] = $params['s2'] = $params['s3'] = '%' . $search . '%';
    }

    if ($decision_f === 'admis' || $decision_f === 'redouble') {
        $where .= ' AND b.decision = :decision';
        $params["decision"] = $decision_f;
    } elseif ($decision_f === 'en_attente') {
        $where .= ' AND b.decision IS NULL';
    }
    
    $sql_bulletin = 'SELECT b.inscription_id, b.moyenne_generale, b.decision, b.observation,
        e.matricule, e.nom, e.prenom, e.sexe,
        f.nom_filiere, c.code_classe, a.libelle AS annee
        FROM v_bulletin b
        JOIN etudiant e            ON e.id = b.id_etudiant
        JOIN classe_filiere cf     ON cf.id = b.id_classe_filiere
        JOIN filiere f             ON f.id = cf.id_filiere
        JOIN classe c              ON c.id = cf.id_classe
        JOIN annee_universitaire a ON a.id = b.id_annee_universitaire
        WHERE f.nom_filiere = :filiere
          AND c.code_classe = :classe
          AND a.libelle = :annee' . $where . '
        ORDER BY e.nom, e.prenom';
    $bulletins = getData($sql_bulletin,$params);

    $sql_detail = 'SELECT i.id AS inscription_id, m.code_matiere, m.nom_matiere,
        vm.moyenne, vm.nb_notes
        FROM inscription i
        JOIN classe_filiere cf          ON cf.id = i.id_classe_filiere
        JOIN filiere f                  ON f.id = cf.id_filiere
        JOIN classe c                   ON c.id = cf.id_classe
        JOIN annee_universitaire a      ON a.id = i.id_annee_universitaire
        JOIN classe_filiere_matiere cfm ON cfm.id_classe_filiere = i.id_classe_filiere
        JOIN matiere m                  ON m.id = cfm.id_matiere
        LEFT JOIN v_moyenne_matiere vm  ON vm.inscription_id = i.id AND vm.matiere_id = m.id
        WHERE f.nom_filiere = :filiere
          AND c.code_classe = :classe
          AND a.libelle = :annee
        ORDER BY i.id, m.nom_matiere';
    $detail = getData($sql_detail, ["filiere" => $filiere, "classe" => $classe, "annee" => $annee_actif]);


    // Regroupement par inscription
    $matieres_par_insc = [];
    foreach ($detail as $l) {
        $matieres_par_insc[$l['inscription_id']][] = $l;
    }

    // Observation d'une matière (mêmes seuils que la vue)
    function observation(?string $moy): string {
        if ($moy === null) return '—';
        $m = (float) $moy;
        if ($m < 10) return 'Insuffisant';
        if ($m < 12) return 'Passable';
        if ($m < 14) return 'Assez bien';
        if ($m < 16) return 'Bien';
        return 'Très bien';
    }
    function h($v): string { return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8'); }
    function fmt($v): string { return $v === null ? '—' : number_format((float) $v, 2, ',', ' '); }
?>