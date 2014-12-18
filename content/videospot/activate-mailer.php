[page:Activate Mailer]

<?php
$post = $_POST;

if(!empty($post['activate-mailer']))
{
    # mailer functions
    $mailer = instantiate_class('EmailerFns', 'emailer_fns');

    $mailer_id = $post['active_mailer'];

    #activate mailer
    $activate = $mailer->activate_mailer($mailer_id);

    if($activate['result'] == true)
    {
        # get mailer name
        $mailer_name = $mailer->get_mailer_name($mailer_id);

        echo $mailer_name . ' Emailer has been activated';
    }
}