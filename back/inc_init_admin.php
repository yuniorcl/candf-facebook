<?php

/* 
 * Inicializa el panel de administración.
 * Author: Code&Friends
 * Author Email: codeandfriends@gmail.com
 * Author: Yunior Concepcion lopez
 * Author Email: yuniorcl@gmail.com
*/

if (!defined('ABSPATH')) {
    exit();
}

//Inicializa la administración
add_action('admin_menu', 'candf_options_panel');

//Carga los Script and Styles
add_action('admin_enqueue_scripts', 'candf_load_admin_scripts');



require_once WD_CANDF_DIR.'/back/inc_panel_administracion.php';

//Opciones del menu
function candf_options_panel() {
    add_menu_page('C&F Eventos', 'C&F Eventos', 'manage_options', 'candf_plugin_options', 'candf_plugin_options', 'dashicons-facebook', 16);
    add_action( 'admin_init', 'candf_register_settings' );
}


//Carga los scrip
function candf_load_admin_scripts() {
   
    if (isset($_GET['page']) && $_GET['page'] === 'candf_plugin_options') {

        wp_register_style("candfreinds-css", WD_CANDF_URL . '/css/style.css');        
        wp_enqueue_style("candfreinds-css");
      
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
          
        wp_enqueue_script('jquery');      
        wp_enqueue_script('wp-inni-funtion-admin-script', WD_CANDF_URL . '/js/admin-eventos.js', array('wp-color-picker', 'jquery'));
             
    }
}


function candf_register_settings(){
    register_setting('candf-settings-group', 'candf_efbk_show_paginacion' );
    register_setting('candf-settings-group', 'candf_efbk_active_bootstrap' );
    register_setting('candf-settings-group', 'candf_efbk_cant_tarjetas' );
    register_setting('candf-settings-group', 'candf_efbk_color_fondo_tarjetas' );
    register_setting('candf-settings-group', 'candf_efbk_color_borde_tarjetas' );
    register_setting('candf-settings-group', 'candf_efbk_ancho_borde_tarjetas' );
    register_setting('candf-settings-group', 'candf_efbk_radio_tarjetas' );
    register_setting('candf-settings-group', 'candf_efbk_style_borde' );
    register_setting('candf-settings-group', 'candf_efbk_id_facebook' );
    register_setting('candf-settings-group', 'candf_efbk_accen_token_facebook' );
    register_setting('candf-settings-group', 'candf_efbk_feed_facebook' );        
}
