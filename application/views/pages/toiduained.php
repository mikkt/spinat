<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Spinat</a>
        </div>
        <ul id="navbar" class="nav navbar-nav navbar-right">
            <li><a href="<?php echo site_url('kalender'); ?>">Toitumispäevik</a></li>
			<li class="active"><a href="<?php echo site_url('lisa_toiduaine'); ?>">Toiduained</a></li>
			<li><a href="<?php echo site_url('seaded'); ?>">Seaded</a></li>
            <li><a href="<?php echo site_url('pealeht'); ?>">Logi välja</a></li>
        </ul>
    </div>
</nav>