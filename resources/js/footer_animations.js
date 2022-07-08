$(function() {
    let picturesNumber;
    if ($(window).width() > 768) {
        picturesNumber = 8;
    } else {
        picturesNumber = 2;
    }

    if ($('.footer-connect__pictures').length) {
        $('.footer-connect__pictures').slick({
        slidesToShow: picturesNumber,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        });
    }
})
