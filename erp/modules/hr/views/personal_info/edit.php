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
					<?php echo form_open_multipart('', array('id' => 'personal_info_edit')); ?>
					<input type="hidden" name="id" value="<?= $employee->id; ?>">
					<div class="row">

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Teletalk ID<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="employee_id" id="employee_id"
										   value="<?= $employee->employee_id; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Employee Name<sup class="error">*</sup></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="employee_name" id="employee_name"
										   value="<?= $employee->employee_name; ?>">
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
										<option value="male" <?php if ($employee->gender == 'male') {
											echo "selected";
										} ?> >Male
										</option>
										<option value="female" <?php if ($employee->gender == 'female') {
											echo "selected";
										} ?> >Female
										</option>
										<option value="others" <?php if ($employee->gender == 'others') {
											echo "selected";
										} ?> >Others
										</option>
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">E-Mail</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="email" id="email"
										   value="<?= $employee->email; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Phone</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="phone" id="phone"
										   value="<?= $employee->phone; ?>">
								</div>
							</div>
						</div>


					<div class="row">
						<div class="col-md-4">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label"></label>
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary" id="edit_submit">Update</button>
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
	$(function () {
		$('#dob').datepicker({
			format: 'yyyy-mm-dd',
			uiLibrary: 'bootstrap4'
		});
	})
</script>
    
