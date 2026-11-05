const all_radio = document.querySelectorAll("#get-choice input[type=radio]");

all_radio.forEach((el) =>
  el.addEventListener("change", () => el.form.submit()),
);
