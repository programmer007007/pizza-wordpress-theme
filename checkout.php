<?php
/*
Template Name: Checkout
*/
get_header(); ?>

<section class="home-slider owl-carousel img" style="height: 145px;">

    <div class="slider-item"
         style="background-image: url(<?php echo get_template_directory_uri() . "/images/bg_3.jpg" ?>);height: 250px;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" style="height: 207px;">
                <div class="col-md-7 col-sm-12 text-center">
                    <h1 class="mb-3 mt-5 bread"><?php the_title(); ?></h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo home_url(); ?>">Home</a></span>
                        <span><?php the_title(); ?></span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container mt-5">
        <div class="row block-9">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
