<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */

/****************** PIXGRAPHY DISPLAY COMMENT NAVIGATION *******************************/
function pixgraphy_comment_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'pixgraphy' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'pixgraphy' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;
				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'pixgraphy' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
/******************** Remove div and replace with ul**************************************/
add_filter('wp_page_menu', 'pixgraphy_wp_page_menu');
function pixgraphy_wp_page_menu($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass   = $matches[1];
	$replace    = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($replace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup;
}
/***************Pass slider effect  parameters from php files to jquery file ********************/
function pixgraphy_slider_value() {
	$pixgraphy_settings = pixgraphy_get_theme_options();
	$pixgraphy_transition_effect   = esc_attr($pixgraphy_settings['pixgraphy_transition_effect']);
	$pixgraphy_transition_delay    = absint($pixgraphy_settings['pixgraphy_transition_delay'])*1000;
	$pixgraphy_transition_duration = absint($pixgraphy_settings['pixgraphy_transition_duration'])*1000;
	wp_localize_script(
		'pixgraphy-slider',
		'pixgraphy_slider_value',
		array(
			'transition_effect'   => $pixgraphy_transition_effect,
			'transition_delay'    => $pixgraphy_transition_delay,
			'transition_duration' => $pixgraphy_transition_duration,
		)
	);
}
/**************************** Display Header Title ***********************************/
function pixgraphy_title($title) {
	$format = get_post_format();
	$pixgraphy_settings = pixgraphy_get_theme_options();
	$title='';
	if( is_archive() ) {
		if ( is_category() ) :
			$title = single_cat_title( '', FALSE );
		elseif ( is_tag() ) :
			if($pixgraphy_settings['pixgraphy_photography_layout'] != 'photography_layout' ):
				$title = single_tag_title( '', FALSE );
			endif;
		elseif ( is_author() ) :
			the_post();
			$title =  sprintf( __( 'Author: %s', 'pixgraphy' ), get_the_author() );
			rewind_posts();
		elseif ( is_day() ) :
			$title = sprintf( __( 'Day: %s', 'pixgraphy' ), get_the_date() );
		elseif ( is_month() ) :
			$title = sprintf( __( 'Month: %s', 'pixgraphy' ), get_the_date( 'F Y' ) );
		elseif ( is_year() ) :
			$title = sprintf( __( 'Year: %s', 'pixgraphy' ), get_the_date( 'Y' ) );
		elseif ( $format == 'audio' ) :
			$title = __( 'Audios', 'pixgraphy' );
		elseif ( $format =='aside' ) :
			$title = __( 'Asides', 'pixgraphy');
		elseif ( $format =='image' ) :
			$title = __( 'Images', 'pixgraphy' );
		elseif ( $format =='gallery' ) :
			$title = __( 'Galleries', 'pixgraphy' );
		elseif ( $format =='video' ) :
			$title = __( 'Videos', 'pixgraphy' );
		elseif ( $format =='status' ) :
			$title = __( 'Status', 'pixgraphy' );
		elseif ( $format =='quote' ) :
			$title = __( 'Quotes', 'pixgraphy' );
		elseif ( $format =='link' ) :
			$title = __( 'links', 'pixgraphy' );
		elseif ( $format =='chat' ) :
			$title = __( 'Chats', 'pixgraphy' );
		elseif ( class_exists('WooCommerce') && (is_shop() || is_product_category()) ):
  			$title = woocommerce_page_title( false );
  		elseif ( class_exists('bbPress') && is_bbpress()) :
  			$title = get_the_title();
		else :
			$title = get_the_archive_title();
		endif;
	} elseif (is_home()){
		$title = get_the_title( get_option( 'page_for_posts' ) );
	} elseif (is_404()) {
		$title = __('Page NOT Found', 'pixgraphy');
	} elseif (is_search()) {
		$title = __('Search Results', 'pixgraphy');
	} elseif (is_page_template()) {
		$title = get_the_title();
	} else {
		$title = get_the_title();
	}
	return $title;
}
add_filter( 'pixgraphy_filter_title', 'pixgraphy_title' );
/********************* Custom Header setup ************************************/
function pixgraphy_custom_header_setup() {
	$args = array(
		'default-text-color'     => '',
		'default-image'          => '',
		'height'                 => apply_filters( 'pixgraphy_header_image_height', 450 ),
		'width'                  => apply_filters( 'pixgraphy_header_image_width', 2500 ),
		'random-default'         => false,
		'max-width'              => 2500,
		'flex-height'            => true,
		'flex-width'             => true,
		'random-default'         => false,
		'header-text'				 => false,
		'uploads'				 => true,
		'wp-head-callback'       => '',
		'admin-preview-callback' => 'pixgraphy_admin_header_image',
		'default-image' => '',
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'pixgraphy_custom_header_setup' );

/********************* Remove Parallax Effect on Header Image ***********************************/
function pixgraphy_remove_parallax_css() {
	$pixgraphy_settings = pixgraphy_get_theme_options();
	if ($pixgraphy_settings['pixgraphy_remove_parallax_fromheader'] !=0){
		$pixgraphy_parallax_css .= '<!-- Remove Parallax Effect on Header Image -->'."\n";
			$pixgraphy_parallax_css .= '<style type="text/css" media="screen">'."\n";
			$pixgraphy_parallax_css .= 
			/*Remove Parallax Effect on Header Image - Use 1920x350px dimension image*/
			'.top-header {
				background-attachment: inherit;
				min-height: 250px;
			}

			@media only screen and (max-width: 1023px) { 
				.top-header {
					min-height: auto;
				}
			}';
			$pixgraphy_parallax_css .= '</style>'."\n";
			echo $pixgraphy_parallax_css;
	}
}
add_filter( 'wp_head', 'pixgraphy_remove_parallax_css');