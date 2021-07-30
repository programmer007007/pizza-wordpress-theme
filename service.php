<section class="ftco-section ftco-services" id="services_holder">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section  text-center">
                <h2 class="mb-4"><?php echo get_theme_options("opt_service_topic_heading"); ?></h2>
                <p><?php echo get_theme_options("opt_service_topic_sub_heading"); ?>.</p>
            </div>
        </div>
        <div class="row">
            <?php foreach (range(1, 3) as $item) { ?>
                <div class="col-md-4 ">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="<?php echo get_theme_options("opt_service_icon_" . $item) ?>"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading"><?php echo get_theme_options("opt_service_h1_" . $item) ?></h3>
                            <p><?php echo get_theme_options("opt_service_s1_" . $item) ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
