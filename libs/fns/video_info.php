<?php
class VideoInfo
{
    public $mailer_id;

    function __construct($mailer_id)
    {
        $this->mailer_id = $mailer_id;
    }

    public function get_videos($type)
    {
        $videos = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('videospot_latest_releases'));

        $where = array(
            'video_type'=>$type,
            'mailer_id'=>$this->mailer_id
        );

        $info = $videos->select_data('*', $where);

        return $info;
    }

    public function get_dvds()
    {
        $dvds = $this->get_videos('DVD');
        return $dvds;
    }

    public function get_blurays()
    {
        $blurays = $this->get_videos('BluRay');
        return $blurays;
    }
}