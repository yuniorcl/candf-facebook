<?php
/*
 * Panel de administracion del plugins html.
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

//Estructura del menu
function candf_plugin_options() {
    ?>
    <div class="wrap">

        <?php settings_errors(); ?>
        <form method="post" action="options.php" >
            
             <?php settings_fields('candf-settings-group'); ?>
             <?php @do_settings_fields('candf-settings-group'); ?> 
            <div id="headings-data">
                <h3>
                    <strong>
                        <ul class="title-encabezado">
                            <img class="logo-empresa-admin" src="<?php echo WD_CANDF_URL . '/images/logo empresa final.png' ?>" width="100" height="75" alt="Logo Empresa"/>
                            <li id="description-empresa"> <?php _e('Cantacta con nostros <a href=http://google.com/> Code&Friends, </a> nuestro correo es:  <span class="dashicons dashicons-email-alt"></span>  codeandfriends@gmail.com ') ?></li>
                        </ul>
                    </strong>
                </h3>
                <div id="hed3">
                   <h3>                         
                        <?php _e('Configuración de Eventos de Facebook, ShortCode:[FBK-EVENTS].') ?>
                    </h3>
                </div>
              
                <table class="form-table">

                    <tr valign='top'>
                        <th scope='row'><?php _e('Activar paginación'); ?></th>
                        <td>
                            <div class="onoffswitch">
                                <input type="checkbox" name="candf_efbk_show_paginacion" class="onoffswitch-checkbox"  id="myonoffswitch1" value='1'<?php checked(1, get_option('candf_efbk_show_paginacion')); ?> />
                                <label class="onoffswitch-label" for="myonoffswitch1">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    
                    <tr valign='top'>
                        <th scope='row'><?php _e('Framework Bootstrap'); ?></th>
                        <td>
                            <div class="onoffswitch">
                                <input type="checkbox" name="candf_efbk_active_bootstrap" class="onoffswitch-checkbox"  id="myonoffswitch2" value='1'<?php checked(1, get_option('candf_efbk_active_bootstrap')); ?> />
                                <label class="onoffswitch-label" for="myonoffswitch2">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>                                    
                                </label>
                                
                            </div>
                            <p class='description'><?php _e('Bootstrap Framework versión 4.0.0-alpha.6.'); ?></p>
                        </td>
                    </tr>


                    <tr valign='top'>
                        <th scope='row'><?php _e('Número de tarjetas'); ?></th>
                        <td>
                            <label for='candf_efbk_cant_tarjetas'>
                                <input type='range' step="2" id='candf_efbk_cant_tarjetas' name='candf_efbk_cant_tarjetas' min='2' max='16' value='<?php echo get_option('candf_efbk_cant_tarjetas') ?>' oninput="this.form.amountInput1.value=this.value"/> 
                                <input type="number"  name="amountInput1" min="2" max="25" value='<?php echo get_option('candf_efbk_cant_tarjetas') ?>' size='4' oninput="this.form.candf_efbk_cant_tarjetas.value=this.value" disabled/>
                                <p class="description"> <?php _e('Seleccione el número de tarjetas que se deben mostrar en la pantalla.'); ?></p>           
                                <p class="description"> <?php _e('Los eventos de Facebook se actualizarán de forma dinámica.'); ?></p>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th scope='row'><?php _e('Color de fondo'); ?></th>
                        <td><label for='candf_efbk_color_fondo_tarjetas'>
                                <input type='text' class='color_picker' id='candf_efbk_color_fondo_tarjetas' name='candf_efbk_color_fondo_tarjetas' value='<?php echo get_option('candf_efbk_color_fondo_tarjetas'); ?>'/>
                                <p class='description'><?php _e('Cambie el color de fondo de las tarjetas.'); ?></p>
                            </label>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e('Estilos del borde'); ?></th>
                        <td>
                            <label for='candf_efbk_color_borde_tarjetas'>
                                <input type='text' class='color_picker' id='candf_efbk_color_borde_tarjetas' name='candf_efbk_color_borde_tarjetas' value='<?php echo get_option('candf_efbk_color_borde_tarjetas'); ?>'/>
                                <p class='description'><?php _e('Cambie el color del borde de las tarjetas.'); ?></p>
                            </label>
                            <br>
                            <label for="candf_efbk_ancho_borde_tarjetas">
                                <input type='range'  id='candf_efbk_ancho_borde_tarjetas' name='candf_efbk_ancho_borde_tarjetas' min='0' max='10' value='<?php echo get_option('candf_efbk_ancho_borde_tarjetas') ?>' oninput="this.form.amountInput2.value=this.value"  /> 
                                <input type="number"  name="amountInput2" min="0" max="10" value='<?php echo get_option('candf_efbk_ancho_borde_tarjetas') ?>' size='4' oninput="this.form.candf_efbk_ancho_borde_tarjetas.value=this.value" disabled/>  
                                <p class="description"><?php _e('Seleccione un Ancho para el borde.'); ?></p>
                            </label>
                            <br>
                            <label for='candf_efbk_radio_tarjetas'>
                                <input type='range'  id='candf_efbk_radio_tarjetas' name='candf_efbk_radio_tarjetas' min='0' max='10' value='<?php echo get_option('candf_efbk_radio_tarjetas') ?>' oninput="this.form.amountInput3.value=this.value" /> 
                                <input type="number"  name="amountInput3" min="0" max="10" value='<?php echo get_option('candf_efbk_radio_tarjetas') ?>' size='4' oninput="this.form.candf_efbk_radio_tarjetas.value=this.value" />
                                <p class='description'> <?php _e('Cambie el radio del las tarjetas.'); ?></p>
                            </label>
                            <br>
                            <label for="candf_efbk_style_borde">
                                <select name='candf_efbk_style_borde'>
                                    <option value='none'   <?php selected(get_option('candf_efbk_style_borde'), 'none'); ?>   >None</option>
                                    <option value='solid'  <?php selected(get_option('candf_efbk_style_borde'), 'solid'); ?>  >Solid</option>
                                    <option value='dashed' <?php selected(get_option('candf_efbk_style_borde'), 'dashed'); ?> >Dashed</option>
                                    <option value='dotted' <?php selected(get_option('candf_efbk_style_borde'), 'dotted'); ?> >Dotted</option>
                                    <option value='double' <?php selected(get_option('candf_efbk_style_borde'), 'double'); ?> >Double</option>
                                </select>
                                <p class="description"><?php _e('Seleccione un estilo para los bordes.'); ?></p>
                            </label>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e('Id de Facebook'); ?></th>
                        <td><label for="candf_efbk_id_facebook">
                                <input type="text" id="candf_efbk_id_facebook" size="40"  name="candf_efbk_id_facebook" value="<?php echo get_option('candf_efbk_id_facebook'); ?>" />
                                <p class="description"><?php _e('Entre el ID de su cuenta de facebook.'); ?></p>
                            </label>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e('Accen Token de Facebook'); ?></th>
                        <td>
                            <label for="candf_efbk_accen_token_facebook">
                                <input type="text" id="candf_efbk_accen_token_facebook" size="40"  name="candf_efbk_accen_token_facebook" value="<?php echo get_option('candf_efbk_accen_token_facebook'); ?>" />
                                <p class="description"><?php _e('Entre el accen token de facebook.'); ?></p>
                            </label>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><?php _e('Feed de Facebook'); ?></th>
                        <td><label for="candf_efbk_feed_facebook">
                                <input type="text" id="candf_efbk_feed_facebook"  size="40"  name="candf_efbk_feed_facebook" value="<?php echo get_option('candf_efbk_feed_facebook'); ?>" />
                                <p class="description"><?php _e('Seleccione de su cuenta que feed.'); ?></p>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th scope='row'><?php _e('Cargar más de un Feed'); ?></th>
                        <td><label for='candf_efbk_prueba_premiun'>
                                <input type='text' id='candf_efbk_prueba_premiun' size="40" disabled name='candf_efbk_prueba_premiun' value=''/>
                                <p class='description'> <?php _e('Si desea mostrar mas de un Feed, Baje la versión: <b>Premium Version <a href="https://google.es/">Code&Friends.</a> </b> '); ?></p>
                            </label>
                        </td>
                    </tr>


                </table>
                 <?php @submit_button(); ?>
            </div>
        </form>    
    </div>

    <?php
}
