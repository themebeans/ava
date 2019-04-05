/**
 * Theme javascript functions file.
 *
 */
( function( $ ) {
    "use strict";

    var
    body            = $("body"),
    searchTrigger   = $(".site-search-btn"),
    searchWrapper   = $("#site-search"),
    mobileNav       = $("#mobile-navigation"),
    infiniteNav     = $("#infinite-navigation"),
    infiniteNavA    = $("#infinite-navigation a"),
    hfeed           = $("#hfeed.masonry.posts"),
    hfeedProjects   = $("#hfeed.masonry.projects"),
    hfeedShop       = $("#hfeed.product-grid"),
    enter           = ("js--enter"),
    active          = ("js--active");

    /**
     * Test if inline SVGs are supported.
     * @link https://github.com/Modernizr/Modernizr/
     */
    function supportsInlineSVG() {
        var div = document.createElement( 'div' );
        div.innerHTML = '<svg/>';
        return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
    }

    /* Header searching */
    function headerSearch() {
        searchTrigger.on("click", function(e) {
            e.preventDefault();
            body.toggleClass( 'js--searching' );
            $('.site-search-btn').toggleClass( active );
            searchWrapper.toggleClass( active );
            searchWrapper.find('.search-field').focus();
        });
    }

    /* Header searching */
   function blog_progress() {
        var s = $(window).scrollTop(),
            d = $(document).height(),
            c = $(window).height(),
            scrollPercent = (s / (d-c)) * 100;
        var position = scrollPercent;

        $('.site-minibar__progress').css('width', position + '%');
    }

    /* Site Minibar Headroom */
    $("#site-minibar").headroom( {
        "offset": 100,
        "tolerance": 10,
        classes : {
            // when element is initialised
            initial : "site-minibar--js",
            // when scrolling up
            pinned : "site-minibar--pinned",
            // when scrolling down
            unpinned : "site-minibar--unpinned",
            // when above offset
            top : "site-minibar--top",
            // when below offset
            notTop : "site-minibar--not-top"
        },
    });

    /* Shop Minibar Headroom */
    $("#shop-minibar").headroom( {
        "offset": 50,
        "tolerance": 10,
        classes : {
            // when element is initialised
            initial : "shop-minibar--js",
            // when scrolling up
            pinned : "shop-minibar--pinned",
            // when scrolling down
            unpinned : "shop-minibar--unpinned",
            // when above offset
            top : "shop-minibar--top",
            // when below offset
            notTop : "shop-minibar--not-top"
        },
    });

    /* Category Filter on Shop */
    function sticky_shop_filter() {

        var
        $window = $(window),
        footerHeight = $('#site-footer').outerHeight(),
        minibarHeight = $('#shop-minibar').outerHeight(),
        stickyLimit = minibarHeight + footerHeight;

        // if($window.width() > 921 ) {

            // if( body.is('.post-type-archive-product') ) {
                $('.product-filter').sticky({
                    topSpacing: minibarHeight + 30,
                    bottomSpacing: footerHeight,
                    responsiveBreakpoint: 900
                });
            // }
        // }
    }

    /* Category Filter on Shop */
    function sticky_shop_checkout() {

        var
        $window = $(window),
        footerHeight = $('#site-footer').outerHeight(),
        minibarHeight = $('#site-colophon').outerHeight(),
        stickyLimit = minibarHeight + footerHeight;

        // if($window.width() > 921 ) {

            // if( body.is('.post-type-archive-product') ) {
                $('.woocommerce-checkout-review-order').sticky({
                    // topSpacing: minibarHeight + 30,
                    bottomSpacing: stickyLimit,
                    responsiveBreakpoint: 900
                });
            // }
        // }
    }




    /* WooCommerce Infinite Scrolling */
    function woocommerce_infscr()  {
        if ( hfeedShop.length > 0 ) {

            hfeedShop.infinitescroll({
                navSelector  : infiniteNavA,
                nextSelector : infiniteNavA,
                itemSelector : 'article',
            },

            function( newElements ) {
                $('#infscr-loading').remove();

                $(newElements).addClass('animate');

                $(newElements).each(function(a) {

                    setTimeout(function() {
                        $(newElements).eq(a).addClass('animated');
                    }, 160 * a);
                });
            });

            $(window).unbind('.infscr');

            infiniteNavA.click(function(){

                setTimeout(function() {
                    hfeedShop.infinitescroll('retrieve');
                    hfeedShop.find("article").removeClass('article--opacity');
                }, 800);

                infiniteNav.addClass('loading');

                setTimeout(function() {
                   infiniteNav.addClass('js--opacity-zero');
                }, 800);

                setTimeout(function() {
                    infiniteNav.removeClass("loading");
                    infiniteNav.removeClass("js--opacity-zero");
                }, 2000);

                return false;

            });

            $(document).ajaxError(function(e,xhr,opt) {
                if(xhr.status==404)
                  infiniteNav.remove();
            });

        }
    }

    /* Dropdowns */
    function dropdowns() {
        var $window = $(window);
        if($window.width() > 768 ) {
           $('.main-navigation:not(.flyout) ul').superfish({
                animation: { height:'show', opacity:'show' },
                delay: 200,
                cssArrows: false,
                disableHI: false,
                speed: 'fast',
            });
        }
    }

    function scrollingDiv() {
        var
        $window = $(window),
        windowHeight    = $(window).height(),
        sidebarSection  = $(".sidebar--section"),
        scroll          = ("js--scroll");

        if($window.width() > 768) {
            sidebarSection.children().each(function(){
                if ( windowHeight < $(this).innerHeight() ) {
                    $(this).parent().addClass(scroll);
                } else {
                    $(this).parent().removeClass(scroll);
                }
            });
        }
    }

    function mobile_dropdowns() {
        var navigationHolder = $('.mobile-navigation');
        var dropdownOpener = $('.mobile-navigation .mobile-navigation--arrow, .mobile-navigation h6, .mobile-navigation a.ava-mobile-no-link');
        var animationSpeed = 200;

        if(dropdownOpener.length) {
            dropdownOpener.each(function() {
                $(this).on('tap click', function(e) {
                    var dropdownToOpen = $(this).nextAll('ul').first();

                    if(dropdownToOpen.length) {
                        e.preventDefault();
                        e.stopPropagation();

                        var openerParent = $(this).parent('li');
                        if(dropdownToOpen.is(':visible')) {
                            dropdownToOpen.slideUp(animationSpeed);
                            openerParent.removeClass('ava-opened');
                        } else {
                            dropdownToOpen.slideDown(animationSpeed);
                            openerParent.addClass('ava-opened');
                        }
                    }

                });
            });
        }
    }

    $( document ).ready(function() {

        scrollingDiv();

        headerSearch();

        woocommerce_infscr();

        dropdowns();

        sticky_shop_filter();

        sticky_shop_checkout();

        mobile_dropdowns();

        if ( true === supportsInlineSVG() ) {
            document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
        }

        if( body.hasClass('single-post') ) {
            $('#respond #comment, #respond #email, #respond #author, #respond #submit').bind('focus blur', function () {
                $('.comment-form').toggleClass('js--focus');
                $('.comment-form-author').toggleClass('js--focus');
                $('.comment-form-email').toggleClass('js--focus');
                $('#respond .form-submit').toggleClass('js--focus');
            });

            $('#commentform textarea#comment').attr('placeholder', ava_translation.ava_comment );
        }

        $('#commentform input#author').attr('placeholder', ava_translation.ava_author);
        $('#commentform input#email').attr('placeholder', ava_translation.ava_email);

        $('#shop-minibar #woocommerce-product-search-field').bind('focus blur', function () {
            $(this).closest('.woocommerce-product-search').toggleClass('js--focus');
        });

        $('.ava-cart-panel-summary .checkout').on('click', function(e){
            body.removeClass('widget-panel-open');
        });

        $('.woocommerce-reviews-trigger-wrapper').on('click', function(e){

            var
            drawer = $('.drawer'),
            sectionFaq = $('#reviews'),
            faqContent = $('.reviews__inner').height();

            if( sectionFaq.hasClass('js-open') ) {
                sectionFaq.css('height',0);
            } else {
                sectionFaq.css('height',faqContent);
            }

            e.preventDefault();
            sectionFaq.toggleClass('js-open');
            $('.woocommerce-reviews-trigger-wrapper').toggleClass('js-open');

        });

        $('.woocommerce-attributes-trigger-wrapper').on('click', function(e){

            var
            drawer = $('.drawer'),
            sectionFaq = $('#attributes'),
            faqContent = $('.attributes__inner').height();

            if( sectionFaq.hasClass('js-open') ) {
                sectionFaq.css('height',0);
            } else {
                sectionFaq.css('height',faqContent);
            }

            e.preventDefault();
            sectionFaq.toggleClass('js-open');
            $('.woocommerce-attributes-trigger-wrapper').toggleClass('js-open');

        });

        /* Enable menu toggle for small screens */
        $( '.menu-toggle' ).on( 'click', function() {
            body.toggleClass( 'js--opennav' );
            $(this).toggleClass( active );
        } );

        /* Close the flyout when you click a menu item in the mobile menu */
        $( '.mobile-navigation .menu-item a' ).on( 'click', function() {
            body.removeClass( 'js--opennav' );
        } );

        /* Enable filter toggle for the WooCommerce shop */
        $( '.product-categories-trigger' ).on( 'click', function() {
            $('.widget_product_categories').toggleClass( 'js--open' );
            $(this).toggleClass( active );
        } );

        $( '#nav-close' ).on( 'click', function() {
            body.toggleClass( 'js--opennav' );
            $('.menu-toggle').removeClass( active );
        } );

        $( '#flyout-close-toggle' ).on( 'click', function() {
            body.toggleClass( 'js--opennav' );
            $('.menu-toggle').removeClass( active );
        } );

        $( '.shop-minibar__filter-trigger' ).on( 'click', function() {

            $('.woocommerce .hfeed.product-grid').toggleClass( active );

            $('.woocommerce #infinite-navigation').toggleClass( active );
             $('.woocommerce .page-navigation').toggleClass( active );

            if( ! $('.woocommerce .product-sidebar').hasClass(active) ) {
               $('.woocommerce .product-sidebar').addClass( 'js--animating' );
                setTimeout(function() {
                    $('.woocommerce .product-sidebar').addClass(active);
                }, 400);
            } else {
                $('.woocommerce .product-sidebar').removeClass( active );
                setTimeout(function() {
                    $('.woocommerce .product-sidebar').removeClass('js--animating');
                }, 400);
            }

            $(this).toggleClass( active );
        } );

        $( '.woocommerce-ordering' ).on( 'click', function() {
            $('#shop-minibar').toggleClass( active );
        } );

        $("#orderby").dropkick( { mobile: true} );

        infiniteNavA.each(function(){
          $(this).html($(this).text().replace(/(\w|\.)/g, "<span>$&</span>"));
        });

        /* Fitvids */
        $("body").fitVids();

    });

    /* Resize functions */
    $(window).resize(function(){
        scrollingDiv();
        dropdowns();
    });

    /* Scroll functions */
    $(window).scroll(function(){
        blog_progress();
    });

} )( jQuery );