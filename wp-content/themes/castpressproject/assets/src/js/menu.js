// Humburger
const humb = document.querySelector(".humb");
const topnav = document.querySelector(".topnav");
humb.onclick = function () {
  humb.classList.toggle("humb_is-open");
  topnav.classList.toggle("topnav_is-open");
};

document.addEventListener("click", (e) => {
  if (!e.target.closest(".header") && !e.target.closest(".humb")) {
    humb.classList.remove("humb_is-open");
    topnav.classList.remove("topnav_is-open");
  }
});

// Search
const searchBtn = document.querySelector(".search-icon");
const searchCross = document.querySelector(".search-icon__cross");
const searchSvg = document.querySelector(".search-icon__svg");
const searchField = document.querySelector(".header-search");

searchBtn.onclick = function () {
  searchField.classList.toggle("header-search_active");
  searchCross.classList.toggle("search-icon__cross_active");
  searchSvg.classList.toggle("search-icon__svg_hidden");
};

document.addEventListener("click", (e) => {
  if (!e.target.closest(".header-search") && !e.target.closest(".search-icon")) {
    searchField.classList.remove("header-search_active");
    searchCross.classList.remove("search-icon__cross_active");
    searchSvg.classList.remove("search-icon__svg_hidden");
  }
});

// Submenu
const subMenus = document.querySelectorAll(".topnav__item_has-submenu");
subMenus.forEach((subMenu) => {
  let subMenuBtn = subMenu.querySelector(".submenu-toggle");
  let menu = subMenu.querySelector(".topnav__submenu");
  subMenuBtn.onclick = function () {
    subMenuBtn.classList.toggle("submenu-toggle_open");
    menu.classList.toggle("topnav__submenu_is-open");
  };
});

// Close all on resize
window.addEventListener("resize", () => {
  subMenus.forEach((subMenu) => {
    let subMenuBtn = subMenu.querySelector(".submenu-toggle");
    let menu = subMenu.querySelector(".topnav__submenu");
    subMenuBtn.classList.remove("submenu-toggle_open");
    menu.classList.remove("topnav__submenu_is-open");
  });
  humb.classList.remove("humb_is-open");
  topnav.classList.remove("topnav_is-open");
});
