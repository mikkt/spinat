<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <h2>Mingit juttu</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>

        </div>
        <div class="col-md-6">
            <h2>Registreeru</h2>
            <?php echo form_open('UserController/createAccount'); ?>
            <label for="register_username">Kasutajanimi</label>
            <input type="text" id="register_username" class="form-control" placeholder="Kasutajanimi" name="username">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email" name="email">
            <label for="register_password">Parool</label>
            <input type="password" id="register_password" class="form-control" placeholder="Parool" name="password">
            <label for="pwdrepeat">Korda parooli</label>
            <input type="password" id="pwdrepeat" class="form-control" placeholder="Korda parooli" name="pwdrepeat">
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Registreeru</button>
            </form>

        </div>

    </div>
</div>
<?php if(validation_errors() != false): ?>
	<div class="alert alert-info">
		<strong>Info!</strong> <?php echo validation_errors();?>
	</div>
<?php endif; ?>
    <hr>