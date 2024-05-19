
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">User</h4>
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
                              <label><?php echo $this->lang->line('designation'); ?></label>
                              <?php echo form_dropdown("designation_id",getOptionDesignation(),'',"id='' class='form-control designation_id'"); ?>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?php  echo $this->lang->line('name'); ?></label>
                              <input type="text" name="div_name" id="div_name" placeholder="<?php echo $this->lang->line('profile_name'); ?>" class="form-control">
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
                    $this->load->view('admin/profile/home');
                    ?>
                </div>
                <!-- table -->
                
                </div>
              </div>

            </div>
            
          </div>
          
        </div>
		
		<script type="text/javascript">

      
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


       function searchFilter(page_num) {
         page_num = page_num ? page_num : 0;

         var div_name           = $('#div_name').val();	
         var office_category_id = $('.office_category_id').val();	
         var office_id          = $('.office_id').val();	
         var department_id      = $('.department_id').val();	
         var designation_id     = $('.designation_id').val();	
         var division_id        = $('.division_id').val();	
         var district_id        = $('.district_id').val();	
         var upazila_id         = $('.upazila_id').val();	
      
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/profile/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name+ '&office_category_id=' + office_category_id+ '&office_id=' + office_id+ '&department_id=' + department_id+ '&designation_id=' + designation_id+ '&division_id=' + division_id+ '&district_id=' + district_id+ '&upazila_id=' + upazila_id,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
				$("#profile_search").trigger("reset");
                $('#profileList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/profile/add/',
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
        //url: '<?php echo base_url() ?>admin/profile/edit/' + id,
		url: '<?php echo base_url() ?>admin/profile/edit/' + id+'/'+page_no,
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
  function show_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        //url: '<?php echo base_url() ?>admin/profile/edit/' + id,
		url: '<?php echo base_url() ?>admin/profile/show/' + id+'/'+page_no,
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
      if(action==2){
          a = confirm("Are you sure you want to inactive this record?");
      }else{
          a = confirm("Are you sure you want to active this record?");
      }
      if(a){ 
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/profile/delete/' + id + '/' +action,
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
          employee_id: {
            required: true,
          }, 
          full_name: {
            required: true,
          }, 
              
          office_id: {
            required: true,
          },                
          designation_id: {
            required: true,
          },               
          phone: {
            required: true,
          },        
          email: {
            required: true,
          },  

          username: {
            required: true,
          },
          password: {
            required: true,
            minlength : 6,
          },
          address: {
            required: true,
          },
          
   
        },
        messages: {      
          employee_id: {
              required: 'Employee ID is required',
          },
          full_name: {
              required: 'Employee Name is required',
          },
          office_id: {
              required: 'Office Name is required',
          },
          designation_id: {
              required: 'Designation is required',
          },
          phone: {
              required: 'Phone is required',
          },
          email: {
              required: 'E-mail is required',
          },
          username: {
            required: 'Username is required',
          },
          password: {
            required: 'Password is required',
            minlength: 'The password must contain at least six character',
          },
          address: {
            required: 'address is required',
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
            url: "<?php echo base_url() ?>admin/profile/added",
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            //dataType: "JSON",
              success: function (response) {
                var result = $.parseJSON(response);
                if (result.status != 'success') {
                    // $("#username").val(new_username.replace(user_pre,''));
                    //$("#username").val(usr_n);
                    $.each(result, function (key, value) {
                      $('[name="' + key + '"]').addClass("error");
                      $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                  });
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
      $('#edit_submit').validate({
        rules: {
          employee_id: {
            required: true,
          }, 
          full_name: {
            required: true,
          }, 
              
          office_id: {
            required: true,
          },                
          designation_id: {
            required: true,
          },               
          phone: {
            required: true,
          },        
          email: {
            required: true,
          },  

          username: {
            required: true,
          },
          password: {
            required: true,
            minlength : 6,
          },
          address: {
            required: true,
          },
          
   
        },
        messages: {      
          employee_id: {
              required: 'Employee ID is required',
          },
          full_name: {
              required: 'Employee Name is required',
          },
          office_id: {
              required: 'Office Name is required',
          },
          designation_id: {
              required: 'Designation is required',
          },
          phone: {
              required: 'Phone is required',
          },
          email: {
              required: 'E-mail is required',
          },
          username: {
            required: 'Username is required',
          },
          password: {
            required: 'Password is required',
            minlength: 'The password must contain at least six character',
          },
          address: {
            required: 'address is required',
          },
          
      
        }, 

          submitHandler: function (form) {
            $("label.error").remove();

            var frm = $('#edit_submit');
            var form = $(this);
            //debugger;
            var currentForm = $('#edit_submit')[0];
            var formData = new FormData(currentForm); 

              $.ajax({
                url: "<?php echo base_url() ?>admin/profile/update",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                  success: function (response) {
                    var result = $.parseJSON(response);
                      if (result.status != 'success') {
                        $.each(result, function (key, value) {
                          $('[name="' + key + '"]').addClass("error");
                          $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                        });
                      } else {  
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

$(function () {

    $(document).on("change","#role_id", function(){
      var selected_val = $(this).val();

      var edit_id       = $('input[name="id"]').val();
      var edit_username = $('input[name="edit_username"]').val();
      var edit_role_id  = $('input[name="edit_role_id"]').val();

      var g_pro_id      = edit_id;
      var g_username  = edit_username;
      var g_role_id   = edit_role_id;
      if (typeof edit_id === "undefined") {
        var g_pro_id = '';
      }
      if (typeof edit_username === "undefined") {
        var g_username = '';
      }
      if (typeof edit_role_id === "undefined") {
        var g_role_id = '';
      }

      if(selected_val==1){
        $("#user_prefixe").val("01");
      }
      // else if(selected_val==2){
      //   $("#user_prefixe").val("AP");
      // }
      // else if(selected_val==3){
      //   $("#user_prefixe").val("EP");
      // }
      else if(selected_val==4){
        $("#user_prefixe").val("02");
      }
      else if(selected_val==5){
        $("#user_prefixe").val("03");
      }
      else if(selected_val==''){
        $("#user_prefixe").val("");
        $("#username").val("");
        $("#user_privilege").html("");
      }

      if(selected_val){
        if(g_pro_id =='' && g_role_id==''){
          $.ajax({
            url: "<?php echo base_url() ?>admin/profile/get_username_id",
            type: 'POST',
            data: {role_id: selected_val},
            success: function (response) {
                $("#username").val(response);
            }
          });

          $.ajax({
              url: "<?php echo base_url() ?>admin/profile/get_user_privilege_ajax",
              type: 'POST',
              data: {role_id: selected_val},
              success: function (response1) {
                  $("#user_privilege").html(response1);
              }
          });
        }else{

          if(g_role_id != selected_val){
            $.ajax({
              url: "<?php echo base_url() ?>admin/profile/get_username_id",
              type: 'POST',
              data: {role_id: selected_val},
              success: function (response) {
                $("#username").val(response);
              }
            });

            $.ajax({
              url: "<?php echo base_url() ?>admin/profile/get_user_privilege_ajax",
              type: 'POST',
              data: {role_id: selected_val},
              success: function (response1) {
                  $("#user_privilege").html(response1);
              }
            });

          }else{
            $("#username").val(g_username);
            $.ajax({
              url: "<?php echo base_url() ?>admin/profile/get_user_privilege_ajax_previous",
              type: 'POST',
              data: {id: g_pro_id, role_id: g_role_id},
              success: function (response1) {
                  $("#user_privilege").html(response1);
              }
            });
          }

        }
        
      }
        

    });

    $(document).on("click","#all_check", function(){
        // $('input:checkbox').not(this).prop('checked', this.checked);
        $('.menu_check').not(this).prop('checked', this.checked);
        $('.module_check').not(this).prop('checked', this.checked);
    });

    $(document).on("click",".module_check", function(){
        var all_class = this.className.split(' ');
        var class1 = all_class[1];
        if ($(this).prop('checked')==true){ 
          $('.'+class1).prop('checked', this.checked);
        }
        else if($(this).prop('checked')==false){
          $('.'+class1).prop('checked', false);
        }
        
    });

    // For busniess type
    $(document).on("click","#is_inspector", function(){
        var id = $("input[name=id]").val();
        var type = 'create';

        if (typeof id !== "undefined") {
          type = 'edit';
        }

        if ($(this).prop('checked')==true){ 
          $.ajax({
            url: "<?php echo base_url() ?>admin/profile/get_busniess_type",
            type: 'POST',
            data: {type:type, id:id},
            success: function (response1) {
              $("#busniess_type_div").html(response1);
            }
          });
        } else {
          $("#busniess_type_div").html("");
        }
    });

  });
</script>