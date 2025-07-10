/**
 * SEPSTAR México - Enhanced Counters Animation
 * Sistema mejorado de animación para contadores numéricos con efectos visuales avanzados
 * v2.0.0 - 2023
 */

class EnhancedCounter {
  constructor(element, options = {}) {
    this.element = element;
    this.targetValue = parseInt(element.getAttribute("data-counter")) || 0;
    this.suffix = element.getAttribute("data-suffix") || "";
    this.currentValue = 0;
    this.animationDuration = options.duration || 2500;
    this.framesPerSecond = 60;
    this.totalFrames = this.animationDuration / (1000 / this.framesPerSecond);
    this.currentFrame = 0;
    this.isAnimating = false;
    this.animationCompleted = false;

    // Opciones avanzadas
    this.easing = options.easing || this.easeOutBounce;
    this.formatNumber = options.formatNumber || this.defaultFormatting;
    this.startDelay = options.startDelay || 0;

    // Efectos visuales
    this.useVisualEffects =
      options.useVisualEffects !== undefined ? options.useVisualEffects : true;
    this.pulseEffect =
      options.pulseEffect !== undefined ? options.pulseEffect : true;
    this.glowEffect =
      options.glowEffect !== undefined ? options.glowEffect : true;
    this.colorTransition =
      options.colorTransition !== undefined ? options.colorTransition : true;

    // Colores para transición
    this.startColor = options.startColor || "#ffffff";
    this.midColor = options.midColor || "#ffcc00";
    this.endColor = options.endColor || "#ffffff";

    // Callbacks
    this.onStart = options.onStart || null;
    this.onUpdate = options.onUpdate || null;
    this.onComplete = options.onComplete || null;

    // Guardar referencia para uso posterior
    this.element._counter = this;

    // Inicializar
    this.init();
  }

  init() {
    // Pre-cargar valor inicial
    this.element.textContent = this.formatNumber(0) + this.suffix;

    // Preparar para efectos
    if (this.useVisualEffects) {
      this.element.style.transition =
        "transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), text-shadow 0.5s ease";
    }
  }

  // Funciones de easing para diferentes efectos de animación
  easeOutExpo(x) {
    return x === 1 ? 1 : 1 - Math.pow(2, -10 * x);
  }

  easeOutBounce(x) {
    const n1 = 7.5625;
    const d1 = 2.75;

    if (x < 1 / d1) {
      return n1 * x * x;
    } else if (x < 2 / d1) {
      return n1 * (x -= 1.5 / d1) * x + 0.75;
    } else if (x < 2.5 / d1) {
      return n1 * (x -= 2.25 / d1) * x + 0.9375;
    } else {
      return n1 * (x -= 2.625 / d1) * x + 0.984375;
    }
  }

  easeOutElastic(x) {
    const c4 = (2 * Math.PI) / 3;
    return x === 0
      ? 0
      : x === 1
      ? 1
      : Math.pow(2, -10 * x) * Math.sin((x * 10 - 0.75) * c4) + 1;
  }

  // Formateo predeterminado con comas para miles
  defaultFormatting(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  // Aplicar efectos visuales según el progreso de la animación
  applyVisualEffects(progress) {
    if (!this.useVisualEffects) return;

    // Transición de color
    if (this.colorTransition) {
      if (progress < 0.6) {
        // Del color inicial al color medio
        const subProgress = progress / 0.6;
        this.element.style.color = this.interpolateColor(
          this.startColor,
          this.midColor,
          subProgress
        );
      } else {
        // Del color medio al color final
        const subProgress = (progress - 0.6) / 0.4;
        this.element.style.color = this.interpolateColor(
          this.midColor,
          this.endColor,
          subProgress
        );
      }
    }

    // Efecto de pulso/escala
    if (this.pulseEffect) {
      const scale = 1 + Math.sin(progress * Math.PI) * 0.1;
      this.element.style.transform = `scale(${scale})`;
    }

    // Efecto de resplandor progresivo
    if (this.glowEffect) {
      const intensity = Math.sin(progress * Math.PI) * 20;
      this.element.style.textShadow = `0 0 ${intensity}px rgba(255, 204, 0, ${
        progress * 0.7
      })`;
    }
  }

  // Interpolación entre dos colores hex
  interpolateColor(color1, color2, factor) {
    // Convertir colores hex a RGB
    const hex2rgb = (hex) => {
      const r = parseInt(hex.slice(1, 3), 16);
      const g = parseInt(hex.slice(3, 5), 16);
      const b = parseInt(hex.slice(5, 7), 16);
      return [r, g, b];
    };

    const rgb1 = hex2rgb(color1);
    const rgb2 = hex2rgb(color2);

    // Interpolar valores RGB
    const r = Math.round(rgb1[0] + factor * (rgb2[0] - rgb1[0]));
    const g = Math.round(rgb1[1] + factor * (rgb2[1] - rgb1[1]));
    const b = Math.round(rgb1[2] + factor * (rgb2[2] - rgb1[2]));

    // Convertir de vuelta a hex
    return `#${r.toString(16).padStart(2, "0")}${g
      .toString(16)
      .padStart(2, "0")}${b.toString(16).padStart(2, "0")}`;
  }

  // Método principal para animar
  animate() {
    if (this.isAnimating || this.animationCompleted) return this;

    this.isAnimating = true;
    this.currentValue = 0;
    this.currentFrame = 0;

    // Llamar al callback de inicio si existe
    if (this.onStart) this.onStart(this);

    // Si hay un retraso en el inicio, hacerlo
    if (this.startDelay > 0) {
      setTimeout(() => this.runAnimation(), this.startDelay);
    } else {
      this.runAnimation();
    }

    return this;
  }

  runAnimation() {
    // Efecto de introducción
    if (this.useVisualEffects) {
      this.element.style.transform = "scale(0.9)";
      setTimeout(() => {
        this.element.style.transform = "scale(1.1)";
        setTimeout(() => {
          this.element.style.transform = "scale(1.0)";
        }, 100);
      }, 100);
    }

    // Iniciar la animación de números
    const animation = () => {
      this.currentFrame++;
      const progress = Math.min(this.currentFrame / this.totalFrames, 1);
      const easedProgress = this.easing(progress);

      // Calcular valor actual basado en progreso
      this.currentValue = Math.floor(easedProgress * this.targetValue);
      this.element.textContent =
        this.formatNumber(this.currentValue) + this.suffix;

      // Aplicar efectos visuales
      this.applyVisualEffects(progress);

      // Llamar al callback de actualización si existe
      if (this.onUpdate) this.onUpdate(this, progress);

      // Continuar animación si no ha terminado
      if (this.currentFrame < this.totalFrames) {
        requestAnimationFrame(animation);
      } else {
        // Finalizar con el valor exacto
        this.element.textContent =
          this.formatNumber(this.targetValue) + this.suffix;

        // Efectos finales
        this.finishAnimation();

        // Marcar como completado
        this.isAnimating = false;
        this.animationCompleted = true;

        // Llamar al callback de finalización si existe
        if (this.onComplete) this.onComplete(this);
      }
    };

    // Iniciar el bucle de animación
    requestAnimationFrame(animation);
  }

  finishAnimation() {
    if (!this.useVisualEffects) return;

    // Añadir clase para efectos CSS adicionales
    this.element.classList.add("counter-complete");

    // Efecto final de escala
    this.element.style.transform = "scale(1.15)";
    setTimeout(() => {
      this.element.style.transform = "scale(1.0)";
    }, 300);

    // Efecto de resplandor final
    this.element.style.textShadow =
      "0 0 20px rgba(255, 204, 0, 0.8), 0 0 30px rgba(255, 255, 255, 0.6)";
    setTimeout(() => {
      this.element.style.textShadow = "0 0 5px rgba(255, 204, 0, 0.3)";
    }, 500);

    // Eliminar la clase después de la animación
    setTimeout(() => {
      this.element.classList.remove("counter-complete");
    }, 2000);
  }

  // Reset para permitir reanimación si es necesario
  reset() {
    this.isAnimating = false;
    this.animationCompleted = false;
    this.currentValue = 0;
    this.currentFrame = 0;
    this.element.textContent = this.formatNumber(0) + this.suffix;
    return this;
  }

  // Método estático para inicializar todos los contadores en una selección
  static initializeAll(selector = ".counter-number", options = {}) {
    const elements = document.querySelectorAll(selector);
    if (elements.length === 0) {
      console.warn(
        "No se encontraron elementos para los contadores:",
        selector
      );
      return [];
    }

    console.log(`Inicializando ${elements.length} contadores mejorados`);
    const counters = [];

    elements.forEach((el, index) => {
      // Crear opciones personalizadas para cada contador
      const elementOptions = {
        ...options,
        duration: options.duration || 2200 + index * 300, // Duración escalonada
        startDelay:
          options.startDelay !== undefined
            ? options.startDelay + index * 150
            : index * 150, // Retraso escalonado
        // Colores diferentes por contador
        startColor: "#ffffff",
        midColor: ["#ff4d4d", "#4dff4d", "#4d4dff", "#ffcc00"][index % 4],
        endColor: "#ffffff",
        // Usar un easing diferente cada 2 contadores para variedad
        easing:
          index % 3 === 0
            ? EnhancedCounter.prototype.easeOutBounce
            : index % 3 === 1
            ? EnhancedCounter.prototype.easeOutElastic
            : EnhancedCounter.prototype.easeOutExpo,
      };

      // Crear y guardar el contador
      counters.push(new EnhancedCounter(el, elementOptions));
    });

    return counters;
  }
}

// Sistema avanzado para detectar visibilidad y activar contadores
class CounterVisibilityManager {
  constructor(selector = ".counter-section", options = {}) {
    this.sectionSelector = selector;
    this.section = document.querySelector(this.sectionSelector);

    if (!this.section) {
      console.error(
        `Sección de contadores no encontrada: ${this.sectionSelector}`
      );
      return;
    }

    // Opciones de configuración
    this.options = {
      triggerOffset: options.triggerOffset || 0.15, // 15% de la ventana
      once: options.once !== undefined ? options.once : true,
      ...options,
    };

    // Estado del sistema
    this.initialized = false;
    this.counters = [];

    // Bind de métodos
    this.checkVisibility = this.checkVisibility.bind(this);
    this.triggerAnimation = this.triggerAnimation.bind(this);

    // Inicializar el sistema
    this.init();
  }

  init() {
    console.log("Inicializando sistema de visibilidad para contadores");

    // Configurar el observador de intersecciones
    this.setupIntersectionObserver();

    // Añadir eventos como respaldo
    window.addEventListener("scroll", this.checkVisibility, { passive: true });
    window.addEventListener("resize", this.checkVisibility, { passive: true });
    window.addEventListener("orientationchange", this.checkVisibility, {
      passive: true,
    });
    window.addEventListener("load", this.checkVisibility);

    // Verificar inmediatamente y después de un retraso para mayor seguridad
    this.checkVisibility();
    setTimeout(this.checkVisibility, 1000);
  }

  setupIntersectionObserver() {
    if ("IntersectionObserver" in window) {
      this.observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              this.triggerAnimation();
              if (this.options.once) {
                this.observer.disconnect();
              }
            }
          });
        },
        {
          threshold: 0.1,
          rootMargin: `-${this.options.triggerOffset * 100}px 0px`,
        }
      );

      this.observer.observe(this.section);
    }
  }

  checkVisibility() {
    // Si ya se inicializó y la opción es 'once', no hacer nada
    if (this.initialized && this.options.once) return;

    // Verificación manual de visibilidad (fallback)
    if (!("IntersectionObserver" in window)) {
      const rect = this.section.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      if (
        rect.top <= windowHeight * (1 - this.options.triggerOffset) &&
        rect.bottom >= 0
      ) {
        this.triggerAnimation();
      }
    }
  }

  triggerAnimation() {
    if (this.initialized) return;

    console.log("Activando animación de contadores");

    // Inicializar todos los contadores
    this.counters = EnhancedCounter.initializeAll(".counter-number");

    // Animar cada contador
    this.counters.forEach((counter) => counter.animate());

    // Marcar como inicializado
    this.initialized = true;

    // Limpiar eventos si es 'once'
    if (this.options.once) {
      window.removeEventListener("scroll", this.checkVisibility);
      window.removeEventListener("resize", this.checkVisibility);
      window.removeEventListener("orientationchange", this.checkVisibility);
    }
  }
}

// Inicializar el sistema cuando el documento esté listo
document.addEventListener("DOMContentLoaded", function () {
  console.log("Inicializando sistema mejorado de contadores");

  // Crear el gestor de visibilidad
  const visibilityManager = new CounterVisibilityManager(".counter-section");

  // Sistema de seguridad - verificar si los contadores se inicializaron
  setTimeout(function () {
    const counterElement = document.querySelector(".counter-number");
    if (counterElement && counterElement.textContent === "0") {
      console.log("Iniciando contadores por mecanismo de seguridad");
      const counters = EnhancedCounter.initializeAll(".counter-number");
      counters.forEach((counter) => counter.animate());
    }
  }, 3000);
});
