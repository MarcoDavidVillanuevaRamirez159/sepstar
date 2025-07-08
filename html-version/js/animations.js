// SEPSTAR MÉXICO - NO ANIMATIONS
document.addEventListener("DOMContentLoaded", function () {
  // All animations and transitions removed

  // Just set counter values directly without animation
  function setCounterValues() {
    const counters = document.querySelectorAll(".counter-number");
    if (counters.length > 0) {
      counters.forEach((counter) => {
        const target = parseInt(counter.getAttribute("data-target") || "0");
        counter.textContent = target;
      });
    }
  }

  // Call function to set counter values
  setCounterValues();

  // Make all animated elements visible immediately
  const elementsToShow = document.querySelectorAll(
    ".service-card, .product-card, .news-card, .counter-item, .feature-item"
  );
  if (elementsToShow.length > 0) {
    elementsToShow.forEach((el) => {
      el.style.opacity = "1";
      el.style.transform = "none";
    });
  }

  // Smooth scroll for navigation links without animations
  const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
  if (navLinks.length > 0) {
    navLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href && href.startsWith("#")) {
          e.preventDefault();
          const target = document.querySelector(href);
          if (target) {
            window.scrollTo({
              top: target.offsetTop,
              behavior: "auto", // Changed from 'smooth' to 'auto' to remove animation
            });
          }
        }
      });
    });
  }

  // Forzar smooth scroll en navegadores antiguos
  if (!("scrollBehavior" in document.documentElement.style)) {
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
      link.addEventListener("click", function (e) {
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
          e.preventDefault();
          const top =
            target.getBoundingClientRect().top + window.pageYOffset - 80;
          window.scrollTo({ top, behavior: "smooth" });
        }
      });
    });
  }

  // Animaciones de entrada y transición para toda la página y secciones
  // Aplica clases automáticamente a las secciones y elementos al hacer scroll

  // Animar secciones principales con animaciones diferentes
  const sections = [
    ...document.querySelectorAll(".home-section"),
    ...document.querySelectorAll(".swiper"),
    ...document.querySelectorAll(".footer-pro"),
    ...document.querySelectorAll(".hero-image"),
    ...document.querySelectorAll(".hero-text"),
  ];
  sections.forEach((sec) => {
    sec.classList.add("section-animated");
  });

  // Animar elementos individuales
  const animatedEls = document.querySelectorAll(
    ".cf-card, .home-image img, .home-text, .hero-image, .hero-text, .footer-pro-col, .footer-pro-logo"
  );
  animatedEls.forEach((el) => {
    el.classList.add("animated-blur");
  });

  // Observer para mostrar animaciones al entrar en viewport
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        } else {
          entry.target.classList.remove("visible");
        }
      });
    },
    { threshold: 0.15 }
  );

  document
    .querySelectorAll(
      ".section-animated, .animated-blur, .hero-image, .hero-text, .home-section, .swiper, .footer-pro"
    )
    .forEach((el) => {
      observer.observe(el);
    });

  // Animación especial al hacer scroll hacia arriba
  let lastScroll = window.scrollY;
  window.addEventListener("scroll", () => {
    const currentScroll = window.scrollY;
    document
      .querySelectorAll(
        ".section-animated, .home-section, .swiper, .footer-pro, .hero-image, .hero-text"
      )
      .forEach((sec) => {
        if (currentScroll < lastScroll) {
          sec.classList.add("section-animated-up");
          setTimeout(() => {
            sec.classList.remove("section-animated-up");
          }, 1000);
        }
      });
    lastScroll = currentScroll;
  });

  console.log("✓ Animations disabled - Sepstar México");
});
