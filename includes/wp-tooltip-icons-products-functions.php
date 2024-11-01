<?php
/*
Tooltip Icons for Products ( Plugin functions  )
©2020 Daniel Esparza, inspirado por #openliveit #dannydshore | Consultoría en servicios y soluciones de entorno web - https://danielesparza.studio/
*/

//global $dewp_options;

if ( !function_exists( 'dewp_tip_pluging_code' ) && $dewp_options[enable_icons] == true ) {
    
    add_action('wp_enqueue_scripts', 'dewp_register_pluginstyle');
    function dewp_register_pluginstyle() {
        wp_register_style( 'dewp_register_pluginstyle_css', plugin_dir_url( __FILE__ ) . '../css/dewp_style_plugin.css', array(), '1.0' );
        wp_enqueue_style( 'dewp_register_pluginstyle_css' );
        wp_register_script('dewp_register_fontawesome', plugin_dir_url( __FILE__ ) . '../js/fontawesome.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('dewp_register_fontawesome');
    }
    
    add_action( 'woocommerce_after_shop_loop_item', 'dewp_tip_pluging_code', 5 );
    add_action( 'woocommerce_before_add_to_cart_button', 'dewp_tip_pluging_code' );
    function dewp_tip_pluging_code() {
        global $dewp_options;
        ob_start();
        ?>

        <div class="tip-container" style="background-color:<?php echo esc_attr( $dewp_options['background_icons'] ); ?>;">
            
            <?php if ( !empty( $dewp_options['firsticon_icon'] ) ) { ?>
                <div id="tip-block01" class="tip-block">
                    <a style="color:<?php echo esc_attr( $dewp_options['color_icons'] ); ?>;" href="<?php echo esc_url( $dewp_options['firsticon_url'] ); ?>" target="<?php echo esc_attr( $dewp_options['firsticon_target'] ); ?>">
                        <span class="tooltip"><i class="<?php echo esc_attr( $dewp_options['firsticon_icon'] ); ?>" style="font-size:<?php echo esc_attr( $dewp_options['size_icons'] ); ?>rem;"></i><span class="tooltiptext" style="background-color:<?php echo esc_attr( $dewp_options['background_tooltip'] ); ?>;font-size:<?php echo esc_attr( $dewp_options['size_tooltip'] ); ?>rem;color:<?php echo esc_attr( $dewp_options['color_tooltip'] ); ?>;"><?php echo esc_html( $dewp_options['firsticon_textarea'] ); ?></span></span>
                    </a>
                </div> 
            <?php } ?>
			
			<?php if ( !empty( $dewp_options['secondicon_icon'] ) ) { ?>
                <div id="tip-block02" class="tip-block">
                    <a style="color:<?php echo esc_attr( $dewp_options['color_icons'] ); ?>;" href="<?php echo esc_url( $dewp_options['secondicon_url'] ); ?>" target="<?php echo esc_attr( $dewp_options['secondicon_target'] ); ?>">
                        <span class="tooltip"><i class="<?php echo esc_attr( $dewp_options['secondicon_icon'] ); ?>" style="font-size:<?php echo esc_attr( $dewp_options['size_icons'] ); ?>rem;"></i><span class="tooltiptext" style="background-color:<?php echo esc_attr( $dewp_options['background_tooltip'] ); ?>;font-size:<?php echo esc_attr( $dewp_options['size_tooltip'] ); ?>rem;color:<?php echo esc_attr( $dewp_options['color_tooltip'] ); ?>;"><?php echo esc_html( $dewp_options['secondicon_textarea'] ); ?></span></span>
                    </a>
                </div>
            <?php } ?>
            
			<?php if ( !empty( $dewp_options['thirdicon_icon'] ) ) { ?>
                <div id="tip-block03" class="tip-block">
                    <a style="color:<?php echo esc_attr( $dewp_options['color_icons'] ); ?>;" href="<?php echo esc_url( $dewp_options['thirdicon_url'] ); ?>" target="<?php echo esc_attr( $dewp_options['thirdicon_target'] ); ?>">
                        <span class="tooltip"><i class="<?php echo esc_attr( $dewp_options['thirdicon_icon'] ); ?>" style="font-size:<?php echo esc_attr( $dewp_options['size_icons'] ); ?>rem;"></i><span class="tooltiptext" style="background-color:<?php echo esc_attr( $dewp_options['background_tooltip'] ); ?>;font-size:<?php echo esc_attr( $dewp_options['size_tooltip'] ); ?>rem;color:<?php echo esc_attr( $dewp_options['color_tooltip'] ); ?>;"><?php echo esc_html( $dewp_options['thirdicon_textarea'] ); ?></span></span>
                    </a>
                </div>
            <?php } ?>
			
			<?php if ( !empty( $dewp_options['fourthicon_icon'] ) ) { ?>
                <div id="tip-block04" class="tip-block">
                    <a style="color:<?php echo esc_attr( $dewp_options['color_icons'] ); ?>;" href="<?php echo esc_url( $dewp_options['fourthicon_url'] ); ?>" target="<?php echo esc_attr( $dewp_options['fourthicon_target'] ); ?>">
                        <span class="tooltip"><i class="<?php echo esc_attr( $dewp_options['fourthicon_icon'] ); ?>" style="font-size:<?php echo esc_attr( $dewp_options['size_icons'] ); ?>rem;"></i><span class="tooltiptext" style="background-color:<?php echo esc_attr( $dewp_options['background_tooltip'] ); ?>;font-size:<?php echo esc_attr( $dewp_options['size_tooltip'] ); ?>rem;color:<?php echo esc_attr( $dewp_options['color_tooltip'] ); ?>;"><?php echo esc_html( $dewp_options['fourthicon_textarea'] ); ?></span></span>
                    </a>
                </div>
            <?php } ?>
            
		</div>

        <?php 
        $output_string = ob_get_contents();
        ob_end_clean();
        echo $output_string;  
    }
    
}