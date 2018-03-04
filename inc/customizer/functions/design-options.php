<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
$pixgraphy_settings = pixgraphy_get_theme_options();
/******************** PIXGRAPHY LAYOUT OPTIONS ******************************************/
	$wp_customize->add_section('pixgraphy_layout_options', array(
		'title' => __('Layout Options', 'pixgraphy'),
		'priority' => 102,
		'panel' => 'pixgraphy_options_panel'
	));
		$wp_customize->add_setting('pixgraphy_theme_options[pixgraphy_responsive]', array(
		'default' => $pixgraphy_settings['pixgraphy_responsive'],
		'sanitize_callback' => 'pixgraphy_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('pixgraphy_theme_options[pixgraphy_responsive]', array(
		'priority' =>10,
		'label' => __('Responsive Layout', 'pixgraphy'),
		'section' => 'pixgraphy_layout_options',
		'type' => 'select',
		'checked' => 'checked',
		'choices' => array(
			'on' => __('ON ','pixgraphy'),
			'off' => __('OFF','pixgraphy'),
		),
	));
	$wp_customize->add_setting('pixgraphy_theme_options[pixgraphy_animate_css]', array(
		'default' => $pixgraphy_settings['pixgraphy_animate_css'],
		'sanitize_callback' => 'pixgraphy_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('pixgraphy_theme_options[pixgraphy_animate_css]', array(
		'priority' =>15,
		'label' => __('Animation Options', 'pixgraphy'),
		'section' => 'pixgraphy_layout_options',
		'type' => 'select',
		'checked' => 'checked',
		'choices' => array(
			'on' => __('ON ','pixgraphy'),
			'off' => __('OFF','pixgraphy'),
		),
	));
	$wp_customize->add_setting('pixgraphy_theme_options[pixgraphy_photography_layout]', array(
		'default' => $pixgraphy_settings['pixgraphy_photography_layout'],
		'sanitize_callback' => 'pixgraphy_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control('pixgraphy_theme_options[pixgraphy_photography_layout]', array(
		'priority' =>30,
		'label' => __('Photography Layout', 'pixgraphy'),
		'section'    => 'pixgraphy_layout_options',
		'type' => 'select',
		'checked' => 'checked',
		'choices' => array(
			'photography_layout' => __('Photography Layout','pixgraphy'),
			'large_image_display' => __('Blog large image display','pixgraphy'),
			'medium_image_display' => __('Blog medium image display','pixgraphy'),
		),
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_entry_format_blog]', array(
		'default' => $pixgraphy_settings['pixgraphy_entry_format_blog'],
		'sanitize_callback' => 'pixgraphy_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_entry_format_blog]', array(
		'priority'=>40,
		'label' => __('Disable Entry Format from Blog Page', 'pixgraphy'),
		'section' => 'pixgraphy_layout_options',
		'type' => 'select',
		'choices' => array(
		'show' => __('Display Entry Format','pixgraphy'),
		'hide' => __('Hide Entry Format','pixgraphy'),
		'show-button' => __('Show Button Only','pixgraphy'),
		'hide-button' => __('Hide Button Only','pixgraphy'),
	),
	));
	$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_entry_meta_blog]', array(
		'default' => $pixgraphy_settings['pixgraphy_entry_meta_blog'],
		'sanitize_callback' => 'pixgraphy_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_entry_meta_blog]', array(
		'priority'=>45,
		'label' => __('Disable Entry Meta from Blog Page', 'pixgraphy'),
		'section' => 'pixgraphy_layout_options',
		'type'	=> 'select',
		'choices' => array(
		'show-meta' => __('Display Entry Meta','pixgraphy'),
		'hide-meta' => __('Hide Entry Meta','pixgraphy'),
	),
	));
	$wp_customize->add_setting('pixgraphy_theme_options[pixgraphy_design_layout]', array(
		'default'        => $pixgraphy_settings['pixgraphy_design_layout'],
		'sanitize_callback' => 'pixgraphy_sanitize_select',
		'type'                  => 'option',
	));
	$wp_customize->add_control('pixgraphy_theme_options[pixgraphy_design_layout]', array(
	'priority'  =>50,
	'label'      => __('Design Layout', 'pixgraphy'),
	'section'    => 'pixgraphy_layout_options',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'wide-layout' => __('Full Width Layout','pixgraphy'),
		'boxed-layout' => __('Boxed Layout','pixgraphy'),
		'small-boxed-layout' => __('Small Boxed Layout','pixgraphy'),
	),
));