[page:Add Entry]

<?php

$mailer = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_mailer'));
$mailer_columns = $mailer->select_data('mailer_month, year');
if(!empty($mailer_columns)) {krsort($mailer_columns);}

?>

<div id="content">
    <h2>Add Entry</h2>
</div>

<div id="content">
    <form method="post" action="videospot/entry-validation">
        <dl>
            <dt>
            <dd><label>Video Name:</label></dd>
            <dd><input type="text" name="video_name"></dd>
            </dt>

            <dt>
            <dd><label>Video Type:</label></dd>
            <dd>
                <select name="video_type">
                    <option>DVD</option>
                    <option>BluRay</option>
                </select>
            </dd>
            </dt>

            <dt>
            <dd><label>Video Image Link:</label></dd>
            <dd><input type="text" name="video_image_link"></dd>
            </dt>

            <dt>
            <dd><label>Video Info Link:</label></dd>
            <dd><input type="text" name="video_info_link"></dd>
            </dt>

            <dt>
            <dd class="submit">
                <input type="submit" name="latest-releases" value="Add To Latest Releases">
                <input type="submit" name="coming-soon" value="Add To Coming Soon">
                <input type="submit" name="previous-releases" value="Add To Previous Releases">
            </dd>
            </dt>

        </dl>
    </form>
</div>