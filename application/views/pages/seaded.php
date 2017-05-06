<div class="container">
<h2><?php echo $title; ?></h2>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-header"><h4><?php echo $lang_account_settings; ?></h4></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_current_email; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_new_email; ?>:</p>
                </div>
                <div class="col-sm-3">
                    <label class="form-control-static" ><?php echo $user_email; ?></label>
                    <?php echo form_open('UserController/changeEmail'); ?>
					<input type="email" id="new_email" class="form-control" name="new_email">
					<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $lang_save; ?></button>
					</form>
                </div>
                <div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_current_password; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_new_password; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_repeat_password; ?>:</p>
                </div>
                <div class="col-sm-3">
					<?php echo form_open('UserController/changePassword'); ?>
                    <input type="password" id="current_password" class="form-control" name="current_password">
                    <input type="password" id="new_password" class="form-control" name="new_password">
                    <input type="password" id="newpwdrepeat" class="form-control" name="new_password_repeat">
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $lang_save; ?></button>
					</form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-header"><h4><?php echo $lang_diet_settings; ?></h4></div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_age; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_age; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_goal; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_goal; ?>:</p>
                </div>
                <div class="col-sm-3">
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_age" class="form-control" >
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_goal" class="form-control" >
                </div>
                <div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_height; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_height; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_weight; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_weight; ?>:</p>
                </div>
                <div class="col-sm-3">
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_height" class="form-control">
                    <label class="form-control-static" >bla</label>
                    <input type="email" id="new_weight" class="form-control">
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $lang_save; ?></button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>