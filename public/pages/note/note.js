document
  .querySelectorAll("#page-form input[type=radio], #page-form select")
  .forEach((el) => el.addEventListener("change", () => el.form.submit()));
