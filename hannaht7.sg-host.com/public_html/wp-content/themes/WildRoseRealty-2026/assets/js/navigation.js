/**
 * WildRose Realty - Navigation
 */

(function($) {
    'use strict';

    /**
     * Handle submenu interactions
     */
    function initSubmenus() {
        var navItems = $('.navbar-nav li');

        navItems.each(function() {
            var item = $(this);
            var submenu = item.find('> .sub-menu');

            if (submenu.length) {
                // Add menu indicator
                item.find('> a').append('<span class="submenu-indicator" style="margin-left: 5px;">▼</span>');

                // Mobile - toggle submenu on click
                if ($(window).width() <= 768) {
                    item.find('> a').on('click', function(e) {
                        if (submenu.css('max-height') === '0px' || submenu.css('max-height') === 'none') {
                            e.preventDefault();
                            item.toggleClass('active');
                            submenu.toggleClass('active');
                        }
                    });
                }
            }
        });
    }

    /**
     * Close submenus on mobile when link is clicked
     */
    function closeSubmenus() {
        $('.navbar-nav a:not(:has(+ .sub-menu))').on('click', function() {
            $('.navbar-nav li').removeClass('active');
            $('.navbar-nav .sub-menu').removeClass('active');
        });
    }

    /**
     * Initialize
     */
    $(document).ready(function() {
        initSubmenus();
        closeSubmenus();
    });

})(jQuery);
