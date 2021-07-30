<section class="home-slider owl-carousel img"
         style="background-image: url(<?php echo get_template_directory_uri() . '/'; ?>images/bg_1.jpg);">
    <?php foreach (range(1, 3) as $item) { ?>
        <div class="slider-item"
            <?php if ($item == 3) { ?>
                style="background-image: url(<?php echo get_template_directory_uri() . '/'; ?>images/bg_<?php echo $item; ?>.jpg);"
            <?php } ?> >
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">

                    <div class="<?php if ($item == 1) {
                        echo "col-md-6 col-sm-12";
                    } else if ($item == 2) {
                        echo "col-md-6 col-sm-12 order-md-last";
                    } elseif ($item == 3) {
                        echo "col-md-6 col-sm-12";
                    } ?>">
                        <span class="subheading"><?php echo get_theme_options('opt_slider_heading_' . $item); ?></span>
                        <h1 class="mb-4"><?php echo get_theme_options("opt_slider_sub_heading_" . $item) ?></h1>
                        <p class="mb-4 mb-md-5"><?php echo get_theme_options("opt_slider_desc_" . $item) ?></p>
                        <p><?php if (!empty(get_theme_options("opt_slider_redirect_" . $item))) { ?>
                                <a href="<?php echo get_theme_options("opt_slider_redirect_" . $item) ?>"
                                   class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a>
                            <?php } ?>
<!--                            <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View-->
<!--                                Menu</a></p>-->
                    </div>

                    <div class="col-md-6">
                        <img src="<?php echo wp_get_attachment_url(get_theme_options("opt_slider_id_" . $item)); ?>"
                             class="img-fluid"
                             alt="">
                    </div>


                </div>
            </div>
        </div>
    <?php } ?>

</section>
<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex">
            <div class="info">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text">
                            <h3><a href="<?php echo get_theme_options("opt_phone_no_pain_plain"); ?>">
                                    <?php echo get_theme_options("opt_phone_no"); ?></a></h3>
                            <p><?php echo get_theme_options("opt_timing_desc"); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text">
                            <?php echo get_theme_options("opt_org_address"); ?>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Open <?php echo get_theme_options("opt_open_from"); ?></h3>
                            <p><?php echo get_theme_options("opt_timing_from"); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-md-flex pl-md-5 p-4 align-items-center">
                <ul class="social-icon">
                    <li class=""><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class=""><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class=""><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>