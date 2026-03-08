/**
 * WildRose Realty - Main JavaScript
 */

(function($) {
    'use strict';

    /**
     * Mobile Navigation Toggle
     */
    function initMobileNavigation() {
        var toggle = $('#navbar-toggle');
        var menu = $('.navbar-menu');

        toggle.on('click', function(e) {
            e.preventDefault();
            menu.toggleClass('active');
            toggle.attr('aria-expanded', menu.hasClass('active'));
        });

        // Close menu when clicking on a link
        menu.find('a').on('click', function() {
            menu.removeClass('active');
            toggle.attr('aria-expanded', 'false');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.navbar, .navbar-toggle').length) {
                menu.removeClass('active');
                toggle.attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            var href = $(this).attr('href');
            var target = $(href);

            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 300);
            }
        });
    }

    /**
     * Property Filter
     */
    function initPropertyFilter() {
        var filterForm = $('.property-search');
        
        if (filterForm.length) {
            filterForm.on('change', 'select', function() {
                // Auto-submit form on select change
                // filterForm.submit();
            });
        }
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img.lazy').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Animate on Scroll
     */
    function initAnimateOnScroll() {
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('[data-animate]').forEach(function(el) {
                observer.observe(el);
            });
        }
    }

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        initMobileNavigation();
        initSmoothScroll();
        initPropertyFilter();
        initLazyLoad();
        initAnimateOnScroll();
    });

})(jQuery);
