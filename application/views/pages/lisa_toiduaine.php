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
			<li class="active"><a href="<?php echo site_url('pages/lisa_toiduaine'); ?>">Toiduained</a></li>
			<li><a href="<?php echo site_url('pages/seaded'); ?>">Seaded</a></li>
            <li><a href="<?php echo site_url('UserController/logout'); ?>">Logi välja</a></li>
        </ul>
    </div>
</nav>

<div class="container" style="padding-top: 80px;">
	<div class="panel panel-default">
	<div class="panel-heading">Lisa toiduaine</div>
	<form>
	<div class="panel-body">
			<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<td><label for="foodName">Nimi</label></td>
					<td><input type="text" class="form-control" id="foodName"></td>
				</tr>
				<tr>
					<td><label for="kcal">Kalorid 100g kohta</label></td>
					<td><input type="number" class="form-control" id="kcal"></td>
				</tr>
				<tr>
					<td><label for="carbs">Süsivesikud</label></td>
					<td><input type="number" class="form-control" id="carbohydrates"></td>
				</tr>
				<tr>
					<td><label for="fats">Rasvad</label></td>
					<td><input type="number" class="form-control" id="fats"></td>
				</tr>
				<tr>
					<td><label for="protein">Valgud</label></td>
					<td><input type="number" class="form-control" id="protein"></td>
				</tr>
			</table>
			</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-primary" type="submit">Lisa toiduaine</button>
	</div>
	</form>
</div>