<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('pages/'); ?>">Spinat</a>
        </div>
        <ul id="navbar" class="nav navbar-nav navbar-right">
            <p class="navbar-text"><?php echo $lang_logged_as . " " . $username; ?> </p>
            <li><a href="<?php echo site_url('pages/kalender'); ?>"><?php echo $lang_food_diary; ?></a></li><!-- class="active" -->
            <li><a href="<?php echo site_url('pages/toiduained'); ?>"><?php echo $lang_ingredients; ?></a></li>
            <li><a href="<?php echo site_url('pages/seaded'); ?>"><?php echo $lang_settings ?></a></li>
            <li><a href="<?php echo site_url('UserController/logout'); ?>"><?php echo $lang_logout; ?></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $lang_language; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('pages/setLang/estonian'); ?>">EST</a></li>
                    <li><a href="<?php echo site_url('pages/setLang/english'); ?>">ENG</a></li>
                </ul>
        </ul>

    </div>
</nav>