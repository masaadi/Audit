<?php
$remarks = array(
		'name' => 'responsibility',
		'id' => 'responsibility',
		'class' => 'form-control',
		'placeholder' => "",
		'rows' => "4",
		'value' => "",
);
?>
<style type="text/css">
	.file-upload {
		padding: 4px 0px 0px 4px;
	}
</style>
<div class="content-wrapper">

	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<h2 class="add_button">
					<button onclick="javascript:location.reload(true)" type="button"
							class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
							data-backdrop="static"
							data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green'
													 aria-hidden="true"></i> <?= $this->lang->line('back') ?></button>
				</h2>
				<div class="card-body p-5">
					<?php echo form_open_multipart('', array('id' => 'personal_info_add')); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Teletalk ID<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="employee_id" id="employee_id" value=""
										   onblur="get_emp()">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Employee Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="employee_name" id="employee_name"
										   value="" readonly>
								</div>
							</div>
						</div>
					</div>


					<div style="text-align:center;margin:10px;background:#f3f3f3;"><h4
								style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Joining Job
							Information</h4></div>


					<div class="row">

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Joining Date<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="joining_date" id="joining_date"
										   value="" readonly>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Department Name</label>
								<div class="col-sm-8">
									<?php echo form_dropdown('joining_office', office(), '', 'id="joining_office" class="form-control"'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<?php echo form_dropdown('joining_desig', getOptionDesignation(), '', 'id="joining_desig" class="form-control"'); ?>
								</div>
							</div>
						</div>

					</div>

					<div style="text-align:center;margin:10px;background:#f3f3f3;"><h4
								style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Current Job
							Information</h4></div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Joining Date</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="current_joining" id="current_joining"
										   value="" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Department Name</label>
								<div class="col-sm-8">
									<?php echo form_dropdown('current_office', office(), '', 'id="current_office" class="form-control"'); ?>
								</div>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Designation<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<?php echo form_dropdown('cuurent_desig', getOptionDesignation(), '', 'id="cuurent_desig" class="form-control"'); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label"></label>
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary" id="submit">
										<?= $this->lang->line('save') ?></button>
								</div>
							</div>
						</div>
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function get_emp() {
		var emp_id = $('#employee_id').val();
		$.ajax({
			type: "Post",
			url: "<?php echo base_url() ?>hr/job_info/get_emp/" + emp_id,
			dataType: "JSON",
			success: function (result) {
				$('#employee_name').val(result.employee_name);
				$('#login_id').val(emp_id);
			}
		});
	}
</script>

<script type="text/javascript">
	$(function () {
		$('#joining_date').datepicker({
			format: 'yyyy-mm-dd',
			uiLibrary: 'bootstrap'
		});

		$('#current_joining').datepicker({
			format: 'yyyy-mm-dd',
			uiLibrary: 'bootstrap'
		});

		$('#prl_date').datepicker({
			format: 'yyyy-mm-dd',
			uiLibrary: 'bootstrap'
		});
	})
</script>


