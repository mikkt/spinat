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

<div class="container" style="padding-top: 80px;">
	<div class="panel panel-default">
	<div class="panel-heading">Lisa toiduaine</div>
	<form>
	<div class="panel-body">
			<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<td><label for="foodName">Nimi</label></td>
					<td><input type="foodName" class="form-control" id="foodName"></td>
					<td><label for="foodDesc">Juhised</label></td>
				</tr>
				<tr>
					<td><label for="kcal">Kalorid 100g kohta</label></td>
					<td><input type="kcal" class="form-control" id="kcal"></td>
					<td rowspan="4"><textarea type="foodDesc" class="form-control" id="foodDesc" rows="4"></textarea></td>
				</tr>
				<tr>
					<td><label for="carbs">Süsivesikud</label></td>
					<td><input type="carbohydrates" class="form-control" id="carbohydrates"></td>
				</tr>
				<tr>
					<td><label for="fats">Rasvad</label></td>
					<td><input type="fats" class="form-control" id="fats"></td>
				</tr>
				<tr>
					<td><label for="protein">Valgud</label></td>
					<td><input type="protein" class="form-control" id="protein"></td>
				</tr>
			</table>
			</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-primary" type="submit">Lisa toiduaine</button>
	</div>
	</form>
</div>