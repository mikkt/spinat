<div class="container" style="padding-top: 80px;">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <h2><?php echo $lang_text_header; ?></h2>
            <p><?php echo $lang_text_content; ?></p>

        </div>
        <div class="col-md-6">
            <h2><?php echo $title; ?></h2>
            <?php echo form_open('UserController/createAccount'); ?>
            <label for="register_username"><?php echo $lang_username; ?></label>
            <input type="text" id="register_username" class="form-control" placeholder="<?php echo $lang_username; ?>" name="username" value="<?php echo set_value('username'); ?>">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
            <label for="register_password"><?php echo $lang_password; ?></label>
            <input type="password" id="register_password" class="form-control" placeholder="<?php echo $lang_password; ?>" name="password">
            <label for="pwdrepeat"><?php echo $lang_repeat_password; ?></label>
            <input type="password" id="pwdrepeat" class="form-control" placeholder="<?php echo $lang_repeat_password; ?>" name="pwdrepeat">
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $title; ?></button>
            </form>

        </div>

    </div>
</div>
<?php if(validation_errors() != false): ?>
	<br />
	<div class="alert alert-info">
		<strong>Info!</strong> <?php echo validation_errors();?>
	</div>
<?php endif; ?>
    <hr>