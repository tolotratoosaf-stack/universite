<!doctype html>
<html lang="en">
  <head>
    <?php require_once __DIR__ . "/../../components/head.php"?>
    <title>Filiere</title>
    <link rel="stylesheet" href="filiere.css" />
  </head>
  <body>
    <!-- LE HEADER DE NAVIGATION -->
    <?php require_once __DIR__ . "/../../components/header.php"?>

    <!-- CORPS DU PAGE -->
    <main>
      <!-- Hero section -->
      <div id="hero">
        <!-- Header du page -->
        <section class="page-heading">
          <div class="heading-top">
            <div class="heading-title">
              <span class="heading-subtitle"> ESPACE ACADÉMIQUE </span>

              <h1>Notes des étudiants</h1>

              <p>
                Consultez et gérez les notes des étudiants de votre établissement.
              </p>
            </div>
            <hr />
          </div>
        </section>

        <!-- Contenue du page -->

        <section class="page-content">
          <!-- =================================
       FILIÈRE 1 : GESTION
  ================================== -->
          <article class="filiere-card">
            <div class="article-heading">
              <div class="filiere-title">
                <span class="filiere-icon">
                  <i class="fa-solid fa-chart-line"></i>
                </span>

                <div>
                  <span class="filiere-label">FILIÈRE UNIVERSITAIRE</span>
                  <h2>Gestion</h2>
                </div>
              </div>

              <div class="filiere-date">
                <i class="fa-regular fa-calendar"></i>
                <span>Depuis 2017</span>
              </div>
            </div>

            <div class="article-body">
              <div class="matiere-heading">
                <h3>Toutes les matières</h3>
                <span class="matiere-count">10 matières</span>
              </div>

              <div class="list-matiere">
                <ul>
                  <li>Comptabilité générale</li>
                  <li>Comptabilité de société</li>
                  <li>Mathématique financière</li>
                  <li>Mathématique générale</li>
                  <li>Économie</li>
                  <li>Statistique</li>
                  <li>Droit social</li>
                  <li>Droit commercial</li>
                  <li>Droit fiscal</li>
                  <li>Informatique</li>
                </ul>
              </div>
            </div>

            <div class="article-footer">
              <span>
                <i class="fa-solid fa-graduation-cap"></i>
                Formation universitaire
              </span>

              <a href="#">
                Voir les détails
                <i class="fa-solid fa-arrow-down-long"></i>
              </a>
            </div>
          </article>

          <!-- =================================
       FILIÈRE 2 : INFORMATIQUE
  ================================== -->
          <article class="filiere-card">
            <div class="article-heading">
              <div class="filiere-title">
                <span class="filiere-icon">
                  <i class="fa-solid fa-laptop-code"></i>
                </span>

                <div>
                  <span class="filiere-label">FILIÈRE UNIVERSITAIRE</span>
                  <h2>Informatique</h2>
                </div>
              </div>

              <div class="filiere-date">
                <i class="fa-regular fa-calendar"></i>
                <span>Depuis 2019</span>
              </div>
            </div>

            <div class="article-body">
              <div class="matiere-heading">
                <h3>Toutes les matières</h3>
                <span class="matiere-count">10 matières</span>
              </div>

              <div class="list-matiere">
                <ul>
                  <li>Algorithmique</li>
                  <li>Programmation web</li>
                  <li>Programmation orientée objet</li>
                  <li>Base de données</li>
                  <li>Réseaux informatiques</li>
                  <li>Systèmes d'exploitation</li>
                  <li>Génie logiciel</li>
                  <li>Architecture des ordinateurs</li>
                  <li>Développement mobile</li>
                  <li>Cybersécurité</li>
                </ul>
              </div>
            </div>

            <div class="article-footer">
              <span>
                <i class="fa-solid fa-graduation-cap"></i>
                Formation universitaire
              </span>

              <a href="#">
                Voir les détails
                <i class="fa-solid fa-arrow-down-long"></i>
              </a>
            </div>
          </article>

          <!-- =================================
       FILIÈRE 3 : DROIT
  ================================== -->
          <article class="filiere-card">
            <div class="article-heading">
              <div class="filiere-title">
                <span class="filiere-icon">
                  <i class="fa-solid fa-scale-balanced"></i>
                </span>

                <div>
                  <span class="filiere-label">FILIÈRE UNIVERSITAIRE</span>
                  <h2>Droit</h2>
                </div>
              </div>

              <div class="filiere-date">
                <i class="fa-regular fa-calendar"></i>
                <span>Depuis 2020</span>
              </div>
            </div>

            <div class="article-body">
              <div class="matiere-heading">
                <h3>Toutes les matières</h3>
                <span class="matiere-count">10 matières</span>
              </div>

              <div class="list-matiere">
                <ul>
                  <li>Droit constitutionnel</li>
                  <li>Droit civil</li>
                  <li>Droit pénal</li>
                  <li>Droit administratif</li>
                  <li>Droit commercial</li>
                  <li>Droit international</li>
                  <li>Droit des obligations</li>
                  <li>Procédure civile</li>
                  <li>Histoire du droit</li>
                  <li>Introduction au droit</li>
                </ul>
              </div>
            </div>

            <div class="article-footer">
              <span>
                <i class="fa-solid fa-graduation-cap"></i>
                Formation universitaire
              </span>

              <a href="#">
                Voir les détails
                <i class="fa-solid fa-arrow-down-long"></i>
              </a>
            </div>
          </article>
        </section>
      </div>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../../components/footer.php"?>
  </body>
</html>
