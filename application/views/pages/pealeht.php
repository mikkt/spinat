<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Tere tulemast!</h1>
        <p>Projekt Spinat. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <!--<p>Pole veel liige? <a href="<?php echo site_url('Pages/registreeru'); ?>" class="btn btn-success btn-lg">Liitu kohe!</a></p>-->
    </div>
</div>

<div class="container">
	<?php if(validation_errors() != false): ?>
	<br />
	<div class="alert alert-info">
		<strong>Info!</strong> <?php echo validation_errors();?>
	</div>
<?php endif; ?>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Mis on Spinat?</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div>
        <div class="col-md-4">
            <h2>Kellele on see mõeldud?</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div>
        <div class="col-md-4">
            <h2>Miks Spinat?</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div>
    </div>
	<br />
	<div class="row">
		<div class="col-md-6 text-center">
			<h2>Pole veel liige?</h2>
		</div>
		<div class="col-md-6 text-center">
			<a href="<?php echo site_url('Pages/registreeru'); ?>" class="btn btn-success btn-lg">Liitu kohe!</a>
		</div>
	</div>
    <hr>