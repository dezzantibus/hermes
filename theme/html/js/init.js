/*==============================================================================
    Responsive navigation
===============================================================================*/
function setupMenu($menu) {
    $menu.each(function() {
        var mobileMenu = $(this).clone();
        var mobileMenuWrap = $('<div></div>').append(mobileMenu);
        mobileMenuWrap.attr('class', "open-close-wrapper");
        $(this).parent().append(mobileMenuWrap);
        mobileMenu.attr('class', 'menu-mobile');
    });
}
function setupMobileMenu() {
    $(".inner-wrapper").each(function() {
        var clickTopOpenMenu = $(this).find(".click-to-open-menu");
        clickTopOpenMenu.click(function() {
            $(this).parent().find('.open-close-wrapper').slideToggle("fast");
        });
    });
}



jQuery(document).ready(function($) {
    'use strict';
    
    // Mobile menu
    setupMenu($('ul.main-menu'));
    setupMenu($('ul.top-menu'));
    setupMobileMenu();
    
    // Sticky navigation
    jQuery(".primary-menu.sticky-menu").fixTo('body');

    // Tabs
    jQuery(".tabs").tabs();
    
    // Accordion
    jQuery(".accordion").accordion({collapsible: true, heightStyle: "content"});
    
    // Flexslider
    jQuery(".flexslider").flexslider({animation: "fade",controlNav: false});
    
    // Gallery slider
    jQuery(".gallery-single").flexslider({smoothHeight : true, controlNav: "thumbnails"});
    
    // Fitvids
    jQuery("body").fitVids();
    
    // Price filter
    jQuery(".price_slider_wrapper").slider({
        range: true,
        min: 0,
        max: 300,
        values: [0, 300],
        slide: function(event, ui) {
            $(".price_label").text("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
        }
    });
    jQuery('span.from').text("$" + $(".price_slider_wrapper").slider("values", 0));
    jQuery('span.to').text("$" + $(".price_slider_wrapper").slider("values", 1));
    
    // Isotope filters
    // Filter items when filter link is clicked
    $('.gallery-filter a').click(function() {
        var selector = $(this).attr('data-filter');
        $('.gallery-filter a').removeClass('selected-gallery-filter');
        $(this).addClass('selected-gallery-filter');
        $container.isotope({filter: selector});
        return false;
    });
    
    // Portfolio container
    var $container = $('.gallery-content');
    $container.imagesLoaded(function() {
        $container.isotope({
            layoutMode: 'fitRows'
        });
    });
    

});