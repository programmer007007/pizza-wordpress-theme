<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>

    <div class="container-fluid">
        <section class="home-slider owl-carousel img" style="height: 185px;
    width: 100%;">

            <div class="slider-item"
                 style="background-image: url(<?php echo get_template_directory_uri() . "/images/bg_3.jpg" ?>);height: 250px;">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" style="height: 207px;">
                        <div class="col-md-7 col-sm-12 text-center">
                            <h1 class="mb-3 mt-5 bread"><?php the_title(); ?></h1>
                            <p class="breadcrumbs"><span class="mr-2"><a
                                            href="<?php echo home_url(); ?>">Home</a></span>
                                <span><?php the_title(); ?></span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <div class="row" style="margin-top: 2%;">
            <?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action('woocommerce_before_main_content');
            ?>

            <?php while (have_posts()) : ?>
                <?php the_post(); ?>

                <?php wc_get_template_part('content', 'single-product'); ?>

            <?php endwhile; // end of the loop. ?>

            <?php
            /**
             * woocommerce_after_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action('woocommerce_after_main_content');
            ?>

            <?php
            /**
             * woocommerce_sidebar hook.
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            do_action('woocommerce_sidebar');
            ?>
        </div>
    </div>
<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
