
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body " >
                    <h4 class="text-center"><?php echo $this->lang->line('upazila'); ?></h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					<h2 class="add_button">

              <button style="padding-left:0px" onclick="add_master()" type="button"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
               data-backdrop="static"
              data-keyboard="false"><img src="<?php echo base_url();?>public/img/plus.png"/><?php echo $this->lang->line('add_new'); ?></button>
          </h2> 
                <div class="card search_form">
                  <div class="card-body" style="padding-left:0px">
                     
                    <div class="row " >
                    <div class="col-md-3">
                    <?php echo form_open_multipart('', array('id' => 'upazila_search')); ?>

                        <div class="form-group">
                        <label><?php echo $this->lang->line('select_division'); ?></label>
                            <?php echo form_dropdown('division_id', divisionOption(), '', 'id="division_id" class="form-control division_id"'); ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label ><?php echo $this->lang->line('select_district'); ?></label>
                            <?php echo form_dropdown('district_id', districtOption(), '', ' class="form-control district_id"'); ?>
                        </div>
                    </div>

                  
                        <div class="col-md-3">
                            <div class="form-group">
                              <label><?php echo $this->lang->line('upazila'); ?></label>
                              <input type="text" name="div_name" id="div_name" placeholder="<?php echo $this->lang->line('upazila_name'); ?>" class="form-control">
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                                <div class='row'>
                                    <div class='col-md-7'>
                                        <div class="form-group">
                                            <label></label>
                                            <button type="button" onclick="searchFilter()" class="btn btn-sm btn-primary mt-4"><?php echo $this->lang->line('search'); ?></button>
                                        </div>
                                        </form>

                                    </div>
                                    <div class='col-md-5 mt-4'>
                                        <form action='<?php echo base_url() . 'admin/upazila/generateListPdf' ?>' method='post'>
                                            <input type="hidden" name="pdf_division_id" id='pdf_division_id' value="">
                                            <input type="hidden" name="pdf_district_id" id='pdf_district_id' value="">
                                            <input type="hidden" name="pdf_name" id='pdf_name' value="">
                                            <input type="submit" class="btn btn-sm btn-success pull-right" value="<?=  $this->lang->line('download') ?>">
                                        </form> 
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </div>
				 <div  id="upazilaList">
                    <?php
                    $this->load->view('admin/upazila/home');
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
         var div_name = $('#div_name').val();	
		 var district_id = $('.district_id').val();	
         var division_id = $('.division_id').val();	


         $('#pdf_division_id').val(division_id);
         $('#pdf_district_id').val(district_id);
         $('#pdf_name').val(div_name);
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/upazila/paginate_data/' + page_num,
            data: 'page=' + page_num + '&div_name=' + div_name+ '&district_id=' + district_id+ '&division_id=' + division_id,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
			       //	$("#upazila_search").trigger("reset");
                $('#upazilaList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/upazila/add/',
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
            $('#upazilaList').html(result);

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
        //url: '<?php echo base_url() ?>admin/upazila/edit/' + id,
		url: '<?php echo base_url() ?>admin/upazila/edit/' + id+'/'+page_no,
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
            $('#upazilaList').html(result);
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
        url: '<?php echo base_url() ?>admin/upazila/delete/' + id + '/' +action,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#upazilaList').html(result);
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
		 
         $('#upazila_add').validate({
          rules: {
          division_id: {
              required: true,

          }, 
          district_id: {
              required: true,

          }, 
          upazila_name: {
              required: true,

          }
      },
      messages: {      
        division_id: {
            required: 'Division Name is required',
        },
        district_id: {
            required: 'District Name is required',
        },
        upazila_name: {
            required: 'Upazila Name is required',
        }
      
  }, 

   submitHandler: function (form) {
    $("label.error").remove();

          var frm = $('#upazila_add');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/upazila/added",
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
                                // window.location.href = "<?php echo base_url() ?>admin/upazila";
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
           
        $('#upazila_edit').validate({
         rules: {
          division_id: {
              required: true,

          }, 
          district_id: {
              required: true,

          }, 
          upazila_name: {
              required: true,

          },         

      },
      messages: {     
      
      division_id: {
          required: 'Division Name is required',
      }, 
      division_id: {
          required: 'District Name is required',
      }, 
      upazila_name: {
          required: 'Upazila Name is required',
      },
     


  },

  submitHandler: function (form) {
    $("label.error").remove();
     
     var frm = $('#upazila_edit');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/upazila/update/",
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