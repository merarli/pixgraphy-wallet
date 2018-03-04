<?php
/**
 * Displays the searchform
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$pixgraphy_settings = pixgraphy_get_theme_options();
		$pixgraphy_search_form = $pixgraphy_settings['pixgraphy_search_text'];
		if($pixgraphy_search_form !='Search &hellip;'): ?>
	<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($pixgraphy_search_form); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php else: ?>
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'pixgraphy' ); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->