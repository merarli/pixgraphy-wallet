<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
/******************** PIXGRAPHY CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'pixgraphy_customize_register_wordpress_default' );
function pixgraphy_customize_register_wordpress_default( $wp_customize ) {
	$wp_customize->add_panel( 'pixgraphy_wordpress_default_panel', array(
		'priority' => 5,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Pixgraphy WordPress Settings', 'pixgraphy' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'pixgraphy_customize_register_options', 20 );
function pixgraphy_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'pixgraphy_options_panel', array(
		'priority' => 6,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Pixgraphy Theme Options', 'pixgraphy' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'pixgraphy_customize_register_featuredcontent' );
function pixgraphy_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'pixgraphy_featuredcontent_panel', array(
		'priority' => 7,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Pixgraphy Slider Options', 'pixgraphy' ),
		'description' => '',
	) );
}
add_action( 'customize_register', 'pixgraphy_customize_register_widgets' );
function pixgraphy_customize_register_widgets( $wp_customize ) {
	$wp_customize->add_panel( 'widgets', array(
		'priority' => 8,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Pixgraphy Widgets', 'pixgraphy' ),
		'description' => '',
	) );
}