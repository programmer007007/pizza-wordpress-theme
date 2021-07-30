<?php
if (!function_exists('get_localization')) {
    function get_localization()
    {


        $localization = array(

            /*------------------------------------------------------
            * Theme
            *------------------------------------------------------*/
            'currency_label' => esc_html__('Currency', DOMAIN),



        );

        return $localization;
    }
}
