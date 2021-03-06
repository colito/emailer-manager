<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <!-- Base path: Very important especially when the systems uses clean URLs -->
    {base-url}

    <title>{page-title}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">

    <link rel="icon" type="image/png" href="{favicon}">

    <!-- CSS Libraries -->

    <!--{templata:css}-->

    <link rel="stylesheet" href="{template-res:css:normalize.css}" type="text/css" media="screen">
    <link rel="stylesheet" href="{template-res:css:grid.css}" type="text/css" media="screen">
    <link href="http://fonts.googleapis.com/css?family=Armata" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="{template-res:css:flexslider.css}" type="text/css" media="screen"> -->
    <link rel="stylesheet" href="{template-res:css:style.css}" type='text/css' media="screen">
    <link rel="stylesheet" href="{template-res:css:media_queries.css}" type='text/css' media="screen">

    <link rel="stylesheet" type="text/css" href="{templata:libs}/css/codrops/sidebar_transitions/component.css" />
    <script src="{templata:libs}/js/codrops/modernizr.custom.js"></script>

    <!-- JQuery -->
    {templata:jquery}

    <!-- Header files -->
    {header-files}

</head>

<body {templata:right-click}>

<div id="topper">

    <div id="title">
        <h1><a href="">{templata:app-name}</a></h1>
    </div>

    <div id="switch">
        <img data-effect="st-effect-1" src="images/nav_menu_icon.png">
    </div>


    <div id="navigation">
        {navi:desktop}
    </div>

</div>

<div id="panel">
    {navi:mobile}
</div>

<div class="container_12 clearfix">

    {body-content}

    <div id='footer' class='grid_12'>
        <div id='copyright'>
            <p>&copy; 2014 {app-name}. All Rights Reserved</p>
        </div>
    </div>
</div>

<!-- Menu toggle for smart phones -->

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $("#switch").click(function(){
            $("#panel").slideToggle(250);
        });
    });
</script>

</body>

</html>
