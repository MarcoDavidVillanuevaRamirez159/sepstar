/**
 * Sepstar México - Main JavaScript File
 * Author: GitHub Copilot
 * Version: 1.0
 */

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
  // Initialize Back to Top button
  initBackToTopButton();

  // Initialize Cookie Consent
  initCookieConsent();

  // Initialize Header Scroll Effect
  initHeaderScrollEffect();

  // Initialize Form Validation
  initFormValidation();

  // Initialize Mobile Menu
  initMobileMenu();

  // Initialize Animation on Scroll
  initAnimationOnScroll();

  // Load Google Maps if contact map exists
  if (document.getElementById("contactMap")) {
    loadGoogleMaps();
  }

  // Initialize Certificates Swiper
  initCertificatesSwiper();
});

/**
 * Initialize Back to Top Button functionality
 */
function initBackToTopButton() {
  const backToTopBtn = document.getElementById("backToTop");

  if (backToTopBtn) {
    // Show/Hide Back to Top button based on scroll position
    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 300) {
        backToTopBtn.classList.add("active");
      } else {
        backToTopBtn.classList.remove("active");
      }
    });

    // Scroll to top when button is clicked
    backToTopBtn.addEventListener("click", function (e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }
}

/**
 * Initialize Cookie Consent functionality
 */
function initCookieConsent() {
  const cookieConsent = document.getElementById("cookieConsent");
  const cookieAccept = document.getElementById("cookieAccept");

  if (cookieConsent && cookieAccept) {
    // Check if user has already accepted cookies
    if (!localStorage.getItem("cookiesAccepted")) {
      // Show cookie consent banner
      cookieConsent.style.display = "block";

      // Handle accept button click
      cookieAccept.addEventListener("click", function () {
        localStorage.setItem("cookiesAccepted", true);
        cookieConsent.style.display = "none";
      });
    }
  }
}

/**
 * Initialize Header Scroll Effect
 */
function initHeaderScrollEffect() {
  const header = document.querySelector(".main-header");

  if (header) {
    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 100) {
        header.classList.add("header-sticky");
      } else {
        header.classList.remove("header-sticky");
      }
    });
  }
}

/**
 * Initialize Form Validation
 */
function initFormValidation() {
  const forms = document.querySelectorAll(".needs-validation");

  if (forms.length > 0) {
    // Loop over forms and prevent submission if validation fails
    Array.from(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        },
        false
      );
    });
  }
}

/**
 * Initialize Mobile Menu functionality
 */
function initMobileMenu() {
  const mobileMenuToggle = document.querySelector(".navbar-toggler");
  const mobileMenu = document.getElementById("navbarMain");

  if (mobileMenuToggle && mobileMenu) {
    document.addEventListener("click", function (event) {
      const isClickInside =
        mobileMenu.contains(event.target) ||
        mobileMenuToggle.contains(event.target);

      if (!isClickInside && mobileMenu.classList.contains("show")) {
        mobileMenuToggle.classList.add("collapsed");
        mobileMenu.classList.remove("show");
      }
    });
  }
}

/**
 * Initialize Animation on Scroll
 * This requires the AOS library to be included in the HTML
 */
function initAnimationOnScroll() {
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 1000,
      once: true,
    });
  }
}

/**
 * Load Google Maps
 */
function loadGoogleMaps() {
  const mapElement = document.getElementById("contactMap");

  if (mapElement) {
    // Replace with your actual Google Maps API key and coordinates
    const apiKey = "YOUR_GOOGLE_MAPS_API_KEY";
    const lat = 25.6682196;
    const lng = -100.1795323;
    const mapScript = document.createElement("script");

    mapScript.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initGoogleMap`;
    mapScript.async = true;
    mapScript.defer = true;
    document.body.appendChild(mapScript);

    window.initGoogleMap = function () {
      const mapOptions = {
        center: { lat: lat, lng: lng },
        zoom: 15,
        styles: [
          {
            featureType: "all",
            elementType: "geometry.fill",
            stylers: [
              {
                weight: "2.00",
              },
            ],
          },
          {
            featureType: "all",
            elementType: "geometry.stroke",
            stylers: [
              {
                color: "#9c9c9c",
              },
            ],
          },
          {
            featureType: "all",
            elementType: "labels.text",
            stylers: [
              {
                visibility: "on",
              },
            ],
          },
          {
            featureType: "landscape",
            elementType: "all",
            stylers: [
              {
                color: "#f2f2f2",
              },
            ],
          },
          {
            featureType: "landscape",
            elementType: "geometry.fill",
            stylers: [
              {
                color: "#ffffff",
              },
            ],
          },
          {
            featureType: "landscape.man_made",
            elementType: "geometry.fill",
            stylers: [
              {
                color: "#ffffff",
              },
            ],
          },
          {
            featureType: "poi",
            elementType: "all",
            stylers: [
              {
                visibility: "off",
              },
            ],
          },
          {
            featureType: "road",
            elementType: "all",
            stylers: [
              {
                saturation: -100,
              },
              {
                lightness: 45,
              },
            ],
          },
          {
            featureType: "road",
            elementType: "geometry.fill",
            stylers: [
              {
                color: "#eeeeee",
              },
            ],
          },
          {
            featureType: "road",
            elementType: "labels.text.fill",
            stylers: [
              {
                color: "#7b7b7b",
              },
            ],
          },
          {
            featureType: "road",
            elementType: "labels.text.stroke",
            stylers: [
              {
                color: "#ffffff",
              },
            ],
          },
          {
            featureType: "road.highway",
            elementType: "all",
            stylers: [
              {
                visibility: "simplified",
              },
            ],
          },
          {
            featureType: "road.arterial",
            elementType: "labels.icon",
            stylers: [
              {
                visibility: "off",
              },
            ],
          },
          {
            featureType: "transit",
            elementType: "all",
            stylers: [
              {
                visibility: "off",
              },
            ],
          },
          {
            featureType: "water",
            elementType: "all",
            stylers: [
              {
                color: "#46bcec",
              },
              {
                visibility: "on",
              },
            ],
          },
          {
            featureType: "water",
            elementType: "geometry.fill",
            stylers: [
              {
                color: "#c8d7d4",
              },
            ],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [
              {
                color: "#070707",
              },
            ],
          },
          {
            featureType: "water",
            elementType: "labels.text.stroke",
            stylers: [
              {
                color: "#ffffff",
              },
            ],
          },
        ],
      };

      const map = new google.maps.Map(mapElement, mapOptions);

      const marker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
        title: "Sepstar México",
        icon: {
          url: "/img/map-marker.png",
          scaledSize: new google.maps.Size(40, 40),
        },
      });

      const infoWindow = new google.maps.InfoWindow({
        content: `
                    <div class="map-info-window">
                        <h5>Sepstar México</h5>
                        <p>No. 1, Science and Technology 7th road, Monterrey, Nuevo León, México</p>
                        <a href="https://maps.google.com?daddr=${lat},${lng}" target="_blank">Obtener dirección</a>
                    </div>
                `,
      });

      marker.addListener("click", function () {
        infoWindow.open(map, marker);
      });
    };
  }
}

/**
 * Initialize Certificates Swiper Carousel
 */
function initCertificatesSwiper() {
  if (document.querySelector(".certificates-swiper")) {
    const certificatesSwiper = new Swiper(".certificates-swiper", {
      // Basic settings
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      centeredSlides: false,

      // Autoplay
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },

      // Responsive breakpoints
      breakpoints: {
        576: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
      },

      // Navigation
      navigation: {
        nextEl: ".certificates-next",
        prevEl: ".certificates-prev",
      },

      // Pagination
      pagination: {
        el: ".certificates-pagination",
        clickable: true,
        dynamicBullets: true,
      },

      // Effects
      effect: "slide",
      speed: 600,

      // Accessibility
      a11y: {
        enabled: true,
        prevSlideMessage: "Certificado anterior",
        nextSlideMessage: "Siguiente certificado",
      },

      // Grab cursor
      grabCursor: true,

      // Events
      on: {
        init: function () {
          console.log("Certificates Swiper initialized");
        },
        slideChange: function () {
          // Add any slide change logic here
        },
      },
    });
  }
}

/**
 * Product Filter functionality
 */
function filterProducts(category) {
  const productItems = document.querySelectorAll(".product-item");
  const filterBtns = document.querySelectorAll(".product-filter-btn");

  // Update active filter button
  filterBtns.forEach((btn) => {
    if (btn.getAttribute("data-filter") === category) {
      btn.classList.add("active");
    } else {
      btn.classList.remove("active");
    }
  });

  // Filter products
  productItems.forEach((item) => {
    const itemCategory = item.getAttribute("data-category");

    if (category === "all" || itemCategory === category) {
      item.style.display = "block";
      setTimeout(() => {
        item.classList.add("show");
      }, 50);
    } else {
      item.classList.remove("show");
      setTimeout(() => {
        item.style.display = "none";
      }, 300);
    }
  });
}

/**
 * Function to handle language switching
 */
function switchLanguage(lang) {
  const currentUrl = window.location.href;
  const newUrl = updateQueryStringParameter(currentUrl, "lang", lang);
  window.location.href = newUrl;
}

/**
 * Helper function to update a query string parameter
 */
function updateQueryStringParameter(uri, key, value) {
  const re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  const separator = uri.indexOf("?") !== -1 ? "&" : "?";

  if (uri.match(re)) {
    return uri.replace(re, "$1" + key + "=" + value + "$2");
  } else {
    return uri + separator + key + "=" + value;
  }
}
