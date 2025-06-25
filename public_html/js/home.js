document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM Cargado - Inicializando home.js");

  // Inicializar AOS
  if (typeof AOS !== "undefined") {
    AOS.init({
      once: true,
      duration: 600,
      offset: 50,
      delay: 0,
    });
  }

  // Animación de contadores - versión simple y directa
  function animateCounters() {
    console.log("Iniciando animación de contadores");
    const counters = document.querySelectorAll(".counter-number");

    if (counters.length === 0) {
      console.error("No se encontraron elementos counter-number");
      return;
    }

    console.log("Encontrados " + counters.length + " contadores");

    counters.forEach((counter) => {
      // Reestablecer a cero
      counter.textContent = "0";

      // Obtener el valor final
      const target = parseInt(counter.getAttribute("data-counter") || 0);
      console.log("Contador objetivo:", target);

      // Obtener el sufijo
      const suffix = counter.getAttribute("data-suffix") || "";

      // Evitar división por cero
      if (target === 0) {
        counter.textContent = "0" + suffix;
        return;
      }

      // Configurar la animación
      let current = 0;
      const increment = Math.ceil(target / 80); // Más suave
      const duration = 1500; // 1.5 segundos en total
      const interval = Math.floor(duration / (target / increment));

      // Iniciar animación
      const timer = setInterval(() => {
        current += increment;

        if (current >= target) {
          counter.textContent = target + suffix;
          clearInterval(timer);
        } else {
          counter.textContent = current + suffix;
        }
      }, interval);
    });
  } // Método simple para iniciar contadores - sin observadores complejos
  console.log("Configurando inicio de animación de contadores");

  // Función que verifica si la sección está visible
  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.bottom >= 0
    );
  }

  // Para evitar animaciones múltiples
  let animationStarted = false;

  // Función para verificar y activar contadores
  function checkCounters() {
    if (animationStarted) return;

    const counterSection = document.querySelector(".counter-section");
    if (!counterSection) {
      console.error("No se encontró la sección de contadores");
      return;
    }

    if (isElementInViewport(counterSection)) {
      console.log("Sección de contadores visible - iniciando animación");
      animateCounters();
      animationStarted = true;
      // Dejar de escuchar eventos
      window.removeEventListener("scroll", checkCounters);
      document.removeEventListener("DOMContentLoaded", checkCounters);
      window.removeEventListener("load", checkCounters);
    }
  }

  // Activar en varios eventos para mayor seguridad
  window.addEventListener("scroll", checkCounters);
  window.addEventListener("load", checkCounters);
  document.addEventListener("DOMContentLoaded", checkCounters);

  // Verificar inmediatamente y también después de un retraso
  checkCounters();
  setTimeout(checkCounters, 500);
  setTimeout(checkCounters, 1000);

  // Garantizar que se activen si nada más funciona
  setTimeout(function () {
    if (!animationStarted) {
      console.log("Forzando animación de contadores después de espera");
      animateCounters();
      animationStarted = true;
    }
  }, 2000);

  // Inicializar filtros de productos
  window.filterProducts = function (category) {
    const buttons = document.querySelectorAll(".product-filter-btn");
    const items = document.querySelectorAll(".product-item");

    // Actualizar botones activos
    buttons.forEach((btn) => {
      if (btn.getAttribute("data-filter") === category) {
        btn.classList.add("active");
      } else {
        btn.classList.remove("active");
      }
    });

    // Filtrar elementos
    items.forEach((item) => {
      if (
        category === "all" ||
        item.getAttribute("data-category") === category
      ) {
        item.style.display = "block";
        setTimeout(() => {
          item.style.opacity = "1";
        }, 50);
      } else {
        item.style.opacity = "0";
        setTimeout(() => {
          item.style.display = "none";
        }, 500);
      }
    });
  };
});
