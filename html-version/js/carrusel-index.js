const swiper = new Swiper(".swiper", {
  slidesPerView: 4,
  spaceBetween: 20,
  centeredSlides: true,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 5,
    },
  },
  on: {
    slideChangeTransitionEnd: function () {
      document.querySelectorAll(".swiper-slide").forEach((slide) => {
        slide.classList.remove("swiper-slide-active");
      });

      let activeIndex = swiper.activeIndex;
      let centerSlide = swiper.slides[activeIndex];

      centerSlide.classList.add("swiper-slide-active");
    },
  },
});

let initialSlide = document.querySelector(".swiper-slide:nth-child(2)");
if (initialSlide) initialSlide.classList.add("swiper-slide-active");
