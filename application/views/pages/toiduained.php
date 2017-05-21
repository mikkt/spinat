<script src="<?php echo base_url(); ?>media/js/filterTable.js"></script>
<div class="container">
	<div class="panel panel-default">
        <div class="panel-heading"><?php echo $lang_ingredient_db; ?> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="<?php echo $lang_search_help; ?>"/></div>
            <div class="panel-body">
                <input type="text" class="form-control" id="foodSearch" name="foodNameSearch" placeholder="<?php echo $lang_search_ingredient; ?>" onkeyup="filterTable()">
                <div class="table-responsive" style="padding-top: 10px;">
                <table class="table table-bordered" id="foodTable">
                    <tr>
                        <th><?php echo $lang_name; ?></td>
                        <th><?php echo $lang_calories; ?></td>
                        <th><?php echo $lang_carbs; ?></td>
                        <th><?php echo $lang_fats; ?></td>
                        <th><?php echo $lang_proteins; ?></td>
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
                <p><?php echo $lang_different_ingredients; ?>: <?php foreach($ingredientCount as $count) {echo $count->ingredientCount; }?></p>
                    <a href="<?php echo site_url('Pages/lisa_toiduaine'); ?>" class="btn btn-primary text-right"><?php echo $lang_new_ingredient; ?></a>
            </div>
        </div>
	</div>
</div>