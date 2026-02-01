// Swiper + AOS init
document.addEventListener("DOMContentLoaded", () => {
  // AOS
  if (window.AOS) {
    AOS.init({
      duration: 650,
      easing: "ease-out",
      once: true,
      offset: 80
    });
  }

  // Swiper
  const el = document.querySelector(".vl-events-swiper");
  if (el && window.Swiper) {
    new Swiper(el, {
      slidesPerView: 1.1,
      spaceBetween: 16,
      loop: false,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        576: { slidesPerView: 1.5 },
        768: { slidesPerView: 2.2 },
        992: { slidesPerView: 3 },
      }
    });
  }
});
