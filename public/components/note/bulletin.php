<section class="bulletins-content">
  <!-- FILTRES DES BULLETINS -->
  <form class="filter" method="GET">
    <div class="search-box">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input
        type="search"
        name="search"
        id="search"
        placeholder="Rechercher un étudiant..."
      />
    </div>

    <div class="tri">
      <select name="decision" id="decision">
        <option value="">Toutes les décisions</option>
        <option value="admis">Admis</option>
        <option value="non_admis">Non admis</option>
      </select>
    </div>
  </form>

  <!-- ENSEMBLE DES BULLETINS -->
  <section class="all-bulletin">
    <!-- BULLETIN ETUDIANT 1 -->
    <article class="bulletin-card">
      <div class="bulletin-header">
        <div class="left">
          <h3>Jean <span>Rakoto</span></h3>

          <p>Matricule : <span>ETU-2026-001</span></p>
          <p>Filière : <span>Gestion</span></p>
          <p>Classe : <span>L1</span></p>
          <p>Année universitaire : <span>2026</span></p>
        </div>

        <div class="right">
          <h3>Moyenne : <span>14,25 / 20</span></h3>

          <p>
            Décision :
            <span class="decision admitted">Admis</span>
          </p>

          <p>Observation : <span>Bien</span></p>
        </div>
      </div>

      <div class="bulletin-body">
        <table class="bulletin-table">
          <thead>
            <tr>
              <th>Code matière</th>
              <th>Matière</th>
              <th>Note / 20</th>
              <th>Observation</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>G2/L1/CG</td>
              <td>Comptabilité générale</td>
              <td>12,00</td>
              <td>Passable</td>
            </tr>

            <tr>
              <td>EC/L1/EC</td>
              <td>Économie</td>
              <td>16,00</td>
              <td>Très bien</td>
            </tr>

            <tr>
              <td>G2/L1/MA</td>
              <td>Mathématiques</td>
              <td>14,00</td>
              <td>Bien</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="bulletin-footer">
        <p>
          <i class="fa-solid fa-calendar-check"></i>
          Bulletin de l'année universitaire 2026
        </p>

        <button type="button" class="btn-print">
          <i class="fa-solid fa-print"></i>
          Imprimer
        </button>
      </div>
    </article>

    <!-- BULLETIN ETUDIANT 2 -->
    <article class="bulletin-card">
      <div class="bulletin-header">
        <div class="left">
          <h3>Marie <span>Rasoanaivo</span></h3>

          <p>Matricule : <span>ETU-2026-002</span></p>
          <p>Filière : <span>Gestion</span></p>
          <p>Classe : <span>L1</span></p>
          <p>Année universitaire : <span>2026</span></p>
        </div>

        <div class="right">
          <h3>Moyenne : <span>16,50 / 20</span></h3>

          <p>
            Décision :
            <span class="decision admitted">Admise</span>
          </p>

          <p>Observation : <span>Très bien</span></p>
        </div>
      </div>

      <div class="bulletin-body">
        <table class="bulletin-table">
          <thead>
            <tr>
              <th>Code matière</th>
              <th>Matière</th>
              <th>Note / 20</th>
              <th>Observation</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>G2/L1/CG</td>
              <td>Comptabilité générale</td>
              <td>17,00</td>
              <td>Très bien</td>
            </tr>

            <tr>
              <td>EC/L1/EC</td>
              <td>Économie</td>
              <td>16,00</td>
              <td>Très bien</td>
            </tr>

            <tr>
              <td>G2/L1/MA</td>
              <td>Mathématiques</td>
              <td>16,50</td>
              <td>Très bien</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="bulletin-footer">
        <p>
          <i class="fa-solid fa-calendar-check"></i>
          Bulletin de l'année universitaire 2026
        </p>

        <button type="button" class="btn-print">
          <i class="fa-solid fa-print"></i>
          Imprimer
        </button>
      </div>
    </article>
  </section>
</section>
