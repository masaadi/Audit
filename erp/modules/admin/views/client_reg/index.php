
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Client Registration</h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					<h2 class="add_button">

              <button onclick="add_master()" type="button" style="padding-left:0px"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
               data-backdrop="static"
              data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/><?php echo $this->lang->line('add_new'); ?></button>
          </h2> 
                <div class="card search_form">
                  <div class="card-body" style="padding-left:0px">
				  <?php echo form_open_multipart('', array('id' => 'profile_search')); ?>
                    <div class="row " >

                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Company Name</label>
                              <input type="text" name="company_name" id="company_name" placeholder="Enter Company Name" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                <label></label>
                                <button type="button" onclick="searchFilter()" class="btn btn-sm btn-primary mt-4">Search</button>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
				</form>
				        <div  id="profileList">
                    <?php
                      $this->load->view('admin/client_reg/home');
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

         var company_name           = $('#company_name').val();	
      
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/client_registration/paginate_data/' + page_num,
            data: 'page=' + page_num + '&company_name=' + company_name,

            success: function (html) {
				$("#profile_search").trigger("reset");
                $('#profileList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/client_registration/add/',
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
            $('#profileList').html(result);

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
		    url: '<?php echo base_url() ?>admin/client_registration/edit/' + id+'/'+page_no,
        success: function (result) {
            if (result) {
  			  $('.search_form').hide();
  			 $('.add_button').hide();
              $('#profileList').html(result);
              return false;
          } else {
              return false;
          }
        }
	  });
      return false;
  }

  //add data
  function show_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        //url: '<?php echo base_url() ?>admin/profile/edit/' + id,
		url: '<?php echo base_url() ?>admin/client_registration/show/' + id+'/'+page_no,
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
            $('#profileList').html(result);
            return false;
        } else {
            return false;
        }
    }
	  });
      return false;
  }
  
  function delete_master(id,action) {
       //var a = confirm("Are you sure you want to delete this record");
      var a = '';
      if(action==1){
          a = confirm("Are you sure you want to inactive this record?");
      }else{
          a = confirm("Are you sure you want to active this record?");
      }
      if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/client_registration/delete/' + id + '/' +action,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#profileList').html(result);
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
      $('#profile_add').validate({
        rules: {
          company_name: {
            required: true,
          }, 
          representative: {
            required: true,
          }, 
              
          phone: {
            required: true,
          },                
          email: {
            required: true,
          },               
          address: {
            required: true,
          },          
   
        },
        messages: {      
          company_name: {
              required: 'This field is required',
          },
          representative: {
              required: 'This field is required',
          },
          phone: {
              required: 'This field is required',
          },
          email: {
              required: 'This field is required',
          },
          address: {
              required: 'This field is required',
          },
        }, 

        submitHandler: function (form) {
          $("label.error").remove();

          var frm = $('#profile_add');
          // e.preventDefault();
          var form = $(this);
          //debugger;
          var currentForm = $('#profile_add')[0];
          var formData = new FormData(currentForm);   

          $.ajax({
            url: "<?php echo base_url() ?>admin/client_registration/added",
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            //dataType: "JSON",
              success: function (response) {
                var result = $.parseJSON(response);
                if(result.status == 'warning'){
                    $('.search_form').show();
                    $('.add_button').show();
                    window.onload = searchFilter(0);
                    toastr.warning(result.message);
                } else {
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
      $('#profile_edit').validate({
        rules: {
          company_name: {
            required: true,
          }, 
          representative: {
            required: true,
          }, 
              
          phone: {
            required: true,
          },                
          email: {
            required: true,
          },               
          address: {
            required: true,
          },          
   
        },
        messages: {      
          company_name: {
              required: 'This field is required',
          },
          representative: {
              required: 'This field is required',
          },
          phone: {
              required: 'This field is required',
          },
          email: {
              required: 'This field is required',
          },
          address: {
              required: 'This field is required',
          },
        }, 
          
      


          submitHandler: function (form) {
            $("label.error").remove();

            var frm = $('#profile_edit');
            var form = $(this);
            //debugger;
            var currentForm = $('#profile_edit')[0];
            var formData = new FormData(currentForm); 

              $.ajax({
                url: "<?php echo base_url() ?>admin/client_registration/update",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                  success: function (response) {
                    var result = $.parseJSON(response);
                    if(result.status == 'warning'){
                        $('.search_form').show();
                        $('.add_button').show();
                        window.onload = searchFilter(0);
                        toastr.warning(result.message);
                    } else {
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
</script>