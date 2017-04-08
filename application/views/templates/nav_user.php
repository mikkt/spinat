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
            <p class="navbar-text">Logitud kui: <?php echo $username; ?> </p>
            <li class="active"><a href="<?php echo site_url('pages/kalender'); ?>">Toitumispäevik</a></li>
            <li><a href="<?php echo site_url('pages/toiduained'); ?>">Toiduained</a></li>
            <li><a href="<?php echo site_url('pages/seaded'); ?>">Seaded</a></li>
            <li><a href="<?php echo site_url('UserController/logout'); ?>">Logi välja</a></li>
        </ul>
    </div>
</nav>