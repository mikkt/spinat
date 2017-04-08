<div class="container">
	<?php if(validation_errors() != false): ?>
		<div class="alert alert-info">
		<strong>Info!</strong> <?php echo validation_errors();?>
		</div>
	<?php endif; ?>
	<?php echo form_open('FoodController/insertIngredient'); ?>
	<div class="panel panel-default">
	<div class="panel-heading"><?php echo $title; ?></div>
	<div class="panel-body">
			<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<td><label for="foodName"><?php echo $lang_name; ?></label></td>
					<td><input type="text" class="form-control" id="foodName" name="foodName"></td>
				</tr>
				<tr>
					<td><label for="kcal"><?php echo $lang_calories; ?></label></td>
					<td><input type="number" class="form-control" id="kcal" name="energy"></td>
				</tr>
				<tr>
					<td><label for="carbohydrates"><?php echo $lang_carbs; ?></label></td>
					<td><input type="number" class="form-control" id="carbohydrates" name="carbohydrates"></td>
				</tr>
				<tr>
					<td><label for="fat"><?php echo $lang_fats; ?></label></td>
					<td><input type="number" class="form-control" id="fat" name="fat"></td>
				</tr>
				<tr>
					<td><label for="protein"><?php echo $lang_proteins; ?></label></td>
					<td><input type="number" class="form-control" id="protein" name="protein"></td>
				</tr>
			</table>
			</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-primary" type="submit"><?php echo $lang_add_ingredient; ?></button>
        <a type="button" class="btn btn-danger" href="<?php echo site_url('pages/toiduained'); ?>"><?php echo $lang_cancel; ?></a>
	</div>
	</form>
</div>