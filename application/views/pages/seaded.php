<div class="container">
<h2><?php echo $title; ?></h2>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading"><h4><?php echo $lang_account_settings; ?></h4></div>
        <div class="panel-body">
            <div class="row">
                <!--<div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_current_email; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_new_email; ?>:</p>
                </div> -->
                <div class="col-sm-6">
                    <table border="0" class="table">
                        <tr><td><p class="form-control-static"><?php echo $lang_current_email; ?>:</p></td><td><label class="form-control-static" ><?php echo $user_email; ?></label></td></tr>
                        <?php echo form_open('UserController/changeEmail'); ?>
                        <tr><td><p class="form-control-static"><?php echo $lang_new_email; ?>:</p></td><td><input type="email" id="new_email" class="form-control" name="new_email"></td></tr>
                        <tr><td colspan="2"><button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $lang_save; ?></button></td></tr>
                        </form>
                    </table>
                </div>
                <!--<div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_current_password; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_new_password; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_repeat_password; ?>:</p>
                </div>-->
                <div class="col-sm-6">
                    <table border="0" class="table">
                        <?php echo form_open('UserController/changePassword'); ?>
                        <tr><td><p class="form-control-static"><?php echo $lang_current_password; ?>:</p></td><td><input type="password" id="current_password" class="form-control" name="current_password"></td></tr>
                        <tr><td><p class="form-control-static"><?php echo $lang_new_password; ?>:</p></td><td><input type="password" id="new_password" class="form-control" name="new_password"></td></tr>
                        <tr><td><p class="form-control-static"><?php echo $lang_repeat_password; ?>:</p></td><td><input type="password" id="newpwdrepeat" class="form-control" name="new_password_repeat"></td></tr>
                        <tr><td colspan="2"><button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $lang_save; ?></button></td></tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><h4><?php echo $lang_diet_settings; ?></h4></div>

        <div class="panel-body">
            <div class="row">
                <!--<div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_age; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_age; ?>:</p>
					<br />
					<br />
                    <p class="form-control-static"><?php echo $lang_goal; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_goal; ?>:</p>
                </div>-->
                <div class="col-sm-6">
                    <?php echo form_open('UserController/changeAge'); ?>
                        <table border="0" class="table">
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_age; ?>:</p></td>
                                <td><label class="form-control-static" ><?php echo $user_age; ?></label></td>
                            </tr>
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_change_age; ?>:</p></td>
                                <td><input type="text" id="new_age" class="form-control" name="new_age"></td>
                            </tr>
                            <tr><td colspan="2" align="right"><button class="btn btn-primary" type="submit"><?php echo $lang_save; ?></button></td></tr>
                        </table>
                    </form>

					<?php echo form_open('UserController/changeWeightGoal'); ?>
                        <table border="0" class="table">
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_goal; ?>:</p></td>
                                <td><label class="form-control-static" ><?php echo $user_goal; ?></label></td>
                            </tr>
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_change_goal; ?>:</p></td>
                                <td><input type="text" id="new_goal" class="form-control" name="new_goal"></td>
                            </tr>
                            <tr><td colspan="2" align="right"><button class="btn btn-primary" type="submit"><?php echo $lang_save; ?></button></td></tr>
                        </table>
					</form>
                </div>
                <!--
                <div class="col-sm-3">
                    <p class="form-control-static"><?php echo $lang_height; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_height; ?>:</p>
					<br />
					<br />
                    <p class="form-control-static"><?php echo $lang_weight; ?>:</p>
                    <p class="form-control-static"><?php echo $lang_change_weight; ?>:</p>
                </div>-->
                <div class="col-sm-6">
                    <?php echo form_open('UserController/changeHeight'); ?>
                        <table border="0" class="table">
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_height; ?>:</p></td>
                                <td><label class="form-control-static" ><?php echo $user_height; ?></label></td>
                            </tr>
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_change_height; ?>:</p></td>
                                <td><input type="text" id="new_height" class="form-control" name="new_height"></td>
                            </tr>
                            <tr><td colspan="2" align="right"><button class="btn btn-primary" type="submit"><?php echo $lang_save; ?></button></td></tr>
                        </table>
                    </form>


                    <?php echo form_open('UserController/changeWeight'); ?>
                        <table border="0" class="table">
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_weight; ?>:</p></td>
                                <td><label class="form-control-static" ><?php echo $user_weight; ?></label></td>
                            </tr>
                            <tr>
                                <td><p class="form-control-static"><?php echo $lang_change_weight; ?>:</p></td>
                                <td><input type="text" id="new_weight" class="form-control" name="new_weight"></td>
                            </tr>
                            <tr><td colspan="2" align="right"><button class="btn btn-primary" type="submit"><?php echo $lang_save; ?></button></td></tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>