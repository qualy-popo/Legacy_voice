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

    $('.reason_block').matchHeight();
});

//Voice Detail Image Modal Box
$(".voice_bg_img").click(function () {
    $("#modal").html($(this).prop("outerHTML"));
    $("#modal").fadeIn(200);
    return false;
  });
  
  $("#modal").click(function () {
    $("#modal").fadeOut(200);
    return false;
  });