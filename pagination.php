<?php
/**
 * The template for displaying navigation.
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
$pixgraphy_settings = pixgraphy_get_theme_options();
if ( !class_exists( 'Jetpack') || class_exists( 'Jetpack') && !Jetpack::is_module_active( 'infinite-scroll' ) || ($pixgraphy_settings['pixgraphy_photography_layout'] != 'photography_layout')){
	echo '<div class="container">';
	if ( function_exists('wp_pagenavi' ) ) :
		wp_pagenavi();
	else: 
	global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="default-wp-page clearfix">
			<li class="previous">
				<?php next_posts_link( __( '&laquo; Previous Page', 'pixgraphy' ) ); ?>
			</li>
			<li class="next">
				<?php previous_posts_link( __( 'Next Page &raquo;', 'pixgraphy' ) ); ?>
			</li>
		</ul>
		<?php  endif;
	endif;
	echo '</div> <!-- end .container -->';
}