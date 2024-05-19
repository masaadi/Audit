 <?php

 $upazila_name = array(
    'name'  => 'upazila_name',
    'id'    => 'upazila_name',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  '',
);

  $upazila_code = array(
    'name'  => 'code',
    'id'    => 'code',
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
                  
                  <?php echo form_open_multipart('', array('id' => 'upazila_add')); ?>
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
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('upazila_name'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($upazila_name); ?>
                          </div>
                        </div>
                      </div>                     

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('code'); ?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($upazila_code); ?>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                  
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" id="submit"><?php echo $this->lang->line('save'); ?></button>
                          </div>
                    </div>
                   
                  </form>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
		
		