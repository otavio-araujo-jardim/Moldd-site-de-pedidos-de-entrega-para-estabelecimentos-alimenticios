/**
 * Created by FERNANDO on 31/01/2017.
 */

$(function() {
    $('.parallax').each(function () {
        var $parallax = $(this);
        $(window).scroll(function () {
            var posY = -($(window).scrollTop() / $parallax.data('speed'));
            var posB = '50% ' + posY + 'px';
            $parallax.css('background-position',posB);
        });
    });
});
