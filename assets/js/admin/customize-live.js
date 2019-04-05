/**
 * Customizer Previewer
 */
( function ( wp, $ ) {
    "use strict";

    // Bail if the customizer isn't initialized
    if ( ! wp || ! wp.customize ) {
        return;
    }

    var api = wp.customize, OldPreview;

    // Custom Customizer Preview class (attached to the Customize API)
    api.myCustomizerPreview = {
        // Init
        init: function () {
            var self = this; // Store a reference to "this"

            // When the previewer is active, the "active" event has been triggered (on load)
            this.preview.bind( 'active', function() {

                var $body = $( 'body'), $document = $( document ); // Store references to the body and document elements
                var
                $hfeed                      = $( '.blog .site-content'),
                $flyout                     = $( '.site-flyout'),
                $flyout_widgets             = $( 'div:not(.mobile-menu) .sidebar--section-inner'),
                $singlepost                 = $( '.single-post .site-content__inner'),
                $singlepost_bio             = $( '.single-post .author-info'),
                $singlepost_sidebar         = $( '.single-post #secondary'),
                $footer                     = $( '.site-footer'),
                $mobilemenu                 = $( '.mobile-menu .sidebar--section-inner'),
                $header                     = $( '.site-header'),
                $top_header                 = $( '.site-top-header'),
                $top_header_socialmenu      = $( '.site-top-header .social-wrapper'),
                $footer_col_1               = $( '.site-footer__widgets .col-1'),
                $footer_col_2               = $( '.site-footer__widgets .col-2'),
                $footer_col_3               = $( '.site-footer__widgets .col-3'),
                $footer_col_4               = $( '.site-footer__widgets .col-4'),
                $colophon                   = $( '.site-colophon' ),
                $hfeed_products             = $( '.hfeed.product-grid' ),
                $sitetitle                  = $( '.site-header .site-branding'),
                $single_product             = $( '.single-product .type-product .product__inner');

                // Products: Open Style Editor
                $hfeed_products.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-hfeed_products-styles">Edit</button>' );
                $hfeed_products.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Single Product: Open Style Editor
                $single_product.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-single_product-styles">Edit</button>' );
                $single_product.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Single Post: Open Style Editor
                $singlepost.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-singlepost-styles">Edit</button>' );
                $singlepost.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Single Post: Open sidebar
                $singlepost_sidebar.append( '<button class="index-event-button customizer-event-overlay customizer-open-widgetarea" data-customizer-event="index-open-sidebar-1"></button>' );
                // Single Post: Add widget
                $singlepost_sidebar.append( '<button class="index-event-button customizer-event-button customizer-add-widget" data-customizer-event="index-add-widget-sidebar-1"></button>' );

                // Single Author Bio: Open Style Editor
                $singlepost_bio.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-singlepost-styles">Edit</button>' );
                $singlepost_bio.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Hfeed: Open Style Editor
                $hfeed.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-hfeed-styles">Edit</button>' );
                $hfeed.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Header: Open Site Title
                $sitetitle.append( '<button class="index-event-button customizer-event-overlay customizer-open-widgetarea" data-customizer-event="index-open-header-site-title"></button>' );

                // Header: Open Style Editor
                $header.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-header-styles">Edit</button>' );
                $header.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Header Secondary: Open Style Editor
                $top_header.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-top-header-styles">Edit</button>' );

                // Header Secondary: Open Header Secondary Menu
                $top_header_socialmenu.append( '<button class="index-event-button customizer-event-overlay customizer-open-widgetarea" data-customizer-event="index-open-topheader_socialmenu"></button>' );

                // Footer: Open Style Editor
                $footer.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-footer-styles">Edit</button>' );
                $footer.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Footer-Col-1: Open sidebar
                $footer_col_1.append( '<button class="index-event-button customizer-event-overlay customizer-open-widgetarea" data-customizer-event="index-open-footer-col-1"></button>' );

                // Footer-Col-1: Add widget
                $footer_col_1.append( '<button class="index-event-button customizer-event-button customizer-add-widget" data-customizer-event="index-add-widget-footer-col-1"></button>' );

                // Footer-Col-2: Open sidebar
                $footer_col_2.append( '<button class="index-event-button customizer-event-overlay customizer-open-widgetarea" data-customizer-event="index-open-footer-col-2"></button>' );

                // Footer-Col-2: Add widget
                $footer_col_2.append( '<button class="index-event-button customizer-event-button customizer-add-widget" data-customizer-event="index-add-widget-footer-col-2"></button>' );

                // Footer-Col-3: Open sidebar
                $footer_col_3.append( '<button class="index-event-button customizer-event-overlay customizer-open-widgetarea" data-customizer-event="index-open-footer-col-3"></button>' );

                // Footer-Col-3: Add widget
                $footer_col_3.append( '<button class="index-event-button customizer-event-button customizer-add-widget" data-customizer-event="index-add-widget-footer-col-3"></button>' );

                // Footer-Col-4: Open sidebar
                $footer_col_4.append( '<button class="index-event-button customizer-event-overlay customizer-open-widgetarea" data-customizer-event="index-open-footer-col-4"></button>' );

                // Footer-Col-4: Add widget
                $footer_col_4.append( '<button class="index-event-button customizer-event-button customizer-add-widget" data-customizer-event="index-add-widget-footer-col-4"></button>' );

                // Colophon: Open Editor
                $colophon.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-colophon-styles">Edit</button>' );
                $colophon.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Flyout: Open sidebar
                $flyout.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-flyout-styles">Edit</button>' );
                $flyout.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Flyout: Add widget
                $flyout_widgets.append( '<button class="index-event-button customizer-event-button customizer-add-widget" data-customizer-event="index-add-widget-flyout"></button>' );

                // Mobile Menu: Open sidebar
                $mobilemenu.append( '<button class="index-event-button customizer-editlayout-button customizer-open-widgetarea" data-customizer-event="index-open-mobilemenu-styles">Edit</button>' );
                $mobilemenu.append( '<div class="customizer__border customizer__border-btm"></div><div class="customizer__border customizer__border-top"></div><div class="customizer__border customizer__border-left"></div><div class="customizer__border customizer__border-right"></div>' );

                // Listen for events on the new previewer buttons
                $document.on( 'touch click', '.index-event-button', function( e ) {
                    var $this = $( this );

                    // Send the event that we've specified on the HTML5 data attribute ('data-customizer-event') to the Customizer
                    self.preview.send( $this.attr( 'data-customizer-event' ) );
                } );

            } );
        }
    };

    /**
     * Capture the instance of the Preview since it is private (this has changed in WordPress 4.0)
     *
     * @see https://github.com/WordPress/WordPress/blob/5cab03ab29e6172a8473eb601203c9d3d8802f17/wp-admin/js/customize-controls.js#L1013
     */
    OldPreview = api.Preview;
    api.Preview = OldPreview.extend( {
        initialize: function( params, options ) {
            // Store a reference to the Preview
            api.myCustomizerPreview.preview = this;

            // Call the old Preview's initialize function
            OldPreview.prototype.initialize.call( this, params, options );
        }
    } );

    // Document ready
    $( function () {
        // Initialize our Preview
        api.myCustomizerPreview.init();
    } );
} )( window.wp, jQuery );