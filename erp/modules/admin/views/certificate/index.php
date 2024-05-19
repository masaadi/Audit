        <div class="content-wrapper">
          
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <d class="card" style="box-shadow:0px 0px 3px #777">
                    <div class="card-body dashboard-tabs p-0">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item text-center" style="width: 50%; line-height: 1 !important;">
                          <a class="nav-link active" id="overview-tab" onclick="pending_certificate()" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                            
                            <div class="row">
                              <div class="col-md-3"><i class="mdi mdi-cash" style="font-size: 80px;"></i></div>
                              <div class="col-md-9 pt-4" style="font-size: 18px;">
							  	<?= $this->lang->line('pending_certificate') ?>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="nav-item text-center" style="width: 50%; line-height: 1 !important;">
                          <a class="nav-link" id="sales-tab" data-toggle="tab" onclick="ready_certificate()" href="#sales" role="tab" aria-controls="sales" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                              <div class="row">
                                  <div class="col-md-3"><i class="mdi mdi-cash" style="font-size: 80px;"></i></div>
                                  <div class="col-md-9 pt-4" style="font-size: 18px;">
                                  <?= $this->lang->line('certificate_ready') ?>
                                  </div>
                                </div>
                          </a>
                        </li>
                      </ul>
                      
                          <div class="row">
                              <div class="col-md-12">
                                <div class="card pt-2">
                                  <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                        
                                        <?php //echo form_open_multipart('', array('id' => 'certificate_search')); ?>
                                            <div class="row">
                                                <div class="col-md-3">
                                                  <div class="form-group">
                                                    <label><?php echo $this->lang->line('application_id'); ?></label>
                                                    <input type="text" name="user_id" id="user_id" placeholder="<?php echo $this->lang->line('application_id'); ?>" class="form-control">
                                                    <input type="hidden" name="certificate_status" id="certificate_status" value="pending" class="form-control">
                                                  </div>
                                                </div>
                                                <?php if($this->userId==1): ?>
                                                  <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label><?php echo $this->lang->line('office_category'); ?></label>
                                                      <?php echo form_dropdown("office_category_id",office_category(),'',"id='' class='form-control office_category_id'"); ?>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label><?php echo $this->lang->line('office'); ?></label>
                                                      <?php echo form_dropdown("office_id",office(),'',"id='' class='form-control office_id'"); ?>
                                                    </div>
                                                  </div>
                                                <?php endif; ?>
                                                <?php if($this->office_category_id==1): ?>
                                                  <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label><?php echo $this->lang->line('office'); ?></label>
                                                      <select class="form-control office_id" name="office_id">
                                                        <option value="" selected="selected">----- Select ----- </option>
                                                        <?php if($regonal_office): ?>
                                                          <?php foreach($regonal_office as $ro): ?>
                                                            <option value="<?= $ro->id ?>"><?= ($this->session->userdata('lang_file')=='bn') ? $ro->office_name_bn : $ro->office_name?></option>
                                                          <?php endforeach; ?>
                                                        <?php endif; ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                <?php endif; ?>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label><?php echo $this->lang->line('fiscal_year'); ?></label>
                                                      <?php echo form_dropdown('fiscal_year', fiscal_year(), '', 'id="fiscal_year" class="form-control"'); ?>
                                                    </div>
                                                  </div>

                                                  <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label><?php echo $this->lang->line('from_date'); ?></label>
                                                            <input type="text" class="form-control ser_from_date" name="ser_from_date" id="ser_from_date" value="<?php echo (isset($conditions['search']['ser_from_date'])) ? $conditions['search']['ser_from_date'] : '' ?>" placeholder="<?php echo $this->lang->line('from_date'); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label><?php echo $this->lang->line('to_date'); ?></label>
                                                            <input type="text" class="form-control ser_to_date" name="ser_to_date" id="ser_to_date" value="<?php echo (isset($conditions['search']['ser_to_date'])) ? $conditions['search']['ser_to_date'] : '' ?>" placeholder="<?php echo $this->lang->line('to_date'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 btn-hide">
                                                  <div class="form-group">
                                                    <?php 
                                                      $language = $this->session->userdata('lang_file');
                                                    ?>
                                                    <label><?= $this->lang->line('report_for')?></label>
                                                    <select class="form-control report_for" name="report_for" id="report_for">
                                                      <option value="1" selected><?= ($language=='bn') ? 'সব' : 'All'?></option>
                                                      <option value="2"><?= $this->lang->line('renew')?></option>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="col-md-3 btn-hide">
                                                  <div class="form-group">
                                                    <label><?= $this->lang->line('district')?></label>
                                                      <?php echo form_dropdown('district_id', districtOption(), '', ' class="form-control district_id"'); ?>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="col-md-3 btn-hide">
                                                  <div class="form-group">
                                                    <label><?= $this->lang->line('upazila')?></label>
                                                      <?php echo form_dropdown('upazila_id', upazilaOption(), '', 'class="form-control upazila_id"'); ?>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label></label>
                                                    <button type="button" onclick="searchFilter()"
                                                        class="btn btn-sm btn-primary mt-4">
                                                      <?php echo $this->lang->line('search'); ?></button>
                                                    </div>
                                                </div>
                                                <?php //if($certificate_ser_type=='ready'): ?>
                                                <div class="col-md-3" id="download_btn_hide">
                                                    <form action="<?php echo base_url() . 'admin/certificate/certificateReportPdf'?>" method="post">
                                                        <input type="hidden" name="pdf_conditions" value='' id="get_condition">

                                                        <input type="submit" class="btn btn-success btn-sm mt-4 pull-right" onclick="generate_report_pdf()" value="<?= $this->lang->line('download') ?>">
                                                    </form> 
                                                </div>
                                                <?php //endif; ?>
                                            </div>
                                          <!-- </form> -->
                                          </div>
                                            <div id='certificateList'>
                                              <?php $this->load->view('admin/certificate/home') ?>                                  
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
		 <!-- Modal -->
		 <div class="modal" id="modal_verify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-wrap: break-word;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id='modal_content'>
						
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
                <h4><?= $this->lang->line('deliverd_the_certificate')?></h4>
                <span class="error" id="data_error"></span>
                <br>

                <input type="hidden" name="contact_id" id="contact_id">
                <input type="hidden" name="payment_id" id="payment_id">
                <input type="hidden" name="certificate_id" id="certificate_id">

                <button type="button" class="btn btn-lg btn-primary mt-2" onclick="approved_data()"><?= $this->lang->line('deliver')?></button>
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

      function pending_certificate(){
          $("#download_btn_hide").css("display", "none");
          $(".btn-hide").css("display", "none");

          $('#certificate_status').val('pending');
          $('.ser_from_date').val('');  
          $('.report_for').val('1');  
          $('.ser_to_date').val(''); 
          $('.district_id').val(''); 
          $('.upazila_id').val(''); 
          
          searchFilter(0)
      }

      function ready_certificate(){
          $("#download_btn_hide").removeAttr("style");
          $(".btn-hide").removeAttr("style");

          $('#certificate_status').val('ready');
          $('.ser_from_date').val('');  
          $('.ser_to_date').val('');  
          $('.report_for').val('1'); 
          $('.district_id').val(''); 
          $('.upazila_id').val(''); 
          searchFilter(0)
      }

      function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        var user_id = $('#user_id').val();	
        var certificate_status = $('#certificate_status').val();	
        var office_category_id = $('.office_category_id').val(); 
        var office_id = $('.office_id').val();
        var fiscal_year = $('#fiscal_year').val();
        var ser_from_date       = $('.ser_from_date').val();  
        var ser_to_date         = $('.ser_to_date').val();  
        var report_for         = $('.report_for').val();  
        var district_id         = $('.district_id').val();  
        var upazila_id         = $('.upazila_id').val();  
      
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/certificate/paginate_data/' + page_num,
            data: 'page=' + page_num + '&user_id=' + user_id + '&certificate_status=' + certificate_status + '&office_category_id_ser=' + office_category_id + '&office_id_ser=' + office_id+ '&fiscal_year=' + fiscal_year + '&ser_from_date=' + ser_from_date+ '&ser_to_date=' + ser_to_date + '&report_for=' + report_for + '&district_id=' + district_id + '&upazila_id=' + upazila_id,
             beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, 
            success: function (html) {
				       // $("#certificate_search").trigger("reset");
                $('#certificateList').html(html);
            }
        });
    }
  
    // verify certificate
    function verify_master(id,page_no) {
      $.ajax({
        type: "POST",
		    url: '<?php echo base_url() ?>admin/certificate/verify/' + id+'/'+page_no,
        beforeSend: function () {
            $('.crud_load').show()
        },
        complete: function () {
            $('.crud_load').hide();
        },
        success: function (result) {
            if (result) {
              $('#modal_content').html(result);
              $('#modal_verify').modal('show');
              return false;
            } else {
              return false;
            }
          }
      });
      return false;
    }

    // preview master
    function preview_master(id) {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/certificate/preview/' + id,
        beforeSend: function () {
            $('.crud_load').show()
        },
        complete: function () {
          $('.crud_load').hide();
        },
        success: function (result) {
          if (result) {
            $('#modal_content').html(result);
            $('#modal_verify').modal('show');
            return false;
          } else {
            return false;
          }
        }
      });
      return false;
    }

    // verify certificate
    function confirm_master() {
      var frm = $('#certificate_add');
      var form = $(this);
      $.ajax({
        url: "<?php echo base_url() ?>admin/certificate/confirm",
        type: 'POST',
        data: frm.serialize(),
        beforeSend: function () {
          $('.crud_load').show()
        },
        complete: function () {
            $('.crud_load').hide();
        },
        success: function (result) {
            if (result) {
              $('#modal_content').html(result);
              $('#modal_verify').modal('show');
              return false;
          } else {
              return false;
          }
        }
      });
      return false;
    }

    function deliver_approve_model(con_id,paym_id,cert_id){
      $('#contact_id').val(con_id);
      $('#payment_id').val(paym_id);
      $('#certificate_id').val(cert_id);
      $('#openModal').modal('show');
    }

    function approved_data(){
      var contact_id=$('#contact_id').val();
      var payment_id=$('#payment_id').val();
      var certificate_id=$('#certificate_id').val();
      
      if(contact_id!=''){
          $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/certificate/deliver_certificate',
            data: 'contact_id=' + contact_id + '&payment_id=' + payment_id + '&certificate_id=' + certificate_id,
            beforeSend: function () {
              $('.preloader').show();
            },
            success: function (response) {
              var result = $.parseJSON(response);
              if(result.status=='success'){
                // toastr.success('Data Successfully Added');
                toastr.success(result.message);
                $('#openModal').modal('toggle');
                window.onload = searchFilter(0);
              }
              $('.preloader').fadeOut("slow");
            }
          });
      }else{
        //$('#data_error').html('Application Not Found');
      }
    }


</script>

<script type="text/javascript">
	
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


  $(document).on('change', '.office_category_id', function () {
      var id = $(this).val();
      $.ajax({
          url: "<?php echo base_url() ?>common/getOfficeByCat",
          type: 'POST',
          data: {id: id},
          success: function (response) {
              $('.office_id').html(response);
          }
      });
    });

  if($("#certificate_status").val()=='pending'){
    $("#download_btn_hide").css("display", "none");
  }
</script>