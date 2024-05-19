<h5 class="font-weight-light" style="text-align: center;"><?= $this->lang->line('forget_password')?></h5>
<p id='not_send_msg' class='alert alert-danger d-none'></p>
<form class="pt-3 mt-3">
    <div class="form-group">
    <input type="text" name="mobile" required autofocus class="form-control form-control-sm" id="mobile" placeholder="<?= $this->lang->line('enter_mobile_no')?>">
    </div>
   
    <div class="mt-3">
        <input type="button" onclick="send_otp()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="<?= $this->lang->line('send')?>"/>
        <a class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn" href="<?php echo base_url();?>siteadmin/login"><?= $this->lang->line('signin')?></a>
    </div>
</form>