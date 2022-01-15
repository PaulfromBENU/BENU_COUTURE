$(function() {
    let newTop = '130px';
    $('#header-bird-pic').css('top', newTop);
    setInterval(function() {
        newTop = 60 + 150*Math.random();
        newTop += 'px';
        $('#header-bird-pic').css('top', newTop);
    }, 2500);
});