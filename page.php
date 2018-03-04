<?php
/**
 * The template for displaying all pages.
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */

get_header();
	$pixgraphy_settings = pixgraphy_get_theme_options();
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
	}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<div id="primary">
	<?php }
	}?>
	<main id="main">
	<?php
	if( has_post_thumbnail() && $pixgraphy_settings['pixgraphy_display_page_featured_image']!=0) { ?>
		<div class="post-image-content">
			<figure class="post-featured-image">
				<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
				<?php the_post_thumbnail('thumbnail'); ?>

				</a>
			</figure><!-- end.post-featured-image  -->
		</div> <!-- end.post-image-content -->
	<?php }
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<article>
		<div class="entry-content clearfix">
			<?php the_content();
				wp_link_pages( array(
				'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'pixgraphy' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
				) ); ?>
		</div> <!-- entry-content clearfix-->
		<?php  comments_template(); ?>
		</article>
	</section>
	<?php }
	} else { ?>
	<h1 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'pixgraphy' ); ?> </h1>
	<?php
	} ?>
	</main> <!-- #main -->
	<?php
if( 'default' == $layout ) { //Settings from customizer
	if(($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'nosidebar') && ($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}else{ // for page/post
	if(($layout != 'no-sidebar') && ($layout != 'full-width')){
		echo '</div><!-- #primary -->';
	}
}
get_sidebar();
get_footer();
