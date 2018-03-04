<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
$pixgraphy_settings = pixgraphy_get_theme_options();
/******************** PIXGRAPHY SOCIAL ICONS ******************************************/
$wp_customize->add_section( 'pixgraphy_social_icons', array(
	'title' => __('Social Icons','pixgraphy'),
	'priority' => 400,
	'panel' =>'pixgraphy_options_panel'
));
$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_social_facebook]', array(
	'default' => $pixgraphy_settings['pixgraphy_social_facebook'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_social_facebook]', array(
	'priority' => 410,
	'label' => __( 'Facebook Link', 'pixgraphy' ),
	'section' => 'pixgraphy_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_social_twitter]', array(
	'default' => $pixgraphy_settings['pixgraphy_social_twitter'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_social_twitter]', array(
	'priority' => 420,
	'label' => __( 'Twitter Link', 'pixgraphy' ),
	'section' => 'pixgraphy_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_social_pinterest]', array(
	'default' => $pixgraphy_settings['pixgraphy_social_pinterest'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_social_pinterest]', array(
	'priority' => 430,
	'label' => __( 'Pinterest Link', 'pixgraphy' ),
	'section' => 'pixgraphy_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_social_dribbble]', array(
	'default' => $pixgraphy_settings['pixgraphy_social_dribbble'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_social_dribbble]', array(
	'priority' => 440,
	'label' => __( 'Dribbble Link', 'pixgraphy' ),
	'section' => 'pixgraphy_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_social_instagram]', array(
	'default' => $pixgraphy_settings['pixgraphy_social_instagram'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_social_instagram]', array(
	'priority' => 450,
	'label' => __( 'Instagram Link', 'pixgraphy' ),
	'section' => 'pixgraphy_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_social_flickr]', array(
	'default' => $pixgraphy_settings['pixgraphy_social_flickr'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_social_flickr]', array(
	'priority' => 460,
	'label' => __( 'Flickr Link', 'pixgraphy' ),
	'section' => 'pixgraphy_social_icons',
	'type' => 'text',
	)
);
$wp_customize->add_setting( 'pixgraphy_theme_options[pixgraphy_social_googleplus]', array(
	'default' => $pixgraphy_settings['pixgraphy_social_googleplus'],
	'sanitize_callback' => 'esc_url_raw',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);
$wp_customize->add_control( 'pixgraphy_theme_options[pixgraphy_social_googleplus]', array(
	'priority' => 470,
	'label' => __( 'Google Plus Link', 'pixgraphy' ),
	'section' => 'pixgraphy_social_icons',
	'type' => 'text',
	)
);