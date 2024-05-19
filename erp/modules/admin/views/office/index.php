
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12">
              <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Office</h4>
                    <div class="row p-3">
                      <div class="card bg-success" style="width: 100%; color: #fff;">
                       
                      </div>
                        
                    </div>
					<h2 class="add_button">

              <button onclick="add_master()" type="button"
              class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5"
               data-backdrop="static"
              data-keyboard="false"  style="padding-left:0px"><img src="<?php echo base_url();?>public/img/plus.png"/><?= $this->lang->line('add_new')?></button>
          </h2> 
                <div class="card search_form">
                  <div class="card-body" style="padding-left:0px">

                    <div class='row'>
                        <div class='col-md-10'>
                        <?php echo form_open_multipart('', array('id' => 'office_search')); ?>
                    <div class="row " >

                          <div class="col-md-3">
                            <div class="form-group">
                              <label><?= $this->lang->line('office_name')?></label>
                              <input type="text" name="off_name" id="off_name" placeholder="" class="form-control">
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
                    </form>
                    
                        </div>
                        <div class='col-md-2'>
                            <form action='<?php echo base_url() . 'admin/office/generateListPdf' ?>' method='post'>
                            <input type="hidden" name="pdf_cat" id='pdf_cat' value="">
                            <input type="hidden" name="pdf_name" id='pdf_name' value="">
                            <input type="submit" class="btn btn-success btn-sm pull-right mr-1 mt-4" value="Download">
                            </form> 
                        </div>
                    </div>


				 
                  </div>
                </div>
				




				 <div  id="officeList">
                    <?php
                    $this->load->view('admin/office/home');
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
        var off_name = $('#off_name').val();	
        var off_cat = $('#office_category').val();

        $('#pdf_cat').val(off_cat);
        $('#pdf_name').val(off_name);
        
        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/office/paginate_data/' + page_num,
            data: 'page=' + page_num + '&off_name=' + off_name+ '&off_cat=' + off_cat,
            /* beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            }, */
            success: function (html) {
				$("#office_search").trigger("reset");
                $('#officeList').html(html);
            }
        });
    }
	
	 function add_master() {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/office/add/',
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
            $('#officeList').html(result);

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
        //url: '<?php echo base_url() ?>admin/office/edit/' + id,
		url: '<?php echo base_url() ?>admin/office/edit/' + id+'/'+page_no,
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
            $('#officeList').html(result);
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
        url: '<?php echo base_url() ?>admin/office/delete/' + id,
        beforeSend: function () {
          $('.crud_load').show()
      },
      complete: function () {
          $('.crud_load').hide();
      },
      success: function (result) {
          if (result) {
            //$('#officeList').html(result);
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
		 
         $('#office_add').validate({
          rules: {
          office_name: {
              required: true,

          }, 
          office_category: {
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
      office_name: {
          required: 'Office Name is required',
      },
	    office_category: {
          required: 'Office Category is required',
      },
      address: {
          required: 'Address is required',
      },
      address_bn: {
          required: 'Address(bn) is required',
      },
      
  }, 

   submitHandler: function (form) {
    $("label.error").remove();

          var frm = $('#office_add');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/office/added",
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
                                // window.location.href = "<?php echo base_url() ?>admin/office";
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
        $('#office_edit').validate({
          rules: {
          office_name: {
              required: true,

          }, 
          office_category: {
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
        office_name: {
          required: 'Office Name is required',
        },
  	    office_category: {
          required: 'Office Category is required',
        },
        address: {
          required: 'Address is required',
        },
        address_bn: {
          required: 'Address(bn) is required',
        },
      
  }, 

  submitHandler: function (form) {
    $("label.error").remove();
     
     var frm = $('#office_edit');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;

                    $.ajax({
                      url: "<?php echo base_url() ?>admin/office/update/",
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

      $(document).on("change","#office_category", function(){
        var office_category = $(this).val();
        var office_id = $("input[name=id]").val();
        if (typeof office_id === "undefined" || office_id=='') {
            office_id = 0;
        }

        $(".append").remove();

        if(office_category==3){

          $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/office/get_disctrict_region/',
            data: {office_id:office_id},
            beforeSend: function () {
              $('.crud_load').show()
            },
            complete: function () {
              $('.crud_load').hide();
            },
            success: function (result) {
              if(result) {
                $("#district_append").after(result);
                return false;
              } else {
                $(".append").remove();
                 return false;
              }
            }
          });

        }

      });

  });
		
		</script>