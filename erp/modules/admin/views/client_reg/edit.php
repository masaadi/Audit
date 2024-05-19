<?php
$address = array(
  'name'  => 'address',
  'id'    => 'address',
  'class' => 'form-control',
  'placeholder'=> "",
  'rows'=> "4",
  'value' =>  $company_info->address,
);
  $language = $this->session->userdata('lang_file');
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <h2 class="add_button">
                    <button onclick="javascript:location.reload(true)" type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5" data-backdrop="static" data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i>
                        <?= $this->lang->line('back')?></button>
                </h2>
                <div class="card-body p-12">
                    <?php echo form_open_multipart('', array('id' => 'profile_edit')); ?>
                    <input type="hidden" name="id" value="<?= $company_info->id?>">
                    <p class="card-description">
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Company Name<sup class="error">*</sup></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value="<?= $company_info->company_name?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Representative Name<sup class="error">*</sup></label>
                                <input type="text" class="form-control" name="representative" id="representative" value="<?= $company_info->representative?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Phone<sup class="error">*</sup></label>
                                <input type="number" class="form-control" name="phone" minlength="11" maxlength="11" id="phone" value="<?= $company_info->phone?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">E-mail<sup class="error">*</sup></label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $company_info->email?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="">Address</label>
                                <?php echo form_textarea($address); ?>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align:center">
                            <button type="submit" class="btn btn-primary" id="edit_submit">
                                <?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </div>
                </div><!-- end col-md-6-->
            </div> <!-- end row -->
            </form>
        </div>
    </div>
</div>
