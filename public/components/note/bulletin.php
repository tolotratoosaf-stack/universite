<?php
  require_once __DIR__ . "/../../../server/services/getData/bulletin.php";
?>

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
    <?php if (empty($bulletins)): ?>
      <div class="aucun" hidden>
        <h2>Aucun bulletin pour cette sélection.</h2>
      </div>
    <?php endif ?>
    <!-- BULLETIN ETUDIANT 1 -->
    <?php foreach ($bulletins as $b): ?>
      <?php
        $classe_css = $b['decision'] === 'admis' ? 'admitted' : ($b['decision'] === 'redouble' ? 'failed' : 'pending');
        $label = $b['decision'] === null ? 'En attente' : ($b['decision'] === 'admis' ? ($b['sexe'] ? 'Admis' : 'Admise') : 'Redouble');
      ?>
      <article class="bulletin-card">
        <div class="bulletin-header">
          <div class="left">
            <h3><?= h($b['prenom']) ?> <span><?= h($b['nom']) ?></span></h3>
            <p>Matricule : <span><?= h($b['matricule']) ?></span></p>
            <p>Filière : <span><?= h($b['nom_filiere']) ?></span></p>
            <p>Classe : <span><?= h(strtoupper($b['code_classe'])) ?></span></p>
            <p>Année universitaire : <span><?= h($b['annee']) ?></span></p>
          </div>
          <div class="right">
            <h3>Moyenne : <span><?= fmt($b['moyenne_generale']) ?> / 20</span></h3>
            <p>Décision : <span class="decision <?= $classe_css ?>"><?= $label ?></span></p>
            <p>Observation : <span><?= h($b['observation'] ?? '—') ?></span></p>
          </div>
        </div>

        <div class="bulletin-body">
          <table class="bulletin-table">
            <thead>
              <tr><th>Code matière</th><th>Matière</th><th>Note / 20</th><th>Observation</th></tr>
            </thead>
            <tbody>
              <?php foreach ($matieres_par_insc[$b['inscription_id']] ?? [] as $m): ?>
                <tr>
                  <td><?= h($m['code_matiere']) ?></td>
                  <td><?= h($m['nom_matiere']) ?></td>
                  <td><?= fmt($m['moyenne']) ?></td>
                  <td><?= observation($m['moyenne']) ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

        <div class="bulletin-footer">
          <p><i class="fa-solid fa-calendar-check"></i> Bulletin de l'année universitaire <?= h($b['annee']) ?></p>
          <button type="button" class="btn-print">
            <i class="fa-solid fa-print"></i> Archiver
          </button>
        </div>
      </article>
    <?php endforeach ?>
  </section>
</section>
