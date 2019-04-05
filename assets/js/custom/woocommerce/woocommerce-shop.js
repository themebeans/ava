(function($) {

    'use strict';

    // Extend core script
    $.extend($.Ava, {

        /**
         *  Initialize scripts
         */
        shop_init: function() {
            var self = this;

            // Only bind if add-to-cart redirect is disabled
            if (typeof wc_add_to_cart_params !== 'undefined' && wc_add_to_cart_params.cart_redirect_after_add !== 'yes') {
                /* Add-to-cart event: Show mini cart with loader overlay */
                self.$body.on('adding_to_cart', function(event, $button, data) {
                });
                /* Add-to-cart event: Hide mini cart loader overlay */
                self.$body.on('added_to_cart', function(event, fragments, cartHash) {
                    // Is widget/cart panel enabled?
                    if (self.$widgetPanel.length) {
                    } else {
                        // Hide widget/cart panel overlay
                        self.$widgetPanelOverlay.trigger('click');
                    }
                });
            } else {
                // Disable default WooCommerce AJAX add-to-cart event if redirect is enabled
                self.$document.off( 'click', '.add_to_cart_button' );
            }


            // Load extension scripts
            self.shopLoadExtension();
        },


        /**
         *  Shop: Load extension scripts
         */
        shopLoadExtension: function() {
            var self = this;

            /* Extension: Add to cart */
            if (ava_wp_vars.ava_shopAjaxAddToCart !== '0' && $.AvaExtensions.add_to_cart) {
                $.AvaExtensions.add_to_cart.call(self);
            }
        },

    });

    // Add extension so it can be called from $.AvaExtensions
    $.AvaExtensions.shop = $.Ava.shop_init;

})(jQuery);