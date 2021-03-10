$(document).ready(function() {

    $('.btn-menu').click(function() {
        if($('.menu').is('.active')){
            $('.menu').removeClass('active');
            $('.btn-menu').removeClass('active');
            $('.header-principal').removeClass('menu-open');
            $('.content').removeClass('active');
        }
        else{
            $('.menu').addClass('active');
            $('.btn-menu').addClass('active');
            $('.header-principal').addClass('menu-open');
            $('.content').addClass('active');

        }
    })

})