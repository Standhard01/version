toggler();

function toggler() {
  const menuToggle = document.querySelector(".toggle");
  const showcase = document.querySelector(".showcase");
  const navItem = document.querySelector(".nav-item");
  const caption = document.querySelector(".caption");
  const logo = document.querySelector(".logo");
  const social = document.querySelector(".social");
  const bars = document.getElementsByClassName("toggle fa-bars");
  const times = document.getElementsByClassName("toggle fa-times");

  menuToggle.addEventListener("click", () => {
    menuToggle.classList.toggle("active");
    showcase.classList.toggle("active");
    navItem.classList.toggle("active");
    caption.classList.toggle("active");
    logo.classList.toggle("active");
    social.classList.toggle("active");
    bars.style.display = "none";
    times.style.display = "block";

  });
}

var carousel = function () {
  $(".carousel-testimony").owlCarousel({
    center: true,
    loop: true,
    autoplay: true,
    autoplaySpeed: 2000,
    items: 1,
    margin: 30,
    stagePadding: 0,
    nav: false,
    navText: [
      '<span class="ion-ios-arrow-back">',
      '<span class="ion-ios-arrow-forward">',
    ],
    responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 3 } },
  });
};
carousel();
