<?php

use Stringy\Stringy as S;

function get_theme_options($key, $fallback = null)
{
    if (!empty($key)) {
        return get_option($key . "_" . DOMAIN, $fallback);
    } else {
        return $fallback;
    }
}

function set_theme_options($key, $value)
{
    if (!empty($key)) {
        return update_option($key . "_" . DOMAIN, $value);
    } else {
        throw new Exception("Option key cannot be left empty");
    }
}

function html_text_wrapper($content, $text_target, $wrap_with, $close_with, $capitalize = true)
{
    $build = '';
    foreach (explode(" ", $content) as $item) {
        if (S::create($item)->isEquals("$text_target")) {
            if ($capitalize) {
                $build .= $wrap_with . S::create($item)->toUpperCase()->toString() . " " . $close_with;
            } else {
                $build .= $wrap_with . $item . $close_with;
            }
        } else {
            if ($capitalize) {
                $build .= S::create($item)->toUpperCase()->toString() . " ";
            } else {
                $build .= $item . " ";
            }
        }
    }
    return $build;
}

function print_radio_status($key, $value, $default = false)
{
    if (!empty($key)) {
        $result = get_theme_options($key, 0);
        if ($result == $value) {
            echo "checked ";
        } else {
            if ($default) {
                echo "checked ";
            }
        }
    }
}

?>

