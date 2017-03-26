<div class="container" style="padding-top: 80px;">
	<div class="panel panel-default">
	<div class="panel-heading">Otsi toiduainet</div>
	<div class="panel-body">
		<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<input type="text" class="form-control" id="foodName" name="foodNameSearch" placeholder="Otsi toiduainet">
			</tr>
			<tr>
				<td>Nimi</td>
				<td>Kalorid 100g kohta (kcal)</td>
				<td>Süsivesikud (g)</td>
				<td>Rasvad (g)</td>
				<td>Valgud (g)</td>
			</tr>
			<?php foreach($ingredients as $ingredient){?>
			<tr>
				<td><?php echo $ingredient->ingredient_name;?></td>
				<td><?php echo $ingredient->ingredient_energy;?></td>
				<td><?php echo $ingredient->carbohydrates;?></td>
				<td><?php echo $ingredient->fat;?></td>
				<td><?php echo $ingredient->protein;?></td>
			</tr>
			<?php }?>
		</table>
		<a href="<?php echo site_url('Pages/lisa_toiduaine'); ?>" class="btn btn-primary">Lisa toiduaine</a>
		</div>
	</div>
	</div>
</div>