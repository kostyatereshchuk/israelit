jQuery(function($) {
    $('.site-header .navbar-toggle').click(function() {
        var nav = $('.site-header .navbar-nav');

        if (nav.hasClass('active')) {
            nav.stop().slideUp('fast');
            nav.removeClass('active')
        } else {
            nav.stop().slideDown('fast');
            nav.addClass('active')
        }
    });
});
