<?php
/**
 * Themes functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author Johnson
 */

require_once(get_template_directory() . "/vendor/autoload.php");

/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Declare objects from vendor folder
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */


/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Define constants
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
define('THEME_NAME', 'WpPizza');
define('THEME_SLUG', 'wppizza');
define('THEME_VERSION', '1.0.0');
define('DOMAIN', 'wp-pizza');

/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Set up theme default and register various supported features.
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
if (!function_exists('theme_setup')) {
    function theme_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        //Let WordPress manage the document title.
        add_theme_support('title-tag');

        //Add support for post thumbnails.
        add_theme_support('post-thumbnails');


//        set_post_thumbnail_size( 150, 150 );
//        add_image_size( 'houzez-single-big-size', 1170, 600, true ); // toparea-v1.php , single-property.php

        /**
         *    Register nav menus.
         */
        register_nav_menus(
            array(
                'top-menu' => esc_html__('Top Menu', DOMAIN),
                'footer-menu' => esc_html__('Footer Menu', DOMAIN)
            )
        );


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
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
        add_theme_support('post-formats', array());
        add_theme_support('woocommerce');


        //remove gallery style css
        add_filter('use_default_gallery_style', '__return_false');
        add_action('after_setup_theme', 'theme_setup');

    }
}
theme_setup();
/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Make the theme available for translation.
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
load_theme_textdomain(DOMAIN, get_template_directory_uri()
    . '/languages');

/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Remove admin bar for all users.
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
add_filter('show_admin_bar', '__return_false');


/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Enqueue scripts and styles.
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
require_once(get_template_directory() . '/inc/register-scripts.php');


/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    TMG plugin activation
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
require_once(get_template_directory() . '/framework/class-tgm-plugin-activation.php');
require_once(get_template_directory() . '/framework/register-plugins.php');


/**wo
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Functions
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
require_once(get_template_directory() . '/framework/functions/helper_functions.php');
require_once(get_template_directory() . '/framework/functions/localization.php');
require_once(get_template_directory() . '/framework/functions/ajax_handler.php');


/**
 *    ---------------------------------------------------------------------------------------
 *    Widgets
 *    ---------------------------------------------------------------------------------------
 */
//require_once ( get_template_directory() . '/inc/widgets/houzez-featured-properties.php' );


/*-----------------------------------------------------------------------------------*/
/*	Register blog sidebar, footer and custom sidebar
/*-----------------------------------------------------------------------------------*/
if (!function_exists('custom_widgets_init')) {
    add_action('widgets_init', 'custom_widgets_init');
    function custom_widgets_init()
    {
    }
}

if (!current_user_can('administrator') && !is_admin()) {
    //show_admin_bar( false );
    add_filter('show_admin_bar', '__return_false');
}
require_once(get_template_directory() . "/admin/admin-mng.php");


/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Form Handlers
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
require_once(get_template_directory() . '/admin/form_handle.php');


/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Menu Filters
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args)
{
    return array("nav-item");
}

function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Product Looped
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
if (!function_exists('product_lnk_open')) {
    /**
     * Insert the opening anchor tag for products in the loop.
     */
    function product_lnk_open()
    {
        global $product;

        $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

        echo '<a href="' . esc_url($link) . '" class="">';
    }
}
add_action('woocommerce_before_shop_loop_item', 'product_lnk_open', 10);

/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Checkout Page
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields($address_fields)
{
    $address_fields['first_name']['placeholder'] = 'First Name';
    $address_fields['last_name']['placeholder'] = 'Last Name';
    $address_fields['address_1']['placeholder'] = 'Address';
    $address_fields['state']['placeholder'] = 'State';
    $address_fields['postcode']['placeholder'] = 'Postal Code';
    $address_fields['city']['placeholder'] = 'City';
    return $address_fields;
}

add_filter('woocommerce_checkout_fields', 'override_checkout_fields', 20, 1);
function override_checkout_fields($checkout_fields)
{
    $checkout_fields['billing']['billing_address_1']['placeholder'] = 'Address';
    $checkout_fields['billing']['billing_address_2']['placeholder'] = 'Continue Address';
    $checkout_fields['billing']['billing_state']['placeholder'] = 'State';
    $checkout_fields['billing']['billing_postcode']['placeholder'] = 'Zip Code';
    $checkout_fields['billing']['billing_city']['placeholder'] = 'City';
    $checkout_fields['billing']['billing_phone']['placeholder'] = 'Mobile Number';
    $checkout_fields['billing']['billing_email']['placeholder'] = 'Email Id';
    unset($checkout_fields['billing']['billing_company']);
    return $checkout_fields;
}

add_filter('woocommerce_shipping_fields', 'override_shipping_fields', 20, 1);
function override_shipping_fields($fields)
{
    unset($fields['shipping_company']);
    $fields['shipping_address_2']['placeholder'] = 'Continue Address';
    return $fields;
}

//
//add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
//function custom_override_checkout_fields($fields)
//{
//    unset($fields['billing']['billing_company']);
//    return $fields;
//}

add_filter('woocommerce_billing_fields', 'custom_override_billing_fields');
function custom_override_billing_fields($fields)
{
    unset($fields['billing_company']);
    $fields['billing_phone']['placeholder'] = 'Mobile Number';
    $fields['billing_address_1']['placeholder'] = 'Address';
    return $fields;
}

add_filter('woocommerce_account_menu_items', 'custom_remove_downloads_my_account', 999);

function custom_remove_downloads_my_account($items)
{
    unset($items['downloads']);
    return $items;
}

/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Custom Pagination
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
function wpbeginner_numeric_posts_nav()
{


    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        //printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

        /** Link to first page, plus ellipses if necessary */
        if (!in_array(1, $links)) {
            $class = 1 == $paged ? ' class="active"' : '';

            printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

            if (!in_array(2, $links))
                echo '<li>…</li>';
        }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><span><a href="%s">%s</a></span></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><span><a href="%s">%s</a></span></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        //printf( '<li>%s</li>' . "\n", get_next_posts_link() );

        echo '</ul></div>' . "\n";

}

/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Limit the excerpt length
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */

function custom_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

/**
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 *    Changing excerpt more
 *    ----------------------------------------------------------------------------------------------------------------------------------------------------
 */
function new_excerpt_more($more)
{
    global $post;
    return '… <a href="' . get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');
