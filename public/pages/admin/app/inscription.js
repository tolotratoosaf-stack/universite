// =====================================================
//    POUR L'ETUDIANT
// =====================================================
const date_inscription = document.querySelector("#date_inscription");
const filiereSelect = document.getElementById("filiere_inscription");
const classeSelect = document.getElementById("classe_inscription");

const date = new Date();
const year = date.getFullYear();
const month = date.getMonth() + 1;
const day = date.getDate();

const twoNumber = (element) => String(element).padStart(2, "0");

date_inscription.value = `${year}-${twoNumber(month)}-${twoNumber(day)}`;

// Vérifier que les deux champs existent
if (filiereSelect && classeSelect) {
  filiereSelect.addEventListener("change", async function () {
    const filiere = this.value;

    // console.log("Filière sélectionnée :", filiere);

    // Réinitialiser la liste des classes
    classeSelect.innerHTML = `<option value="">Chargement...</option>`;

    classeSelect.disabled = true;

    if (!filiere) {
      classeSelect.innerHTML = `<option value="">Choisissez d'abord une filière</option>`;
      return;
    }

    try {
      const url =
        "../../../../universite/server/services/getData/classe_par_filiere.php?filiere=" +
        encodeURIComponent(filiere);
      // console.log("URL appelée :", url);
      const response = await fetch(url);

      if (!response.ok) {
        throw new Error("Erreur HTTP : " + response.status);
      }

      const data = await response.json();
      // console.log("Réponse PHP :", data);

      classeSelect.innerHTML = "";

      if (!data.success || !data.classes || data.classes.length === 0) {
        classeSelect.innerHTML = `<option value="">Aucune classe disponible</option>`;
        return;
      }

      classeSelect.innerHTML = `
                <option value="" selected disabled>
                    Choisir une classe
                </option>`;

      data.classes
        .toSorted((a, b) => a.nom_classe.localeCompare(b.nom_classe))
        .forEach((classe) => {
          const option = document.createElement("option");
          option.value = classe.code_classe;
          option.textContent = classe.nom_classe;
          classeSelect.appendChild(option);
        });

      classeSelect.disabled = false;
    } catch (error) {
      //   console.error("Erreur :", error);

      classeSelect.innerHTML = `<option value="">Erreur de chargement</option>`;
    }
  });
}
