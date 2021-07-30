<?php
/**
 * Enqueue scripts and styles.
 */
if (!function_exists('register_scripts')) {
    function register_scripts()
    {
        global $paged, $post, $current_user;
        $support_rtl = $sort_by = "";
        wp_get_current_user();
        $userID = $current_user->ID;
        $protocol = is_ssl() ? 'https' : 'http';
        $user_logged_in = 'yes';
        if (!is_user_logged_in()) {
            $user_logged_in = 'no';
        }
        if (is_rtl()) {
            $support_rtl = "yes";
        } else {
            $support_rtl = "no";
        }

        if (isset($_GET['sortby'])) {
            $sort_by = $_GET['sortby'];
        }

        $enable_reCaptcha = get_theme_options('enable_reCaptcha');
        $recaptha_site_key = get_theme_options('recaptha_site_key');
        $recaptha_secret_key = get_theme_options('recaptha_secret_key');



        /* Register Styles
        * ----------------------*/
        wp_enqueue_style('iconic.bootstrap.min', get_template_directory_uri() . '/css/open-iconic-bootstrap.min.css', array(), null, 'all');
        wp_enqueue_style('animate.min', get_template_directory_uri() . '/css/open-iconic-bootstrap.min.css', array(), null, 'all');
        wp_enqueue_style('owl.carousel.min', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), null, 'all');
        wp_enqueue_style('owl.theme.default.min', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), null, 'all');
        wp_enqueue_style('magnific-popup.min', get_template_directory_uri() . '/css/magnific-popup.css', array(), null, 'all');
        wp_enqueue_style('ionic.min', get_template_directory_uri() . '/css/ionicons.min.css', array(), null, 'all');
        wp_enqueue_style('bootstrap.datepicker', get_template_directory_uri() . '/css/bootstrap-datepicker.css', array(), null, 'all');
        wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css', array(), null, 'all');
        wp_enqueue_style('iconmoon', get_template_directory_uri() . '/css/icomoon.css', array(), null, 'all');
        wp_enqueue_style('theme.style', get_template_directory_uri() . '/css/style.css', array(), null, 'all');
        wp_enqueue_style('fontawesome.min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), null, 'all');
        wp_enqueue_style('toast.min', get_template_directory_uri() .'/css/jquery.toast.min.css', array(), null, 'all');

        wp_enqueue_style('m-custom', get_stylesheet_uri());


        /* Register Scripts
      * ----------------------*/
        wp_deregister_script('jquery');
        wp_deregister_style('dashicons');
        wp_deregister_style('admin-bar-css');
        wp_deregister_style('tabulate-timepicker-css');
        wp_deregister_style('tabulate-leaflet-css');
        wp_deregister_style('tabulate-jquery-ui-css');
        wp_deregister_style('tabulate-jquery-ui-theme-css');
        wp_deregister_style('tabulate-styles-css');

        /* Fresh */
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.3.2.1.min.js', '', '3.2.1', true);
        wp_enqueue_script('jquery.migrate.min', get_template_directory_uri() . '/js/jquery.migrate.3.0.1.min.js', array('jquery'), null, true);

        wp_enqueue_script('popper.min', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), null, true);
        wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);

        wp_enqueue_script('jquery.easing.min', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.waypoint.min', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.stellar.min', get_template_directory_uri() . '/js/jquery.stellar.min.js', array('jquery'), null, true);

        wp_enqueue_script('jquery.owl.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.magnific.min', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.aos.min', get_template_directory_uri() . '/js/aos.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.animate.number.min', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', array('jquery'), null, true);
        wp_enqueue_script('bootstrap.datepicker.min', get_template_directory_uri() . '/js/bootstrap-datepicker.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.timepicker.min', get_template_directory_uri() . '/js/jquery.timepicker.min.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.scrollax.min', get_template_directory_uri() . '/js/scrollax.min.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.toast.min', get_template_directory_uri() . '/js/jquery.toast.min.js', array('jquery'), null, true);
//        wp_enqueue_script('google.map.external', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false', array('jquery'), null, true);
//
//        wp_enqueue_script('google.maps.min', get_template_directory_uri() . '/js/google-map.js', array('jquery'), null, true);
        wp_enqueue_script('main.theme', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);

        wp_enqueue_script('vuejs.min', 'https://cdn.jsdelivr.net/npm/vue@2', array('jquery'), null, true);


        wp_localize_script(DOMAIN . '-custom', 'js_vars',
            array(
                'admin_url' => get_admin_url(),
                'transportation' => esc_html__('Transportation', DOMAIN),
            ));

        /* Overwride a frontend js file */
        wp_deregister_script('wc-add-to-cart');
        wp_register_script('wc-add-to-cart', get_template_directory_uri() . '/woocommerce/assets/js/frontend/add-to-cart.js', array('jquery'), WC_VERSION, TRUE);
        wp_enqueue_script('wc-add-to-cart');


        wp_enqueue_script(DOMAIN . '-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);
        $custom_js_code = get_option('custom_js_code');
        if (!empty($custom_js_code)) {
            wp_add_inline_script(DOMAIN . '-custom', $custom_js_code, 'after');
        }


    }
}
add_action('wp_enqueue_scripts', 'register_scripts');


/* Removing Customize Feature
* ----------------------*/
add_action( 'admin_menu', function () {
    global $submenu;
    if ( isset( $submenu[ 'themes.php' ] ) ) {
        foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
            foreach ($menu_item as $value) {
                if (strpos($value,'customize') !== false) {
                    unset( $submenu[ 'themes.php' ][ $index ] );
                }
            }
        }
    }
});


/* Register Scripts for the admin page
 * ----------------------*/
function register_scripts_admin()
{
    wp_enqueue_script('admin', get_template_directory_uri() . '/js/custom.admin.js', array("jquery"));
}

add_action('admin_enqueue_scripts', 'register_scripts_admin');

/* Registering the sidebar
* ----------------------*/
function custom_sidebar()
{
    register_sidebar(
        array('name' => __('Blog SideBar #1', DOMAIN),
            'id' => 'blog-right-sidebar',
            'description' => __('Widgets in this area will be displayed in the blog single page.', DOMAIN),
        )
    );
    register_sidebar(array('name' => __('Shop SideBar #1', DOMAIN),
        'id' => 'shop-right-sidebar',
        'description' => __('Widgets in this area will be displayed in the shop page.', DOMAIN),
    ));
}

add_action("widgets_init", "custom_sidebar");
