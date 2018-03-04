<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
$pixgraphy_settings = pixgraphy_get_theme_options();
/********************  PIXGRAPHY THEME OPTIONS ******************************************/
	$wp_customize->add_section('title_tagline', array(
	'title' => __('Site Title & Logo Options', 'pixgraphy'),
	'priority' => 10,
	'panel' => 'pixgraphy_wordpress_default_panel'
	));
	$wp_customize->add_setting('pixgraphy_theme_options[pixgraphy_header_display]', array(
		'capability' => 'edit_theme_options',
		'default' => $pixgraphy_settings['pixgraphy_header_display'],
		'sanitize_callback' => 'pixgraphy_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('pixgraphy_theme_options[pixgraphy_header_display]', array(
		'label' => __('Site Logo/ Text Options', 'pixgraphy'),
		'priority' => 102,
		'section' => 'title_tagline',
		'type' => 'select',
		'checked' => 'checked',
			'choices' => array(
			'header_text' => __('Display Site Title Only','pixgraphy'),
			'header_logo' => __('Display Site Logo Only','pixgraphy'),
			'show_both' => __('Show Both','pixgraphy'),
			'disable_both' => __('Disable Both','pixgraphy'),
		),
	));
	$wp_customize->add_section('header_image', array(
	'title' => __('Header Image', 'pixgraphy'),
	'priority' => 20,
	'panel' => 'pixgraphy_wordpress_default_panel'
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_remove_parallax_fromheader]', array(
		'default' => $pixgraphy_settings['pixgraphy_remove_parallax_fromheader'],
		'sanitize_callback' => 'pixgraphy_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_remove_parallax_fromheader]', array(
		'priority'=>20,
		'label' => __('Remove Parallax Effect on Header Image', 'pixgraphy'),
		'description' => __('Use 1920x350px dimension image','pixgraphy'),
		'section' => 'header_image',
		'type' => 'checkbox',
	));

	$wp_customize->add_section('pixgraphy_custom_header', array(
		'title' => __('Pixgraphy Options', 'pixgraphy'),
		'priority' => 503,
		'panel' => 'pixgraphy_options_panel'
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_search_custom_header]', array(
		'default' => $pixgraphy_settings['pixgraphy_search_custom_header'],
		'sanitize_callback' => 'pixgraphy_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_search_custom_header]', array(
		'priority'=>20,
		'label' => __('Disable Search Form', 'pixgraphy'),
		'section' => 'pixgraphy_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_stick_menu]', array(
		'default' => $pixgraphy_settings['pixgraphy_stick_menu'],
		'sanitize_callback' => 'pixgraphy_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_stick_menu]', array(
		'priority'=>30,
		'label' => __('Disable Stick Menu', 'pixgraphy'),
		'section' => 'pixgraphy_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_scroll]', array(
		'default' => $pixgraphy_settings['pixgraphy_scroll'],
		'sanitize_callback' => 'pixgraphy_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_scroll]', array(
		'priority'=>40,
		'label' => __('Disable Goto Top', 'pixgraphy'),
		'section' => 'pixgraphy_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_top_social_icons]', array(
		'default' => $pixgraphy_settings['pixgraphy_top_social_icons'],
		'sanitize_callback' => 'pixgraphy_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_top_social_icons]', array(
		'priority'=>43,
		'label' => __('Disable Top Social Icons', 'pixgraphy'),
		'section' => 'pixgraphy_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_buttom_social_icons]', array(
		'default' => $pixgraphy_settings['pixgraphy_buttom_social_icons'],
		'sanitize_callback' => 'pixgraphy_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_buttom_social_icons]', array(
		'priority'=>46,
		'label' => __('Disable Buttom Social Icons', 'pixgraphy'),
		'section' => 'pixgraphy_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_reset_all]', array(
		'default' => $pixgraphy_settings['pixgraphy_reset_all'],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'pixgraphy_reset_alls',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_display_page_featured_image]', array(
		'default' => $pixgraphy_settings['pixgraphy_display_page_featured_image'],
		'sanitize_callback' => 'pixgraphy_checkbox_integer',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_display_page_featured_image]', array(
		'priority'=>48,
		'label' => __('Display Page Featured Image', 'pixgraphy'),
		'section' => 'pixgraphy_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_reset_all]', array(
		'priority'=>50,
		'label' => __('Reset all default settings. (Refresh it to view the effect)', 'pixgraphy'),
		'section' => 'pixgraphy_custom_header',
		'type' => 'checkbox',
	));
	$wp_customize->add_section( 'pixgraphy_custom_css', array(
		'title' => __('Enter your custom CSS', 'pixgraphy'),
		'priority' => 507,
		'panel' => 'pixgraphy_options_panel'
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_custom_css]', array(
		'default' => $pixgraphy_settings['pixgraphy_custom_css'],
		'sanitize_callback' => 'pixgraphy_sanitize_custom_css',
		'type' => 'option',
		)
	);
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_custom_css]', array(
		'label' => __('Custom CSS','pixgraphy'),
		'section' => 'pixgraphy_custom_css',
		'type' => 'textarea'
		)
	);
	$wp_customize->add_section('pixgraphy_footer_image', array(
		'title' => __('Footer Background Image', 'pixgraphy'),
		'priority' => 510,
		'panel' => 'pixgraphy_options_panel'
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy-img-upload-footer-image]',array(
		'default'	=> $pixgraphy_settings['pixgraphy-img-upload-footer-image'],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pixgraphy_theme_options[pixgraphy-img-upload-footer-image]', array(
		'label' => __('Footer Background Image','pixgraphy'),
		'description' => __('Image will be displayed on footer','pixgraphy'),
		'priority'	=> 50,
		'section' => 'pixgraphy_footer_image',
		)
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy-footer-title]',array(
		'default'	=> $pixgraphy_settings['pixgraphy-footer-title'],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy-footer-title]', array(
		'label' => __('Footer Title','pixgraphy'),
		'priority'	=> 70,
		'section' => 'pixgraphy_footer_image',
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy-footer-link]',array(
		'default'	=> $pixgraphy_settings['pixgraphy-footer-link'],
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy-footer-link]', array(
		'label' => __('Footer Link','pixgraphy'),
		'priority'	=> 80,
		'section' => 'pixgraphy_footer_image',
	));
/********************** pixgraphy WORDPRESS DEFAULT PANEL ***********************************/
	$wp_customize->add_section('colors', array(
	'title' => __('Colors', 'pixgraphy'),
	'priority' => 30,
	'panel' => 'pixgraphy_wordpress_default_panel'
	));
	$wp_customize->add_section('background_image', array(
	'title' => __('Background Image', 'pixgraphy'),
	'priority' => 40,
	'panel' => 'pixgraphy_wordpress_default_panel'
	));
	$wp_customize->add_section('nav', array(
	'title' => __('Navigation', 'pixgraphy'),
	'priority' => 50,
	'panel' => 'pixgraphy_wordpress_default_panel'
	));
	$wp_customize->add_section('static_front_page', array(
	'title' => __('Static Front Page', 'pixgraphy'),
	'priority' => 60,
	'panel' => 'pixgraphy_wordpress_default_panel'
	));