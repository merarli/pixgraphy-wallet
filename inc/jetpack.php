<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
/*********** PIXGRAPHY ADD THEME SUPPORT FOR INFINITE SCROLL **************************/
function pixgraphy_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'           => 'click',
		'footer_widgets' => false,
		'container'      => 'post_masonry',
		'wrapper'        => true,
		'render'         => false,
		'posts_per_page' => false,
	) );
}
add_action( 'after_setup_theme', 'pixgraphy_jetpack_setup' );