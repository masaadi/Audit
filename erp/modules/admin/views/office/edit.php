 <?php
 $office_name = array(
    'name'  => 'office_name',
    'id'    => 'office_name',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->office_name,
);

$address = array(
    'name'  => 'address',
    'id'    => 'address',
    'class' => 'form-control',
     'placeholder'=> "",    
    'value' =>  $array[0]->address,
    'required'=>"required",
);

$contact_no = array(
    'name'  => 'contact_no',
    'id'    => 'contact_no',
    'class' => 'form-control',
     'placeholder'=> "",   
    'value' =>  $array[0]->contact_no,
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
                  
                  <?php echo form_open_multipart('', array('id' => 'office_edit')); ?>
                    <p class="card-description">
                      <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
					  <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
                    </p>
                    <div class="row">



					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?= $this->lang->line('office_name')?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($office_name); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?= $this->lang->line('address')?></label>
                          <div class="col-sm-8">
                           <?php echo form_input($address); ?>
                          </div>
                        </div>
                      </div>
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?= $this->lang->line('contact_no')?></label>
                          <div class="col-sm-8">
                            <?php echo form_input($contact_no); ?>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>

					          <!-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?//= $this->lang->line('reg_off_name')?></label>
                          <div class="col-sm-8">
                           <?php //echo form_input($regional_office_name); ?>
                          </div>
                        </div>
                      </div>
					            <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?//= $this->lang->line('reg_off_name_bn')?></label>
                          <div class="col-sm-8">
                           <?php //echo form_input($regional_office_name_bn); ?>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label"></label>
                              <div class="col-sm-8">
                                
								
								 <button type="submit" class="btn btn-primary" id="edit_submit">
        Update</button>
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
		
		