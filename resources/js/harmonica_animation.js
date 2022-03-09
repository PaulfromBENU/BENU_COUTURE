$(function() {
    let harmonicaStatus = 'off';
    let columnClicked = 'off';
    let currentCol;

    $('.harmonica-bar').on('click', function() {
        if (harmonicaStatus == 'off') {
            //show full screen harmonica and use active class to keep top bar dark
            $('.harmonica-menu').fadeIn();
            $('.harmonica-bar').addClass('harmonica-bar--active');
            harmonicaStatus = 'on';
        } else {
            $('.harmonica-menu').fadeOut();
            $('.harmonica-bar').removeClass('harmonica-bar--active');
            harmonicaStatus = 'off';
            if (columnClicked == 'on') {
                $('.harmonica-menu__content__col__open').fadeOut();
                $('.harmonica-menu__content__col__closed').fadeIn();
                $('.harmonica-menu__content__col').css('width', '12.5%');
            }
        }
    });
    $('.harmonica-bar__close').on('click', function() {
        $('.harmonica-menu').fadeOut();
        $('.harmonica-bar').removeClass('harmonica-bar--active');
        harmonicaStatus = 'off';
        if (columnClicked == 'on') {
            $('.harmonica-menu__content__col__open').fadeOut();
            $('.harmonica-menu__content__col__closed').fadeIn();
            $('.harmonica-menu__content__col').css('width', '12.5%');
        }
    });
    $('.harmonica-bar__title--active').on('click', function() {
        $('.harmonica-menu').fadeOut();
        $('.harmonica-bar').removeClass('harmonica-bar--active');
        harmonicaStatus = 'off';
        if (columnClicked == 'on') {
            $('.harmonica-menu__content__col__open').fadeOut();
            $('.harmonica-menu__content__col__closed').fadeIn();
            $('.harmonica-menu__content__col').css('width', '12.5%');
        }
    });

    $(document).on('keyup',function(e) {
        if (e.keyCode == 27) {
           if (harmonicaStatus == 'on') {
                $('.harmonica-menu').fadeOut();
                $('.harmonica-bar').removeClass('harmonica-bar--active');
                harmonicaStatus = 'off';
                if (columnClicked == 'on') {
                    $('.harmonica-menu__content__col__open').fadeOut();
                    $('.harmonica-menu__content__col__closed').fadeIn();
                    $('.harmonica-menu__content__col').css('width', '12.5%');
                }
            }
        }
    });
    
    //Display on hover --------------
    // $('.harmonica-menu__content__col').on('mouseenter', function() {
    //     let currentCol = this;
    //     $('.harmonica-menu__content__col__closed', currentCol).fadeOut(400, function() {
    //         $('.harmonica-menu__content__col__open', currentCol).fadeIn();
    //     });
    // });

    // $('.harmonica-menu__content__col').on('mouseleave', function() {
    //     let currentCol = this;
    //     $('.harmonica-menu__content__col__open', currentCol).fadeOut(100, function() {
    //         $('.harmonica-menu__content__col__closed', currentCol).fadeIn('normal');
    //     });
    // });

    //Display on click, column gets wider on hover if set in CSS -----------------
    $('.harmonica-menu__content__col').on('click', function() {
        if (currentCol != this) {
            if (columnClicked == 'on') {
                $('.harmonica-menu__content__col__open').fadeOut();
                $('.harmonica-menu__content__col__closed').fadeIn();
                $('.harmonica-menu__content__col').css('width', '12.5%');
            }
            currentCol = this;
            $(currentCol).css('width', '43%');
            $('.harmonica-menu__content__col__closed', currentCol).fadeOut(400, function() {
                $('.harmonica-menu__content__col__open', currentCol).fadeIn();
                columnClicked = 'on';
            });
        } else if (columnClicked == 'off') {
            currentCol = this;
            $(this).css('width', '43%');
            $('.harmonica-menu__content__col__closed', currentCol).fadeOut(400, function() {
                $('.harmonica-menu__content__col__open', currentCol).fadeIn();
                columnClicked = 'on';
            });
        } else {
            $('.harmonica-menu__content__col__open').fadeOut();
            $('.harmonica-menu__content__col__closed').fadeIn();
            $('.harmonica-menu__content__col').css('width', '12.5%');
            columnClicked = 'off';
        }
    });
});