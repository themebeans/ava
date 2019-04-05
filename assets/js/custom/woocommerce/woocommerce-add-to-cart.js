(function($) {

    'use strict';

    // Extend core script
    $.extend($.Ava, {

        /**
         *  Initialize scripts
         */
        atc_init: function() {
            var self = this;

            self.atcBind();
        },


        /**
         *  Bind
         */
         atcBind: function() {
            var self = this;

            // Bind: Single product "add to cart" buttons
            self.$body.on('click', '.single_add_to_cart_button', function(e) {
                var
                $thisButton = $(this),
                animating = false;

                if(!animating) {

                    animating =  true;

                    $('.cart-count').addClass('is-added');
                    $('.cart--button').addClass('is-added');
                    $('.minicart-panel__container').addClass('is-added');
                }

                $thisButton.addClass('is-added').find('path').eq(0).animate({
                        //draw the check icon
                        'stroke-dashoffset':0
                    }, 300, function(){
                        setTimeout(function(){
                            // updateCart();

                            $thisButton.removeClass('is-added').find('em').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                                //wait for the end of the transition to reset the check icon
                                $thisButton.find('path').eq(0).css('stroke-dashoffset', '19.79');
                                animating =  false;
                            });

                            if( $('.no-csstransitions').length > 0 ) {
                                // check if browser doesn't support css transitions
                                $thisButton.find('path').eq(0).css('stroke-dashoffset', '19.79');
                                animating =  false;
                            }
                        }, 600);
                    });

                // Make sure the add-to-cart button isn't disabled
                if ( $thisButton.is('.disabled') ) { console.log('Ava: Add-to-cart button disabled'); return; }

                // Only allow simple and variable product types
                if ($thisButton.hasClass('ava-simple-add-to-cart-button') || $thisButton.hasClass('ava-variable-add-to-cart-button')) {
                    e.preventDefault();

                    // Set button disabled state
                    $thisButton.attr('disabled', 'disabled');

                    var $productForm = $thisButton.closest('form');

                    if (!$productForm.length) {
                        return;
                    }

                    var data = {
                        product_id:             $productForm.find("input[name*='add-to-cart']").val(),
                        product_variation_data: $productForm.serialize()
                    };

                    // Trigger "adding_to_cart" event
                    self.$body.trigger('adding_to_cart', [$thisButton, data]);

                    // Submit product form via Ajax
                    self.AvaAjaxSubmitForm($thisButton, data);
                }
            });
        },


        /**
         *  Submit product form via Ajax
         */
        AvaAjaxSubmitForm: function($thisButton, data) {
            var self = this;

            if (!data.product_id) {
                console.log('Ava (Error): No Product ID Found');
                return;
            }

            var atcUrl = wc_add_to_cart_params.wc_ajax_url.toString().replace( 'wc-ajax=%%endpoint%%', 'add-to-cart=' + data.product_id + '&ava-ajax-add-to-cart=1' );

            // Submit product form via Ajax
            $.ajax({
                type: 'POST',
                url: atcUrl,
                data: data.product_variation_data,
                dataType: 'html',
                cache: false,
                headers: {'cache-control': 'no-cache'},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log('Ava: AJAX error - AvaAjaxSubmitForm() - ' + errorThrown);
                },
                success: function(response) {
                    var $response = $('<div>' + response + '</div>'),
                        cartHash = '';

                    // Get replacement elements/values
                    var fragments = {
                        '.cart-count': $response.find('.cart-count').prop('outerHTML'), // Header menu cart count
                        '#ava-cart-panel': $response.find('#ava-cart-panel').prop('outerHTML') // Cart panel
                    };

                    // Replace cart/shop fragments
                    self.shopReplaceFragments(fragments);

                    // Trigger "added_to_cart" event
                    self.$body.trigger('added_to_cart', [fragments, cartHash]);

                    // Remove button disabled state
                    $thisButton.removeAttr('disabled');

                    $response.empty();
                }
            });
        }

    });

    // Add extension so it can be called from $.AvaExtensions
    $.AvaExtensions.add_to_cart = $.Ava.atc_init;

})(jQuery);