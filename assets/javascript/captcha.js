
(function($){

    jQuery.fn.extend({
        check: function() {
            return this.each(function() { this.checked = true; });
        },
        uncheck: function() {
            return this.each(function() { this.checked = false; });
        }
    });
    
    
    $.fn.Captcha = function(vars) {       
        var element     = this;
        var spans       = $("#" + element[0].id + " div span");
        var radios      = $("#" + element[0].id + " div span input");
        var images      = $("#" + element[0].id + " div .img");
        // hide radios //
        spans.css({'display':'none'});
        // show images //
        images.css({'display':'block'});
        
        images.each(function(i) {
            $(images[i]).click(function() {
               images.css({'background-position':'bottom left'});
               $(images[i]).css({'background-position':'top left'});
               $(radios[i]).check();
            });
        });
        
    }

})(jQuery);