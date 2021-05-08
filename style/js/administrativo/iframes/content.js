/* MANIPULADO "SRC" DO IFRAMES */
$(document).ready(function() {
    
    $('.menu-principal > ul li, .card-title > a').on('click', function(event){
        event.preventDefault();

        var link = $(this).data('link')
        var iframeSrc = $('.content #myiframe').attr('src');

        window.parent.$('div#selected ul > li').removeClass('menu-is-selected');

        window.parent.$('.content #myiframe').attr('src', "");
        window.parent.$('.content #myiframe').attr('src', link);
                  
    })
})
