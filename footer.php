<?php
$copy_rights = get_theme_options('copy_rights', "Developer PJ");
wp_footer(); ?>

<footer class="ftco-footer ftco-section img pb-0">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p><?php echo get_theme_options("opt_about_desc"); ?></p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class=""><a href="<?php echo get_theme_options("opt_twitter_lnk"); ?>"><span
                                        class="icon-twitter"></span></a></li>
                        <li class=""><a href="<?php echo get_theme_options("opt_facebook_lnk"); ?>"><span
                                        class="icon-facebook"></span></a></li>
                        <li class=""><a href="<?php echo get_theme_options("opt_insta_lnk"); ?>"><span
                                        class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    <?php

                    use Stringy\Stringy as S;

                    $args = array(
                        'posts_per_page' => 2,
                        'post_type' => 'post',
                        'orderby' => 'rand',
                        'order' => 'DESC'
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) {
                            $loop->the_post();
                            ?>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                   style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span
                                                        class="icon-calendar mr-2"></span><?php echo get_the_date(); ?>
                                            </a></div>
                                        <div style="text-transform: capitalize;"><a href="#"><span
                                                        class="icon-person"></span><?php the_author(); ?>
                                            </a></div>
                                        <div><a href="#"><span
                                                        class="icon-chat mr-2"></span><?php echo get_comments_number($loop->post->ID); ?>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>

                </div>
            </div>
            <!--            <div class="col-lg-2 col-md-6 mb-5 mb-md-5">-->
            <!--                <div class="ftco-footer-widget mb-4 ml-md-4">-->
            <!--                    <h2 class="ftco-heading-2">Services</h2>-->
            <!--                    <ul class="list-unstyled">-->
            <!--                        <li><a href="#" class="py-2 d-block">Cooked</a></li>-->
            <!--                        <li><a href="#" class="py-2 d-block">Deliver</a></li>-->
            <!--                        <li><a href="#" class="py-2 d-block">Quality Foods</a></li>-->
            <!--                        <li><a href="#" class="py-2 d-block">Mixed</a></li>-->
            <!--                    </ul>-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span
                                        class="text"><?php echo get_theme_options("opt_org_address"); ?></span>
                            </li>
                            <li><a href="tel:<?php echo get_theme_options("opt_phone_no_pain_plain"); ?>"><span class="icon icon-phone"></span><span
                                            class="text"><?php echo get_theme_options("opt_phone_no"); ?></span></a>
                            </li>
                            <li><a href="mailto:<?php echo get_theme_options("opt_site_email"); ?>"><span class="icon icon-envelope"></span><span
                                            class="text"><?php echo get_theme_options("opt_site_email"); ?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<!--<div id="ftco-loader" class="show fullscreen">-->
<!--    <svg class="circular" width="48px" height="48px">-->
<!--        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>-->
<!--        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"-->
<!--                stroke="#F96D00"/>-->
<!--    </svg>-->
<!--</div>-->
<?php if (is_home()) { ?>
    <a href="<?php echo wc_get_cart_url(); ?>" class="cust-float d-flex justify-content-between">
        <i class="fas fa-shopping-cart my-float flex-fill"></i>
        <span class="flex-fill cart_content_no"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </a>
<?php } ?>
</div>
</body>
</html>