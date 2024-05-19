        <div class="content-wrapper">
          
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <d class="card" style="box-shadow:0px 0px 3px #777">
                    <div class="card-body dashboard-tabs p-0">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item text-center" style="width: 33.33%; line-height: 1 !important;">
                          <a class="nav-link active" id="overview-tab" onclick="set_fee_status(1)" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                            
                            <div class="row">
                              <div class="col-md-3"><i class="mdi mdi-cash" style="font-size: 80px;"></i></div>
                              <div class="col-md-9 pt-4" style="font-size: 18px;">
                               <?= $this->lang->line('total_applications_fee_collected') ?><br>
                                <span id='total_applicant_amount'></span>
                                <?= $this->lang->line('tk') ?>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li class="nav-item text-center" style="width: 33.33%; line-height: 1 !important;">
                          <a class="nav-link" id="sales-tab" data-toggle="tab" onclick="set_fee_status(2)" href="#sales" role="tab" aria-controls="sales" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                              <div class="row">
                                  <div class="col-md-3"><i class="mdi mdi-cash" style="font-size: 80px;"></i></div>
                                  <div class="col-md-9 pt-4" style="font-size: 18px;">
                                  <?= $this->lang->line('total_registration_fee_collected') ?><br>
                                  <span id='total_registration_amount'></span>
                                     <?= $this->lang->line('tk') ?>
                                  </div>
                                </div>
                          </a>
                        </li>
                        <li class="nav-item text-center" style="width: 33.33%; line-height: 1 !important;">
                          <a class="nav-link" id="renew-tab" data-toggle="tab" onclick="set_fee_status(3)" href="#renew" role="tab" aria-controls="renew" aria-selected="false" style="font-weight: 600; background-color: #eee; border: 1px solid #aaa;">
                              <div class="row">
                                  <div class="col-md-3"><i class="mdi mdi-cash" style="font-size: 80px;"></i></div>
                                  <div class="col-md-9 pt-4" style="font-size: 18px;">
                                  <?= $this->lang->line('total_renew_fee_collected') ?><br>
                                  <span id='total_renew_amount'></span>
                                     <?= $this->lang->line('tk') ?>
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
                                        
                                        <?php echo form_open_multipart('', array('id' => 'payment_search')); ?>
                                            <div class="row">
                                                <div class="col-md-3">
                                                  <div class="form-group">
                                                    <label><?php echo $this->lang->line('application_id'); ?></label>
                                                    <input type="text" name="user_id" id="user_id" placeholder="<?php echo $this->lang->line('application_id'); ?>" class="form-control">
                                                    <input type="hidden" name="fee_status" id="fee_status" value="1" class="form-control">
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
                                                      <label></label>
                                                    <button type="button" onclick="searchFilter()"
                                                        class="btn btn-sm btn-primary mt-4">
                                                      <?php echo $this->lang->line('search'); ?></button>
                                                    </div>
                                                    </form>

                                                </div>
                                                <div class="col-md-3 text-right">
                                                    <form action="<?php echo base_url() . 'admin/payment/paymentPdf'?>" method="post">
                                                      <input type="hidden" name="pdf_conditions" value='' id="get_condition">
                                                      <input type="submit" class="btn btn-success btn-sm mt-4" onclick="generate_report_pdf()" value="<?= $this->lang->line('download') ?>">
                                                    </form> 
                                                </div>



                                            </div>
                                          </div>
                                            <div id='paymentList'>
                                              <?php $this->load->view('admin/payment/home') ?>                                  
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
		
    <script type="text/javascript">
    

    function generate_report_pdf(){
      var conditions = $("#conditions").val();
      $("#get_condition").val(conditions); //return false;
      preventDefault();
    }

       function set_fee_status(status){
          $('#fee_status').val(status);

          searchFilter(0)
       }

       function searchFilter(page_num) {
         page_num = page_num ? page_num : 0;
         var user_id = $('#user_id').val();	
         var fee_status = $('#fee_status').val();	
         var office_category_id = $('.office_category_id').val(); 
         var office_id = $('.office_id').val();
         var fiscal_year = $('#fiscal_year').val();
         if(typeof(office_category_id) == 'undefined'){
          office_category_id = ''; 
         }
         if(typeof(office_id) == 'undefined'){
          office_id = ''; 
         }
		
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/payment/paginate_data/' + page_num,
            data: 'page=' + page_num + '&user_id=' + user_id + '&fee_status=' + fee_status + '&office_category_id_ser=' + office_category_id + '&office_id_ser=' + office_id+ '&fiscal_year=' + fiscal_year,
             beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, 
            success: function (html) {
				       // $("#payment_search").trigger("reset");
                $('#paymentList').html(html);
            }
        });
    }
  
    

	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/payment/add/',
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
			 $('.search_form').hide();
			 $('.add_button').hide();
            $('#paymentList').html(result);

            return false;
        } else {
            return false;
        }
		}
	});
		  return false;
  }
  
  //add data
  function edit_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        //url: '<?php echo base_url() ?>admin/payment/edit/' + id,
		url: '<?php echo base_url() ?>admin/payment/edit/' + id+'/'+page_no,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
			  $('.search_form').hide();
			 $('.add_button').hide();
            $('#paymentList').html(result);
            return false;
        } else {
            return false;
        }
    }
	  });
      return false;
  }
  
  function delete_master(id) {
       var a = confirm("Are you sure you want to delete this record");
       if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/payment/delete/' + id,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#paymentList').html(result);
			window.onload = searchFilter(0);
            return false;
        } else {
            return false;
        }
    }
	  });
	   }
      return false;
  }
      
 


</script>

<script type="text/javascript">
		$(function () {
      $('body').on('click', '#submit', function () {
		 
         $('#payment_add').validate({
          rules: {
          payment_name: {
              required: true,

          },         

      },
      messages: {      
      payment_name: {
          required: 'payment Name is required',
      },
      
  }, 

   submitHandler: function (form) {
    $("label.error").remove();

          var frm = $('#payment_add');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/payment/added",
                      type: 'POST',
                      data: frm.serialize(),
                        //dataType: "JSON",
                        success: function (response) {

                            //$('.loading').fadeOut("slow");
                            var result = $.parseJSON(response);
                            if (result.status != 'success') {
                              $.each(result, function (key, value) {
                                $('[name="' + key + '"]').addClass("error");
                                $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                            });
                          }
                          else {
                                //$('.statusMsg').html('<span style="color:red;">Data Save Successfully.</span>');
                                // alert('success');
                                // window.location.href = "<?php echo base_url() ?>admin/payment";
                               // $("#targetModal").modal("toggle");
							   
								 $('.search_form').show();
			                      $('.add_button').show();
                                window.onload = searchFilter(0);
                                toastr.success(result.message);
                            }

                        }

                    });


                }
            }); 

    });
  });
  
  
  //update
  $(function () {
      $('body').on('click', '#edit_submit', function () {
           
        $('#payment_edit').validate({
         rules: {
          payment_name: {
              required: true,

          },         

      },
      messages: {      
      payment_name: {
          required: 'payment Name is required',
      },
     


  },

  submitHandler: function (form) {
    $("label.error").remove();
     
     var frm = $('#payment_edit');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/payment/update/",
                      type: 'POST',
                      data: frm.serialize(),
                        //dataType: "JSON",
                        success: function (response) {

                            //$('.loading').fadeOut("slow");
                            var result = $.parseJSON(response);
                            if (result.status != 'success') {
                              $.each(result, function (key, value) {
                                $('[name="' + key + '"]').addClass("error");
                                $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                            });
                              // alert('Duplicate Wing Name or Wing ID not allow !');

                          }
                          else {
                                //$('.statusMsg').html('<span style="color:red;">Data Save Successfully.</span>');
                                // alert(result.status);
                                // window.location.href = "<?php echo base_url() ?>hr/wing/index";
                                //$("#targetModal").modal("toggle");
								 $('.search_form').show();
			                      $('.add_button').show();
                                window.onload = searchFilter(result.page_num);
                                toastr.success(result.message);
                            }

                        }

                    });


                }
            });

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
</script>