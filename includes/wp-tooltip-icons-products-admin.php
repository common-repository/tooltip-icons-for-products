<?php
/*
Tooltip Icons for Products ( Admin functions  ) tip
©2020 Daniel Esparza, inspirado por #openliveit #dannydshore | Consultoría en servicios y soluciones de entorno web - https://danielesparza.studio/
*/


if( function_exists( 'admin_menu_desparza' ) ) { 
    //( do nothing... )
} else {
	add_action( 'admin_menu', 'admin_menu_desparza' );
	function admin_menu_desparza(){
		add_menu_page( 'DE Plugins', 'DE Plugins', 'manage_options', 'desparza-menu', 'dewp_desparza_function', 'dashicons-editor-code', 90 );
		add_submenu_page( 'desparza-menu', 'Sobre Daniel Esparza', 'Sobre Daniel Esparza', 'manage_options', 'desparza-menu' );
	
    function dewp_desparza_function(){
		ob_start();	
	?>
		<div class="wrap">
            <h2>Daniel Esparza</h2>
            <p>Consultoría en servicios y soluciones de entorno web.<br>¿Qué tipo de servicio o solución necesita tu negocio?</p>
            <h4>Contact info:</h4>
            <p>
                Sitio web: <a href="https://danielesparza.studio/" target="_blank">https://danielesparza.studio/</a><br>
                Contacto: <a href="mailto:hi@danielesparza.studio" target="_blank">hi@danielesparza.studio</a><br>
                Messenger: <a href="https://www.messenger.com/t/danielesparza.studio" target="_blank">enviar mensaje</a><br>
                Información acerca del plugin: <a href="https://danielesparza.studio/breadcrumbs-anywhere/" target="_blank">sitio web del plugin</a><br>
                Daniel Esparza | Consultoría en servicios y soluciones de entorno web.<br>
                ©2020 Daniel Esparza, inspirado por #openliveit #dannydshore
            </p>
		</div>
	<?php 
		$output_string = ob_get_contents();
		ob_end_clean();
		echo $output_string;
	}
    }	
    
    add_action( 'admin_enqueue_scripts', 'dewp_register_adminstyle' );
    function dewp_register_adminstyle() {
        wp_register_style( 'dewp_register_adminstyle_css', plugin_dir_url( __FILE__ ) . '../css/dewp_style_admin.css', array(), '1.0' );
        wp_enqueue_style( 'dewp_register_adminstyle_css' );
    }
    
}

if ( !function_exists( 'dewp_tip_register_settings' ) ) {
    add_action( 'admin_init', 'dewp_tip_register_settings' );
    function dewp_tip_register_settings (){
        register_setting( 'dewp_settings_group' , 'dewp_settings' );
    }
}

if ( !function_exists( 'dewp_tip_admin_add' ) ) {
	
	add_action( 'admin_menu', 'dewp_tip_admin_add' );
	function dewp_tip_admin_add() {
		add_submenu_page( 'desparza-menu', 'Tooltip Icons for Products', 'Tooltip Icons for Products', 'manage_options', 'dewp-tip-admin-settings', 'dewp_tip_admin_settings' );
	}
    
	function dewp_tip_admin_settings(){
		global $wpdb;
        global $dewp_options;
        ob_start();
        
        if( isset($_GET['settings-updated']) ) {
        ?>
            <div id="message" class="updated" style="margin:15px 15px 0 0;">
            <p><strong><?php _e('Settings saved.') ?></strong></p>
            </div>
		<?php }

		if ( isset($_REQUEST['dewp_settings[enable_icons]']) ){
			if ( ! wp_verify_nonce(  $_REQUEST['dewp_noncefield'], 'dewp_nonceaction' ) ) {
				wp_die( "Error - Verificación nonce no válida" );
			} else {
				update_option( $data['dewp_settings[enable_icons]'] = sanitize_text_field( $_REQUEST['dewp_settings[enable_icons]'] ) );
                update_option( $data['dewp_settings[background_icons]'] = sanitize_hex_color( $_REQUEST['dewp_settings[background_icons]'] ) );
				update_option( $data['dewp_settings[color_icons]'] = sanitize_hex_color( $_REQUEST['dewp_settings[color_icons]'] ) );
				update_option( $data['dewp_settings[size_icons]'] = sanitize_text_field( $_REQUEST['dewp_settings[size_icons]'] ) );
                update_option( $data['dewp_settings[background_tooltip]'] = sanitize_text_field( $_REQUEST['dewp_settings[background_tooltip]'] ) );
                update_option( $data['dewp_settings[color_tooltip]'] = sanitize_hex_color( $_REQUEST['dewp_settings[color_tooltip]'] ) );
                update_option( $data['dewp_settings[size_tooltip]'] = sanitize_text_field( $_REQUEST['dewp_settings[size_tooltip]'] ) );
				update_option( $data['dewp_settings[firsticon_url]'] = sanitize_text_field( $_REQUEST['dewp_settings[firsticon_url]'] ) );
				update_option( $data['dewp_settings[firsticon_target]'] = sanitize_text_field( $_REQUEST['dewp_settings[firsticon_target]'] ) );
				update_option( $data['dewp_settings[firsticon_icon]'] = sanitize_text_field( $_REQUEST['dewp_settings[firsticon_icon]'] ) );
                update_option( $data['dewp_settings[firsticon_textarea]'] = sanitize_text_field( $_REQUEST['dewp_settings[firsticon_textarea]'] ) );
				update_option( $data['dewp_settings[secondicon_url]'] = sanitize_text_field( $_REQUEST['dewp_settings[secondicon_url]'] ) );
				update_option( $data['dewp_settings[secondicon_target]'] = sanitize_text_field( $_REQUEST['dewp_settings[secondicon_target]'] ) );
				update_option( $data['dewp_settings[secondicon_icon]'] = sanitize_text_field( $_REQUEST['dewp_settings[secondicon_icon]'] ) );
				update_option( $data['dewp_settings[secondicon_textarea]'] = sanitize_text_field( $_REQUEST['dewp_settings[secondicon_textarea]'] ) );
				update_option( $data['dewp_settings[thirdicon_url]'] = sanitize_text_field( $_REQUEST['dewp_settings[thirdicon_url]'] ) );
				update_option( $data['dewp_settings[thirdicon_target]'] = sanitize_text_field( $_REQUEST['dewp_settings[thirdicon_target]'] ) );
				update_option( $data['dewp_settings[thirdicon_icon]'] = sanitize_text_field( $_REQUEST['dewp_settings[thirdicon_icon]'] ) );
				update_option( $data['dewp_settings[thirdicon_textarea]'] = sanitize_text_field( $_REQUEST['dewp_settings[thirdicon_textarea]'] ) ); 
				update_option( $data['dewp_settings[fourthicon_url]'] = sanitize_text_field( $_REQUEST['dewp_settings[fourthicon_url]'] ) );
				update_option( $data['dewp_settings[fourthicon_target]'] = sanitize_text_field( $_REQUEST['dewp_settings[fourthicon_target]'] ) );
				update_option( $data['dewp_settings[fourthicon_icon]'] = sanitize_text_field( $_REQUEST['dewp_settings[fourthicon_icon]'] ) );
				update_option( $data['dewp_settings[fourthicon_textarea]'] = sanitize_text_field( $_REQUEST['dewp_settings[fourthicon_textarea]'] ) ); 
				$wpdb->insert( 'dewp_noncedata' , $data );
			}
		}
    	?>

        <h2><?php _e( 'Tooltip Icons for Products', 'text-dewp' ); ?></h2>

		<ul>
			<li><strong>Instrucciones básicas:</strong></li>
            <li>• Habilitar el menú</li>
            <li>• Realizar los ajustes de los Iconos (fondo, color y tamaño)</li>
            <li>• Realizar los ajustes del Tooltip (fondo, color y tamaño)</li>
            <li>• No es necesario utilizar todos los iconos.</li>
            <li>• Generar los botones</li>
            <li>• Lista completa de iconos fontawesome Version 5.13.0 <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">fontawesome Version 5.13.0</a></li>
		</ul>
        <form id="dewp_settings_form" action="options.php" method="post">
            
            <?php settings_fields( 'dewp_settings_group' ); ?>

            <p>
                <input id="dewp_settings[enable_icons]" name="dewp_settings[enable_icons]" type="checkbox" value="1" <?php esc_attr( checked( '1' , $dewp_options[enable_icons] ) ); ?>  />
                <label for="dewp_settings[enable_icons]"><?php _e( 'Habilitar el menú', 'text-dewp' ); ?></label>
            </p>
            
			<p>
				<strong><?php _e( 'Configuración del menú', 'text-dewp' ); ?></strong>
			</p>
			
			<div class="dewp_settings-block">
				<p><strong>Ajustes de los Iconos</strong></p>
				<label for="dewp_settings[background_icons]"><?php _e( 'Color de fondo (#hex)', 'text-dewp' ); ?></label>
				<input id="dewp_settings[background_icons]" name="dewp_settings[background_icons]" type="text" value="<?php echo esc_attr( $dewp_options['background_icons'] ); ?>" />
				<label for="dewp_settings[color_icons]"><?php _e( 'Color del texto (#hex)', 'text-dewp' ); ?></label>
				<input id="dewp_settings[color_icons]" name="dewp_settings[color_icons]" type="text" value="<?php echo esc_attr( $dewp_options['color_icons'] ); ?>" />
				<label for="dewp_settings[size_icons]"><?php _e( 'Tamaño del texto e icono, solo número (rem)', 'text-dewp' ); ?></label>
				<input id="dewp_settings[size_icons]" name="dewp_settings[size_icons]" type="number" step="any" value="<?php echo esc_attr( $dewp_options['size_icons'] ); ?>" />
			</div>
            
            <div class="dewp_settings-block">
				<p><strong>Ajustes del Tooltip</strong></p>
				<label for="dewp_settings[background_tooltip]"><?php _e( 'Color de fondo (#hex)', 'text-dewp' ); ?></label>
				<input id="dewp_settings[background_tooltip]" name="dewp_settings[background_tooltip]" type="text" value="<?php echo esc_attr( $dewp_options['background_tooltip'] ); ?>" />
                <label for="dewp_settings[color_tooltip]"><?php _e( 'Color del texto (#hex)', 'text-dewp' ); ?></label>
				<input id="dewp_settings[color_tooltip]" name="dewp_settings[color_tooltip]" type="text" value="<?php echo esc_attr( $dewp_options['color_tooltip'] ); ?>" />
				<label for="dewp_settings[size_tooltip]"><?php _e( 'Tamaño del texto, solo número (rem)', 'text-dewp' ); ?></label>
				<input id="dewp_settings[size_tooltip]" name="dewp_settings[size_tooltip]" type="number" step="any" value="<?php echo esc_attr( $dewp_options['size_tooltip'] ); ?>" />
			</div>
			
			<div class="dewp_settings-block">
				<p><strong>Primer botón</strong></p>
				<label for="dewp_settings[firsticon_url]"><?php _e( 'Enlace ( URL )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[firsticon_url]" name="dewp_settings[firsticon_url]" type="text" value="<?php echo esc_url( $dewp_options['firsticon_url'] ); ?>" />
				<label for="dewp_settings[firsticon_target]"><?php _e( 'Destino ( _self, _blank )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[firsticon_target]" name="dewp_settings[firsticon_target]" type="text" value="<?php echo $dewp_options['firsticon_target'] ?>" />
				<label for="dewp_settings[firsticon_icon]"><?php _e( 'Icono "Font Awesome" ( far fa-name )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[firsticon_icon]" name="dewp_settings[firsticon_icon]" type="text" value="<?php echo $dewp_options['firsticon_icon'] ?>" />
                <label for="dewp_settings[firsticon_textarea]"><?php _e( 'Texto (Tooltip)', 'text-dewp' ); ?></label>
                <textarea id="dewp_settings[firsticon_textarea]" rows="4" cols="50" name="dewp_settings[firsticon_textarea]" form="dewp_settings_form"><?php echo esc_attr( $dewp_options['firsticon_textarea'] ); ?></textarea>
			</div>
			
			<div class="dewp_settings-block">
				<p><strong>Segundo botón</strong></p>
				<label for="dewp_settings[secondicon_url]"><?php _e( 'Enlace ( URL )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[secondicon_url]" name="dewp_settings[secondicon_url]" type="text" value="<?php echo esc_url( $dewp_options['secondicon_url'] ); ?>" />
				<label for="dewp_settings[secondicon_target]"><?php _e( 'Destino ( _self, _blank )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[secondicon_target]" name="dewp_settings[secondicon_target]" type="text" value="<?php echo esc_attr( $dewp_options['secondicon_target'] ); ?>" />
				<label for="dewp_settings[secondicon_icon]"><?php _e( 'Icono "Font Awesome" ( far fa-name )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[secondicon_icon]" name="dewp_settings[secondicon_icon]" type="text" value="<?php echo esc_attr( $dewp_options['secondicon_icon'] ); ?>" />
				<label for="dewp_settings[secondicon_textarea]"><?php _e( 'Texto (Tooltip)', 'text-dewp' ); ?></label>
                <textarea id="dewp_settings[secondicon_textarea]" rows="4" cols="50" name="dewp_settings[secondicon_textarea]" form="dewp_settings_form"><?php echo esc_attr( $dewp_options['secondicon_textarea'] ); ?></textarea>
			</div>
			
			<div class="dewp_settings-block">
				<p><strong>Tercer botón</strong></p>
				<label for="dewp_settings[thirdicon_url]"><?php _e( 'Enlace ( URL )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[thirdicon_url]" name="dewp_settings[thirdicon_url]" type="text" value="<?php echo esc_url( $dewp_options['thirdicon_url'] ); ?>" />
				<label for="dewp_settings[thirdicon_target]"><?php _e( 'Destino ( _self, _blank )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[thirdicon_target]" name="dewp_settings[thirdicon_target]" type="text" value="<?php echo esc_attr( $dewp_options['thirdicon_target'] ); ?>" />
				<label for="dewp_settings[thirdicon_icon]"><?php _e( 'Icono "Font Awesome" ( far fa-name )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[thirdicon_icon]" name="dewp_settings[thirdicon_icon]" type="text" value="<?php echo esc_attr( $dewp_options['thirdicon_icon'] ); ?>" />
				<label for="dewp_settings[thirdicon_textarea]"><?php _e( 'Texto (Tooltip)', 'text-dewp' ); ?></label>
                <textarea id="dewp_settings[thirdicon_textarea]" rows="4" cols="50" name="dewp_settings[thirdicon_textarea]" form="dewp_settings_form"><?php echo esc_attr( $dewp_options['thirdicon_textarea'] ); ?></textarea>
			</div>
			
			<div class="dewp_settings-block">
				<p><strong>Cuarto botón</strong></p>
				<label for="dewp_settings[fourthicon_url]"><?php _e( 'Enlace ( URL )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[fourthicon_url]" name="dewp_settings[fourthicon_url]" type="text" value="<?php echo esc_url( $dewp_options['fourthicon_url'] ); ?>" />
				<label for="dewp_settings[fourthicon_target]"><?php _e( 'Destino ( _self, _blank )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[fourthicon_target]" name="dewp_settings[fourthicon_target]" type="text" value="<?php echo esc_attr( $dewp_options['fourthicon_target'] ); ?>" />
				<label for="dewp_settings[fourthicon_icon]"><?php _e( 'Icono "Font Awesome" ( far fa-name )', 'text-dewp' ); ?></label>
				<input id="dewp_settings[fourthicon_icon]" name="dewp_settings[fourthicon_icon]" type="text" value="<?php echo esc_attr( $dewp_options['fourthicon_icon'] ); ?>" />
				<label for="dewp_settings[fourthicon_textarea]"><?php _e( 'Texto (Tooltip)', 'text-dewp' ); ?></label>
                <textarea id="dewp_settings[fourthicon_textarea]" rows="4" cols="50" name="dewp_settings[fourthicon_textarea]" form="dewp_settings_form"><?php echo esc_attr( $dewp_options['fourthicon_textarea'] ); ?></textarea>
			</div>
			
            <p>
				<button type="submit" name="submit" form="dewp_settings_form" value="Submit"><?php _e( 'Guardar', 'text-dewp' ); ?></button>
				<?php wp_nonce_field( 'dewp_nonceaction', 'dewp_noncefield' ); ?>
			</p>
            
        </form>

    	<?php 
		$output_string = ob_get_contents();
		ob_end_clean();
		echo $output_string;    
	}
	
}