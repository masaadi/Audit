<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-2" style="box-shadow: 0px 0px 3px #777;">
                <div class="card-body">
                    <h4 class="text-center">Document List For Service</h4>
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
                                                <label>Service Type Name</label>
                                                <?php echo form_dropdown('service_type', getServiceType(), '', 'id="service_type" class="form-control"'); ?>
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
                        $this->load->view('service/service_document/home');
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
    var service_type = $('#service_type').val();

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>service/service_document/paginate_data/' + page_num,
        data: 'page=' + page_num + '&service_type=' + service_type,
        success: function(html) {
            $("#office_search").trigger("reset");
            $('#personalInfoList').html(html);
        }
    });
}

function add_master() {
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>service/service_document/add/',
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
        url: '<?php echo base_url() ?>service/service_document/edit/' + id + '/' + page_no,
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

function delete_master(id,status) {
    var a = confirm("Are you sure you want to delete this record");
    if (a) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>service/service_document/delete/' + id+'/'+status,
            beforeSend: function() {
                $('.crud_load').show()
            },
            complete: function() {
                $('.crud_load').hide();
            },
            success: function(result) {
                if (result) {
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
            },
            messages: {
                service_type: {
                    required: 'This field is required',
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
                    url: "<?php echo base_url() ?>service/service_document/added",
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
                service_type: {
                    required: true,
                },                                            

            },
            messages: {
                service_type: {
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
                    url: "<?php echo base_url() ?>service/service_document/update/",
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
    function show_master(service_type_id,page_no) {

        // alert(id);
      $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>service/service_document/show/' + service_type_id+'/'+page_no,
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