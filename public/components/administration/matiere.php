<?php
  require_once __DIR__ . "/../../../server/services/getData/matiere.php";
?>

<!-- =================================
            CRÉATION D'UNE MATIÈRE
        ================================== -->
<section class="add_matiere">
  <!-- EN-TÊTE -->
  <div class="matiere-heading">
    <div class="matiere-heading-icon">
      <i class="fa-solid fa-book-open"></i>
    </div>

    <div>
      <span class="matiere-subtitle">GESTION ACADÉMIQUE</span>
      <h2>Ajouter une nouvelle matière</h2>
      <p>
        Définissez les informations de la matière et précisez les filières et
        les classes concernées.
      </p>
    </div>
  </div>

  <form
    action="../../../server/services/sendData/matiere.php"
    method="POST"
    class="matiere-form"
    id="add_matiere">
    <!-- 1. INFORMATIONS DE LA MATIÈRE -->
    <fieldset class="matiere-section">
      <legend>
        <i class="fa-solid fa-book"></i>
        Informations de la matière
      </legend>

      <div class="matiere-form-grid">
        <div class="form-group">
          <label for="matiere_name">
            Nom de la matière
            <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-book-open"></i>

            <input
              type="text"
              name="matiere_name"
              id="matiere_name"
              placeholder="Ex : Mathématiques"
              maxlength="150"
              required
            />
          </div>
        </div>

        <div class="form-group">
          <label for="code_matiere">
            Code de la matière
            <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-barcode"></i>

            <input
              type="text"
              name="code_matiere"
              id="code_matiere"
              placeholder="Ex : MAT101"
              maxlength="30"
              required
            />
          </div>
        </div>

        <div class="form-group full-width">
          <label for="description_matiere"> Description de la matière </label>

          <div class="textarea-wrapper">
            <textarea
              name="description_matiere"
              id="description_matiere"
              rows="4"
              placeholder="Présentez brièvement le contenu de cette matière..."
            ></textarea>
          </div>
        </div>
      </div>
    </fieldset>

    <!-- 2. AFFECTATION AUX FILIÈRES ET AUX CLASSES -->
    <fieldset class="matiere-section">
      <legend>
        <i class="fa-solid fa-diagram-project"></i>
        Affectation aux filières et aux classes
      </legend>

      <p class="fieldset-description">
        Sélectionnez les filières concernées, puis indiquez les classes et le
        nombre de crédits attribué à chaque classe.
      </p>


      <?php foreach($all_filiere as $key => $filiere):?>
        <!-- FILIÈRE 1 -->
        <div class="filiere-affectation">
          <div class="affectation-heading">
            <div class="affectation-icon">
              <i class="fa-solid fa-graduation-cap"></i>
            </div>

            <div>
              <span>FILIÈRE N° 0<?= $key + 1?></span>
              <h3><?= $filiere['nom_filiere']?></h3>
            </div>
          </div>

          <div class="classe-affectation">
            <div class="classe-affectation-title">
              <h4>Classes concernées</h4>
              <span>Sélectionnez les classes et leurs crédits</span>
            </div>

            <div class="classe-credit-list">
              <!-- CLASSE L1 -->
              <?php foreach($classe_filiere as $cf):?>
                <?php if($cf['nom_filiere'] !== $filiere['nom_filiere']){continue;}?>
                <div class="classe-credit-item">
                  <!-- SÉLECTION DE LA CLASSE -->
                  <label class="classe-choice" for="classe-<?= $cf['code_filiere']?>-<?= $cf['code_classe']?>">
                    <input
                      type="checkbox"
                      name="affectations[<?= $filiere['code_filiere'] ?>][classes][<?= $cf['code_classe']?>][active]"
                      id="classe-<?= $cf['code_filiere']?>-<?= $cf['code_classe']?>"
                      value="<?= $cf['id']?>"
                    />
                    <span class="classe-name"><?= $cf['code_classe']?></span>
                  </label>

                  <!-- SÉLECTION DU PROFESSEUR -->
                  <div class="prof-input">
                    <label for="prof-<?= $cf['code_filiere']?>-<?= $cf['code_classe']?>">Professeur</label>
                    <select
                      name="affectations[<?= $cf['code_filiere']?>][classes][<?= $cf['code_classe']?>][professeur]"
                      id="prof-<?= $cf['code_filiere']?>-<?= $cf['code_classe']?>"
                    >
                      <option value="" selected disabled>
                        Choisir un professeur
                      </option>
                      <?php foreach($professeur as $p):?>
                        <option value="<?= htmlspecialchars($p['id'])?>">
                          <?= $p['nom']?> <?= $p['prenom']?>
                        </option>
                      <?php endforeach?>
                    </select>
                  </div>

                  <!-- NOMBRE DE CRÉDITS -->
                  <div class="credit-input">
                    <label for="credit-<?= $cf['code_filiere']?>-<?= $cf['code_classe']?>">Crédits</label>
                    <input
                      type="number"
                      id="credit-<?= $cf['code_filiere']?>-<?= $cf['code_classe']?>"
                      name="affectations[<?= $filiere['code_filiere'] ?>][classes][<?= $cf['code_classe']?>][credit]"
                      min="1"
                      step="1"
                      placeholder="Ex : 6"
                    />
                  </div>
                </div>
              <?php endforeach?>
            </div>
          </div>
        </div>
      <?php endforeach?>
      <p class="affectation-note">
        <i class="fa-solid fa-circle-info"></i>
        Une matière peut être affectée à plusieurs filières et classes.
      </p>
    </fieldset>

    <!-- ACTIONS -->
    <div class="form-actions">
      <div class="form-note">
        <i class="fa-solid fa-asterisk"></i>
        Les champs marqués d'un astérisque sont obligatoires.
      </div>

      <div class="button-group">
        <button type="reset" class="btn-reset">
          <i class="fa-solid fa-rotate-left"></i>
          Réinitialiser
        </button>

        <button type="submit" class="btn-submit">
          <i class="fa-solid fa-plus"></i>
          Créer la matière
        </button>
      </div>
    </div>
  </form>
</section>
