/**
* Template Name: Medilab
* Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";


  // Script de validation de formulaire en temps réel avec messages d'erreur en français
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  
  // Créer le style de validation
  const style = document.createElement('style');
  style.textContent = `
    .input-error {
      border-color: #dc3545 !important;
      box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
    }
    .error-message {
      color: #dc3545;
      font-size: 0.8rem;
      margin-top: 5px;
      display: block;
      animation: fadeIn 0.3s;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-5px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    .floating-label .error-message {
      position: absolute;
      bottom: -20px;
      left: 10px;
    }
    .invalid-feedback-checkbox {
      margin-left: 2rem;
      color: #dc3545;
      font-size: 0.8rem;
      display: block;
      animation: fadeIn 0.3s;
    }
  `;
  document.head.appendChild(style);

  // Messages de validation en français
  const validationMessages = {
    required: "Ce champ est obligatoire",
    email: "Veuillez entrer une adresse email valide",
    phone: "Veuillez entrer un numéro de téléphone valide",
    website: "Veuillez entrer une URL valide (avec http:// ou https://)",
    number: "Veuillez entrer un nombre valide",
    min: "La valeur doit être d'au moins {min}",
    maxLength: "Ce champ ne peut pas dépasser {max} caractères",
    checkbox: "Cette option est obligatoire",
    select: "Veuillez sélectionner une option"
  };

  // Valider un champ individuel
  function validateField(field) {
    let isValid = true;
    let errorMessage = '';

    // Supprimer les styles d'erreur et messages précédents
    field.classList.remove('input-error');
    const existingError = field.parentElement.querySelector('.error-message');
    if (existingError) {
      existingError.remove();
    }
    // Pour les checkboxes
    const existingCheckboxError = field.parentElement.querySelector('.invalid-feedback-checkbox');
    if (existingCheckboxError) {
      existingCheckboxError.remove();
    }

    // Vérifier si le champ est obligatoire et vide
    if (field.required) {
      if (field.type === 'checkbox' && !field.checked) {
        isValid = false;
        errorMessage = validationMessages.checkbox;
      } else if (field.type !== 'checkbox' && !field.value.trim()) {
        isValid = false;
        errorMessage = validationMessages.required;
      }
    }

    // Validation du format d'email
    if (field.type === 'email' && field.value.trim()) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(field.value)) {
        isValid = false;
        errorMessage = validationMessages.email;
      }
    } 
    // Validation du téléphone
    else if ((field.type === 'tel' || field.id.includes('phone') || field.id.includes('mobile')) && field.value.trim()) {
      const phoneRegex = /^[+]?[(]?[0-9]{1,4}[)]?[-\s.]?[0-9]{1,4}[-\s.]?[0-9]{1,9}$/;
      if (!phoneRegex.test(field.value)) {
        isValid = false;
        errorMessage = validationMessages.phone;
      }
    } 
    // Validation de site web
    else if (field.type === 'url' && field.value.trim()) {
      const urlRegex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/;
      if (!urlRegex.test(field.value)) {
        isValid = false;
        errorMessage = validationMessages.website;
      }
    } 
    // Validation de nombre
    else if (field.type === 'number' && field.value.trim()) {
      if (isNaN(Number(field.value))) {
        isValid = false;
        errorMessage = validationMessages.number;
      }
      if (field.min && Number(field.value) < Number(field.min)) {
        isValid = false;
        errorMessage = validationMessages.min.replace('{min}', field.min);
      }
    }
    // Validation de longueur maximale pour le nom du stand
    else if (field.id === 'stand_name' && field.value.length > 20) {
      isValid = false;
      errorMessage = validationMessages.maxLength.replace('{max}', '20');
    }
    // Validation des champs select
    else if (field.tagName === 'SELECT' && field.required && !field.value) {
      isValid = false;
      errorMessage = validationMessages.select;
    }

    // Afficher l'erreur si la validation a échoué
    if (!isValid) {
      field.classList.add('input-error');
      
      if (field.type === 'checkbox') {
        // Pour les checkboxes, afficher le message différemment
        const errorSpan = document.createElement('span');
        errorSpan.className = 'invalid-feedback-checkbox';
        errorSpan.textContent = errorMessage;
        field.parentElement.appendChild(errorSpan);
      } else {
        // Pour les autres champs
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error-message';
        errorSpan.textContent = errorMessage;
        field.parentElement.appendChild(errorSpan);
      }
    }

    return isValid;
  }

  // Valider tous les champs lors de la soumission du formulaire
  form.addEventListener('submit', function(event) {
    let formValid = true;
    
    // Valider tous les champs de saisie
    const fields = form.querySelectorAll('input, select, textarea');
    fields.forEach(field => {
      // Ignorer les champs cachés et les checkbox non requis
      if (field.type === 'hidden' || 
          (field.type === 'checkbox' && !field.required) ||
          field.style.display === 'none') {
        return;
      }
      
      if (!validateField(field)) {
        formValid = false;
      }
    });

    // Vérifier la case à cocher d'électricité obligatoire
    const electricityCheckbox = document.getElementById('electricity_required');
    if (!electricityCheckbox.checked) {
      formValid = false;
      electricityCheckbox.classList.add('input-error');
      const existingError = electricityCheckbox.parentElement.querySelector('.invalid-feedback-checkbox');
      if (existingError) {
        existingError.remove();
      }
      const errorSpan = document.createElement('span');
      errorSpan.className = 'invalid-feedback-checkbox';
      errorSpan.textContent = "L'électricité est obligatoire";
      electricityCheckbox.parentElement.appendChild(errorSpan);
    }

    // Validation spéciale pour la superficie du stand
    const area = document.getElementById('area');
    if (!area.value || area.value <= 0) {
      formValid = false;
      area.classList.add('input-error');
      const existingError = area.parentElement.querySelector('.error-message');
      if (existingError) {
        existingError.remove();
      }
      const errorSpan = document.createElement('span');
      errorSpan.className = 'error-message';
      errorSpan.textContent = "Veuillez entrer une superficie valide";
      area.parentElement.appendChild(errorSpan);
    }

    // Empêcher la soumission du formulaire en cas d'échec de validation
    if (!formValid) {
      event.preventDefault();
      
      // Afficher un avertissement général
      const warningAlert = document.createElement('div');
      warningAlert.className = 'alert alert-danger text-center mt-3';
      warningAlert.style.animation = 'shake 0.5s';
      warningAlert.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Veuillez corriger les erreurs dans le formulaire';
      
      // Insérer en haut du formulaire
      form.insertBefore(warningAlert, form.firstChild);
      
      // Défiler jusqu'à la première erreur
      const firstError = document.querySelector('.input-error');
      if (firstError) {
        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
      
      // Supprimer l'alerte après 5 secondes
      setTimeout(() => {
        warningAlert.remove();
      }, 5000);
    }
  });

  // Validation en temps réel pour tous les champs
  const fields = form.querySelectorAll('input:not([type="hidden"]), select, textarea');
  
  fields.forEach(field => {
    // Validation lors de la perte de focus (blur)
    field.addEventListener('blur', function() {
      validateField(field);
    });
    
    // Validation en temps réel lors de la saisie
    if (field.type === 'text' || field.type === 'email' || field.type === 'tel' || 
        field.type === 'url' || field.type === 'number' || field.tagName === 'TEXTAREA') {
      field.addEventListener('input', function() {
        // Si le champ est obligatoire et a été touché (n'est pas vide puis devient vide)
        if (field.required && field.value.trim() === '') {
          validateField(field);
        } else if (field.classList.contains('input-error')) {
          // Re-valider pour enlever l'erreur si elle est corrigée
          validateField(field);
        }
      });
    }
    
    // Validation en temps réel pour les select
    if (field.tagName === 'SELECT') {
      field.addEventListener('change', function() {
        validateField(field);
      });
    }
    
    // Validation en temps réel pour les checkboxes
    if (field.type === 'checkbox') {
      field.addEventListener('change', function() {
        validateField(field);
      });
    }
  });

  // Gestion spéciale pour le champ secteur "Autre"
  const activitySector = document.getElementById('activity_sector');
  const otherSector = document.getElementById('other_activity_sector');
  
  activitySector.addEventListener('change', function() {
    if (this.value === 'Autre') {
      otherSector.style.display = 'block';
      otherSector.required = true;
      // Valider immédiatement le champ si nécessaire
      validateField(otherSector);
    } else {
      otherSector.style.display = 'none';
      otherSector.required = false;
      // Effacer les erreurs sur le champ autre
      otherSector.classList.remove('input-error');
      const existingError = otherSector.parentElement.querySelector('.error-message');
      if (existingError) {
        existingError.remove();
      }
    }
  });
});

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();



$(document).ready(function () {
  $('.gallery-slider').slick({
    slidesToShow: 4, // ✅ Affiche 4 images par défaut
    slidesToScroll: 1,
    dots: true,       // ✅ Pagination
    arrows: true,     // ✅ Flèches navigation
    infinite: true,   // ✅ Loop infini
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3 // Pour écrans ≤1200px
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2 // Pour écrans ≤992px
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1 // Pour petits écrans
        }
      }
    ]
  });
});