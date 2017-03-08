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
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email/kasutajanimi" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Parool" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Logi sisse</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- todo: padding-top pole hea lahendus -->
<div class="container" style="padding-top: 80px;">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <h2>Mingit juttu</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

        </div>
        <div class="col-md-6">
            <h2>Registreeru</h2>
            <form>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="text" id="inputUsername" class="form-control" placeholder="Kasutajanimi" required autofocus>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" required>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Parool" required>
                <!--<input type="password" id="inputPassword" class="form-control" placeholder="Korda parooli" required>-->
                <!--<div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>-->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Registreeru</button>
            </form>

        </div>

    </div>

    <hr>