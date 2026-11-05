const filterFiliere = document.querySelector("#filterFiliere");
const filterNiveau = document.querySelector("#filterNiveau");
const searchClasse = document.querySelector("#searchClasse");

[filterFiliere, filterNiveau].forEach((el) =>
  el.addEventListener("change", () => {
    el.form?.submit();
  }),
);
