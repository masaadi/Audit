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


<div class="content-wrapper">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="">User<sup class="error">*</sup></label>
                <select class="form-control" id="user_list">
                    <option>--select--</option>
                    <?php foreach($users as $user):?>
                        <option value="<?php echo $user->id;?>">
                            <?php echo $user->full_name;?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="privilege">
            <div class="col-md-12" id="user_privilege">
                        
                        <?php $empty_module = false; ?>
                        <?php if($privileges): ?>
                          <div class="checkbox">
                            <label><input type="checkbox" class="all_check" id="all_check" value=""> All</label>
                          </div>
                        <?php   foreach($privileges as $k => $v): ?>
                                  <?php if($k != ''): ?>
                                    <div class="checkbox" style="padding-left: 20px;">
                                      <label><input type="checkbox" class="module_check <?php echo strtolower(str_replace(' ','_', str_replace('&','', str_replace('.','', $k)))); ?>" value=""> <?php echo $k; ?></label>
                                    </div> <!-- module name -->
                                    <?php foreach($v as $k1 => $v1): ?>

                                      <div class="checkbox" style="padding-left: 40px;">
                                        <label><input type="checkbox" class="<?php echo strtolower(str_replace(' ','_', str_replace('&','', str_replace('.','', $k)))); ?> menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" /> <?php echo ($this->session->userdata("lang_file")=='bn') ?$v1['menu_name_bn'] : $v1['menu_name']; ?></label>
                                      </div>

                                    <?php endforeach; ?>
                                  <?php else: ?>
                                    <?php $empty_module = true; ?>
                                  <?php endif; ?>
                        <?php   endforeach; ?>
                          <?php if($empty_module): ?>
                            <?php foreach($privileges[''] as $k1 => $v1): ?>

                              <div class="checkbox" style="padding-left: 20px;">
                                <label><input type="checkbox" class="menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1['menu_name_bn'] : $v1['menu_name']; ?></label>
                              </div>

                            <?php endforeach; ?>
                          <?php endif; ?>
                        <?php endif; ?>

                      </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#user_list").select2({});
</script>

<script type="text/javascript">
$('#user_list').change(function() {
    var id = $('#user_list').val();
    // alert(id)
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/privilege/edit/' + id,
        beforeSend: function() {
            $('.crud_load').show()
        },
        complete: function() {
            $('.crud_load').hide();
        },
        success: function(result) {
            if (result) {                
                $('#privilege').html(result);
                return false;
            } else {
                return false;
            }
        }
    });
    return false;
});
</script>