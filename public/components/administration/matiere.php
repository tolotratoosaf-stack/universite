<?php?>

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

  <form action="#" method="POST" class="matiere-form">
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

      <!-- FILIÈRE 1 -->
      <div class="filiere-affectation">
        <div class="affectation-heading">
          <div class="affectation-icon">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>

          <div>
            <span>FILIÈRE N° 01</span>
            <h3>Informatique</h3>
          </div>
        </div>

        <div class="classe-affectation">
          <div class="classe-affectation-title">
            <h4>Classes concernées</h4>
            <span>Sélectionnez les classes et leurs crédits</span>
          </div>

          <div class="classe-credit-list">
            <!-- CLASSE L1 -->
            <div class="classe-credit-item">
              <!-- SÉLECTION DE LA CLASSE -->
              <label class="classe-choice" for="classe-info-l1">
                <input
                  type="checkbox"
                  name="affectations[0][classes][L1][active]"
                  id="classe-info-l1"
                  value="1"
                />
                <span class="classe-name">L1</span>
              </label>

              <!-- SÉLECTION DU PROFESSEUR -->
              <div class="prof-input">
                <label for="prof-info-l1">Professeur</label>
                <select
                  name="affectations[0][classes][L1][professeur]"
                  id="prof-info-l1"
                >
                  <option value="" selected disabled>
                    Choisir un professeur
                  </option>
                  <option value="prof001">Rakoto Jean</option>
                  <option value="prof002">Rabe Marie</option>
                  <option value="prof003">Randria Paul</option>
                </select>
              </div>

              <!-- NOMBRE DE CRÉDITS -->
              <div class="credit-input">
                <label for="credit-info-l1">Crédits</label>
                <input
                  type="number"
                  id="credit-info-l1"
                  name="affectations[0][classes][L1][credit]"
                  min="1"
                  step="1"
                  placeholder="Ex : 6"
                />
              </div>
            </div>

            <!-- CLASSE L1 -->
            <div class="classe-credit-item">
              <!-- SÉLECTION DE LA CLASSE -->
              <label class="classe-choice" for="classe-info-l2">
                <input
                  type="checkbox"
                  name="affectations[0][classes][L2][active]"
                  id="classe-info-l2"
                  value="1"
                />
                <span class="classe-name">L2</span>
              </label>

              <!-- SÉLECTION DU PROFESSEUR -->
              <div class="prof-input">
                <label for="prof-info-l2">Professeur</label>
                <select
                  name="affectations[0][classes][L2][professeur]"
                  id="prof-info-l2"
                >
                  <option value="" selected disabled>
                    Choisir un professeur
                  </option>
                  <option value="prof001">Rakoto Jean</option>
                  <option value="prof002">Rabe Marie</option>
                  <option value="prof003">Randria Paul</option>
                </select>
              </div>

              <!-- NOMBRE DE CRÉDITS -->
              <div class="credit-input">
                <label for="credit-info-l1">Crédits</label>
                <input
                  type="number"
                  id="credit-info-l1"
                  name="affectations[0][classes][L2][credit]"
                  min="1"
                  step="1"
                  placeholder="Ex : 6"
                />
              </div>
            </div>

            <!-- CLASSE L3 -->
            <div class="classe-credit-item">
              <label class="classe-choice">
                <input
                  type="checkbox"
                  name="affectations[0][classes][L3][active]"
                  value="1"
                />

                <span class="classe-name">L3</span>
              </label>

              <!-- SÉLECTION DU PROFESSEUR -->
              <div class="prof-input">
                <label for="prof-info-l3">Professeur</label>
                <select
                  name="affectations[0][classes][L3][professeur]"
                  id="prof-info-l3"
                >
                  <option value="" selected disabled>
                    Choisir un professeur
                  </option>
                  <option value="prof001">Rakoto Jean</option>
                  <option value="prof002">Rabe Marie</option>
                  <option value="prof003">Randria Paul</option>
                </select>
              </div>

              <div class="credit-input">
                <label for="credit-info-l3">Crédits</label>
                <input
                  type="number"
                  id="credit-info-l3"
                  name="affectations[0][classes][L3][credit]"
                  min="1"
                  step="1"
                  placeholder="Ex : 4"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- FILIÈRE 2 -->
      <div class="filiere-affectation">
        <div class="affectation-heading">
          <div class="affectation-icon">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>

          <div>
            <span>FILIÈRE N° 02</span>
            <h3>Gestion</h3>
          </div>
        </div>

        <div class="classe-affectation">
          <div class="classe-affectation-title">
            <h4>Classes concernées</h4>
            <span>Sélectionnez les classes et leurs crédits</span>
          </div>

          <div class="classe-credit-list">
            <!-- CLASSE L1 -->
            <div class="classe-credit-item">
              <label class="classe-choice">
                <input
                  type="checkbox"
                  name="affectations[1][classes][L1][active]"
                  value="1"
                />

                <span class="classe-name">L1</span>
              </label>

              <!-- SÉLECTION DU PROFESSEUR -->
              <div class="prof-input">
                <label for="prof-gestion-l1">Professeur</label>
                <select
                  name="affectations[1][classes][L1][professeur]"
                  id="prof-gestion-l1"
                >
                  <option value="" selected disabled>
                    Choisir un professeur
                  </option>
                  <option value="prof001">Rakoto Jean</option>
                  <option value="prof002">Rabe Marie</option>
                  <option value="prof003">Randria Paul</option>
                </select>
              </div>

              <div class="credit-input">
                <label for="credit-gestion-l1">Crédits</label>
                <input
                  type="number"
                  id="credit-gestion-l1"
                  name="affectations[1][classes][L1][credit]"
                  min="1"
                  step="1"
                  placeholder="Ex : 4"
                />
              </div>
            </div>

            <!-- CLASSE L2 -->
            <div class="classe-credit-item">
              <label class="classe-choice">
                <input
                  type="checkbox"
                  name="affectations[1][classes][L2][active]"
                  value="1"
                />

                <span class="classe-name">L2</span>
              </label>

              <!-- SÉLECTION DU PROFESSEUR -->
              <div class="prof-input">
                <label for="prof-gestion-l2">Professeur</label>
                <select
                  name="affectations[1][classes][L2][professeur]"
                  id="prof-gestion-l2"
                >
                  <option value="" selected disabled>
                    Choisir un professeur
                  </option>
                  <option value="prof001">Rakoto Jean</option>
                  <option value="prof002">Rabe Marie</option>
                  <option value="prof003">Randria Paul</option>
                </select>
              </div>

              <div class="credit-input">
                <label for="credit-gestion-l2">Crédits</label>
                <input
                  type="number"
                  id="credit-gestion-l2"
                  name="affectations[1][classes][L2][credit]"
                  min="1"
                  step="1"
                  placeholder="Ex : 3"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

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
