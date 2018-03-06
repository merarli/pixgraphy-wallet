<?php
/*
Template Name: お小遣い管理システム出力専用！
*/


/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$pixgraphy_settings = pixgraphy_get_theme_options(); ?>
<head>
    <!--add-->
    <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" rel="stylesheet"/>
    <link href="<?php bloginfo('template_directory'); ?>/css/jquery.bootgrid.css" rel="stylesheet"/>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.xdomainajax.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/ajaxzip2.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.payment.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/boot.js"></script>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.bootgrid.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<!--    <script src="--><?php //bloginfo('template_directory'); ?><!--/js/mychart.js"></script>-->

    <!--add-->
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <!-- Masthead ============================================= -->
    <header id="masthead" class="site-header">
        <div class="top-header"
             <?php if (get_header_image() != ''){ ?>style="background-image:url('<?php echo get_header_image(); ?>');" <?php } ?>>
            <div class="container clearfix">
                <?php
                if (is_active_sidebar('pixgraphy_header_info')) {
                    dynamic_sidebar('pixgraphy_header_info');
                }
                if ($pixgraphy_settings['pixgraphy_top_social_icons'] == 0):
                    echo '<div class="header-social-block">';
                    do_action('social_links');
                    echo '</div>' . '<!-- end .header-social-block -->';
                endif;
                do_action('pixgraphy_site_branding'); ?>
            </div> <!-- end .container -->
        </div> <!-- end .top-header -->
        <?php
        $enable_slider = $pixgraphy_settings['pixgraphy_enable_slider'];
        pixgraphy_slider_value();
        if ($enable_slider == 'frontpage' || $enable_slider == 'enitresite') {
            if (is_front_page() && ($enable_slider == 'frontpage')) {
                if ($pixgraphy_settings['pixgraphy_slider_type'] == 'default_slider') {
                    pixgraphy_page_sliders();
                } else {
                    if (class_exists('Pixgraphy_Plus_Features')):
                        do_action('pixgraphy_image_sliders');
                    endif;
                }
            }
            if ($enable_slider == 'enitresite') {
                if ($pixgraphy_settings['pixgraphy_slider_type'] == 'default_slider') {
                    pixgraphy_page_sliders();
                } else {
                    if (class_exists('Pixgraphy_Plus_Features')):
                        do_action('pixgraphy_image_sliders');
                    endif;
                }
            }
        } ?>
        <!-- Main Header============================================= -->
        <div id="sticky_header">
            <div class="container clearfix">
                <!-- Main Nav ============================================= -->
                <?php
                if (has_nav_menu('primary')) { ?>
                    <?php $args = array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',); ?>
                    <nav id="site-navigation" class="main-navigation clearfix">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                            <span class="line-three"></span>
                        </button>
                        <?php wp_nav_menu($args);//extract the content from apperance-> nav menu ?>
                    </nav> <!-- end #site-navigation -->
                <?php } else {// extract the content from page menu only ?>
                    <nav id="site-navigation" class="main-navigation clearfix">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                            <span class="line-three"></span>
                        </button>
                        <?php wp_page_menu(array('menu_class' => 'menu', 'items_wrap' => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>')); ?>
                    </nav> <!-- end #site-navigation -->
                <?php }
                $search_form = $pixgraphy_settings['pixgraphy_search_custom_header'];
                if (1 != $search_form) { ?>
                    <div id="search-toggle" class="header-search"></div>
                    <div id="search-box" class="clearfix">
                        <?php get_search_form(); ?>
                    </div>  <!-- end #search-box -->
                <?php }

                echo '</div> <!-- end .container -->
			</div> <!-- end #sticky_header -->';
                ?>
    </header> <!-- end #masthead -->
    <!-- Main Page Start ============================================= -->
    <div id="content">
        <?php if ($pixgraphy_settings['pixgraphy_photography_layout'] == 'photography_layout' && !is_page() && !is_single()){
        if (is_404() || is_search() || is_archive()):
        if ($pixgraphy_settings['pixgraphy_photography_layout'] == 'photography_layout'){
        if (class_exists('WooCommerce') && (is_shop() || is_product_category())){ ?>
        <div class="container clearfix">
            <?php }else{
            if (is_404()){ ?>
            <div class="container clearfix">
                <?php }
                // silence is golden
                }
                }else{ ?>
                <div class="container clearfix">
                    <?php }
                    else: ?>
                    <div id="main">
                        <?php endif;
                        }else{ ?>
                        <div class="container clearfix">
                            <?php }
                            if (is_home()) {
                                // silence is golden;
                            } else {
                                if (is_category() || is_tag() || is_author() || has_post_format() || is_archive()) {
                                    if ($pixgraphy_settings['pixgraphy_photography_layout'] == 'photography_layout') {
                                        //silence is golder
                                        ?>
                                    <?php }
                                } else {
                                    $custom_page_title = apply_filters('pixgraphy_filter_title', ''); ?>
                                    <div class="page-header">
                                        <h1 class="page-title"><?php echo esc_html($custom_page_title); ?></h1>
                                        <!-- .page-title -->
                                        <?php pixgraphy_breadcrumb(); ?>
                                        <!-- .breadcrumb -->
                                    </div>
                                    <!-- .page-header -->
                                <?php }
                            }


                            $pixgraphy_settings = pixgraphy_get_theme_options();
                            global $pixgraphy_content_layout;
                            if ($post) {
                                $layout = get_post_meta(get_queried_object_id(), 'pixgraphy_sidebarlayout', true);
                            }
                            if (empty($layout) || is_archive() || is_search() || is_home()) {
                                $layout = 'default';
                            }
                            if ('default' == $layout) { //Settings from customizer
                            if (($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'nosidebar') && ($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'fullwidth')){ ?>

                            <div id="primary">
                                <?php }
                                }else{ // for page/ post
                                if (($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
                                <div id="primary">
                                    <?php }
                                    } ?>
                                    <main id="main" class="site-main clearfix">


                                        <?php global $pixgraphy_settings;
                                        if (have_posts()) {
                                            while (have_posts()) {
                                                the_post(); ?>
                                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                    <header class="entry-header">
                                                        <?php
                                                        $entry_format_meta_blog = $pixgraphy_settings['pixgraphy_entry_meta_blog'];
                                                        if ($entry_format_meta_blog == 'show-meta') {
                                                            ?>
                                                            <div class="entry-meta">
                                                                <?php
                                                                $format = get_post_format();
                                                                if (current_theme_supports('post-formats', $format)) {
                                                                    printf('<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>', sprintf(''), esc_url(get_post_format_link($format)), get_post_format_string($format));
                                                                } ?>
                                                                <span class="author vcard"><a
                                                                            href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"
                                                                            title="<?php the_author(); ?>"><i
                                                                                class="fa fa-user">aaaaaa</i>
                                                                        <?php the_author(); ?> </a></span>

                                                                <span class="posted-on"><a
                                                                            title="<?php echo esc_attr(get_the_time()); ?>"
                                                                            href="<?php the_permalink(); ?>"><i
                                                                                class="fa fa-calendar"></i>
                                                                        <?php the_time(get_option('date_format')); ?> </a></span>
                                                                <?php if (comments_open()) { ?>
                                                                    <span class="comments"><i class="fa fa-comment"></i>
                                                                        <?php comments_popup_link(__('No Comments', 'pixgraphy'), __('1 Comment', 'pixgraphy'), __('% Comments', 'pixgraphy'), '', __('Comments Off', 'pixgraphy')); ?> </span>
                                                                <?php } ?>
                                                            </div> <!-- end .entry-meta -->
                                                        <?php } ?>
                                                    </header> <!-- end .entry-header -->
                                                    <?php $featured_image_display = $pixgraphy_settings['pixgraphy_single_post_image'];
                                                    if ($featured_image_display == 'on'):
                                                        if (has_post_thumbnail()) { ?>
                                                            <div class="post-image-content">
                                                                <figure class="post-featured-image">
                                                                    <?php the_post_thumbnail('thumbnail'); ?>

                                                                </figure><!-- end.post-featured-image  -->
                                                            </div> <!-- end.post-image-content -->
                                                        <?php }
                                                    endif; ?>
                                                    <div class="entry-content clearfix">
                                                        <?php the_content();
                                                        wp_link_pages(array('before' => '<div style="clear: both;"></div><div class="pagination clearfix">' . __('Pages:', 'pixgraphy'), 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>', 'pagelink' => '%', 'echo' => 1)); ?>
                                                    </div> <!-- .entry-content -->


                                                    <?php $disable_entry_format = $pixgraphy_settings['pixgraphy_entry_format_blog'];
                                                    if ($disable_entry_format == 'show' || $disable_entry_format == 'show-button' || $disable_entry_format == 'hide-button') { ?>
                                                        <footer class="entry-footer">
                                                            <?php if ($disable_entry_format != 'show-button') { ?>
                                                                <span class="cat-links">
					<?php esc_html_e('Category : ', 'pixgraphy');
                    the_category(', '); ?>
					</span> <!-- end .cat-links -->
                                                                <?php $tag_list = get_the_tag_list('', __(', ', 'pixgraphy'));
                                                                if (!empty($tag_list)) { ?>
                                                                    <span class="tag-links">
						<?php echo $tag_list; ?>
						</span> <!-- end .tag-links -->
                                                                <?php }
                                                            } ?>
                                                        </footer> <!-- .entry-meta -->
                                                    <?php }
                                                    if (is_attachment()) { ?>
                                                        <ul class="default-wp-page clearfix">
                                                            <li class="previous"> <?php previous_image_link(false, __('&larr; Previous', 'pixgraphy')); ?> </li>
                                                            <li class="next">  <?php next_image_link(false, __('Next &rarr;', 'pixgraphy')); ?> </li>
                                                        </ul>
                                                    <?php } else { ?>
                                                        <ul class="default-wp-page clearfix">
                                                            <li class="previous"> <?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'pixgraphy') . '</span> %title'); ?> </li>
                                                            <li class="next"> <?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'pixgraphy') . '</span>'); ?> </li>
                                                        </ul>
                                                    <?php }
                                                    comments_template(); ?>
                                                </article>
                                                </section> <!-- .post -->
                                            <?php }
                                        } else { ?>
                                            <h1 class="entry-title"> <?php esc_html_e('No Posts Found.', 'pixgraphy'); ?> </h1>
                                        <?php } ?>
                                    </main> <!-- #main -->
                                    <?php
                                    if ('default' == $layout) { //Settings from customizer
                                    if (($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'nosidebar') && ($pixgraphy_settings['pixgraphy_sidebar_layout_options'] != 'fullwidth')): ?>


                                </div> <!-- #primary -->
                            <?php endif;
                            } else { // for page/post
                                if (($layout != 'no-sidebar') && ($layout != 'full-width')) {
                                    echo '</div><!-- #primary -->';
                                }
                            }
                            //get_sidebar();


                            $pixgraphy_settings = pixgraphy_get_theme_options();
                            if ($pixgraphy_settings['pixgraphy_photography_layout'] == 'photography_layout' && !is_page() && !is_single()){
                            if (is_404() || is_search() || is_archive()):
                            if ($pixgraphy_settings['pixgraphy_photography_layout'] == 'photography_layout'){
                            if (class_exists('WooCommerce') && (is_shop() || is_product_category())){ ?>
                            </div> <!-- end .container -->
                            <?php }else{
                            if (is_404()){ ?>
                        </div> <!-- end .container -->
                    <?php }
                    // silence is golden
                    }
                    }else{
                    ?>
                    </div> <!-- end .container -->
                <?php }
                else: ?>
                </div> <!-- end #main -->
            <?php
            endif;
            }else{
            ?>
            </div> <!-- end .container -->
        <?php
        } ?>


        </div> <!-- end #content -->
        <!-- Footer Start ============================================= -->
        <footer id="colophon" class="site-footer clearfix">
            <?php
            if (class_exists('Pixgraphy_Plus_Features')) {
                do_action('pixgraphy_footer_column');
            } ?>
            <div class="site-info"
                 <?php if ($pixgraphy_settings['pixgraphy-img-upload-footer-image'] != ''){ ?>style="background-image:url('<?php echo esc_url($pixgraphy_settings['pixgraphy-img-upload-footer-image']); ?>');" <?php } ?>>
                <div class="container">
                    <?php if (!empty($pixgraphy_settings['pixgraphy-footer-logo']) || !empty($pixgraphy_settings['pixgraphy-footer-title'])): ?>
                        <div id="site-branding">
                            <?php
                            if (!empty($pixgraphy_settings['pixgraphy-footer-title'])): ?>
                                <h2 id="site-title">
                                    <a href="<?php echo esc_url($pixgraphy_settings['pixgraphy-footer-link']); ?>"
                                       title="<?php echo esc_html($pixgraphy_settings['pixgraphy-footer-title']); ?>"><?php echo esc_html($pixgraphy_settings['pixgraphy-footer-title']); ?></a>
                                </h2>
                                <!-- end #site-title -->
                            <?php endif; ?>
                        </div>
                        <!-- end #site-branding -->
                    <?php endif;
                    if ($pixgraphy_settings['pixgraphy_buttom_social_icons'] == 0):
                        do_action('social_links');
                    endif;
                    if (class_exists('Pixgraphy_Plus_Features')) {
                        do_action('pixgraphy_footer_menu');
                    }

                    if (is_active_sidebar('pixgraphy_footer_options')) :
                        dynamic_sidebar('pixgraphy_footer_options');
                    else:
                    echo '<div class="copyright">' . '&copy; ' . date('Y') . ' '; ?>
                    <a title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" target="_blank"
                       href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name', 'display'); ?></a> |
                    <?php esc_html_e('Designed by:', 'pixgraphy'); ?> <a
                            title="<?php echo esc_attr__('Theme Freesia', 'pixgraphy'); ?>" target="_blank"
                            href="<?php echo esc_url('https://themefreesia.com'); ?>"><?php esc_html_e('Theme Freesia', 'pixgraphy'); ?></a>
                    |
                    <?php esc_html_e('Powered by:', 'pixgraphy'); ?> <a
                            title="<?php echo esc_attr__('WordPress', 'pixgraphy'); ?>" target="_blank"
                            href="<?php echo esc_url('http://wordpress.org'); ?>"><?php esc_html_e('WordPress', 'pixgraphy'); ?></a>
                </div>
                <?php endif; ?>
                <div style="clear:both;"></div>
            </div> <!-- end .container -->
    </div> <!-- end .site-info -->
    <?php
    $disable_scroll = $pixgraphy_settings['pixgraphy_scroll'];
    if ($disable_scroll == 0):?>
        <div class="go-to-top"><a title="<?php esc_html_e('Go to Top', 'pixgraphy'); ?>" href="#masthead"><i
                        class="fa fa-angle-double-up"></i></a></div> <!-- end .go-to-top -->
    <?php endif; ?>
    </footer> <!-- end #colophon -->
</div> <!-- end #page -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.bootgrid.js"></script>
<script>
    $(function () {
        $("#grid-basic").bootgrid();
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script>
<?php classSum(); ?>
</script>

<?php wp_footer(); ?>
</body>
</html>



