<script src="<?php echo base_url(); ?>media/js/filterTable.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br><br>
            <h2>
                <?php
                    //echo $today . " - " . $day . ". " . $month;
                    if ($is_today) {
                        echo "<p class='text-success'>" . $day . ". " . $month . " - Täna</p>";
                    } else {
                        echo "<p>" . $day . ". " . $month . "</p>";
                    }
                ?>
            </h2>
            <a type="button" class="btn btn-primary" href="<?php echo site_url('pages/kalender'); ?>">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;Tagasi kalendrisse
            </a>
        </div>
    </div>

    <div class="paev-kast">
        <div class="row">
            <div class="col-md-12"><h4>Hommikusöök</h4></div>
            <div class="col-sm-12 col-md-6">
                <div class="table-responsive">
                    <table border="1" class="table table-striped">
                        <tr><th>Toiduaine</th><th>Kogus</th><th>Kalorid</th><th>Süsivesikud</th><th>Rasvad</th><th>Valgud</th></tr>
                        <tr><td>Nimetus siin<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td><td>177</td><td>174</td><td>10</td><td>0</td><td>20</td></tr>
                        <tr><td>Veidi pikem nimetus on siin<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td><td>3</td><td>14</td><td>4 304</td><td>3</td><td>1</td></tr>
                        <tr><td>Midagi veel<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td><td>34</td><td>14</td><td>43</td><td>57</td><td>33</td></tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Toiduainete andmebaas <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Kasuta otsinguriba, et toiduaineid filtreerida"/></div>
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

                            <!--<p>Hetkel on andmebaasis <?php foreach($ingredientCount as $count) {echo $count->ingredientCount; }?> erinevat toiduainet.</p>-->
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="q" name="quantity" placeholder="Kogus">
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-success text-right">Lisa menüüsse</a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?php echo site_url('Pages/lisa_toiduaine'); ?>" class="btn btn-default text-right">Lisa uus toiduaine</a>
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


    <!-- Sama lugu mis ülemistega, söögikord ainult teine. Mingi loop?-->
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