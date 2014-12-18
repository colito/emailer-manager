<?php

class CustomPlaceholders
{
    public function custom_placeholders()
    {
        $latest_dvds = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_latest_releases'));



        $latest_dvds->get_data;

        $vs_dvd_place_holders = array(
            'dvd_name_1' => '',
            'dvd_name_2' => '',
            'dvd_name_3' => '',
            'dvd_name_4' => '',
            'dvd_name_5' => '',
            'dvd_name_6' => '',
            'dvd_name_7' => '',
            'dvd_name_8' => '',

            'dvd_image_1' => '',
            'dvd_image_1' => '',
            'dvd_image_1' => '',
            'dvd_image_1' => '',
            'dvd_image_1' => '',
            'dvd_image_1' => '',
            'dvd_image_1' => '',
            'dvd_image_1' => '',
        );

        return $vs_dvd_place_holders;
    }
}

