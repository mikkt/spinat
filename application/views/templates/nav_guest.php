<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('pages'); ?>">Spinat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php echo validation_errors(); ?>
            <?php echo form_open('UserController/verifyLogin'); ?>
            <div class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Kasutajanimi" class="form-control" size="30" id="username" name="username"/>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Parool" class="form-control" id="password" name="password"/>
                </div>
                <input type="submit" class="btn btn-success" value="Logi sisse"/>
            </div>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>