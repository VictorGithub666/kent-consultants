/**
 * Kent Consultants Ltd — Design 2 JS
 * Adapted from Selecao Bootstrap Template
 */

(function () {
  'use strict';

  /**
   * Toggle .scrolled on body as the page scrolls
   */
  function toggleScrolled() {
    const body   = document.querySelector('body');
    const header = document.querySelector('#header');
    if (!header) return;
    if (!header.classList.contains('scroll-up-sticky') &&
        !header.classList.contains('sticky-top') &&
        !header.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? body.classList.add('scrolled') : body.classList.remove('scrolled');
  }
  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
  function mobileNavToggle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    if (mobileNavToggleBtn) {
      mobileNavToggleBtn.classList.toggle('bi-list');
      mobileNavToggleBtn.classList.toggle('bi-x');
    }
  }
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToggle);
  }

  /**
   * Close mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(function (link) {
    link.addEventListener('click', function () {
      if (document.querySelector('.mobile-nav-active')) mobileNavToggle();
    });
  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(function (el) {
    el.addEventListener('click', function (e) {
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
    window.addEventListener('load', function () {
      preloader.remove();
    });
  }

  /**
   * Scroll-to-top button
   */
  const scrollTopBtn = document.querySelector('.scroll-top');
  function toggleScrollTop() {
    if (scrollTopBtn) {
      window.scrollY > 100 ? scrollTopBtn.classList.add('active') : scrollTopBtn.classList.remove('active');
    }
  }
  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * AOS init
   */
  function aosInit() {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 700,
        easing:   'ease-out-cubic',
        once:     true,
        mirror:   false,
        offset:   80
      });
    }
  }
  window.addEventListener('load', aosInit);

  /**
   * GLightbox
   */
  window.addEventListener('load', function () {
    if (typeof GLightbox !== 'undefined') {
      GLightbox({ selector: '.glightbox' });
    }
  });

  /**
   * Isotope layout + filters
   */
  window.addEventListener('load', function () {
    if (typeof Isotope === 'undefined' || typeof imagesLoaded === 'undefined') return;

    document.querySelectorAll('.isotope-layout').forEach(function (isotopeItem) {
      const layout = isotopeItem.getAttribute('data-layout') || 'masonry';
      const filter = isotopeItem.getAttribute('data-default-filter') || '*';
      const sort   = isotopeItem.getAttribute('data-sort') || 'original-order';
      let initIsotope;

      imagesLoaded(isotopeItem.querySelector('.isotope-container'), function () {
        initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
          itemSelector: '.isotope-item',
          layoutMode:   layout,
          filter:       filter,
          sortBy:       sort
        });
      });

      isotopeItem.querySelectorAll('.isotope-filters li').forEach(function (filterBtn) {
        filterBtn.addEventListener('click', function () {
          isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
          this.classList.add('filter-active');
          initIsotope.arrange({ filter: this.getAttribute('data-filter') });
          aosInit();
        });
      });
    });
  });

  /**
   * Swiper sliders
   */
  function initSwiper() {
    if (typeof Swiper === 'undefined') return;
    document.querySelectorAll('.init-swiper').forEach(function (el) {
      const config = JSON.parse(el.querySelector('.swiper-config').innerHTML.trim());
      new Swiper(el, config);
    });
  }
  window.addEventListener('load', initSwiper);

  /**
   * Hash-link scroll correction on page load
   */
  window.addEventListener('load', function () {
    if (window.location.hash && document.querySelector(window.location.hash)) {
      setTimeout(function () {
        const section = document.querySelector(window.location.hash);
        const scrollMarginTop = parseInt(getComputedStyle(section).scrollMarginTop || 0);
        window.scrollTo({ top: section.offsetTop - scrollMarginTop, behavior: 'smooth' });
      }, 100);
    }
  });

  /**
   * Navmenu scrollspy
   */
  const navmenuLinks = document.querySelectorAll('.navmenu a');
  function navmenuScrollspy() {
    navmenuLinks.forEach(function (link) {
      if (!link.hash) return;
      const section = document.querySelector(link.hash);
      if (!section) return;
      const position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= section.offsetTop + section.offsetHeight) {
        document.querySelectorAll('.navmenu a.active').forEach(function (l) { l.classList.remove('active'); });
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();
