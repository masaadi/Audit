<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
		class="sr-only">Close</span></button>
	</div>
	<div class="modal-body center">

		<i class="fas fa-exclamation-triangle col-orange font-50"></i>
		<?php if($single_record[0]->STATUS == 1 ){ ?>
			<h5>Are you sure you want to <span class="changestatus">Inactive</span> the record?</h5>
		<?php } else { ?>
			<h5>Are you sure you want to <span class="changestatus">Active</span> the record?</h5>
		<?php } ?>

		<input type="hidden" id="delete_id" value="<?php echo $single_record[0]->ID; ?>">
		<input type="hidden" id="office_status" value="<?php echo $single_record[0]->STATUS; ?>" >

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-link bg-grey waves-effect " data-dismiss="modal"><?php echo $this->lang->line('no') ?></button>
		<button type="button" class="btn btn-link bg-red waves-effect" onclick="delete_type();"><?php echo $this->lang->line('yes') ?>!</button>

	</div>