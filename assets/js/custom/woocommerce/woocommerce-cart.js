(function($) {
    
    'use strict';
    
    // Extend core script
    $.extend($.Ava, {
        
        /**
         *  Initialize cart scripts
         */
        cart_init: function() {
            var self = this;
        
            // Init quantity buttons
            self.quantityInputsBindButtons($('.woocommerce'));
        },
        
        /**
         *  Trigger update button
         */
        cartTriggerUpdate: function() {
            // Get original update button
            var $wooUpdateButton = $('div.woocommerce > form input[name="update_cart"]');

            // Remove "disabled" state/attribute
            $wooUpdateButton.prop('disabled', false);

            // Trigger "click" event
            setTimeout(function() { // Use a small timeout to make sure the element isn't disabled
                $wooUpdateButton.trigger('click');
            }, 100);
        }
        
    });
    
    // Add extension so it can be called from $.AvaExtensions
    $.AvaExtensions.cart = $.Ava.cart_init;
    
})(jQuery);