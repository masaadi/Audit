<h5 class="font-weight-light" style="text-align: center;"><?= $this->lang->line('change_password')?></h5>
<p id='not_send_msg' class='alert alert-danger d-none'></p>
<p id='success_msg' class='alert alert-success d-none'></p>
<form class="pt-3 mt-3">
    <div class="form-group">
        <input type="text" name="otp" required autofocus class="form-control form-control-sm" id="otp" placeholder="<?= $this->lang->line('otp')?>">
    </div>
    <div class="form-group">
        <input type="password" name="new_password" required autofocus class="form-control form-control-sm" id="new_password" placeholder="<?= $this->lang->line('new_password')?>">
    </div>
    <div class="form-group">
        <input type="password" name="confirm_password" required autofocus class="form-control form-control-sm" id="confirm_password" placeholder="<?= $this->lang->line('confirm_new_password')?>">
    </div>
    <div class="mt-3">
        <input type="button" onclick="change_pass()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="<?= $this->lang->line('save')?>"/>
    <a class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn" href="<?php echo base_url();?>siteadmin/login"><?= $this->lang->line('signin')?></a>
    </div>
</form>