<?php
/*
 * Plugin Name: Code&Friends, Eventos de Facebook
 * Plugin URI: http://codeandfriends.com
 * Description: Este plugin mostrará los Eventos publicados en Facebook.
 * Version: 1.0
 * Author: Yunior Concepcion lopez, Code&Friends.
 * Author URI: http://codeandfriends.com
 * License: GPL2
 * 
 */

define('WD_CANDF_DIR', WP_PLUGIN_DIR . "/" . plugin_basename(dirname(__FILE__)));
define('WD_CANDF_URL', plugins_url(plugin_basename(dirname(__FILE__))));
define('WD_CANDF_VERSION_FREE', "1.0.0");


require_once WD_CANDF_DIR.'/back/inc_init_admin.php';

require_once WD_CANDF_DIR.'/front/inc_main.php';

