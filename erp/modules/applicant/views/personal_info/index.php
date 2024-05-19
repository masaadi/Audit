<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Personal Information</h4>
                    <div class="row p-3">
                        <div class="card bg-success" style="width: 100%; color: #fff;">
                        </div>
                    </div>
                    <?php
                        $user_id = $this->session->userdata('DX_user_id');
                        $user_info = $this->db->select('users.employee_id')->where('users.id',$user_id)->get('users')->row();
                        $employee_id = $user_info->employee_id;
                         $is_emp = $this->db->where('employee_id',$employee_id)->get('personal_info')->row();
                         if(empty($is_emp)):
                    ?>
                    <h2 class="add_button">
                        <button onclick="add_master()" type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float right m-t--5" data-backdrop="static" data-keyboard="false" style="padding-left:0px"><img src="<?php echo base_url();?>public/img/plus.png" />
                            <?= $this->lang->line('add_new')?></button>
                    </h2>
                    <?php endif;?>
                    <!-- <div class="card search_form">
                        <div class="card-body" style="padding-left:0px">
                            <div class='row'>
                                <div class='col-md-10'>
                                    <?php echo form_open_multipart('', array('id' => 'office_search')); ?>
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Employee Id</label>
                                                <input type="text" name="emp_id" id="emp_id" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input type="text" name="emp_name" id="emp_name" placeholder="" class="form-control">
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
                    </div> -->
                    <div id="personalInfoList">
                    <?php
                        $this->load->view('applicant/personal_info/home');
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
    var emp_name = $('#emp_name').val();
    var emp_id = $('#emp_id').val();

    // alert(off_name);
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>applicant/personal_info/paginate_data/' + page_num,
        data: 'page=' + page_num + '&emp_name=' + emp_name + '&emp_id=' + emp_id,
        success: function(html) {
            $("#office_search").trigger("reset");
            $('#personalInfoList').html(html);
        }
    });
}

function add_master() {
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/personal_info/add/',
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
        //url: '<?php echo base_url() ?>admin/office/edit/' + id,
        url: '<?php echo base_url() ?>applicant/personal_info/edit/' + id + '/' + page_no,
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
            url: '<?php echo base_url() ?>applicant/personal_info/delete/' + id,
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
                employee_id: {
                    required: true,

                },
                // cpf_no: {
                //     required: true,
                // },
                employee_name: {
                    required: true,
                },
                // emp_photo: {
                //     required: true,
                // },
                // gender: {
                //     required: true,

                // },
                // dob: {
                //     required: true,
                // },
                f_name: {
                    required: true,
                },
                // m_name: {
                //     required: true,
                // },
                // nid: {
                //     required: true,

                // },
                // nid_photo: {
                //     required: true,
                // },
                // blood_group: {
                //     required: true,
                // },
                // marital_status: {
                //     required: true,
                // },
                // pre_division: {
                //     required: true,
                // },
                // pre_district: {
                //     required: true,
                // },
                // pre_upazila: {
                //     required: true,

                // },
                // pre_address: {
                //     required: true,
                // },
                // per_division: {
                //     required: true,
                // },
                // per_district: {
                //     required: true,
                // },
                // per_upazila: {
                //     required: true,

                // },
                // per_address: {
                //     required: true,
                // },
                // phone: {
                //     required: true,
                // },
                // email: {
                //     required: true,
                // },
                // emergency_name: {
                //     required: true,
                // },
                // relation: {
                //     required: true,
                // },
                // emergency_phone: {
                //     required: true,
                // },               

            },
            messages: {
                employee_id: {
                    required: 'This field is required',
                },
                // cpf_no: {
                //     required: 'This field is required',
                // },
                employee_name: {
                    required: 'This field is required',
                },
                // emp_photo: {
                //     required: 'This field is required',
                // },
                // gender: {
                //     required: 'This field is required',
                // },
                // dob: {
                //     required: 'This field is required',
                // },
                f_name: {
                    required: 'This field is required',
                },
                // m_name: {
                //     required: 'This field is required',
                // },
                // nid: {
                //     required: 'This field is required',
                // },
                // nid_photo: {
                //     required: 'This field is required',
                // },
                // blood_group: {
                //     required: 'This field is required',
                // },
                // marital_status: {
                //     required: 'This field is required',
                // },
                // pre_division: {
                //     required: 'This field is required',
                // },
                // pre_district: {
                //     required: 'This field is required',
                // },
                // pre_upazila: {
                //     required: 'This field is required',
                // },
                // pre_address: {
                //     required: 'This field is required',
                // },
                // per_division: {
                //     required: 'This field is required',
                // },
                // per_district: {
                //     required: 'This field is required',
                // },
                // per_upazila: {
                //     required: 'This field is required',
                // },
                // per_address: {
                //     required: 'This field is required',
                // },
                // phone: {
                //     required: 'This field is required',
                // },
                // email: {
                //     required: 'This field is required',
                // },
                // emergency_name: {
                //     required: 'This field is required',
                // },
                // relation: {
                //     required: 'This field is required',
                // },
                // emergency_phone: {
                //     required: 'This field is required',
                // },

            },

            submitHandler: function(form) {
                $("label.error").remove();
                var frm = $('#personal_info_add');
                var form = $(this);
                var currentForm = $('#personal_info_add')[0];
                var formData = new FormData(currentForm);
                //debugger;

                $.ajax({
                    url: "<?php echo base_url() ?>applicant/personal_info/added",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    //dataType: "JSON",
                    success: function(response) {

                        //$('.loading').fadeOut("slow");
                        var result = $.parseJSON(response);
                        if (result.status != 'success') {
                            $.each(result, function(key, value) {
                                $('[name="' + key + '"]').addClass("error");
                                $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                            });
                        }else if(result.status == 'warning'){
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
                // cpf_no: {
                //     required: true,
                // },
                employee_name: {
                    required: true,
                },
                // emp_photo: {
                //     required: true,
                // },
                // gender: {
                //     required: true,

                // },
                // dob: {
                //     required: true,
                // },
                f_name: {
                    required: true,
                },
                // m_name: {
                //     required: true,
                // },
                // nid: {
                //     required: true,

                // },
                // nid_photo: {
                //     required: true,
                // },
                // blood_group: {
                //     required: true,
                // },
                // marital_status: {
                //     required: true,
                // },
                // pre_division: {
                //     required: true,
                // },
                // pre_district: {
                //     required: true,
                // },
                // pre_upazila: {
                //     required: true,

                // },
                // pre_address: {
                //     required: true,
                // },
                // per_division: {
                //     required: true,
                // },
                // per_district: {
                //     required: true,
                // },
                // per_upazila: {
                //     required: true,

                // },
                // per_address: {
                //     required: true,
                // },
                // phone: {
                //     required: true,
                // },
                // email: {
                //     required: true,
                // },
                // emergency_name: {
                //     required: true,
                // },
                // relation: {
                //     required: true,
                // },
                // emergency_phone: {
                //     required: true,
                // },               

            },
            messages: {
                employee_id: {
                    required: 'This field is required',
                },
                // cpf_no: {
                //     required: 'This field is required',
                // },
                employee_name: {
                    required: 'This field is required',
                },
                // emp_photo: {
                //     required: 'This field is required',
                // },
                // gender: {
                //     required: 'This field is required',
                // },
                // dob: {
                //     required: 'This field is required',
                // },
                f_name: {
                    required: 'This field is required',
                },
                // m_name: {
                //     required: 'This field is required',
                // },
                // nid: {
                //     required: 'This field is required',
                // },
                // nid_photo: {
                //     required: 'This field is required',
                // },
                // blood_group: {
                //     required: 'This field is required',
                // },
                // marital_status: {
                //     required: 'This field is required',
                // },
                // pre_division: {
                //     required: 'This field is required',
                // },
                // pre_district: {
                //     required: 'This field is required',
                // },
                // pre_upazila: {
                //     required: 'This field is required',
                // },
                // pre_address: {
                //     required: 'This field is required',
                // },
                // per_division: {
                //     required: 'This field is required',
                // },
                // per_district: {
                //     required: 'This field is required',
                // },
                // per_upazila: {
                //     required: 'This field is required',
                // },
                // per_address: {
                //     required: 'This field is required',
                // },
                // phone: {
                //     required: 'This field is required',
                // },
                // email: {
                //     required: 'This field is required',
                // },
                // emergency_name: {
                //     required: 'This field is required',
                // },
                // relation: {
                //     required: 'This field is required',
                // },
                // emergency_phone: {
                //     required: 'This field is required',
                // },

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
                    url: "<?php echo base_url() ?>applicant/personal_info/update/",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        var result = $.parseJSON(response);
                        if (result.status != 'success') {
                            $.each(result, function(key, value) {
                                $('[name="' + key + '"]').addClass("error");
                                $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                            });
                            // alert('Duplicate Wing Name or Wing ID not allow !');

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
</script>

<script type="text/javascript">
    function show_master(id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/personal_info/show/' + id+'/'+page_no,
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
</script>