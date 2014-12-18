<?php

require_once('templates/videospot/includes/placeholders.php');

$mailer = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_mailer'));

$mailer_month = 'February';
$year = '2014';

$where = array('mailer_month'=>$mailer_month, 'year'=>$year);

$mailer_id = $mailer->get_id($where);


/*-----------------============================-----------------------------*/

$vinfo = new TemplatePlaceholders();

$dvds = $vinfo->placeholders;

var_dump($dvds);

?>

<div id="content">

</div>