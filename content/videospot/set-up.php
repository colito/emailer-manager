[page:Set Up]

<div id="content">
    <h2>Set Up</h2>
</div>

<?php
    $current_month = date('F');
    $current_year = date('Y');
    $next_year = $current_year + 1;

    $mailer = instantiate_class('DbINegotiator', 'models/dbi_negotiator', array('table'=>'videospot_mailer'));
    $mailer_columns = $mailer->select_data('id, mailer_month, year');
    if(!empty($mailer_columns)) {krsort($mailer_columns);}

?>

<div id="content">
    <form method="post" action="videospot/activate-mailer">
        <dl>
            <dt>
                <dd><label>Active Mailer:</label></dd>
                <dd>
                    <select name="active_mailer">
                        <?php
                        if(!empty($mailer_columns))
                        {
                            foreach($mailer_columns as $mailer_column)
                            {
                                $month = $mailer_column['mailer_month'];
                                $year = $mailer_column['year'];

                                echo '<option value='.$mailer_column['id'].'>'. $month .' '. $year .'</option>';
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" name="activate-mailer" value="Activate Emailer">
                </dd>
            </dt>
        </dl>
    </form>

    <form method="post" action="videospot/entry-validation">
        <dl>
            <dt>
                <dd><label>Month:</label></dd>
                <dd>
                    <select name="mailer_month">
                        <option value="<?php echo $current_month; ?>"><?php echo $current_month; ?></option>
                        <option value="null">--Select Month--</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>

                    <select name="year">
                        <option value="<?php echo $current_year; ?>"><?php echo $current_year; ?></option>
                        <option value="<?php echo $next_year; ?>"><?php echo $next_year; ?></option>
                    </select>
                </dd>
            </dt>

            <dt>
                <dd><label>Banner Link:</label></dd>
                <dd><input type="text" name="banner_link"></dd>
            </dt>

            <dt>
                <dd class="submit">
                    <input type="submit" name="add-month" value="Add New Emailer Month">
                </dd>
            </dt>

        </dl>
    </form>
</div>