<?php
global $theme_options;
$theme_local = get_localization();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <?php if (!empty(get_theme_options("opt_ico_img_id"))) { ?>
        <link rel="icon" href="<?php echo wp_get_attachment_url(get_theme_options("opt_ico_img_id")); ?>"
              type="image/x-icon"/>
        <link rel="shortcut icon" href="<?php echo wp_get_attachment_url(get_theme_options("opt_ico_img_id")); ?>"
              type="image/x-icon"/>
    <?php } ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if (is_user_logged_in()) { ?>
    <div class="d-flex flex-row-reverse">
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="button button-primary float-btn"><i class="fas fa-home"></i></a>
    </div>
<?php } ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php
            $logoText = get_theme_options("opt_text_logo");
            if ($logoText != "") {
                $logoTextHtml = "";
                $first = false;
                foreach (explode(" ", $logoText) as $item) {
                    if (!$first) {
                        $logoTextHtml .= $item . "<small class='logo_second_word'>";
                        $first = true;
                        continue;
                    }
                    $logoTextHtml .= $item;
                }
                $logoTextHtml .= "</small>";
                echo '<span
                    class="flaticon-pizza-1 mr-1"></span>' . $logoTextHtml;
            } else {
                echo "<img src='" . wp_get_attachment_image_url(get_theme_options("opt_logo_img_id")) . "'>";
            }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <?php
        wp_nav_menu(array(
            'menu' => "top-menu",
            'menu_class' => "navbar-nav ml-auto",
            'container' => "div",
            'container_class' => "collapse navbar-collapse",
            'container_id' => "ftco-nav",
            'theme_location' => "top-menu",
            'depth' => 1,
            'fallback_cb' => false,
            'add_li_class' => 'nav-item',
            'add_a_class' => 'nav-link',
        ));
        ?>
    </div>
</nav>