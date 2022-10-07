const productBtns = Array.from(document.querySelectorAll(".product-tabs__btn"));
const productTabs = Array.from(document.querySelectorAll(".product-descr__item"));
const productReview = document.querySelector(".rating__link");

function reviewClick(productTabs, productBtns) {
  productTabs.map((tab) => {
    tab.classList.remove("product-descr__item_active");
    if (tab.id === "review") {
      tab.classList.add("product-descr__item_active");
    }
  });
  productBtns.map((btn) => {
    btn.classList.remove("product-tabs__btn_active");
    if (btn.dataset.tab === "review") {
      btn.classList.add("product-tabs__btn_active");
    }
  });
}

if (productReview) {
  productReview.addEventListener("click", function () {
    reviewClick(productTabs, productBtns);
  });
}

productBtns.map((btn) => {
  btn.addEventListener("click", function () {
    productTabs.map((tab) => {
      tab.classList.remove("product-descr__item_active");
      if (btn.dataset.tab === tab.id) {
        tab.classList.add("product-descr__item_active");
      }
    });
    productBtns.map((btn) => {
      btn.classList.remove("product-tabs__btn_active");
      this.classList.add("product-tabs__btn_active");
    });
  });
});

const accBtns = Array.from(document.querySelectorAll(".account-tabs__btn"));
const accTabs = Array.from(document.querySelectorAll(".account-item"));

accBtns.map((btn) => {
  btn.addEventListener("click", function () {
    accTabs.map((tab) => {
      tab.classList.add("account-item_hidden");
      if (btn.dataset.tab === tab.id) {
        tab.classList.remove("account-item_hidden");
      }
    });
    accBtns.map((btn) => {
      btn.classList.remove("account-tabs__btn_active");
      this.classList.add("account-tabs__btn_active");
    });
  });
});
