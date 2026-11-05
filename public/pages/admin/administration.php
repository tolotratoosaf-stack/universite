<?php
  $choice = (string) in_array(($_GET['choice'] ?? '') , ['filiere','classe','matiere','etudiant']) ? $_GET['choice'] : 'etudiant';
?>

<!doctype html>
<html lang="fr">
  <head>
    <?php require_once __DIR__ . "/../../components/head.php"?>    
    <title>Administration | Espace académique</title>
    <!-- CSS -->
    <link rel="stylesheet" href="administration.css" />
    <link rel="stylesheet" href="style/inscription.css" />
    <link rel="stylesheet" href="style/classe.css" />
    <link rel="stylesheet" href="style/filiere.css" />
    <link rel="stylesheet" href="style/matiere.css" />
    <script src="administration.js" defer></script>
  </head>

  <body>
    <!-- =================================
         HEADER / NAVIGATION
    ================================== -->
    <?php require_once __DIR__ . "/../../components/header.php"?>

    <!-- =================================
         CONTENU PRINCIPAL
    ================================== -->

    <main class="administration-page">
      <!-- EN-TETE DE LA PAGE -->

      <section class="page-heading">
        <div class="heading-top">
          <div class="heading-title">
            <span class="heading-subtitle"> ESPACE ACADÉMIQUE </span>

            <h1>Administration</h1>

            <p>
              Gérez les inscriptions, les filières et les classes de votre
              établissement.
            </p>
          </div>

          <div class="heading-icon">
            <i class="fa-solid fa-user-gear"></i>
          </div>
        </div>

        <div class="breadcrumb">
          <span>Accueil</span>
          <i class="fa-solid fa-chevron-right"></i>
          <strong>Administration</strong>
        </div>
      </section>

      <!-- =================================
             CONTENU DE L'ADMINISTRATION
        ================================== -->

      <section class="page-content">
        <!-- CHOIX DU TYPE D'AJOUT -->

        <div class="addition-section">
          <div class="section-heading">
            <div>
              <span class="section-subtitle">GESTION ADMINISTRATIVE</span>
              <h2>Nouvel enregistrement</h2>
              <p>Sélectionnez l'élément que vous souhaitez ajouter.</p>
            </div>

            <span class="step-number">01</span>
          </div>

          <form class="addition-options" id="get-choice">
            <label class="addition-option" for="choice-filiere">
              <input
                type="radio"
                name="choice"
                id="choice-filiere"
                value="filiere"
                <?= ($_GET['choice'] ?? '') === 'filiere' ? 'checked' : ''?>
              />

              <div class="option-content">
                <div class="option-icon">
                  <i class="fa-solid fa-book-open"></i>
                </div>

                <div>
                  <h3>Filière</h3>
                  <p>Ajouter une nouvelle filière</p>
                </div>

                <i class="fa-solid fa-circle-check option-check"></i>
              </div>
            </label>

            <label class="addition-option" for="choice-classe">
              <input
                type="radio"
                name="choice"
                id="choice-classe"
                value="classe"
                <?= ($_GET['choice'] ?? '') === 'classe' ? 'checked' : ''?>
              />

              <div class="option-content">
                <div class="option-icon">
                  <i class="fa-solid fa-users"></i>
                </div>

                <div>
                  <h3>Classe</h3>
                  <p>Créer une nouvelle classe</p>
                </div>

                <i class="fa-solid fa-circle-check option-check"></i>
              </div>
            </label>

            <label class="addition-option" for="choice-matiere">
              <input
                type="radio"
                name="choice"
                id="choice-matiere"
                value="matiere"
                <?= ($_GET['choice'] ?? '') === 'matiere' ? 'checked' : ''?>
              />

              <div class="option-content">
                <div class="option-icon">
                  <i class="fa-solid fa-book"></i>
                </div>

                <div>
                  <h3>Matiere</h3>
                  <p>Creer une nouvelle matiere</p>
                </div>

                <i class="fa-solid fa-circle-check option-check"></i>
              </div>
            </label>

            <label class="addition-option" for="choice-etudiant">
              <input
                type="radio"
                name="choice"
                id="choice-etudiant"
                value="etudiant"
                <?= ($_GET['choice'] ?? 'etudiant') === 'etudiant' ? 'checked' : ''?>
              />

              <div class="option-content">
                <div class="option-icon">
                  <i class="fa-solid fa-user-plus"></i>
                </div>

                <div>
                  <h3>Étudiant</h3>
                  <p>Enregistrer un nouvel étudiant</p>
                </div>

                <i class="fa-solid fa-circle-check option-check"></i>
              </div>
            </label>
          </form>
        </div>

        <?php if($choice === 'etudiant'):?>
          <?php require_once __DIR__ . "/../../components/administration/inscription.php"?>
        <?php elseif($choice === 'matiere'):?>
          <?php require_once __DIR__ . "/../../components/administration/matiere.php"?>
        <?php elseif($choice === 'classe'):?>
          <?php require_once __DIR__ . "/../../components/administration/classe.php"?>
        <?php elseif($choice === 'filiere'):?>
          <?php require_once __DIR__ . "/../../components/administration/filiere.php"?>
        <?php endif?>
      </section>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../../components/footer.php"?>
  </body>
</html>
