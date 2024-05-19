<?php
$old_password = array(
  'name' => 'old_password',
  'id' => 'old_password',
  'class' => 'form-control', 
  'value' => set_value('old_password'),
);
$new_password = array(
  'name' => 'new_password',
  'id' => 'new_password',
  'class' => 'form-control', 
  'value' => set_value('new_password'),
);
$confirm_new_password = array(
  'name' => 'confirm_new_password',
  'id' => 'confirm_new_password',
  'class' => 'form-control',
  'rows' => '2',   
  'value' => set_value('confirm_new_password'),
);

?>
<?php echo form_open_multipart('/siteadmin/change_password', array('id' => 'office_add')); ?>

<input type="hidden" name="id" value="" />
<div class="modal-body">
  <div class="row clearfix">

    <div class="col-sm-12">
      <label for="" class="req"><?php echo $this->lang->line('old_password');?></label>
     <?php echo form_password($old_password); ?>

   </div>
 </div>
 <br>
 <div class="row clearfix">

  <div class="col-sm-12">
    <label for="" class="req"><?php echo $this->lang->line('new_password');?></label>
    <?php echo form_password($new_password); ?>

  </div>
</div>
<br>
<div class="row clearfix">

  <div class="col-sm-12">
    <label for="" class="req"><?php echo $this->lang->line('confirm_new_password');?></label>
    <?php echo form_password($confirm_new_password); ?>

  </div>
</div>
<br>
</div>

<div class="modal-footer">
  <button type="submit" class="btn btn-success" id="submit">
    <?php echo $this->lang->line('save') ?></button>
    <button type="button" class="btn btn-default " data-dismiss="modal"> <?php echo $this->lang->line('cancel') ?></button>
  </div>
  <?php echo form_close(); ?>


  <script>

    //    $('.date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    $(function () {
      $('body').on('change', '#freedom_fighter', function () {
        var id = $(this).val();
        if (id == 1) {
          $('#deep').show();
        } else {
          $('#deep').hide();
        }
      });
      $('body').on('change', '#free_type', function () {
        var id = $(this).val();
        if (id == 2) {
          $('#relation').show();
        } else {
          $('#relation').hide();
        }
      });
      $("#district_pre").change(function () {
        var district_id = $(this).val();

        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>common/getPreThana",
          data: {
            district_id: district_id
          },
          success: function (html) {
            $("#get_th_pre").html(html);
          },
          error: function (data) {
          }
        });
      });
      $("#district_per").change(function () {
        var district_id = $(this).val();

        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>common/getPerThana",
          data: {
            district_id: district_id
          },
          success: function (html) {
            $("#get_th_per").html(html);
          },
          error: function (data) {
          }
        });
      });
    })
  </script>
