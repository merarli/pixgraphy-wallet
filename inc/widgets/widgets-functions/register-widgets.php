<?php
/**
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
/**************** PIXGRAPHY REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'pixgraphy_widgets_init');
function pixgraphy_widgets_init() {
	register_widget( "pixgraphy_contact_widgets" );

	register_sidebar(array(
			'name' => __('Main Sidebar', 'pixgraphy'),
			'id' => 'pixgraphy_main_sidebar',
			'description' => __('Shows widgets at Main Sidebar.', 'pixgraphy'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('Display Contact Info at Header ', 'pixgraphy'),
			'id' => 'pixgraphy_header_info',
			'description' => __('Shows widgets on all page.', 'pixgraphy'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
		));
	register_sidebar(array(
			'name' => __('Contact Page Sidebar', 'pixgraphy'),
			'id' => 'pixgraphy_contact_page_sidebar',
			'description' => __('Shows widgets on Contact Page Template.', 'pixgraphy'),
			'before_widget' => '<aside id="%1$s" class="widget widget_contact">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	register_sidebar(array(
			'name' => __('Shortcode For Contact Page', 'pixgraphy'),
			'id' => 'pixgraphy_form_for_contact_page',
			'description' => __('Add Contact Form 7 Shortcode using text widgets Ex: [contact-form-7 id="137" title="Contact form 1"]', 'pixgraphy'),
			'before_widget' => '<div id="A%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	register_sidebar(array(
			'name' => __('WooCommerce Sidebar', 'pixgraphy'),
			'id' => 'pixgraphy_woocommerce_sidebar',
			'description' => __('Add WooCommerce Widgets Only', 'pixgraphy'),
			'before_widget' => '<div id="A%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
}