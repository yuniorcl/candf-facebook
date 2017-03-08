<?php

/*
 * Inicializa la vista de usuario
 * Author: Code&Friends
 * Author Email: codeandfriends@gmail.com
 * Author: Yunior Concepcion lopez
 * Author Email: yuniorcl@gmail.com  
 * 
 * Notación de las iniciales 
 * candf: Code&Friends
 * efbk: Eventos de Facebook
 *  
 */


add_action('wp_enqueue_scripts', 'init_enqueue_style');

function init_enqueue_style() {

    //
    $incluirBootstrap = 0;
    if (get_option("candf_efbk_active_bootstrap") != "") {
        $incluirBootstrap = get_option("candf_efbk_active_bootstrap");
    }

    //CSS
    wp_register_style("candfreinds-main-css", WD_CANDF_URL . '/css/front-style.css');
    wp_enqueue_style("candfreinds-main-css");
    
    if($incluirBootstrap == 1) {       
       wp_enqueue_style( 'candfreinds-bootstrap-css', WD_CANDF_URL . '/css/bootstrap.css', array(), '4.0.0' );
    }

    //jQuery
    wp_enqueue_script('jquery');
    // Primero incluimos nuestro archivo javascript definido anteriormente
    wp_enqueue_script('candfreinds-front-script', WD_CANDF_URL . '/js/front-eventos.js', array('jquery'));

    if($incluirBootstrap == 1) {       
       wp_enqueue_script('candfreinds-bootstrap.min-script', WD_CANDF_URL . '/js/bootstrap.min.js', array('jquery'));
    }
    //Inicializa la funcionalidad para Ajax
    wp_localize_script('candfreinds-front-script', 'candfefbkPaginado', array('url' => admin_url('admin-ajax.php')));
}

require_once WD_CANDF_DIR . '/front/inc_vista.php';

//Inicializa el shortcode
add_shortcode("FBK-EVENTS", "candf_efbk_shortcode");

// para peticiones de usuarios que no están logueados
add_action('wp_ajax_nopriv_candf_efbk_paginado', 'ajax_get_next_posts');
// probablemente también vas a querer que los usuarios logueados puedan hacer lo mismo
add_action('wp_ajax_candf_efbk_paginado', 'ajax_get_next_posts');
