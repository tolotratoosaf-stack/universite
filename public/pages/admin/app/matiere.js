const getElementMatiere = (el) => {
  let element = document.querySelector("#add_matiere");
  let item = element.querySelector(el);
  return item;
};
const getAllElementMatiere = (el) => {
  let element = document.querySelector("#add_matiere");
  let item = element.querySelectorAll(el);
  return item;
};

const allInputCheckboxMatiere = getAllElementMatiere("input[type=checkbox]");
const allInputNumberMatiere = getAllElementMatiere("input[type=number]");
const allSelectMatiere = getAllElementMatiere("select");

allInputCheckboxMatiere.forEach((checkbox) => {
  let id = String(checkbox.id).replace("classe-", "");

  checkbox.addEventListener("change", () => {
    let credit = [...allInputNumberMatiere].find((n) => {
      let n_id = String(n.id).replace("credit-", "");
      return n_id === id;
    });

    let select = [...allSelectMatiere].find((s) => {
      let s_id = String(s.id).replace("prof-", "");
      return s_id === id;
    });

    if (credit) credit.disabled = !checkbox.checked;
    if (select) select.disabled = !checkbox.checked;
  });
});

allInputNumberMatiere.forEach((number) => (number.disabled = true));
allSelectMatiere.forEach((select) => (select.disabled = true));
