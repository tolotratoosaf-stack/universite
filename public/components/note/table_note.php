<?php
  require_once __DIR__ . "/../../../server/services/getData/note.php";
  require_once __DIR__ . "/../../../server/services/getData/etudiant.php";

  $filiere = $_GET['filiere'] ?? 'gestion';
  $classe = $_GET['classe'] ?? 'l1';

  // Les examens
  $examen_name = (array) ['semestre-one','semestre-two','final-exam'];
?>

<section class="page-content">
  <div class="table-container">
    <div class="table-caption">
      <span> Notes des étudiants de <?= htmlspecialchars($filiere)?> - <?= htmlspecialchars($classe)?> </span>

      <span class="caption-info"> Saisie des notes </span>
    </div>
    <div class="table-wrapper">
      <table class="notes-table">
        <thead>
          <!-- PREMIÈRE LIGNE : GROUPES -->
          <tr>
            <th rowspan="2" class="fixed-column matricule">Matricule</th>
            <th rowspan="2" class="fixed-column student-name">Nom et Prénom</th>
            <th colspan="<?= count($all_matiere)?>" class="semestre-one">Semestre 1</th>
            <th colspan="<?= count($all_matiere)?>" class="semestre-two">Semestre 2</th>
            <th colspan="<?= count($all_matiere)?>" class="final-exam">Examen final</th>
            <th rowspan="2" class="action">Action</th>
          </tr>

          <!-- DEUXIÈME LIGNE : MATIÈRES -->
          <tr>
            <?php foreach($examen_name as $examen):?>
              <?php foreach($all_matiere as $matiere):?>
                <th class="<?= $examen?>"><?= $matiere['nom_matiere']?></th>
              <?php endforeach?>
            <?php endforeach?>
          </tr>
        </thead>

        <tbody>
          <?php foreach($all_etudiant_inscrit as $etudiant):?>
            <tr>
              <td class="fixed-column matricule"><?= $etudiant['matricule']?></td>
              <td class="fixed-column student-name"><?= $etudiant['nom']?> <?= $etudiant['prenom']?></td>

              <!-- NOTE PREMIER SEMESTRE -->
              <?php foreach(['semestre1','semestre2','examen_final'] as $type):?>
                <?php foreach($all_matiere as $matiere):?>
                  <?php
                    $valeur = $grilles[$etudiant['id']][$type][$matiere['id']] ?? '';
                    $noteExiste = $valeur !== '';
                  ?>
                  <td>
                    <input
                      type="number"
                      min="0"
                      max="20"
                      value="<?= $valeur?>"
                      step="0.25"
                      placeholder="—"
                      form="form-<?= $etudiant['matricule']?>"
                      name="note[<?= $type?>][<?= $matiere['id']?>]"
                      <?= $noteExiste ? 'disabled' : ''?>
                    >
                  </td>
                <?php endforeach?>
              <?php endforeach?>
              <td>
                <button type="submit" form="form-<?= $etudiant['matricule']?>">Valider</button>
              </td>
            </tr>
          <?php endforeach?>
        </tbody>
      </table>

      <?php foreach ($all_etudiant_inscrit as $etudiant): ?>
        <form
          action="../../../server/services/sendData/note.php"
          method="POST"
          id="form-<?= htmlspecialchars($etudiant['matricule']) ?>"
        >
          <input
            type="hidden"
            name="inscription_id"
            value="<?= htmlspecialchars($etudiant['inscription_id']) ?>"
          >
        </form>
      <?php endforeach; ?>

      <!-- En cas d'absence de resultat -->
      <div class="aucun" id="emptyState" hidden>
        <h2>Aucun resultat correspondant pour "<?= htmlspecialchars($_GET["filiere"])?> <?= htmlspecialchars($_GET["classe"])?>"</h2>
      </div>

    </div>
  </div>
  <script defer>
    const all_input = document.querySelectorAll("input[type=number]");
    all_input.forEach((input) => (input.readOnly = input.value !== ""));

    const emptyState = document.querySelector("#emptyState");
    const ligne = document.querySelector("table tbody");
    emptyState.hidden = ligne.querySelectorAll("tr").length > 0;
  </script>
</section>
