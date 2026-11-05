const filterFiliere = document.querySelector("#filterFiliere");
const filterClasse = document.querySelector("#filterClasse");
const filterStatut = document.querySelector("#filterStatut");

[filterFiliere, filterClasse, filterStatut].forEach((el) =>
  el.addEventListener("change", () => el.form?.submit()),
);
