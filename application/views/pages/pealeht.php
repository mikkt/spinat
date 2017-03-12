<?php
if (isset($_GET['debug'])) {
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	break;
}?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Spinat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<?php echo validation_errors(); ?>
			<?php echo form_open('verifyLogin'); ?>
                <div class="navbar-form navbar-right">
				<div class="form-group">
					<input type="text" placeholder="Kasutajanimi" class="form-control" size="30" id="username" name="username"/>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Parool" class="form-control" id="password" name="password"/>
                </div>
                <input type="submit" class="btn btn-success" value="Logi sisse"/>
				</div>
			</form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Tere tulemast!</h1>
        <p>Projekt Spinat. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a class="btn btn-primary btn-lg" href="#">Loe rohkem &raquo;</a></p>
    </div>
</div>

<div class="container">
	<div class="col-md-6 text-center">
		<h2>Pole veel liige?</h2>
	</div>
	<div class="col-md-6 text-center">
		<a href="<?php echo site_url('Login/registreeru'); ?>" class="btn btn-success btn-lg">Liitu kohe!</a> 
	</div>
</div>
	

    <hr>