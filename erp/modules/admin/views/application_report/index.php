<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body dashboard-tabs p-0">
          
              <div class="d-flex flex-wrap justify-content-xl-between">
               
                <div class="row">
                  <div class="col-md-12">
                    <div class="card pt-2">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <h4 class="pb-1 text-left"><?= $this->lang->line('application_report')?></h4>
                          </div>
                        </div>
                        <?php $language = $this->session->userdata('lang_file'); ?>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('report_for')?></label>
                              <select class="form-control" name="report_for" id="report_for">
                                <option value=""><?= ($language=='bn') ? 'সব' : 'All'?></option>
                                <option value="1"><?= $this->lang->line('new')?></option>
                                <option value="2"><?= $this->lang->line('resubmission')?></option>
                                <option value="3"><?= $this->lang->line('renew')?></option>
                                <option value="4"><?= $this->lang->line('rejected')?></option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('industry_type')?></label>
                              <select class="form-control" name="industry_type" id="industry_type">
                                <option value=""><?= $this->lang->line('select_one')?></option>
                                <?php 
                                foreach ($types as $type) {
                                  $type_name=($language=='bn')?$type['type_name_bn']:$type['type_name'];
                                  echo '<option value="'.$type['id'].'">'.$type_name.'</option>';

                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('business_type')?></label>
                                <?php 
                                  echo form_dropdown("business_type",getOptionBusinessType(),'',"id='business_type' class='form-control business_type'");
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('district')?></label>
                                <?php echo form_dropdown('district_id', districtOption(), '', ' class="form-control district_id"'); ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('upazila')?></label>
                                <?php echo form_dropdown('upazila_id', upazilaOption(), '', 'class="form-control upazila_id"'); ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label><?php echo $this->lang->line('from_date'); ?></label>
                                      <input type="text" class="form-control ser_from_date" name="ser_from_date" id="ser_from_date" value="" placeholder="<?php echo $this->lang->line('from_date'); ?>">
                              </div>
                          </div>

                          <div class="col-md-3">
                              <div class="form-group">
                                  <label><?php echo $this->lang->line('to_date'); ?></label>
                                      <input type="text" class="form-control ser_to_date" name="ser_to_date" id="ser_to_date" value="" placeholder="<?php echo $this->lang->line('to_date'); ?>">
                              </div>
                          </div>

                          <div class="col-md-1">
                            <div class="form-group">
                              <input type="button" onclick="searchFilter()" value="<?= $this->lang->line('search')?>" class="btn btn-sm btn-primary mt-4">
                            </div>
                          </div>

                          <div class="col-md-1">
                              <form action="<?php echo base_url() . 'admin/application_report/applicationReportPdf'?>" method="post">
                                  <input type="hidden" name="pdf_conditions" value='' id="get_condition">

                                  <input type="submit" class="btn btn-success btn-sm mt-4" onclick="generate_report_pdf()" value="<?= $this->lang->line('download') ?>">
                              </form> 
                          </div>

                        </div>

                        <div id="postList">
                          <?php $this->load->view('application_report/all_list_data');?>
                        </div>

                      </div>
                    </div>
                    
                  </div>

                </div>


              </div>
            
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('preview')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div id="preview_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('review')?></h5>
        <button type="button" class="close btn btn-warning" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <h4><?= $this->lang->line('review')?></h4>
        <span class="error" id="data_error"></span>
        <br>
        <input type="hidden" name="contact_id" id="contact_id">
        <div class="row">
          <div class="col-sm-4">
            <input id="rev_type_1" name="rev_type" value="1" type="radio" checked="">
            <label for="rev_type_1"><?= $this->lang->line('reviewed')?></label>
          </div>
          <div class="col-sm-4">
            <input id="rev_type_2" name="rev_type" value="2" type="radio">
            <label for="rev_type_2"><?= $this->lang->line('revised')?></label>
          </div>
        </div>
        <div class="row">   
          <div class="col-sm-12 form-group" style="text-align:left;">
            <label > <?= $this->lang->line('note')?><sup class="error">*</sup></label>
            <textarea name="rev_note" id="rev_note" rows="3" class="form-control"></textarea>
            <span class="error" id="rev_note_error"></span>
          </div> 

        </div>
        <input type="button" onclick="review()" value="<?= $this->lang->line('review')?>" class="btn btn-lg btn-primary mt-2">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function generate_report_pdf(){
     var conditions = $("#conditions").val();
     $("#get_condition").val(conditions); //return false;
     preventDefault();
  }

  function searchFilter(page_num) {
    page_num = page_num ? page_num : 0;
    var report_for    = $('#report_for').val();
    var industry_type = $('#industry_type').val();
    var business_type = $('#business_type').val();
    var district_id   = $('.district_id').val();
    var upazila_id    = $('.upazila_id').val();
    var ser_from_date = $('#ser_from_date').val();
    var ser_to_date   = $('#ser_to_date').val();

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/application_report/new_page_data/' + page_num,
        data: 'page=' + page_num + '&report_for=' + report_for + '&industry_type=' + industry_type + '&business_type=' + business_type + '&district_id=' + district_id + '&upazila_id=' + upazila_id + '&ser_from_date=' + ser_from_date + '&ser_to_date=' + ser_to_date,
        beforeSend: function () {
          $('.preloader').show();
        },
        success: function (html) {
          console.log(html);
          $('#postList').html(html);
          $('.preloader').fadeOut("slow");
        }
      });
}
function show_preview(id) {
  $.ajax({
    url: "<?php echo base_url() ?>application/preview/"+id,
    type: 'GET',
    beforeSend: function () {
      $('.preloader').show();
    },
    success: function (response) {
      $('#preview_data').html(response);
      $('.preloader').fadeOut("slow");
    }
  });
}

$(function () {
  $('.ser_from_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap4'
  });

  $('.ser_to_date').datepicker({ 
      format: 'yyyy-mm-dd' ,
      uiLibrary: 'bootstrap4'
  });
});

</script>
<script type="text/javascript">
    $(document).on('change', '.division_id', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getDistrict",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                // console.log(response);
                $('.district_id').html(response);
            }
        });
    });

    $(document).on('change', '.district_id', function () {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>common/getThana",
            type: 'POST',
            data: {id: id},
            success: function (response) {
                $('.upazila_id').html(response);
            }
        });
    });
  </script>