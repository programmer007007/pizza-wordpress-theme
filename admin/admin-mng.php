<?php
function my_admin_menu()
{
    add_menu_page(
        __('WP Pizza Theme Options Page', DOMAIN),
        __('Pizza Theme Setting', DOMAIN),
        'edit_theme_options',
        'wp-pizza-theme-options',
        'my_admin_page_contents',
        'dashicons-schedule',
        3
    );
}

add_action('admin_menu', 'my_admin_menu');

function my_admin_page_contents()
{
    ?>
    <div class="wrap">
        <style>

            @import url("https://fonts.googleapis.com/css?family=Roboto+Slab:100");

            h1 {
                font-size: 2em;
                line-height: 1.4em;
                text-align: center;
                padding: 0.5em;
            }

            section {
                zoom: 1;
                position: relative;
                height: auto;
            }

            section:after,
            section:before {
                content: "";
                display: table;
            }

            section:after {
                clear: both;
            }

            section h4 {
                background: rgba(0, 0, 0, 0.1);
                cursor: pointer;
                border: 1px solid rgba(0, 0, 0, 0.2);
                padding: 15px 20px;
            }

            section h4:first-child {
                border-top: 1px solid rgba(0, 0, 0, 0.2);
            }

            @media screen and (min-width: 600px) {
                section h4 {
                    position: relative;
                    width: 22.333333333333336%;
                    height: 20%;
                    display: block;
                }
            }

            section ul {
                zoom: 1;
                position: relative;
                height: auto;
                min-height: 100%;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-left: none;
                display: none;
                background: white;
            }

            section ul:after,
            section ul:before {
                content: "";
                display: table;
            }

            section ul:after {
                clear: both;
            }

            /*section ul li {*/
            /*    list-style: circle;*/
            /*}*/

            @media screen and (min-width: 600px) {
                section ul {
                    position: absolute;
                    width: 66.66666666666667%;
                    right: 0;
                    top: 0;
                    padding: 15px 30px;
                    border: 1px solid lightgray;
                }
            }

            section .active {
                cursor: default;
                border-bottom: 1px solid rgba(0, 0, 0, 0.2);
                border-right: none;
                border-top: 1px solid rgba(0, 0, 0, 0.2);
            }

            @media screen and (min-width: 600px) {
                section .active {
                    background: rgb(255 255 255);
                    border-right: 1px solid rgba(0, 0, 0, 0);
                }
            }

            section .active + ul {
                display: block;
            }


            .set_icon {
                margin-top: 7px;
                margin-left: 2px;
            }

            .basic_frm input, .basic_frm textarea {
                width: 80%;
            }

            .w-auto {
                width: auto !important;
            }

            .mb-2p {
                margin-bottom: 2%;
            }

            @media screen and (max-width: 1024px) {
            }

            @media screen and (max-width: 768px) {
            }

            @media screen and (max-width: 480px) {
                .basic_frm input, .basic_frm textarea {
                    width: 100%;
                }

                .basic_frm_holder {
                    padding: 2%;
                }
            }

            @media screen and (max-width: 378px) {
            }
        </style>
        <script>
            window.console = window.console || function (t) {
            };
        </script>
        <script>
            if (document.location.search.match(/type=embed/gi)) {
                window.parent.postMessage("resize", "*");
            }
        </script>

        <h1>Theme Setting page</h1>
        <?php if (isset($_GET["status"])) { ?>
            <?php if (in_array($_GET["status"], ["success", "info", "warning", "error"])) { ?>
                <div class="notice notice-<?php echo $_GET["status"]; ?> is-dismissible">
                    <p><?php echo __(base64_decode($_GET["message"]), DOMAIN) ?></p>
                </div>
            <?php } else {
                throw  new Exception("Wrong type of message provided.");
            } ?>
        <?php } ?>

        <section>
            <?php include 'forms/homepage.php'; ?>
            <?php include 'forms/service.php'; ?>
            <?php include 'forms/shop-img.php'; ?>

            <?php include "forms/basic.php"; ?>
            <?php include "forms/sliders.php"; ?>
        </section>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script id="rendered-js">

        </script>
    </div>
    <?php
}