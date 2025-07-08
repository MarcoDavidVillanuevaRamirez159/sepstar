document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll('input[name="carousel"]');
  const indicators = document.querySelectorAll(".indicator");
  const prevArrow = document.querySelector(".nav-prev");
  const nextArrow = document.querySelector(".nav-next");

  let currentSlide = 0;
  const totalSlides = slides.length;

  // Función para navegar al slide siguiente
  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    slides[currentSlide].checked = true;
  }

  // Función para navegar al slide anterior
  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    slides[currentSlide].checked = true;
  }

  // Navegación por teclado
  document.addEventListener("keydown", function (e) {
    switch (e.key) {
      case "ArrowLeft":
        prevSlide();
        break;
      case "ArrowRight":
        nextSlide();
        break;
    }
  });

  // Actualizar currentSlide cuando se cambia manualmente
  slides.forEach((slide, index) => {
    slide.addEventListener("change", function () {
      currentSlide = index;
    });
  });

  // Efectos de hover mejorados para las tarjetas
  const certificateCards = document.querySelectorAll(".certificate-card");
  certificateCards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-15px) scale(1.03)";
    });

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1)";
    });
  });

  // Animación de entrada para los indicadores
  indicators.forEach((indicator, index) => {
    indicator.style.animationDelay = `${index * 0.1}s`;
    indicator.style.animation = "fadeInUp 0.6s ease forwards";
  });

  // Auto-play opcional (descomenta para activar)
  /*
        setInterval(() => {
          nextSlide();
        }, 5000);
        */
});

// Animación CSS adicional
const style = document.createElement("style");
style.textContent = `
        @keyframes fadeInUp {
          from {
            opacity: 0;
            transform: translateY(20px);
          }
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }
        
        .carousel-indicators .indicator {
          opacity: 0;
        }
      `;
document.head.appendChild(style);

// Sincroniza el texto con la tarjeta central
const titles = [
  "AWS Solutions Architect",
  "Google Cloud Professional",
  "Microsoft Azure Expert",
  "Cisco CCNA Security",
  "Docker Certified Associate",
  "Kubernetes Administrator",
];
const subtitles = [
  "Amazon Web Services",
  "Google Cloud Platform",
  "Microsoft Corporation",
  "Cisco Systems",
  "Docker Inc.",
  "Cloud Native Computing Foundation",
];
const radios = document.querySelectorAll('input[name="coverflow"]');
const titleEl = document.getElementById("cf-title");
const subtitleEl = document.getElementById("cf-subtitle");
let currentIdx = 0;
radios.forEach((radio, idx) => {
  radio.addEventListener("change", () => {
    titleEl.textContent = titles[idx];
    subtitleEl.textContent = subtitles[idx];
    currentIdx = idx;
  });
});

// Swipe y drag mejorado: táctil y mouse
const carousel = document.getElementById("coverflow-carousel");
let startX = 0;
let lastX = 0;
let isSwiping = false;
let threshold = 25; // Sensibilidad
let lastMoveTime = 0;

// TÁCTIL
carousel.addEventListener("touchstart", function (e) {
  startX = e.touches[0].clientX;
  lastX = startX;
  isSwiping = true;
  lastMoveTime = Date.now();
});
carousel.addEventListener("touchmove", function (e) {
  if (!isSwiping) return;
  let moveX = e.touches[0].clientX;
  let diff = moveX - lastX;
  let now = Date.now();
  if (Math.abs(diff) > threshold && now - lastMoveTime > 80) {
    if (diff < 0) {
      let next = (currentIdx + 1) % radios.length;
      radios[next].checked = true;
      titleEl.textContent = titles[next];
      subtitleEl.textContent = subtitles[next];
      currentIdx = next;
    } else {
      let prev = (currentIdx - 1 + radios.length) % radios.length;
      radios[prev].checked = true;
      titleEl.textContent = titles[prev];
      subtitleEl.textContent = subtitles[prev];
      currentIdx = prev;
    }
    lastX = moveX;
    lastMoveTime = now;
  }
});
carousel.addEventListener("touchend", function (e) {
  isSwiping = false;
});

// MOUSE DRAG
let isDragging = false;
let mouseStartX = 0;
let mouseLastX = 0;
let mouseLastMoveTime = 0;

carousel.addEventListener("mousedown", function (e) {
  isDragging = true;
  mouseStartX = e.clientX;
  mouseLastX = mouseStartX;
  mouseLastMoveTime = Date.now();
});
carousel.addEventListener("mousemove", function (e) {
  if (!isDragging) return;
  let moveX = e.clientX;
  let diff = moveX - mouseLastX;
  let now = Date.now();
  if (Math.abs(diff) > threshold && now - mouseLastMoveTime > 80) {
    if (diff < 0) {
      let next = (currentIdx + 1) % radios.length;
      radios[next].checked = true;
      titleEl.textContent = titles[next];
      subtitleEl.textContent = subtitles[next];
      currentIdx = next;
    } else {
      let prev = (currentIdx - 1 + radios.length) % radios.length;
      radios[prev].checked = true;
      titleEl.textContent = titles[prev];
      subtitleEl.textContent = subtitles[prev];
      currentIdx = prev;
    }
    mouseLastX = moveX;
    mouseLastMoveTime = now;
  }
});
window.addEventListener("mouseup", function (e) {
  isDragging = false;
});
// Evita seleccionar texto al arrastrar
carousel.addEventListener("dragstart", function (e) {
  e.preventDefault();
});
