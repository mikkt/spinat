<script src="<?php echo base_url(); ?>media/js/filterTable.js"></script>
<script src="<?php echo base_url(); ?>media/js/clickRow.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>
                <?php
                    //echo $today . " - " . $day . ". " . $month;
                    if ($is_today) {
                        echo "<p class='text-success'>" . $day . ". " . $month . " - " . $lang_today . "</p>";
                    } else {
                        echo "<p>" . $day . ". " . $month . "</p>";
                    }
                ?>
            </h2>
            <a type="button" class="btn btn-primary" href="<?php echo site_url('pages/kalender'); ?>">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;<?php echo $lang_back; ?>
            </a>
        </div>
    </div>

    <div class="paev-kast">
        <div class="row">
            <div class="col-md-12"><h4><?php echo $lang_breakfast; ?></h4></div>
            <div class="col-sm-12 col-md-6">
                <div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table border="1" class="table table-bordered" id="ingredientTable">
							<tr><th><?php echo $lang_name; ?></th><th><?php echo $lang_quantity; ?></th><th><?php echo $lang_calories; ?></th><th><?php echo $lang_carbs; ?></th><th><?php echo $lang_fats; ?></th><th><?php echo $lang_proteins; ?></th></tr>
							<?php foreach($meal_ingredients as $meal_ingredient){?>
								<tr>
									<td><?php echo $meal_ingredient->ingredient_name;?></td>
									<td><?php echo $meal_ingredient->amount;?></td>
									<td><?php echo $meal_ingredient->ingredient_energy;?></td>
									<td><?php echo $meal_ingredient->carbohydrates;?></td>
									<td><?php echo $meal_ingredient->fat;?></td>
									<td><?php echo $meal_ingredient->protein;?></td>
								</tr>
                            <?php }?>
						</table>
					</div>
				</div>
				</div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lang_ingredient_db; ?> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="<?php echo $lang_search_help; ?>"/></div>
                    <div class="panel-body">
                        <input type="text" class="form-control" id="foodSearch" name="foodNameSearch" placeholder="<?php echo $lang_search_ingredient; ?>" onkeyup="filterTable()">
                        <div class="table-responsive" style="padding-top: 10px;">
                            <table class="table table-bordered" id="foodTable">
                                <tr>
                                    <th><?php echo $lang_name; ?></td>
                                    <th><?php echo $lang_calories; ?> (kcal)</td>
                                    <th><?php echo $lang_carbs; ?> (g)</td>
                                    <th><?php echo $lang_fats; ?> (g)</td>
                                    <th><?php echo $lang_proteins; ?> (g)</td>
                                </tr>
                                <?php foreach($ingredients as $ingredient){?>
                                    <tr class="clickable-row">
                                        <td class="ingredient-name"><?php echo $ingredient->ingredient_name; ?></td>
                                        <td><?php echo $ingredient->ingredient_energy;?></td>
                                        <td><?php echo $ingredient->carbohydrates;?></td>
                                        <td><?php echo $ingredient->fat;?></td>
                                        <td><?php echo $ingredient->protein;?></td>
                                    </tr>
                                <?php }?>
                            </table>

                            <div class="col-md-4">
                                <input type="text" class="form-control" id="q" name="quantity" placeholder="<?php echo $lang_quantity; ?>">
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-success text-right" id="addIngredient"><?php echo $lang_add_to_menu; ?></a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?php echo site_url('Pages/lisa_toiduaine'); ?>" class="btn btn-default text-right"><?php echo $lang_new_ingredient; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row paev-bottom">
            <div class="col-md-12 text-right">
                <a type="button" class="btn btn-primary" href="#">
                    <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span> Muuda
                </a>
            </div>
        </div>-->
    </div>


    <!-- Sama lugu mis ülemistega, söögikord ainult teine. Mingi loop? Lang jaoks: $lang_dinner, $lang_supper ja $lang_snacks-->
    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
    <div class="paev-kast">
        <div class="row">
            <div class="col-md-12"><h4>Lõunasöök</h4></div>
            <div class="col-md-3"><div style="background-color: #dddddd; width: 250px; height: 250px;">Placeholder</div></div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table border="1" class="table table-striped">
                        <tr><th>Toiduaine</th><th>Kogus</th><th>Kalorid</th><th>Süsivesikud</th><th>Rasvad</th><th>Valgud</th></tr>
                        <tr><td>Nimetus siin</td><td>177</td><td>174</td><td>10</td><td>0</td><td>20</td></tr>
                        <tr><td>Veidi pikem nimetus on siin</td><td>3</td><td>14</td><td>4 304</td><td>3</td><td>1</td></tr>
                        <tr><td>Midagi veel</td><td>34</td><td>14</td><td>43</td><td>57</td><td>33</td></tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3"><div style="background-color: #dddddd; width: 250px; height: 250px;">Placeholder</div></div>
        </div>
        <div class="row paev-bottom">
            <div class="col-md-12 text-right">
                <a type="button" class="btn btn-primary" href="#">
                    <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span> Muuda
                </a>
            </div>
        </div>
    </div>

    <div class="paev-kast">
        <div class="row">
            <div class="col-md-12"><h4>Õhtusöök</h4></div>
            <div class="col-md-3"><div style="background-color: #dddddd; width: 250px; height: 250px;">Placeholder</div></div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table border="1" class="table table-striped">
                        <tr><th>Toiduaine</th><th>Kogus</th><th>Kalorid</th><th>Süsivesikud</th><th>Rasvad</th><th>Valgud</th></tr>
                        <tr><td>Nimetus siin</td><td>177</td><td>174</td><td>10</td><td>0</td><td>20</td></tr>
                        <tr><td>Veidi pikem nimetus on siin</td><td>3</td><td>14</td><td>4 304</td><td>3</td><td>1</td></tr>
                        <tr><td>Midagi veel</td><td>34</td><td>14</td><td>43</td><td>57</td><td>33</td></tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3"><div style="background-color: #dddddd; width: 250px; height: 250px;">Placeholder</div></div>
        </div>
        <div class="row paev-bottom">
            <div class="col-md-12 text-right">
                <a type="button" class="btn btn-primary" href="#">
                    <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span> Muuda
                </a>
            </div>
        </div>
    </div>
</div>