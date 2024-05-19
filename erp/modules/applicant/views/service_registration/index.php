<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Service Request Initiate</h4>
                    <div class="row p-3">
                        <div class="card bg-success" style="width: 100%; color: #fff;">
                        </div>
                    </div>
                    <h2 class="add_button">
                        <button onclick="add_master()" type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5" data-backdrop="static" data-keyboard="false" style="padding-left:0px"><img src="<?php echo base_url();?>public/img/plus.png" />
                            <?= $this->lang->line('add_new')?></button>
                    </h2>
                    <div class="card search_form">
                        <div class="card-body" style="padding-left:0px">
                            <div class='row'>
                                <div class='col-md-10'>
                                    <?php echo form_open_multipart('', array('id' => 'office_search')); ?>
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Service Type</label>
                                                <?php echo form_dropdown('service_type', getServiceType(), '', 'id="service_type" class="form-control"'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Service Regisration No.</label>
                                                <input type="text" name="regi_no" id="regi_no" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Teletalk ID</label>
                                                <input type="text" name="emp_id" id="emp_id" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label></label>
                                                <button type="button" onclick="searchFilter()" class="btn btn-sm btn-primary mt-4">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div id="personalInfoList">
                    <?php
                        $this->load->view('applicant/service_registration/home');
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
    var regi_no = $('#regi_no').val();
    var emp_id = $('#emp_id').val();
    var service_type = $('#service_type').val();

    // alert(off_name);
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>applicant/service_registration/paginate_data/' + page_num,
        data: 'page=' + page_num + '&regi_no=' + regi_no + '&emp_id=' + emp_id  + '&service_type=' + service_type,
        success: function(html) {
            $("#office_search").trigger("reset");
            $('#personalInfoList').html(html);
        }
    });
}

function add_master() {
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/service_registration/add/',
        beforeSend: function() {
            $('.crud_load').show()
        },
        complete: function() {
            $('.crud_load').hide();
        },
        success: function(result) {
            if (result) {
                $('.search_form').hide();
                $('.add_button').hide();
                $('#personalInfoList').html(result);

                return false;
            } else {
                return false;
            }
        }
    });
    return false;
}

//add data
function edit_master(id, page_no) {

    // alert(id);
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/service_registration/edit/' + id + '/' + page_no,
        beforeSend: function() {
            $('.crud_load').show()
        },
        complete: function() {
            $('.crud_load').hide();
        },
        success: function(result) {
            if (result) {
                $('.search_form').hide();
                $('.add_button').hide();
                $('#personalInfoList').html(result);
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
    if (a) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>applicant/service_registration/delete/' + id,
            beforeSend: function() {
                $('.crud_load').show()
            },
            complete: function() {
                $('.crud_load').hide();
            },
            success: function(result) {
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
$(function() {
    $('body').on('click', '#submit', function() {
        $('#personal_info_add').validate({
            rules: {
                service_type: {
                    required: true,

                },
                reg_no: {
                    required: true,
                },
                employee_id: {
                    required: true,
                },
                employee_name: {
                    required: true,
                },
                dealing_person: {
                    required: true,
                },
                mobile: {
                    required: true,

                },
                // email: {
                //     required: true,
                // },
                disclose_officer: {
                    required: true,
                },
                dispatch_no: {
                    required: true,

                },
                reg_date: {
                    required: true,
                },
                document: {
                    required: true,
                },                                             

            },
            messages: {
                service_type: {
                    required: 'This field id required',

                },
                reg_no: {
                    required: 'This field id required',
                },
                employee_id: {
                    required: 'This field id required',
                },
                employee_name: {
                    required: 'This field id required',
                },
                dealing_person: {
                    required: 'This field id required',
                },
                mobile: {
                    required: 'This field id required',

                },
                email: {
                    required: 'This field id required',
                },
                disclose_officer: {
                    required: 'This field id required',
                },
                dispatch_no: {
                    required: 'This field id required',

                },
                reg_date: {
                    required: 'This field id required',
                },
                document: {
                    required: 'This field id required',
                }, 
            },

            submitHandler: function(form) {
                $("label.error").remove();
                var frm = $('#personal_info_add');
                var form = $(this);
                var currentForm = $('#personal_info_add')[0];
                var formData = new FormData(currentForm);
                //debugger;

                $.ajax({
                    url: "<?php echo base_url() ?>applicant/service_registration/added",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    //dataType: "JSON",
                    success: function(response) {
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
$(function() {
    $('body').on('click', '#edit_submit', function() {
        $('#personal_info_edit').validate({
            rules: {
                employee_id: {
                    required: true,

                },
                joining_date: {
                    required: true,
                },
                joining_office: {
                    required: true,
                },
                joining_desig: {
                    required: true,

                },
                joining_grade: {
                    required: true,
                },
                joining_scale: {
                    required: true,
                },
                joining_salary: {
                    required: true,
                },
                current_joining: {
                    required: true,

                },
                current_office: {
                    required: true,
                },
                section: {
                    required: true,
                },
                cuurent_desig: {
                    required: true,

                },
                posting_status: {
                    required: true,
                },
                current_grade: {
                    required: true,
                },
                current_scale: {
                    required: true,
                },
                current_basic: {
                    required: true,

                },
                emp_type: {
                    required: true,
                },
                emp_class: {
                    required: true,
                },
                quota: {
                    required: true,
                },
                qouta_info: {
                    required: true,

                },
                qouta_type: {
                    required: true,
                },
                district: {
                    required: true,
                },
                prl_date: {
                    required: true,
                },
                detail: {
                    required: true,
                },                              

            },
            messages: {
                employee_id: {
                    required: 'This field is required',

                },
                joining_date: {
                    required: 'This field is required',
                },
                joining_office: {
                    required: 'This field is required',
                },
                joining_desig: {
                    required: 'This field is required',

                },
                joining_grade: {
                    required: 'This field is required',
                },
                joining_scale: {
                    required: 'This field is required',
                },
                joining_salary: {
                    required: 'This field is required',
                },
                current_joining: {
                    required: 'This field is required',

                },
                current_office: {
                    required: 'This field is required',
                },
                section: {
                    required: 'This field is required',
                },
                cuurent_desig: {
                    required: 'This field is required',

                },
                posting_status: {
                    required: 'This field is required',
                },
                current_grade: {
                    required: 'This field is required',
                },
                current_scale: {
                    required: 'This field is required',
                },
                current_basic: {
                    required: 'This field is required',

                },
                emp_type: {
                    required: 'This field is required',
                },
                emp_class: {
                    required: 'This field is required',
                },
                quota: {
                    required: 'This field is required',
                },
                qouta_info: {
                    required: 'This field is required',

                },
                qouta_type: {
                    required: 'This field is required',
                },
                district: {
                    required: 'This field is required',
                },
                prl_date: {
                    required: 'This field is required',
                },
                detail: {
                    required: 'This field is required',
                },

            },

            submitHandler: function(form) {
                $("label.error").remove();

                $("label.error").remove();
                var frm = $('#personal_info_edit');
                var form = $(this);
                var currentForm = $('#personal_info_edit')[0];
                var formData = new FormData(currentForm);
                //debugger;

                $.ajax({
                    url: "<?php echo base_url() ?>applicant/service_registration/update/",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
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

<script type="text/javascript">
    function show_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/service_registration/show/' + id+'/'+page_no,
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
            $('#personalInfoList').html(result);
            return false;
        } else {
            return false;
        }
    }
      });
      return false;
  }

  function show_status(id) {

      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/service_registration/show_status/' + id,
      success: function (result) {
          if (result) {
              $('.search_form').hide();
             $('.add_button').hide();
            $('#personalInfoList').html(result);
            return false;
        } else {
            return false;
        }
    }
      });
      return false;
  }

  function show_query(id) {
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/service_registration/show_query/' + id,
      success: function (result) {
          if (result) {
              $('.search_form').hide();
             $('.add_button').hide();
            $('#personalInfoList').html(result);
            return false;
        } else {
            return false;
        }
    }
      });
      return false;
  }
</script>