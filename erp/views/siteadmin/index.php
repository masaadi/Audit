<script src="<?= base_url() ?>public/js/jquery.validate.min.js"></script>
<style>
td, th {
    padding: 5px;
}
</style>

<p class="statusMsg"></p>
<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header">
                    <h4 class="boxbdr">
                        <?php echo $this->menu_title/*$this->lang->line('office_master_info')*/; ?>
                        Change Password
                    </h4>
                </div>


                <div class="body table-responsive" id="officeList">
                    <?php
                    $this->load->view('siteadmin/entry');
                    ?>
                </div>


                <!--Modals    -->

                <div class="modal" id="targetModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated fadeIn">

                            <div id="load_modal_content">
                                <!-- dynamic content go here... -->
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<script>

  $("#district_id").change(function () {
    var district_id = $(this).val();

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>common/getPreThana",
        data: {
            district_id: district_id
        },
        success: function (html) {
            $("#divThana").html(html);
        },
        error: function (data) {
        }
    });
});


    // load dynamic view for adding section master 
    function add_master() {


        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/office/add/',
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (result) {
                if (result) {
                    $('#load_modal_content').html(result);

                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }


    //load dynamic view for edit section master
    function edit_master(id) {

        // alert(id);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/office/edit/' + id,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (result) {
                if (result) {
                    $('#load_modal_content').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }



    //load dynamic view for edit section master
    function delete_master(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>hr/office/delete/' + id,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (result) {
                if (result) {
                    $('#load_modal_content').html(result);
                    $("#delete_id").val(id);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    }


</script>

<script type="text/javascript">
    function delete_type() {
        var delete_id = $('#delete_id').val();
        var office_status = $('#office_status').val();
        $.ajax({
            url: '<?= site_url()?>/hr/office/delete_record/',
            type: 'post',
            data: {'id': delete_id, 'status': office_status},
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (res) {
                window.location.href = "<?php echo base_url() ?>hr/office/index";
            }
        });
    }

    //new

    $(function () {
        $('body').on('click', '#submit', function () {
            $('#office_add').validate({
                rules: {
                 old_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                },					
                confirm_new_password: {
                    required: true,
                },
            },
            messages: {
             old_password: {
                required: 'Old Password is required',
            },
            new_password: {
                required: 'New Password is required',
            },
            confirm_new_password: {
                required: 'Confirm New Password is required',
            },

        },

        submitHandler: function (form) {
            $("label.error").remove();

            var frm = $('#office_add');
                    // e.preventDefault();
                    var form = $(this);
                    //debugger;
                    var office_id = $('[name="id"]').val();
                    if (office_id == '') {
                        $.ajax({
                            url: "<?php echo base_url() ?>siteadmin/change_password",
                            type: 'POST',
                            data: frm.serialize(),
                            //dataType: "JSON",
                            success: function (response) {

                                //$('.loading').fadeOut("slow");
                                var result = $.parseJSON(response);
                                console.log(result);
                                if (result.status != 'success') {
                                 $.each(result, function (key, value) {
                                    $('[name="' + key + '"]').addClass("error");
                                    $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                });

                                 window.location.href = "<?php echo base_url() ?>siteadmin/password_change";  
                             }
                             else {
                                    //$('.statusMsg').html('<span style="color:red;">Data Save Successfully.</span>');
                                    // alert('success');
                                    window.location.href = "<?php echo base_url() ?>hr/welcome/dashboard";
                                }

                            }

                        });
                    } else {
                        $.ajax({
                            url: "<?php echo base_url() ?>hr/office/update",
                            type: 'POST',
                            data: frm.serialize(),
                            //dataType: "JSON",
                            success: function (response) {

                                //$('.loading').fadeOut("slow");
                                var result = $.parseJSON(response);
                                if (result.status == 'success') {
                                    window.location.href = "<?php echo base_url() ?>hr/office/index";
                                } else if (result.status == 'error') {
                                   // $('#error_msg').html(result.message);

                                   $('#error_msg').html('<span style="color:red;">'+result.message+'</span>');
                               }
                               else {
                                    //$('.statusMsg').html('<span style="color:red;">Data Save Successfully.</span>');
                                    // alert('success');

                                    $.each(result, function (key, value) {
                                        $('[name="' + key + '"]').addClass("error");
                                        $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                                    });
                                }

                            }

                        });
                    }

                }
            });

});
});
    //    =======================delete========================

    //    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++

</script>


<!-- pagination data -->
<script type="text/javascript">
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        var name = $('#wing_id').val();
        var off_name = $('#office_type_id').val();
        var cat_name = $('#category_id').val();

        var district_id = $("#district_id").val();
        var thana_id = $("#thana_pre").val();
        var office_id = $("#office_id").val();


        // alert(off_name);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>hr/office/paginate_data/' + page_num,
            data:'page=' + page_num + '&name=' + name + '&ofname=' + off_name + '&cname=' + cat_name + '&district_id=' + district_id + '&thana_id=' 
            + thana_id + '&office_id=' + office_id,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (html) {
                $('#officeList').html(html);
            }
        });
    }

</script>


<script>
 $(document).on('change', '#category_id', function () {
   var wing_id = $("#wing_id").val();
   var office_type_id = $("#office_type_id").val();
   var category_id = $("#category_id").val();
   var district_id = $("#district_id").val();
   var thana_id = $("#thana_pre").val();
   $.ajax({
    url: "<?php echo base_url() ?>common/get_office_info",
    type: 'POST',
    data: {wing_id: wing_id,office_type_id:office_type_id,category_id:category_id,district_id:district_id,thana_id:thana_id},
    success: function (response) {
     $('#divOffice').html(response);
 }
});
});

 $(document).on('change', '#district_id', function () {
   var wing_id = $("#wing_id").val();
   var office_type_id = $("#office_type_id").val();
   var category_id = $("#category_id").val();
   var district_id = $("#district_id").val();
   var thana_id = $("#thana_pre").val();
   $.ajax({
    url: "<?php echo base_url() ?>common/get_office_info",
    type: 'POST',
    data: {wing_id: wing_id,office_type_id:office_type_id,category_id:category_id,district_id:district_id,thana_id:thana_id},
    success: function (response) {
     $('#divOffice').html(response);
 }
});
});

 $(document).on('change', '#thana_pre', function () {
   var wing_id = $("#wing_id").val();
   var office_type_id = $("#office_type_id").val();
   var category_id = $("#category_id").val();
   var district_id = $("#district_id").val();
   var thana_id = $("#thana_pre").val();
   $.ajax({
    url: "<?php echo base_url() ?>common/get_office_info",
    type: 'POST',
    data: {wing_id: wing_id,office_type_id:office_type_id,category_id:category_id,district_id:district_id,thana_id:thana_id},
    success: function (response) {
     $('#divOffice').html(response);
 }
});
});

</script>







