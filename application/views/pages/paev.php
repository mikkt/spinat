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