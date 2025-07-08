// Inicializar AOS y Swiper
document.addEventListener("DOMContentLoaded", function () {
  // Precargar imágenes para transiciones suaves
  const whiteLogo = new Image();
  whiteLogo.src = "img/logo/logo sepstar.png";
  const blackLogo = new Image();
  blackLogo.src = "img/logo/LOGONEGRO.png";

  // Inicializar AOS
  AOS.init({
    duration: 800,
    easing: "ease-in-out",
    once: true,
  });

  // Inicializar Hero Swiper Carousel
  const heroSwiper = new Swiper(".hero-swiper", {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    speed: 1000,
  });

  // Contador de números
  const counterAnimation = () => {
    const counters = document.querySelectorAll(".counter-number");
    const speed = 200;

    counters.forEach((counter) => {
      const animate = () => {
        const target = parseInt(counter.getAttribute("data-target"));
        const count = parseInt(counter.innerText);
        const increment = Math.trunc(target / speed);

        if (count < target) {
          counter.innerText = count + increment;
          setTimeout(animate, 1);
        } else {
          counter.innerText = target;
        }
      };

      animate();
    });
  };

  // Ejecutar contador cuando se ve en la pantalla
  const counterSection = document.querySelector(".counter-section");
  if (counterSection) {
    const observer = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting) {
        counterAnimation();
        observer.unobserve(counterSection);
      }
    });

    observer.observe(counterSection);
  }

  // Animaciones mejoradas para tarjetas de servicio premium con vibra naranja
  const serviceCards = document.querySelectorAll(".service-card.premium");
  serviceCards.forEach((card) => {
    card.addEventListener("mouseenter", () => {
      const iconCircle = card.querySelector(".icon-circle");
      if (iconCircle) {
        iconCircle.style.transform = "scale(1.1) rotate(5deg)";
        iconCircle.style.boxShadow = "0 10px 25px rgba(255, 102, 0, 0.4)";
      }
    });

    card.addEventListener("mouseleave", () => {
      const iconCircle = card.querySelector(".icon-circle");
      if (iconCircle) {
        iconCircle.style.transform = "scale(1) rotate(0)";
        iconCircle.style.boxShadow = "0 5px 15px rgba(255, 102, 0, 0.3)";
      }
    });

    // Animar los elementos de características con un ligero retraso
    const features = card.querySelectorAll(".feature-item");
    features.forEach((feature, index) => {
      feature.style.transitionDelay = `${index * 0.1}s`;
    });
  });

  // Efecto de encabezado al desplazarse
  const handleHeaderScroll = function () {
    const header = document.querySelector(".header");
    if (window.scrollY > 100) {
      if (!header.classList.contains("scrolled")) {
        requestAnimationFrame(() => {
          header.classList.add("scrolled");
        });
      }
    } else {
      if (header.classList.contains("scrolled")) {
        requestAnimationFrame(() => {
          header.classList.remove("scrolled");
        });
      }
    }
  };

  // Verificar el estado del scroll al cargar la página
  handleHeaderScroll();

  // Escuchar el evento de scroll con throttling para mejor rendimiento
  let lastScrollTime = 0;
  window.addEventListener(
    "scroll",
    function () {
      const now = Date.now();
      if (now - lastScrollTime > 10) {
        // 10ms throttle
        lastScrollTime = now;
        handleHeaderScroll();
      }
    },
    { passive: true }
  );
});
