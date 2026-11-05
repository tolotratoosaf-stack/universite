<?php
  require_once __DIR__ . "/../../../server/services/getData/classe.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <?php require_once __DIR__ . "/../../components/head.php"?>
    <title>Classe</title>
    <link rel="stylesheet" href="classe.css" />
    <script src="classe.js" defer></script>
  </head>
  <body>
    <!-- HEADER -->
    <?php require_once __DIR__ . "/../../components/header.php"?>

    <main>
      <!-- Header du page -->
      <div id="hero">
        <section class="page-heading">
          <form method="GET">
            <div class="heading-top">
              <div class="heading-title">
                <span class="heading-subtitle">ESPACE ACADÉMIQUE</span>
                <h1>Toutes les classes</h1>
                <p>
                  Retrouvez et consultez les différentes classes de votre
                  établissement.
                </p>
              </div>

              <div class="heading-counter">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Gestion des classes</span>
              </div>
            </div>

            <hr />

            <!-- FILTRES -->
            <div class="filter-container">
              <!-- Recherche -->
              <div class="filter-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                  type="search"
                  name="search"
                  id="searchClasse"
                  placeholder="Rechercher une classe..."
                />
              </div>
              
              <!-- Filtre filière -->
              <div class="filter-group">
                <label for="filterFiliere">Filière</label>
                <select id="filterFiliere" name="filiere">
                  <option value="">Toutes les filières</option>
                  <?php foreach($all_filiere as $filiere):?>
                    <option
                      value="<?= $filiere['nom_filiere']?>"
                      <?= $filiere['nom_filiere'] === ($_GET['filiere'] ?? '') ? 'selected' : '' ?>
                    >
                      <?= $filiere['nom_filiere']?>
                    </option>
                    <?php endforeach?>
                </select>
              </div>

              <!-- Filtre niveau -->
              <div class="filter-group">
                <label for="filterNiveau">Niveau</label>
                <select id="filterNiveau" name="classe">
                  <option value="">Tous les niveaux</option>
                  <?php foreach($classe as $classe_list):?>
                    <option
                      value="<?= $classe_list['code_classe']?>"
                      <?= $classe_list['code_classe'] === ($_GET['classe'] ?? '') ? 'selected' : ''?>
                    >
                      <?= $classe_list['nom_classe']?>
                    </option>
                    <?php endforeach?>
                  </select>
                </div>
                
                <!-- Réinitialisation -->
                <button type="button" class="reset-filter" id="resetFilter">
                  <i class="fa-solid fa-rotate-left"></i>
                Réinitialiser
              </button>
            </div>
          </form>
        </section>

        <!-- Contenue du page -->

        <section class="page-content">
          <!-- Classe -->
          <?php foreach($classe as $classe_list):?>
            <article class="classe-card">
              <div class="classe-card-header">
                <div class="classe-icon">
                  <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <span class="classe-status active">En cours</span>
              </div>

              <div class="classe-info">
                <span class="classe-label">Première année</span>
                <h2><?= $classe_list['nom_classe']?> - <?= $classe_list['nom_filiere']?></h2>
                <p>
                  <?= $classe_list['description_classe']?>
                </p>
              </div>

              <div class="classe-details">
                <div class="detail-item">
                  <i class="fa-solid fa-users"></i>
                  <div>
                    <strong><?= $classe_list['capacite']?></strong>
                    <span>Étudiants</span>
                  </div>
                </div>

                <div class="detail-item">
                  <i class="fa-regular fa-calendar"></i>
                  <div>
                    <strong>2026 - 2027</strong>
                    <span>Année universitaire</span>
                  </div>
                </div>
              </div>

              <div class="classe-footer">
                <span
                  ><i class="fa-solid fa-book-open"></i> Formation
                  universitaire</span
                >
                <a href="../etudiant/etudiant.php?filiere=<?= htmlspecialchars($classe_list['nom_filiere'])?>&classe"
                  >Voir les étudiants <i class="fa-solid fa-arrow-right"></i
                ></a>
              </div>
            </article>
          <?php endforeach?>
        </section>
      </div>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../../components/footer.php"?>
  </body>
</html>
