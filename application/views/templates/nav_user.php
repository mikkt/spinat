<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('pages/'); ?>">Spinat</a>
        </div>
        <p class="navbar-text navbar-left"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $username; //$lang_logged_as . " " .  ?> </p>

        <form class="navbar-form navbar-right"><a class="btn btn-danger btn-sm" href="<?php echo site_url('UserController/logout'); ?>"><?php echo $lang_logout; ?></a></form>
        <ul id="navbar" class="nav navbar-nav navbar-right">
            <li><a href="<?php echo site_url('pages/kalender'); ?>"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo $lang_calendar; ?></a></li><!-- class="active" -->
            <li><a href="<?php echo site_url('pages/toiduained'); ?>"><span class="glyphicon glyphicon-apple" aria-hidden="true"></span> <?php echo $lang_ingredients; ?></a></li>
            <li><a href="<?php echo site_url('pages/seaded'); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $lang_settings ?></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <?php echo $lang_language; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('pages/setLang/estonian'); ?>">EST</a></li>
                    <li><a href="<?php echo site_url('pages/setLang/english'); ?>">ENG</a></li>
                </ul>
            </li>
            <!--<li><a class="btn btn-default btn-sm" href="<?php //echo site_url('UserController/logout'); ?>"><?php //echo $lang_logout; ?></a></li>-->

        </ul>

    </div>
</nav>