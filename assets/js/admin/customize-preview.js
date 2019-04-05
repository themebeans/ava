/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. This javascript will grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */

( function( $ ) {

	wp.customize( 'shop_layout_columns_gutter', function( value ) {
        value.bind( function( newval ) {
            var style, el, large ;

           	large_50 		= newval * .50;
           	large_33      	= newval * .666666666;
   			large_25      	= newval * .75;
   			large_20 		= newval * .80;
           	large_16      	= newval * .84;
   			large_14      	= newval * .86;

            large = '@media only screen and (min-width: 769px) {body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product {width: calc( 50% - '+ large_50 +'px ); margin-right: '+ newval +'px; margin-bottom: '+ newval +'px; } }';
            large_1100 = '@media only screen and (min-width: 1100px) { body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product { width: calc( 33.33333333333333% - '+ large_33 +'px ); margin-right: '+ newval +'px; margin-bottom: '+ newval +'px; } body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n) { margin-right: '+ newval +'px; } body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(3n) { margin-right: 0 !important; } }';
            large_1400 = '@media only screen and (min-width: 1400px) { body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(3n) { width: calc( 25% - '+ large_25 +'px ); margin-right: '+ newval +'px !important; } body[data-shop-columns-size="large"] .product-grid.product-grid__columns .product:nth-child(4n) { margin-right: 0 !important; } }';

            small_769 = '@media only screen and (min-width: 769px) { body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product { width: calc( 33.33333333333333% - '+ large_33 +'px ); } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n) { margin-right: 0; } }';
            small_900 = '@media only screen and (min-width: 900px) { body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product { width: calc( 25% - '+ large_25 +'px ); } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n) { margin-right: 0; } }';
            small_1100 = '@media only screen and (min-width: 1100px) { body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product { width: calc( 20% - '+ large_20 +'px ); } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n + 3), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 4), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n) { margin-right: 0; } }';
            small_1500 = '@media only screen and (min-width: 1500px) { body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product { width: calc( 16.6666666667% - '+ large_16 +'px ); } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n + 3), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 4), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n + 4), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 5), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(6n) { margin-right: 0; } }';
            small_1900 = '@media only screen and (min-width: 1900px) { body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product { width: calc( 14.2857142857% - '+ large_14 +'px ); } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(3n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n + 3), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 4), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(4n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n + 4), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 5), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(5n), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(6n + 5), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(-n + 6), body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(6n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="small"] .product-grid.product-grid__columns .product:nth-child(7n) { margin-right: 0; } }';

           	medium_900 = '@media only screen and (min-width: 900px) { body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product { width: calc( 33.33333333333333% - '+ large_33 +'px ); } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n) { margin-right: 0; } }';
            medium_1400 = '@media only screen and (min-width: 1400px) { body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product { width: calc( 25% - '+ large_25 +'px ); } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n) { margin-right: 0; } }';
            medium_1800 = '@media only screen and (min-width: 1800px) { body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product { width: calc( 20% - '+ large_20 +'px ); } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n + 3), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 4), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n) { margin-right: 0; } }';
           	medium_2300 = '@media only screen and (min-width: 2300px) { body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product { width: calc( 16.6666666667% - '+ large_16 +'px ); } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n + 3), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 4), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n + 4), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 5), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n) { margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(6n) { margin-right: 0; } }';
           	medium_2700 = '@media only screen and (min-width: 2700px) { body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product { width: calc( 14.2857142857% - '+ large_14 +'px ); } body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n + 1), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(2n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n + 2), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 3), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(3n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n + 3), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 4), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(4n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n + 4), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 5), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(5n), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(6n + 5), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(-n + 6), body[data-shop-columns-size="medium"] .product-grid.product-grid__columns .product:nth-child(6n)  margin-bottom: '+ newval +'px; margin-right: '+ newval +'px; }';

            style = '<style class="shop_layout_columns_gutter">'+ large + large_1100 + large_1400 + small_769 + small_900 + small_1100 + small_1500 + small_1900 + medium_900 + medium_1400 + medium_1800 + medium_2300 + medium_2700 +'</style>';

            el =  $( '.shop_layout_columns_gutter' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_gallery_nav_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_gallery_nav_color">body .product-images--dots .flex-control-nav a.flex-active { background-color: ' + newval + '; } body .product-images--circles .flex-control-nav a { box-shadow: inset 0 0 0 2px ' + newval + '; } body .product-images--circles .flex-control-nav a.flex-active { box-shadow: inset 0 0 0 8px ' + newval + '; }  body .product-images--line .flex-control-nav a.flex-active::after { background-color: ' + newval + '; }</style>';

            el =  $( '.singleproduct_gallery_nav_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_gallery_nav', function( value ) {
        value.bind( function( newval ) {
            $( '.single-product .product__inner' ).attr('class', 'product__inner');
            $( '.single-product .product__inner' ).addClass( newval );
        } );
    } );


    wp.customize( 'portfolio_single_navigation', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.project-navigation' ).removeClass( 'hidden' );
            } else {
                $( '.project-navigation' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'global_header_font_style', function( value ) {
        value.bind( function( newval ) {
            $('h1, h2, h3, h4, h5, h6, blockquote, .mobile-navigation a, .site-search-form .search-field, #infinite-navigation a, body .cd-headline i, body .project-caption').css('font-style', newval );
        } );
    } );

    wp.customize( 'global_header_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('h1, h2, h3, h4, h5, h6, blockquote, .mobile-navigation a, .site-search-form .search-field, #infinite-navigation a, body .cd-headline i').css('font-weight', newval );
        } );
    } );

    wp.customize( 'global_header_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="global_header_font_letterspacing">h1, h2, h3, h4, h5, h6, blockquote, .mobile-navigation a, .site-search-form .search-field, #infinite-navigation a, body .cd-headline i { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.global_header_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'global_header_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="global_header_font_transform">h1, h2, h3, h4, h5, h6, blockquote, .mobile-navigation a, .site-search-form .search-field, #infinite-navigation a, body .cd-headline i { text-transform: ' + newval + ';} </style>';

            el =  $( '.global_header_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body .site-footer').css('font-style', newval );
        } );
    } );

    wp.customize( 'footer_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body .site-footer').css('font-weight', newval );
        } );
    } );


    wp.customize( 'footer_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="footer_font_size">body .site-footer { font-size: ' + newval + 'px;} </style>';

            el =  $( '.footer_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="footer_font_letterspacing">body .site-footer { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.footer_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="footer_font_transform">body .site-footer { text-transform: ' + newval + ';} </style>';

            el =  $( '.footer_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_font_lineheight', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="footer_font_lineheight">body .site-footer { line-height: ' + newval + 'px;} </style>';

            el =  $( '.footer_font_lineheight' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );




    wp.customize( 'colophon_menu_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body .site-colophon .main-navigation').css('font-style', newval );
        } );
    } );

    wp.customize( 'colophon_menu_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body .site-colophon .main-navigation').css('font-weight', newval );
        } );
    } );

    wp.customize( 'colophon_menu_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_menu_font_size">body .site-colophon .main-navigation { font-size: ' + newval + 'px;} </style>';

            el =  $( '.colophon_menu_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'colophon_menu_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_menu_font_letterspacing">body .site-colophon .main-navigation { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.colophon_menu_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'colophon_menu_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_menu_font_transform">body .site-colophon .main-navigation { text-transform: ' + newval + ';} </style>';

            el =  $( '.colophon_menu_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );






    wp.customize( 'colophon_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body .site-colophon').css('font-style', newval );
        } );
    } );

    wp.customize( 'colophon_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body .site-colophon').css('font-weight', newval );
        } );
    } );

    wp.customize( 'colophon_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_font_size">body .site-colophon { font-size: ' + newval + 'px;} </style>';

            el =  $( '.colophon_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'colophon_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_font_letterspacing">body .site-colophon { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.colophon_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'colophon_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_font_transform">body .site-colophon { text-transform: ' + newval + ';} </style>';

            el =  $( '.colophon_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'colophon_font_lineheight', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_font_lineheight">body .site-colophon { line-height: ' + newval + 'px;} </style>';

            el =  $( '.colophon_font_lineheight' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );







    wp.customize( 'singleproduct_header_color', function( value ) {
        value.bind( function( newval ) {
            $('body .upsells.products h2, body .related.products h2, body #woocommerce-reviews-trigger, body #woocommerce-info-trigger, .product_title.entry-title').css('color', newval );
        } );
    } );

    wp.customize( 'singleproduct_excerpt_color', function( value ) {
        value.bind( function( newval ) {
            $('body.single-product .entry-summary p:not(.price),  body.single-product .entry-summary .product_meta, body.single-product .entry-summary .woocommerce-product-details__short-description ul').css('color', newval );
        } );
    } );

    wp.customize( 'singleproduct_header_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body .upsells.products h2, body .related.products h2, body #woocommerce-reviews-trigger, body #woocommerce-info-trigger, .product_title.entry-title').css('font-style', newval );
        } );
    } );

    wp.customize( 'singleproduct_header_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body .upsells.products h2, body .related.products h2, body #woocommerce-reviews-trigger, body #woocommerce-info-trigger, .product_title.entry-title').css('font-weight', newval );
        } );
    } );

    wp.customize( 'singleproduct_header_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_header_font_size">body .upsells.products h2, body .related.products h2, body #woocommerce-info-trigger, body #woocommerce-reviews-trigger, .product_title.entry-title { font-size: ' + newval + 'px;} </style>';

            el =  $( '.singleproduct_header_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_header_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_header_font_letterspacing">body .upsells.products h2, body .related.products h2, body #woocommerce-info-trigger, body #woocommerce-reviews-trigger, .product_title.entry-title { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.singleproduct_header_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_header_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_header_font_transform">body .upsells.products h2, body .related.products h2, body #woocommerce-info-trigger, body #woocommerce-reviews-trigger, .product_title.entry-title { text-transform: ' + newval + ';} </style>';

            el =  $( '.singleproduct_header_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_header_font_lineheight', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_header_font_lineheight">body .upsells.products h2, body .related.products h2, body #woocommerce-info-trigger, body #woocommerce-reviews-trigger, .product_title.entry-title { line-height: ' + newval + 'px;} </style>';

            el =  $( '.singleproduct_header_font_lineheight' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );




    wp.customize( 'singleproduct_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body.single-product .entry-summary p:not(.price),  body.single-product .entry-summary .product_meta, body.single-product .entry-summary .woocommerce-product-details__short-description ul').css('font-style', newval );
        } );
    } );

    wp.customize( 'singleproduct_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body.single-product .entry-summary p:not(.price),  body.single-product .entry-summary .product_meta, body.single-product .entry-summary .woocommerce-product-details__short-description ul').css('font-weight', newval );
        } );
    } );

    wp.customize( 'singleproduct_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_font_size">body.single-product .entry-summary p:not(.price),  body.single-product .entry-summary .product_meta, body.single-product .entry-summary .woocommerce-product-details__short-description ul { font-size: ' + newval + 'px;} </style>';

            el =  $( '.singleproduct_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_font_letterspacing">body.single-product .entry-summary p:not(.price),  body.single-product .entry-summary .product_meta, body.single-product .entry-summary .woocommerce-product-details__short-description ul{ letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.singleproduct_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_font_transform">body.single-product .entry-summary p:not(.price),  body.single-product .entry-summary .product_meta, body.single-product .entry-summary .woocommerce-product-details__short-description ul { text-transform: ' + newval + ';} </style>';

            el =  $( '.singleproduct_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singleproduct_font_lineheight', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singleproduct_font_lineheight">body.single-product .entry-summary p:not(.price),  body.single-product .entry-summary .product_meta, body.single-product .entry-summary .woocommerce-product-details__short-description ul { line-height: ' + newval + 'px;} </style>';

            el =  $( '.singleproduct_font_lineheight' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );











    wp.customize( 'header_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body .site-header .main-navigation a, body .site-mobile-header .main-navigation a').css('font-style', newval );
        } );
    } );

    wp.customize( 'header_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body .site-header .main-navigation a, body .site-mobile-header .main-navigation a').css('font-weight', newval );
        } );
    } );

    wp.customize( 'header_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_font_size">body .site-header .main-navigation a, body .site-mobile-header .main-navigation a { font-size: ' + newval + 'px;} </style>';

            el =  $( '.header_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_font_letterspacing">body .site-header .main-navigation a, body .site-mobile-header .main-navigation a { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.header_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_font_transform">body .site-header .main-navigation a, body .site-mobile-header .main-navigation a { text-transform: ' + newval + ';} </style>';

            el =  $( '.header_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_font_lineheight', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_font_lineheight">body .site-header .main-navigation a, body .site-mobile-header .main-navigation a { line-height: ' + newval + 'px;} </style>';

            el =  $( '.header_font_lineheight' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );







    wp.customize( 'topheader_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body .site-top-header').css('font-style', newval );
        } );
    } );

    wp.customize( 'topheader_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body .site-top-header').css('font-weight', newval );
        } );
    } );

    wp.customize( 'topheader_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_font_size">body .site-top-header { font-size: ' + newval + 'px;} </style>';

            el =  $( '.header_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'topheader_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_font_letterspacing">body .site-top-header { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.header_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'topheader_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_font_transform">body .site-top-header { text-transform: ' + newval + ';} </style>';

            el =  $( '.header_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'topheader_font_lineheight', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_font_lineheight">body .site-top-header { line-height: ' + newval + 'px;} </style>';

            el =  $( '.header_font_lineheight' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );



    wp.customize( 'shop_font_style', function( value ) {
        value.bind( function( newval ) {
            $('body .product-grid .product h4, body .product-grid .product .product-viewmore, body .product-grid .product .price').css('font-style', newval );
        } );
    } );

    wp.customize( 'shop_font_weight', function( value ) {
        value.bind( function( newval ) {
            $('body .product-grid .product h4, body .product-grid .product .product-viewmore, body .product-grid .product .price').css('font-weight', newval );
        } );
    } );

    wp.customize( 'shop_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="shop_font_size">body .product-grid .product h4, body .product-grid .product .product-viewmore, body .product-grid .product .price { font-size: ' + newval + 'px;} </style>';

            el =  $( '.shop_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'shop_font_letterspacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="shop_font_letterspacing">body .product-grid .product h4, body .product-grid .product .product-viewmore, body .product-grid .product .price { letter-spacing: ' + newval + 'px;} </style>';

            el =  $( '.shop_font_letterspacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'shop_font_transform', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="shop_font_transform">body .product-grid .product h4, body .product-grid .product .product-viewmore, body .product-grid .product .price { text-transform: ' + newval + ';} </style>';

            el =  $( '.shop_font_transform' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );











wp.customize( 'portfolio_archive_overlay', function( value ) {
        value.bind( function( newval ) {
            $('body.archive .portfolio--mia .project__overlay').css('background-color', newval );
        } );
    } );
wp.customize( 'portfolio_archive_overlay_text', function( value ) {
        value.bind( function( newval ) {
            $('body.archive .portfolio--mia .project__overlay .entry-title').css('color', newval );
        } );
    } );



    wp.customize( 'shop_salebadge_background_color', function( value ) {
        value.bind( function( newval ) {
            $('body .onsale').css('background-color', newval );
        } );
    } );

    wp.customize( 'shop_salebadge_color', function( value ) {
        value.bind( function( newval ) {
            $('body .onsale').css('color', newval );
        } );
    } );

    wp.customize( 'shop_product_top_padding', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="shop_product_top_padding">body .product-grid .product .thumb { top: ' + newval + 'px;} </style>';

            el =  $( '.shop_product_top_padding' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'shop_product_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="shop_product_bottom_padding">body .product-grid .product .thumb { bottom: ' + newval + 'px; } </style>';

            el =  $( '.shop_product_bottom_padding' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'shop_product_side_padding', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="shop_product_side_padding">body .product-grid .product .thumb { left: ' + newval + 'px; right: ' + newval + 'px; } </style>';

            el =  $( '.shop_product_side_padding' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'shop_ajaxcart_icon', function( value ) {
        value.bind( function( newval ) {
            $( '#cart--button .icon:first-of-type' ).attr('class', 'icon');
            $( '#cart--button .icon:first-of-type' ).addClass( 'icon--'+newval );
            $( '#cart--button .icon:first-of-type use' ).attr("xlink:href", $('#cart--button .icon:first-of-type use').attr("xlink:href").replace(/#.*$/,'') + '#icon-' + newval);
        } );
    } );

    wp.customize( 'header_search_icon', function( value ) {
        value.bind( function( newval ) {
            $( '.site-header .search-wrapper .icon' ).attr('class', 'icon');
            $( '.site-header .search-wrapper .icon' ).addClass( 'icon--'+newval );
            $( '.site-header .search-wrapper .icon use' ).attr("xlink:href", $('.site-header .search-wrapper .icon use').attr("xlink:href").replace(/#.*$/,'') + '#icon-' + newval);
        } );
    } );

    wp.customize( 'header_checkout_icon', function( value ) {
        value.bind( function( newval ) {
            $( '.site-mobile-header .checkout-wrapper .icon' ).attr('class', 'icon');
            $( '.site-mobile-header .checkout-wrapper .icon' ).addClass( 'icon--'+newval );
            $( '.site-mobile-header .checkout-wrapper .icon use' ).attr("xlink:href", $('.site-header .checkout-wrapper .icon use').attr("xlink:href").replace(/#.*$/,'') + '#icon-' + newval);

            $( '.site-header .checkout-wrapper .icon' ).attr('class', 'icon');
            $( '.site-header .checkout-wrapper .icon' ).addClass( 'icon--'+newval );
            $( '.site-header .checkout-wrapper .icon use' ).attr("xlink:href", $('.site-header .checkout-wrapper .icon use').attr("xlink:href").replace(/#.*$/,'') + '#icon-' + newval);

        } );
    } );

    wp.customize( 'shop_product_background_color', function( value ) {
        value.bind( function( newval ) {
            $('body .product-grid .product').css('background-color', newval );
        } );
    } );

     wp.customize( 'single_product_background_color', function( value ) {
        value.bind( function( newval ) {
            $('body .images').css('background-color', newval );
        } );
    } );

    wp.customize( 'shop_product_title_color', function( value ) {
        value.bind( function( newval ) {
            $('body .product .product-title h4, body .product .price').css('color', newval );
        } );
    } );

    wp.customize( 'site_button_color', function( value ) {
        value.bind( function( newval ) {
            $('body .btn, body .button:not(.entry-format-button):not(.add_media):not(.ed_button):not(.media-button-select):not(.media-button-insert), body .button a, body .btn[type="submit"], body .button[type="submit"], body input[type="button"], body input[type="reset"], body input[type="submit"]').css('background-color', newval );
        } );
    } );


    wp.customize( 'site_button_hover_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_button_hover_color"> body .btn:hover, body .button:not(.entry-format-button):not(.add_media):not(.ed_button):not(.media-button-select):not(.media-button-insert):hover, body .button a:hover, body .btn[type="submit"]:hover, body .button[type="submit"]:hover, body input[type="button"]:hover, body input[type="reset"]:hover, body input[type="submit"]:hover { background-color:' + newval + '; }</style>';

            el =  $( '.site_button_hover_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'shop_layout', function( value ) {
        value.bind( function( newval ) {
            $( '.hfeed.product-grid' ).removeClass( 'product-grid__columns  product-grid__gallery' );
            $( '.hfeed.product-grid' ).addClass( newval );
        } );
    } );

    wp.customize( 'shop_product_title', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.hfeed.product-grid .product-title h4' ).removeClass( 'hidden' );
            } else {
                $( '.hfeed.product-grid .product-title h4' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'single_product_breadcrumbs', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.product-navigation-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.product-navigation-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'header_mobile_primary_menu', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.site-mobile-header .main-navigation' ).removeClass( 'hidden' );
            } else {
                $( '.site-mobile-header .main-navigation' ).addClass( 'hidden' );
            }
        } );
    } );





    wp.customize( 'shop_product_price', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.hfeed.product-grid .product-title .produt-title--info' ).removeClass( 'hidden' );
            } else {
            	$( '.hfeed.product-grid .product-title .produt-title--info' ).addClass( 'hidden' );
            }
        } );
    } );


    wp.customize( 'shop_product_title_position', function( value ) {
        value.bind( function( newval ) {
            $( '.hfeed.product-grid .product-title' ).removeClass( 'top-left top-right top-centered bottom-left bottom-right bottom-centered' );
            $( '.hfeed.product-grid .product-title' ).addClass( newval );
        } );
    } );






	//LIVE HTML
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-logo-link' ).html( newval );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	wp.customize( 'header', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).attr('data-header', newval );
		} );
	} );

    wp.customize( 'top-header', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-top-header', newval );
        } );
    } );

    wp.customize( 'footer', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-footer', newval );
        } );
    } );

    wp.customize( 'colophon', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-colophon', newval );
        } );
    } );

    wp.customize( 'shop_layout_columns_size', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).attr('data-shop-columns-size', newval );
		} );
	} );

	wp.customize( 'single_product', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).attr('data-single-product', newval );
		} );
	} );

	wp.customize( 'single_product_breadcrumbs', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).attr('data-single-product-breadcrumbs', newval );
		} );
	} );

	wp.customize( 'shop_product_hover', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).attr('data-product-hover', newval );
		} );
	} );

    wp.customize( 'singlepost_sidebar', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-post-sidebar', newval );

            if ( 'none' === newval ) {
                $( '#secondary' ).addClass( 'hidden' );
            } else {
                $( '#secondary' ).removeClass( 'hidden' );
            }

        } );
    } );

    wp.customize( 'shop_salebadge', function( value ) {
        value.bind( function( newval ) {
            if ( false === newval ) {
                $( '.onsale' ).addClass( 'hidden' );
            } else {
                $( '.onsale' ).removeClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'shop_salebadge_position', function( value ) {
        value.bind( function( newval ) {
            $( '.onsale' ).removeClass( 'top-left top-right top-centered bottom-left bottom-right bottom-centered' );
            $( '.onsale' ).addClass( newval );
        } );
    } );

    wp.customize( 'shop_salebadge_style', function( value ) {
        value.bind( function( newval ) {
            $( '.onsale' ).removeClass( 'style--default style--circle style--square' );
            $( '.onsale' ).addClass( newval );
        } );
    } );


    wp.customize( 'shop_salebadge_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="shop_salebadge_size">body .product .onsale { width: ' + newval + 'px; } body .product .onsale:not(.style--default) { height: ' + newval + 'px; line-height: ' + newval + 'px; }</style>';

            el =  $( '.shop_salebadge_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'shop_salebadge_text', function( value ) {
		value.bind( function( newval ) {
			$( '.onsale' ).html( newval );
		} );
	} );

    wp.customize( 'custom_logo_max_width', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="custom_logo_max_width">@media screen and (min-width: 769px) { body .custom-logo-link img.custom-logo { width:' + newval + 'px; } }</style>';

            el =  $( '.custom_logo_max_width' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'custom_logo_mobile_max_width', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="custom_logo_mobile_max_width">@media screen and (max-width: 768px) { body .custom-logo-link img.custom-logo { width:' + newval + 'px; } }</style>';

            el =  $( '.custom_logo_mobile_max_width' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );




    wp.customize( 'mobilenav_background_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="mobilenav_background_color">@media screen and (max-width: 768px) { body .sidebar--section.mobile-menu { background-color:' + newval + '; } }</style>';

            el =  $( '.mobilenav_background_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );



    //  wp.customize( 'flyout_overlay_background_color', function( value ) {
    //     value.bind( function( newval ) {

    //         var style, el;
    //         style = '<style class="flyout_overlay_background_toggle_color">@media screen and (max-width: 768px) { body .body .flyout-close-toggle { background-color:' + newval + '; } }</style>';

    //         el =  $( '.flyout_overlay_background_toggle_color' );

    //         if ( el.length ) {
    //             el.replaceWith( style ); // style element already exists, so replace it
    //         } else {
    //             $( 'head' ).append( style ); // style element doesn't exist so add it
    //         }
    //     } );

    // } );



    wp.customize( 'mobilenav_close_background_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="mobilenav_close_background_color">@media screen and (max-width: 768px) { body .close-toggle { background-color:' + newval + '; } }</style>';

            el =  $( '.mobilenav_close_background_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'mobilenav_close_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="mobilenav_close_color">@media screen and (max-width: 768px) { body .close-toggle svg { stroke:' + newval + '; } }</style>';

            el =  $( '.mobilenav_close_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );






    wp.customize( 'mobilenav_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body .sidebar--section.mobile-menu .main-navigation.flyout a').css('color', newval );
        } );
    } );


    wp.customize( 'mobilenav_social_color', function( value ) {
        value.bind( function( newval ) {
            $('body .sidebar--section.mobile-menu .social-navigation svg').css('fill', newval );
        } );
    } );

    wp.customize( 'mobilenav_social_size', function( value ) {
        value.bind( function( newval ) {
            $('body .sidebar--section.mobile-menu .social-navigation svg').css('width', newval );
            $('body .sidebar--section.mobile-menu .social-navigation svg').css('height', newval );
        } );
    } );

    wp.customize( 'mobilenav_social_spacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="mobilenav_social_spacing"> body .sidebar--section.mobile-menu .social-navigation svg { margin: 0 ' + newval + 'px!important;} </style>';

            el =  $( '.mobilenav_social_spacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'flyout_overlay_background_color', function( value ) {
        value.bind( function( newval ) {

            opacity = wp.customize( 'flyout_overlay_opacity');

            el =  opacity * 0.01;

            $('body .nav-close-overlay').css('background-color', newval );
            $('body .nav-close-overlay').css('opacity', el );
        } );

    } );

    wp.customize( 'flyout_overlay_opacity', function( value ) {
        value.bind( function( newval ) {

            background = wp.customize( 'flyout_overlay_background_color');

            el =  newval * 0.01;

            $('body .nav-close-overlay').css('opacity', el );
            $('body .nav-close-overlay').css('background-color', background );
        } );
    } );

    wp.customize( 'flyout', function( value ) {
        value.bind( function( newval ) {

            $( 'body' ).attr('data-flyout', newval );

            if ( true === newval ) {
                $( '.site-header .trigger-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.site-header .trigger-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'flyout_position', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-flyout-position', newval );

            if ( 'sidebar--right' === newval ) {
                $( '#site-flyout' ).addClass( 'sidebar--right' );
                $( '#site-flyout' ).removeClass( 'sidebar--left' );
            } else {
                $( '#site-flyout' ).addClass( 'sidebar--left' );
                $( '#site-flyout' ).removeClass( 'sidebar--right' );
            }

        } );
    } );

    wp.customize( 'colophon_social_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-colophon .social-navigation svg').css('fill', newval );
        } );
    } );

    wp.customize( 'colophon_social_size', function( value ) {
        value.bind( function( newval ) {
            $('body .site-colophon .social-navigation svg').css('width', newval );
            $('body .site-colophon .social-navigation svg').css('height', newval );
        } );
    } );

    wp.customize( 'header_checkout_position', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-header-checkout-position', newval );

            if ( 'right' === newval ) {
                $( '.site-header__left .checkout-wrapper' ).addClass( 'hidden' );
                $( '.site-header__right .checkout-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.site-header__right .checkout-wrapper' ).addClass( 'hidden' );
                $( '.site-header__left .checkout-wrapper' ).removeClass( 'hidden' );
            }

        } );
    } );






    // Site
    wp.customize( 'flyout_background_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="flyout_background_color">  body .site-flyout { background-color: ' + newval + ' !important; }</style>';

            el =  $( '.flyout_background_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'flyout_text_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="flyout_text_color">  body .site-flyout, body .site-flyout a { color: ' + newval + ' !important; }</style>';

            el =  $( '.flyout_text_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'colophon_menu', function( value ) {
        value.bind( function( newval ) {

            if ( true === newval ) {
                $( '.colophon-navigation' ).removeClass( 'hidden' );
            } else {
                $( '.colophon-navigation' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'header_mobile_cart', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-mobile-cart', newval );

            if ( true === newval ) {
                $( '.site-mobile-header .checkout-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.site-mobile-header .checkout-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'header_mobile_search', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-mobile-search', newval );

            if ( true === newval ) {
                $( '.site-mobile-header .search-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.site-mobile-header .search-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'header_checkout', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.site-header .checkout-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.site-header .checkout-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'header_checkout_color', function( value ) {
        value.bind( function( newval ) {
            $('body .checkout-wrapper svg').css('stroke', newval );
            $('body .checkout-wrapper svg').css('fill', newval );
        } );
    } );

    wp.customize( 'header_checkout_size', function( value ) {
        value.bind( function( newval ) {
            $('body .checkout-wrapper svg').css('width', newval );
            $('body .checkout-wrapper svg').css('height', newval );
        } );
    } );

    wp.customize( 'header_flyout_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_flyout_color">  body .menu-toggle .hamburger-inner, body .menu-toggle .hamburger-inner:before, body .menu-toggle .hamburger-inner:after { background-color: ' + newval + ' !important; } </style>';

            el =  $( '.header_flyout_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );


    wp.customize( 'header_flyout_size', function( value ) {
        value.bind( function( newval ) {
            $('body .menu-toggle').css('height', newval );
            $('body .menu-toggle').css('width', newval );
        } );
    } );






    wp.customize( 'blog_infscr', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.pagination-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.pagination-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'blog_date', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.days-ago' ).removeClass( 'hidden' );
            } else {
                $( '.days-ago' ).addClass( 'hidden' );
            }
        } );
    } );

     wp.customize( 'blog_byline', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.byline' ).removeClass( 'hidden' );
            } else {
                $( '.byline' ).addClass( 'hidden' );
            }
        } );
    } );






    wp.customize( 'blog_text_alignment', function( value ) {
        value.bind( function( newval ) {
            $( '.hfeed.posts .post-content' ).removeClass( 'align__justify align__left align__right align__center' );
            $( '.hfeed.posts .post-content' ).addClass( newval );
        } );
    } );

    wp.customize( 'blog_title_alignment', function( value ) {
        value.bind( function( newval ) {
            $( '.hfeed.posts .entry-header' ).removeClass( 'align__justify align__left align__right align__center' );
            $( '.hfeed.posts .entry-header' ).addClass( newval );
        } );
    } );

    wp.customize( 'singlepost_pinterest', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.single-post .post .btn__pinterest' ).removeClass( 'hidden' );
            } else {
                $( '.single-post .post .btn__pinterest' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'singlepost_pinterest_position', function( value ) {
        value.bind( function( newval ) {
            $( '.single-post .btn__pinterest' ).removeClass( 'top-left top-right bottom-left bottom-right' );
            $( '.single-post .btn__pinterest' ).addClass( newval );
        } );
    } );

    wp.customize( 'singlepost_bio', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.author-info' ).removeClass( 'hidden' );
            } else {
                $( '.author-info' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'header_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-header .main-navigation a, body .site-header .site-logo-link a').css('color', newval );
        } );
    } );

    wp.customize( 'topheader_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-top-header, body .site-top-header a').css('color', newval );
        } );
    } );

    wp.customize( 'footer_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-footer, body .site-footer a:not(.button)').css('color', newval );
        } );
    } );

    wp.customize( 'footer_header_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-footer .widget-title').css('color', newval );
        } );
    } );
    wp.customize( 'footer_header_opacity', function( value ) {
        value.bind( function( newval ) {
             var opacity;

             el =  newval * 0.01;

            $('body .site-footer .widget-title').css('opacity', el );
        } );
    } );

    wp.customize( 'singlepost_header_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singlepost_header_padding_top">  @media screen and (min-width: 769px) { .search-results .posts--default article .entry-header, .post .entry-header { margin-top: ' + newval + 'px !important; } } </style>';

            el =  $( '.singlepost_header_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singlepost_header_mobile_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singlepost_header_mobile_padding_top">@media screen and (max-width: 768px) { .search-results .posts--default article .entry-header, .post .entry-header { margin-top: ' + newval + 'vw !important; } } </style>';

            el =  $( '.singlepost_header_mobile_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singlepost_header_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singlepost_header_padding_bottom">  @media screen and (min-width: 769px) { .search-results .posts--default article, .post .entry-header { margin-bottom: ' + newval + 'px !important; } } </style>';

            el =  $( '.singlepost_header_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singlepost_header_mobile_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singlepost_header_mobile_padding_bottom">  @media screen and (max-width: 768px) { .search-results .posts--default article, .post .entry-header { margin-bottom: ' + newval + 'vw !important; } } </style>';

            el =  $( '.singlepost_header_mobile_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singlepost_bio_avatar_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="singlepost_bio_avatar_size">  @media screen and (min-width: 769px) { .author-info .author-avatar { height: ' + newval + 'px !important; width: ' + newval + 'px !important; } } </style>';

            el =  $( '.singlepost_bio_avatar_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'singlepost_bio_text_color', function( value ) {
        value.bind( function( newval ) {
            $(' body .author-info p').css('color', newval );
        } );
    } );

    wp.customize( 'singlepost_bio_header_color', function( value ) {
        value.bind( function( newval ) {
            $(' body .author-info .author-name').css('color', newval );
        } );
    } );

    wp.customize( 'singlepost_bio_background_color', function( value ) {
        value.bind( function( newval ) {
            $(' body .author-info').css('background-color', newval );
        } );
    } );

    // Site
    wp.customize( 'site_background_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_background_color">  body { background-color: ' + newval + ' !important; } </style>';

            el =  $( '.site_background_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_html_background_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_html_background_color">  html { background-color: ' + newval + ' !important; }</style>';

            el =  $( '.site_html_background_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );


    wp.customize( 'site_content_padding_side', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_content_padding_side"> @media screen and (min-width: 769px) { body .fl-row.fl-row-full-width, body .site-colophon .site-colophon__inner { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; } body .site-content .site-content__inner { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; } body .portfolio--ethan { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; }  }</style>';

            el =  $( '.site_content_padding_side' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_content_mobile_padding_side', function( value ) {
        value.bind( function( newval ) {
            var style, el, number;

            number = newval * 2;

            style = '<style class="site_content_mobile_padding_for_ethan"> @media screen and (max-width: 768px) { body .portfolio--ethan { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; } }</style>';

            el =  $( '.site_content_mobile_padding_for_ethan' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_content_mobile_padding_side', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_content_mobile_padding_side"> @media screen and (max-width: 768px) { body .site-colophon .site-colophon__inner { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; } body .site-header .site-header__inner { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; } body .site-footer .site-footer__inner { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; }  body .site-content .site-content__inner { padding-left: ' + newval + 'vw !important; padding-right: ' + newval + 'vw !important; } }</style>';

            el =  $( '.site_content_mobile_padding_side' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    // Site Content
    wp.customize( 'site_content_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_content_padding_top"> @media screen and (min-width: 769px) { body:not(.blog) .site-content .site-content__inner { padding-top: ' + newval + 'vw !important; } }</style>';

            el =  $( '.site_content_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_content_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_content_padding_bottom"> @media screen and (min-width: 769px) { body .pagination {margin-top: ' + newval + 'vw !important;} body .site-content .site-content__inner { padding-bottom: ' + newval + 'vw !important; } }</style>';

            el =  $( '.site_content_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_content_mobile_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_content_mobile_padding_top"> @media screen and (max-width: 768px) { body:not(.blog):not(.search):not(.archive) .site-content .site-content__inner { padding-top: ' + newval + 'vw !important; } }</style>';

            el =  $( '.site_content_mobile_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_content_mobile_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_content_mobile_padding_bottom"> @media screen and (max-width: 768px) { body .pagination {margin-top: ' + newval + 'vw !important;} body .site-content .site-content__inner { padding-bottom: ' + newval + 'vw !important; } }</style>';

            el =  $( '.site_content_mobile_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );


    // Site Border
    wp.customize( 'site_border', function( value ) {
        value.bind( function( newval ) {
            if ( false === newval ) {
                $( 'body' ).removeClass( 'has-site-border' );
            } else {
                $( 'body' ).addClass( 'has-site-border' );
            }
        } );
    } );

    wp.customize( 'site_border_width', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_border_width"> @media screen and (min-width: 769px) { body.has-site-border { border-width: ' + newval + 'px; } } </style>';

            el =  $( '.site_border_width' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_mobile_border_width', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_mobile_border_width"> @media screen and (max-width: 768px) { body.has-site-border { border-width: ' + newval + 'px; } } </style>';

            el =  $( '.site_mobile_border_width' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'site_border_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site_border_color"> body.has-site-border { border-color: ' + newval + '; } html { background: ' + newval + '!important; }</style>';

            el =  $( '.site_border_color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );



    // Header
    wp.customize( 'header_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_padding_top"> @media screen and (min-width: 769px) { body .site-header .site-header__inner { padding-top: ' + newval + 'px !important; } }</style>';

            el =  $( '.header_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_padding_bottom"> @media screen and (min-width: 769px) { body .site-header .site-header__inner { padding-bottom: ' + newval + 'px !important; } }</style>';

            el =  $( '.header_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_mobile_height', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_mobile_height"> @media screen and (max-width: 768px) { body .site-mobile-header { padding-top: ' + newval + 'vw !important; padding-bottom: ' + newval + 'vw !important; } }</style>';

            el =  $( '.header_mobile_height' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header-maxwidth', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header-maxwidth"> body .site-header .site-header__inner { max-width: ' + newval + 'px !important; } }</style>';

            el =  $( '.header-maxwidth' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_background_color', function( value ) {
        value.bind( function( newval ) {
            $( 'body:not(.site-header--absolute):not(.site-header--fixed) .site-header' ).css('background', '#ffffff' );
            $('body:not(.site-header--absolute):not(.site-header--fixed) .site-header').css('background', newval );
        } );
    } );

    wp.customize( 'footer_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="footer_padding_top"> @media screen and (min-width: 769px) { body .site-footer .site-footer__inner { padding-top: ' + newval + 'vw; } }</style>';

            el =  $( '.footer_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="footer_padding_bottom"> @media screen and (min-width: 769px) {  body .site-footer .site-footer__inner { padding-bottom: ' + newval + 'vw; } }</style>';

            el =  $( '.footer_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_mobile_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;

            style = '<style class="footer_mobile_padding_top"> @media screen and (max-width: 768px) { body .site-footer .site-footer__inner { padding-top: ' + newval + 'vw; } }</style>';

            el =  $( '.footer_mobile_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_mobile_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el, number;
            number = newval * 2.3;

            style = '<style class="footer_mobile_padding_bottom"> @media screen and (max-width: 768px) { body .site-footer .site-footer__inner { padding-bottom: ' + newval + 'vw; }  body[data-footer="footer-5"] .site-footer__inner .site-footer__right { margin-top: ' + number + 'vw !important; } } </style>';

            el =  $( '.footer_mobile_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer-maxwidth', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="footer-maxwidth"> body .site-footer .site-footer__inner { max-width: ' + newval + 'px !important; } </style>';

            el =  $( '.footer-maxwidth' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'footer_background_color', function( value ) {
        value.bind( function( newval ) {
            $(' body .site-footer').css('background', newval );
        } );
    } );






//Colophon
wp.customize( 'colophon_active', function( value ) {
    value.bind( function( newval ) {
        if ( true === newval ) {
            $( '.site-colophon' ).removeClass( 'hidden' );
        } else {
            $( '.site-colophon' ).addClass( 'hidden' );
        }
    } );
} );

wp.customize( 'colophon_padding_top', function( value ) {
    value.bind( function( newval ) {
        var style, el;
        style = '<style class="colophon_padding_top">  @media screen and (min-width: 769px) { body .site-colophon .site-colophon__inner { padding-top: ' + newval + 'vw !important; } } </style>';

        el =  $( '.colophon_padding_top' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'colophon_padding_bottom', function( value ) {
    value.bind( function( newval ) {
        var style, el;
        style = '<style class="colophon_padding_bottom">  @media screen and (min-width: 769px) { body .site-colophon .site-colophon__inner { padding-bottom: ' + newval + 'vw !important; } } </style>';

        el =  $( '.colophon_padding_bottom' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'colophon_mobile_padding_top', function( value ) {
    value.bind( function( newval ) {
        var style, el;

        style = '<style class="colophon_mobile_padding_top"> @media screen and (max-width: 768px) { body .site-colophon .site-colophon__inner { padding-top: ' + newval + 'vw !important; } } </style>';

        el =  $( '.colophon_mobile_padding_top' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'colophon_mobile_padding_bottom', function( value ) {
    value.bind( function( newval ) {
        var style, el;
        style = '<style class="colophon_mobile_padding_bottom"> @media screen and (max-width: 768px) { body .site-colophon .site-colophon__inner { padding-bottom: ' + newval + 'vw !important; } } </style>';

        el =  $( '.colophon_mobile_padding_bottom' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'colophon_large_padding_top', function( value ) {
    value.bind( function( newval ) {
        var style, el;

        style = '<style class="colophon_large_padding_top"> @media screen and (min-width: 1501px) { body .site-colophon .site-colophon__inner { padding-top: ' + newval + 'vw !important; } } </style>';

        el =  $( '.colophon_large_padding_top' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'colophon_large_padding_bottom', function( value ) {
    value.bind( function( newval ) {
        var style, el;
        style = '<style class="colophon_large_padding_bottom"> @media screen and (min-width: 1501px) { body .site-colophon .site-colophon__inner { padding-bottom: ' + newval + 'vw !important; } } </style>';

        el =  $( '.colophon_large_padding_bottom' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'colophon_text_color', function( value ) {
    value.bind( function( newval ) {
        $('body .site-colophon, body .site-colophon a').css('color', newval );
    } );
} );











wp.customize( 'footer_large_padding_top', function( value ) {
    value.bind( function( newval ) {
        var style, el;

        style = '<style class="footer_large_padding_top"> @media screen and (min-width: 1501px) { body .site-footer .site-footer__inner { padding-top: ' + newval + 'vw; } } </style>';

        el =  $( '.footer_large_padding_top' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'footer_large_padding_bottom', function( value ) {
    value.bind( function( newval ) {
        var style, el;
        style = '<style class="footer_large_padding_bottom"> @media screen and (min-width: 1501px) { body .site-footer .site-footer__inner { padding-bottom: ' + newval + 'vw; } } </style>';

        el =  $( '.footer_large_padding_bottom' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );





wp.customize( 'colophon_max_width', function( value ) {
    value.bind( function( newval ) {
        var style, el;
        style = '<style class="colophon_max_width">body .site-colophon .site-colophon__inner { max-width: ' + newval + 'px!important; } </style>';

        el =  $( '.colophon_max_width' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );





wp.customize( 'colophon_background_color', function( value ) {
    value.bind( function( newval ) {
        $(' body .site-colophon').css('background', newval );
    } );
} );






//Colophon: Copyright

wp.customize( 'colophon_copyright', function( value ) {
    value.bind( function( newval ) {
        if ( true === newval ) {
            $( '.site-copyright' ).removeClass( 'hidden' );
        } else {
            $( '.site-copyright' ).addClass( 'hidden' );
        }
    } );
} );

wp.customize( 'colophon_theme_info', function( value ) {
    value.bind( function( newval ) {
        if ( true === newval ) {
            $( '.site-theme' ).removeClass( 'hidden' );
        } else {
            $( '.site-theme' ).addClass( 'hidden' );
        }
    } );
} );

wp.customize( 'colophon_copyright_text', function( value ) {
    value.bind( function( newval ) {
        $( '.copyright-text' ).html( newval );
    } );
} );

wp.customize( 'colophon_copyright_padding_side', function( value ) {
    value.bind( function( newval ) {
        var style, el;
        style = '<style class="colophon_copyright_padding_side"> @media screen and (min-width: 769px) { body .site-copyright { padding-right: ' + newval + 'px !important; } } [data-colophon="colophon-2"] .site-colophon .site-info .site-copyright {padding-right: 0!important; padding-left: ' + newval + 'px !important;} </style>';

        el =  $( '.colophon_copyright_padding_side' );

        if ( el.length ) {
            el.replaceWith( style ); // style element already exists, so replace it
        } else {
            $( 'head' ).append( style ); // style element doesn't exist so add it
        }
    } );
} );

wp.customize( 'colophon_social_spacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="colophon_social_spacing"> body .site-colophon .social-navigation svg { margin: 0 ' + newval + 'px!important;} </style>';

            el =  $( '.colophon_social_spacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );










    // Secondary Header
    wp.customize( 'topheader_active', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.site-top-header' ).removeClass( 'hidden' );
            } else {
                $( '.site-top-header' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'topheader_padding_top', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_padding_top"> body .site-top-header .site-top-header__inner { padding-top: ' + newval + 'px !important; } </style>';

            el =  $( '.topheader_padding_top' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'topheader_padding_bottom', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_padding_bottom"> body .site-top-header .site-top-header__inner { padding-bottom: ' + newval + 'px !important; } </style>';

            el =  $( '.topheader_padding_bottom' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'topheader_padding_side', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_padding_side"> body .site-top-header .site-top-header__inner { padding-left: ' + newval + 'px !important; padding-right: ' + newval + 'px !important;  } </style>';

            el =  $( '.topheader_padding_side' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'topheader_background_color', function( value ) {
        value.bind( function( newval ) {
            $(' body .site-top-header').css('background', newval );
        } );
    } );

    wp.customize( 'topheader_social_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-top-header .social-navigation svg').css('fill', newval );
        } );
    } );

    wp.customize( 'topheader_social_size', function( value ) {
        value.bind( function( newval ) {
            $('body .site-top-header .social-navigation svg').css('width', newval );
            $('body .site-top-header .social-navigation svg').css('height', newval );
        } );
    } );

    wp.customize( 'topheader_social_spacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_social_spacing"> body .site-top-header .social-navigation svg { margin: 0 ' + newval + 'px!important;} </style>';

            el =  $( '.topheader_social_spacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );













    //Secondary Search
    wp.customize( 'topheader_search', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.site-top-header .search-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.site-top-header .search-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'topheader_search_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-top-header .search-wrapper .svg__wrapper svg').css('stroke', newval );
        } );
    } );

    wp.customize( 'topheader_search_size', function( value ) {
        value.bind( function( newval ) {
            $('body .site-top-header .search-wrapper .svg__wrapper').css('width', newval );
            $('body .site-top-header .search-wrapper .svg__wrapper').css('height', newval );
            $('body .site-top-header .search-wrapper .svg__wrapper svg').css('width', newval );
            $('body .site-top-header .search-wrapper .svg__wrapper svg').css('height', newval );
        } );
    } );

    wp.customize( 'topheader_search_padding', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_search_padding"> body .site-top-header__left .search-wrapper { padding-right: ' + newval + 'px !important; } body .site-top-header__right .search-wrapper { padding-left: ' + newval + 'px !important; } </style>';

            el =  $( '.topheader_search_padding' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'topheader_search_margin', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="topheader_search_margin"> body .site-top-header__left .search-wrapper { margin-right: ' + newval + 'px !important; } body .site-top-header__right .search-wrapper { margin-left: ' + newval + 'px !important; } </style>';

            el =  $( '.topheader_search_margin' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );






    // Header Search
    wp.customize( 'header_search', function( value ) {
        value.bind( function( newval ) {
            $( 'body' ).attr('data-header-search', newval );

            if ( true === newval ) {
                $( '.site-header .search-wrapper' ).removeClass( 'hidden' );
            } else {
                $( '.site-header .search-wrapper' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'header_search_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-header .search-wrapper .svg__wrapper svg').css('stroke', newval );
        } );
    } );

    wp.customize( 'header_search_size', function( value ) {
        value.bind( function( newval ) {
            $('body .site-header .search-wrapper .svg__wrapper').css('width', newval );
            $('body .site-header .search-wrapper .svg__wrapper').css('height', newval );
            $('body .site-header .search-wrapper .svg__wrapper svg').css('width', newval );
            $('body .site-header .search-wrapper .svg__wrapper svg').css('height', newval );
        } );
    } );

    wp.customize( 'header_search_padding', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_search_padding"> body .site-header__left .search-wrapper { padding-right: ' + newval + 'px !important; } body .site-header__right .search-wrapper { padding-left: ' + newval + 'px !important; } </style>';

            el =  $( '.header_search_padding' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_social_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-header .social-navigation svg').css('fill', newval );
        } );
    } );

    wp.customize( 'header_socialsize', function( value ) {
        value.bind( function( newval ) {
            $('body .site-header .social-navigation svg').css('width', newval );
            $('body .site-header .social-navigation svg').css('height', newval );
        } );
    } );

    wp.customize( 'header_social_padding_side', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_social_padding_side"> body .site-header .social-navigation { margin-left: ' + newval + 'px } body .site-header .site-header__left .social-navigation { margin-right: ' + newval + 'px } </style>';

            el =  $( '.header_social_padding_side' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'header_social_spacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_social_spacing"> body .site-header .social-navigation svg { margin: 0 ' + newval + 'px!important;} </style>';

            el =  $( '.header_social_spacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );



    wp.customize( 'header_padding_side', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="header_padding_side"> body .site-header .site-header__inner { padding-left: ' + newval + 'vw!important; padding-right: ' + newval + 'vw!important;} </style>';

            el =  $( '.header_padding_side' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );






} )( jQuery );