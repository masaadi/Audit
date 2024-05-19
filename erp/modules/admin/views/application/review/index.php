<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card" style="box-shadow: 0px 0px 3px #777;">
        <div class="card-body dashboard-tabs p-0">
          <?php 
          $link = $_SERVER['PHP_SELF'];
          $link_array = explode('/',$link);
          $page = end($link_array);
          $language = $this->session->userdata('lang_file');
          ?>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item text-center" style="width: 30%; border-radius: 10px 10px 0px 0px;">
              <a class="nav-link <?= ($page=='application-management')?'active':'' ?>" href="<?= base_url().'admin/application-management'?>" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa; border-radius: 10px 10px 0px 0px;">

                <div class="row">
                  <div class="col-md-1"><i class="mdi mdi-skip-next-circle" style="font-size: 40px;"></i></div>
                  <div class="col-md-11 pt-3" style="font-size: 16px;">
                    <?= $this->lang->line('reviewed_applications')?>
                  </div>
                </div>
              </a>
            </li>
            <li class="nav-item text-center" style="width: 30%; border-radius: 10px 10px 0px 0px;">
              <a class="nav-link <?= ($page=='approved-application')?'active':'' ?>"  href="<?= base_url().'admin/approved-application'?>" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa; border-radius: 10px 10px 0px 0px;">
                <div class="row">
                  <div class="col-md-1"><i class="mdi mdi-check-circle" style="font-size: 40px;"></i></div>
                  <div class="col-md-11 pt-3" style="font-size: 16px;">
                    <?= $this->lang->line('approved_application')?>
                  </div>
                </div>
              </a>
            </li>
          </ul>
          <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="card ">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h4 class="pb-1 text-left"><?= $this->lang->line('reviewed_applications')?></h4>
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
                          <label><?= $this->lang->line('industry_type')?></label>
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
                              <label><?php echo $this->lang->line('business_type'); ?></label>
                              <?php echo form_dropdown("ser_business_type",getOptionBusinessType(),'',"id='ser_business_type' class='form-control ser_business_type'"); ?>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label><?= $this->lang->line('date')?></label>
                          <input type="date" name="app_date" id="app_date" class="form-control">
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
                      <?php $this->load->view('application/review/all_list_data');?>
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
          </div>
        </div>
      </div>
      <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?= $this->lang->line('review')?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="text-align: center;">
              <h4><?= $this->lang->line('approved_application')?></h4>
              <span class="error" id="data_error"></span>
              <br>
              <input type="hidden" name="contact_id" id="contact_id">
              <button type="button" class="btn btn-lg btn-primary mt-2" onclick="approved_data()"><?= $this->lang->line('presant_for_approval')?></button>
            </div>
          </div>
        </div>
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
    var app_date = $('#app_date').val();
    var ser_business_type = $('#ser_business_type').val();
    //if ($err_count == 1)  {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/review_app_page_data/' + page_num,
        data: 'page=' + page_num + '&app_id=' + app_id + '&app_name=' + app_name + '&app_type=' + app_type + '&app_date=' + app_date + '&ser_business_type=' + ser_business_type,
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
function approved_data(){
  $('#data_error').html('');
  var contact_id=$('#contact_id').val();
  if(contact_id!=''){
    //alert(contact_id);
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>admin/application/review_enothi',
        data: 'contact_id=' + contact_id,
        beforeSend: function () {
          $('.preloader').show();
        },
        success: function (response) {
          if(response==2){
            toastr.success('Review Successfully Added');
            $('#openModal').modal('toggle');
            window.onload = searchFilter(0);
          }
          $('.preloader').fadeOut("slow");
        }
      });
  }else{
    $('#data_error').html('Application Not Found');
  }
}
</script>