<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
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

<div id="secondary">
<?php }
}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<div id="secondary">
  <?php }
	}?>
  <?php 
	if( 'default' == $layout ) { //Settings from customizer
		if(($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'nosidebar') && ($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'fullwidth')): ?>
  <?php dynamic_sidebar( 'pixgraphy_main_sidebar' ); ?>
</div> <!-- #secondary -->
<?php endif;
	}else{ // for page/post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){
			dynamic_sidebar( 'pixgraphy_main_sidebar' );
			echo '</div><!-- #secondary -->';
		}
	}