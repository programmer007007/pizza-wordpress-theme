<?php

use Stringy\Stringy as S;

function basic_form_handler()
{
    $save_status = false;
    if (!empty($_SERVER['HTTP_REFERER'])) {
        $form_url = esc_url_raw(wp_unslash($_SERVER['HTTP_REFERER']));
    } else {
        $form_url = home_url('/');
    }
    foreach ($_POST as $key => $value) {
        if (S::create($key)->contains('opt_')) {
            set_theme_options($key, sanitize_text_field($value));
            $save_status = true;
        }
    }
    if ($save_status) {
        wp_safe_redirect(
            esc_url_raw(
                add_query_arg(array('status' => 'success', 'message' => base64_encode("Data has been saved."), 'from' => $_POST["action"]), $form_url)
            )
        );
        exit();
    } else {
        wp_safe_redirect(
            esc_url_raw(
                add_query_arg(array('status' => 'failed', 'message' => base64_encode("Data saving failed."), 'from' => $_POST["action"]), $form_url)
            )
        );
        exit();
    }
}

add_action('admin_post_basic_form', 'basic_form_handler');
add_action('admin_post_slider_form', 'basic_form_handler');
add_action('admin_post_services_form', 'basic_form_handler');
add_action('admin_post_homepage_form', 'basic_form_handler');
add_action('admin_post_shop_img_form', 'basic_form_handler');

add_action('admin_post_contact_form', 'contact_form_handler');
function contact_form_handler()
{
    $save_status = false;
    if (!empty($_SERVER['HTTP_REFERER'])) {
        $form_url = esc_url_raw(wp_unslash($_SERVER['HTTP_REFERER']));
    } else {
        $form_url = home_url('/');
    }
    $name = $phone = $email = $message = "";
    if (
        isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["message"]) &&
        !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["message"])
    ) {
        $fname = sanitize_text_field($_POST["first_name"]);
        $lname = sanitize_text_field($_POST["last_name"]);
        $phone = sanitize_text_field($_POST["phone"]);
        $email = sanitize_text_field($_POST["email"]);
        $message = sanitize_text_field($_POST["message"]);
        $custom_message = "Hi,<br>Name:$fname $lname.<br>Phone:$phone.<br>Email:$email.<br>Message:$message.<br>Regards";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <webmaster@' . $_SERVER['SERVER_NAME'] . '>' . "\r\n";
        mail("prnc.jhnsn1@gmail.com", "Message", $custom_message, $headers);
        wp_safe_redirect(
            esc_url_raw(
                add_query_arg(array('status' => 'success', 'message' => base64_encode("Message has been sent."),
                    'form' => $_POST["action"]), $form_url)
            )
        );
        exit();
    } else {
        wp_safe_redirect(
            esc_url_raw(
                add_query_arg(array('status' => 'failed', 'message' => base64_encode("Some fields are missing."),
                    'form' => $_POST["action"]), $form_url)
            )
        );
        exit();
    }
}