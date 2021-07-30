<?php
/*
Template Name: Blogs List
*/
get_header(); ?>
    <div class="container-fluid">
    <section class="home-slider owl-carousel img"
             style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg_1.jpg);">

        <div class="slider-item"
             style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center">
                        <h1 class="mb-3 mt-5 bread"><?php echo __("Articles On ", DOMAIN); ?>
                            : <?php single_cat_title(); ?></h1>
                        <p class="breadcrumbs"><span class="mr-2"><a
                                        href="<?php echo home_url(); ?>">Home</a></span>
                            <span><?php single_cat_title(); ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container container_wrp">
            <div class="row d-flex">
                <div class="col-md-9 col-12">
                    <div class="row">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post(); ?>
                                <div class="col-md-6 d-flex">
                                    <div class="blog-entry align-self-stretch">
                                        <a href="<?php the_permalink(); ?>" class="block-20"
                                           style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                                        </a>
                                        <div class="text py-4 d-block">
                                            <div class="meta">
                                                <div class="blog_date"><a href="#"><?php the_time('F jS, Y'); ?></a></div>
                                                <div class="blog_author"><a href="#"><?php the_author(); ?></a></div>
                                                <div class="blog_comment_nos"><a href="#" class="meta-chat"><span
                                                                class="icon-chat"></span><?php echo get_comments_number($loop->post->ID); ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <h3 class="heading mt-2"><a
                                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; // End Loop
                        endif; ?>
                    </div>
                    <div class="row">
                        <?php if (!have_posts()) : ?>
                            <div class="alert alert-warning w-100" role="alert">
                                <h4 class="alert-heading">Info!</h4>
                                <p>The are no post at the moment.If you are the admin of the site you can add create
                                    article
                                    from
                                    the post section of the backend.</p>
                                <hr>
                                <p class="mb-0">Come back again.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <?php get_sidebar("blog"); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>