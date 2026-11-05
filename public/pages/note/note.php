<?php
  $choice  = (string) in_array($_GET['choice'] ?? '', ['note', 'bulletin']) ? $_GET['choice'] : 'note';
  $filiere = (string) in_array($_GET['filiere']?? '', ['gestion','informatique','droit']) ? $_GET['filiere'] : 'gestion';
  $classe  = (string) in_array($_GET['classe'] ?? '', ['l1', 'l2', 'l3', 'm1', 'm2']) ? $_GET['classe'] : 'l1';
?>

<!doctype html>
<html lang="en">
  <head>
    <?php require_once __DIR__ . "/../../components/head.php"?>
    <title>Note</title>
    <link rel="stylesheet" href="note.css" />
    <link rel="stylesheet" href="bulletin.css" />
    <script src="note.js" defer></script>
  </head>
  <body>
    <!-- HEADER -->
    <?php require_once __DIR__ . "/../../components/header.php"?>

    <main>
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

        <!-- Choix entre: note et bulletin -->
        <form method="GET" id="page-form">
          <div class="get-choice">
            <label class="choice <?= $choice === 'note' ? 'active' : ''?>" for="note">
              <input
              type="radio"
              name="choice"
              id="note"
              value="note"
              <?= $choice === 'note' ? 'checked' : ''?>
              />
              <i class="fa-solid fa-clipboard-list"></i>
              <span class="choice-content">
                <strong>Notes</strong>
                <small>Saisie et gestion des notes</small>
              </span>
              <i class="fa-solid fa-arrow-right choice-arrow"></i>
            </label>
            
            <label class="choice <?= $choice === 'bulletin' ? 'active' : ''?>" for="bulletin">
              <input
              type="radio"
              name="choice"
              id="bulletin"
              value="bulletin"
              <?= $choice === 'bulletin' ? 'checked' : ''?>
              />
              <i class="fa-solid fa-file-lines"></i>
              <span class="choice-content">
                <strong>Bulletins</strong>
                <small>Consultation des bulletins</small>
              </span>
              <i class="fa-solid fa-arrow-right choice-arrow"></i>
            </label>
          </div>

          <!-- Filtrer l'affichage -->
         <div class="filter-form">
           <div class="filter-group">
             <label for="filiere">
               <i class="fa-solid fa-graduation-cap"></i>
               Filière
              </label>
              
              <div class="select-wrapper">
                <select name="filiere" id="filiere">
                  <option value="gestion" <?= $filiere === 'gestion' ? 'selected' : ''?>>Gestion</option>
                  <option value="informatique" <?= $filiere === 'informatique' ? 'selected' : ''?>>Informatique</option>
                  <option value="droit" <?= $filiere === 'droit' ? 'selected' : ''?>>Droit</option>
                </select>
                
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </div>
            
            <div class="filter-group">
              <label for="classe">
                <i class="fa-solid fa-users"></i>
                Classe
              </label>
              
              <div class="select-wrapper">
                <select name="classe" id="classe">
                  <option value="l1" <?= $classe === 'l1' ? 'selected' : ''?>>Licence 1</option>
                  <option value="l2" <?= $classe === 'l2' ? 'selected' : ''?>>Licence 2</option>
                  <option value="l3" <?= $classe === 'l3' ? 'selected' : ''?>>Licence 3</option>
                  <option value="m1" <?= $classe === 'm1' ? 'selected' : ''?>>Master 1</option>
                  <option value="m2" <?= $classe === 'm2' ? 'selected' : ''?>>Master 2</option>
                </select>
                
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </div>
          </div>
        </form>
      </section>

      <!-- Contenue du page -->
      <?php if($choice === "note"):?>
        <?php require_once __DIR__ . "/../../components/note/table_note.php"?>
      <?php else:?>
        <?php require_once __DIR__ . "/../../components/note/bulletin.php"?>
      <?php endif?>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../../components/footer.php"?>
  </body>
</html>
