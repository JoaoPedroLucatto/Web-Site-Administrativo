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
    });


    /* DEIXA SELECIONADO DE ACORDO COM O CLICK */
    $('div.menu-principal ul > li').on('click', function(){

        $('div.menu-principal ul > li').each(function(){

            $(this).removeClass('menu-is-selected');

        });

        $(this).addClass('menu-is-selected');
    });

})