 <?php
 $type_name = array(
    'name'  => 'type_name',
    'id'    => 'type_name',
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
                  
                  <?php echo form_open_multipart('', array('id' => 'type_name_add')); ?>
                    <p class="card-description">
                      
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Employee Type<sup class="error">*</sup></label>
                          <div class="col-sm-8">
                            <?php echo form_input($type_name); ?>
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
		
		