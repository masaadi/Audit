<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Service Request</h4>
                    <div class="row p-3">
                        <div class="card bg-success" style="width: 100%; color: #fff;">
                        </div>
                    </div>

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
                        $this->load->view('applicant/service_request/home');
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
            url: '<?php echo base_url(); ?>applicant/service_request/paginate_data/' + page_num,
            data: 'page=' + page_num + '&regi_no=' + regi_no + '&emp_id=' + emp_id + '&service_type=' + service_type,
            success: function(html) {
                $("#office_search").trigger("reset");
                $('#personalInfoList').html(html);
            }
        });
    }
</script>

<script type="text/javascript">
    function show_master(id,page_no) {
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

    // function approve_service(id,step_id,page_no) {
    //     $.ajax({
    //         type: "POST",
    //         url: '<?php echo base_url() ?>applicant/service_request/approve_service/' + id+'/'+step_id,
    //         success: function (result) {
    //             location.reload();
    //         }
    //     });
    //       return false;
    // }

$(function() {
    $('body').on('click', '#reason_submit', function() {
        $('#reason_add').validate({
            rules: {
                service_id: {
                    required: true,
                },                
            },
            messages: {
                service_id: {
                    required: 'This field id required',
                }, 
            },

            submitHandler: function(form) {
                $("label.error").remove();
                var frm = $('#reason_add');
                var form = $(this);
                var currentForm = $('#reason_add')[0];
                var formData = new FormData(currentForm);
                var type = $('#type').val();

                 if(type == 'forward'){
                    $.ajax({
                        url: "<?php echo base_url() ?>applicant/service_request/forward/",
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        //dataType: "JSON",
                        success: function(response) {
                            location.reload();
                        }
                    });
                 }else if(type == 'backward'){
                    $.ajax({
                        url: "<?php echo base_url() ?>applicant/service_request/backward_service/",
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        //dataType: "JSON",
                        success: function(response) {
                            location.reload();
                        }
                    });
                 }else if(type == 'query'){
                    $.ajax({
                        url: "<?php echo base_url() ?>applicant/service_request/deny_service/",
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        //dataType: "JSON",
                        success: function(response) {
                            location.reload();
                        }
                    });
                 }             


            }
        });

    });
});

$(function() {
    $('body').on('click', '#approval_doc_submit', function() {
        
        $('#approval_doc_form').validate({
            submitHandler: function(form) {
                $("label.error").remove();
                var frm = $('#approval_doc_form');
                var form = $(this);
                var currentForm = $('#approval_doc_form')[0];
                var formData = new FormData(currentForm);
                
                $.ajax({
                    url: "<?php echo base_url() ?>applicant/service_request/approve_service/",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    //dataType: "JSON",
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        });

    });
});
</script>