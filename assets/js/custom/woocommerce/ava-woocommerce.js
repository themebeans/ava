(function($) {
    
    'use strict';
    
    if (!$.AvaExtensions)
        $.AvaExtensions = {};
    
    function AvaTheme() {
        var self = this;
        
        // CSS Classes
        self.classMobileMenuOpen = 'mobile-menu-open';
        self.classWidgetPanelOpen = 'widget-panel-open';
        
        // Page elements
        self.$window = $(window);
        self.$document = $(document);
        self.$html = $('html');
        self.$body = $('body');

        // Page overlays
        self.$pageOverlay = $('#cart--overlay');
        self.$widgetPanelOverlay = $('#cart--overlay');
        
        // Widget panel
        self.$widgetPanel = $('#minicart-panel');
        self.widgetPanelAnimSpeed = 250;
        
        // Slide panels animation speed
        self.panelsAnimSpeed = 200;
        
        // Initialize scripts
        self.init();
    };
    
    
    AvaTheme.prototype = {
    
        /**
         *  initialize
         */
        init: function() {
            var self = this;
            
            // Init history/back-button support (push/pop-state)
            if (self.$html.hasClass('history')) {
                self.hasPushState = true;
                window.history.replaceState({nmShop: true}, '', window.location.href);
            } else {
                self.hasPushState = false;
            }
            
            // Init widget panel
            self.widgetPanelPrep();
            
            // Check for old IE browser (IE10 or below)
            var ua = window.navigator.userAgent,
                msie = ua.indexOf('MSIE ');
            if (msie > 0) {
                self.$html.addClass('ava-old-ie');
            }
            
            // Check for touch device (modernizr)
            self.isTouch = (self.$html.hasClass('touch')) ? true : false;
            
            // Load extension scripts
            self.loadExtension();
            
            self.bind();
        },
        
        
        /**
         *  Extensions: Load scripts
         */
        loadExtension: function() {
            var self = this;
            
            // Shop scripts
            if ($.AvaExtensions.shop) {
                $.AvaExtensions.shop.call(self);
            }
                
            // Shop/single-product scripts
            if ($.AvaExtensions.singleProduct) {
                $.AvaExtensions.singleProduct.call(self);
            }
                
            // Cart scripts
            if ($.AvaExtensions.cart) {
                $.AvaExtensions.cart.call(self);
            }
            
            // Checkout scripts
            if ($.AvaExtensions.checkout) {
                $.AvaExtensions.checkout.call(self);
            }
        },
        
        
        /**
         *  Helper: Is page vertically scrollable?
         */
        pageIsScrollable: function() {
            return document.body.scrollHeight > document.body.clientHeight;
        },
        
        
        /**
         *  Helper: Get parameter from current page URL
         */
        urlGetParameter: function(param) {
            var url = decodeURIComponent(window.location.search.substring(1)),
                urlVars = url.split('&'),
                paramName, i;

            for (i = 0; i < urlVars.length; i++) {
                paramName = urlVars[i].split('=');
                if (paramName[0] === param) {
                    return paramName[1] === undefined ? true : paramName[1];
                }
            }
        },
        
        
        /**
         *  Helper: Add/update a key-value pair in the URL query parameters 
         */
        updateUrlParameter: function(uri, key, value) {
            // Remove #hash before operating on the uri
            var i = uri.indexOf('#'),
                hash = i === -1 ? '' : uri.substr(i);
            uri = (i === -1) ? uri : uri.substr(0, i);
            
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i"),
                separator = (uri.indexOf('?') !== -1) ? "&" : "?";
            
            if (uri.match(re)) {
                uri = uri.replace(re, '$1' + key + "=" + value + '$2');
            } else {
                uri = uri + separator + key + "=" + value;
            }
            
            return uri + hash; // Append #hash
        },
        
        
        /**
         *  Helper: Set browser history "pushState" (AJAX url)
         */
        setPushState: function(pageUrl) {
            var self = this;
            
            // Set browser "pushState"
            if (self.hasPushState) {
                window.history.pushState({nmShop: true}, '', pageUrl);
            }
        },
        

        /**
         *  Bind scripts
         */
        bind: function() {
            var self = this;
            
            
            /* Bind: Widget panel */
            if (self.$widgetPanel.length) {
                self.widgetPanelBind();
            }
            
            /* Bind: Page overlay */
            $('#cart--overlay, #cart--overlay').bind('click', function() {
                
                var $this = $(this);
                
                self.widgetPanelHide();

                $this.addClass('fade-out');

                setTimeout(function() {
                    $this.removeClass('show fade-out');
                }, self.panelsAnimSpeed);

            });
        },
        
        
        /**
         *  Widget panel: Prepare
         */
        widgetPanelPrep: function() {
            var self = this;
            
            // Cart panel: Set Ajax state
            self.cartPanelAjax = null;
            
            // Cart panel: Bind quantity-input buttons
            self.quantityInputsBindButtons(self.$widgetPanel);
            
            
            // Quantity inputs: Bind "blur" event
            self.$widgetPanel.on('blur', 'select.qty', function() {
                var $quantityInput = $(this),
                    currentVal = parseFloat($quantityInput.val()),
                    max = parseFloat($quantityInput.attr('max'));
                
                // Validate input values
                if (currentVal === '' || currentVal === 'NaN') { currentVal = 0; }
                if (max === 'NaN') { max = ''; }
                
                // Make sure the value is not higher than the max value
                if (currentVal > max) { 
                    $quantityInput.val(max);
                    currentVal = max;
                };
                
                // Is the quantity value more than 0?
                if (currentVal > 0) {
                    self.widgetPanelCartUpdate($quantityInput);
                }
            });
            
            // Quantity inputs: Bind "nm_qty_change" event
            self.$document.on('nm_qty_change', function(event, quantityInput) {
                // Is the widget-panel open?
                if (self.$body.hasClass(self.classWidgetPanelOpen)) {
                    self.widgetPanelCartUpdate($(quantityInput));
                }
            });
        },
        
        
        /**
         *  Widget panel: Bind
         */
        widgetPanelBind: function() {
            var self = this;
            
            // Touch event handling
            if (self.isTouch) {
                
                // Bind: Widget panel overlay "touchmove" event
                self.$widgetPanelOverlay.on('touchmove', function(e) {
                    e.preventDefault(); // Prevent default touch event
                });
                
                // Bind: Widget panel "touchmove" event
                self.$widgetPanel.on('touchmove', function(e) {             
                    e.stopPropagation();
                });
            }
            
            /* Bind: "Cart" buttons */
            $('#cart--button').bind('click', function(e) {
                e.preventDefault();                                     
                self.widgetPanelShow();
            });
            
            /* Bind: "Continue shopping" button */
            self.$widgetPanel.on('click.AvaCartPanelClose', '#cart--button-continue', function(e) {
                e.preventDefault();
                $('#cart--overlay').trigger('click');
            });
            
            /* Bind: Cart panel - Remove product */
            self.$widgetPanel.on('click', '#ava-cart-panel .cart_list .remove', function(e) {
                e.preventDefault();
                // Is an Ajax request already running?
                if (! self.cartPanelAjax) {
                    self.widgetPanelCartRemoveProduct(this);
                }
            });
        },
        
        
        /**
         *  Widget panel: Show
         */
        widgetPanelShow: function(showLoader) {
            var self = this;
            
            self.$body.toggleClass('widget-panel-opening '+self.classWidgetPanelOpen);
            self.$widgetPanelOverlay.toggleClass('show');
            
            setTimeout(function() {
                self.$body.removeClass('widget-panel-opening');
            }, self.widgetPanelAnimSpeed);
        },
        
        
        /**
         *  Widget panel: Hide
         */
        widgetPanelHide: function() {
            var self = this;
            
            self.$body.addClass('widget-panel-closing');
            self.$body.removeClass(self.classWidgetPanelOpen);
            
            setTimeout(function() {
                self.$body.removeClass('widget-panel-closing');
            }, self.widgetPanelAnimSpeed);
        },
        
        
        /**
         *  Widget panel: Cart - Remove product
         */     
        widgetPanelCartRemoveProduct: function(button) {
            var self = this,
                $button = $(button),
                $itemLi = $button.closest('li'),
                $itemUl = $itemLi.parent('ul'),
                cartItemKey = $button.data('cart-item-key');
            
            // Show thumbnail loader
            $itemLi.closest('li').addClass('loading');
            
            self.cartPanelAjax = $.ajax({
                type: 'POST',
                url: ava_wp_vars.ava_ajaxUrl,
                data: {
                    action: 'ava_woocommerce_minicart_remove_product',
                    cart_item_key: cartItemKey
                },
                dataType: 'json',
                // Note: Disabling these to avoid "origin policy" AJAX error in some cases
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log('NM: AJAX error - widgetPanelCartRemoveProduct() - ' + errorThrown);
                    $itemLi.closest('li').removeClass('loading'); // Hide thumbnail loader
                },
                complete: function(response) {
                    self.cartPanelAjax = null; // Reset Ajax state
                    
                    var json = response.responseJSON;
                    
                    if (json && json.status === '1') {
                        // Fade-out cart item
                        $itemLi.css({'-webkit-transition': '0.2s opacity ease', transition: '0.2s opacity ease', opacity: '0'});
                        
                        setTimeout(function() {
                            // Slide-up cart item
                            $itemLi.css('display', 'block').slideUp(150, function() {
                                $itemLi.remove();
                                
                                // Show "cart empty" elements?
                                var $cartLis = $itemUl.children('li');
                                if ($cartLis.length == 1) { $('#ava-cart-panel').addClass('ava-cart-panel-empty'); }
                                
                                // Replace cart/shop fragments
                                self.shopReplaceFragments(json.fragments);
                                
                                // Trigger "added_to_cart" event to make sure the HTML5 "sessionStorage" fragment values are updated
                                self.$body.trigger('added_to_cart', [json.fragments, json.cart_hash, false]);
                            });
                        }, 160);
                    } else {
                        console.log("NM: Couldn't remove product from cart");
                    }
                }
            });
        },
        
        
        /**
         *  Widget panel: Cart - Update quantity
         */
        widgetPanelCartUpdate: function($quantityInput) {
            var self = this;
            
            // Is an Ajax request already running?
            if (self.cartPanelAjax) {
                self.cartPanelAjax.abort(); // Abort current Ajax request
            }
            
            // Show thumbnail loader
            $quantityInput.closest('li').addClass('loading');
            
            // Ajax data
            var data = {
                action: 'ava_cart_panel_update'
            };
            data[$quantityInput.attr('name')] = $quantityInput.val();
            
            self.cartPanelAjax = $.ajax({
                type: 'POST',
                url: ava_wp_vars.ava_ajaxUrl,
                data: data,
                dataType: 'json',
                complete: function(response) {
                    self.cartPanelAjax = null; // Reset Ajax state
                    
                    var json = response.responseJSON;
                    
                    if (json && json.status === '1') {
                        self.shopReplaceFragments(json.fragments); // Replace cart/shop fragments
                    }
                    
                    // Hide any visible thumbnail loaders
                    $('#ava-cart-panel .cart_list').children('.loading').removeClass('loading');
                }
            });
        },
        
        
        /**
         *  Shop: Replace fragments
         */
        shopReplaceFragments: function(fragments) {
            var $fragment;
            $.each(fragments, function(selector, fragment) {
                $fragment = $(fragment);
                if ($fragment.length) {
                    $(selector).replaceWith($fragment);
                }
            });
        },
        
        
        /**
         *  Quantity inputs: Bind buttons
         */
        quantityInputsBindButtons: function($container) {
            var self = this;
            
            /* 
             *  Bind buttons click event
             *  Note: Modified code from WooCommerce core (v2.2.6)
             */
            $container.off('click.nmQty').on('click.nmQty', 'select.qty', function() {
                // Get elements and values
                var $this       = $(this),
                    $qty        = $this.closest('.quantity').find('.qty'),
                    currentVal  = parseFloat($qty.val()),
                    max         = parseFloat($qty.attr('max')),
                    min         = parseFloat($qty.attr('min')),
                    step        = $qty.attr('step');

                self.quantityInputsTriggerEvents($qty);
            });
        },
        
        
        /**
         *    Quantity inputs: Trigger events
         */
        quantityInputsTriggerEvents: function($qty) {
            var self = this;
            
            // Trigger quantity input "change" event
            $qty.trigger('change');

            // Trigger custom event
            self.$document.trigger('nm_qty_change', $qty);
        },
    };
    
    
    // Add core script to $.Ava so it can be extended
    $.Ava = AvaTheme.prototype;
    
    $(document).ready(function() {
        new AvaTheme();
    });
    
    
})(jQuery);
