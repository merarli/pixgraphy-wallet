<?php

/**
 * Display all pixgraphy functions and definitions
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */

/************************************************************************************************/
if (!function_exists('pixgraphy_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function pixgraphy_setup() {
        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 790;
        }

        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on pixgraphy, use a find and replace
        * to change 'pixgraphy' to the name of your theme in all the template files
        */
        load_theme_textdomain('pixgraphy', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');


        /*
        * Let WordPress manage the document title.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        */
        add_theme_support('post-thumbnails');
        // set_post_thumbnail_size( 300, 300, true );
        //独自
        add_image_size('thumb-square', 360, 360, true);


        register_nav_menus(array('primary' => __('Main Menu', 'pixgraphy')));

        /*
        * Enable support for custom logo.
        *
        */
        add_theme_support('custom-logo', array('flex-width' => true, 'flex-height' => true,));

        //Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support('customize-selective-refresh-widgets');

        /*
        * Switch default core markup for comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption',));

        /**
         * Add support for the Aside Post Formats
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('pixgraphy_custom_background_args', array('default-color' => 'ffffff', 'default-image' => '',)));

        add_editor_style(array('css/editor-style.css'));

        /**
         * Making the theme Woocommrece compatible
         */

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
endif; // pixgraphy_setup
add_action('after_setup_theme', 'pixgraphy_setup');

/***************************************************************************************/
function pixgraphy_content_width() {
    if (is_page_template('page-templates/gallery-template.php') || is_attachment()) {
        global $content_width;
        $content_width = 1170;
    }
}

add_action('template_redirect', 'pixgraphy_content_width');

/***************************************************************************************/
if (!function_exists('pixgraphy_get_theme_options')):
    function pixgraphy_get_theme_options() {
        return wp_parse_args(get_option('pixgraphy_theme_options', array()), pixgraphy_get_option_defaults_values());
    }
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/pixgraphy-default-values.php';
require(get_template_directory() . '/inc/settings/pixgraphy-functions.php');
require(get_template_directory() . '/inc/settings/pixgraphy-common-functions.php');
require get_template_directory() . '/inc/jetpack.php';

/************************ Pixgraphy Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/contactus-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';

/************************ Pixgraphy Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';
function pixgraphy_customize_register($wp_customize) {
    if (!class_exists('Pixgraphy_Plus_Features')) {
        class Pixgraphy_Customize_upgrade extends WP_Customize_Control{
            public function render_content() { ?>
                <a title="<?php esc_html_e('Review Pixgraphy', 'pixgraphy'); ?>"
                   href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/pixgraphy/'); ?>"
                   target="_blank" id="about_pixgraphy">
                    <?php esc_html_e('Review Pixgraphy', 'pixgraphy'); ?>
                </a><br/>
                <a href="<?php echo esc_url('https://themefreesia.com/theme-instruction/pixgraphy/'); ?>"
                   title="<?php esc_html_e('Theme Instructions', 'pixgraphy'); ?>" target="_blank" id="about_pixgraphy">
                    <?php esc_html_e('Theme Instructions', 'pixgraphy'); ?>
                </a><br/>
                <a href="<?php echo esc_url('https://tickets.themefreesia.com/'); ?>"
                   title="<?php esc_html_e('Support Ticket', 'pixgraphy'); ?>" target="_blank" id="about_pixgraphy">
                    <?php esc_html_e('Forum', 'pixgraphy'); ?>
                </a><br/>
                <?php
            }
        }

        $wp_customize->add_section('pixgraphy_upgrade_links', array('title' => __('About Pixgraphy', 'pixgraphy'), 'priority' => 2,));
        $wp_customize->add_setting('pixgraphy_upgrade_links', array('default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_filter_nohtml_kses',));
        $wp_customize->add_control(new Pixgraphy_Customize_upgrade($wp_customize, 'pixgraphy_upgrade_links', array('section' => 'pixgraphy_upgrade_links', 'settings' => 'pixgraphy_upgrade_links',)));
    }
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array('selector' => '.site-title a', 'container_inclusive' => false, 'render_callback' => 'pixgraphy_customize_partial_blogname',));
        $wp_customize->selective_refresh->add_partial('blogdescription', array('selector' => '.site-description', 'container_inclusive' => false, 'render_callback' => 'pixgraphy_customize_partial_blogdescription',));
    }
    require get_template_directory() . '/inc/customizer/functions/design-options.php';
    require get_template_directory() . '/inc/customizer/functions/theme-options.php';
    require get_template_directory() . '/inc/customizer/functions/social-icons.php';
    require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php';
}

if (!class_exists('Pixgraphy_Plus_Features')) {
    // Add Upgrade to Plus Button.
    require_once(trailingslashit(get_template_directory()) . 'inc/upgrade-plus/class-customize.php');
}
/*
/**
* Render the site title for the selective refresh partial.
* @see pixgraphy_customize_register()
* @return void
*/
function pixgraphy_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 * @see pixgraphy_customize_register()
 * @return void
 */
function pixgraphy_customize_partial_blogdescription() {
    bloginfo('description');
}

add_action('customize_register', 'pixgraphy_customize_register');
add_action('customize_preview_init', 'pixgraphy_customize_preview_js');
/**************************************************************************************/
function pixgraphy_hide_previous_custom_css($wp_customize) {
    // Bail if not WP 4.7.
    if (!function_exists('wp_get_custom_css_post')) {
        return;
    }
    $wp_customize->remove_control('pixgraphy_theme_options[pixgraphy_custom_css]');
}

add_action('customize_register', 'pixgraphy_hide_previous_custom_css');

/******************* Pixgraphy Header Display *************************/
function pixgraphy_header_display() {
    $pixgraphy_settings = pixgraphy_get_theme_options();
    $header_display = $pixgraphy_settings['pixgraphy_header_display'];
    if ($header_display == 'header_text') { ?>
        <div id="site-branding">
            <?php if (is_home() || is_front_page()){ ?>
            <h1 id="site-title"> <?php }else{ ?> <h2 id="site-title"> <?php } ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                       rel="home"> <?php bloginfo('name'); ?> </a>
                    <?php if (is_home() || is_front_page() || is_search()){ ?>
            </h1>  <!-- end .site-title -->
        <?php } else { ?> </h2> <!-- end .site-title --> <?php }
        $site_description = get_bloginfo('description', 'display');
        if ($site_description) {
            ?>
            <div id="site-description"> <?php bloginfo('description'); ?> </div> <!-- end #site-description -->
        <?php } ?>
        </div> <!-- end #site-branding -->
        <?php
    } elseif ($header_display == 'header_logo') { ?>
        <div id="site-branding"> <?php pixgraphy_the_custom_logo(); ?></div> <!-- end #site-branding -->
    <?php } elseif ($header_display == 'show_both') { ?>
        <div id="site-branding"> <?php pixgraphy_the_custom_logo(); ?></a>
            <?php if (is_home() || is_front_page()){ ?>
            <h1 id="site-title"> <?php }else{ ?> <h2 id="site-title"> <?php } ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                       rel="home"> <?php bloginfo('name'); ?> </a>
                <?php if (is_home() || is_front_page()){ ?></h1> <!-- end .site-title -->
        <?php } else { ?> </h2> <!-- end .site-title -->
        <?php }
        $site_description = get_bloginfo('description', 'display');
        if ($site_description) {
            ?>
            <div id="site-description"> <?php bloginfo('description'); ?> </div><!-- end #site-description -->
        <?php } ?>
        </div> <!-- end #site-branding -->
    <?php }
}

add_action('pixgraphy_site_branding', 'pixgraphy_header_display');

if (!function_exists('pixgraphy_the_custom_logo')) :
    /**
     * Displays the optional custom logo.
     * Does nothing if the custom logo is not available.
     */
    function pixgraphy_the_custom_logo() {
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
    }
endif;

//					フォームから受取
function form_post() {


    if (isset($_POST)) {
        $name = "'" . $_POST['name_'] . "'";;
        $date = "'" . $_POST['date'] . "'";
        $class = "'" . $_POST['class'] . "'";
        $place = "'" . $_POST['place'] . "'";
        $jpy = $_POST['jpy'];


        //データが来てるか確認 空じゃなかったらSQL実行

        if ($name !== "''") {
            global $wpdb;
            $query_result = $wpdb->query("INSERT INTO `wp_wallet` VALUES(" . "DEFAULT" . "," . $date . "," . $name . "," . $class . "," . $place . "," . $jpy . ")");
            //            echo "INSERT INTO `wp_wallet` VALUES(" . "DEFAULT" . "," . $name . "," . $date . "," . $place . "," . $class . "," . $jpy . ")";
        }
    }
}

add_shortcode('sc_form_post', 'form_post');

//お小遣いテーブル表示
function getTable() {
    $tmp = "";
    global $wpdb;
    $results = $wpdb->get_results("SELECT DISTINCT * FROM wp_wallet ORDER BY date ASC");

    $tmp .= '<table class="type07 list-size tablesorter">';
    $tmp .= '<thead><tr><th>id</th><th>日付</th><th>品名</th><th>場所</th><th>分類</th><th>円</th></tr></thead>';
    $tmp .= '<tbody>';
    for ($i = 0; $i < count($results); $i++) {
        $tmp .= '<tr>';

        $tmp .= '<td>' . $results[$i]->id . '</td>';
        $tmp .= '<td>' . $results[$i]->date . '</td>';
        $tmp .= '<td>' . $results[$i]->name . '</td>';
        $tmp .= '<td>' . $results[$i]->place . '</td>';
        $tmp .= '<td>' . $results[$i]->class . '</td>';
        $tmp .= '<td>' . $results[$i]->jpy . '</td>';


        $tmp .= '</tr>';
    }
    $tmp .= '</tbody>';
    $tmp .= '</table>';
    return $tmp;
}

add_shortcode('sc_getTable', 'getTable');

//今月の使用額表示
function useJpy() {
    $today = date("Y-m");
    print $today;
    $sum_ = "";
    global $wpdb;
    $results = $wpdb->get_results("SELECT sum(jpy) as gokei FROM wp_wallet WHERE date LIKE '%". $today ."%'");
    for ($i = 0; $i < count($results); $i++) {
        $sum_ = $results[$i]->gokei;
    }
    return "今月の出費:" . $sum_ . "円";

}

add_shortcode('sc_useJpy', 'useJpy');