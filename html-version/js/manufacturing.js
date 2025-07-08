// AOS initialization moved to footer.php to ensure it's available first

document.addEventListener("DOMContentLoaded", () => {
  // Añadir clase para animación de carga del video  const heroVideo = document.querySelector(".hero-video");
  if (heroVideo) {
    setTimeout(() => {
      heroVideo.classList.add("loaded");
    }, 50); // Reducido de 300ms a 50ms para una entrada más rápida
  }

  // Contador de estadísticas con animación más suave
  const counters = document.querySelectorAll(".counter");
  const speed = 1000; // Más tiempo para una animación más fluida

  const animateCounter = (counter) => {
    const target = +counter.getAttribute("data-target");
    const prefix = counter.getAttribute("data-prefix") || "";
    const suffix = counter.getAttribute("data-suffix") || "";
    let count = 0;
    const increment = target / speed;
    const duration = 2000; // Duración de la animación en ms
    const startTime = performance.now();

    const easeOutQuad = (t) => t * (2 - t); // Función de easing para animación más natural

    const updateCount = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const easedProgress = easeOutQuad(progress);

      count = Math.ceil(target * easedProgress);
      counter.innerText = `${prefix}${count.toLocaleString()}${suffix}`;

      if (progress < 1) {
        requestAnimationFrame(updateCount);
      } else {
        counter.innerText = `${prefix}${target.toLocaleString()}${suffix}`;
      }
    };

    requestAnimationFrame(updateCount);
  };

  // Iniciar contadores cuando sean visibles con IntersectionObserver
  const counterObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );

  counters.forEach((counter) => counterObserver.observe(counter));

  // Animación de timeline de proceso
  const processItems = document.querySelectorAll(".process-item");
  const processObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          setTimeout(() => {
            const dot = entry.target.querySelector(".process-dot");
            if (dot) dot.classList.add("active");
          }, 300);
          processObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.3 }
  );

  processItems.forEach((item) => processObserver.observe(item));

  // Galería de instalaciones con lightbox
  const galleryItems = document.querySelectorAll(".facility-gallery-item");
  galleryItems.forEach((item) => {
    item.addEventListener("click", () => {
      const imgSrc = item.querySelector("img").src;
      const lightbox = document.createElement("div");
      lightbox.innerHTML = `
        <div class="lightbox-overlay">
          <div class="lightbox-container">
            <img src="${imgSrc}" alt="Vista ampliada" class="lightbox-image">
            <button class="lightbox-close">&times;</button>
          </div>
        </div>
      `;
      document.body.appendChild(lightbox);

      // Prevenir scroll
      document.body.style.overflow = "hidden";

      // Animar apertura
      setTimeout(() => {
        lightbox.querySelector(".lightbox-overlay").style.opacity = "1";
        lightbox.querySelector(".lightbox-container").style.transform =
          "scale(1)";
      }, 10);

      // Cerrar lightbox
      lightbox.addEventListener("click", (e) => {
        if (
          e.target.classList.contains("lightbox-overlay") ||
          e.target.classList.contains("lightbox-close")
        ) {
          lightbox.querySelector(".lightbox-overlay").style.opacity = "0";
          lightbox.querySelector(".lightbox-container").style.transform =
            "scale(0.9)";
          document.body.style.overflow = "";

          setTimeout(() => {
            document.body.removeChild(lightbox);
          }, 300);
        }
      });
    });
  });

  // Parallax en el hero mejorado con requestAnimationFrame para mejor rendimiento
  let ticking = false;
  let lastScrollY = window.pageYOffset;
  const parallaxElements = document.querySelectorAll(".parallax");

  const updateParallax = () => {
    const scrolled = window.pageYOffset;

    // Parallax hero
    const heroVideo = document.querySelector(".hero-video");
    if (heroVideo) {
      heroVideo.style.transform = `translateY(${scrolled * 0.5}px)`;
    }

    // Parallax para otros elementos
    parallaxElements.forEach((el) => {
      const speed = el.dataset.speed || 0.2;
      el.style.transform = `translateY(${scrolled * speed}px)`;
    });

    ticking = false;
  };

  window.addEventListener("scroll", () => {
    lastScrollY = window.pageYOffset;
    if (!ticking) {
      window.requestAnimationFrame(() => {
        updateParallax();
        ticking = false;
      });
      ticking = true;
    }
  });

  // Inicializar modal de video para que cargue correctamente
  const videoModal = document.getElementById("factoryVideoModal");
  const videoFrame = document.getElementById("factoryVideoFrame");

  if (videoModal && videoFrame) {
    videoModal.addEventListener("show.bs.modal", function () {
      const videoUrl = videoFrame.getAttribute("data-video-url");
      videoFrame.setAttribute("src", videoUrl + "?autoplay=1");
    });

    videoModal.addEventListener("hidden.bs.modal", function () {
      videoFrame.setAttribute("src", "about:blank");
    });
  }

  // Animación para certificaciones
  const certItems = document.querySelectorAll(".certification-item");
  certItems.forEach((item, index) => {
    item.style.animationDelay = `${index * 0.1}s`;
  });

  // Inicializar tooltip de Bootstrap
  const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  tooltips.forEach((tooltip) => {
    new bootstrap.Tooltip(tooltip);
  });
});

// Mostrar/ocultar tooltips de características
document.querySelectorAll(".feature-point").forEach((point) => {
  const tooltip = point.querySelector(".feature-tooltip");

  point.addEventListener("mouseenter", () => {
    tooltip.style.opacity = "1";
    tooltip.style.visibility = "visible";

    // Ajustar posición del tooltip
    const rect = point.getBoundingClientRect();
    const tooltipRect = tooltip.getBoundingClientRect();

    if (rect.left < tooltipRect.width) {
      tooltip.style.left = "100%";
      tooltip.style.right = "auto";
    } else if (rect.right + tooltipRect.width > window.innerWidth) {
      tooltip.style.right = "100%";
      tooltip.style.left = "auto";
    }
  });

  point.addEventListener("mouseleave", () => {
    tooltip.style.opacity = "0";
    tooltip.style.visibility = "hidden";
  });
});

// Tour Virtual
function startVirtualTour() {
  const tourViewer = document.createElement("div");
  tourViewer.className = "virtual-tour-viewer";
  tourViewer.innerHTML = `
        <div class="tour-close" onclick="closeTour()">&times;</div>
        <iframe src="/virtual-tour/index.html" frameborder="0"></iframe>
    `;
  document.body.appendChild(tourViewer);
  document.body.style.overflow = "hidden";
}

function closeTour() {
  const viewer = document.querySelector(".virtual-tour-viewer");
  if (viewer) {
    viewer.remove();
    document.body.style.overflow = "";
  }
}

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  });
});

// Intersection Observer para animaciones al hacer scroll
const processSteps = document.querySelectorAll(".process-step");
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
        entry.target.style.transform = "translateY(0)";
      }
    });
  },
  { threshold: 0.3 }
);

processSteps.forEach((step) => {
  observer.observe(step);
});
