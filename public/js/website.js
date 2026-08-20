(function() {
    "use strict";

    /**
     * Preloader
     */
    const preloader = document.querySelector('#preloader');
    if (preloader) {
        window.addEventListener('load', function() {
            // Add fade-out class after page loads
            preloader.classList.add('fade-out');
            // Remove preloader from DOM after animation completes
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 800);
        });
    }

    /**
     * Apply .scrolled class to the body as the page is scrolled down
     */
    function toggleScrolled() {
        const selectBody = document.querySelector('body');
        const selectHeader = document.querySelector('#header');
        if (!selectHeader) return;
        if (!selectHeader.classList.contains('scroll-up-sticky') && 
            !selectHeader.classList.contains('sticky-top') && 
            !selectHeader.classList.contains('fixed-top')) return;
        window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
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
     * Hide mobile nav on same-page/hash links
     */
    document.querySelectorAll('#navmenu a').forEach(function(navmenu) {
        navmenu.addEventListener('click', function() {
            if (document.querySelector('.mobile-nav-active')) {
                mobileNavToggle();
            }
        });
    });

    /**
     * Toggle mobile nav dropdowns
     */
    document.querySelectorAll('.navmenu .toggle-dropdown').forEach(function(navmenu) {
        navmenu.addEventListener('click', function(e) {
            e.preventDefault();
            this.parentNode.classList.toggle('active');
            this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
            e.stopImmediatePropagation();
        });
    });

    /**
     * Scroll top button
     */
    let scrollTop = document.querySelector('.scroll-top');

    function toggleScrollTop() {
        if (scrollTop) {
            window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
        }
    }

    if (scrollTop) {
        scrollTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);

/**
 * FAQ Toggle Function - Fixed
 */
function toggleFAQ(element) {
    const faqItem = element.closest('.faq-item');
    if (!faqItem) return;
    
    const isActive = faqItem.classList.contains('active');
    
    // Close all other FAQ items
    document.querySelectorAll('.faq-item').forEach(function(item) {
        item.classList.remove('active');
    });
    
    // Toggle the clicked one (open if it was closed)
    if (!isActive) {
        faqItem.classList.add('active');
    }
}

// Also add click listeners for all FAQ headers for redundancy
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.faq-header').forEach(function(header) {
        header.addEventListener('click', function(e) {
            toggleFAQ(this);
        });
    });
});

    /**
     * Animation on scroll function and init
     */
    function aosInit() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 600,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }
    }
    window.addEventListener('load', aosInit);

    /**
     * Initiate Pure Counter
     */
    function initPureCounter() {
        if (typeof PureCounter !== 'undefined') {
            new PureCounter();
        }
    }
    window.addEventListener('load', initPureCounter);

    /**
     * Init swiper sliders
     */
    function initSwiper() {
        if (typeof Swiper !== 'undefined') {
            document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
                let config = JSON.parse(
                    swiperElement.querySelector(".swiper-config").innerHTML.trim()
                );
                new Swiper(swiperElement, config);
            });
        }
    }

    window.addEventListener("load", initSwiper);

    /**
     * Frequently Asked Questions Toggle
     */
    document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle, .faq-item .faq-header').forEach(function(faqItem) {
        faqItem.addEventListener('click', function() {
            this.parentNode.classList.toggle('faq-active');
        });
    });

    /**
     * Navmenu Scrollspy
     */
    let navmenulinks = document.querySelectorAll('.navmenu a');

    function navmenuScrollspy() {
        navmenulinks.forEach(function(navmenulink) {
            if (!navmenulink.hash) return;
            let section = document.querySelector(navmenulink.hash);
            if (!section) return;
            let position = window.scrollY + 200;
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                document.querySelectorAll('.navmenu a.active').forEach(function(link) {
                    link.classList.remove('active');
                });
                navmenulink.classList.add('active');
            } else {
                navmenulink.classList.remove('active');
            }
        });
    }
    window.addEventListener('load', navmenuScrollspy);
    document.addEventListener('scroll', navmenuScrollspy);

    /**
     * Dropdown hover for desktop
     */
    if (window.innerWidth >= 1200) {
        document.querySelectorAll('.navmenu .dropdown').forEach(function(dropdown) {
            dropdown.addEventListener('mouseenter', function() {
                this.querySelector('ul').style.opacity = '1';
                this.querySelector('ul').style.visibility = 'visible';
                this.querySelector('ul').style.top = '100%';
            });
            dropdown.addEventListener('mouseleave', function() {
                this.querySelector('ul').style.opacity = '0';
                this.querySelector('ul').style.visibility = 'hidden';
                this.querySelector('ul').style.top = '130%';
            });
        });
    }

})();