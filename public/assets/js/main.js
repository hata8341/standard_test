$(function () {
    $('.opinion-out').hide();
    $('.opinion').hover(
    function () {
        $(this).children('.opinion-out').fadeIn('fast');
    },
    function () {
        $(this).children('.opinion-out').fadeOut('fast');
    });
});
