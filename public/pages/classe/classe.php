<!doctype html>
<html lang="en">
  <head>
    <?php require_once __DIR__ . "/../../components/head.php"?>
    <title>Classe</title>
    <link rel="stylesheet" href="classe.css" />
  </head>
  <body>
    <!-- HEADER -->
    <?php require_once __DIR__ . "/../../components/header.php"?>

    <main>
      <!-- Header du page -->
      <div id="hero">
        <section class="page-heading">
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
                id="searchClasse"
                placeholder="Rechercher une classe..."
              />
            </div>

            <!-- Filtre filière -->
            <div class="filter-group">
              <label for="filterFiliere">Filière</label>
              <select id="filterFiliere">
                <option value="">Toutes les filières</option>
                <option value="gestion">Gestion</option>
                <option value="informatique">Informatique</option>
                <option value="droit">Droit</option>
              </select>
            </div>

            <!-- Filtre niveau -->
            <div class="filter-group">
              <label for="filterNiveau">Niveau</label>
              <select id="filterNiveau">
                <option value="">Tous les niveaux</option>
                <option value="l1">Licence 1</option>
                <option value="l2">Licence 2</option>
                <option value="l3">Licence 3</option>
                <option value="m1">Master 1</option>
                <option value="m2">Master 2</option>
              </select>
            </div>

            <!-- Réinitialisation -->
            <button type="button" class="reset-filter" id="resetFilter">
              <i class="fa-solid fa-rotate-left"></i>
              Réinitialiser
            </button>
          </div>
        </section>

        <!-- Contenue du page -->

        <section class="page-content">
          <!-- Classe L1 -->
          <article class="classe-card">
            <div class="classe-card-header">
              <div class="classe-icon">
                <i class="fa-solid fa-graduation-cap"></i>
              </div>
              <span class="classe-status active">En cours</span>
            </div>

            <div class="classe-info">
              <span class="classe-label">Première année</span>
              <h2>Licence 1 - Gestion</h2>
              <p>
                Classe destinée aux étudiants de première année en filière
                Gestion.
              </p>
            </div>

            <div class="classe-details">
              <div class="detail-item">
                <i class="fa-solid fa-users"></i>
                <div>
                  <strong>45</strong>
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
              <a href="#"
                >Voir les étudiants <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </article>

          <!-- Classe L2 -->
          <article class="classe-card">
            <div class="classe-card-header">
              <div class="classe-icon">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <span class="classe-status active">En cours</span>
            </div>

            <div class="classe-info">
              <span class="classe-label">Deuxième année</span>
              <h2>Licence 2 - Gestion</h2>
              <p>
                Classe destinée aux étudiants de deuxième année en filière
                Gestion.
              </p>
            </div>

            <div class="classe-details">
              <div class="detail-item">
                <i class="fa-solid fa-users"></i>
                <div>
                  <strong>38</strong>
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
              <a href="#"
                >Voir les étudiants <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </article>

          <!-- Classe L3 -->
          <article class="classe-card">
            <div class="classe-card-header">
              <div class="classe-icon">
                <i class="fa-solid fa-award"></i>
              </div>
              <span class="classe-status active">En cours</span>
            </div>

            <div class="classe-info">
              <span class="classe-label">Troisième année</span>
              <h2>Licence 3 - Gestion</h2>
              <p>
                Classe destinée aux étudiants de troisième année en filière
                Gestion.
              </p>
            </div>

            <div class="classe-details">
              <div class="detail-item">
                <i class="fa-solid fa-users"></i>
                <div>
                  <strong>32</strong>
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
              <a href="#"
                >Voir les étudiants <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </article>

          <!-- Classe M1 -->
          <article class="classe-card">
            <div class="classe-card-header">
              <div class="classe-icon">
                <i class="fa-solid fa-user-tie"></i>
              </div>
              <span class="classe-status active">En cours</span>
            </div>

            <div class="classe-info">
              <span class="classe-label">Première année de Master</span>
              <h2>Master 1 - Gestion</h2>
              <p>
                Classe de spécialisation destinée aux étudiants poursuivant
                leurs études en Master.
              </p>
            </div>

            <div class="classe-details">
              <div class="detail-item">
                <i class="fa-solid fa-users"></i>
                <div>
                  <strong>25</strong>
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
              <a href="#"
                >Voir les étudiants <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </article>

          <!-- Classe M2 -->
          <article class="classe-card">
            <div class="classe-card-header">
              <div class="classe-icon">
                <i class="fa-solid fa-user-graduate"></i>
              </div>
              <span class="classe-status active">En cours</span>
            </div>

            <div class="classe-info">
              <span class="classe-label">Deuxième année de Master</span>
              <h2>Master 2 - Gestion</h2>
              <p>
                Dernière année de formation universitaire, consacrée à
                l'approfondissement et à la spécialisation.
              </p>
            </div>

            <div class="classe-details">
              <div class="detail-item">
                <i class="fa-solid fa-users"></i>
                <div>
                  <strong>18</strong>
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
              <a href="#"
                >Voir les étudiants <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </article>
        </section>
      </div>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../../components/footer.php"?>
  </body>
</html>
