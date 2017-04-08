<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('pages'); ?>">Spinat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php echo form_open('UserController/verifyLogin'); ?>
            <ul  id="navbar" class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <?php echo $lang_language; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('pages/setLang/estonian'); ?>">EST</a></li>
                        <li><a href="<?php echo site_url('pages/setLang/english'); ?>">ENG</a></li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-form navbar-right">
                <div class="form-group">
                    <label for="username" hidden><?php echo $lang_username; ?></label>
                    <input type="text" placeholder="<?php echo $lang_username; ?>" class="form-control" size="15" id="username" name="username" data-toggle="tooltip" data-placement="right" title="<?php echo $lang_enter_username; ?>"/>
                </div>
                <div class="form-group">
                    <label for="password" hidden><?php echo $lang_password; ?></label>
                    <input type="password" placeholder="<?php echo $lang_password; ?>" class="form-control" size="15" id="password" name="password" data-toggle="tooltip" data-placement="right" title="<?php echo $lang_enter_password; ?>"/>
                </div>
                <input type="submit" class="btn btn-success" value="<?php echo $lang_login; ?>"/>
                <?php echo $google_auth; ?>
            </div>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="container">
	<?php if ($this->session->flashdata('errors')): ?>
	<div class="alert alert-warning">
    <?php echo $this->session->flashdata('errors'); ?>
	</div>
	<?php endif; ?>
</div>