jQuery(function($) {
    $(function() {
        var scroll_func = function() {
            $('html,body').animate({ scrollTop: $($(this).attr("href")).offset().top }, 'slow', 'swing');
            return false;
        }
        $(function() {
            $('.anchor').click(scroll_func);
        });
    });
});


