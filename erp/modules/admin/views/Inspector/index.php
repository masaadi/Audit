<style type="text/css">
    #inspector-list {
        float: left;
        list-style: none;
        margin-top: -1px;
        padding: 0;
        width: 90%;
        position: absolute;
        z-index: 100;
    }
    #inspector-list li {
        padding: 10px;
        background: #f0f0f0;
        border-bottom: #bbb9b9 1px solid;
    }
    #inspector-list li:hover {
        background: #ece3d2;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="box-shadow:0px 0px 3px #777">
                <div class="card-body p-5">
                    <h4 class="card-title"><?php echo $this->lang->line('add_inspector'); ?></h4>
                    <?php echo form_open_multipart('', array('id' => 'add_inspector', 'class' => 'inspector_form')); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('employee_id') .'/'.$this->lang->line('name'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="profile_id" id="profile_id" placeholder="<?php echo $this->lang->line('id'); ?>" autocomplete="off" required>
                                        <input type="hidden" class="form-control profile_name" name="profile_name" id="profile_name">
                                        <input type="hidden" class="form-control org_profile_id" name="org_profile_id" id="org_profile_id">

                                        <input type="hidden" class="form-control" name="id" id="ins_id">
                                        <input type="hidden" name="page_no" id="page_no"/>

                                        <div id="suggesstion-box"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php //echo $this->lang->line('name'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="insp_name" id="insp_name" placeholder="<?php echo $this->lang->line('name'); ?>" required>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('department'); ?></label>
                                    <div class="col-sm-8">
                                        <?php echo form_dropdown("department_id",getOptionDepartment(),'',"id='department_id' class='form-control department_id' readonly"); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('designation'); ?></label>
                                    <div class="col-sm-8">
                                        <?php echo form_dropdown("designation_id",getOptionDesignation(),'',"id='designation_id' class='form-control designation_id' readonly"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('email'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control email" name="email" id="email" placeholder="<?php echo $this->lang->line('email'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('contact_no'); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control contact_no"  name="contact_no" id="contact_no" placeholder="<?php echo $this->lang->line('contact_no'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('category'); ?></label>
                                    <div class="col-sm-8">
                                        <?php echo form_dropdown("office_category_id",office_category(),'',"id='office_category_id' class='form-control office_category_id' readonly"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('office'); ?></label>
                                    <div class="col-sm-8">
                                        <?php echo form_dropdown("office",office(),'',"id='office' class='form-control office_id' readonly"); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('business_type'); ?></label>
                                <div class="col-sm-8">
                                    <?php
                                        $business_type_options = getOptionBusinessType();
                                        $new_array = array('0' => 'All');
                                        $bus_typ_ids = array();
                                        if($business_type_options){
                                            foreach($business_type_options as $k => $v){
                                                if($k){
                                                    $new_array[$k] = $v; 
                                                    $bus_typ_ids[] = $k;
                                                }
                                            }
                                        }
                                        $bus_typ_id = $bus_typ_ids; 
                                    ?>
                                    <?php echo form_dropdown("business_type[]",$new_array,'',"id='business_type' class='form-control business_type',  multiple='multiple' "); ?>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('address'); ?></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control address" name="address" id="address" placeholder="<?php echo $this->lang->line('address'); ?>" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control note" name="note" id="note" placeholder="<?php echo $this->lang->line('note'); ?>"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-sm btn-primary submit-btn" id="submit"><?php echo $this->lang->line('save'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h4 class="card-title"><?php echo $this->lang->line('inspector_list'); ?></h4>
                    <?php echo form_open_multipart('', array('id' => 'inspector_search')); ?>
                    <div class="row">
                        
                            <div class="col-md-2">
                                <div class="form-group">
                                <label><?php echo $this->lang->line('employee_id') .'/'.$this->lang->line('name'); ?></label>
                                    <input type="text" class="form-control" name="ser_profile_id" id="ser_profile_id" placeholder="<?php echo $this->lang->line('employee_id') .'/'.$this->lang->line('name'); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label><?php echo $this->lang->line('contact_no'); ?></label>
                                    <input type="text" class="form-control" name="ser_contact_no" id="ser_contact_no" placeholder="<?php echo $this->lang->line('contact_no') ; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('category'); ?></label>
                                        <?php echo form_dropdown("ser_off_cat_id",office_category(),'',"id='ser_off_cat_id' class='form-control ser_off_cat_id'"); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('office'); ?></label>
                                        <?php echo form_dropdown("ser_office_id",office(),'',"id='ser_office_id' class='form-control ser_office_id'"); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('business_type'); ?></label>
                                        <?php echo form_dropdown("ser_business_type",getOptionBusinessType(),'',"id='ser_business_type' class='form-control ser_business_type'"); ?>
                                </div>
                            </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label></label>
                                        <button type="button" onclick="searchFilter()" class="btn btn-sm btn-primary mt-4"><?php echo $this->lang->line('search'); ?></button>
                                        <?php $btn_update = $this->lang->line('update'); ?>
                                        <?php $btn_save   = $this->lang->line('save'); ?>
                                        <!-- <input type="submit" value="search" class="btn btn-sm btn-primary mt-4"> -->
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row" id="inspectorList">
                                <?php
                                    $this->load->view('admin/inspector/home');
                                ?>
                            </div>

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
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (response) {
                $('.office_id').html(response);
            }
        });
    });

    var s2 = $(".business_type").select2({
        placeholder: "--- Select ---",
        tags: true
    });

    $(".business_type").on("select2:select select2:unselect", function (e) {
        //this returns all the selected item
        var all_buss_type = "<?php echo json_encode($bus_typ_id); ?>";
        
        var valtoselect = all_buss_type.split(',');
        var parse_data = JSON.parse(valtoselect);
        var items= $(this).val();       
        //Gets the last selected item
        var lastSelectedItem = e.params.data.id; 
        if(lastSelectedItem==0){
            s2.val(parse_data).trigger("change");
        }
    });

    $(document).on('input', '#profile_id', function () {
        var search_text = $(this).val();
        if(!search_text){
            $("#add_inspector").trigger("reset");
            s2.val([]).trigger("change");
        }else{
            $.ajax({
                url: "<?php echo base_url() ?>admin/inspector/inspector_profile_list",
                type: 'POST',
                data: {search_text: search_text},
                beforeSend: function () {
                    $('.crud_load').show()
                },
                complete: function () {
                    $('.crud_load').hide();
                },
                success: function (response) {
                    $("#suggesstion-box").html(response);
                    //alert(response);
                    //var parse_data = JSON.parse(response);
                    
                }
            });
        }
    });

    $(document).on('click', '.inspector-get', function () {
        var profile_id = $(this).attr('id');
        var search_name = $(this).attr('attr-insname');

        $("#profile_id").val("");

        $("#add_inspector").trigger("reset");
        s2.val([]).trigger("change");       
        $.ajax({
            url: "<?php echo base_url() ?>admin/inspector/inspector_profile",
            type: 'POST',
            data: {profile_id: profile_id},
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
                $("#inspector-list").empty();
            },
            success: function (response) {
                var parse_data = JSON.parse(response);
                if(parse_data && parse_data.get_info){

                    $("#profile_id").val(search_name.trim());
                    $("#org_profile_id").val(profile_id);
                    
                    $(".department_id").val(parse_data.get_info.department_id);
                    $(".designation_id").val(parse_data.get_info.designation_id);
                    $(".email").val(parse_data.get_info.email);
                    $(".contact_no").val(parse_data.get_info.contact_no);
                    $(".office_category_id").val(parse_data.get_info.office_category_id);
                    $(".office_id").val(parse_data.get_info.office_id);
                    $(".profile_name").val(parse_data.get_info.id);
                    if(parse_data.lang=='bn'){
                        $("#address").val(parse_data.get_info.address_bn);
                    }else{
                        $("#address").val(parse_data.get_info.address);
                    }
                }
            }
        });
    });

    // $(document).on('blur', '#profile_id', function () {
    //     var profile_id = $(this).val();
    //     $.ajax({
    //         url: "<?php //echo base_url() ?>admin/inspector/inspector_profile",
    //         type: 'POST',
    //         data: {profile_id: profile_id},
    //         beforeSend: function () {
    //             $('.crud_load').show()
    //         },
    //         complete: function () {
    //             $('.crud_load').hide();
    //         },
    //         success: function (response) {
    //             var parse_data = JSON.parse(response);
    //             if(parse_data && parse_data.get_info){
    //                 $(".department_id").val(parse_data.get_info.department_id);
    //                 $(".designation_id").val(parse_data.get_info.designation_id);
    //                 $(".email").val(parse_data.get_info.email);
    //                 $(".contact_no").val(parse_data.get_info.contact_no);
    //                 $(".office_category_id").val(parse_data.get_info.office_category_id);
    //                 $(".office_id").val(parse_data.get_info.office_id);
    //                 $(".profile_name").val(parse_data.get_info.id);
    //                 if(parse_data.lang=='bn'){
    //                     $("#address").val(parse_data.get_info.address_bn);
    //                 }else{
    //                     $("#address").val(parse_data.get_info.address);
    //                 }
    //             }
    //         }
    //     });
    // });
  
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        var ser_profile_id      = $('#ser_profile_id').val();
        var ser_contact_no      = $('#ser_contact_no').val();
        var ser_off_cat_id      = $('.ser_off_cat_id').val();	
        var ser_office_id       = $('.ser_office_id').val();	
        var ser_business_type   = $('.ser_business_type').val();	

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admin/inspector/paginate_data/' + page_num,
            data: 'page=' + page_num + '&ser_profile_id=' + ser_profile_id+ '&ser_off_cat_id=' + ser_office_id+ '&ser_office_id=' + ser_office_id+ '&ser_business_type=' + ser_business_type+ '&ser_contact_no=' + ser_contact_no,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (html) {
				$("#inspector_search").trigger("reset");
				$("#add_inspector").trigger("reset");
                $('#inspectorList').html(html);
                s2.val([]).trigger("change");

                $('.submit-btn').attr('id','submit');
                $("#ins_id").val('');
                $("#profile_name").val('');
                $("#page_no").val('');
                var save_btn = "<?php echo $btn_save ?>";
                $('.submit-btn').text(save_btn);
                

                $('html, body').animate({
                    scrollTop: $("#inspectorList").offset().top
                }, 1000);
                
            }
        });
    }
    //add data
    function edit_master(id, page_no) {
        $("#add_inspector").trigger("reset");
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>admin/inspector/edit/' + id+'/'+page_no,
            beforeSend: function () {
                $('.crud_load').show()
            },
            complete: function () {
                $('.crud_load').hide();
            },
            success: function (result) {

                var parse_data = JSON.parse(result);
                if(parse_data && parse_data.profile_info && parse_data.inspector_info){
                    $("#profile_id").val(parse_data.profile_info.employee_id);
                    $(".department_id").val(parse_data.profile_info.department_id);
                    $(".designation_id").val(parse_data.profile_info.designation_id);
                    $(".email").val(parse_data.profile_info.email);
                    $(".contact_no").val(parse_data.profile_info.contact_no);
                    $(".office_category_id").val(parse_data.profile_info.office_category_id);
                    $(".office_id").val(parse_data.profile_info.office_id);
                    if(parse_data.lang=='bn'){
                        $("#address").val(parse_data.profile_info.address_bn);
                    }else{
                        $("#address").val(parse_data.profile_info.address);
                    }
                    $(".note").val(parse_data.inspector_info[0].note);
                    $("#ins_id").val(parse_data.inspector_info[0].id);
                    $(".profile_name").val(parse_data.inspector_info[0].profile_id);
                    $(".org_profile_id").val(parse_data.inspector_info[0].profile_id);

                    $("#page_no").val(parse_data.count1);

                    var vals   = parse_data.inspector_info[0].business_type_id; 
                    var valArr = vals.split(',');
                    s2.val(valArr).trigger("change");
                    $('.submit-btn').attr('id','edit_submit');

                    var language = "<?php echo $this->session->userdata('lang_file') ?>";
                    var upd_btn = "<?php echo $btn_update ?>";

                    //if(language == "bn"){
                        $('.submit-btn').text(upd_btn);
                        $("label.error").remove();
                    // }else{
                    //     $('.submit-btn').attr('d');
                    // }

                    //$('.submit-btn').attr('id','edit_submit');

                    $('html, body').animate({
                        scrollTop: $("#add_inspector").offset().top
                    }, 1000);
                    // https://stackoverflow.com/questions/37917204/select2-default-values-for-multiple-select-and-allowed-tags

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
                    url: '<?php echo base_url() ?>admin/inspector/delete/' + id,
                    beforeSend: function () {
                    $('.crud_load').show()
                },
                complete: function () {
                    $('.crud_load').hide();
                },
                success: function (result) {
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
    $(function () {
        $('body').on('click', '#submit', function () {
            $('#add_inspector').validate({
                rules: {
                    profile_id: {
                    required: true,

                }, 
                "business_type[]": {
                    required: true,

                },
                department_id: {
                    required: true,

                }, 
                designation_id: {
                    required: true,

                }, 
                email: {
                    required: true,

                }, 
                contact_no: {
                    required: true,

                },
                office_category_id: {
                    required: true,

                },
                office: {
                    required: true,

                }
            },
            messages: {      
                profile_id: {
                    required: 'Profile ID/Name is required',
                },
                "business_type[]": {
                    required: 'Business Type is required',
                },
                department_id: {
                    required: 'Department is required',
                },
                designation_id: {
                    required: 'Designation is required',
                },
                email: {
                    required: 'Email is required',
                },
                contact_no: {
                    required: 'Contact No is required',
                },
                office_category_id: {
                    required: 'Office Category is required',
                },
                office: {
                    required: 'Office is required',
                }
            }, 
            submitHandler: function (form) {
                $("label.error").remove();
                var frm = $('#add_inspector');
                var form = $(this);
                $.ajax({
                    url: "<?php echo base_url() ?>admin/inspector/added",
                    type: 'POST',
                    data: frm.serialize(),
                    beforeSend: function () {
                        $('.crud_load').show()
                    },
                    complete: function () {
                        $('.crud_load').hide();
                    },
                    success: function (response) {
                        var result = $.parseJSON(response);
                        if (result.status != 'success') {
                            $.each(result, function (key, value) {
                            $('[name="' + key + '"]').addClass("error");
                            $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                        });
                        }
                        else {  
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
    $(document).on('click', '#edit_submit', function () {
           
        $('#add_inspector').validate({
            rules: {
                profile_id: {
                    required: true,

                }, 
                "business_type[]": {
                    required: true,

                },
                department_id: {
                    required: true,

                }, 
                designation_id: {
                    required: true,

                }, 
                email: {
                    required: true,

                }, 
                contact_no: {
                    required: true,

                },
                office_category_id: {
                    required: true,

                },
                office: {
                    required: true,

                }
            },
            messages: {      
                profile_id: {
                    required: 'Profile ID/Name is required',
                },
                "business_type[]": {
                    required: 'Business Type is required',
                },
                department_id: {
                    required: 'Department is required',
                },
                designation_id: {
                    required: 'Designation is required',
                },
                email: {
                    required: 'Email is required',
                },
                contact_no: {
                    required: 'Contact No is required',
                },
                office_category_id: {
                    required: 'Office Category is required',
                },
                office: {
                    required: 'Office is required',
                }
            },
            submitHandler: function (form) {
                $("label.error").remove();
                var frm = $('#add_inspector');
                var form = $(this);
                //debugger;
                $.ajax({
                    url: "<?php echo base_url() ?>admin/inspector/update/",
                    type: 'POST',
                    data: frm.serialize(),
                    //dataType: "JSON",
                    beforeSend: function () {
                        $('.crud_load').show()
                    },
                    complete: function () {
                        $('.crud_load').hide();
                    },
                    success: function (response) {
                        var result = $.parseJSON(response);
                        if (result.status != 'success') {
                            $.each(result, function (key, value) {
                                $('[name="' + key + '"]').addClass("error");
                                $('[name="' + key + '"]').after(' <label class="error">' + value + '</label>');
                            });
                        }else {
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
