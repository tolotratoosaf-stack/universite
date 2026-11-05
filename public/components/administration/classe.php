<?php
  require_once __DIR__ . "/../../../server/services/getData/classe.php";
?>

<!-- =================================
            FORMULAIRE : AJOUTER UNE CLASSE
        ================================== -->

<section class="add_classe">
  <!-- EN-TÊTE -->

  <div class="classe-heading">
    <div class="classe-heading-icon">
      <i class="fa-solid fa-users"></i>
    </div>

    <div>
      <span class="classe-subtitle">GESTION DES CLASSES</span>
      <h2>Ajouter une nouvelle classe</h2>
      <p>
        Renseignez les informations nécessaires pour créer une nouvelle classe.
      </p>
    </div>
  </div>

  <!-- FORMULAIRE -->

  <form action="../../../server/services/sendData/classe.php" method="POST" class="classe-form">
    <fieldset>
      <legend>
        <i class="fa-solid fa-chalkboard-user"></i>
        Informations de la classe
      </legend>

      <div class="classe-form-grid">
        <!-- NOM DE LA CLASSE -->
        <div class="form-group">
          <label for="classe_name">
            Nom de la classe
            <span class="obligatoire">*</span>
          </label>
          <div class="input-wrapper">
            <i class="fa-solid fa-users"></i>
            <input
              type="text"
              name="classe_name"
              id="classe_name"
              placeholder="Ex : License 1, Master 1..."
              maxlength="100"
              required
            />
          </div>
        </div>

        <!-- CODE CLASSE -->
         <div class="form-group">
          <label for="code_classe">
            Code de la classe
            <span class="obligatoire">*</span>
          </label>
          <div class="input-wrapper">
            <i class="fa-solid fa-users"></i>
            <input
              type="text"
              name="code_classe"
              id="code_classe"
              placeholder="Ex : L1, L2, L3, M1..."
              maxlength="100"
              required
            />
          </div>
        </div>

        <!-- CAPACITÉ MAXIMALE -->
        <div class="form-group">
          <label for="capacite">
            Capacité maximale
            <span class="obligatoire">*</span>
          </label>
          <div class="input-wrapper">
            <i class="fa-solid fa-user-group"></i>
            <input
              type="number"
              name="capacite"
              id="capacite"
              placeholder="Ex : 40 étudiants"
              min="1"
              step="1"
              required
            />
          </div>
        </div>

        <!-- FILIÈRE -->

        <div class="form-group full-width">
          <label for="filiere_classe">
            Filière de rattachement
            <span class="obligatoire">*</span>
          </label>
          <div class="input-wrapper">
            <i class="fa-solid fa-book-open"></i>
            <select name="filiere" id="filiere_classe" required>
              <option value="" selected disabled>
                Sélectionner une filière
              </option>
              <?php foreach($all_filiere as $filiere):?>
                <option value="<?= $filiere['code_filiere']?>"><?= $filiere['nom_filiere']?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>

        <!-- DESCRIPTION -->

        <div class="form-group full-width">
          <label for="classe_description">
            Description de la classe
            <span class="obligatoire">*</span>
          </label>

          <div class="textarea-wrapper">
            <textarea
              name="classe_description"
              id="classe_description"
              placeholder="Décrivez les objectifs ou les particularités de cette classe..."
              rows="5"
              maxlength="1000"
              required
            ></textarea>
          </div>

          <small class="field-hint">
            Présentez brièvement cette classe et ses objectifs.
          </small>
        </div>
      </div>
    </fieldset>

    <!-- NOTE ET BOUTONS -->

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
          Créer la classe
        </button>
      </div>
    </div>
  </form>
</section>
