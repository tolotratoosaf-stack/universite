<?php
  require_once __DIR__ . "/../../../server/services/getData/matiere.php";
  require_once __DIR__ . "/../../../server/services/getData/classe.php";
?>

<!-- ==========================================
            FORMULAIRE : AJOUTER UNE FILIÈRE
        =========================================== -->

<section class="add_filiere">
  <!-- EN-TÊTE -->

  <div class="filiere-heading">
    <div class="filiere-heading-icon">
      <i class="fa-solid fa-book-open"></i>
    </div>

    <div>
      <span class="filiere-subtitle"> GESTION ACADÉMIQUE </span>

      <h2>Ajouter une nouvelle filière</h2>

      <p>
        Définissez une nouvelle filière et associez-lui les matières qui seront
        enseignées.
      </p>
    </div>
  </div>

  <!-- FORMULAIRE -->

  <form action="../../../server/services/sendData/filiere.php" method="POST" class="filiere-form">
    <!-- INFORMATIONS GÉNÉRALES -->
    <fieldset class="filiere-section">
      <legend>
        <i class="fa-solid fa-graduation-cap"></i>
        Informations générales
      </legend>

      <div class="filiere-form-grid">
        <!-- NOM FILIERE -->
        <div class="form-group">
          <label for="nom_filiere">
            Nom de la filière
            <span class="obligatoire">*</span>
          </label>
          <div class="input-wrapper">
            <i class="fa-solid fa-book"></i>
            <input
              type="text"
              name="nom_filiere"
              id="nom_filiere"
              placeholder="Ex : Informatique"
              maxlength="150"
              required
            />
          </div>
        </div>

        <!-- CODE FILIERE -->
        <div class="form-group">
          <label for="code_filiere">
            Code de la filière
            <span class="obligatoire">*</span>
          </label>
          <div class="input-wrapper">
            <i class="fa-solid fa-hashtag"></i>
            <input
              type="text"
              name="code_filiere"
              id="code_filiere"
              placeholder="Ex : INFO"
              maxlength="20"
              required
            />
          </div>
          <small class="field-hint">
            Utilisez un code court et facilement identifiable.
          </small>
        </div>

        <!-- DESCRIPTION FILIERE -->
        <div class="form-group full-width">
          <label for="description_filiere">
            Description de la filière
            <span class="obligatoire">*</span>
          </label>
          <div class="textarea-wrapper">
            <textarea
              name="description_filiere"
              id="description_filiere"
              rows="5"
              maxlength="1000"
              placeholder="Présentez les objectifs, les compétences et les débouchés de cette filière..."
              required
            ></textarea>
          </div>
          <small class="field-hint">
            Décrivez brièvement cette filière et ses objectifs pédagogiques.
          </small>
        </div>
      </div>
    </fieldset>

    <!-- CLASSE DE LA FILIERE -->
    <fieldset class="filiere-section">
      <legend>
        <i class="fa-solid fa-users"></i>
        Classes de la filière
      </legend>
      <div class="fieldset-description">
        Sélectionnez les classes enseignées dans cette filière.
      </div>

      <!-- Contenue -->
      <div class="classe-list">
        <?php foreach($classe_distinct as $classe):?>
          <label class="classe-option" for="<?= $classe['code_classe']?>">
            <span class="classe-name"><?= $classe['nom_classe']?></span>
            <input
              type="checkbox"
              name="classes[]"
              value="<?= $classe['code_classe']?>"
              id="<?= $classe['code_classe']?>"
            />
          </label>
        <?php endforeach?>
      </div>
    </fieldset>

    <!-- MATIÈRES DE LA FILIÈRE -->
    <fieldset class="filiere-section" id="matiere">
      <legend>
        <i class="fa-solid fa-book-bookmark"></i>
        Matières de la filière
      </legend>
      <div class="fieldset-description">
        Sélectionnez les matières enseignées dans cette filière et indiquez
        leurs crédits.
      </div>

      <div class="matiere-list">
        <!-- MATIÈRE : MATHÉMATIQUES -->

        <?php foreach($all_matiere as $matiere):?>
          <div class="matiere-item">
            <div class="matiere-selection">
              <input
                type="checkbox"
                name="matieres[]"
                id="<?= $matiere['code_matiere']?>"
                value="<?= $matiere['code_matiere']?>"
              />
              <label for="<?= $matiere['code_matiere']?>">
                <span class="matiere-icon">
                  <i class="fa-solid fa-calculator"></i>
                </span>
                <span class="matiere-info">
                  <strong><?= $matiere['nom_matiere']?></strong>
                  <small><?= $matiere['description_matiere']?></small>
                </span>
              </label>
            </div>
            <!-- CREDIT -->
            <div class="credit-group">
              <label for="credit_<?= $matiere['code_matiere']?>"> Crédit </label>
              <input
                type="number"
                name="credits[<?= $matiere['code_matiere']?>]"
                id="credit_<?= $matiere['code_matiere']?>"
                min="1"
                step="1"
                placeholder="Ex : 4"
              />
            </div>
          </div>
        <?php endforeach?>
      </div>
    </fieldset>

    <!-- ACTIONS -->

    <div class="form-actions">
      <div class="form-note">
        <i class="fa-solid fa-circle-info"></i>

        Les champs marqués d'un astérisque (*) sont obligatoires.
      </div>

      <div class="button-group">
        <button type="reset" class="btn-reset">
          <i class="fa-solid fa-rotate-left"></i>
          Réinitialiser
        </button>

        <button type="submit" class="btn-submit">
          <i class="fa-solid fa-plus"></i>
          Créer la filière
        </button>
      </div>
    </div>
  </form>
</section>
