<?php
/**
 * The template for displaying search results.
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
get_header();
	$pixgraphy_settings = pixgraphy_get_theme_options();
	if($pixgraphy_settings['pixgraphy_photography_layout'] != 'photography_layout'){
	global $pixgraphy_content_layout;
	if( $post ) {
		$layout = get_post_meta( get_queried_object_id(), 'pixgraphy_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}
	if( 'default' == $layout ) { //Settings from customizer
		if(($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'nosidebar') && ($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'fullwidth')){ ?>
			<div id="primary">
				<?php }
	}?>
				<main id="main" class="site-main clearfix">
					<?php
					$pixgraphy_stickies = get_option('sticky_posts');
					if( $pixgraphy_stickies ) {
						$pixgraphy_args = array( 'ignore_sticky_posts' => 1, 'post__not_in' => $pixgraphy_stickies );
						query_posts( array_merge($wp_query->query, $pixgraphy_args) );
					}
					if( have_posts() ) {
						while(have_posts() ) {
							the_post();
							get_template_part( 'content', get_post_format() );
						}
					}
					else { ?>
					<h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'pixgraphy' ); ?> </h2>
					<?php } ?>
					<?php get_template_part( 'pagination', 'none' ); ?>
				</main> <!-- #main -->
	<?php
	if( 'default' == $layout ) { //Settings from customizer
		if(($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'nosidebar') && ($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'fullwidth')): ?>
			</div> <!-- #primary -->
			<?php endif;
	}
get_sidebar();
}else{ ?>
	<!-- post_masonry ============================================= -->
<section id="post_masonry" class="<?php echo esc_attr($pixgraphy_settings['pixgraphy_column_post']);?>-column-post clearfix">
	<?php
	$pixgraphy_stickies = get_option('sticky_posts');
	if( $pixgraphy_stickies ) {
		$pixgraphy_args = array( 'ignore_sticky_posts' => 1, 'post__not_in' => $pixgraphy_stickies );
		query_posts( array_merge($wp_query->query, $pixgraphy_args) );
	}
	if( have_posts() ) {
		while(have_posts() ) {
			the_post();
			get_template_part( 'content');
		}
	} ?>
</section>
<?php get_template_part( 'pagination', 'none' ); ?>
<!-- end #post_masonry -->
<?php }
get_footer();