$(document).ready(function () {
    $('.buttonInTitle').hover(function () {
        $(this).addClass('bounceIn animated');

    }, function () {
        $(this).removeClass('bounceIn animated');
    });
})