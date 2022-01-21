$(function() {
    let harmonicaStatus = 'off';
    $('.harmonica-bar').on('click', function() {
        if (harmonicaStatus == 'off') {
            $('.harmonica-menu').fadeIn();
            $('.harmonica-bar').addClass('harmonica-bar--active');
            harmonicaStatus = 'on';
        } else {
            $('.harmonica-menu').fadeOut();
            $('.harmonica-bar').removeClass('harmonica-bar--active');
            harmonicaStatus = 'off';
        }
    });
    $('.harmonica-bar__close').on('click', function() {
        $('.harmonica-menu').fadeOut();
        $('.harmonica-bar').removeClass('harmonica-bar--active');
        harmonicaStatus = 'off';
    });
    $('.harmonica-bar__title--active').on('click', function() {
        $('.harmonica-menu').fadeOut();
        $('.harmonica-bar').removeClass('harmonica-bar--active');
        harmonicaStatus = 'off';
    });
    
    $('.harmonica-menu__content__col').on('mouseenter', function() {
        let currentCol = this;
        $('.harmonica-menu__content__col__closed', currentCol).fadeOut(400, function() {
            $('.harmonica-menu__content__col__open', currentCol).fadeIn();
        });
        // $('.harmonica-menu__content__col__closed', currentCol).fadeOut(400);
        // $('.harmonica-menu__content__col__open', currentCol).delay(400).fadeIn();

    });

    $('.harmonica-menu__content__col').on('mouseleave', function() {
        let currentCol = this;
        // $('.harmonica-menu__content__col__open', currentCol).hide();
        // $('.harmonica-menu__content__col__closed', currentCol).fadeIn('normal');
        $('.harmonica-menu__content__col__open', currentCol).fadeOut(100, function() {
            $('.harmonica-menu__content__col__closed', currentCol).fadeIn('normal');
        });
    });

    $(document).on('keyup',function(e) {
        if (e.keyCode == 27) {
           if (harmonicaStatus == 'on') {
                $('.harmonica-menu').fadeOut();
                $('.harmonica-bar').removeClass('harmonica-bar--active');
                harmonicaStatus = 'off';
            }
        }
    });
});