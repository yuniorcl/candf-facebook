<?php

/*
 * Vista del Plugin
 * Author: Code&Friends
 * Author Email: codeandfriends@gmail.com
 * Author: Yunior Concepcion lopez
 * Author Email: yuniorcl@gmail.com
 * 
 * Notación de las iniciales 
 * candf: Code&Friends
 * efbk: Eventos de Facebook  
 */

/**
 * Pinta las las tarjetas
 * Yunior.
 * 
 * @param type $obj
 * @return type html
 */
function pintarTarjetas($obj = array()) {

    $html = '';

    // count the number of events
    $event_count = count($obj['data']);

    for ($x = 0; $x < $event_count; $x++) {

        // set timezone
        date_default_timezone_set('1');

        $dia = date('d', strtotime($obj['data'][$x]['created_time']));
        $mesLetra = date('M', strtotime($obj['data'][$x]['created_time']));

        $start_date = date('d/m/Y', strtotime($obj['data'][$x]['created_time']));
       
        $pic_big = isset($obj['data'][$x]['full_picture']) ? $obj['data'][$x]['full_picture'] : "";
       
        $nameShort = substr($obj['data'][$x]['name'], 0, 20);
        $name = $obj['data'][$x]['name'];
        $descriptionShort = isset($obj['data'][$x]['message']) ? substr($obj['data'][$x]['message'], 0, 70)."..." : "";
        $description = isset($obj['data'][$x]['message']) ? substr($obj['data'][$x]['message'], 0, 250) : "";

        // place
        
        $city = isset($obj['data'][$x]['place']['location']['city']) ? $obj['data'][$x]['place']['location']['city'] : "";
        $street = isset($obj['data'][$x]['place']['location']['street']) ? $obj['data'][$x]['place']['location']['street'] : "";
        $country = isset($obj['data'][$x]['place']['location']['country']) ? $obj['data'][$x]['place']['location']['country'] : "";
        $zip = isset($obj['data'][$x]['place']['location']['zip']) ? $obj['data'][$x]['place']['location']['zip'] : "";
        $latitud = isset($obj['data'][$x]['place']['location']['latitude']) ? $obj['data'][$x]['place']['location']['latitude'] : "";
        $longitud = isset($obj['data'][$x]['place']['location']['longitude']) ? $obj['data'][$x]['place']['location']['longitude'] : "";

        $location = "";
        if ($street && $city && $country && $zip) {
            $location = "https://maps.google.com/?q="."{$zip},{$street},{$city}, {$country},{$latitud},{$longitud}";
        }

        //
        $cantidadLike = isset($obj['data'][$x]['likes']) ? $obj['data'][$x]['likes']['summary']['total_count'] : 0;
        
        $link = isset($obj['data'][$x]['link']) ? $obj['data'][$x]['link'] : "";

        $html .= '<div class="col-xs-12 col-md-6 col-xl-4 col-lg-3 tarjetas-efkb-presonalizadas">';
        $html .= '<div class="card-container manual-flip">';
        $html .= '<div class="card">';
        $html .= '<div class="front">';
        $html .= '<div class="cover">';
        $html .= '<img src="' . $pic_big . '"/>';
        $html .= '</div>';

        $html .= '<div class="date-month">';
        $html .= '<span class="date">' . $dia . '</span><span class="month">' . $mesLetra . '</span>';
        $html .= '</div>';

        $html .= '<div class="content">';
        $html .= '<div class="main">';
        $html .= '<h3 class="name">'.$nameShort.'</h3>';
        $html .= '<p class="text-center">'.$descriptionShort.'</p>';
        $html .= '</div>';

        $html .= '<div class="footer">';
        $html .= '<span class="likes-efbk" rel="tooltip" title="Likes">';
        $html .= '<i class="fa fa-thumbs-o-up" aria-hidden="true"> '.$cantidadLike.'</i>';
        $html .= '</span>';
        $html .= '<button class="btn btn-simple  voltear-card" rel="tooltip" title="Voltear tarjeta para ver más información">';
        $html .= '<i class="fa fa-mail-forward"></i> Voltear';
        $html .= '</button>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        //Panel back
        $html .= '<div class="back">';
        $html .= '<div class="header">';
        $html .= '<h5 class="motto">'.$name.'</h5>';
        $html .= '</div>';

        $html .= '<div class="content">';
        $html .= '<div class="main">';        
        $html .= '<p class="text-center">'.$description.'...</p>';
        $html .= '<div class="stats-container">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="footer">';
        $html .= '<button class="btn btn-simple voltear-card" rel="tooltip" title="Pantalla principal">';
        $html .= '<i class="fa fa-reply"></i> Voltear';
        $html .= '</button>';
        $html .= '<div class="social-links text-right">';
        $html .= '<a href="'.$link.'" class="facebook"><i class="fa fa-facebook fa-fw" rel="tooltip" data-placement="top" title="Enlace a Facebook"></i></a>';
        if($location != "") {
           $html .= '<a href="'.$location.'" class="facebook"><i class="fa fa-map-marker fa-fw" rel="tooltip" data-placement="top" title="Ubicación"></i></a>'; 
        }        
        $html .= '<a href="#" class="google"><i class="fa fa-calendar fa-fw" rel="tooltip" data-placement="top" title="'.$start_date.'"></i></a>';
        $html .= ' </div>';
        $html .= ' </div>';
        $html .= ' </div>';

        $html .= ' </div>';
        $html .= ' </div>';
        $html .= ' </div>';
    }

   // $html .= '</table></div>';

    //Pintar paginado
    $pintarPaginado = 0;
    if (get_option("candf_efbk_show_paginacion") != "") {
        $pintarPaginado = get_option("candf_efbk_show_paginacion");
    }
    
   

    if (isset($obj["paging"]) && $pintarPaginado == 1) {
        $paginado = $obj["paging"];

        $next = $paginado["next"];
        $prev = $paginado["previous"];

        $html .= '<input type = "hidden" name = "cnadf_next_post" id = "cnadf_next_post" value = "' . $next . '" readonly = "readonly" disabled = "disabled" />';
        $html .= '<input type = "hidden" name = "cnadf_prev_post" id = "cnadf_prev_post" value = "' . $prev . '" readonly = "readonly" disabled = "disabled" />';
                   
    }

    return $html;
}

/**
 * Crear el ShortCode y pinta las tarjetas.
 * 
 * @return html
 */
function candf_efbk_shortcode() {

    ob_start();

    //Id Facebook
    $fb_page_id = "";
    if (get_option("candf_efbk_id_facebook") != "") {
        $fb_page_id = get_option("candf_efbk_id_facebook");
    } else {
        $fb_page_id = "";
    }

    //Accen Token
    $access_token = "";
    if (get_option("candf_efbk_accen_token_facebook") != "") {
        $access_token = get_option("candf_efbk_accen_token_facebook");
    } else {
        $access_token = "";
    }


    if ($access_token != "" && $fb_page_id != "") {
        
        

        //Limite de paginas
        $limite = 6;
        if (get_option("candf_efbk_cant_tarjetas") != "") {
            $limite = get_option("candf_efbk_cant_tarjetas");
        }

        $html .= '<style> .contenedor-card .back,  .contenedor-card .front { background-color:'.get_option('candf_efbk_color_fondo_tarjetas' ).' !important;}</style>';
       
        //Estilos del Borde
        $html .= '<style> .contenedor-card .back,  .contenedor-card .front { border:'.get_option('candf_efbk_ancho_borde_tarjetas').'px';
        $html .= ' '.get_option('candf_efbk_style_borde').'';
        $html .= ' '.get_option('candf_efbk_color_borde_tarjetas').'';        
        $html .= ' !important;}</style>';
        
        $html .= '<style> .contenedor-card .back,  .contenedor-card .front { border-radius:'.get_option('candf_efbk_radio_tarjetas' ).'px !important;}</style>';
        //Campos del filtrado
        $fields = "id,name,message,place,link,created_time,full_picture,expanded_height,description,likes.limit(1).summary(true)&type=photo&limit={$limite}";

        $json_link = "https://graph.facebook.com/v2.8/{$fb_page_id}/feed?fields={$fields}&access_token={$access_token}";

        $json = file_get_contents($json_link);

        //Json inicializado
        $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

        //Codigo html
        $html .= '<link href="https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900" rel="stylesheet">';
        $html .= '<div class="container contenedor-card carousel slide eventos-paginacion">';
        $html .= '<div class="row" id="contenedor_tarjetas">';

        //Pinta todas las tarjetas.
        $html .= pintarTarjetas($obj);     

        $html .= '</div>';
        
        //Pintar paginado
        $pintarPaginado = 0;
        if (get_option("candf_efbk_show_paginacion") != "") {
            $pintarPaginado = get_option("candf_efbk_show_paginacion");
        }
        
        if (isset($obj["paging"]) && $pintarPaginado == 1) {           
            $html .= '<a role="button" class="btn btn-danger right carousel-control paginarPostNext" href="#">';
            $html .= '<i class="fa fa-chevron-right fa-lg i_paging_efbk"></i></a>';
            $html .= '<a role="button" class="btn btn-danger left carousel-control paginarPostPrev" href="#">';
            $html .= '<i class="fa fa-chevron-left fa-lg i_paging_efbk"></i></a>';
        }
        
        $html .= '</div>';

        echo $html;
    } else {

        echo '<h1>Error en el FaceBook ID o Accen Token</h1>';
    }

    return ob_get_clean();
}

//Eventos de Ajax.
function ajax_get_next_posts() {

    $jsondata = array();
       
    if (isset($_REQUEST['hrefUrl'])) {

        $json_link = $_REQUEST['hrefUrl'];

        $json = file_get_contents($json_link);
        
         //Json inicializado
        $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
        
        if (count($obj['data']) > 0) {

            //Pinta todas las tarjetas.
            $html = pintarTarjetas($obj);            

            $jsondata['success'] = true;
            $jsondata['html'] = $html;
            $jsondata['message'] = 'Hola! El valor recibido es correcto.';
                     
            wp_send_json($jsondata);           
            
        } else {

            header('Content-Type: application/json; charset=utf-8');
            $jsondata['success'] = false;
            $jsondata['message'] = 'Lista de elementos vacios.';
            echo json_encode($jsondata);
        }

        // como es una petición AJAX, cortamos inmediatamente la ejecución de PHP
        exit();
    } else {

        header('Content-Type: application/json; charset=utf-8');
        $jsondata['success'] = false;
        $jsondata['message'] = 'Hola! El valor recibido no es correcto.';
        
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
        //echo json_encode($jsondata);
        exit();
    }
}

function pintarPaginado($obj = array(), $opcion = 0) {

    $html = "";

    if (isset($obj["paging"]) && $opcion == 1) {
        $html .= "<input type=\"button\" value=\"Adelante\" class=\"paginarPostNext\"/>";
        $html .= "<br>";
        $html .= "<input type=\"button\" value=\"Atras\" class=\"paginarPostPrev\"/>";
    }

    return $html;
}
