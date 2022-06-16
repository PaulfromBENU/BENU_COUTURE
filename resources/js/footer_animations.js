$(function() {
    if ($('.footer-connect__pictures').length) {
        $('.footer-connect__pictures').slick({
        slidesToShow: 8,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        });
    }
})
