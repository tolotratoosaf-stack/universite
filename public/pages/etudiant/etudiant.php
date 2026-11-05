<?php
  require_once __DIR__ . "/../../../server/services/getData/etudiant.php";
  require_once __DIR__ . "/../../../server/services/getData/filiere.php";
  require_once __DIR__ . "/../../../server/services/getData/classe.php";

  function initiales(string $prenom, string $nom): string {
    $p = mb_substr(trim($prenom), 0, 1);
    $n = mb_substr(trim($nom), 0, 1);
    return mb_strtoupper($p . $n);
  }
?>

<!doctype html>
<html lang="fr">
  <head>
    <?php require_once __DIR__ . "/../../components/head.php"?>
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="etudiant.css" />
    <script src="etudiant.js" defer></script>
  </head>

  <body>
    <!-- HEADER -->
    <?php require_once __DIR__ . "/../../components/header.php"?>

    <main>
      <div id="hero">
        <!-- EN-TÊTE DE PAGE -->
        <section class="page-heading">
          <div class="heading-top">
            <div class="heading-title">
              <span class="heading-subtitle"> ESPACE ACADÉMIQUE </span>

              <h1>Liste des étudiants</h1>

              <p>
                Consultez et gérez les informations des étudiants de votre
                établissement.
              </p>
            </div>

            <div class="heading-actions">
              <button class="export-btn">
                <i class="fa-solid fa-file-export"></i>
                Exporter
              </button>
            </div>
          </div>

          <hr />

          <!-- STATISTIQUES -->
          <div class="student-stats">
            <article class="stat-card">
              <div class="stat-icon total">
                <i class="fa-solid fa-users"></i>
              </div>

              <div>
                <span>Total étudiants</span>
                <h2><?= $count_etudiant[0]['count_etudiant']?></h2>
                <small>Effectif général</small>
              </div>
            </article>

            <article class="stat-card">
              <div class="stat-icon female">
                <i class="fa-solid fa-user-graduate"></i>
              </div>

              <div>
                <span>Étudiants actifs</span>
                <h2><?= $etudiant_actif[0]['etudiant_actif']?></h2>
                <small>Inscrits cette année</small>
              </div>
            </article>

            <article class="stat-card">
              <div class="stat-icon male">
                <i class="fa-solid fa-user-check"></i>
              </div>

              <div>
                <span>Nouveaux étudiants</span>
                <h2><?= $nouveau_etudiant[0]['nouveau_etudiant']?></h2>
                <small>Nouvelle inscription</small>
              </div>
            </article>

            <article class="stat-card">
              <div class="stat-icon waiting">
                <i class="fa-solid fa-user-clock"></i>
              </div>

              <div>
                <span>En attente</span>
                <h2>0</h2>
                <small>Dossiers à vérifier</small>
              </div>
            </article>
          </div>
        </section>

        <!-- CONTENU PRINCIPAL -->
        <section class="page-content">
          <div class="content-heading">
            <div>
              <h2>Tous les étudiants</h2>
              <p>
                Retrouvez les étudiants selon leurs informations académiques.
              </p>
            </div>

            <span class="result-count">
              <i class="fa-solid fa-users"></i>
              <?= count($etudiants)?> étudiants
            </span>
          </div>

          <!-- FILTRES -->
          <form class="filter-container" method="GET">
            <div class="filter-search">
              <i class="fa-solid fa-magnifying-glass"></i>

              <input
                type="search"
                id="searchStudent"
                name="search"
                placeholder="Rechercher par nom, matricule..."
              />
            </div>

            <div class="filter-group">
              <label for="filterFiliere">Filière</label>

              <select id="filterFiliere" name="filiere">
                <option
                  value=""
                  <?= ($_GET["filiere"] ?? '') === '' ? 'selected' : ''?>
                >Toutes les filières</option>
                <?php foreach($all_filiere as $filiere):?>
                  <option
                    value="<?= $filiere['nom_filiere']?>"
                    <?= $filiere['nom_filiere'] === ($_GET['filiere'] ?? '') ? 'selected' : ''?>
                  >
                    <?= $filiere['nom_filiere']?>
                  </option>
                <?php endforeach?>
              </select>
            </div>

            <div class="filter-group">
              <label for="filterClasse">Classe</label>

              <select id="filterClasse" name="classe">
                <option
                  value=""
                  <?= ($_GET["classe"] ?? '') ==='' ? 'selected' : ''?>
                >Toutes les classes</option>
                <?php foreach($classe_distinct as $list_classe):?>
                  <option
                    value="<?= $list_classe['nom_classe']?>"
                    <?= $list_classe['nom_classe'] === ($_GET['classe'] ?? '') ? 'selected' : ''?>
                  >
                    <?= $list_classe['nom_classe']?>
                  </option>
                <?php endforeach?>
              </select>
            </div>

            <div class="filter-group">
              <label for="filterStatut">Statut</label>

              <select id="filterStatut" name="statut">
                <option
                  value=""
                  <?= ($_GET["statut"] ?? '') ==='' ? 'selected' : ''?>
                >Tous les statuts</option>
                <option
                  value="actif"
                  <?= ($_GET['statut'] ?? '') === 'actif' ? 'selected' : ''?>
                >Actif</option>
                <option
                  value='attente'
                  <?= ($_GET['statut'] ?? '') === 'attente' ? 'selected' : ''?>
                >En attente</option>
                <option
                  value='suspendu'
                  <?= ($_GET['statut'] ?? '') === 'suspendu' ? 'selected' : ''?>
                >Suspendu</option>
              </select>
            </div>

            <button class="reset-filter" type="button">
              <i class="fa-solid fa-rotate-left"></i>
              Réinitialiser
            </button>
          </form>

          <!-- TABLEAU DES ÉTUDIANTS -->
          <div class="table-container">
            <table class="student-table">
              <thead>
                <tr>
                  <th>
                    <input type="checkbox" aria-label="Tout sélectionner" />
                  </th>
                  <th>Étudiant</th>
                  <th>Matricule</th>
                  <th>Filière</th>
                  <th>Classe</th>
                  <th>Contact</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <!-- ÉTUDIANTS -->
                <?php foreach($etudiants as $etudiant):?>
                  <tr>
                    <td>
                      <input
                        type="checkbox"
                        aria-label="Sélectionner <?= $etudiant['nom']?>"
                      />
                    </td>

                    <td>
                      <div class="student-identity">
                        <div class="student-avatar avatar-one">
                          <?= htmlspecialchars(initiales($etudiant['prenom'], $etudiant['nom'])) ?>
                        </div>
                        <div>
                          <strong><?= $etudiant['prenom']?> <?= $etudiant['nom']?></strong>
                          <span><?= $etudiant['matricule']?></span>
                        </div>
                      </div>
                    </td>

                    <td><?= $etudiant['matricule']?></td>
                    <td><?= $etudiant['nom_filiere']?></td>
                    <td><?= $etudiant['nom_classe']?></td>

                    <td>
                      <div class="contact-info">
                        <span><?= $etudiant['email']?></span>
                        <small><?= $etudiant['telephone']?></small>
                      </div>
                    </td>

                    <td>
                      <?php $estActif = (int) $etudiant['actif'] === 1; ?>
                      <span class="status <?= $estActif ? 'active' : ''?>">
                        <?= $estActif ? 'actif' : 'suspendue'?>
                      </span>
                    </td>

                    <td>
                      <div class="action-buttons">
                        <button class="action-btn view" title="Voir le profil">
                          <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="action-btn edit" title="Modifier">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="action-btn delete" title="Supprimer">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach?>
              </tbody>
            </table>
          </div>

          <!-- PIED DU TABLEAU -->
          <div class="table-footer">
            <span>
              <strong><?= count($etudiants)?> étudiants</strong>
            </span>
          </div>
        </section>
      </div>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../../components/footer.php"?>
  </body>
</html>
