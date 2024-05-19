<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php  
$user_prefixe = array(
    'name'  => 'user_prefixe',
    'id'    => 'user_prefixe',
    'class' => 'form-control text-right',
    'placeholder'=> "",
    'value' =>  '',
    'readonly' => 'readonly',
    'style' => 'padding-right: 0px; border-right: none',
);
?>
<?php
  $language = $this->session->userdata('lang_file');
?>
<style type="text/css">
</style>
<div class="col-md-12" id="user_privilege">
<?php echo form_open_multipart('', array('id' => 'edit_submit')); ?>
    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
    <?php $empty_module = false; ?>
    <?php if($privileges): ?>
    <div class="checkbox">
        <label><input type="checkbox" class="all_check" id="all_check" value="" <?php if($all_check_res==true): ?>checked
            <?php endif;?> /> All</label>
    </div>
    <?php foreach($privileges as $k => $v): ?>
    <?php if($k != ''): ?>
    <?php 
        $explode_key = explode('~', $k); 
        $k = $explode_key[0];
        $m_id = $explode_key[1];
        ?>
    <div class="checkbox" style="padding-left: 20px;">
        <label><input type="checkbox" class="module_check <?php echo strtolower(str_replace(' ','_', str_replace('&','', str_replace('.','', $k)))); ?>" value="" <?php if(in_array($m_id, $cur_pvlg['module'])):;?>checked
            <?php endif;?> />
            <?php echo $k; ?></label>
    </div> <!-- module name -->
    <?php foreach($v as $k1 => $v1): ?>
    <div class="checkbox" style="padding-left: 40px;">
        <label><input type="checkbox" class="<?php echo strtolower(str_replace(' ','_', str_replace('&','', str_replace('.','', $k)))); ?> menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']." ~".$v1['module_id']) ;?>"
            <?php if(in_array($v1['id'], $cur_pvlg['menu'])):;?>checked
            <?php endif;?> />
            <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1['menu_name_bn'] : $v1['menu_name']; ?></label>
    </div><!-- menu name -->
    <?php endforeach; ?>
    <?php else: ?>
    <?php $empty_module = true; ?>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php if($empty_module): ?>
    <?php foreach($privileges[''] as $k1 => $v1): ?>
    <div class="checkbox" style="padding-left: 20px;">
        <label><input type="checkbox" class="menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']." ~".$v1['module_id']) ;?>"
            <?php if(in_array($v1['id'], $cur_pvlg['menu'])):;?>checked
            <?php endif;?> />
            <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1['menu_name_bn'] : $v1['menu_name']; ?></label>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-4"> 
          <button type="submit" class="btn btn-primary" id="submit"><?php echo $this->lang->line('save'); ?></button>
    </div>
  </div>
    </form>
</div>
<script type="text/javascript">
$(function() {

    $(document).on("click", "#all_check", function() {
        // $('input:checkbox').not(this).prop('checked', this.checked);
        $('.menu_check').not(this).prop('checked', this.checked);
        $('.module_check').not(this).prop('checked', this.checked);
    });

    $(document).on("click", ".module_check", function() {
        var all_class = this.className.split(' ');
        var class1 = all_class[1];
        if ($(this).prop('checked') == true) {
            $('.' + class1).prop('checked', this.checked);
        } else if ($(this).prop('checked') == false) {
            $('.' + class1).prop('checked', false);
        }

    });

});
</script>


<script type="text/javascript">
    $(function () {
    $('body').on('click', '#edit_submit', function () {
      $('#edit_submit').validate({
        rules: {
            'menu_ck_id[]': {
              required: true
            },           
          },
          messages: {      
            'menu_ck_id[]' : {
              required: 'At least one menu selection is required',
            },
          },

          submitHandler: function (form) {
            $("label.error").remove();
            var frm = $('#edit_submit');
            var form = $(this);
            //debugger;
            var currentForm = $('#edit_submit')[0];
            var formData = new FormData(currentForm); 

              $.ajax({
                url: "<?php echo base_url() ?>admin/privilege/update",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                  success: function (response) {
                    window.location.href = "<?php echo base_url() ?>admin/privilege" 
                  }

                });


              }
          });
    });
  });
</script>