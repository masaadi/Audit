
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?php echo $this->lang->line('fiscal_year'); ?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					<h2 class="add_button">

              <button onclick="add_master()" type="button"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
               data-backdrop="static"
              data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/><?php echo $this->lang->line('add_new'); ?></button>
          </h2> 
                <div class="card search_form">
                  <div class="card-body">
				  <?php echo form_open_multipart('', array('id' => 'fiscal_year_search')); ?>
                     
                    <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('fiscal_year'); ?></label>
                              <input type="text" name="off_cat_name" id="off_cat_name" placeholder="<?php echo $this->lang->line('fiscal_year'); ?>" class="form-control">
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
                    </div>
                  </div>
                </div>
				</form>
				 <div  id="fiscal_yearList">
                    <?php
                    $this->load->view('admin/fiscal_year/home');
                    ?>
                </div>
                <!-- table -->
                
                </div>
              </div>

            </div>
            
          </div>
          
        </div>
		
		<script type="text/javascript">
       function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
         var off_cat_name = $('#off_cat_name').val();	
		
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/fiscal_year/paginate_data/' + page_num,
            data: 'page=' + page_num + '&off_cat_name=' + off_cat_name,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
				$("#fiscal_year_search").trigger("reset");
                $('#fiscal_yearList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/fiscal_year/add/',
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
            $('#fiscal_yearList').html(result);

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
        //url: '<?php echo base_url() ?>admin/fiscal_year/edit/' + id,
		url: '<?php echo base_url() ?>admin/fiscal_year/edit/' + id+'/'+page_no,
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
            $('#fiscal_yearList').html(result);
            return false;
        } else {
            return false;
        }
    }
	  });
      return false;
  }
  
  function delete_master(id,action) {
       // var a = confirm("Are you sure you want to delete this record");
      var a = '';
      if(action==2){
          a = confirm("Are you sure you want to inactive this record?");
      }else{
          a = confirm("Are you sure you want to active this record?");
      }
       if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/fiscal_year/delete/' + id + '/' +action,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#fiscal_yearList').html(result);
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
		 
         $('#fiscal_year_add').validate({
          rules: {
          fiscal_year: {
              required: true,

          },
          from_date: {
              required: true,

          },  
          fiscal_year_bn: {
              required: true,

          },
          to_date: {
              required: true,

          }, 
                   

      },
      messages: {      
        fiscal_year: {
            required: 'Fiscal year is required',
        },
        from_date: {
            required: 'From Date is required',
        },
        fiscal_year_bn: {
            required: 'Fiscal year (Bangla) is required',
        },
        to_date: {
            required: 'To Date is required',
        },
        
  }, 

   submitHandler: function (form) {
    $("label.error").remove();

          var frm = $('#fiscal_year_add');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/fiscal_year/added",
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
                                // window.location.href = "<?php echo base_url() ?>admin/fiscal_year";
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
           
        $('#fiscal_year_edit').validate({
         rules: {
          fiscal_year: {
              required: true,
          },  
          fiscal_year_bn: {
              required: true,
          },  
          address: {
              required: true,
          },  
          address_bn: {
              required: true,
          },                

      },
      messages: {      
        fiscal_year: {
            required: 'Fiscal year is required',
        },
        fiscal_year_bn: {
            required: 'Fiscal year (Bangla) is required',
        },
        address: {
            required: 'Address is required',
        },
        address_bn: {
            required: 'Address (Bangla) is required',
        },
  },

  submitHandler: function (form) {
    $("label.error").remove();
     
     var frm = $('#fiscal_year_edit');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/fiscal_year/update/",
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
                                 //window.location.href = "<?php echo base_url() ?>admin/fiscal_year";
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
		
		</script>

