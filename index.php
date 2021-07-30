<?php
//kela
use Stringy\Stringy as S;

get_header();
?>
<?php if (get_theme_options("opt_slider_status") == 1) { ?>
    <?php include 'slider.php'; ?>
<?php } ?>
<?php echo __("Hello prince",DOMAIN);?>
<section class="ftco-about d-md-flex">
    <div class="one-half img"
         style="background-image: url(<?php echo wp_get_attachment_url(get_theme_options("opt_welcome_img_id")); ?>);"></div>
    <div class="one-half ">
        <div class="heading-section  ">
            <h2 class="mb-4"><?php echo html_text_wrapper(get_theme_options("opt_welcome_heading"),
                    "pizza", '<span class="flaticon-pizza">', "</span>"); ?></h2>
        </div>
        <div>
            <p><?php echo get_theme_options("opt_welcome_desc"); ?></p>
        </div>
    </div>
</section>

<?php if (get_theme_options("opt_service_status") == 1) { ?>
    <?php include "service.php"; ?>
<?php } ?>
<?php if (get_theme_options("opt_popular_sect_status") == 1 or get_theme_options("opt_menu_list_status") == 1) { ?>
    <section class="ftco-section">
        <?php if (get_theme_options("opt_popular_sect_status") == 1) { ?>
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section  text-center">
                        <h2 class="mb-4"><?php echo S::create(get_theme_options("opt_popular_heading"))->toUpperCase(); ?></h2>
                        <p><?php echo get_theme_options("opt_menu_desc"); ?></p>
                    </div>
                </div>
            </div>
            <div class="container-wrap">
                <div class="row no-gutters d-flex">
                    <?php
                    $args = array('post_type' => 'product', 'posts_per_page' => '6');
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                        <div class="col-lg-4 d-flex ">
                            <div class="services-wrap d-flex">
                                <?php $product = wc_get_product($loop->post->ID); ?>
                                <a href="<?php echo get_permalink($loop->post->ID) ?>" class="img"
                                   style="background-image: url(<?php echo wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>);"></a>
                                <div class="text p-4">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php the_excerpt(); ?></p>
                                    <p class="price"><span><?php echo $product->get_price_html(); ?></span>
                                        <a href="#" class="ml-2 btn btn-white btn-outline-white add_to_cart_btn"
                                           data-product-id="<?php echo $loop->post->ID; ?>"
                                           data-product-qnty="1">Order</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_query(); // Remember to reset ?>
                </div>
            </div>
        <?php } ?>

        <?php if (get_theme_options("opt_menu_list_status") == 1) { ?>
            <div class="container" id="menu_list">
                <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                    <div class="col-md-7 heading-section text-center ">
                        <h2 class="mb-4"><?php echo S::create(get_theme_options("opt_menu_heading"))->toUpperCase(); ?></h2>
                        <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span>
                        </p>
                        <p class="mt-5"><?php echo get_theme_options("opt_menu_desc"); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $args = array('post_type' => 'product');
                        $loop = new WP_Query($args);
                        $count = 0;
                        $has_product = $loop->post_count;
                        $half = 0;
                        if ($has_product > 0) {
                            if ($has_product % 2 == 0) {
                                $half = $has_product / 2;
                            } else {
                                $half = ($has_product + 1) / 2;
                            }
                        }
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php $product = wc_get_product($loop->post->ID); ?>
                            <?php if ($count > 0 && $count == $half) {
                                echo "</div><div class='col-md-6'>";
                            } ?>
                            <div class="pricing-entry d-flex ">
                                <div class="img"
                                     style="background-image: url(<?php echo wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>);"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span><?php the_title(); ?></span></h3>
                                        <span class="price"><?php echo get_woocommerce_currency_symbol() . $product->get_price(); ?></span>
                                    </div>
                                    <div class="d-block">
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php $count++;
                        endwhile;
                        wp_reset_query(); // Remember to reset ?>
                        <?php if ($has_product > 0) {
                            echo "</div>";
                        } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
<?php } ?>
<?php if (get_theme_options("opt_shop_img_status") == "1") { ?>
    <section class="ftco-gallery">
        <div class="container-wrap">
            <div class="row no-gutters">
                <?php foreach (range(1, 4) as $item) { ?>
                    <div class="col-md-3 ">
                        <a href="#" class="gallery img d-flex align-items-center"
                           style="background-image: url(<?php echo wp_get_attachment_url(get_theme_options("opt_shop_img_id_" . $item)); ?>);">
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
<?php } ?>

<section class="ftco-counter ftco-bg-dark img" id="section-counter"
         style="background-image: url(<?php echo get_template_directory_uri() . '/'; ?>images/bg_2.jpg);"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <?php foreach (range(1, 4) as $item) { ?>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span
                                                class="<?php echo get_theme_options("opt_stat_" . $item . "_icon"); ?>"></span>
                                    </div>
                                    <strong class="number"
                                            data-number="<?php echo get_theme_options("opt_stat_" . $item . "_count"); ?>">0</strong>
                                    <span><?php echo get_theme_options("opt_stat_" . $item . "_name"); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (get_theme_options("opt_blog_home_status")) { ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section  text-center">
                    <h2 class="mb-4"><?php echo get_theme_options("opt_blog_heading", "Recent from the blog"); ?></h2>
                    <p><?php echo get_theme_options("opt_blog_desc"); ?></p>
                </div>
            </div>
            <div class="row d-flex">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'orderby' => 'rand',
                    'order' => 'DESC'
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) {
                        $loop->the_post();
                        ?>
                        <div class="col-md-4 d-flex ">
                            <div class="blog-entry align-self-stretch">
                                <a href="<?php the_permalink(); ?>" class="block-20"
                                   style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                                </a>
                                <div class="text py-4 d-block">
                                    <div class="meta">
                                        <div><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></div>
                                        <div style="text-transform: capitalize;"><a href="#"><?php the_author(); ?></a>
                                        </div>
                                        <div><a href="<?php the_permalink(); ?>" class="meta-chat"><span
                                                        class="icon-chat"></span> <?php echo get_comments_number($loop->post->ID); ?>
                                            </a></div>
                                    </div>
                                    <h3 class="heading mt-2"><a
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                } ?>

            </div>
        </div>
    </section>
<?php } ?>

<section class="ftco-appointment">
    <div class="overlay"></div>
    <div class="container-wrap">
        <div class="row no-gutters d-md-flex align-items-center">
            <div class="col-md-6 d-flex align-self-stretch">
                <div id="map">
                    <iframe src="<?php echo get_theme_options("opt_org_loc_no"); ?>"
                            style="width: 100%;height: 100%;border:0;"
                            allowfullscreen="" loading="lazy"></iframe>

                </div>
            </div>
            <div class="col-md-6 appointment" id="contact_form">
                <h3 class="mb-3">Contact Us</h3>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                      class="appointment-form">
                    <?php if (isset($_GET["form"]) && $_GET["form"] == "contact_form") { ?>
                        <?php if (isset($_GET["status"]) && $_GET["status"] == "success") { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo base64_decode($_GET["message"]); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-warning" role="alert">
                                <?php echo base64_decode($_GET["message"]); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <input type="hidden" name="action" value="contact_form"/>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="d-me-flex">
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="d-me-flex">
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                    </div>
                    <div class="d-me-flex">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="6" class="form-control"
                                  placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-primary py-3 px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>

