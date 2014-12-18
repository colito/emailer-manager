<?php
class EmailerFns
{
    private function mailer_db_class()
    {
        $mailer = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_mailer'));
        return $mailer;
    }

    public function deactivate_mailer()
    {
        $mailer = $this->mailer_db_class();

        # switch off previous active mailer
        $where = array('is_active'=>1);
        $turn_off_col = array('is_active'=>0);

        return $mailer->save(2, $turn_off_col, $where);
    }

    public function activate_mailer($mailer_id)
    {
        #deactiveate active mailer
        $this->deactivate_mailer();

        # activate mailer
        $mailer = $this->mailer_db_class();
        $where = array('id'=>$mailer_id);
        $turn_on_col = array('is_active'=>1);
        $activate = $mailer->save(2, $turn_on_col, $where);

        return $activate;
    }

    public function get_active_mailer()
    {
        $mailer = $this->mailer_db_class();

        $where = array('is_active'=>1);
        $active_emailer = $mailer->select_data('*', $where);

        return $active_emailer[0];
    }

    public function get_mailer_info($mailer_id)
    {
        $mailer = $this->mailer_db_class();

        $where = array('id'=>$mailer_id);
        $mailer_name = $mailer->select_data('*', $where);
        return $mailer_name;
    }

    public function get_mailer_name($mailer_id)
    {
        $mailer_info = $this->get_mailer_info($mailer_id);
        $mailer_name = $mailer_info[0]['mailer_month'] . ' ' . $mailer_info[0]['year'];
        return $mailer_name;
    }

    public function get_mailer_id_by_name($mailer_name)
    {
        $mailer = $this->mailer_db_class();

        $mailer_month = $mailer_name;
        $year_pos = strpos($mailer_month, ' 20');

        if($year_pos != false)
        {
            $split = explode(' ', $mailer_month);
            $mailer_month = $split[0];
            $year = $split[1];
        }

        $where = array('mailer_month'=>$mailer_month, 'year' => $year);
        $mailer_id = $mailer->get_id($where);

        return $mailer_id;
    }
}