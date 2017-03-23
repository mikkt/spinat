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
            <li><a href="<?php echo site_url('pages/kalender'); ?>">Toitumispäevik</a></li>
			<li><a href="<?php echo site_url('pages/lisa_toiduaine'); ?>">Toiduained</a></li>
			<li class="active"><a href="<?php echo site_url('pages/seaded'); ?>">Seaded</a></li>
            <li><a href="<?php echo site_url('UserController/logout'); ?>">Logi välja</a></li>
        </ul>
    </div>
</nav>
<h2 style="padding-top: 80px;">Seaded</h2>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-header">Konto seaded</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="form-control-static">Praegune email:</p>
                    <p class="form-control-static">Uus email:</p>
                </div>
                <div class="col-sm-3">
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_email" class="form-control">
                </div>
                <div class="col-sm-3">
                    <p class="form-control-static">Praegune parool:</p>
                    <p class="form-control-static">Uus parool:</p>
                    <p class="form-control-static">Korda parooli:</p>
                </div>
                <div class="col-sm-3">
                    <input type="password" id="existingpassword" class="form-control">
                    <input type="password" id="newpassword" class="form-control">
                    <input type="password" id="newpwdrepeat" class="form-control">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Salvesta</button>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-header">Kasutaja ja toitumise seaded</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="form-control-static">Vanus:</p>
                    <p class="form-control-static">Muuda vanust:</p>
                    <p class="form-control-static">Eesmärk:</p>
                    <p class="form-control-static">Muuda eesmärki:</p>
                </div>
                <div class="col-sm-3">
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_age" class="form-control" >
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_goal" class="form-control" >
                </div>
                <div class="col-sm-3">
                    <p class="form-control-static">Pikkus:</p>
                    <p class="form-control-static">Muuda pikkust:</p>
                    <p class="form-control-static">Kaal:</p>
                    <p class="form-control-static">Muuda kaalu:</p>
                </div>
                <div class="col-sm-3">
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_height" class="form-control">
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_weight" class="form-control">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Salvesta</button>
                </div>
            </div>
        </div>
    </div>
</div>