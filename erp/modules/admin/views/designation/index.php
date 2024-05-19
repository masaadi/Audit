
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?= $this->lang->line('designation')?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					<h2 class="add_button">

              <button style="padding-left:0px" onclick="add_master()" type="button"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
               data-backdrop="static"
              data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/><?= $this->lang->line('add_new')?></button>
          </h2> 
                <div class="card search_form">
                  <div class="card-body" style="padding-left:0px">
				  <?php echo form_open_multipart('', array('id' => 'designation_search')); ?>
                     
                    <div class="row " >
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('designation')?></label>
                              <input type="text" name="des_name" id="des_name" placeholder="user name" class="form-control">
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                              <div class="form-group">
                                <label></label>
                              <button type="button" onclick="searchFilter()"
                    class="btn btn-sm btn-primary mt-4">
					<?= $this->lang->line('search')?></button>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
				</form>
				 <div  id="designationList">
                    <?php
                    $this->load->view('admin/designation/home');
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
         var des_name = $('#des_name').val();	
		
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/designation/paginate_data/' + page_num,
            data: 'page=' + page_num + '&des_name=' + des_name,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
				$("#designation_search").trigger("reset");
                $('#designationList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/designation/add/',
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
            $('#designationList').html(result);

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
        //url: '<?php echo base_url() ?>admin/designation/edit/' + id,
		url: '<?php echo base_url() ?>admin/designation/edit/' + id+'/'+page_no,
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
            $('#designationList').html(result);
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
        url: '<?php echo base_url() ?>admin/designation/delete/' + id + '/' +action,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#designationList').html(result);
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
		 
         $('#designation_add').validate({
          rules: {
          designation_name: {
              required: true,

          },         

      },
      messages: {      
      designation_name: {
          required: 'Designation Name is required',
      },
      
  }, 

   submitHandler: function (form) {
    $("label.error").remove();

          var frm = $('#designation_add');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/designation/added",
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
                                // window.location.href = "<?php echo base_url() ?>admin/designation";
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
           
        $('#designation_edit').validate({
         rules: {
          designation_name: {
              required: true,

          },         

      },
      messages: {      
      designation_name: {
          required: 'Designation Name is required',
      },
     


  },

  submitHandler: function (form) {
    $("label.error").remove();
     
     var frm = $('#designation_edit');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/designation/update/",
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
		
		</script>