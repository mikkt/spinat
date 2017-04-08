<div class="jumbotron">
    <div class="container">
        <h1><?php echo $lang_welcome; ?></h1>
        <p><?php echo $lang_welcome_content; ?></p>
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
            <h2><?php echo $lang_title1; ?></h2>
            <p><?php echo $lang_content1; ?></p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div>
        <div class="col-md-4">
            <h2><?php echo $lang_title2; ?></h2>
            <p><?php echo $lang_content2; ?></p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div>
        <div class="col-md-4">
            <h2><?php echo $lang_title3; ?></h2>
            <p><?php echo $lang_content3; ?></p>
            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
        </div>
    </div>
	<br />
	<div class="row">
		<div class="col-md-6 text-center">
			<h2><?php echo $lang_not_user; ?></h2>
		</div>
		<div class="col-md-6 text-center">
			<a href="<?php echo site_url('Pages/registreeru'); ?>" class="btn btn-success btn-lg"><?php echo $lang_join_now; ?></a>
		</div>
	</div>
    <hr>