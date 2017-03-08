
/*
 Inicializa los Funciones Generales
 Author: Yunior Concepcion lopez
 Author Email: yuniorcl@gmail.com
 */

jQuery(document).ready(function ($) {


    $(".eventos-paginacion").delegate(".paginarPostNext", "click", function (e) {
        e.preventDefault();
       
        var hrefUrl = $("#cnadf_next_post").val();
        paginarpost(hrefUrl);

    });

    $(".eventos-paginacion").delegate(".paginarPostPrev", "click", function (e) {
        e.preventDefault();

        var hrefUrl = $("#cnadf_prev_post").val();
        paginarpost(hrefUrl);

    });

    function paginarpost(hrefUrl) {

        $.post(candfefbkPaginado.url, {nonce: candfefbkPaginado.nonce, action: 'candf_efbk_paginado', hrefUrl: hrefUrl}, function (response) {
            if (response.success) {
                $("#contenedor_tarjetas").html(response.html);
            } else {
                console.log(response.message);
            }
        });

    };

     $("#contenedor_tarjetas").delegate(".voltear-card", "click", function (e) {    
        e.preventDefault();

         var $card = $(this).closest('.card-container');        
        if ($card.hasClass('hover')) {
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }

    });
    
     $("#contenedor_tarjetas").delegate('[rel="tooltip"]', 'hover',  function (e) { 
           $('[rel="tooltip"]').tooltip();
     });
     $('[rel="tooltip"]').tooltip();
       
});


