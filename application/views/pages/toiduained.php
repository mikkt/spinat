<div class="container" style="padding-top: 80px;">
	<div class="panel panel-default">
	<div class="panel-heading">Otsi toiduainet <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Sisesta sõne, et tabel kuvaks need toiduained, mille nimes sisaldub sisestatud tekst"/></div>
	<div class="panel-body">
		<input type="text" class="form-control" id="foodSearch" name="foodNameSearch" placeholder="Otsi toiduainet" >
		<div class="table-responsive" style="padding-top: 10px;">
		<table class="table table-bordered">
			<tr>
				<th>Nimi</td>
				<th>Kalorid 100g kohta (kcal)</td>
				<th>Süsivesikud (g)</td>
				<th>Rasvad (g)</td>
				<th>Valgud (g)</td>
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