<?php
 $first_name = array(
    'name'  => 'first_name',
    'id'    => 'first_name',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->first_name,
);
$last_name = array(
    'name'  => 'last_name',
    'id'    => 'last_name',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->last_name,
);
$u_pre_exist = $array[0]->user_prefixe;
$username_o = $array[0]->username;
if($u_pre_exist){
  $username_o = str_replace($array[0]->user_prefixe, "", $username_o);
}else{
  // if($array[0]->role_id==1){
  //   $u_pre_exist = "AP";
  //   $("#user_prefixe").val("AD");
  // }
  // elseif($array[0]->role_id==2){
  //   $u_pre_exist = "AP";
  // }
  // elseif($array[0]->role_id==3){
  //   $u_pre_exist = "EP";
  // }
  if($array[0]->role_id==4){
    $u_pre_exist = "IS";
  }
  else{
    $u_pre_exist = "";
  }
}
$username = array(
    'name'  => 'username',
    'id'    => 'username',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  $username_o,
    'style' => 'padding-left: 0px; border-left: none;',
);
$user_prefixe = array(
    'name'  => 'user_prefixe',
    'id'    => 'user_prefixe',
    'class' => 'form-control text-right',
    'placeholder'=> "",
    'value' =>  $u_pre_exist,
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
    'value' =>  $array[0]->email,
);
$password = array(
    'type'  => 'password',
    'name'  => 'password',
    'id'    => 'password',
    'class' => 'form-control',
    'placeholder'=> "",
    'value' =>  '',
);
$confirm_password = array(
    'type'  => 'password',
    'name'  => 'confirm_password',
    'id'    => 'confirm_password',
    'class' => 'form-control',
    'placeholder'=> "",
    'value' =>  '',
);
?>

<div class="content-wrapper">    
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <h2 class="add_button">
          <button onclick="javascript:location.reload(true)" type="button"
            class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
            data-backdrop="static"
            data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> <?= $this->lang->line('back')?>
          </button>
        </h2> 
        <div class="card-body p-5">
          <?php echo form_open_multipart('', array('id' => 'user_edit')); ?>
            <p class="card-description">
              <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
              <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
            </p>
            <div class="row">
              <div class="col-md-6">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('usertype')?></label>
                      <div class="col-sm-8">
                        <?php echo form_dropdown("role_id",getRoles(),$array[0]->role_id,"id='role_id' class='form-control'"); ?>
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
                      <label class="col-sm-4 col-form-label"><?= $this->lang->line('confirm')." ".$this->lang->line('confirm_password')?></label>
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
                        <?php echo form_dropdown("status_id", array(1 => 'Active', 0 => 'Inactive'),$array[0]->status_id,"id='role_id' class='form-control'"); ?>
                      </div>
                    </div>
                  </div>

                </div> 

              </div><!-- end of col-md-6 -->  
              <div class="col-md-6">
                <?php $empty_module = false; ?>
                <?php if($privileges): ?>
                  <div class="checkbox">
                    <label><input type="checkbox" class="all_check" id="all_check" value="" <?php if($all_check_res==true): ?>checked<?php endif;?> /> All</label>
                  </div>
                <?php foreach($privileges as $k => $v): ?>
                        <?php if($k != ''): ?>
                        <?php 
                          $explode_key = explode('~', $k); 
                          $k = $explode_key[0];
                          $m_id = $explode_key[1];
                        ?>
                          <div class="checkbox" style="padding-left: 20px;">
                            <label><input type="checkbox" class="module_check <?php echo strtolower(str_replace(' ','_', $k)); ?>" value="" <?php if(in_array($m_id, $cur_pvlg['module'])):;?>checked<?php endif;?> /> <?php echo $k; ?></label>
                          </div> <!-- module name -->
                          <?php foreach($v as $k1 => $v1): ?>

                            <div class="checkbox" style="padding-left: 40px;">
                              <label><input type="checkbox" class="<?php echo strtolower(str_replace(' ','_', $k)); ?> menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" <?php if(in_array($v1['id'], $cur_pvlg['menu'])):;?>checked<?php endif;?> /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
                            </div><!-- menu name -->

                          <?php endforeach; ?>
                        <?php else: ?>
                          <?php $empty_module = true; ?>
                        <?php endif; ?>
                <?php endforeach; ?>

                  <?php if($empty_module): ?>
                    <?php foreach($privileges[''] as $k1 => $v1): ?>

                      <div class="checkbox" style="padding-left: 20px;">
                        <label><input type="checkbox" class="menu_check" name="menu_ck_id[]" value="<?php echo base64_encode($v1['id']."~".$v1['module_id']) ;?>" <?php if(in_array($v1['id'], $cur_pvlg['menu'])):;?>checked<?php endif;?> /> <?php echo ($this->session->userdata("lang_file")=='bn') ? $v1->menu_name_bn : $v1['menu_name']; ?></label>
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
		
		