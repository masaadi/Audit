 <?php

 $union_name = array(
    'name'  => 'union_name',
    'id'    => 'union_name',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);

  $union_name_bn = array(
    'name'  => 'union_name_bn',
    'id'    => 'union_name_bn',
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
                      <button onclick="javascript:location.reload(true)" type="button"
                      class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
                      data-backdrop="static"
                      data-keyboard="false"><i class="fa fa-chevron-left" style='font-size:15px;color:green' aria-hidden="true"></i> <?= $this->lang->line('back')?></button>
                    </h2> 
                <div class="card-body p-5">
                  
                  <?php echo form_open_multipart('', array('id' => 'union_add')); ?>
                    <p class="card-description">
                      
                    </p> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('select_division'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('division_id', divisionOption(), '', 'id="division_id" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('select_district'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('district_id', districtOption(), '', 'id="district_id" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('select_upazila'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_dropdown('upazila_id', upazilaOption(), '', 'id="upazila_id" class="form-control"'); ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('union_name'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($union_name); ?>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('union_name_bn'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($union_name_bn); ?>
                          </div>
                        </div>
                      </div>

                    </div>
                  
                    
                    <div class="row">
                        
                        <div class="col-md-4"><button type="submit" class="btn btn-primary" id="submit"><?php echo $this->lang->line('save'); ?></button>
                          </div>
                    </div>
                   
                  </form>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
		
		