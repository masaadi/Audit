<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body dashboard-tabs p-0">
          <?php 
          $language = $this->session->userdata('lang_file');
          $this->load->view('application/tabs');
          ?>
          <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center item">
                  <i class="mdi mdi-apps icon-lg mr-3 text-primary"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted"><?= $this->lang->line('total_renew')?></small>
                    <h5 class="mb-0 d-inline-block"><?= $total_application?></h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center item">
                  <i class="mdi mdi-lan-disconnect mr-3 icon-lg text-danger"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted"><?= $this->lang->line('pending_renew')?></small>
                    <h5 class="mr-2 mb-0"><?= $pending[0]['total_pending']?></h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center item">
                  <i class="mdi mdi-cash-multiple  mr-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted"><?= $this->lang->line('payment_received')?></small>
                    <h5 class="mr-2 mb-0"><?= $total_application*$fees[0]['renew_fees']?></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card pt-2">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <h4 class="pb-1 text-left"><?= $this->lang->line('renew_applications')?></h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label><?= $this->lang->line('id')?></label>
                              <input type="text" class="form-control" name="app_id" id="app_id">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label><?= $this->lang->line('name')?></label>
                              <input type="text" class="form-control" name="app_name" id="app_name">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('type')?></label>
                              <select class="form-control" name="app_type" id="app_type">
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
                              <label><?= $this->lang->line('status')?></label>
                              <select class="form-control" name="app_status" id="app_status">
                                <option value=""><?= $this->lang->line('select_one')?></option>
                                <option value="1"><?= $this->lang->line('pending')?></option>
                                <option value="2"><?= $this->lang->line('reviewed')?></option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label></label>
                              <input type="button" onclick="searchFilter()" value="<?= $this->lang->line('search')?>" class="btn btn-sm btn-primary mt-4">
                            </div>
                          </div>
                        </div>

                        <div id="postList">
                          <?php $this->load->view('application/renew/all_list_data');?>
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
  function searchFilter(page_num) {
    page_num = page_num ? page_num : 0;
    var app_id = $('#app_id').val();
    var app_name = $('#app_name').val();
    var app_type = $('#app_type option:selected').val();
    var app_status = $('#app_status option:selected').val();
    //if ($err_count == 1)  {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>renew_application/page_data/' + page_num,
        data: 'page=' + page_num + '&app_id=' + app_id + '&app_name=' + app_name + '&app_type=' + app_type + '&app_status=' + app_status,
        beforeSend: function () {
          $('.preloader').show();
        },
        success: function (html) {
          console.log(html);
          $('#postList').html(html);
          $('.preloader').fadeOut("slow");
        }
      });
  //}
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
function review(){
  $('#rev_note_error').html('');
  $('#data_error').html('');
  var contact_id=$('#contact_id').val();
  var rev_note=$('#rev_note').val();
  if(contact_id!=''){
    if (rev_note!='') {
      var rev_type = $('[name^="rev_type"]:checked').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/application/review_new_application',
        data: 'contact_id=' + contact_id + '&rev_note=' + rev_note + '&rev_type=' + rev_type,
        beforeSend: function () {
          $('.preloader').show();
        },
        success: function (response) {
          console.log(response);
          if(response==2){
            toastr.success('Review Successfully Added');
            $('#openModal').modal('toggle');
            window.onload = searchFilter(0);
          }
          $('.preloader').fadeOut("slow");
        }
      });
    }else{
      $('#rev_note_error').html('Note Field is required');
    }
  }else{
    $('#data_error').html('Application Not Found');
  }
}
</script>