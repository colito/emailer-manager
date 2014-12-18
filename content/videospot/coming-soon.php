[page:Coming Soon]

<div id="content">
    <h2>Coming Soon</h2>
</div>

<?php $current_month = date('F'); ?>

<div id="content">
    <form method="post" action="">
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
                    </select> <?php echo date('Y');?>
                </dd>
            </dt>
            <dt>
                <dd><label>Video Name:</label></dd>
                <dd><input type="text" name="video_name"></dd>
            </dt>

            <dt>
                <dd><label>Video Info Link:</label></dd>
                <dd><input type="text" name="video_info_link"></dd>
            </dt>

            <dt>
                <dd class="submit">
                    <input type="submit" value="Add To Mailer">
                </dd>
            </dt>

        </dl>
    </form>
</div>