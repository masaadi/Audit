<?php
$pre_address = array(
		'name' => 'pre_address',
		'id' => 'pre_address',
		'class' => 'form-control',
		'placeholder' => "",
		'rows' => "4",
		'value' => "",
);

$per_address = array(
		'name' => 'per_address',
		'id' => 'per_address',
		'class' => 'form-control',
		'placeholder' => "",
		'rows' => "4",
		'value' => "",
);
$remarks = array(
		'name' => 'remarks',
		'id' => 'remarks',
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
					<div style="text-align:center;margin:10px;background:#f3f3f3;"><h4
								style="margin-bottom: 25px;padding-bottom: 5px;padding-top: 5px;">Employee
							Information</h4></div>
					<?php echo form_open_multipart('', array('id' => 'personal_info_add')); ?>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Teletalk ID<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="employee_id" id="employee_id"
										   value="">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Employee Name<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="employee_name" id="employee_name"
										   value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Attach Photo<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<input type="file" class="form-control file-upload" name="emp_photo" id="emp_photo"
										   value="">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Gender<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<select class="form-control" name="gender" id="gender">
										<option value="">---select---</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
										<option value="others">Others</option>
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">E-Mail</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="email" id="email" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Phone</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="phone" id="phone" value="">
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
		$(document).on('change', '.pre_division', function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url() ?>common/getDistrict",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					$('.pre_district').html(response);
				}
			});
		});

		$(document).on('change', '.pre_district', function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url() ?>common/getThana",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					$('.pre_upazila').html(response);
				}
			});
		});
	</script>

	<script type="text/javascript">
		$(document).on('change', '.per_division', function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url() ?>common/getDistrict",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					$('.per_district').html(response);
				}
			});
		});

		$(document).on('change', '.per_district', function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url() ?>common/getThana",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					$('.per_upazila').html(response);
				}
			});
		});
	</script>

	<script type="text/javascript">
		$(function () {
			$('#dob').datepicker({
				format: 'yyyy-mm-dd',
				uiLibrary: 'bootstrap4'
			});
		})
	</script>
		
