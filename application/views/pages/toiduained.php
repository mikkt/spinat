<script src="<?php echo base_url(); ?>media/js/filterTable.js"></script>
<div class="container" style="padding-top: 80px;">
	<div class="panel panel-default">
	<div class="panel-heading">Toiduained <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Kasuta otsinguriba, et toiduaineid filtreerida"/></div>
	<div class="panel-body">
		<input type="text" class="form-control" id="foodSearch" name="foodNameSearch" placeholder="Otsi toiduainet" onkeyup="filterTable()">
		<div class="table-responsive" style="padding-top: 10px;">
		<table class="table table-bordered" id="foodTable">
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
		<p>Hetkel on andmebaasis <?php foreach($ingredientCount as $count) {echo $count->ingredientCount; }?> erinevat toiduainet.</p> 
		<a href="<?php echo site_url('Pages/lisa_toiduaine'); ?>" class="btn btn-primary">Lisa toiduaine</a>
		</div>
	</div>
	</div>
</div>