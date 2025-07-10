/**
 * SEPSTAR México - Advanced Counters Animation
 * Sistema avanzado de animación para contadores numéricos con efectos visuales
 */

class AdvancedCounter {
  constructor(element, options = {}) {
    this.element = element;
    this.targetValue = parseInt(element.getAttribute("data-counter")) || 0;
    this.suffix = element.getAttribute("data-suffix") || "";
    this.currentValue = 0;
    this.animationDuration = options.duration || 2000;
    this.framesPerSecond = 60;
    this.totalFrames = this.animationDuration / (1000 / this.framesPerSecond);
    this.increment = this.targetValue / this.totalFrames;
    this.currentFrame = 0;
    this.easing = options.easing || this.easeOutExpo;
    this.onStart = options.onStart || null;
    this.onUpdate = options.onUpdate || null;
    this.onComplete = options.onComplete || null;
    this.isAnimating = false;
    this.formattingFn = options.formattingFn || this.defaultFormatting;
    this.colorTransition = options.colorTransition || false;
    this.highlightColor = options.highlightColor || "#ffcc00";
    this.startColor = options.startColor || "#ffffff";
    this.endColor = options.endColor || "#ffffff";

    // Guardar referencia al objeto para usar en eventos
    this.element._counter = this;

    // Pre-cargar valor inicial
    this.element.textContent = this.formattingFn(0) + this.suffix;
  }

  // Funciones de easing para animación más natural
  easeOutExpo(x) {
    return x === 1 ? 1 : 1 - Math.pow(2, -10 * x);
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

  // Transición de color
  updateColor() {
    if (!this.colorTransition) return;

    const progress = this.currentFrame / this.totalFrames;
    if (progress < 0.7) {
      // Transición desde startColor a highlightColor
      const subProgress = progress / 0.7;
      this.element.style.color = this.interpolateColor(
        this.startColor,
        this.highlightColor,
        subProgress
      );
    } else {
      // Transición desde highlightColor a endColor
      const subProgress = (progress - 0.7) / 0.3;
      this.element.style.color = this.interpolateColor(
        this.highlightColor,
        this.endColor,
        subProgress
      );
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
    if (this.isAnimating) return;

    this.isAnimating = true;
    this.currentValue = 0;
    this.currentFrame = 0;

    if (this.onStart) this.onStart(this);

    // Efecto de escalado inicial
    this.element.style.transform = "scale(1.0)";
    this.element.style.transition = "transform 0.2s ease-out";

    // Animación del contador
    const animation = () => {
      this.currentFrame++;
      const progress = this.currentFrame / this.totalFrames;
      const easedProgress = this.easing(Math.min(progress, 1));

      this.currentValue = Math.floor(easedProgress * this.targetValue);
      this.element.textContent =
        this.formattingFn(this.currentValue) + this.suffix;

      // Aplicar efectos visuales según el progreso
      this.updateColor();

      if (this.onUpdate) this.onUpdate(this);

      if (this.currentFrame < this.totalFrames) {
        requestAnimationFrame(animation);
      } else {
        // Finalizar con el valor exacto
        this.element.textContent =
          this.formattingFn(this.targetValue) + this.suffix;

        // Efecto de escala al terminar
        this.element.style.transform = "scale(1.1)";
        setTimeout(() => {
          this.element.style.transform = "scale(1.0)";
        }, 200);

        this.isAnimating = false;

        if (this.onComplete) this.onComplete(this);
      }
    };

    requestAnimationFrame(animation);
    return this;
  }

  // Método estático para inicializar todos los contadores en una selección
  static initializeAll(selector = ".counter-number", options = {}) {
    const elements = document.querySelectorAll(selector);
    const counters = [];

    elements.forEach((el, index) => {
      // Opciones individuales mezcladas con opciones globales
      const elementOptions = {
        ...options,
        duration: options.duration || 2000 + index * 200, // Escalonar inicio
        colorTransition: true,
        startColor: "#ffffff",
        highlightColor: ["#ff4d4d", "#4dff4d", "#4d4dff", "#ffcc00"][index % 4], // Colores diferentes por contador
        endColor: "#ffffff",
      };

      counters.push(new AdvancedCounter(el, elementOptions));
    });

    return counters;
  }
}

// Sistema para detectar visibilidad y activar los contadores
class CounterVisibilityTracker {
  constructor(selector = ".counter-section", options = {}) {
    this.sectionSelector = selector;
    this.options = {
      triggerOffset: options.triggerOffset || 0.2, // 20% de la ventana
      once: options.once !== undefined ? options.once : true,
      countersInitialized: false,
      ...options,
    };

    this.section = document.querySelector(this.sectionSelector);
    if (!this.section) {
      console.error(
        "Sección de contadores no encontrada:",
        this.sectionSelector
      );
      return;
    }

    this.triggerAnimation = this.triggerAnimation.bind(this);
    this.checkVisibility = this.checkVisibility.bind(this);

    // Inicializar cuando el DOM esté listo
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", () => this.init());
    } else {
      this.init();
    }
  }

  init() {
    // Registrar observadores
    this.setupObservers();

    // También verificar en los eventos comunes
    window.addEventListener("scroll", this.checkVisibility);
    window.addEventListener("resize", this.checkVisibility);
    window.addEventListener("load", this.checkVisibility);

    // Comprobar inmediatamente
    this.checkVisibility();

    // Y una verificación retrasada para mayor seguridad
    setTimeout(this.checkVisibility, 1000);
  }

  setupObservers() {
    // Usar Intersection Observer cuando sea posible
    if ("IntersectionObserver" in window) {
      this.observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              this.triggerAnimation();
              if (this.options.once && this.options.countersInitialized) {
                this.observer.disconnect();
              }
            }
          });
        },
        {
          threshold: 0.1,
          rootMargin: `-${this.options.triggerOffset * 100}% 0px`,
        }
      );

      this.observer.observe(this.section);
    }
  }

  checkVisibility() {
    // No volver a iniciar si ya está iniciado y la opción es 'once'
    if (this.options.once && this.options.countersInitialized) {
      return;
    }

    // Fallback para navegadores sin IntersectionObserver
    const rect = this.section.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    // La sección es visible cuando está dentro de la ventana con el offset
    if (
      rect.top <= windowHeight * (1 - this.options.triggerOffset) &&
      rect.bottom >= windowHeight * this.options.triggerOffset
    ) {
      this.triggerAnimation();

      // Desconectar eventos si es 'once'
      if (this.options.once) {
        window.removeEventListener("scroll", this.checkVisibility);
        window.removeEventListener("resize", this.checkVisibility);
      }
    }
  }

  triggerAnimation() {
    if (this.options.countersInitialized) return;

    console.log("Iniciando animación avanzada de contadores");
    const counters = AdvancedCounter.initializeAll(".counter-number", {
      easing: (x) => {
        // Combinación de easings para un efecto más dinámico
        return x < 0.5 ? 4 * x * x * x : 1 - Math.pow(-2 * x + 2, 3) / 2;
      },
    });

    // Iniciar los contadores uno por uno con retraso
    counters.forEach((counter, index) => {
      setTimeout(() => {
        counter.animate();
      }, index * 100); // Retraso escalonado para efecto más profesional
    });

    // Marcar como inicializado
    this.options.countersInitialized = true;
  }
}

// Inicializar el sistema de contadores cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", function () {
  console.log("Inicializando sistema avanzado de contadores");
  new CounterVisibilityTracker(".counter-section", {
    triggerOffset: 0.15, // Activar cuando 15% de la sección sea visible
    once: true,
  });

  // Backup para garantizar que los contadores se activen
  setTimeout(function () {
    const countersInitialized =
      document.querySelector(".counter-number")?.textContent !== "0";
    if (!countersInitialized) {
      console.log("Iniciando contadores por seguridad (timeout)");
      const counters = AdvancedCounter.initializeAll(".counter-number");
      counters.forEach((counter) => counter.animate());
    }
  }, 2500); // 2.5 segundos de espera
});
