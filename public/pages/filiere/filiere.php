<?php
  require_once __DIR__ ."/../../../server/services/getData/filiere.php";
?>

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
          <?php foreach($all_filiere as $filiere):?>
            <article class="filiere-card">
              <div class="article-heading">
                <div class="filiere-title">
                  <span class="filiere-icon">
                    <i class="fa-solid fa-chart-line"></i>
                  </span>

                  <div>
                    <span class="filiere-label">FILIÈRE UNIVERSITAIRE</span>
                    <h2><?= $filiere["nom_filiere"]?></h2>
                  </div>
                </div>

                <div class="filiere-date">
                  <i class="fa-regular fa-calendar"></i>
                  <span>Depuis 2017</span>
                </div>
              </div>

              <div class="article-body">
                <div class="matiere-heading">
                  <h3>Toutes les classes</h3>
                  <span class="matiere-count">10 matières</span>
                </div>

                <div class="list-matiere">
                  <ul>
                    <?php foreach($apercu_filiere as $list):?>
                      <?php if($list['nom_filiere']===$filiere["nom_filiere"]):?>
                        <li><?= $list['nom_classe']?></li>
                      <?php endif?>
                    <?php endforeach?>
                  </ul>
                </div>
              </div>

              <div class="article-footer">
                <span>
                  <i class="fa-solid fa-graduation-cap"></i>
                  Formation universitaire
                </span>

                <a href="../classe/classe.php?filiere=<?= htmlspecialchars($filiere["nom_filiere"])?>">
                  Voir les détails
                  <i class="fa-solid fa-arrow-down-long"></i>
                </a>
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
