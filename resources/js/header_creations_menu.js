$(function() {
    let creationsBarStatus = 'off';
    let fullMenuStatus = 'off';
    $('#creations-nav-toggle').on('click', function() {
        $(this).toggleClass('header__main-nav__btn--active');
        //$('#creations-nav-toggle path').toggleClass('svg-primary-white--active');
        if (creationsBarStatus == 'off') {
            $('.creations-navbar').fadeIn();
            creationsBarStatus = 'on';
        } else {
            $('.creations-navbar').fadeOut();
            creationsBarStatus = 'off';
        }
    })

    $('#creations-nav-toggle').on('mouseenter', function() {
        $('#creations-nav-toggle path').addClass('svg-primary-white--active');
    });

    $('#creations-nav-toggle').on('mouseleave', function() {
        if (creationsBarStatus == 'off') {
            $('#creations-nav-toggle path').removeClass('svg-primary-white--active');
        }
    });

    $('.creations-navbar__nav__toggle').on('mouseenter', function() {
        //Remove all menus to avoid multiple display
        $('.creations-navbar__nav__toggle').removeClass('creations-navbar__nav__toggle--active');

        //Add menu of hovered toggle
        $(this).addClass('creations-navbar__nav__toggle--active');
        $('.creations-navbar__menu').css('max-height', '280px');
        fullMenuStatus = 'on';
    });

    $('#nav-toggle-adult').on('mouseenter', function() {
        $('.creations-navbar__menu__list').hide();
        $('.navbar-list-adult').show();
    });

    $('#nav-toggle-woman').on('mouseenter', function() {
        $('.creations-navbar__menu__list').hide();
        $('.navbar-list-woman').show();
    });

    $('#nav-toggle-man').on('mouseenter', function() {
        $('.creations-navbar__menu__list').hide();
        $('.navbar-list-man').show();
    });

    $('#nav-toggle-child').on('mouseenter', function() {
        $('.creations-navbar__menu__list').hide();
        $('.navbar-list-child').show();
    });

    $('#nav-toggle-accessories').on('mouseenter', function() {
        $('.creations-navbar__menu__list').hide();
        $('.navbar-list-accessories').show();
    });

    $('#nav-toggle-home').on('mouseenter', function() {
        $('.creations-navbar__menu__list').hide();
        $('.navbar-list-home').show();
    });

    $('.creations-navbar__menu').on('mouseleave', function() {
        $('.creations-navbar__menu').css('max-height', '0px');
        $('.creations-navbar__nav__toggle').removeClass('creations-navbar__nav__toggle--active');
        fullMenuStatus = 'off';
        //$('.creations-navbar__menu__list').fadeOut('fast');
    });

    $('.creations-navbar__nav__toggle').on('click', function() {
        if (fullMenuStatus == 'on') {
            $('.creations-navbar__menu').css('max-height', '0px');
            $('.creations-navbar__nav__toggle').removeClass('creations-navbar__nav__toggle--active');
            fullMenuStatus = 'off';
        }
    });
});