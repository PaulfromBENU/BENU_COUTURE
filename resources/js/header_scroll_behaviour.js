$(function() {
    $(window).on('scroll', function() {
        var scrollTop = $(window).scrollTop();
        if ( scrollTop > 80 ) { 
            $('.header__logo').hide();
            $('.header__logo--scroll').show();
            $('.header__top-menu').hide();
            $('.header-group').css('max-height', '91px'); //Added to ensure border bottom position remains fixed
            // $('.header__top-menu').css('height', '0px');
        } else {
            $('.header__logo--scroll').hide();
            $('.header-group').css('max-height', '150px');
            if ($(window).width() > 768) {
                $('.header__logo--desktop').show();
                $('.header__top-menu').show();
            } else {
                $('.header__logo--mobile').show();
            }
        }
    });
});