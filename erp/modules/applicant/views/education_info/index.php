<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Education Information</h4>
                    <div class="row p-3">
                        <div class="card bg-success" style="width: 100%; color: #fff;">
                        </div>
                    </div>
                    <?php
                        $user_id = $this->session->userdata('DX_user_id');
                        $user_info = $this->db->select('users.employee_id')->where('users.id',$user_id)->get('users')->row();
                        $employee_id = $user_info->employee_id;
                         $is_emp = $this->db->where('employee_id',$employee_id)->get('education_info')->row();
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
                        $this->load->view('applicant/education_info/home');
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
        url: '<?php echo base_url(); ?>applicant/education_info/paginate_data/' + page_num,
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
        url: '<?php echo base_url() ?>applicant/education_info/add/',
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

    //alert(id);
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>applicant/education_info/edit/' + id + '/' + page_no,
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
            url: '<?php echo base_url() ?>applicant/education_info/delete/' + id,
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
                                              

            },
            messages: {
                employee_id: {
                    required: 'This field is required',

                }

            },

            submitHandler: function(form) {
                $("label.error").remove();
                var frm = $('#personal_info_add');
                var form = $(this);
                var currentForm = $('#personal_info_add')[0];
                var formData = new FormData(currentForm);
                //debugger;

                $.ajax({
                    url: "<?php echo base_url() ?>applicant/education_info/added",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    //dataType: "JSON",
                    success: function(response) {

                        //$('.loading').fadeOut("slow");
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

                }                             

            },
            messages: {
                employee_id: {
                    required: 'This field is required',

                }
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
                    url: "<?php echo base_url() ?>applicant/education_info/update/",
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
        url: '<?php echo base_url() ?>applicant/education_info/show/' + id+'/'+page_no,
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