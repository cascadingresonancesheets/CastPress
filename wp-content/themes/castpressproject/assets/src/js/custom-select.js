const cSelects = document.querySelectorAll(".custom-select");

cSelects.forEach((cSelect) => {
  let select = cSelect.querySelector("select");
  let options = select.querySelectorAll("option");

  let a = document.createElement("DIV");
  a.setAttribute("class", "custom-select__selected");
  cSelect.appendChild(a);
  let newSelect = cSelect.querySelector(".custom-select__selected");

  let b = document.createElement("DIV");
  b.setAttribute("class", "custom-select__items");
  cSelect.appendChild(b);
  let newOptionsWrap = cSelect.querySelector(".custom-select__items");

  let i = 0;
  options.forEach((option) => {
    let a = document.createElement("DIV");
    a.setAttribute("class", "custom-select__item");
    a.setAttribute("data-index", i++);
    a.innerHTML = option.innerHTML;
    newOptionsWrap.appendChild(a);
  });

  let newOptions = newOptionsWrap.querySelectorAll(".custom-select__item");

  let j = 0;
  options.forEach((option) => {
    if (option.selected == true) {
      newOptions[j].classList.add("custom-select__item_is-selected");
      a.innerHTML = options[j].innerHTML;
    }
    j++;
  });

  newSelect.addEventListener("click", function () {
    cSelects.forEach((el) => {
      if (el.querySelector(".custom-select__selected") !== this) {
        el.querySelector(".custom-select__selected").classList.remove("custom-select__selected_is-open");
        el.querySelector(".custom-select__items").classList.remove("custom-select__items_is-open");
      }
    });

    this.classList.toggle("custom-select__selected_is-open");
    this.nextElementSibling.classList.toggle("custom-select__items_is-open");
  });

  newOptionsWrap.addEventListener("click", function (e) {
    if (e.target.classList.contains("custom-select__item")) {
      let value = e.target.innerHTML;
      newSelect.innerHTML = value;
      let index = e.target.dataset.index;
      options[index].selected = "selected";

      newOptions.forEach((newOption) => {
        newOption.classList.remove("custom-select__item_is-selected");
      });

      e.target.classList.add("custom-select__item_is-selected");
      e.target.parentNode.classList.remove("custom-select__items_is-open");
      e.target.parentNode.previousElementSibling.classList.remove("custom-select__selected_is-open");
    }
  });
});

document.addEventListener("click", (e) => {
  if (!e.target.closest(".custom-select")) {
    document.querySelectorAll(".custom-select").forEach((el) => {
      el.querySelector(".custom-select__selected").classList.remove("custom-select__selected_is-open");
      el.querySelector(".custom-select__items").classList.remove("custom-select__items_is-open");
    });
  }
});
