<?php
  require_once __DIR__ . "/../../../server/services/getData/classe.php";
?>

<!-- =================================
                 FORMULAIRE ETUDIANT
            ================================== -->
  <form action="../../../server/services/sendData/inscription.php" method="POST" class="student-form">
    <!-- INFORMATIONS GENERALES -->

    <fieldset class="info-section">
      <legend>
        <span class="legend-icon">
          <i class="fa-solid fa-user"></i>
        </span>
        Informations générales
      </legend>

      <div class="fieldset-description">
        Informations personnelles de l'étudiant.
      </div>

      <div class="form-grid">
        <!-- MATRICULE -->

        <div class="form-group">
          <label for="matricule">
            Matricule <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-id-card"></i>

            <input
              type="text"
              name="matricule"
              id="matricule"
              placeholder="Ex : ETU-2026-001"
              required
            />
          </div>
        </div>

        <!-- NOM -->

        <div class="form-group">
          <label for="nom"> Nom <span class="obligatoire">*</span> </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-user"></i>

            <input
              type="text"
              name="nom"
              id="nom"
              placeholder="Entrer le nom"
              required
            />
          </div>
        </div>

        <!-- PRENOM -->

        <div class="form-group">
          <label for="prenom"> Prénom <span class="obligatoire">*</span> </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-user"></i>

            <input
              type="text"
              name="prenom"
              id="prenom"
              placeholder="Entrer le prénom"
              required
            />
          </div>
        </div>

        <!-- SEXE -->

        <div class="form-group">
          <label for="sexe"> Sexe <span class="obligatoire">*</span> </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-venus-mars"></i>

            <select name="sexe" id="sexe" required>
              <option value="" selected disabled>Sélectionner le sexe</option>

              <option value="1">Masculin</option>
              <option value="0">Féminin</option>
            </select>
          </div>
        </div>

        <!-- DATE DE NAISSANCE -->

        <div class="form-group">
          <label for="date_naissance">
            Date de naissance <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-calendar"></i>

            <input
              type="date"
              name="date_naissance"
              id="date_naissance"
              required
            />
          </div>
        </div>

        <!-- LIEU DE NAISSANCE -->

        <div class="form-group">
          <label for="lieu_naissance"> Lieu de naissance </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-location-dot"></i>

            <input
              type="text"
              name="lieu_naissance"
              id="lieu_naissance"
              placeholder="Ville ou région"
            />
          </div>
        </div>

        <!-- CONTACT -->

        <div class="form-group">
          <label for="contact">
            Contact <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-phone"></i>

            <input
              type="tel"
              name="contact"
              id="contact"
              placeholder="Ex : +261 34 00 000 00"
              required
            />
          </div>
        </div>

        <!-- EMAIL -->

        <div class="form-group">
          <label for="email"> Adresse e-mail </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-envelope"></i>

            <input
              type="email"
              name="email"
              id="email"
              placeholder="exemple@email.com"
            />
          </div>
        </div>

        <!-- ADRESSE -->

        <div class="form-group full-width">
          <label for="adresse"> Adresse de résidence </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-map-location-dot"></i>

            <input
              type="text"
              name="adresse"
              id="adresse"
              placeholder="Entrer l'adresse de résidence"
            />
          </div>
        </div>
      </div>
    </fieldset>

    <!-- =================================
                      INFORMATIONS DES PARENTS
                  ================================== -->

    <fieldset class="info-section">
      <legend>
        <span class="legend-icon">
          <i class="fa-solid fa-people-roof"></i>
        </span>
        Informations des parents
      </legend>

      <div class="fieldset-description">
        Coordonnées des parents ou du responsable légal.
      </div>

      <div class="parent-grid">
        <!-- MERE -->

        <div class="parent-card">
          <div class="parent-heading">
            <div class="parent-icon">
              <i class="fa-solid fa-person-dress"></i>
            </div>

            <div>
              <h3>Mère</h3>
              <p>Informations de la mère</p>
            </div>
          </div>

          <div class="form-group">
            <label for="nom_mere">Nom</label>

            <input
              type="text"
              name="nom_mere"
              id="nom_mere"
              placeholder="Nom de la mère"
            />
          </div>

          <div class="form-group">
            <label for="prenom_mere">Prénom</label>

            <input
              type="text"
              name="prenom_mere"
              id="prenom_mere"
              placeholder="Prénom de la mère"
            />
          </div>

          <div class="form-group">
            <label for="contact_mere">Contact</label>

            <input
              type="tel"
              name="contact_mere"
              id="contact_mere"
              placeholder="Numéro de téléphone"
            />
          </div>
        </div>

        <!-- PERE -->

        <div class="parent-card">
          <div class="parent-heading">
            <div class="parent-icon">
              <i class="fa-solid fa-person"></i>
            </div>

            <div>
              <h3>Père</h3>
              <p>Informations du père</p>
            </div>
          </div>

          <div class="form-group">
            <label for="nom_pere">Nom</label>

            <input
              type="text"
              name="nom_pere"
              id="nom_pere"
              placeholder="Nom du père"
            />
          </div>

          <div class="form-group">
            <label for="prenom_pere">Prénom</label>

            <input
              type="text"
              name="prenom_pere"
              id="prenom_pere"
              placeholder="Prénom du père"
            />
          </div>

          <div class="form-group">
            <label for="contact_pere">Contact</label>

            <input
              type="tel"
              name="contact_pere"
              id="contact_pere"
              placeholder="Numéro de téléphone"
            />
          </div>
        </div>

        <!-- TUTEUR -->

        <div class="parent-card tutor-card">
          <div class="parent-heading">
            <div class="parent-icon">
              <i class="fa-solid fa-user-shield"></i>
            </div>

            <div>
              <h3>Tuteur / Tutrice</h3>
              <p>Responsable légal de l'étudiant</p>
            </div>
          </div>

          <div class="form-group">
            <label for="nom_tuteur">Nom</label>

            <input
              type="text"
              name="nom_tuteur"
              id="nom_tuteur"
              placeholder="Nom du tuteur"
            />
          </div>

          <div class="form-group">
            <label for="prenom_tuteur">Prénom</label>

            <input
              type="text"
              name="prenom_tuteur"
              id="prenom_tuteur"
              placeholder="Prénom du tuteur"
            />
          </div>

          <div class="form-group">
            <label for="contact_tuteur">Contact</label>

            <input
              type="tel"
              name="contact_tuteur"
              id="contact_tuteur"
              placeholder="Numéro de téléphone"
            />
          </div>

          <div class="form-group">
            <label for="lien_tuteur"> Lien avec l'étudiant </label>

            <select name="lien_tuteur" id="lien_tuteur">
              <option value="" selected disabled>Choisir le lien</option>

              <option value="oncle">Oncle</option>
              <option value="tante">Tante</option>
              <option value="frere">Frère</option>
              <option value="soeur">Sœur</option>
              <option value="grand_parent">Grand-parent</option>
              <option value="autre">Autre</option>
            </select>
          </div>
        </div>
      </div>
    </fieldset>

    <!-- =================================
                      INFORMATIONS D'INSCRIPTION
                  ================================== -->

    <fieldset class="info-section">
      <legend>
        <span class="legend-icon">
          <i class="fa-solid fa-file-signature"></i>
        </span>
        Informations d'inscription
      </legend>

      <div class="fieldset-description">
        Affectation académique de l'étudiant.
      </div>

      <div class="form-grid">
        <!-- FILIERE -->

        <div class="form-group">
          <label for="filiere_inscription">
            Filière <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-book-open"></i>

            <select name="filiere" id="filiere_inscription" required>
              <option value="" selected disabled>Choisir une filière</option>
              <?php foreach($all_filiere as $filiere):?>
                <option value="<?= $filiere['nom_filiere']?>"><?= $filiere['nom_filiere']?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>

        <!-- CLASSE -->

        <div class="form-group">
          <label for="classe_inscription">
            Classe <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-users"></i>

            <select name="classe" id="classe_inscription" required>
              <option value="" selected disabled>Choisissez d'abord une filière</option>
            </select>
          </div>
        </div>

        <!-- ANNEE UNIVERSITAIRE -->

        <div class="form-group">
          <label for="annee_universitaire">
            Année universitaire <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-calendar-days"></i>

            <select name="annee_universitaire" id="annee_universitaire" required>
              <option value="2026-2027" selected>2026 - 2027</option>
              <option value="2025-2026">2025 - 2026</option>
              <option value="2024-2025">2024 - 2025</option>
            </select>
          </div>
        </div>

        <!-- DATE INSCRIPTION -->

        <div class="form-group">
          <label for="date_inscription">
            Date d'inscription <span class="obligatoire">*</span>
          </label>

          <div class="input-wrapper">
            <i class="fa-solid fa-calendar-check"></i>

            <input
              type="date"
              name="date_inscription"
              id="date_inscription"
              required
            />
          </div>
        </div>
      </div>
    </fieldset>

    <!-- =================================
          BOUTONS DU FORMULAIRE
    ================================== -->

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
          <i class="fa-solid fa-user-plus"></i>
          Inscrire l'étudiant
        </button>
      </div>
    </div>
  </form>