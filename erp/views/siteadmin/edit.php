<?php

$office_id = array(
    'name' => 'office_id',
    'id' => 'office_id',
    'class' => 'form-control',
    'required' => "required",
    'value' => $office[0]->OFFICE_ID,
);
$office_name = array(
    'name' => 'office_name',
    'id' => 'office_name',
    'class' => 'form-control',
    'placeholder' => "",
    'required' => "required",
    'value' => $office[0]->OFFICE_NAME,
);

$office_name_bn = array(
    'name' => 'office_name_bn',
    'id' => 'office_name_bn',
    'class' => 'form-control',
    'placeholder' => '',
    'required' => 'required',
    'value' => $office[0]->OFFICE_NAME_BN,
);

$latitude = array(
    'name' => 'latitude',
    'id' => 'latitude',
    'class' => 'form-control',
    'placeholder' => '',   
    'value' => $office[0]->LATITUDE,
);

$longitude = array(
    'name' => 'longitude',
    'id' => 'longitude',
    'class' => 'form-control',
    'placeholder' => '',   
    'value' => $office[0]->LONGITUDE,
);

$sorting_order = array(
    'name' => 'sorting_order',
    'id' => 'sorting_order',
    'class' => 'form-control',
    'placeholder' => '',   
    'value' => $office[0]->SORTING_ORDER,
);
$office_address = array(
  'name' => 'office_address',
  'id' => 'office_address',
  'class' => 'form-control',
  'rows' => '2',   
  'value' => $office[0]->OFFICE_ADDRESS,
);
$office_address_bn = array(
  'name' => 'office_address_bn',
  'id' => 'office_address_bn',
  'class' => 'form-control',
  'rows' => '2',   
  'value' => $office[0]->OFFICE_ADDRESS_BN,
);

?>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
        class="sr-only">Close</span></button>
        <h4 class="modal-title" id="defaultModalLabel"><?= $this->lang->line('edit_office') ?></h4>
        <p class="text-center error" id="error_msg"></p>
    </div>
    <?php echo form_open_multipart('', array('id' => 'office_add')); ?>
    <input type="hidden" name="id" value="<?php echo $office[0]->ID ?>"/>
    <div class="modal-body">
        <div class="row clearfix">
            <div class="col-sm-12">
                <label for="" class="req"><?php echo $this->lang->line('wing');?></label>
                <?PHP echo form_dropdown("wing_id",getOptionWing(), $office[0]->WING_ID, "class='form-control'");?>

            </div>
        </div>
        <br>
        <div class="row clearfix">
            <div class="col-sm-12">
                <label for="" class="req"><?php echo $this->lang->line('office_type');?></label>
                <?PHP echo form_dropdown("office_type_id",getOptionOfficeType(), $office[0]->OFFICE_TYPE_ID, "class='form-control'");?>

            </div>
        </div>
        <br>
        <!--        <div class="row clearfix">-->
            <!--            <div class="col-sm-12">-->
                <!--               <label class="req"> --><?php //= $this->lang->line('office_id') ?><!--</label>-->
                <!--                --><?php //echo form_input($office_id); ?>
                <!---->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <br>-->

                <div class="row clearfix">
                    <div class="col-sm-12">
                        <label class="req"><?= $this->lang->line('office_name') ?></label>    
                        <?php echo form_input($office_name); ?>

                    </div>
                </div>
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12">
                      <label class="req"> <?= $this->lang->line('office_name_bn') ?></label> 
                      <?php echo form_input($office_name_bn); ?>

                  </div>
              </div>
              <br>
              <div class="row clearfix">
                <div class="col-sm-12">
                    <label for="" class="req"><?php echo $this->lang->line('office_category');?></label>
                    <?PHP echo form_dropdown("category_id",getOfficeCategory(), $office[0]->CATEGORY_ID, "class='form-control'");?>

                </div>
            </div>

            <br>
            <div class="row clearfix">

              <div class="col-sm-12">
                  <label for="" class="req"><?php echo $this->lang->line('district');?></label>
                  <?php echo form_dropdown('district_pre', getOptionDistrict(), $office[0]->DISTRICT_ID, 'class="form-control" id="district_pre"'); ?>

              </div>
          </div>

          <br>
          <div class="row clearfix">
              <div class="col-sm-12">
                  <label for="" class="req"><?php echo $this->lang->line('thana');?></label>

                  <div id="get_th_pre">
                     <?php echo form_dropdown('thana_pre', getAllOptionthanaByDistrict($office[0]->DISTRICT_ID), $office[0]->UPAZILLA_ID, 'class="form-control" id="thana_pre"'); ?>
                 </div>
             </div>
         </div>
         <br>
         <div class="row clearfix">

            <div class="col-sm-12">
                <label for="" class=""><?php echo $this->lang->line('latitude');?></label>
                <?php echo form_input($latitude); ?>

            </div>
        </div>
        <br>
        <div class="row clearfix">

            <div class="col-sm-12">
                <label for="" class=""><?php echo $this->lang->line('longitude');?></label>
                <?php echo form_input($longitude); ?>

            </div>
        </div>


        <br>
        <div class="row clearfix">

            <div class="col-sm-12">
                <label for="" class=""><?php echo $this->lang->line('sorting_order');?></label>
                <?php echo form_input($sorting_order); ?>

            </div>
        </div>
        <br>
        <div class="row clearfix">
          <div class="col-sm-12">
              <label for="" class="req"><?php echo $this->lang->line('area');?></label>
              <div id="get_th_pre">
                <?php echo form_dropdown('area_id', getOptionArea(), $office[0]->AREA_ID, 'class="form-control" id="area_id"'); ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row clearfix">
        <div class="col-sm-12">
          <label for="" class="req"><?php echo $this->lang->line('office_address');?></label>
          <div id="get_th_pre">
            <?php echo form_textarea($office_address); ?>
        </div>
    </div>
</div>
<br>
<div class="row clearfix">
    <div class="col-sm-12">
      <label for="" class="req"><?php echo $this->lang->line('office_address_bn');?></label>
      <div id="get_th_pre">
        <?php echo form_textarea($office_address_bn); ?>
    </div>
</div>
</div>


</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-success" id="submit"> <?= $this->lang->line('update') ?></button>
    <button type="button" class="btn btn-default " data-dismiss="modal"><?php echo $this->lang->line('cancel') ?></button>
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



