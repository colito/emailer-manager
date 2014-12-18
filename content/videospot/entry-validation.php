[page:Entry Validation]
<?php

    #Initializations
    $post = $_POST;
    $mailer = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_mailer'));

    # Mailer / Save mailer_month
    if(!empty($post['add-month']) && !empty($post['year']))
    {
        $mailer_month = $post['mailer_month'];
        $mailer_year = $post['year'];
        $banner_link = $post['banner_link'];

        $mailer->columns['mailer_month'] = $mailer_month;
        $mailer->columns['year'] = $mailer_year;
        $mailer->columns['banner_link'] = $banner_link;

        $where = array('mailer_month'=>$mailer_month, 'year'=>$mailer_year);

        $x = $mailer->record_exists($where);
        if($x) # This block essentially updates the emailers banner link of an existing emailer
        {
            $where2 = array('mailer_month'=>$mailer_month, 'year'=>$mailer_year, 'banner_link'=>$banner_link);
            $y = $mailer->record_exists($where2);
            if(!$y)
            {
                $save_new_mailer = $mailer->save(2, 'banner_link', $where);
                echo $save_new_mailer['message'];
                return;
            }
        }

        $save_new_mailer = $mailer->save(1, null, $where);

        echo $save_new_mailer['message'];

        return;
    }

/*
    # Get mailer_month id
    $mailer_month = @$post['mailer_month'];
    $year_pos = strpos($mailer_month, ' 20');

    if($year_pos != false)
    {
        $split = explode(' ', $mailer_month);
        $mailer_month = $split[0];
        $year = $split[1];
    }
    else
    {
        $year = $post['year'];
    }

    $where = array('mailer_month'=>$mailer_month, 'year' => $year);
    $mailer_id = $mailer->get_id($where);*/

    $mailer = instantiate_class('EmailerFns', 'emailer_fns');

    $active_mailer = $mailer->get_active_mailer();

    $mailer_id = $active_mailer['id'];

    //var_dump($active_mailer);

    /*------------------------==================================------------------------------------------*/

    if(!empty($mailer_id))
    {
        if(!empty($post['latest-releases']))
        {
            //var_dump('latest!!');

            $latest_releases = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_latest_releases'));

            $latest_releases->columns['mailer_id'] = $mailer_id;
            $latest_releases->columns['video_name'] = $post['video_name'];
            $latest_releases->columns['video_type'] = $post['video_type'];
            $latest_releases->columns['video_image_link'] = $post['video_image_link'];
            $latest_releases->columns['video_info_link'] = $post['video_info_link'];

            $where = array(
                'mailer_id'=>$mailer_id,
                'video_name'=>$post['video_name'],
                'video_type'=>$post['video_type']
            );

            $save_record = $latest_releases->save(1, null, $where);
            echo $save_record['message'];
        }
        elseif(!empty($post['coming-soon']))
        {
            //var_dump('coming soon!!');

            $coming_soon = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_coming_soon'));

            $coming_soon->columns['mailer_id'] = $mailer_id;
            $coming_soon->columns['video_name'] = $post['video_name'];
            $coming_soon->columns['video_info_link'] = $post['video_info_link'];

            $where = array(
                'mailer_id'=>$mailer_id,
                'video_name'=>$post['video_name']
            );
        }
        elseif(!empty($post['previous-releases']))
        {
            //var_dump('previous releases');

            $previous_releases = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_previous_releases'));

            $previous_releases->columns['mailer_id'] = $mailer_id;
            $previous_releases->columns['video_name'] = $post['video_name'];
            $previous_releases->columns['video_info_link'] = $post['video_info_link'];

            $where = array(
                'mailer_id'=>$mailer_id,
                'video_name'=>$post['video_name']
            );
        }
    }
    else
    {
        echo 'No month specified';
    }