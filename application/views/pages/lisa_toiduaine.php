<div class="container" style="padding-top: 80px;">
	<?php if(validation_errors() != false): ?>
		<div class="alert alert-info">
		<strong>Info!</strong> <?php echo validation_errors();?>
		</div>
	<?php endif; ?>
	<?php echo form_open('FoodController/insertIngredient'); ?>
	<div class="panel panel-default">
	<div class="panel-heading">Lisa toiduaine</div>
	<div class="panel-body">
			<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<td><label for="foodName">Nimi</label></td>
					<td><input type="text" class="form-control" id="foodName" name="foodName"></td>
				</tr>
				<tr>
					<td><label for="kcal">Kalorid 100g kohta</label></td>
					<td><input type="number" class="form-control" id="kcal" name="energy"></td>
				</tr>
				<tr>
					<td><label for="carbohydrates">Süsivesikud</label></td>
					<td><input type="number" class="form-control" id="carbohydrates" name="carbohydrates"></td>
				</tr>
				<tr>
					<td><label for="fat">Rasvad</label></td>
					<td><input type="number" class="form-control" id="fat" name="fat"></td>
				</tr>
				<tr>
					<td><label for="protein">Valgud</label></td>
					<td><input type="number" class="form-control" id="protein" name="protein"></td>
				</tr>
			</table>
			</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-primary" type="submit">Lisa toiduaine</button>
	</div>
	</form>
</div>