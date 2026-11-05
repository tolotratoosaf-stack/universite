const getElement = (el) => {
  let element = document.querySelector(".add_filiere");
  let container = element.querySelector("#matiere");
  let item = container.querySelector(el);
  return item;
};
const getAllElement = (el) => {
  let element = document.querySelector(".add_filiere");
  let container = element.querySelector("#matiere");
  let item = container.querySelectorAll(el);
  return item;
};

const allInputCheckbox = getAllElement("input[type=checkbox]");
const allInputCredit = getAllElement("input[type=number]");

allInputCheckbox.forEach((checkbox) => {
  checkbox.addEventListener("change", () => {
    let credit = [...allInputCredit].find(
      (inp) => `credit_${checkbox.value}` === `${inp.id}`,
    );
    credit.disabled = !checkbox.checked;
  });
});
allInputCredit.forEach((element) => {
  let check = [...allInputCheckbox].find(
    (checkbox) => `credit_${checkbox.value}` === element.id,
  );
  element.disabled = check;
});
