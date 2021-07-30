<?php
/*
*/
get_header(); ?>
<div class="container-fluid">
    <section class="home-slider owl-carousel img sub-page-header"
             style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg_1.jpg);">

        <div class="slider-item"
             style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center">
                        <h2 class="mb-3 mt-5 bread">Read our Blog</h2>
                        <p class="breadcrumbs"><span class="mr-2"><a
                                        href="<?php echo home_url(); ?>">Home</a></span>
                            <span><?php the_title(); ?></span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-degree-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-12 border-1px blog-desc">
                    <h1 class="mb-3"><?php the_title(); ?></h1>
                    <p>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                    </p>
                    <?php the_content(); ?>
                </div>
                <div class="col-md-3 col-12 sidebar_product_detail mt-0">
                    <?php get_sidebar("blog"); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
<style>
    .ftco-section {
        padding: 3em 0;
    }
</style>