    <div class="top">
        <div class="row">
            <div class="col-md-9">
                <marquee class="text-light">To know the process of Service Request, Please follow the guideline from HELP option</marquee>
            </div>

            <div class="col-md-2">
                <a href="<?php echo base_url();?>siteadmin/verify_user" class="blink_link1 ">Bill or SERVICE REQUEST </a>
            </div>
            <div class="col-md-1" style="text-align:center">
                <a href="<?php echo base_url()?><?= $file_data->document;?>" style="color:white" target="blank">HELP</a>             
            </div>
        </div>
    </div>
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>/public/dashboard/images/bsic.png" alt="" style="width: 80px; padding-top: 5px;">
                            <span style="font-size: 20px;font-weight: bold;color: #620001;font-family:'Oswald', sans-serif;position: absolute;top: 35px;bottom: 0;padding-left: 10px;">Bill Tracking System</span>
                        </a>
                            
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9" style="text-align:right !important">
                        <button type="button" class="btn btn-success" style="margin-top:20px"><a href="<?php echo base_url();?>siteadmin/login" style="color:white; font-weight:bold">SIGN IN</a></button>
                    </div> 
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Begin -->
    <div class="hero-slider">
        <div class="hero-items owl-carousel">
            <?php 
                if(!empty($slider)):
                foreach ($slider as $s):
            ?>
            <div class="single-hero-item set-bg" data-setbg="<?php echo base_url('public/uploads/slider/').$s->image_url;?>">
            </div>

            <?php endforeach; endif;?>
            
        </div>
    </div>

    <section class="client-says set-bg" style="padding-top:7px; padding-bottom:20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="client-text">
                        <h2 style="color:#28a745; margin-bottom:0px">Track Bill or Service</h2> 
                            <div class="row my-3" style="background-color: #ccc; padding: 10px 0px; border-radius: 10px; border: 1px solid #aaa;">
                                <div class="col-sm-10 ">
                                      <div class="form-group">       
                                             <input type="text" name="" id="tracking_no" class="form-control" placeholder="Enter Your Tracking Number">
                                             <span id="error_msg" style="color:red"></span>
                                      </div>
                                </div>
                                <div class="col-sm-2 ">
                                      <div class="form-group">               
                                        <button class="btn btn-md btn-success" type="button" id="search">Search</button>
                                      </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="client-says set-bg" style="padding-top:7px; display:none" id="result_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="client-text">
                        <h6 style="padding-bottom:10px">Applicant Name : <span id="applicant_name"></span></h6>
                        <h6 style="padding-bottom:10px">Service Type : <span id="type"></span></h6>
                        <h6 style="padding-bottom:10px">Registration Number : <span id="reg_no"></span></h6>
                        <h6 style="padding-bottom:10px">Registration Date : <span id="reg_date"></span></h6>
                        <h6 style="padding-bottom:10px">Status : <span id="reg_status" style="color:#28a745"></span></h6>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-hover" id="step_table">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Desk Officer</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="step_table1">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<br>
<br>
</div>

<script type="text/javascript">
    $('#search').click(function(){
        var tracking_no = $('#tracking_no').val();
        $("#step_table1").empty();
        $.ajax({
                type:"Post",
                url:"<?php echo base_url() ?>siteadmin/track_service/"+tracking_no,
                dataType: "JSON",
                success: function(result){
                    if(result.failed == '1'){
                        $('#error_msg').text("No data found");
                        $('#result_sec').hide();
                    }else{
                       $('#tracking_no').val('');
                        $('#result_sec').show();

                        $('#applicant_name').text(result.applicant_name);
                        $('#type').text(result['service_detail'].service_type);
                        $('#reg_no').text(result['service_detail'].registration_id);
                        $('#reg_date').text(result['service_detail'].date);
                        $('#reg_status').text(result['service_detail'].status);

                        

                        for (var i = 0; i < result['service_step'].length; i++) {
                            var status = '';
                            if(result['service_step'][i].status == '1'){
                                status = 'Complete';
                            }
                            if(result['service_step'][i].status == '0'){
                                status = 'Processing';
                            }

                            var $new_row = $(`<tr>
                            <td>`+(i+1)+`</td>
                            <td>`+result['service_step'][i].employee_name+`</td>
                            <td>`+result['service_step'][i].designation_name+`</td>
                            <td>`+status+`</td>
                            <td>`+result['service_step'][i].created_date+`</td>
                        </tr>`);

                            $("#step_table1").append($new_row);
                        } 
                    }                 
                                        
                }
            });
    });
</script>

<script type="text/javascript">
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:4,
        loop:true,
        autoplay:true,
        autoplayTimeout:1000,
        //autoplayHoverPause:true
    });
    
</script>