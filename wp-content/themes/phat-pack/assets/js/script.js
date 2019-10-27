$(function($){
    if ($(window).innerWidth() > 500) {
        var cWidth = $(window).innerWidth() / 3;
        var $img = $('img');
        $img.load(function() {
            $('#gallery').masonry({
                columnWidth: cWidth,
                itemSelector: '.gallery__item'
            });
        });
    }
})

$(document).ready(function () {
    $('.hero__ttl').children('span').addClass('anm-rise');
})

// メニュー
$(function() {
    $('#menuBtn').click(function() {
        $('#menu').toggleClass('menu--visible');
        $('#menuBg').toggleClass('menuBg--visible');
        $('#menuBtn').toggleClass('menuBtn--close');
        $('#menu').find('.menuList__item').toggleClass('anm-rise');
        $('#menu').find('.contact').toggleClass('anm-rise')
    })
})