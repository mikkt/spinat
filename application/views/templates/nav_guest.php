<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
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
            <div class="navbar-form navbar-right">
                <div class="form-group">
                    <label for="username">Kasutajanimi</label>
                    <input type="text" placeholder="Kasutajanimi" class="form-control" size="30" id="username" name="username" data-toggle="tooltip" data-placement="right" title="Sisesta kasutajanimi"/>
                </div>
                <div class="form-group">
                    <label for="password">Parool</label>
                    <input type="password" placeholder="Parool" class="form-control" id="password" name="password" data-toggle="tooltip" data-placement="right" title="Sisesta parool"/>
                </div>
                <input type="submit" class="btn btn-success" value="Logi sisse"/>
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