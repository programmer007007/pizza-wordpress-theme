<?php
/*
Template Name: Blogs List
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
                            <h1 class="mb-3 mt-5 bread">Search Result For : <?php if (isset($_GET["s"])) {
                                    echo $_GET["s"];
                                } ?></h1>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section class="ftco-section">
            <div class="container container_wrp">

                <div class="row d-flex">

                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'posts_per_page' => 6,
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'paged' => $paged,
                        's' =>$_GET['s'],
                        'order' => 'DESC'
                    );

                    $loop = new WP_Query($args);
                    if ($loop->have_posts()){
                    $GLOBALS['wp_query']->max_num_pages = $loop->max_num_pages;
                    while ($loop->have_posts()) {
                        $loop->the_post();
                        ?>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry align-self-stretch">
                                <a href="<?php the_permalink(); ?>" class="block-20"
                                   style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                                </a>
                                <div class="text py-4 d-block">
                                    <div class="meta">
                                        <div class="blog_date"><a href="#"><?php echo get_the_date(); ?></a></div>
                                        <div class="blog_author"><a href="#"><?php the_author(); ?></a></div>
                                        <div><a href="#" class="meta-chat"><span
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
                        <?php
                    };
                    ?>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <?php
                            wpbeginner_numeric_posts_nav();
                            ?>
                        </div>
                    </div>
                </div>


                <?php }
                else { ?>
                <div class="alert alert-warning w-100" role="alert">
                    <h4 class="alert-heading">Info!</h4>
                    <p>The are no post at the moment.If you are the admin of the site you can add create article from
                        the post section of the backend.</p>
                    <hr>
                    <p class="mb-0">Come back again.</p>
                </div>
            </div>
            <?php
            }
            ?>

    </div>

    <style>
        .icon-chat {
            padding-right: 6px;
        }
    </style>

<?php get_footer(); ?>