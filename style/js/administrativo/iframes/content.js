/* MANIPULADO "SRC" DO IFRAMES */
$(document).ready(function() {
    $('.menu-principal > ul li').on('click', function(event){
        event.preventDefault();

        var link = $(this).data('link')
        var iframeSrc = $('.content #myiframe').attr('src');
        
        if(iframeSrc == ""){

            $('.content #myiframe').attr('src', link);

        }
        else{

            $('.content #myiframe').attr('src', "");
            $('.content #myiframe').attr('src', link);

        }

        
        
    })
})
