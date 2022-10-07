const payments = document.querySelectorAll(".billing-radio");
const billingForms = document.querySelectorAll(".billing-radio__form");
const billingFormsItems = document.querySelectorAll(".billing-radio__form input");

if (payments.length > 0) {
  payments.forEach((el) => {
    let radio = el.querySelector(".custom-radio__input");
    let form = el.querySelector(".billing-radio__form");
    let inputs = el.querySelectorAll("input");

    radio.onclick = function () {
      billingForms.forEach((el) => {
        el.style.display = "none";
      });
      form.style.display = "flex";

      billingFormsItems.forEach((el) => {
        el.removeAttribute("form");
      });

      inputs.forEach((el) => {
        el.setAttribute("form", "billing-form");
      });
    };
  });

  payments[0].querySelector(".custom-radio__input").click();
}
