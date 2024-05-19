<?php
	if(!$action):
?>
<div class="col-md-6 append">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label"><?= $this->lang->line('district')?></label>
	  <div class="col-sm-8">
	    <?php echo form_dropdown("district_id",districtOption(),'',"id='district_id' class='form-control' required='required'"); ?>
	  </div>
	</div>
</div>

<div class="col-md-6 append">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label"><?= $this->lang->line('reg_off_name')?></label>
	  <div class="col-sm-8">
	   <?php echo form_dropdown("region_id",$region_list,'',"id='region_id' class='form-control' required='required' "); ?>
	  </div>
	</div>
</div>
<?php
	else:
?>

	<div class="col-md-6 append">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><?= $this->lang->line('district')?></label>
        <div class="col-sm-8">
          <?php echo form_dropdown("district_id",districtOption(),$array[0]->district_id,"id='district_id' class='form-control' required='required'"); ?>
        </div>
      </div>
    </div>
    <div class="col-md-6 append">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label"><?= $this->lang->line('reg_off_name')?></label>
        <div class="col-sm-8">
         <?php echo form_dropdown("region_id", $region_list, isset($region_info) ? $region_info->region_id : '',"id='region_id' class='form-control' required='required' "); ?>
        </div>
      </div>
    </div>

<?php
	endif;
?>