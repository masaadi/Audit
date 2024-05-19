<?php
 $first_name = array(
    'name'  => 'first_name',
    'id'    => 'first_name',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);
$last_name = array(
    'name'  => 'last_name',
    'id'    => 'last_name',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);
$username = array(
    'name'  => 'username',
    'id'    => 'username',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
    'style' => 'padding-left: 0px; border-left: none',
);
$user_prefixe = array(
    'name'  => 'user_prefixe',
    'id'    => 'user_prefixe',
    'class' => 'form-control text-right',
    'placeholder'=> "",
    'value' =>  '',
    'readonly' => 'readonly',
    'style' => 'padding-right: 0px; border-right: none',
);
$email = array(
    'type'  => 'email',
    'name'  => 'email',
    'id'    => 'email',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);
$password = array(
    'type'  => 'password',
    'name'  => 'password',
    'id'    => 'password',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);
$confirm_password = array(
    'type'  => 'password',
    'name'  => 'confirm_password',
    'id'    => 'confirm_password',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);
?>
<div class="content-wrapper">    
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <h2 class="add_button">
          <button onclick="javascript:location.reload(true)" type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
                data-backdrop="static"
                data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> <?= $this->lang->line('back')?>
          </button>
        </h2> 
        <div class="card-body p-5">
          <?php echo form_open_multipart('', array('id' => 'user_add')); ?>
            <p class="card-description">
              
            </p>
            <div class="row">
              <div class="col-md-6">
                <div class="row">

    					    <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('usertype')?></label>
                      <div class="col-sm-8">
                        <?php echo form_dropdown("role_id",getRoles(),'',"id='role_id' class='form-control'"); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('first_name')?></label>
                      <div class="col-sm-8">
                        <?php echo form_input($first_name); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('last_name')?></label>
                      <div class="col-sm-8">
                        <?php echo form_input($last_name); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('username')?></label>
                      <div class="col-sm-3" style="padding-right: 0px;">
                        <?php echo form_input($user_prefixe); ?>
                      </div>
                      <div class="col-sm-5" style="padding-left: 0px;">
                        <?php echo form_input($username); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('password')?></label>
                      <div class="col-sm-8">
                        <?php echo form_input($password); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('confirm')." ".$this->lang->line('password')?></label>
                      <div class="col-sm-8">
                        <?php echo form_input($confirm_password); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('email')?></label>
                      <div class="col-sm-8">
                        <?php echo form_input($email); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('current_status')?></label>
                      <div class="col-sm-8">
                        <?php echo form_dropdown("status_id",array(1 => 'Active', 0 => 'Inactive'),'',"id='status_id' class='form-control'"); ?>
                      </div>
                    </div>
                  </div>

                </div> 
                

              </div><!-- end of col-md-6 --> 
              <div class="col-md-6">
                <?php $empty_module = false; ?>
                <?php if($privileges): ?>
                  <div class="checkbox">
                    <label><input type="checkbox" class="all_check" id="all_check" value=""> All</label>
                  </div>
                <?php   foreach($privileges as $k => $v): ?>
                          <?php if($k != ''): ?>
                            <div class="checkbox" style="padding-left: 20px;">
                              <label><input type="checkbox" class="module_check <?php echo strtolower(str_replace(' ','_', $k)); ?>" value=""> <?php echo $k; ?></label>
                            </div> <!-- module name -->
                            <?php foreach($v as $k1 => $v1): ?>

                              <div class="checkbox" style="padding-left: 40px;">
                                <label><input type="checkbox" class="<?php echo strtolower(str_replace(' ','_', $k)); ?> menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
                              </div>

                            <?php endforeach; ?>
                          <?php else: ?>
                            <?php $empty_module = true; ?>
                          <?php endif; ?>
                <?php   endforeach; ?>
                  <?php if($empty_module): ?>
                    <?php foreach($privileges[''] as $k1 => $v1): ?>

                      <div class="checkbox" style="padding-left: 20px;">
                        <label><input type="checkbox" class="menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
                      </div>

                    <?php endforeach; ?>
                  <?php endif; ?>
                <?php endif; ?>
              </div> 
            </div>
            <div class="row">
              <div class="col-md-8">
                  <div class="form-group row">
                    <!-- <label class="col-sm-4 col-form-label"></label> -->
                    <div class="col-sm-8">                
                      <button type="submit" class="btn btn-primary" id="submit">
                        <?= $this->lang->line('save')?>
                      </button>
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
		
		