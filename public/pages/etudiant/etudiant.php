<!doctype html>
<html lang="fr">
  <head>
    <?php require_once __DIR__ . "/../../components/head.php"?>
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="etudiant.css" />
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
                <h2>158</h2>
                <small>Effectif général</small>
              </div>
            </article>

            <article class="stat-card">
              <div class="stat-icon female">
                <i class="fa-solid fa-user-graduate"></i>
              </div>

              <div>
                <span>Étudiants actifs</span>
                <h2>142</h2>
                <small>Inscrits cette année</small>
              </div>
            </article>

            <article class="stat-card">
              <div class="stat-icon male">
                <i class="fa-solid fa-user-check"></i>
              </div>

              <div>
                <span>Nouveaux étudiants</span>
                <h2>24</h2>
                <small>Nouvelle inscription</small>
              </div>
            </article>

            <article class="stat-card">
              <div class="stat-icon waiting">
                <i class="fa-solid fa-user-clock"></i>
              </div>

              <div>
                <span>En attente</span>
                <h2>16</h2>
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
              158 étudiants
            </span>
          </div>

          <!-- FILTRES -->
          <div class="filter-container">
            <div class="filter-search">
              <i class="fa-solid fa-magnifying-glass"></i>

              <input
                type="search"
                id="searchStudent"
                placeholder="Rechercher par nom, matricule..."
              />
            </div>

            <div class="filter-group">
              <label for="filterFiliere">Filière</label>

              <select id="filterFiliere">
                <option value="">Toutes les filières</option>
                <option>Gestion</option>
                <option>Informatique</option>
                <option>Droit</option>
              </select>
            </div>

            <div class="filter-group">
              <label for="filterClasse">Classe</label>

              <select id="filterClasse">
                <option value="">Toutes les classes</option>
                <option>Licence 1</option>
                <option>Licence 2</option>
                <option>Licence 3</option>
                <option>Master 1</option>
                <option>Master 2</option>
              </select>
            </div>

            <div class="filter-group">
              <label for="filterStatut">Statut</label>

              <select id="filterStatut">
                <option value="">Tous les statuts</option>
                <option>Actif</option>
                <option>En attente</option>
                <option>Suspendu</option>
              </select>
            </div>

            <button class="reset-filter" type="button">
              <i class="fa-solid fa-rotate-left"></i>
              Réinitialiser
            </button>
          </div>

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
                <!-- ÉTUDIANT 1 -->
                <tr>
                  <td>
                    <input
                      type="checkbox"
                      aria-label="Sélectionner Jean Rakoto"
                    />
                  </td>

                  <td>
                    <div class="student-identity">
                      <div class="student-avatar avatar-one">JR</div>
                      <div>
                        <strong>Jean Rakoto</strong>
                        <span>Masculin</span>
                      </div>
                    </div>
                  </td>

                  <td>ETU-2026-001</td>
                  <td>Gestion</td>
                  <td>Licence 2</td>

                  <td>
                    <div class="contact-info">
                      <span>jean@email.com</span>
                      <small>+261 34 00 000 01</small>
                    </div>
                  </td>

                  <td>
                    <span class="status active">Actif</span>
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

                <!-- ÉTUDIANT 2 -->
                <tr>
                  <td>
                    <input
                      type="checkbox"
                      aria-label="Sélectionner Marie Andria"
                    />
                  </td>

                  <td>
                    <div class="student-identity">
                      <div class="student-avatar avatar-two">MA</div>
                      <div>
                        <strong>Marie Andria</strong>
                        <span>Féminin</span>
                      </div>
                    </div>
                  </td>

                  <td>ETU-2026-002</td>
                  <td>Informatique</td>
                  <td>Licence 1</td>

                  <td>
                    <div class="contact-info">
                      <span>marie@email.com</span>
                      <small>+261 34 00 000 02</small>
                    </div>
                  </td>

                  <td>
                    <span class="status active">Actif</span>
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

                <!-- ÉTUDIANT 3 -->
                <tr>
                  <td>
                    <input
                      type="checkbox"
                      aria-label="Sélectionner Paul Rabe"
                    />
                  </td>

                  <td>
                    <div class="student-identity">
                      <div class="student-avatar avatar-three">PR</div>
                      <div>
                        <strong>Paul Rabe</strong>
                        <span>Masculin</span>
                      </div>
                    </div>
                  </td>

                  <td>ETU-2026-003</td>
                  <td>Droit</td>
                  <td>Licence 3</td>

                  <td>
                    <div class="contact-info">
                      <span>paul@email.com</span>
                      <small>+261 34 00 000 03</small>
                    </div>
                  </td>

                  <td>
                    <span class="status pending">En attente</span>
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

                <!-- ÉTUDIANT 4 -->
                <tr>
                  <td>
                    <input
                      type="checkbox"
                      aria-label="Sélectionner Sarah Raso"
                    />
                  </td>

                  <td>
                    <div class="student-identity">
                      <div class="student-avatar avatar-four">SR</div>
                      <div>
                        <strong>Sarah Raso</strong>
                        <span>Féminin</span>
                      </div>
                    </div>
                  </td>

                  <td>ETU-2026-004</td>
                  <td>Gestion</td>
                  <td>Master 1</td>

                  <td>
                    <div class="contact-info">
                      <span>sarah@email.com</span>
                      <small>+261 34 00 000 04</small>
                    </div>
                  </td>

                  <td>
                    <span class="status active">Actif</span>
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

                <!-- ÉTUDIANT 5 -->
                <tr>
                  <td>
                    <input
                      type="checkbox"
                      aria-label="Sélectionner David Rala"
                    />
                  </td>

                  <td>
                    <div class="student-identity">
                      <div class="student-avatar avatar-five">DR</div>
                      <div>
                        <strong>David Rala</strong>
                        <span>Masculin</span>
                      </div>
                    </div>
                  </td>

                  <td>ETU-2026-005</td>
                  <td>Informatique</td>
                  <td>Master 2</td>

                  <td>
                    <div class="contact-info">
                      <span>david@email.com</span>
                      <small>+261 34 00 000 05</small>
                    </div>
                  </td>

                  <td>
                    <span class="status suspended">Suspendu</span>
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
              </tbody>
            </table>
          </div>

          <!-- PIED DU TABLEAU -->
          <div class="table-footer">
            <span>
              Affichage de <strong>1 à 5</strong> sur
              <strong>158 étudiants</strong>
            </span>

            <div class="pagination">
              <button disabled>
                <i class="fa-solid fa-chevron-left"></i>
              </button>

              <button class="current">1</button>
              <button>2</button>
              <button>3</button>
              <span>...</span>
              <button>32</button>

              <button>
                <i class="fa-solid fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </section>
      </div>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../../components/footer.php"?>
  </body>
</html>
