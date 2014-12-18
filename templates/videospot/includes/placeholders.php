<?php
include_lib('video_info');
class TemplatePlaceholders
{
    public $placeholders = array();

    function __construct()
    {
        $mailer = $this->emailer_class();
        $mailer_id = $mailer->get_active_mailer()['id'];

        $this->placeholders = array_merge(
            $this->dvd_placeholders($mailer_id),
            $this->bluray_placeholders($mailer_id),
            $this->emailer_details()
        );
    }

    private function emailer_class()
    {
        $mailer = instantiate_class('EmailerFns', 'emailer_fns');
        return $mailer;
    }

    private function info_source($mailer_id)
    {
        # video info source class
        $info = new VideoInfo($mailer_id);
        return $info;
    }

    public function emailer_details()
    {
        $mailer = $this->emailer_class();
        $info = $mailer->get_active_mailer();
        return $info;
    }

    public function banner_link()
    {
        $info = $this->emialer_class();
        $banner_link = $info->get_active_mailer()['banner_link'];

        return array('banner_link'=>$banner_link);
    }

    public function dvd_placeholders($mailer_id)
    {
        $info = $this->info_source($mailer_id);
        $dvds = $info->get_dvds();

        $d_placeholders = array();

        $i = 1;
        foreach((array)$dvds as $dvd)
        {
            $d_placeholders['dvd_name_'.$i] = $dvd['video_name'];
            $d_placeholders['dvd_image_link_'.$i] = $dvd['video_image_link'];
            $d_placeholders['dvd_info_link_'.$i] = $dvd['video_info_link'];
            $i++;
        }
        return $d_placeholders;
    }

    public function bluray_placeholders($mailer_id)
    {
        $info = $this->info_source($mailer_id);
        $blurays = $info->get_blurays();

        $b_placeholders = array();

        $i = 1;
        foreach((array)$blurays as $bluray)
        {
            $b_placeholders['bluray_name_'.$i] = $bluray['video_name'];
            $b_placeholders['bluray_image_link_'.$i] = $bluray['video_image_link'];
            $b_placeholders['bluray_info_link_'.$i] = $bluray['video_info_link'];
            $i++;
        }
        return $b_placeholders;
    }
}