<?php
/**
 * Moc functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Moc
 * @since Moc 1.0
 */
/**
 * Moc only works in WordPress 4.4 or later.
 */




if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}
if (!function_exists('moc_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own moc_setup() function to override in a child theme.
     *
     * @since Moc 1.0
     */
    function moc_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Moc, use a find and replace
         * to change 'moc' to the name of your theme in all the template files
         */
        load_theme_textdomain('moc', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_filter('feed_links_show_comments_feed', '__return_false');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'moc'),
            'social' => __('Social Links Menu', 'moc'),
        ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ));
        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css'));
        /*remove links and styles, added by wordpress */
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'rest_output_link_wp_head');

    }

    flush_rewrite_rules();
endif; // moc_setup
add_action('after_setup_theme', 'moc_setup');
function jquery_deregister()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true);
    wp_enqueue_script('jquery');

//    wp_deregister_script('google-invisible-recaptcha');
//    $googleApiUrl = 'https://www.google.com/recaptcha/api.js?onload=renderInvisibleReCaptcha&render=explicit';
//    empty($languageCode) ?: $googleApiUrl .= "&hl=$languageCode";
//    wp_register_script('google-invisible-recaptcha', $googleApiUrl , array(), null, true);

}

add_action('wp_enqueue_scripts', 'jquery_deregister');
//removed SSBA script from header https://ws.sharethis.com/button/st_insights.js
function ssba_deregister_script_method()
{
    wp_deregister_script('ssba-sharethis');
    wp_dequeue_style("simple-share-buttons-adder-font-awesome");
    $page_slug = get_page_template_slug();
    if ($page_slug == 'page-blog.php'
        || is_singular('post')
        || $page_slug == 'page-careers-general.php'
        || $page_slug == 'page-careers-ua.php'
        || $page_slug == 'page-careers.php'
        || is_singular('careers-kyiv')
        || is_singular('careers-cherkasy')
        || is_singular('careers-winnipeg')
        || is_singular('careers-seattle')
        || is_singular('career_ua')) {
        if (is_ssl()) {
            $st_insights = 'https://ws.sharethis.com/button/st_insights.js';
        } else {
            $st_insights = 'http://w.sharethis.com/button/st_insights.js';
        };
        $url = add_query_arg(array(
            'publisher' => '4d48b7c5-0ae3-43d4-bfbe-3ff8c17a8ae6',
            'product' => 'simpleshare',
        ), $st_insights);
        wp_register_script('ssba-sharethis', $url, '', null, true);
        wp_enqueue_script('ssba-sharethis');
    };
}

;
add_action('wp_enqueue_scripts', 'ssba_deregister_script_method');

/**
 * Enqueues scripts and styles.
 *
 * @since Moc 1.0
 */
if (!function_exists('moc_scripts')) {
    function moc_scripts()
    {
        if (is_admin()) {
            wp_register_style('editor-style', get_template_directory_uri() . '/css/editor-style.css');
            wp_enqueue_style('editor-style');
            add_editor_style(array('editor-style'));
        }

        wp_register_script('fastclick-js', get_template_directory_uri() . "/js/src/chatwidget/fastclick.js", array('jquery'), "", true);
        wp_enqueue_script('fastclick-js');

        $page_slug = get_page_template_slug();
        if (($page_slug == 'page-ma.php')) {
            wp_register_style('ma-styles', get_template_directory_uri() . '/css/ma-styles.css');
            wp_enqueue_style('ma-styles');
        } else {
            wp_register_style('moc-header', get_template_directory_uri() . '/css/moc-header.css');
            wp_enqueue_style('moc-header');

            wp_register_style('moc-common', get_template_directory_uri() . '/css/moc-common.css');
            wp_enqueue_style('moc-common');

            wp_register_style('owlcarousel', get_template_directory_uri() . '/js/OwlCarousel2-2.3.3/dist/assets/owl.carousel.min.css');
            wp_enqueue_style('owlcarousel');

            wp_register_script('moc-common', get_template_directory_uri() . '/js/moc-common.js', array('jquery'), '1.1.0', true);
            wp_enqueue_script('moc-common');

            if ($page_slug == 'page-chatbots.php') {
                wp_register_style('moc-chatbots', get_template_directory_uri() . '/css/moc-chatbots.css');
                wp_enqueue_style('moc-chatbots');
                wp_register_script('moc-chatbots', get_template_directory_uri() . '/js/moc-chatbots.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-chatbots');
            } elseif (($page_slug == 'page-ai-landing.php') || ($page_slug == 'page-ai-landing-ecommerce.php')) {
                wp_register_style('moc-chatbots', get_template_directory_uri() . '/css/moc-chatbots.css');
                wp_enqueue_style('moc-chatbots');
                wp_register_script('moc-chatbots', get_template_directory_uri() . '/js/moc-chatbots.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-chatbots');
                wp_register_script('moc-ai-landing', get_template_directory_uri() . '/js/moc-ai-landing.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-ai-landing');
                wp_register_style('moc-ai-css', get_template_directory_uri() . '/css/moc-ai-landing.css');
                wp_enqueue_style('moc-ai-css');
//                wp_register_script('moc-ai-landing', get_template_directory_uri() . '/js/moc-ai-landing.js', array('jquery'), '1.1.0', true);
//                wp_enqueue_script('moc-ai-landing');
            } elseif (($page_slug == 'page-design.php' || is_singular('service') || (is_admin()))) {
                wp_register_style('moc-services', get_template_directory_uri() . '/css/moc-services.css');
                wp_enqueue_style('moc-services');
                wp_register_script('moc-design', get_template_directory_uri() . '/js/moc-design.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-design');
            } elseif (($page_slug == 'page-blog.php' || is_singular('post') || is_singular('knowledge-base')|| (is_admin()))) {
                wp_register_style('moc-blog', get_template_directory_uri() . '/css/moc-blog.css');
                wp_enqueue_style('moc-blog');
                wp_register_script('moc-blog', get_template_directory_uri() . '/js/moc-blog.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-blog');
                wp_localize_script('moc-blog', 'blogVars', array('ajaxUrl' => admin_url('admin-ajax.php')));
            } elseif ($page_slug == 'page-careers-general.php' || $page_slug == 'page-careers-ua.php' || $page_slug == 'page-careers.php' || is_singular('careers-kyiv') || is_singular('careers-cherkasy') || is_singular('careers-winnipeg') || is_singular('careers-seattle') || is_singular('career_ua')) {
                wp_register_style('moc-careers', get_template_directory_uri() . '/css/moc-careers.css');
                wp_enqueue_style('moc-careers');
                wp_register_script('moc-portfolio', get_template_directory_uri() . '/js/moc-portfolio.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-portfolio');
            } elseif ($page_slug == 'page-portfolio.php' || is_singular('portfolio')) {
                wp_register_style('moc-portfolio', get_template_directory_uri() . '/css/moc-portfolio.css');
                wp_enqueue_style('moc-portfolio');
                wp_register_script('moc-portfolio', get_template_directory_uri() . '/js/moc-portfolio.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-portfolio');
                wp_localize_script('moc-portfolio', 'blogVars', array('ajaxUrl' => admin_url('admin-ajax.php')));
            } elseif ($page_slug == 'page-flexible.php' || $page_slug == 'page-terms-of-use.php' || $page_slug == 'page-privacy-policy.php' || $page_slug == 'page-design.php' || $page_slug == 'page-design-test.php' || $page_slug == 'page-mobile-service.php') {
                wp_register_style('moc-services', get_template_directory_uri() . '/css/moc-services.css');
                wp_enqueue_style('moc-services');
                wp_register_script('moc-chatbots', get_template_directory_uri() . '/js/moc-chatbots.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-chatbots');
            } elseif ($page_slug == 'page-business-process-automation.php') {
                wp_register_style('business-process-automation', get_template_directory_uri() . '/css/business-process-automation.css');
                wp_enqueue_style('business-process-automation');
                wp_register_style('owl-bpa-carousel', get_template_directory_uri() . '/css/owl-bpa-carousel.css');
                wp_enqueue_style('owl-bpa-carousel');
                wp_register_script('bpa-slider', get_template_directory_uri() . '/js/moc-bpa.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('bpa-slider');
            } elseif ($page_slug == 'page-about-us.php') {
                wp_register_style('about-us', get_template_directory_uri() . '/css/about-us.css');
                wp_enqueue_style('about-us');
                wp_register_script('about-us-js', get_template_directory_uri() . '/js/about-us.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('about-us-js');
                wp_register_style('moc-careers', get_template_directory_uri() . '/css/moc-careers.css');
                wp_enqueue_style('moc-careers');
            } elseif ($page_slug == 'page-webinars.php' || is_singular('webinars') || $page_slug == 'page-webinar-successful-registration.php') {
                wp_register_style('moc-webinars', get_template_directory_uri() . '/css/moc-webinars.css');
                wp_enqueue_style('moc-webinars');

                wp_register_style('moc-blog', get_template_directory_uri() . '/css/moc-blog.css');
                wp_enqueue_style('moc-blog');
                wp_register_script('moc-blog', get_template_directory_uri() . '/js/moc-blog.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-blog');
                wp_localize_script('moc-blog', 'blogVars', array('ajaxUrl' => admin_url('admin-ajax.php')));

//                wp_register_script('moc-webinars-js', get_template_directory_uri() . '/js/moc-portfolio.js', array('jquery'),'1.1.0', true);
//                wp_enqueue_script('moc-webinars-js');
            } elseif ($page_slug == 'page-ebooks-and-whitepapers.php') {
                wp_register_style('moc-other', get_template_directory_uri() . '/css/moc-other.css');
                wp_enqueue_style('moc-other');

                wp_register_style('moc-blog', get_template_directory_uri() . '/css/moc-blog.css');
                wp_enqueue_style('moc-blog');
                wp_register_script('moc-blog', get_template_directory_uri() . '/js/moc-blog.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-blog');
                wp_localize_script('moc-blog', 'blogVars', array('ajaxUrl' => admin_url('admin-ajax.php')));

            } elseif ($page_slug == 'page-conversation-design.php') {
                wp_register_style('moc-other', get_template_directory_uri() . '/css/moc-other.css');
                wp_enqueue_style('moc-other');
//
//                wp_register_style('moc-blog', get_template_directory_uri() . '/css/moc-blog.css');
//                wp_enqueue_style('moc-blog');

            } else {
                wp_register_style('moc-other', get_template_directory_uri() . '/css/moc-other.css');
                wp_enqueue_style('moc-other');
                wp_register_script('moc-portfolio', get_template_directory_uri() . '/js/moc-portfolio.js', array('jquery'), '1.1.0', true);
                wp_enqueue_script('moc-portfolio');
            };

            wp_register_script('lozad', get_template_directory_uri() . '/js/lozad.min.js', array('jquery'), "1.10.0", true);
            wp_register_script('owlslider', get_template_directory_uri() . "/js/OwlCarousel2-2.3.3/dist/owl.carousel.min.js", array('jquery'), "4.1.2", true);
            wp_enqueue_script('lozad');
            wp_enqueue_script('owlslider');

            wp_register_script('countdown-js', get_template_directory_uri() . '/js/countdown/countdown.js', array('jquery'), '1.1.0', true);
            wp_enqueue_script('countdown-js');

        }
    }

}
add_action('wp_enqueue_scripts', 'moc_scripts');



function deregister_thickbox()
{
    if (!is_admin()) {
        wp_deregister_style('thickbox');
        wp_deregister_script('thickbox');
    };
    wp_deregister_style('wp-block-library');
}

add_action('init', 'deregister_thickbox');


/**
 * Converts a HEX value to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 * @since Moc 1.0
 *
 */
function moc_hex2rgb($color)
{
    $color = trim($color, '#');
    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } else if (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return array();
    }
    return array('red' => $r, 'green' => $g, 'blue' => $b);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Ajax data.
 */
require get_template_directory() . '/inc/ajaxdata.php';
/**
 * Ajax Zoho data.
 */
require get_template_directory() . '/inc/zohodata.php';
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array $size Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 * @since Moc 1.0
 *
 */
function moc_content_image_sizes_attr($sizes, $size)
{
    $width = $size[0];
    840 <= $width && $sizes = '(max-width: 709px) 100vw, (max-width: 909px) 100vw, (max-width: 1362px) 100vw, 840px';
    if ('page' === get_post_type()) {
        840 > $width && $sizes = '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
    } else {
        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 100vw, (max-width: 909px) 100vw, (max-width: 984px) 100vw, (max-width: 1362px) 100vw, 600px';
        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    }
    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'moc_content_image_sizes_attr', 10, 2);
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @param array $attr Attributes for the image markup.
 * @param int $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 * @since Moc 1.0
 *
 */
function moc_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
    if ('post-thumbnail' === $size) {
        is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        !is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
    }
    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'moc_post_thumbnail_sizes_attr', 10, 3);
/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 * @since Moc 1.1
 *
 */
function moc_widget_tag_cloud_args($args)
{
    $args['largest'] = 1;
    $args['smallest'] = 1;
    $args['unit'] = 'em';
    return $args;
}

add_filter('widget_tag_cloud_args', 'moc_widget_tag_cloud_args');
function moc_css_attributes_filter($var)
{
    $search_class = 'with-submenu';
    if (is_array($var)) {
        if (in_array($search_class, $var)) {
            return array($search_class);
        }
        return array();
    }
    return '';
}

function services_custom_fields($tag)
{
    $t_id = $tag->term_id;
    $checked_ids = unserialize(get_option("service_{$t_id}_portfolios"));
    if (!$checked_ids)
        $checked_ids = array();
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'service',
                'field' => 'id',
                'terms' => $t_id,
                'include_children' => false
            )
        )
    );
    $portfolios = get_posts($args); ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="portfolios"><?php _e('Show projects', 'moc'); ?></label>
        </th>
        <td>
            <?php foreach ($portfolios as $portfolio) { ?>
                <input type="checkbox" id="portfolios[<?php echo $portfolio->ID; ?>]"
                       name="portfolios[<?php echo $portfolio->ID; ?>]"
                       value="<?php echo $portfolio->ID; ?>" <?php checked(in_array($portfolio->ID, $checked_ids)); ?>>
                <?php echo $portfolio->post_title; ?><br>
            <?php } ?>
        </td>
    </tr>
    <?php
}

function save_services_custom_fields($term_id)
{
    if (isset($_POST['portfolios'])) {
        $checked_ids = array_keys($_POST['portfolios']);
        $checked_ids = serialize($checked_ids);
    } else
        $checked_ids = '';
    update_option("service_{$term_id}_portfolios", $checked_ids);
}

add_action('service_edit_form_fields', 'services_custom_fields', 10, 2);
add_action('edited_service', 'save_services_custom_fields', 10, 2);
add_filter('body_class', 'add_body_classes');
if (!function_exists('add_body_classes')) {
    function add_body_classes($classes)
    {
        global $post;
        if (is_page()) {
            $page_slug = get_page_template_slug($post->ID);
            $class = str_replace('.php', '', $page_slug);
            $classes[] = $class;
        } elseif (is_tax('service')) {
            $classes[] = 'page-service';
        } elseif ($post->post_type == 'portfolio') {
            $classes[] = $post->post_type . '-' . $post->post_name;
            $classes[] = 'page-project';
        }
        array_push($classes, "no-touch");
        return $classes;
    }
}

add_action('wp_ajax_load_projects', 'load_projects');
add_action('wp_ajax_nopriv_load_projects', 'load_projects');
function load_projects()
{
    if (isset($_POST['category_id']) && isset($_POST['from_num']) && isset($_POST['projects_count'])) {
        $category_id = esc_sql($_POST['category_id']);
        $from_num = esc_sql($_POST['from_num']);
        $per_page = esc_sql($_POST['projects_count']);
        if ($category_id != 'all')
            $tax_query = array(
                array(
                    'taxonomy' => 'service',
                    'field' => 'id',
                    'terms' => $category_id,
                    'include_children' => false
                )
            );
        else
            $tax_query = array();
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => $per_page + 1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_status' => 'publish',
            'tax_query' => $tax_query,
            'offset' => $from_num
        );
        $portfolios = get_posts($args);
        if (!empty($portfolios)) {
            $empty_li_count = 0;
            $portfolios_count = count($portfolios);
            if ($portfolios_count > $per_page) {
                $result['projects_end'] = false;
                array_pop($portfolios);
            } else {
                $result['projects_end'] = true;
                $per_line = 3;
                if ($portfolios_count % $per_line != 0) {
                    $empty_li_count = $per_line - ($portfolios_count % $per_line);
                }
            }
            $result['project_html'] = get_portfolio_html($portfolios, $empty_li_count);
        } else
            $result = false;
    } else
        $result = false;
    echo json_encode($result);
    die();
}

function get_portfolio_html($portfolios, $empty_li_count)
{
    $html = '';
    foreach ($portfolios as $portfolio) {
        $portfolio_icon_id = get_field('icon', $portfolio);
        $image_640 = reset(wp_get_attachment_image_src($portfolio_icon_id, 'project_640'));
        $portfolio_wbp_id = get_field('image_portfolio_webp', $portfolio->ID);
        $images_webp_array = wp_get_attachment_image_src($portfolio_wbp_id, 'project_640');
        $image_640_webp = reset($images_webp_array);
        $class = 'project-list-item';
        $html .= "<li class='" . $class . "'>";
        $html .= '<a href="' . get_permalink($portfolio) . '" aria-label="' . wp_strip_all_tags(get_the_title($portfolio)) . '">';
        $html .= '<img src="'. $image_640 .'">';
        //$html .= '<svg class="blurred-img" viewBox="0 0 640 400">';
        //$html .= '<foreignObject x="0" y="0" width="100%" height="100%">';
        //$html .= '<picture>';
        //if ($portfolio_wbp_id) :
        //    $html .= '<source srcset="' . $image_640_webp . '" type="image/webp">';
        //endif;
        //$html .= '<img class="blurred-content" src="' . $image_640 . '" data-src="' . $image_640 . '" alt="" width="548"height="342">';
        //$html .= '</picture>';
       // $html .= '</foreignObject>';
        if (get_field('text_color_in_portfolio', $portfolio)) {
            $spanClass = 'project-description-background';
            $textColor = 'style="color:' . strip_tags(get_field('text_color_in_portfolio', $portfolio)) . '"';
        } else {
            $textColor = '';
            $spanClass = 'project-description-background  to-inversion';
        };
        if (get_field('color_in_portfolio', $portfolio)) {
            $html .= '<span class="' . $spanClass . '" style="background-color:' . strip_tags(get_field('color_in_portfolio', $portfolio)) . ';"></span>';
        };
        $html .= '<div class="project-item-description" ' . $textColor . '>';
        $html .= '<h2 class="project-item-headline">' . strip_tags(get_field('name', $portfolio)) . '</h2>';
        if (get_field('description_in_portfolio', $portfolio)) {
            $description = strip_tags(get_field('description_in_portfolio', $portfolio));
        } else {
            $description = strip_tags(get_field('link', $portfolio));
        }
        $html .= '<div class="project-item-desc">' . $description . '</div>';
        $html .= '</div></a></li>';
    }
        //if ($empty_li_count) {
        //    for ($i = 0; $i < $empty_li_count; $i++) {
        //       $html .= '<li class="empty-project">';
        //        $html .= '<img src="' . get_template_directory_uri() . '/images/empty.svg" alt="Empty project">';
        //        $html .= '</li>';
        //   }
        //    }
    return $html;
}

function hex2rgba($hex, $opacity = 1)
{
    $hex = str_replace("#", "", $hex);
    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgba_array = array($r, $g, $b, $opacity);
    $rgba = 'rgba(' . implode(",", $rgba_array) . ')';
    return $rgba;
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function footer_scripts()
{
    if (!is_admin()) {
        // invisible recaptcha
//        echo "<script type='text/javascript'>var renderInvisibleReCaptcha = function() {  for (var i = 0; i < document.forms.length; ++i) {
//        var form = document.forms[i];
//        var holder = form.querySelector('.inv-recaptcha-holder');
//
//        if (null === holder) continue;
//		holder.innerHTML = '';
//
//         (function(frm){
//			var cf7SubmitElm = frm.querySelector('.wpcf7-submit');
//            var holderId = grecaptcha.render(holder,{
//                'sitekey': '6Lc3ihoUAAAAAC8qumicBGe_h2_QRcSygZ0kVNgJ', 'size': 'invisible', 'badge' : 'inline',
//                'callback' : function (recaptchaToken) {
//					if((null !== cf7SubmitElm) && (typeof jQuery != 'undefined')){jQuery(frm).submit();grecaptcha.reset(holderId);return;}
//					 HTMLFormElement.prototype.submit.call(frm);
//                },
//                'expired-callback' : function(){grecaptcha.reset(holderId);}
//            });
//
//			if(null !== cf7SubmitElm && (typeof jQuery != 'undefined') ){
//				jQuery(cf7SubmitElm).off('click').on('click', function(clickEvt){
//					clickEvt.preventDefault();
//					grecaptcha.execute(holderId);
//				});
//			}
//			else
//			{
//				frm.onsubmit = function (evt){evt.preventDefault();grecaptcha.execute(holderId);};
//			}
//
//
//        })(form);
//    }
//};</script>";
// end of invisible recaptcha script

    }

}


add_action('wp_footer', 'footer_scripts', 200);

function gf_head_scripts()
{
    if (!is_admin()) {
        echo '<script>var MOCDelayObjects=[];!function(){function n(n,e,t){MOCDelayObjects.push({element:e,event:n,options:t})}"undefined"==typeof jQuery&&(window.jQuery=function(e){return{on:function(){n("on",e,arguments)},ready:function(){n("ready",e,arguments)}}})}();</script>';
    }
}

add_action('wp_head', 'gf_head_scripts', 200);
// Disable Emoji's

function disable_emojis()
{
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}

add_action('init', 'disable_emojis');

// Disable emoji in the TinyMCE WYSIWYG Editor

function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

// Disable DNS Prefetch

function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}

add_action('_admin_menu', 'remove_metaboxes');
function remove_metaboxes()
{
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('revisionsdiv', 'post', 'normal');
    remove_meta_box('authordiv', 'post', 'normal');
    remove_meta_box('sqpt-meta-tags', 'post', 'normal');
}

;

add_action('rss2_head', 'feed_norobots');
function feed_norobots()
{
    echo '<xhtml:meta xmlns:xhtml="http://www.w3.org/1999/xhtml" name="robots" content="noindex" />';
}

if (function_exists('add_image_size')) {
    add_image_size('avatar', 82, 82, true);
    add_image_size('blog_big', 1920, 9999);
    add_image_size('blog_min', 640, 360, true);
//    add_image_size('blog_small', 380, 9999, false);
    add_image_size('testimonial_235', 235, 235, true);
    add_image_size('testimonial_170', 170, 170, true);
    add_image_size('project_280', 280, 175, true);
    add_image_size('project_640', 640, 400, true);
    add_image_size('webimage_765', 765, 479, true);
    add_image_size('mobileimage_240', 240, 426, true);
    add_image_size('bpa_blog', 360, 214, true);
    add_image_size('webinars-preview-img', 458, 224, true);
}
add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');
function load_posts()
{
    if (isset($_POST['from_num'])) {
        $from_num = $_POST['from_num'];
        if (isset($_POST['count']))
            $count = $_POST['count'];
        else
            $count = 6;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $count + 1,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'category_name' => 'Blog',
            'offset' => $from_num
        );
        $posts = get_posts($args);
        $posts_end = count($posts) > $count ? false : true;
        if (!$posts_end) {
            array_pop($posts);
        }
        $template = get_post_template();
        $html =
            '';
        $images = array();
        foreach ($posts as $post) {
            setup_postdata($post);
            $author_id = get_field('author', $post->ID);
            $img = get_field('author_image', $author_id);
            $img_thumbnail = $img['sizes']['avatar'];
            $li = str_replace("{{post_link}}", get_permalink($post->ID), $template);
            $li = str_replace("{{post_img}}", get_the_post_thumbnail_url($post->ID, 'blog_min'), $li);
            $li = str_replace("{{post_title}}", get_the_title($post->ID), $li);
            $li = str_replace("{{author}}", (get_field('author_name', $author_id) . ' on ' . get_the_date('d M Y', $post->ID)), $li);
            $li = str_replace("{{author_image}}", $img_thumbnail, $li);
            $html .= $li;
            $images[] = get_the_post_thumbnail_url($post->ID, 'blog_min');
        }
        wp_reset_postdata();
        $result = array(
            'html' => $html,
            'posts_end' => $posts_end,
            'images' => $images
        );
    } else {
        $result = false;
    }
    echo json_encode($result);
    die();
}

function get_post_template()
{
    return '<li class="blog-list-item"><a class="blog-list-item__link" href="{{post_link}}"><div class="post-thumbnail"><div class="image-wrapper"><img src="{{post_img}}" alt="{{post_title}}"></div><div class="author-profile-image"><img src="{{author_image}}" alt="{{author}}"></div></div><div class="info"><h2 class="title">{{post_title}}</h2><p class="author">{{author}}</p></div></a></li>';
}

add_filter('single_template', 'create_category_template');
function create_category_template($the_template)
{
    foreach ((array)get_the_category() as $cat) {
        if (file_exists(TEMPLATEPATH . "/single-cat-{$cat->slug}.php"))
            return TEMPLATEPATH . "/single-cat-{$cat->slug}.php";
    }
    return $the_template;
}

function filter_by_blog_category($query)
{
    if ($query->is_search && (!is_admin())) {
        $query->set('post_type', 'ebooks-whitepapers');
        $query->set('category_name', 'industry');
    }
    return $query;
}

add_filter('pre_get_posts', 'filter_by_blog_category');
function highlight_text($text, $search_phrase)
{
    return str_ireplace($search_phrase, '<span style="background-color: #ffe84f;">' . $search_phrase . '</span>', $text);
}

function cut_search_text($text, $search_phrase, $text_limit = 200, $between_min_length = 20)
{
    $text_length = strlen($text);
    if ($text_length <= $text_limit)
        return $text;
    $position = strpos(strtolower($text), strtolower($search_phrase));
    if ($position === false) {
        return cut_by_space($text, $text_limit) . '...';
    }
    $search_length = strlen($search_phrase);
    $found_phrase = substr($text, $position, $search_length);
    $between_symbol_limit = round(($text_limit - $search_length) / 2);
    $between_symbol_limit = $between_min_length < $between_min_length ? $between_min_length : $between_symbol_limit;
    $after_limit = $before_limit = $between_symbol_limit;
    if ($position < $between_symbol_limit) { //if short text before
        $after_limit = $between_symbol_limit + ($between_symbol_limit - $position);
        $before_limit = $position;
    } else if (($position + $search_length + $between_symbol_limit) > $text_length) { //if short text after
        $before_limit = $between_symbol_limit + ($between_symbol_limit - ($text_length - $position - $search_length));
        $after_limit = $text_length - $position - $search_length;
    }
    $after_text = $found_phrase;
    if ($after_limit > 0) {
        $after_text = substr($text, $position);
        $after_text = cut_by_space($after_text, $after_limit + $search_length);
        if (strlen(substr($text, $position)) > strlen($after_text))
            $after_text .= '...';
    }
    $before_text = '';
    if ($before_limit > 0) {
        $before_text = substr($text, 0, $position);
        $before_text = cut_by_space($before_text, $before_limit, true);
        if (strlen(substr($text, 0, $position)) > strlen($before_text))
            $before_text = '...' . $before_text;
    }
    return $before_text . $after_text;
}

function cut_by_space($string, $text_limit, $reverse = false)
{
    $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
    $parts = $reverse ? array_reverse($parts) : $parts;
    $parts_count = count($parts);
    $length = 0;
    $last_part = $parts_count == 1 ? 1 : 0;//if last word
    for (; $last_part < $parts_count; ++$last_part) {
        $length += strlen($parts[$last_part]);
        if ($length > $text_limit) {
            break;
        }
    }
    $cut_array = array_slice($parts, 0, $last_part);
    if ($reverse)
        $cut_array = array_reverse($cut_array);
    return implode($cut_array);
}

function get_list_by_line_break($string, $list_class = '')
{
    $string = preg_replace('/([\r\n]+)$/', '', $string);
    $string = preg_replace('/([\r\n]+)/', '|||', $string);
    $list_items = array_map('trim', explode('|||', preg_replace('/([\r\n]+)/', '|||', $string)));
    $list_html = '';
    if (!empty($list_items)) {
        $list_html = '<ul class="' . $list_class . '">';
        foreach ($list_items as $list_item) {
            $list_html .= "<li>{$list_item}</li>";
        }
        $list_html .= '</ul>';
    }
    return $list_html;
}

function remove_extra_line_breaks($string)
{
    $string = preg_replace("/(<br\s?\/?>\r\n)(<br\s?\/?>\r\n){1,}/", '$1', $string);
    $string = preg_replace("/<br\s?\/?>\r\n$/", '', $string);
    $string = strip_tags($string);
    return $string;
}

add_filter('get_the_excerpt', 'featured_image_in_feed');
function featured_image_in_feed($content)
{
    global $post;
    if (is_feed() && $post->post_type == 'portfolio') {
        $portfolio_icon_id = get_field('icon', $post->ID);
        $image_url = reset(wp_get_attachment_image_src($portfolio_icon_id, ''));
        if ($image_url) {
            $img = "<p><img src='" . add_query_arg(['timestamp' => time()], $image_url) . "' alt='" . $post->post_title . "' width='1280' height='800'/></p>";
            $content = $img . $content;
        }
    }
    return $content;
}

remove_all_actions('do_feed_rss2');
add_action('do_feed_rss2', 'acme_product_feed_rss2', 10, 1);

function acme_product_feed_rss2($for_comments)
{
    $rss_template = get_template_directory() . '/feed/feed-rss2.php';
    if (file_exists($rss_template))
        load_template($rss_template);
    else
        do_feed_rss2($for_comments);
}

// Disable Contact Form 7 CSS

add_filter('wpcf7_load_css', '__return_false');
/*------------------------------------------------------------------------------------------------------------------------------*/
/*----------------------------------------------------------AUTHOR IMAGE--------------------------------------------------------*/
/*------------------------------------------------------------------------------------------------------------------------------*/
add_filter('amp_post_template_file', 'moc_amp_set_custom_template', 10, 3);
function moc_amp_set_custom_template($file, $type, $post)
{
    if ('single' === $type) {
        $file = dirname(__FILE__) . '/amp/moc-amp-template.php';
    }
    return $file;
}

add_filter('afbia_kicker', 'moc_kicker_filter', 10, 2);
add_filter('afbia_author', 'moc_fbia_custom_author', 10, 2);
add_filter('afbia_author_role', 'moc_fbia_custom_author_role', 10, 2);
function moc_kicker_filter($kicker, $post_id)
{
    $kicker = "";
    return $kicker;
}

function moc_fbia_custom_author($author, $post_id)
{
    if (get_field('author', $post_id)) {
        $author_id = get_field('author', $post_id);
        $author = get_field('author_name', $author_id);
    } else {
        $author = the_author($post_id);
    }
    return $author;
}

function moc_fbia_custom_author_role($author_role, $post_id)
{
    if (get_field('author', $post_id)) {
        $author_id = get_field('author', $post_id);
        $author_role = get_field('author_position', $author_id);
    } else {
        $author_role = '';
    }
    return $author_role;
}

add_filter('afbia_content', 'moc_fbia_content_customization', 10, 2);
function moc_fbia_content_customization($content)
{
    // remove empty figcaption tags to avoid fbia warnings
    $pattern = "/<figcaption[^>]*><\\/figcaption[^>]*>/";
    $tmp_content = preg_replace($pattern, '', $content);
    // replaced <br>s in <code> tags with <pre> tags to avoid FBIA errors with "too many <br>"
    if (preg_match_all('%<code[^>]*>(.*?<.*?)</code>%s', $tmp_content, $code_sections)) {
        $modified_code_sections = preg_replace('/<br[^>]*>/', "</pre><pre>", $code_sections[1]);
        array_walk($modified_code_sections, function (&$new_content) {
            $new_content = "<pre>$new_content</pre>";
        });
        $content = str_replace($code_sections[0], $modified_code_sections, $tmp_content);
    }
    return $content;
}

add_filter('wp_insert_post_data', 'remove_empty_figcaption_tags', '99', 1);
function remove_empty_figcaption_tags($data)
{
    // remove empty figcaption tags to avoid fbia warnings
    $pattern = "/<figcaption[^>]*><\\/figcaption[^>]*>/";
    return preg_replace($pattern, '', $data);
}

//add_filter( 'the_content' , 'add_lazy_loading_attributes' , '10', 1 );
//
//function add_lazy_loading_attributes( $data )
//{
//  // remove empty figcaption tags to avoid fbia warnings
//  $pattern = "/<img (.*?) src=/";
//  $replacement = "<img \\1 data-src=";
//
//  return preg_replace($pattern, $replacement, $data);
//}
add_filter('wp_lazy_loading_enabled', '__return_false');
/*------------------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------SEARCH-----------------------------------------------------------*/
/*------------------------------------------------------------------------------------------------------------------------------*/
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search');
add_action('wp_ajax_ajax_search', 'ajax_search');
function ajax_search()
{
// creating a search query
    $search_query = trim($_POST['term']);
    $post_type = $_POST['postType'];

    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        's' => $search_query,
        'sentence' => 1,
        'posts_per_page' => -1
    );
    $query = new WP_Query($args);
    searches_table_install();
    add_frequently_searched_phrase($search_query);
    $counter = 0;
    ?>

    <?php
    // display results
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $title = strip_tags(get_the_title());
            $content = strip_tags(get_the_content()); ?>


            <?php
            if (stripos($content, $search_query) !== false || stripos($title, $search_query) !== false) {
                $counter++;
                $content = trim(preg_replace("/([\s\n\r]+)/", ' ', $content));
                $content_limit = 300;
                $content = cut_search_text($content, $search_query, $content_limit);
                $image_size = 'blog_min';
                ?>
                <article class="search-result-article">
                    <div class="search-image-wrapper"
                         style="background-image: url('<?php the_post_thumbnail_url($image_size); ?>'), linear-gradient(to right,#f0f0f0,#f5f5f5);"></div>

                    <div class="search-result-info">
                        <h3 class="search-result-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                $title = get_the_title();
                                $title = preg_replace('/(' . $search_query . ')/iu', '<span class="highlighter">$1</span>', $title);
                                echo $title;
                                ?>
                            </a>
                        </h3>

                        <p class="search-result-text">
                            <?php
                            $content = preg_replace('/(' . $search_query . ')/iu', '<span class="highlighter">$1</span>', $content);
                            echo $content; ?>
                        </p>
                    </div>

                    <div class="search-result-footer">
                        <div class="search-result-meta">
                            <span class="date">
                                <?php if ( get_the_modified_time() != get_the_time() && get_the_modified_time("Y") > 2021): ?>
                                    Updated <?php the_modified_time('F d, Y'); ?>
                                <?php else: ?>
                                    <?php echo get_the_time('F d, Y'); ?>
                                <?php endif; ?>
                            </span>
                            <span class="author-name"><?php the_author(); ?></span>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="search-result-read-more">
                            <span class="search-result-read-more-text">Read the article</span>

                            <svg id='read-more-icon' class='read-more-icon'>
                                <use xlink:href='#read-more-arrow'></use>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php
            }
        } ?>

        <p class="search-result-count hidden"><?php printf(__('%s results found', 'moc'), $counter); ?></p>

        <?php
    } else { ?>
        <?php if ($post_type == 'post') { ?>

            <article class="search-result not-found">
                <h2 class="not-found-title">Sorry, nothing has been found :(</h2>
                <h3 class="not-found-subtitle">Try our most popular searches:</h3>

                <div class="not-found-searches-wrapper">
                    <ul class="not-found-searches-list">
                        <li class="searches-item js-searches-item">Chatbot examples</li>
                        <li class="searches-item js-searches-item">Conversational AI</li>
                    </ul>
                    <ul class="not-found-searches-list">
                        <li class="searches-item js-searches-item">Conversational design</li>
                        <li class="searches-item js-searches-item">Money bot</li>
                    </ul>
                </div>

                <div class="not-found-image-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/search-no-found.svg"
                         alt="No results found"/>
                </div>
            </article>
            <?php
        } ?>

        <?php if ($post_type == 'ebooks-whitepapers') { ?>

            <article class="search-result not-found">
                <h2 class="not-found-title">Sorry, nothing has been found :(</h2>
                <h3 class="not-found-subtitle">Try our most popular searches:</h3>
                <ul class="not-found-searches-list">
                    <li class="searches-item js-searches-item">Conversational AI</li>
                    <li class="searches-item js-searches-item">Conversation Design</li>
                    <li class="searches-item js-searches-item">Customer Experience</li>
                    <li class="searches-item js-searches-item">Chatbot</li>
                </ul>
                <div class="not-found-image-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/search-no-found.svg"
                         alt="No results found"/>
                </div>
            </article>
            <?php
        } ?>


        <?php
    }
    ?>

    <?php
    exit;
}

/*---------------------------------------------*/
/*----------Create table for search word-------*/
/*---------------------------------------------*/
function searches_table_install()
{
    global $wpdb;
    $most_popular_word = $wpdb->prefix . "search_phrases";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $most_popular_word (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		search_query varchar(55) DEFAULT '' NOT NULL,
		count_searches mediumint(9) NOT NULL DEFAULT 1,
		PRIMARY KEY  (id)
	) $charset_collate;";
    $wpdb->query($sql);
}

// work with search phrases
/**
 * @param $search_query
 */
function add_frequently_searched_phrase($search_query)
{
    global $wpdb;
    $most_popular_word = $wpdb->prefix . "search_phrases";
    $search_query = esc_sql(trim(strtolower($search_query)));
    $count = $wpdb->get_var("SELECT count_searches FROM $most_popular_word WHERE search_query = '$search_query'");
    if (is_null($count)) {
        $wpdb->insert(
            $most_popular_word,
            array(
                'search_query' => $search_query
            )
        );
    } else {
        $wpdb->update(
            $most_popular_word,
            array(
                'count_searches' => $count + 1,
            ),
            array(
                'search_query' => $search_query,
            )
        );
    }
}

// get most popular search word
function get_frequently_searched_phrases()
{
    global $wpdb;
    $most_popular_word = $wpdb->prefix . "search_phrases";
    return $wpdb->get_results("SELECT * FROM $most_popular_word ORDER BY count_searches DESC  LIMIT 5");
}

// avoid console error with wp_embed script and recaptcha
function wp_embed_dereg_script()
{
    wp_dequeue_script('wp-embed');
}

add_action('wp_footer', 'wp_embed_dereg_script');


add_filter('wpcf7_validate_text*', 'custom_text_validation_filter', 10, 2);

function custom_text_validation_filter($result, $tag)
{
    if ('your-name' == $tag->name) {
        // matches any utf words with the first not starting with a number
        //$re = '/^[a-zA-Z\'"\s]+$/i';
        $re = '~[а-яё]+~iu';

        if (preg_match($re, $_POST['your-name'], $matches)) {
            $result->invalidate($tag, "This is not a valid name.");
        }
    } else if ('company' == $tag->name) {
        // matches any utf words with the first not starting with a number
        //$re = '/^[a-zA-Z0-9\s,.\'"*#@:;$()-]+$/i';
        $re = '~[а-яё]+~iu';

        if (preg_match($re, $_POST['company'], $matches)) {
            $result->invalidate($tag, "You can only use letters of the English alphabet.");
        }

    } else if ('address' == $tag->name) {
        // matches any utf words with the first not starting with a number
        //$re = '/^[a-zA-Z0-9\s,.\'"*#@:;$()-]+$/i';
        $re = '~[а-яё]+~iu';

        if (preg_match($re, $_POST['address'], $matches)) {
            $result->invalidate($tag, "You can only use letters of the English alphabet.");
        }
    }

    return $result;
}

add_filter('wpcf7_validate_textarea*', 'cf7cv_custom_form_validation', 10, 2);
function cf7cv_custom_form_validation($result, $tag)
{
    //$type = $tag['type'];
    //$name = $tag['name'];

    if ('description' == $tag->name) {
        //$re = "/^[0-9a-zA-Z\\'-><:;.,(){}[\]\-_+=?!@#$%\^&*|\s]+$/";
        $re = '~[а-яё]+~iu';
        if (preg_match($re, $_POST['description'])) {
            $result->invalidate($tag, "This is not a valid message. You can only use letters of the English alphabet.");
        }
    }

    return $result;
}

function trim_characters($count, $after = '')
{
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = mb_substr($excerpt, 0, $count);
    $excerpt = $excerpt . $after;
    return $excerpt;
}

//Add a filter to remove the structure [...] - for News on Home page
add_filter('excerpt_more', function ($more) {
    return ' ...';
});

add_filter('excerpt_length', 'events_excerpt_length');
function events_excerpt_length($evlength)
{
    return 20;
}

//Register an option for inclusion Maintenance mode
class custom_general_settings {
    function my_custom_general_settings() {
        add_filter( 'admin_init' , array( &$this , 'custom_register_fields' ) );
    }
    function custom_register_fields() {
        register_setting( 'general', 'custom_under_maintenance', 'esc_attr' );
        add_settings_field('mk_custom_under_maintenance', '<legend class="custom_under_maintenance"><span>'.__('Maintenance mode' , 'custom_under_maintenance' ).'</legend>' , array(&$this, 'clinto_fields_html') , 'general' );
    }
    function clinto_fields_html() {
        $value = get_option( 'custom_under_maintenance');
        $checked = ($value=='yes') ? 'checked="checked"' : '';
        echo '<label for="custom_under_maintenance"><input type="hidden" name="custom_under_maintenance" value="no" /><input id="custom_under_maintenance" type="checkbox" '.$checked.' name="custom_under_maintenance" value="yes" />Close the site</label>';
    }
}
$custom_general_settings = new custom_general_settings();

//closing the site for maintenance start
$value = get_option('custom_under_maintenance');//обработка нашей опции
if ($value == 'yes' && !current_user_can('manage_options')):
    add_action('wp_loaded', function () {
        global $pagenow;
        if ($pagenow !== 'wp-login.php'
            && !is_user_logged_in()
        ) {
            header('HTTP/1.1 Service Unavailable', true, 503);
            header('Content-Type: text/html; charset=utf-8');
            if (file_exists(WP_CONTENT_DIR . '/maintenance.php')) {
                require_once(WP_CONTENT_DIR . '/maintenance.php');
            }
            die();
        }
    });
endif;


function careers_redirects_from_404()
{
    $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, "careers-seattle")) {
        echo 'careers-seattle';
        wp_redirect(home_url() . "/careers-seattle", 301);
    } else if (strpos($url, "careers-winnipeg")) {
        echo 'careers-winnipeg';
        wp_redirect(home_url() . "/careers-winnipeg", 301);
    } else if (strpos($url, "careers-kyiv")) {
        echo 'careers-kyiv';
        wp_redirect(home_url() . "/careers-kyiv", 301);
    } else if (strpos($url, "careers-cherkasy")) {
        echo 'careers-cherkasy';
        wp_redirect(home_url() . "/careers-cherkasy", 301);
    }
}


add_filter('rest_endpoints', function ($endpoints) {
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});


function add_knowledge_base_benefits()
{
    $benefits = '<div class="content-benefits">';

    $rows = get_field('kb_pos_benefits');
    if ($rows) {
        foreach ($rows as $row) {
            $image = $row['item_icon'];
            $title = $row['item_title'];
            $description = $row['item_description'];

            $benefits .= '<div class="benefits-item">';
            $benefits .= '<div class="benefits-image-wrap">';
            $benefits .= '<img src="' . $image . '" alt="">';
            $benefits .= '</div>';
            $benefits .= '<div class="benefits-text-wrap">';
            $benefits .= '<h3 class="benefits-title">';
            $benefits .= $title;

            $benefits .= '</h3>';
            $benefits .= '<div class="benefits-content">';
            $benefits .= $description;
            $benefits .= '</div></div></div>';
        }
    }
    $benefits .= '</div>';

// Output needs to be return
    return $benefits;
}
add_shortcode("knowledge-base-benefits", "add_knowledge_base_benefits");


/*@ Rewriting slug of CPT */
if (!function_exists('sc_change_custom_post_type_slug')):

    add_filter('register_post_type_args', 'sc_change_custom_post_type_slug', 10, 2);

    function sc_change_custom_post_type_slug($args, $post_type)
    {

        if ('ebooks-whitepapers' === $post_type) {
            $args['rewrite']['slug'] = 'ebooks-and-whitepapers';
        }

        return $args;
    }

endif;


//validate businnes email for contact form 7 on ebooks and whitepapers page
function is_business_email($email)
{
    if (preg_match('/@hotmail.com/i', $email) ||
        preg_match('/@gmail.com/i', $email) ||
        preg_match('/@yahoo.co/i', $email) ||
        preg_match('/@yahoo.com/i', $email) ||
        preg_match('/@mailinator.com/i', $email) ||
        preg_match('/@gmail.co.in/i', $email) ||
        preg_match('/@aol.com/i', $email) ||
        preg_match('/@yandex.com/i', $email) ||
        preg_match('/@msn.com/i', $email) ||
        preg_match('/@gawab.com/i', $email) ||
        preg_match('/@inbox.com/i', $email) ||
        preg_match('/@gmx.com/i', $email) ||
        preg_match('/@rediffmail.com/i', $email) ||
        preg_match('/@in.com/i', $email) ||
        preg_match('/@live.com/i', $email) ||
        preg_match('/@hotmail.co.uk/i', $email) ||
        preg_match('/@hotmail.fr/i', $email) ||
        preg_match('/@yahoo.fr/i', $email) ||
        preg_match('/@wanadoo.fr/i', $email) ||
        preg_match('/@wanadoo.fr/i', $email) ||
        preg_match('/@comcast.net/i', $email) ||
        preg_match('/@yahoo.co.uk/i', $email) ||
        preg_match('/@yahoo.com.br/i', $email) ||
        preg_match('/@yahoo.co.in/i', $email) ||
        preg_match('/@rediffmail.com/i', $email) ||
        preg_match('/@free.fr/i', $email) ||
        preg_match('/@gmx.de/i', $email) ||
        preg_match('/@gmx.de/i', $email) ||
        preg_match('/@yandex.ru/i', $email) ||
        preg_match('/@ymail.com/i', $email) ||
        preg_match('/@libero.it/i', $email) ||
        preg_match('/@outlook.com/i', $email) ||
        preg_match('/@uol.com.br/i', $email) ||
        preg_match('/@bol.com.br/i', $email) ||
        preg_match('/@mail.ru/i', $email) ||
        preg_match('/@cox.net/i', $email) ||
        preg_match('/@hotmail.it/i', $email) ||
        preg_match('/@sbcglobal.net/i', $email) ||
        preg_match('/@sfr.fr/i', $email) ||
        preg_match('/@live.fr/i', $email) ||
        preg_match('/@verizon.net/i', $email) ||
        preg_match('/@live.co.uk/i', $email) ||
        preg_match('/@googlemail.com/i', $email) ||
        preg_match('/@yahoo.es/i', $email) ||
        preg_match('/@ig.com.br/i', $email) ||
        preg_match('/@live.nl/i', $email) ||
        preg_match('/@bigpond.com/i', $email) ||
        preg_match('/@terra.com.br/i', $email) ||
        preg_match('/@yahoo.it/i', $email) ||
        preg_match('/@neuf.fr/i', $email) ||
        preg_match('/@yahoo.de/i', $email) ||
        preg_match('/@live.com/i', $email) ||
        preg_match('/@yahoo.de/i', $email) ||
        preg_match('/@rocketmail.com/i', $email) ||
        preg_match('/@att.net/i', $email) ||
        preg_match('/@laposte.net/i', $email) ||
        preg_match('/@facebook.com/i', $email) ||
        preg_match('/@bellsouth.net/i', $email) ||
        preg_match('/@yahoo.in/i', $email) ||
        preg_match('/@hotmail.es/i', $email) ||
        preg_match('/@charter.net/i', $email) ||
        preg_match('/@yahoo.ca/i', $email) ||
        preg_match('/@yahoo.com.au/i', $email) ||
        preg_match('/@rambler.ru/i', $email) ||
        preg_match('/@hotmail.de/i', $email) ||
        preg_match('/@tiscali.it/i', $email) ||
        preg_match('/@shaw.ca/i', $email) ||
        preg_match('/@yahoo.co.jp/i', $email) ||
        preg_match('/@sky.com/i', $email) ||
        preg_match('/@earthlink.net/i', $email) ||
        preg_match('/@optonline.net/i', $email) ||
        preg_match('/@freenet.de/i', $email) ||
        preg_match('/@t-online.de/i', $email) ||
        preg_match('/@aliceadsl.fr/i', $email) ||
        preg_match('/@virgilio.it/i', $email) ||
        preg_match('/@home.nl/i', $email) ||
        preg_match('/@qq.com/i', $email) ||
        preg_match('/@telenet.be/i', $email) ||
        preg_match('/@me.com/i', $email) ||
        preg_match('/@yahoo.com.ar/i', $email) ||
        preg_match('/@tiscali.co.uk/i', $email) ||
        preg_match('/@yahoo.com.mx/i', $email) ||
        preg_match('/@gmx.net/i', $email) ||
        preg_match('/@mail.com/i', $email) ||
        preg_match('/@planet.nl/i', $email) ||
        preg_match('/@tin.it/i', $email) ||
        preg_match('/@live.it/i', $email) ||
        preg_match('/@ntlworld.com/i', $email) ||
        preg_match('/@arcor.de/i', $email) ||
        preg_match('/@yahoo.co.id/i', $email) ||
        preg_match('/@frontiernet.net/i', $email) ||
        preg_match('/@hetnet.nl/i', $email) ||
        preg_match('/@live.com.au/i', $email) ||
        preg_match('/@yahoo.com.sg/i', $email) ||
        preg_match('/@zonnet.nl/i', $email) ||
        preg_match('/@club-internet.fr/i', $email) ||
        preg_match('/@juno.com/i', $email) ||
        preg_match('/@optusnet.com.au/i', $email) ||
        preg_match('/@blueyonder.co.uk/i', $email) ||
        preg_match('/@bluewin.ch/i', $email) ||
        preg_match('/@skynet.be/i', $email) ||
        preg_match('/@sympatico.ca/i', $email) ||
        preg_match('/@windstream.net/i', $email) ||
        preg_match('/@mac.com/i', $email) ||
        preg_match('/@centurytel.net/i', $email) ||
        preg_match('/@chello.nl/i', $email) ||
        preg_match('/@live.ca/i', $email) ||
        preg_match('/@aim.com/i', $email) ||
        preg_match('/@bigpond.net.au/i', $email)) {
        return false; // Itâ€™s a publicly available email address
    } else {
        return true; // Itâ€™s probably a company email address
    }
}

function custom_email_validation_filter($result, $tag)
{
    $tag = new WPCF7_Shortcode($tag);

    if ('business-email' == $tag->name) {
        $the_value = isset($_POST['business-email']) ? trim($_POST['business-email']) : "";
        if (!is_business_email($the_value)) {
            $result->invalidate($tag, "Please enter a valid business email");
        }
    }
    if ('business-email-2' == $tag->name) {
        $the_value = isset($_POST['business-email']) ? trim($_POST['business-email']) : "";
        if (!is_business_email($the_value)) {
            $result->invalidate($tag, "Please enter a valid business email");
        }
    }
    return $result;

}

add_filter('wpcf7_validate_email', 'custom_email_validation_filter', 10, 2);
add_filter('wpcf7_validate_email*', 'custom_email_validation_filter', 10, 2);

