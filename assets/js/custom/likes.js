jQuery(document).ready(function($) {
    "use strict";
    jQuery('body').on('click','.jm-post-like',function(event){
        event.preventDefault();
        var heart = jQuery(this);
        var post_id = heart.data("post_id");
        var string = $("#likes-count");
        var wrapper = $(".likes-wrapper");

        jQuery.ajax({
            type: "post",
            url: ava_localization.url,
            data: "action=jm-post-like&nonce="+ava_localization.nonce+"&ava_post_like=&post_id="+post_id,
            success: function(count){
                if( count.indexOf( "already" ) !== -1 ) {
                    var lecount = count.replace("already","");
                    
                    if (lecount === "0") {
                        lecount = "0";
                    }

                    heart.prop('title', 'Like');
                    wrapper.removeClass("liked");
                    string.html( lecount );
                }
                else {
                    heart.prop('title', 'Unlike');
                    wrapper.addClass("liked");
                    string.html( count );
                }
            }
        });
    });
});