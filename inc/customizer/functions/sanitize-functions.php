<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
/********************* PIXGRAPHY CUSTOMIZER SANITIZE FUNCTIONS *******************************/
function pixgraphy_customize_preview_js() {
	wp_enqueue_script( 'pixgraphy_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
function pixgraphy_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}
function pixgraphy_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
function pixgraphy_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}
function pixgraphy_sanitize_custom_css( $input ) {
	if ( $input != '' ) { 
		$input = wp_strip_all_tags($input); 
		return $input;
	}
	else {
		return '';
	}
}
function pixgraphy_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'pixgraphy_theme_options');
		$input=0;
		return $input;
	} 
	else {
		return '';
	}
}