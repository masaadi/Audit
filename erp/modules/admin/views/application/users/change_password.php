

<div class='form-group'>
    <label><?= $this->lang->line('enter_new_password') ?></label>
    <input type="password" name="password" value="123456" id='password' class="form-control">
</div>
<div class='form-group text-right'>
    <button onclick="change_password_submit(<?= $posts[0]['id'] ?>)" class='btn btn-primary btn-sm'><?= $this->lang->line('change') ?></button>
</div>



<script>



</script>
