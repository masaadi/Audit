 <?php
 $fiscal_year = array(
    'name'  => 'fiscal_year',
    'id'    => 'fiscal_year',
    'class' => 'form-control',
     'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->fiscal_year,
);
$fiscal_year_bn = array(
    'name'  => 'fiscal_year_bn',
    'id'    => 'fiscal_year_bn',
    'class' => 'form-control',
    'placeholder'=> "",
    'required'=>"required",
    'value' =>  $array[0]->fiscal_year_bn,
);

$from_date = array(
    'name' => 'from_date',
    'id' => 'from_date',
    'class' => 'form-control date',
    'value' => $array[0]->from_date,
);

$to_date = array(
    'name' => 'to_date',
    'id' => 'to_date',
    'class' => 'form-control date',
    'value' => $array[0]->to_date,
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
                  
                  <?php echo form_open_multipart('', array('id' => 'fiscal_year_edit')); ?>
                    <p class="card-description">
                      <input type="hidden" name="id" value="<?php echo $array[0]->id ?>" />
					             <input type="hidden" name="page_no" value="<?php echo $count1;?>"/>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('fiscal_year'); ?> <b style="color: red;">*</b> </label>
                          <div class="col-sm-8">
                            <?php echo form_input($fiscal_year); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('fiscal_year_bn'); ?><b style="color: red;">*</b> </label>
                          <div class="col-sm-8">
                            <?php echo form_input($fiscal_year_bn); ?>
                          </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label class="col-form-label"><?php echo $this->lang->line('from_date'); ?> <b style="color: red;">*</b></label>
                      </div>
                      <div class="col-md-4">
                        <?php echo form_input($from_date); ?>
                      </div>
                      <div class="col-md-2">
                        <label class="col-form-label"><?php echo $this->lang->line('to_date'); ?><b style="color: red;">*</b></label>
                      </div>
                      <div class="col-md-4">
                        <?php echo form_input($to_date); ?>
                      </div>
                    </div>   
                    <br>                  
                    
                    <div class="row">                        
                        <div class="col-md-4">
								          <button type="submit" class="btn btn-primary" id="edit_submit"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </div>
                   
                  </form>

                  

                </div>
              </div>
            </div>
          </div>
          
        </div>
<script type="text/javascript">
  
  // $('#from_date').datepicker();

  $('#from_date').datepicker({
      uiLibrary: 'bootstrap',
      format: 'yyyy-mm-dd'
  });

  $('#to_date').datepicker({
      uiLibrary: 'bootstrap',
      format: 'yyyy-mm-dd'
  });

</script>
		